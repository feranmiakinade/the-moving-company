<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'vehicle',
        'pickup_date',
        'return_date',
        'pickup_location',
        'notes',
        'daily_rate',
        'total_amount',
        'payment_reference',
        'payment_status',
        'booking_status',
    ];

    protected $casts = [
        'pickup_date' => 'date',
        'return_date' => 'date',
        'daily_rate' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];
}