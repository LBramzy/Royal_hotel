<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users');
            $table->string('booking_id_number')->nullable();
            $table->string('booking_amount')->nullable();
            $table->string('booking_days')->nullable();
            $table->dateTime('booking_expiration')->nullable();
            $table->string('booked_room_name')->nullable();
            $table->string('booked_room_number')->nullable();
            $table->string('booked_user_name')->nullable();
            $table->string('booked_user_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
