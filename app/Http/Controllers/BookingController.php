<?php
namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Resources\BookingResource;
use App\Repositories\BookingRepositoryInterface;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function index()
    {
        $bookings = $this->bookingRepository->getAll();
        return BookingResource::collection($bookings);
    }

    public function store(BookingRequest $request)
    {
        $validated = $request->validated();
        $booking = $this->bookingRepository->create($validated);
        return new BookingResource($booking);
    }

    public function show($id)
    {
        $booking = $this->bookingRepository->getById($id);
        if (!$booking) {
            return response()->json(['error' => 'Booking not found'], 404);
        }
        return new BookingResource($booking);
    }

    public function update(BookingRequest $request, $id)
    {
        $validated = $request->validated();
        $booking = $this->bookingRepository->update($id, $validated);
        if (!$booking) {
            return response()->json(['error' => 'Booking not found'], 404);
        }
        return new BookingResource($booking);
    }

    public function destroy($id)
    {
        $booking = $this->bookingRepository->delete($id);
        if (!$booking) {
            return response()->json(['error' => 'Booking not found'], 404);
        }
        return response()->json(['message' => 'Booking deleted successfully']);
    }
}
