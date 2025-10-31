<?php

namespace App\Actions;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;

class OptimizeImageAction
{
    /**
     * Create a new class instance.
     */
    public function handle(string $input): array
    {
        $manager = new ImageManager(new Driver());
        $image = $manager->read($input);


        if ($image->width() > 1000){
            $image->scale(width: 1000);
        }

        $encoded = $image->toWebp(quality: 95)->toString();

        $fileName = Str::random() . '.webp';

        return ['webString' =>$encoded, 'fileName' => $fileName];
    }
}
