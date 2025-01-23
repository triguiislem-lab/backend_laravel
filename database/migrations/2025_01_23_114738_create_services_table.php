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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('Nom_service');
            $table->string('description_service');
            #$table->foreign('volclass_id')->references('id')->on('vol_classes');
            $table->foreignId('classe_vols_id')->constrained();
           #$table->foreignId('ClasseVol_id')->constrained('ClasseVol')->onDelete('cascade');
           # $table->foreign('ClasseVol_id')->references('id')->on('classe_vols');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
