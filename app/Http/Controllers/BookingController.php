<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\User;

class BookingController extends Controller
{
    public function index()
    {
        $users = User::all();
        $bookings = Booking::all();
        return view('pages/booking.index', compact('users', 'bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'customer_phone' => 'required|string|max:255',
            'booking_datetime' => 'required|date',
            'status' => 'required|in:pending,confirmed,cancelled,done',
            'note' => 'nullable|string',
        ]);

        try {
            Booking::create($request->all());
            return redirect()->route('bookings.index')->with('message', 'Booking created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('bookings.index')->with('error', 'Failed to create booking.');
        }
    }

    public function create()
    {
        return view('bookings.create');
    }

    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'customer_phone' => 'required|string|max:15',
            'booking_datetime' => 'required|date',
            'status' => 'required|in:pending,confirmed,cancelled,done',
            'note' => 'nullable|string',
        ]);

        try {
            $booking->update($request->all());
            return redirect()->route('bookings.index')->with('message', 'Booking updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('bookings.index')->with('error', 'Failed to update booking.');
        }
    }

    public function destroy(Booking $booking)
    {
        try {
            $booking->delete();
            return redirect()->route('bookings.index')->with('message', 'Booking deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('bookings.index')->with('error', 'Failed to delete booking.');
        }
    }
}
