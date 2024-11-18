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
        Schema::create('pizza_ingredient', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment
            $table->foreignId('pizza_id')->constrained('pizzas')->onDelete('cascade'); // Foreign Key, referencia a pizzas.id
            $table->foreignId('ingredient_id')->constrained('ingredients')->onDelete('cascade'); // Foreign Key, referencia a ingredients.id
            $table->timestamps(); // Crea automáticamente created_at y updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizza_ingredient');
    }
};
