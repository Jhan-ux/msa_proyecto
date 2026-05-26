<?php

namespace Database\Seeders;

use App\Models\Marca;
use App\Models\Modelo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MarcaModeloSeeder extends Seeder
{
    public function run(): void
    {
        $marcasData = require app_path('Data/marcas.php');

        $orden = 1;
        foreach ($marcasData as $slug => $data) {
            $marca = Marca::updateOrCreate(
                ['slug' => $slug],
                [
                    'nombre'      => $data['nombre'],
                    'descripcion' => $data['descripcion'],
                    'imagen'      => 'img/' . $data['imagen_dir'] . '/' . $data['imagen_file'],
                    'imagen_hero' => null,
                    'activo'      => true,
                    'orden'       => $orden++,
                ]
            );

            $modelosPath = app_path("Data/modelos/{$slug}.php");
            if (!file_exists($modelosPath)) {
                continue;
            }

            $modelos = require $modelosPath;
            $ordenModelo = 1;
            foreach ($modelos as $modeloData) {
                Modelo::updateOrCreate(
                    [
                        'marca_id' => $marca->id,
                        'nombre'   => $modeloData['nombre'],
                    ],
                    [
                        'slug'        => Str::slug($modeloData['nombre']),
                        'descripcion' => $modeloData['descripcion'] ?? null,
                        'imagen'      => $modeloData['imagen'] ?? null,
                        'precio'      => $modeloData['precio'] ?? null,
                        'destacado'   => false,
                        'activo'      => true,
                        'orden'       => $ordenModelo++,
                    ]
                );
            }

            $this->command->info("✓ {$data['nombre']}: " . count($modelos) . " modelos");
        }
    }
}
