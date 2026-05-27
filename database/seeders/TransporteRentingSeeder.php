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
                'nombre'      => 'Renta de Vehículos',
                'slug'        => 'renta-de-vehiculos',
                'descripcion' => 'Servicio de renta de vehículos.',
                'imagen'      => null,
                'activo'      => true,
                'orden'       => 1,
            ],
            [
                'nombre'      => 'Transporte de Vehículos',
                'slug'        => 'transporte-de-vehiculos',
                'descripcion' => 'Servicio de transporte de vehículos.',
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
