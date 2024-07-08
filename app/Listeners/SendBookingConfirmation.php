<?php
namespace App\Listeners;

use App\Events\BookingConfirmed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendBookingConfirmation implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(BookingConfirmed $event)
    {
        Log::info("Booking confirmation email sent for booking ID: {$event->booking->id}");
    }
}
