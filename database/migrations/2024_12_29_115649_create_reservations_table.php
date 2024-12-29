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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            #$table->timestamps();
            $table->integer('nombre_place_reservé');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('vol_id')->constrained()->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
