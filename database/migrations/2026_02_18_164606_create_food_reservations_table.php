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
    public function foods()
    {
        return $this->belongsToMany(
            Food::class, 
            'food_reservations',    // 1. The table name
            'venue_reservation_id', // 2. The column pointing to the Reservation
            'food_id'               // 3. The column pointing to the Food
        );
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
