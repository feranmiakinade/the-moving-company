<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->string('full_name');
            $table->string('phone');
            $table->string('email');

            $table->string('vehicle');
            $table->date('pickup_date');
            $table->date('return_date');

            $table->string('pickup_location');
            $table->text('notes')->nullable();

            $table->decimal('daily_rate', 12, 2);
            $table->decimal('total_amount', 12, 2);

            $table->string('payment_reference')->nullable();
            $table->string('payment_status')->default('pending');
            $table->string('booking_status')->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};