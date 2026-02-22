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
        Schema::create('food', function (Blueprint $table) {
            $table->id('food_id'); 
            $table->unsignedBigInteger('admin_id')->nullable(); 
            $table->string('food_name', 50);
            $table->string('food_category', 50); // e.g., breakfast, lunch, snack
            $table->decimal('food_price', 10, 2);
            $table->string('status', 20)->default('available'); // Add this line!
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
        Schema::dropIfExists('food');
    }
};
