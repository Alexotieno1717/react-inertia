<?php

namespace Database\Seeders;

use App\Models\Puppy;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PuppySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $puppies = [
            [
                "name" => "Frisket",
                "trait" => "Mother of all pups",
                "image" => "1.jpg",
            ],
            [
                "name" => "Chase",
                "trait" => "Very good boi",
                "image" => "2.jpg",
            ],
            [
                "name" => "Leia",
                "trait" => "Enjoys naps",
                "image" => "3.jpg",
            ],
            [
                "name" => "Pupi",
                "trait" => "Loves cheese",
                "image" => "4.jpg",
            ],
            [
                "name" => "Russ",
                "trait" => "Ready to save the world",
                "image" => "5.jpg",
            ],
            [
                "name" => "Yoko",
                "trait" => "Ready for anything",
                "image" => "6.jpg",
            ],
            // ... more puppies
        ];

        $user = User::first();

        foreach ($puppies as $puppy) {
            Puppy::create([
                'user_id'   => $user->id,
                'name'      => $puppy['name'],
                'trait'     => $puppy['trait'],
                'image_url' => '/images/' . $puppy['image'],
            ]);
        }
    }
}
