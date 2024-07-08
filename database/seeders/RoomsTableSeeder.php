<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('rooms')->delete();

        // Assuming you have hotel IDs from 1 to 5
        $rooms = [
            ['hotel_id' => 1, 'type' => 'Single', 'price' => 100.00, 'availability' => true, 'description' => 'A perfect choice for solo travelers.'],
            ['hotel_id' => 1, 'type' => 'Double', 'price' => 150.00, 'availability' => true, 'description' => 'Ideal for couples or friends traveling together.'],
            ['hotel_id' => 2, 'type' => 'Suite', 'price' => 300.00, 'availability' => false, 'description' => 'Luxurious suite with extra amenities and space.'],
            ['hotel_id' => 2, 'type' => 'Single', 'price' => 120.00, 'availability' => true, 'description' => 'Comfortable and affordable, perfect for short stays.'],
            ['hotel_id' => 3, 'type' => 'Double', 'price' => 200.00, 'availability' => true, 'description' => 'Spacious room with beautiful views.'],
            ['hotel_id' => 4, 'type' => 'Suite', 'price' => 400.00, 'availability' => true, 'description' => 'A top-tier suite with top-of-the-line furnishings.'],
            ['hotel_id' => 5, 'type' => 'Double', 'price' => 180.00, 'availability' => true, 'description' => 'Modern amenities and close to downtown attractions.']
        ];

        // Insert the room data into the database
        foreach ($rooms as $room) {
            DB::table('rooms')->insert([
                'hotel_id' => $room['hotel_id'],
                'type' => $room['type'],
                'price' => $room['price'],
                'availability' => $room['availability'],
                'description' => $room['description'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
