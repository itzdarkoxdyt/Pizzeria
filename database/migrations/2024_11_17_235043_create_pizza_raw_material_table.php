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
        Schema::create('pizza_raw_material', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment
            $table->foreignId('pizza_id')->constrained('pizzas')->onDelete('cascade'); // Foreign Key, referencia a pizzas.id
            $table->foreignId('raw_material_id')->constrained('raw_materials')->onDelete('cascade'); // Foreign Key, referencia a raw_materials.id
            $table->decimal('quantity', 8, 2); // Cantidad de materia prima utilizada
    
            $table->timestamps(); // Crea automáticamente created_at y updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizza_raw_material');
    }
};
