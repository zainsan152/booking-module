<?php
namespace App\Listeners;

use App\Events\BookingCancelled;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendBookingCancellation implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(BookingCancelled $event)
    {
        Log::info("Booking cancellation notification sent for booking ID: {$event->booking->id}");
    }
}
