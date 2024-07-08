<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Booking;
use App\Models\User;
use App\Models\Room;
use App\Events\BookingConfirmed;
use App\Events\BookingCancelled;
use Illuminate\Support\Facades\Event;

class BookingEventTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function booking_creation_fires_booking_confirmed_event()
    {
        Event::fake();

        $user = User::factory()->create();
        $room = Room::factory()->create();

        Booking::create([
            'user_id' => $user->id,
            'room_id' => $room->id,
            'check_in_date' => now()->addDays(1),
            'check_out_date' => now()->addDays(5),
            'total_price' => 200.00,
            'status' => 'confirmed'
        ]);

        Event::assertDispatched(BookingConfirmed::class);
    }

    /** @test */
    public function booking_deletion_fires_booking_cancelled_event()
    {
        Event::fake();

        $booking = Booking::factory()->create();

        $booking->delete();

        Event::assertDispatched(BookingCancelled::class);
    }
}
