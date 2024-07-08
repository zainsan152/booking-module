<?php

namespace App\Repositories;

use App\Models\Booking;

class BookingRepository implements BookingRepositoryInterface
{
    public function create(array $data)
    {
        return Booking::create($data);
    }

    public function getAll()
    {
        return Booking::all();
    }

    public function getById($id)
    {
        return Booking::find($id);
    }

    public function update($id, array $data)
    {
        $booking = Booking::find($id);
        $booking->update($data);
        return $booking;
    }

    public function delete($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return $booking;
    }
}
