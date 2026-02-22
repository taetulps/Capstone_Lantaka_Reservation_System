<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_reservations', function (Blueprint $table) {
            $table->id('food_reservation_id'); // Matches your ERD
            $table->unsignedBigInteger('food_id');
            $table->unsignedBigInteger('venue_reservation_id'); 
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('staff_id')->nullable();
            $table->string('status', 20)->default('available');
            $table->time('serving_time')->nullable();
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_reservations');
    }
};
