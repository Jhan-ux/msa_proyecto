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
        Schema::create('reclamaciones', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_persona', ['natural', 'juridica'])->default('natural');
            $table->string('tipo_documento', 20);
            $table->string('nro_documento', 20);
            $table->string('nombre');
            $table->string('ap_paterno');
            $table->string('ap_materno')->nullable();
            $table->string('placa', 20)->nullable();
            $table->string('tipo_respuesta', 20)->default('email');
            $table->string('direccion')->nullable();
            $table->string('departamento')->nullable();
            $table->string('provincia')->nullable();
            $table->string('distrito')->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('email');
            $table->string('tienda')->nullable();
            $table->string('area')->nullable();
            $table->string('tipo_bien', 20)->nullable();
            $table->decimal('monto', 10, 2)->nullable();
            $table->text('descripcion');
            $table->string('nro_reclamo', 30)->nullable();
            $table->enum('estado', ['pendiente', 'en_proceso', 'resuelto'])->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reclamacions');
    }
};
