<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('motorbikes', function (Blueprint $table) {
            $table->id();
            $table->string('license_plate')->unique();
            $table->string('brand')->nullable();
            $table->string('model');
            $table->text('description');
            // $table->decimal('price_per_hour', 10, 2);
            $table->decimal('price_per_day', 10, 2);
            $table->string('status')->default('Available')->comment("Renting; Available, Disable");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorbikes');
    }
};
