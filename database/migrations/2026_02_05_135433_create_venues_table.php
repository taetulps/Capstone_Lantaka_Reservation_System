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
        Schema::create('venues', function (Blueprint $table) {
            $table->id(); // This creates 'id'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // ATTRIBUTES
            $table->string('name');              // Venue Name (e.g., "Hall A")
            $table->string('image')->nullable();
            $table->integer('capacity');
            $table->string('status')->default('Available');
            $table->decimal('price', 10, 2);
            $table->decimal('external_price', 10, 2);

            $table->text('description')->nullable();
            
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
        Schema::dropIfExists('venues');
    }
};
