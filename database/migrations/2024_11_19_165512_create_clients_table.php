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
        Schema::create('clients', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign Key, referencia a users.id
            $table->string('address', 255)->nullable(); // Dirección, puede ser nulo
            $table->string('phone', 20)->nullable(); // Teléfono, puede ser nulo
            $table->timestamps(); // Crea automáticamente created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
