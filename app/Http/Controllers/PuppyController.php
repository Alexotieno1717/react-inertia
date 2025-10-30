<?php

namespace App\Http\Controllers;

use App\Http\Resources\PuppyResource;
use App\Models\Puppy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;


class PuppyController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        return Inertia::render('puppies/index', [
            'puppies' => PuppyResource::collection(
                Puppy::query()
                    ->when($search, function ($query, $search) {
                        $query->where('name', 'like', '%'.$search.'%')
                            ->orWhere('trait', 'like', '%'.$search.'%');
                    })
                    ->with(['user', 'likedBy'])
                    ->latest()
                    ->paginate(9)
                    ->withQueryString()
            ),
            'filters' => [
                'search' => $search,
            ]
        ]);
    }

    public function store(Request $request)
    {
        sleep(2);
        $request->validate([
            'name' => 'required|string|max:255',
            'trait' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);
        // store image
        $image_url = null;
        if ($request->hasFile('image')) {
            // Image optimization
//            $image =Image::read($request->file('image'));
            $manager = new ImageManager(new Driver());
            $image = $manager->read($request->file('image')->getRealPath());


            if ($image->width() > 1000){
                $image->scale(width: 1000);
            }

            $webpEncoded = $image->toWebp(quality: 95)->toString();

            $fileName = Str::random() . '.webp';
            $path = 'puppies/' . $fileName;

            $stored =Storage::disk('public')->put($path, $webpEncoded);

            if (!$stored) {
                return back()->withErrors(['image' => 'Failed to upload image']);
            }
            $image_url = Storage::url($path);
        }

        // create new puppy
        $puppy = $request->user()->puppies()->create([
            'name' => $request->name,
            'trait' => $request->trait,
            'image_url' => $image_url,
        ]);

        return back()->with(['success' => "Puppy {$puppy->name} created"]);


    }

    public function like(Request $request, Puppy $puppy)
    {
        sleep(1);
        $puppy->likedBy()->toggle($request->user()->id);

        return back();
    }
}
