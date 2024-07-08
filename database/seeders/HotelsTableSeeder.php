<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelsTableSeeder extends Seeder
{
    public function run()
    {
        // Clear the old records to avoid duplicates
        DB::table('hotels')->delete();

        // Define a list of sample hotels
        $hotels = [
            [
                'name' => 'Grand Central Hotel',
                'description' => 'Located in the heart of the city with easy access to all major attractions.',
                'location' => 'Central City',
                'stars' => 5
            ],
            [
                'name' => 'Airport Inn',
                'description' => 'A convenient stay right next to the airport. Perfect for layovers.',
                'location' => 'Near Airport',
                'stars' => 3
            ],
            [
                'name' => 'Seaside Resort',
                'description' => 'Enjoy breathtaking views and relax by the sea at our exclusive resort.',
                'location' => 'Beachfront',
                'stars' => 4
            ],
            [
                'name' => 'Mountain Retreat',
                'description' => 'Escape the hustle and bustle of city life with a retreat to our mountain lodge.',
                'location' => 'Mountain Range',
                'stars' => 4
            ],
            [
                'name' => 'Downtown Boutique Hotel',
                'description' => 'A stylish boutique hotel located right in the downtown shopping district.',
                'location' => 'Downtown',
                'stars' => 4
            ]
        ];

        // Insert the hotels into the database
        foreach ($hotels as $hotel) {
            DB::table('hotels')->insert([
                'name' => $hotel['name'],
                'description' => $hotel['description'],
                'location' => $hotel['location'],
                'stars' => $hotel['stars'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
