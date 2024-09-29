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
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('motorbike_id')->nullable();
            $table->string('pick_up_location');
            $table->string('drop_off_location');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('pre_rental_image')->nullable();
            $table->string('driver_license');

            // $table->text('note')->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->string('status')->comment("Complete, Unpaid, Paid, Canceled, ...");
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('motorbike_id')->references('id')->on('motorbikes')->onDelete('set null');
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
