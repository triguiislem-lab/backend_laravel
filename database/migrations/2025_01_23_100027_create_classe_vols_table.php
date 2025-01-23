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
        Schema::create('classe_vols', function (Blueprint $table) {
            $table->id();
            $table->string('Nom_classe');
            $table->string('description_classe');
            $table->integer('nombre_places')->nullable();
            $table->foreignId('vol_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classe_vols');
    }
};
