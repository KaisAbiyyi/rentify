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
        Schema::create('rentals', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid('user_id');
            $table->uuid('vehicle_id');
            $table->uuid('pickup_location_id');
            $table->uuid('return_location_id');
            $table->date('pickup_date');
            $table->date('return_date');
            $table->enum('status', ['pending', 'ongoing', 'completed'])->default('pending'); // ENUM untuk status penyewaan
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->foreign('pickup_location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('return_location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
