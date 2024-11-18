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
        Schema::create('pizza_size', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment
            $table->foreignId('pizza_id')->constrained('pizzas')->onDelete('cascade'); // Foreign Key, referencia a pizzas.id
            $table->enum('size', ['pequeña', 'mediana', 'grande']); // Tamaño de la pizza
            $table->decimal('price', 8, 2); // Precio con dos decimales
            $table->timestamps(); // Crea automáticamente created_at y updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizza_size');
    }
};
