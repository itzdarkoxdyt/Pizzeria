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
        Schema::create('raw_materials', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment
            $table->string('name', 255); // Nombre de la materia prima
            $table->string('unit', 50); // Unidad de medida
            $table->decimal('current_stock', 8, 2); // Stock actual con hasta 8 dígitos totales y 2 decimales
    
            $table->timestamps(); // Crea automáticamente created_at y updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raw_materials');
    }
};
