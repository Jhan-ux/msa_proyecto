<?php

namespace Database\Seeders;

use App\Models\Seminuevo;
use Illuminate\Database\Seeder;

class SeminuevosSeeder extends Seeder
{
    public function run(): void
    {
        Seminuevo::create([
            'nombre' => 'Toyota Hilux 2024',
            'slug' => 'toyota-hilux-2024',
            'descripcion' => 'Camioneta 4x4, motor 2.8L, transmisión automática, 45,000 km. Único dueño, todos sus mantenimientos al día.',
            'imagen' => 'img/seminuevos/toyota-hilux.jpg',
            'precio' => 125000.00,
            'precio_dolares' => 33000.00,
            'activo' => true,
            'orden' => 1,
        ]);

        Seminuevo::create([
            'nombre' => 'Honda CR-V 2023',
            'slug' => 'honda-cr-v-2023',
            'descripcion' => 'SUV familiar, motor 1.5L turbo, transmisión CVT, 30,000 km. Perfecto estado, interior nuevo.',
            'imagen' => 'img/seminuevos/honda-crv.jpg',
            'precio' => 98000.00,
            'precio_dolares' => 26000.00,
            'activo' => true,
            'orden' => 2,
        ]);

        Seminuevo::create([
            'nombre' => 'Chevrolet Trailblazer 2022',
            'slug' => 'chevrolet-trailblazer-2022',
            'descripcion' => 'SUV 7 asientos, motor 2.8L diesel, tracción 4x4, 60,000 km. Ideal para familia y trabajo.',
            'imagen' => 'img/seminuevos/chevrolet-trailblazer.jpg',
            'precio' => 112000.00,
            'precio_dolares' => 29500.00,
            'activo' => true,
            'orden' => 3,
        ]);

        Seminuevo::create([
            'nombre' => 'Nissan Sentra 2023',
            'slug' => 'nissan-sentra-2023',
            'descripcion' => 'Sedán familiar, motor 2.0L, transmisión CVT, 25,000 km. Ahorrador y confiable.',
            'imagen' => 'img/seminuevos/nissan-sentra.jpg',
            'precio' => 75000.00,
            'precio_dolares' => 19800.00,
            'activo' => true,
            'orden' => 4,
        ]);
    }
}
