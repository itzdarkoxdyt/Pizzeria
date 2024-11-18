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
        Schema::create('extra_ingredients', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment
            $table->string('name', 255); // Nombre del ingrediente extra
            $table->decimal('price', 8, 2); // Precio del ingrediente extra con dos decimales
            $table->timestamps(); // Crea automáticamente created_at y updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extra_ingredients');
    }
};
