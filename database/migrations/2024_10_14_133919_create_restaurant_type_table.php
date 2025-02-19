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
        Schema::create('restaurant_type', function (Blueprint $table) {
            // Definizione delle colonne per le chiavi esterne
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('type_id');

            // Definizione delle foreign key con cancellazione in cascata
            $table->foreign('restaurant_id')
                ->references('id')
                ->on('restaurants')
                ->cascadeOnDelete();

            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_type');
    }
};
