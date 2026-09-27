<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
            'payment_status' => 'pending',
            'booking_status' => 'pending',
        ]);

        $payment = Http::withToken(config('services.paystack.secret_key'))
            ->post('https://api.paystack.co/transaction/initialize', [
                'email' => $validated['email'],
                'amount' => $totalAmount * 100,
                'callback_url' => route('payment.callback'),
                'metadata' => [
                    'booking_id' => $booking->id,
                ],
            ]);

                    if (!$payment->successful() || !$payment->json('status')) {
                    return back()->withErrors([
                    'payment' => 'Unable to initialize payment. Please try again.'
                ])->withInput();
             }

        $paymentData = $payment->json('data');

        $booking->update([
            'payment_reference' => $paymentData['reference'],
        ]);

        return redirect($paymentData['authorization_url']);
    }

    public function callback(Request $request)
    {
        $reference = $request->query('reference');

        if (!$reference) {
            return redirect('/book')->withErrors([
                'payment' => 'Payment reference was not provided.'
            ]);
        }

        $response = Http::withToken(config('services.paystack.secret_key'))
            ->get('https://api.paystack.co/transaction/verify/' . $reference);

        if (!$response->successful() || !$response->json('status')) {
            return redirect('/book')->withErrors([
                'payment' => 'Unable to verify payment.'
            ]);
        }

        $paymentData = $response->json('data');

        if ($paymentData['status'] !== 'success') {
            return redirect('/book')->withErrors([
                'payment' => 'Payment was not successful.'
            ]);
        }

        $booking = Booking::where('payment_reference', $reference)->first();

        if (!$booking) {
            return redirect('/book')->withErrors([
                'payment' => 'Booking could not be found.'
            ]);
        }

        $expectedAmount = (int) ($booking->total_amount * 100);

        if ((int) $paymentData['amount'] !== $expectedAmount) {
            return redirect('/book')->withErrors([
                'payment' => 'Payment amount could not be verified.'
            ]);
        }

        $booking->update([
            'payment_status' => 'paid',
            'booking_status' => 'confirmed',
        ]);

        return view('payment-success', [
            'booking' => $booking,
        ]);
    }
}