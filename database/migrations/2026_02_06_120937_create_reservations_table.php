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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // --- THE FIX STARTS HERE ---
            // 1. Remove "constrained()" so it doesn't look for an 'accommodations' table
            $table->unsignedBigInteger('accommodation_id'); 
            
            // 2. Add a type column so we know if it's a 'room' or 'venue'
            $table->string('type'); 
            // --- THE FIX ENDS HERE ---

            $table->date('check_in');
            $table->date('check_out');
            $table->integer('pax');
            $table->decimal('total_amount', 10, 2);
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('reservations');
    }
};
