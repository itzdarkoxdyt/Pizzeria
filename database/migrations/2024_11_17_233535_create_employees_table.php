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
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign Key, referencia a users.id
            $table->enum('position', ['cajero', 'administrador', 'cocinero', 'mensajero']); // Enum para el puesto del empleado
            $table->string('identification_number', 20); // Número de identificación
            $table->decimal('salary', 8, 2); // Salario con dos decimales
            $table->date('hire_date'); // Fecha de contratación
            $table->timestamps(); // Crea automáticamente created_at y updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
