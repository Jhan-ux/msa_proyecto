<?php

namespace Database\Seeders;

use App\Models\TransporteRenting;
use Illuminate\Database\Seeder;

class TransporteRentingSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'nombre'      => 'Transporte',
                'slug'        => 'transporte',
                'descripcion' => 'Logística y traslado seguro de vehículos con cigueñas y grúas homologadas.',
                'imagen'      => null,
                'activo'      => true,
                'orden'       => 1,
            ],
            [
                'nombre'      => 'Renting',
                'slug'        => 'renting',
                'descripcion' => 'Flotas de vehículos 0 Km a medida para empresas con mantenimiento oficial incluido.',
                'imagen'      => null,
                'activo'      => true,
                'orden'       => 2,
            ],
        ];

        foreach ($items as $item) {
            TransporteRenting::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
