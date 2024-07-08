<?php

namespace App\Observers;

use App\Models\Booking;
use App\Events\BookingConfirmed;
use App\Events\BookingCancelled;

class BookingObserver
{
    public function created(Booking $booking)
    {
        event(new BookingConfirmed($booking));
    }

    public function deleted(Booking $booking)
    {
        event(new BookingCancelled($booking));
    }
}
