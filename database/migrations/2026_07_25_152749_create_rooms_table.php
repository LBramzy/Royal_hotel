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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('room_name');
            $table->string('room_number');
            $table->string('room_price');
            $table->string('room_number_of_beds');
            $table->boolean('room_occupied')->default(0);
            $table->enum('room_status', ['available', 'unavailable', 'maintenance'])->default('available');
            $table->string('booking_id_number')->nullable();
            $table->dateTime('booking_expiration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
