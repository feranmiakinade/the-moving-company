<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'email' => 'required|email|max:255',
            'vehicle' => 'required|string|max:255',
            'pickup_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:pickup_date',
            'pickup_location' => 'required|string|max:255',
            'notes' => 'nullable|string|max:2000',
        ]);

        $rates = [
            'Toyota Prado' => 135000,
            'Lexus GX 460' => 150000,
            'Lexus ES 350' => 100000,
        ];

        if (!isset($rates[$validated['vehicle']])) {
            return back()->withErrors([
                'vehicle' => 'The selected vehicle is not available.'
            ])->withInput();
        }

        $dailyRate = $rates[$validated['vehicle']];

        $pickupDate = new \DateTime($validated['pickup_date']);
        $returnDate = new \DateTime($validated['return_date']);

        $days = $pickupDate->diff($returnDate)->days + 1;

        $totalAmount = $dailyRate * $days;

        $booking = Booking::create([
            ...$validated,
            'daily_rate' => $dailyRate,
            'total_amount' => $totalAmount,
        ]);

        return redirect('/book')->with(
            'success',
            'Booking request received. Your total is ₦' . number_format($totalAmount)
        );
    }
}