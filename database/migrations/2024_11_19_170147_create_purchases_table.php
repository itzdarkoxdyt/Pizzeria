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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade'); // Foreign Key, referencia a suppliers.id
            $table->foreignId('raw_material_id')->constrained('raw_materials')->onDelete('cascade'); // Foreign Key, referencia a raw_materials.id
            $table->decimal('quantity', 8, 2); // Cantidad de materia prima comprada
            $table->decimal('purchase_price', 8, 2); // Precio de compra de la materia prima
            $table->timestamp('purchase_date'); // Fecha de compra
    
            $table->timestamps(); // Crea automáticamente created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
