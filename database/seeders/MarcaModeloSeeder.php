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
        $marcasData = [
            'chevrolet' => [
                'nombre' => 'Chevrolet',
                'descripcion' => 'Encuentra tu próximo Chevrolet con la mayor garantía y respaldo.',
                'imagen' => 'img/chevrolet/chevrolet_logo.jfif',
                'imagen_hero' => 'img/chevrolet/chevrolet_baner.jpg',
                'modelos' => [
                    ['nombre' => 'Tracker Turbo', 'tipo' => 'SUV', 'precio' => 74990, 'precio_dolares' => 19990, 'imagen' => 'img/chevrolet/tracker.jfif', 'descripcion' => 'SUV moderna con motor turbo eficiente, 6 airbags y conectividad OnStar.'],
                    ['nombre' => 'Captiva XL', 'tipo' => 'SUV', 'precio' => 89990, 'precio_dolares' => 23990, 'imagen' => 'img/chevrolet/captiva_xl.jfif', 'descripcion' => 'Espacio para 7 pasajeros, techo panorámico y tecnología para toda la familia.'],
                    ['nombre' => 'Groove', 'tipo' => 'SUV', 'precio' => 62990, 'precio_dolares' => 16790, 'imagen' => 'img/chevrolet/groove.jfif', 'descripcion' => 'SUV compacta ideal para la ciudad con gran rendimiento y diseño audaz.'],
                    ['nombre' => 'Colorado 4x4', 'tipo' => 'Pick-up', 'precio' => 134990, 'precio_dolares' => 35990, 'imagen' => 'img/chevrolet/colorado.jfif', 'descripcion' => 'Potencia diésel para los terrenos más exigentes de la sierra y selva.'],
                    ['nombre' => 'Montana', 'tipo' => 'Pick-up', 'precio' => 79990, 'precio_dolares' => 21330, 'imagen' => 'img/chevrolet/montana.jfif', 'descripcion' => 'La versatilidad de una pick-up con el confort y manejo de una SUV.'],
                    ['nombre' => 'Sail Sedán', 'tipo' => 'Sedán', 'precio' => 49990, 'precio_dolares' => 13330, 'imagen' => 'img/chevrolet/sail_sedan.jfif', 'descripcion' => 'El sedán favorito por su economía de combustible y amplio maletero.'],
                    ['nombre' => 'N400 Max', 'tipo' => 'Comercial', 'precio' => 46990, 'precio_dolares' => 12530, 'imagen' => 'img/chevrolet/n400_max.jfif', 'descripcion' => 'Tu mejor socio de negocio para transporte de carga y reparto urbano.'],
                    ['nombre' => 'Traverse', 'tipo' => 'SUV', 'precio' => 189990, 'precio_dolares' => 50660, 'imagen' => 'img/chevrolet/traverse.jfif', 'descripcion' => 'SUV de lujo de 3 filas con máxima seguridad y tracción AWD.'],
                ],
            ],
            'baic' => [
                'nombre' => 'BAIC',
                'descripcion' => 'Tecnología de vanguardia y diseño innovador al mejor precio.',
                'imagen' => 'img/baic/baic_logo.jfif',
                'imagen_hero' => 'img/baic_pruebas.jpg',
                'modelos' => [
                    ['nombre' => 'X35', 'tipo' => 'SUV', 'precio' => 54990, 'precio_dolares' => 14660, 'imagen' => 'img/baic/x35.jfif', 'descripcion' => 'Diseño deportivo, pantalla táctil de 8 pulgadas y motor 1.5L económico.'],
                    ['nombre' => 'X55 Plus', 'tipo' => 'SUV', 'precio' => 78990, 'precio_dolares' => 21060, 'imagen' => 'img/baic/x55_plus.jfif', 'descripcion' => 'Motor turbo potente y diseño futurista con asistencias ADAS.'],
                    ['nombre' => 'BJ40 Plus 4x4', 'tipo' => 'Todoterreno', 'precio' => 129990, 'precio_dolares' => 34660, 'imagen' => 'img/baic/bj40.jfif', 'descripcion' => 'Auténtico todoterreno 4x4 con chasis reforzado para aventura extrema.'],
                ],
            ],
            'dongfeng' => [
                'nombre' => 'Dongfeng',
                'descripcion' => 'Vehículos comerciales y SUV con respaldo garantizado.',
                'imagen' => 'img/dongfeng/dongfeng_logo.jfif',
                'imagen_hero' => 'img/dongfeng/baner.jfif',
                'modelos' => [
                    ['nombre' => 'T5 EVO', 'tipo' => 'SUV', 'precio' => 84990, 'precio_dolares' => 22660, 'imagen' => 'img/dongfeng/t5_evo.jfif', 'descripcion' => 'Líneas aerodinámicas premium, motor Mitsubishi Turbo y techo panorámico.'],
                    ['nombre' => 'Rich 6 4x4', 'tipo' => 'Pick-up', 'precio' => 96990, 'precio_dolares' => 25860, 'imagen' => 'img/dongfeng/rich6.jfif', 'descripcion' => 'Pick-up probada con plataforma Nissan para trabajo duro y minería.'],
                    ['nombre' => 'SX5', 'tipo' => 'SUV', 'precio' => 59990, 'precio_dolares' => 15990, 'imagen' => 'img/dongfeng/sx5.jfif', 'descripcion' => 'SUV espaciosa para 5 pasajeros con excelente relación costo-beneficio.'],
                ],
            ],
            'forland' => [
                'nombre' => 'Forland',
                'descripcion' => 'Camiones de alta durabilidad para el transporte de carga pesado.',
                'imagen' => 'img/forland_logo.jfif',
                'imagen_hero' => 'img/forland/baner.jfif',
                'modelos' => [
                    ['nombre' => 'F30 2 Ton', 'tipo' => 'Camión Ligero', 'precio' => 52990, 'precio_dolares' => 14130, 'imagen' => 'img/forland/f30.jfif', 'descripcion' => 'Camión ágil para reparto interurbano y distribución.'],
                    ['nombre' => 'F100 4 Ton', 'tipo' => 'Camión', 'precio' => 74990, 'precio_dolares' => 19990, 'imagen' => 'img/forland/f100.jfif', 'descripcion' => 'Capacidad de 4 toneladas con motor diésel de bajo consumo.'],
                    ['nombre' => 'F200 6 Ton', 'tipo' => 'Camión Mediano', 'precio' => 98990, 'precio_dolares' => 26390, 'imagen' => 'img/forland/f200.jfif', 'descripcion' => 'Estructura reforzada para carga pesada en rutas andinas.'],
                ],
            ],
            'foton' => [
                'nombre' => 'Foton',
                'descripcion' => 'Líder global en camionetas y vehículos comerciales de alto desempeño.',
                'imagen' => 'img/foton/foton_logo.jfif',
                'imagen_hero' => 'img/foton/baner.jfif',
                'modelos' => [
                    ['nombre' => 'Tunland G7 4x4', 'tipo' => 'Pick-up', 'precio' => 99990, 'precio_dolares' => 26660, 'imagen' => 'img/foton/tunland_g7.jfif', 'descripcion' => 'Motor Aucan 2.0L Turbo Diésel de 160 HP y tracción 4x4 BorgWarner.'],
                    ['nombre' => 'Aumark S 5T', 'tipo' => 'Camión', 'precio' => 114990, 'precio_dolares' => 30660, 'imagen' => 'img/foton/aumark.jfif', 'descripcion' => 'Equipado con motor Cummins y transmisión ZF alemana.'],
                    ['nombre' => 'View CS2 Minibús', 'tipo' => 'Minibús', 'precio' => 109990, 'precio_dolares' => 29330, 'imagen' => 'img/foton/view_cs2.jfif', 'descripcion' => 'Confort para 15 pasajeros con aire acondicionado bi-zona.'],
                ],
            ],
            'honda_autos' => [
                'nombre' => 'Honda Autos',
                'descripcion' => 'Ingeniería japonesa de clase mundial, seguridad y elegancia.',
                'imagen' => 'img/honda_autos/honda_logo.jfif',
                'imagen_hero' => 'img/honda_autos/baner.jfif',
                'modelos' => [
                    ['nombre' => 'City Sedán', 'tipo' => 'Sedán', 'precio' => 74990, 'precio_dolares' => 19990, 'imagen' => 'img/honda_autos/city.jfif', 'descripcion' => 'Elegancia, eficiencia i-VTEC y amplio confort interior.'],
                    ['nombre' => 'HR-V', 'tipo' => 'SUV', 'precio' => 104990, 'precio_dolares' => 27990, 'imagen' => 'img/honda_autos/hrv.jfif', 'descripcion' => 'SUV de estilo coupé con asientos mágicos Magic Seat y Honda Sensing.'],
                    ['nombre' => 'CR-V Turbo', 'tipo' => 'SUV', 'precio' => 149990, 'precio_dolares' => 39990, 'imagen' => 'img/honda_autos/crv.jfif', 'descripcion' => 'La SUV más vendida del mundo con motor 1.5L Turbo y máxima seguridad.'],
                    ['nombre' => 'Civic Turbo', 'tipo' => 'Sedán', 'precio' => 119990, 'precio_dolares' => 31990, 'imagen' => 'img/honda_autos/civic.jfif', 'descripcion' => 'Diseño deportivo legendario y respuesta dinámica insuperable.'],
                ],
            ],
            'honda_motos' => [
                'nombre' => 'Honda Motos',
                'descripcion' => 'La marca de motocicletas más confiable y vendida del Perú.',
                'imagen' => 'img/honda_motos/honda_motos_logo.jfif',
                'imagen_hero' => 'img/honda_motos/baner.jfif',
                'modelos' => [
                    ['nombre' => 'Navi 110', 'tipo' => 'Automática', 'precio' => 5990, 'precio_dolares' => 1590, 'imagen' => 'img/honda_motos/navi.jfif', 'descripcion' => 'La moto crossover automática más divertida y personalizable.'],
                    ['nombre' => 'Wave 110S', 'tipo' => 'Semiautomática', 'precio' => 6490, 'precio_dolares' => 1730, 'imagen' => 'img/honda_motos/wave.jfif', 'descripcion' => 'La campeona en economía de combustible y durabilidad diaria.'],
                    ['nombre' => 'XR 190L', 'tipo' => 'Doble Propósito', 'precio' => 12990, 'precio_dolares' => 3460, 'imagen' => 'img/honda_motos/xr190l.jfif', 'descripcion' => 'Inyección electrónica PGM-FI lista para pistas y trochas.'],
                    ['nombre' => 'CB 190R', 'tipo' => 'Naked', 'precio' => 11990, 'precio_dolares' => 3190, 'imagen' => 'img/honda_motos/cb190r.jfif', 'descripcion' => 'Estilo agresivo Streetfighter con suspensión invertida y luces LED.'],
                ],
            ],
            'isuzu_camiones' => [
                'nombre' => 'Isuzu Camiones',
                'descripcion' => 'Camiones 100% japoneses con la mayor durabilidad del mercado.',
                'imagen' => 'img/isuzu_camiones/isuzu_logo.jfif',
                'imagen_hero' => 'img/isuzu_camiones/baner.jfif',
                'modelos' => [
                    ['nombre' => 'NLR 3.5 Ton', 'tipo' => 'Camión', 'precio' => 118990, 'precio_dolares' => 31730, 'imagen' => 'img/isuzu_camiones/nlr.jfif', 'descripcion' => 'Excelente maniobrabilidad y capacidad para logística urbana.'],
                    ['nombre' => 'NPR 5 Ton', 'tipo' => 'Camión', 'precio' => 142990, 'precio_dolares' => 38130, 'imagen' => 'img/isuzu_camiones/npr.jfif', 'descripcion' => 'Motor 4JJ1 Turbo Intercooler con legendaria durabilidad japonesa.'],
                    ['nombre' => 'NQR 6.5 Ton', 'tipo' => 'Camión', 'precio' => 165990, 'precio_dolares' => 44260, 'imagen' => 'img/isuzu_camiones/nqr.jfif', 'descripcion' => 'Máxima capacidad de carga útil para transporte interprovincial.'],
                ],
            ],
            'isuzu_pick_ups' => [
                'nombre' => 'Isuzu Pick-Ups',
                'descripcion' => 'Fuerza indestructible y confort superior para todo terreno.',
                'imagen' => 'img/isuzu_pick_ups/isuzu_pickups_logo.jfif',
                'imagen_hero' => 'img/isuzu_pick_ups/baner.jfif',
                'modelos' => [
                    ['nombre' => 'D-MAX 4x4 MT', 'tipo' => 'Pick-up', 'precio' => 124990, 'precio_dolares' => 33330, 'imagen' => 'img/isuzu_pick_ups/dmax.jfif', 'descripcion' => 'Chasis de acero de alta resistencia y capacidad de remolque de 3.5 toneladas.'],
                    ['nombre' => 'D-MAX V-Cross 4x4 AT', 'tipo' => 'Pick-up', 'precio' => 159990, 'precio_dolares' => 42660, 'imagen' => 'img/isuzu_pick_ups/dmax_vcross.jfif', 'descripcion' => 'La versión tope de gama con asistencias avanzadas de seguridad ADAS.'],
                ],
            ],
            'omoda_jaecoo' => [
                'nombre' => 'Omoda & Jaecoo',
                'descripcion' => 'El futuro del diseño automotriz premium con tecnología inteligente.',
                'imagen' => 'img/omoda_jaecoo/omoda_logo.jfif',
                'imagen_hero' => 'img/omoda_jaecoo/baner.jfif',
                'modelos' => [
                    ['nombre' => 'Omoda C5', 'tipo' => 'SUV Crossover', 'precio' => 86990, 'precio_dolares' => 23190, 'imagen' => 'img/omoda_jaecoo/omoda_c5.jfif', 'descripcion' => 'Diseño Cross-Furturism con 5 estrellas de seguridad Euro NCAP.'],
                    ['nombre' => 'Jaecoo 7 4x4', 'tipo' => 'SUV Off-Road', 'precio' => 114990, 'precio_dolares' => 30660, 'imagen' => 'img/omoda_jaecoo/jaecoo_7.jfif', 'descripcion' => 'Elegancia clásica off-road con sistema de tracción inteligente ARDIS.'],
                ],
            ],
        ];

        $ordenMarca = 1;
        foreach ($marcasData as $slug => $data) {
            $marca = Marca::updateOrCreate(
                ['slug' => $slug],
                [
                    'nombre'      => $data['nombre'],
                    'descripcion' => $data['descripcion'],
                    'imagen'      => $data['imagen'],
                    'imagen_hero' => $data['imagen_hero'],
                    'activo'      => true,
                    'orden'       => $ordenMarca++,
                ]
            );

            $ordenModelo = 1;
            foreach ($data['modelos'] as $m) {
                Modelo::updateOrCreate(
                    [
                        'marca_id' => $marca->id,
                        'nombre'   => $m['nombre'],
                    ],
                    [
                        'slug'           => Str::slug($m['nombre']),
                        'tipo'           => $m['tipo'] ?? null,
                        'precio'         => $m['precio'] ?? null,
                        'precio_dolares' => $m['precio_dolares'] ?? null,
                        'imagen'         => $m['imagen'] ?? null,
                        'descripcion'    => $m['descripcion'] ?? null,
                        'destacado'      => ($ordenModelo <= 2),
                        'activo'         => true,
                        'orden'          => $ordenModelo++,
                    ]
                );
            }
        }
    }
}
