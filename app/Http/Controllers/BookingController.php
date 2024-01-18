<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\BookingUpdate;

use App\Models\Booking;

class BookingController extends Controller
{
    
    public function index()
    {
        $bookings = Booking::all()->reverse();
        return view('Booking.list', compact('bookings'));
 
    }

     
    public function create()
    {
        return view('Booking.add');
    }
      
 
    public function store(BookingRequest $request)
    {
   
    echo "Tests";
     
    //    try {
    //     // Rule 1: Check if full day is booked for one date, no other type of booking is allowed
    //     $existingFullDayBooking = Booking::where('booking_date', $request->booking_date)
    //         ->where('booking_type', 'Full Day')
    //         ->first();

    //     if ($existingFullDayBooking) {
    //         return redirect()->route('bookings.create')->with('error', 'Full day booking already exists for this date.');
    //     }

    //     // Rule 2: If half day is booked, then full day booking is not possible
    //     if ($request->booking_type == 'Full Day') {
    //         $existingHalfDayBooking = Booking::where('booking_date', $request->booking_date)
    //             ->where('booking_type', 'Half Day')
    //             ->first();

    //         if ($existingHalfDayBooking) {
    //             return redirect()->route('bookings.create')->with('error', 'Half day booking already exists for this date.');
    //         }
    //     }

    //     // Rule 3: If half day booked for Morning, then Morning is not allowed for other booking, vice versa for Evening
    //     $existingMorningBooking = Booking::where('booking_date', $request->booking_date)
    //         ->where('booking_slot', 'Morning')
    //         ->first();

    //     $existingEveningBooking = Booking::where('booking_date', $request->booking_date)
    //         ->where('booking_slot', 'Evening')
    //         ->first();

    //     if ($request->booking_slot == 'Morning' && ($existingMorningBooking || $existingEveningBooking)) {
    //         return redirect()->route('bookings.create')->with('error', 'Morning slot is not available for booking on this date.');
    //     }

    //     if ($request->booking_slot == 'Evening' && ($existingMorningBooking || $existingEveningBooking)) {
    //         return redirect()->route('bookings.create')->with('error', 'Evening slot is not available for booking on this date.');
    //     }

    //     // Rule 4: No duplicate booking is possible in any way
    //     $existingBooking = Booking::where('name', $request->name)
    //         ->where('email', $request->email)
    //         ->where('booking_type', $request->booking_type)
    //         ->where('booking_date', $request->booking_date)
    //         ->where('booking_slot', $request->booking_slot)
    //         ->where('booking_time', $request->booking_time)
    //         ->first();

    //     if ($existingBooking) {
    //         return redirect()->route('bookings.create')->with('error', 'Duplicate booking is not allowed.');
    //     }

    //     // Save the booking if all rules pass
    //     Booking::create($request->all());

    //     return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');   
    // } catch (\Exception $e) {
    //     // Log the exception for further investigation
    //     \Log::error('Failed to create booking: ' . $e->getMessage());

    //     return redirect()->route('bookings.create')->with('error', 'Failed to create booking.');
    // }
    }

 
    public function edit($id)
    {
        try {
            $bookings = Booking::findOrFail($id);
            return view('Booking.edit', compact('bookings'));
        } catch (ModelNotFoundException $e) {
            
            return redirect()->route('bookings.index')->with('error', 'Booking not found.');
        }
    }
    
    public function update(BookingUpdate $request, $id)
    {
        try {
            $booking = Booking::findOrFail($id);
    
            $booking->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'booking_type' => $request->input('booking_type'),
                'booking_date' => $request->input('booking_date'),
                'booking_slot' => $request->input('booking_slot'),
                'booking_time' => $request->input('booking_time'),
            ]);
    
            return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
        } catch (\Exception $e) {
            \Log::error('Failed to update booking: ' . $e->getMessage());
            return redirect()->route('bookings.index')->with('error', 'Failed to update booking.');
        }
    }
    

    
    public function destroy($id)
    {
        try {
            // Find the booking by ID
            $booking = Booking::findOrFail($id);
    
            // Delete the booking
            $booking->delete();
    
            return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
        } catch (\Exception $e) {
           
            \Log::error('Failed to delete booking: ' . $e->getMessage());
    
            return redirect()->route('bookings.index')->with('error', 'Failed to delete booking.');
        }
    }
}
