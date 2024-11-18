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
    Schema::create('users', function (Blueprint $table) {
        $table->id(); // Primary Key, Auto Increment
        $table->string('name', 255); // Nombre del usuario
        $table->string('email', 255)->unique(); // Email único
        $table->string('password', 255); // Contraseña
        $table->enum('role', ['cliente', 'empleado']); // Enum para rol
        $table->timestamps(); // Crea automáticamente created_at y updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
