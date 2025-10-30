<?php

namespace Database\Seeders;

use App\Models\Puppy;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PuppySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $puppies = [
            ["name" => "Frisket", "trait" => "Mother of all pups", "image" => "1.jpg"],
            ["name" => "Chase", "trait" => "Very good boi", "image" => "2.jpg"],
            ["name" => "Leia", "trait" => "Enjoys naps", "image" => "3.jpg"],
            ["name" => "Pupi", "trait" => "Loves cheese", "image" => "4.jpg"],
            ["name" => "Russ", "trait" => "Ready to save the world", "image" => "5.jpg"],
            ["name" => "Yoko", "trait" => "Ready for anything", "image" => "6.jpg"],
            ["name" => "Max", "trait" => "Always chasing his tail", "image" => "7.jpg"],
            ["name" => "Bella", "trait" => "Queen of cuddles", "image" => "8.jpg"],
            ["name" => "Rocky", "trait" => "Fearless explorer", "image" => "9.jpg"],
            ["name" => "Luna", "trait" => "Dreams all day", "image" => "10.jpg"],
            ["name" => "Charlie", "trait" => "The treat master", "image" => "11.jpg"],
            ["name" => "Daisy", "trait" => "Sunshine in fur", "image" => "12.jpg"],
            ["name" => "Buddy", "trait" => "Fetch champion", "image" => "13.jpg"],
            ["name" => "Milo", "trait" => "Curious and clever", "image" => "14.jpg"],
            ["name" => "Coco", "trait" => "Loves belly rubs", "image" => "15.jpg"],
            ["name" => "Ruby", "trait" => "Small but mighty", "image" => "16.jpg"],
            ["name" => "Zoe", "trait" => "Fast as lightning", "image" => "17.jpg"],
            ["name" => "Bailey", "trait" => "The loyal guardian", "image" => "18.jpg"],
            ["name" => "Rex", "trait" => "Always on duty", "image" => "19.jpg"],
            ["name" => "Loki", "trait" => "Mischief maker", "image" => "20.jpg"],
            ["name" => "Toby", "trait" => "Friend to everyone", "image" => "21.jpg"],
            ["name" => "Sadie", "trait" => "Loves morning walks", "image" => "22.jpg"],
            ["name" => "Finn", "trait" => "Brave little hero", "image" => "4.jpg"],
            ["name" => "Ellie", "trait" => "Queen of naps", "image" => "7.jpg"],
            ["name" => "Scout", "trait" => "Always sniffing adventure", "image" => "16.jpg"],
            ["name" => "Maggie", "trait" => "Full of joy", "image" => "3.jpg"],
            ["name" => "Bear", "trait" => "Loves big hugs", "image" => "5.jpg"],
            ["name" => "Nala", "trait" => "Graceful and kind", "image" => "9.jpg"],
            ["name" => "Jax", "trait" => "The energetic one", "image" => "11.jpg"],
            ["name" => "Olive", "trait" => "Smart cookie", "image" => "8.jpg"],
            ["name" => "Cooper", "trait" => "Tail wagger supreme", "image" => "12.jpg"],
            ["name" => "Hazel", "trait" => "Sweet as honey", "image" => "13.jpg"],
            ["name" => "Riley", "trait" => "Always smiling", "image" => "17.jpg"],
            ["name" => "Harley", "trait" => "Free spirit", "image" => "19.jpg"],
            ["name" => "Mocha", "trait" => "Calm and loving", "image" => "2.jpg"],
            ["name" => "Ace", "trait" => "Top fetcher", "image" => "6.jpg"],
            ["name" => "Lexi", "trait" => "Chases butterflies", "image" => "10.jpg"],
            ["name" => "Winston", "trait" => "Dapper and brave", "image" => "14.jpg"],
            ["name" => "Gigi", "trait" => "Little diva", "image" => "18.jpg"],
            ["name" => "Rocco", "trait" => "Always hungry", "image" => "20.jpg"],
            ["name" => "Zara", "trait" => "Gentle soul", "image" => "15.jpg"],
            ["name" => "Ollie", "trait" => "Loves squeaky toys", "image" => "3.jpg"],
            ["name" => "Penny", "trait" => "Cuddle magnet", "image" => "1.jpg"],
            ["name" => "Diesel", "trait" => "Strong and loyal", "image" => "7.jpg"],
            ["name" => "Rosie", "trait" => "Always wagging", "image" => "13.jpg"],
            ["name" => "Bentley", "trait" => "Classy gentleman", "image" => "8.jpg"],
            ["name" => "Misty", "trait" => "Loves the rain", "image" => "22.jpg"],
            ["name" => "Zeus", "trait" => "Thunderous bark", "image" => "4.jpg"],
            ["name" => "Trixie", "trait" => "Playful troublemaker", "image" => "19.jpg"],
            ["name" => "Arlo", "trait" => "Adventurer pup", "image" => "16.jpg"],
            ["name" => "Mabel", "trait" => "Snuggles all day", "image" => "2.jpg"],
            ["name" => "Bo", "trait" => "Tiny but fierce", "image" => "9.jpg"],
            ["name" => "Izzy", "trait" => "Ball chaser", "image" => "5.jpg"],
            ["name" => "Remy", "trait" => "Chill and cool", "image" => "14.jpg"],
            ["name" => "Simba", "trait" => "Born to lead", "image" => "12.jpg"],
            ["name" => "Lulu", "trait" => "Dances for treats", "image" => "17.jpg"],
            ["name" => "Archie", "trait" => "Always alert", "image" => "20.jpg"],
            ["name" => "Sasha", "trait" => "Quiet thinker", "image" => "10.jpg"],
            ["name" => "Murphy", "trait" => "Sleepyhead", "image" => "6.jpg"],
            ["name" => "Koda", "trait" => "Best friend forever", "image" => "11.jpg"],
            ["name" => "Honey", "trait" => "Golden-hearted", "image" => "21.jpg"],
            ["name" => "Dexter", "trait" => "Fast learner", "image" => "8.jpg"],
            ["name" => "Phoebe", "trait" => "Curly tail wag", "image" => "18.jpg"],
            ["name" => "Jake", "trait" => "Chews everything", "image" => "3.jpg"],
            ["name" => "Nina", "trait" => "Full of sparkle", "image" => "1.jpg"],
            ["name" => "Chip", "trait" => "Loves running circles", "image" => "7.jpg"],
            ["name" => "Cleo", "trait" => "Soft and gentle", "image" => "5.jpg"],
            ["name" => "Oscar", "trait" => "Always curious", "image" => "13.jpg"],
            ["name" => "Teddy", "trait" => "Big cuddler", "image" => "9.jpg"],
            ["name" => "Minnie", "trait" => "Sweetest bark", "image" => "16.jpg"],
            ["name" => "Louie", "trait" => "Guard of the yard", "image" => "22.jpg"],
            ["name" => "Hazzy", "trait" => "Always happy", "image" => "10.jpg"],
            ["name" => "Cali", "trait" => "Beach lover", "image" => "15.jpg"],
            ["name" => "Shadow", "trait" => "Silent observer", "image" => "19.jpg"],
            ["name" => "Nico", "trait" => "Loves midnight walks", "image" => "14.jpg"],
            ["name" => "Juno", "trait" => "Always smiling", "image" => "20.jpg"],
            ["name" => "Skye", "trait" => "Dreams of flying", "image" => "2.jpg"],
            ["name" => "Buster", "trait" => "Ball enthusiast", "image" => "6.jpg"],
            ["name" => "Tango", "trait" => "Dances to any tune", "image" => "8.jpg"],
            ["name" => "Ziggy", "trait" => "Full of energy", "image" => "4.jpg"],
            ["name" => "Mochi", "trait" => "Soft as a cloud", "image" => "12.jpg"],
            ["name" => "Freya", "trait" => "Playground queen", "image" => "17.jpg"],
            ["name" => "Blu", "trait" => "Eyes of the ocean", "image" => "21.jpg"],
        ];


        $user = User::first();

        foreach ($puppies as $puppy) {
            Puppy::create([
                'user_id'   => $user->id,
                'name'      => $puppy['name'],
                'trait'     => $puppy['trait'],
                'image_url' => Storage::url('puppies/' . $puppy['image']),
            ]);
        }
    }
}
