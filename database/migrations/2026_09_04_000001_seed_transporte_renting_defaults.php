<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $items = [
            [
                'nombre'      => 'Transporte',
                'slug'        => 'transporte',
                'descripcion' => 'Logística y traslado seguro de vehículos con cigueñas y grúas homologadas.',
                'imagen'      => null,
                'activo'      => 1,
                'orden'       => 1,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'nombre'      => 'Renting',
                'slug'        => 'renting',
                'descripcion' => 'Flotas de vehículos 0 Km a medida para empresas con mantenimiento oficial incluido.',
                'imagen'      => null,
                'activo'      => 1,
                'orden'       => 2,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ];

        foreach ($items as $item) {
            $exists = DB::table('transporte_renting')->where('slug', $item['slug'])->exists();
            if (! $exists) {
                DB::table('transporte_renting')->insert($item);
            } else {
                DB::table('transporte_renting')->where('slug', $item['slug'])->update([
                    'activo' => 1,
                    'nombre' => $item['nombre'],
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No destructive down
    }
};
