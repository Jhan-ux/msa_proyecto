<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promocion_eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicio_id')->nullable()->constrained('servicios')->nullOnDelete();
            $table->string('nombre');
            $table->string('slug')->unique();
            $table->string('descripcion_corta', 220)->nullable();
            $table->text('descripcion_larga')->nullable();
            $table->dateTime('fecha_inicio')->nullable();
            $table->dateTime('fecha_fin')->nullable();
            $table->string('estado', 20)->default('borrador');
            $table->unsignedTinyInteger('max_intentos_por_participante')->default(1);
            $table->unsignedSmallInteger('puntaje_minimo_para_ruleta')->default(0);
            $table->boolean('email_opcional')->default(true);
            $table->boolean('activo')->default(true);
            $table->unsignedSmallInteger('orden')->default(0);
            $table->timestamps();

            $table->index(['activo', 'estado']);
            $table->index(['fecha_inicio', 'fecha_fin']);
        });

        Schema::create('promocion_preguntas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('promocion_eventos')->cascadeOnDelete();
            $table->text('pregunta');
            $table->string('tipo', 20)->default('single');
            $table->unsignedSmallInteger('puntaje')->default(1);
            $table->unsignedSmallInteger('orden')->default(0);
            $table->boolean('activa')->default(true);
            $table->timestamps();

            $table->index(['evento_id', 'activa']);
        });

        Schema::create('promocion_opciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregunta_id')->constrained('promocion_preguntas')->cascadeOnDelete();
            $table->string('texto');
            $table->boolean('es_correcta')->default(false);
            $table->unsignedSmallInteger('orden')->default(0);
            $table->timestamps();

            $table->index(['pregunta_id', 'orden']);
        });

        Schema::create('promocion_premios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('promocion_eventos')->cascadeOnDelete();
            $table->string('nombre');
            $table->string('descripcion', 300)->nullable();
            $table->string('tipo_premio', 30)->default('otro');
            $table->unsignedInteger('stock_total')->default(0);
            $table->unsignedInteger('stock_disponible')->default(0);
            $table->unsignedInteger('probabilidad_peso')->default(1);
            $table->unsignedSmallInteger('puntaje_minimo')->default(0);
            $table->unsignedSmallInteger('puntaje_maximo')->nullable();
            $table->boolean('activo')->default(true);
            $table->unsignedSmallInteger('orden')->default(0);
            $table->timestamps();

            $table->index(['evento_id', 'activo']);
        });

        Schema::create('promocion_participantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('promocion_eventos')->cascadeOnDelete();
            $table->string('nombre', 100);
            $table->string('apellidos', 140);
            $table->string('telefono', 20)->nullable();
            $table->string('email', 150)->nullable();
            $table->boolean('acepta_terminos')->default(false);
            $table->string('ip', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();

            $table->index(['evento_id', 'created_at']);
            $table->index('email');
        });

        Schema::create('promocion_intentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('promocion_eventos')->cascadeOnDelete();
            $table->foreignId('participante_id')->constrained('promocion_participantes')->cascadeOnDelete();
            $table->foreignId('premio_id')->nullable()->constrained('promocion_premios')->nullOnDelete();
            $table->unsignedSmallInteger('puntaje_total')->default(0);
            $table->boolean('habilitado_ruleta')->default(false);
            $table->string('codigo_premio', 40)->nullable()->unique();
            $table->string('estado', 20)->default('finalizado');
            $table->dateTime('fecha_juego')->nullable();
            $table->timestamps();

            $table->index(['evento_id', 'participante_id']);
            $table->index(['evento_id', 'created_at']);
            $table->index('estado');
        });

        Schema::create('promocion_respuestas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('intento_id')->constrained('promocion_intentos')->cascadeOnDelete();
            $table->foreignId('pregunta_id')->constrained('promocion_preguntas')->cascadeOnDelete();
            $table->foreignId('opcion_id')->nullable()->constrained('promocion_opciones')->nullOnDelete();
            $table->text('respuesta_texto')->nullable();
            $table->boolean('es_correcta')->default(false);
            $table->unsignedSmallInteger('puntaje_obtenido')->default(0);
            $table->timestamps();

            $table->index(['intento_id', 'pregunta_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promocion_respuestas');
        Schema::dropIfExists('promocion_intentos');
        Schema::dropIfExists('promocion_participantes');
        Schema::dropIfExists('promocion_premios');
        Schema::dropIfExists('promocion_opciones');
        Schema::dropIfExists('promocion_preguntas');
        Schema::dropIfExists('promocion_eventos');
    }
};
