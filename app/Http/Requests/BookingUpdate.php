<?php

// BookingUpdate.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route('booking'); // Get the booking ID from the route

        return [
            'name' => 'required',
            'email' => 'required|email|unique:bookings,email,' . $id,
            'booking_type' => 'required|in:Full Day,Half Day',
            'booking_date' => 'required|date',
            'booking_slot' => 'required|in:Morning,Evening',
            'booking_time' => 'required|date_format:H:i:s',
        ];
    }
}
