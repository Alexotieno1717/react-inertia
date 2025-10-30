<?php

namespace App\Http\Controllers;

use App\Http\Resources\PuppyResource;
use App\Models\Puppy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

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
        $request->validate([
            'name' => 'required|string|max:255',
            'trait' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);
        // store image
        $image_url = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('puppies', 'public');
            if (!$path) {
                return back()->withErrors(['image' => 'Failed to upload image']);
            }
            $image_url = Storage::url($path);
        }

        dd($image_url);
    }

    public function like(Request $request, Puppy $puppy)
    {
        sleep(1);
        $puppy->likedBy()->toggle($request->user()->id);

        return back();
    }
}
