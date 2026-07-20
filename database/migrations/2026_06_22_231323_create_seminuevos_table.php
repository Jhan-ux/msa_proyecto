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
        if (! Schema::hasTable('seminuevos')) {
            Schema::create('seminuevos', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                $table->string('slug')->unique();
                $table->text('descripcion')->nullable();
                $table->string('imagen')->nullable();
                $table->decimal('precio', 12, 2)->nullable();
                $table->decimal('precio_dolares', 12, 2)->nullable();
                $table->boolean('activo')->default(true);
                $table->integer('orden')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seminuevos');
    }
};
