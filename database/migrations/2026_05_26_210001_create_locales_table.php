<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('locales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');               // "Sede Cajamarca"
            $table->string('ciudad');               // "Cajamarca"
            $table->string('direccion');
            $table->string('telefono', 30)->nullable();
            $table->string('whatsapp', 30)->nullable();
            $table->string('email', 120)->nullable();
            $table->string('horario')->nullable();  // "Lun – Vie: 8am – 6pm | Sáb: 8am – 1pm"
            $table->text('mapa_embed')->nullable(); // URL o iframe de Google Maps
            $table->string('imagen')->nullable();
            $table->boolean('activo')->default(true);
            $table->unsignedSmallInteger('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locales');
    }
};
