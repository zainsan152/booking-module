<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Booking;
use App\Models\Room;

class BookingControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_booking()
    {
        $user = User::factory()->create();
        $room = Room::factory()->create(['availability' => true]);

        $response = $this->actingAs($user)->post('/api/bookings', [
            'user_id' => $user->id,
            'room_id' => $room->id,
            'check_in_date' => '2024-01-01',
            'check_out_date' => '2024-01-05',
            'total_price' => 299.99,
            'status' => 'confirmed'
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('bookings', ['user_id' => $user->id]);
    }

    /** @test */
    public function a_user_can_view_a_booking()
    {
        $booking = Booking::factory()->create();

        $response = $this->actingAs($booking->user)->get('/api/bookings/' . $booking->id);

        $response->assertOk();
        $response->assertJson($booking->toArray());
    }

    /** @test */
    public function a_user_can_update_a_booking()
    {
        $booking = Booking::factory()->create(['status' => 'pending']);
        $updatedDate = '2024-02-01';

        $response = $this->actingAs($booking->user)->put('/api/bookings/' . $booking->id, [
            'check_in_date' => $updatedDate
        ]);

        $response->assertOk();
        $this->assertDatabaseHas('bookings', [
            'id' => $booking->id,
            'check_in_date' => $updatedDate
        ]);
    }

    /** @test */
    public function a_user_can_delete_a_booking()
    {
        $booking = Booking::factory()->create();

        $response = $this->actingAs($booking->user)->delete('/api/bookings/' . $booking->id);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('bookings', ['id' => $booking->id]);
    }
}
