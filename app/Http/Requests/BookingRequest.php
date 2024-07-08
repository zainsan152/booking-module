<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Only allow authenticated users to make a booking
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_price' => 'required|numeric',
            'status' => 'required|in:pending,confirmed,cancelled'
        ];
    }

    /**
     * Custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_id.required' => 'A user ID is required for the booking.',
            'user_id.exists' => 'The provided user ID does not exist in our records.',
            'room_id.required' => 'A room ID is required for the booking.',
            'room_id.exists' => 'The selected room does not exist.',
            'check_in_date.required' => 'Please specify the check-in date.',
            'check_out_date.required' => 'Please specify the check-out date.',
            'total_price.required' => 'The total price of the booking is required.',
            'status.required' => 'You must specify the booking status.',
            'status.in' => 'Invalid booking status. Valid statuses are pending, confirmed, or cancelled.',
        ];
    }
}
