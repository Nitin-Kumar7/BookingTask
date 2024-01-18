<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $bookingId = $this->route('booking');
        return [
            'name' => 'required',
            'email' => 'required|email|unique:bookings,email,' . $bookingId,
            'booking_type' => 'required|in:Full Day,Half Day',
            'booking_date' => 'required|date',
            'booking_slot' => 'required|in:Morning,Evening',
            'booking_time' => 'required|date_format:H:i',
        ];
    }
    
}
