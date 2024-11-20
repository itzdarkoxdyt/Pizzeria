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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade'); // Foreign Key, referencia a clients.id
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade'); // Foreign Key, referencia a branches.id
            $table->decimal('total_price', 8, 2); // Precio total con dos decimales
            $table->enum('status', ['pendiente', 'en_preparacion', 'listo', 'entregado']); // Estado del pedido
            $table->enum('delivery_type', ['en_local', 'a_domicilio']); // Tipo de entrega
            $table->foreignId('delivery_person_id')->nullable()->constrained('employees')->onDelete('set null'); // Clave foránea, nullable
    
            $table->timestamps(); // Crea automáticamente created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
