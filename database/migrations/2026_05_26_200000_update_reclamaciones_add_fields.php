<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reclamaciones', function (Blueprint $table) {
            // Descripción del bien (Información General) — hacerla nullable
            $table->text('descripcion')->nullable()->change();

            // Detalles del reclamo
            $table->enum('tipo_reclamo', ['reclamo', 'queja'])->default('reclamo')->after('descripcion');
            $table->text('detalle_reclamo')->nullable()->after('tipo_reclamo');
            $table->text('pedido')->nullable()->after('detalle_reclamo');

            // Datos del Apoderado
            $table->boolean('menor_de_edad')->default(false)->after('pedido');
            $table->string('apoderado_tipo_documento', 20)->nullable()->after('menor_de_edad');
            $table->string('apoderado_nro_documento', 20)->nullable()->after('apoderado_tipo_documento');
            $table->string('apoderado_nombre', 100)->nullable()->after('apoderado_nro_documento');
            $table->string('apoderado_ap_paterno', 80)->nullable()->after('apoderado_nombre');
            $table->string('apoderado_ap_materno', 80)->nullable()->after('apoderado_ap_paterno');
            $table->string('apoderado_telefono', 20)->nullable()->after('apoderado_ap_materno');
            $table->string('apoderado_email', 120)->nullable()->after('apoderado_telefono');
        });
    }

    public function down(): void
    {
        Schema::table('reclamaciones', function (Blueprint $table) {
            $table->dropColumn([
                'tipo_reclamo', 'detalle_reclamo', 'pedido',
                'menor_de_edad',
                'apoderado_tipo_documento', 'apoderado_nro_documento',
                'apoderado_nombre', 'apoderado_ap_paterno', 'apoderado_ap_materno',
                'apoderado_telefono', 'apoderado_email',
            ]);
        });
    }
};
