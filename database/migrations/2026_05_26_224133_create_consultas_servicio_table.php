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
        Schema::create('consultas_servicio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicio_id')->nullable()->constrained('servicios')->nullOnDelete();
            $table->string('servicio_nombre');          // snapshot del nombre
            $table->string('nombre');
            $table->string('email');
            $table->string('telefono', 20)->nullable();
            $table->string('vehiculo')->nullable();
            $table->text('mensaje')->nullable();
            $table->enum('estado', ['nuevo', 'en_revision', 'respondido'])->default('nuevo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas_servicio');
    }
};
