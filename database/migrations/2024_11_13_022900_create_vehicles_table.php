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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name");
            $table->string("model");
            $table->year("year");
            $table->string("license_plate")->unique();
            $table->decimal("price_per_day", 10, 2);
            $table->enum('status', ['available', 'rented', 'maintenance'])->default("available");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
