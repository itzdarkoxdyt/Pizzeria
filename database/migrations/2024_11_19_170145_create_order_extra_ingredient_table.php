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
        Schema::create('order_extra_ingredient', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Foreign Key, referencia a orders.id
            $table->foreignId('extra_ingredient_id')->constrained('extra_ingredients')->onDelete('cascade'); // Foreign Key, referencia a extra_ingredients.id
            $table->integer('quantity'); // Cantidad de ingredientes extra
    
            $table->timestamps(); // Crea automáticamente created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_extra_ingredient');
    }
};
