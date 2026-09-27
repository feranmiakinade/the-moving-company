<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('index');
});
Route::get('/book', function () {
    return view('book');
});
Route::post('/book', [BookingController::class, 'store'])->name('booking.store');
Route::get('/payment/callback', [BookingController::class, 'callback'])->name('payment.callback');