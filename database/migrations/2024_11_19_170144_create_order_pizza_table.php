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
        Schema::create('order_pizza', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Foreign Key, referencia a orders.id
            $table->foreignId('pizza_size_id')->constrained('pizza_size')->onDelete('cascade'); // Foreign Key, referencia a pizza_size.id
            $table->integer('quantity'); // Cantidad de pizzas
    
            $table->timestamps(); // Crea automáticamente created_at y updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_pizza');
    }
};
