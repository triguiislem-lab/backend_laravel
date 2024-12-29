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
        Schema::create('vols', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('numero_vol');
            $table->string('ville_depart');
            $table->string('ville_arrivee');
            $table->dateTime('date_depart');
            $table->dateTime('date_arrivee');
            $table->integer('nombre_place');
            $table->string('type_vol');
            $table->string('statut');
            $table->double('prix');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vols');
    }
};
