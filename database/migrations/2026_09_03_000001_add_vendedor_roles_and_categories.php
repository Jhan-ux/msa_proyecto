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
        // 1. Campos para Vendedores en tabla users
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role', 20)->default('admin')->after('email');
            }
            if (!Schema::hasColumn('users', 'categoria_vendedor')) {
                $table->string('categoria_vendedor', 30)->default('todos')->after('role');
            }
            if (!Schema::hasColumn('users', 'telefono')) {
                $table->string('telefono', 30)->nullable()->after('categoria_vendedor');
            }
            if (!Schema::hasColumn('users', 'activo')) {
                $table->boolean('activo')->default(true)->after('telefono');
            }
        });

        // 2. Clasificación de Marca (Autos, Motos, Camiones)
        Schema::table('marcas', function (Blueprint $table) {
            if (!Schema::hasColumn('marcas', 'categoria_vehiculo')) {
                $table->string('categoria_vehiculo', 30)->default('autos')->after('nombre');
            }
        });

        // 3. Clasificación de Modelo (Autos, Motos, Camiones)
        Schema::table('modelos', function (Blueprint $table) {
            if (!Schema::hasColumn('modelos', 'categoria_vehiculo')) {
                $table->string('categoria_vehiculo', 30)->default('autos')->after('tipo');
            }
        });

        // 4. Categoría y Asignación de Vendedor en tabla contactos
        Schema::table('contactos', function (Blueprint $table) {
            if (!Schema::hasColumn('contactos', 'categoria_vehiculo')) {
                $table->string('categoria_vehiculo', 30)->default('general')->after('marca');
            }
            if (!Schema::hasColumn('contactos', 'vendedor_id')) {
                $table->foreignId('vendedor_id')->nullable()->after('categoria_vehiculo')->constrained('users')->nullOnDelete();
            }
            if (!Schema::hasColumn('contactos', 'notas_vendedor')) {
                $table->text('notas_vendedor')->nullable()->after('mensaje');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contactos', function (Blueprint $table) {
            if (Schema::hasColumn('contactos', 'vendedor_id')) {
                $table->dropForeign(['vendedor_id']);
                $table->dropColumn('vendedor_id');
            }
            if (Schema::hasColumn('contactos', 'categoria_vehiculo')) {
                $table->dropColumn('categoria_vehiculo');
            }
            if (Schema::hasColumn('contactos', 'notas_vendedor')) {
                $table->dropColumn('notas_vendedor');
            }
        });

        Schema::table('modelos', function (Blueprint $table) {
            if (Schema::hasColumn('modelos', 'categoria_vehiculo')) {
                $table->dropColumn('categoria_vehiculo');
            }
        });

        Schema::table('marcas', function (Blueprint $table) {
            if (Schema::hasColumn('marcas', 'categoria_vehiculo')) {
                $table->dropColumn('categoria_vehiculo');
            }
        });

        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
            if (Schema::hasColumn('users', 'categoria_vendedor')) {
                $table->dropColumn('categoria_vendedor');
            }
            if (Schema::hasColumn('users', 'telefono')) {
                $table->dropColumn('telefono');
            }
            if (Schema::hasColumn('users', 'activo')) {
                $table->dropColumn('activo');
            }
        });
    }
};
