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
        Schema::create('room_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
            $table->boolean('wifi')->nullable()->default(0);
            $table->boolean('air_conditioning')->nullable()->default(0);
            $table->boolean('smart_tv')->nullable()->default(0);
            $table->boolean('complementary_breakfast')->nullable()->default(0);
            $table->boolean('daily_housekeeping')->nullable()->default(0);
            $table->boolean('work_desk')->nullable()->default(0);
            $table->boolean('room_service')->nullable()->default(0);
            $table->boolean('pool_access')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_features');
    }
};
