<?php

namespace Database\Seeders;

use App\Models\Local;
use App\Models\Servicio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiciosLocalesSeeder extends Seeder
{
    public function run(): void
    {
        // ── Servicios ─────────────────────────────────────────────────
        $servicios = [
            ['nombre' => 'Promociones',          'descripcion' => 'Ofertas y beneficios especiales del mes en servicios y accesorios.', 'imagen' => 'img/posventa/promociones.jfif'],
            ['nombre' => 'Mantenimiento',         'descripcion' => 'Mantenimiento preventivo y correctivo con técnicos certificados y garantía oficial.', 'imagen' => 'img/posventa/mantenimiento.jfif'],
            ['nombre' => 'Repuestos',             'descripcion' => 'Repuestos 100% legítimos y originales para todas nuestras marcas oficiales.', 'imagen' => 'img/posventa/repuestos.jfif'],
            ['nombre' => 'Accesorios',            'descripcion' => 'Equipamiento genuino para personalizar y potenciar tu vehículo.', 'imagen' => 'img/posventa/accesorios.jfif'],
            ['nombre' => 'Carrocería y Pintura',  'descripcion' => 'Taller homologado de planchado y pintura con acabado de fábrica y cabina presurizada.', 'imagen' => 'img/posventa/planchado.jfif'],
            ['nombre' => 'Seguros',               'descripcion' => 'Asesoría y convenios con las principales aseguradoras del país para tu tranquilidad.', 'imagen' => 'img/posventa/seguros.jfif'],
            ['nombre' => 'Agenda tu Cita',        'descripcion' => 'Reserva tu cita de taller online de forma rápida, cómoda y sin esperas.', 'imagen' => 'img/posventa/cita.jfif'],
        ];

        foreach ($servicios as $index => $data) {
            Servicio::updateOrCreate(
                ['slug' => Str::slug($data['nombre'])],
                [
                    'nombre'      => $data['nombre'],
                    'descripcion' => $data['descripcion'],
                    'imagen'      => $data['imagen'],
                    'activo'      => true,
                    'orden'       => $index + 1,
                ]
            );
        }

        // ── Locales ───────────────────────────────────────────────────
        $horario = 'Lun – Vie: 8:00 am – 6:00 pm | Sáb: 8:00 am – 1:00 pm';

        $locales = [
            [
                'nombre'    => 'Sede Cajamarca',
                'ciudad'    => 'Cajamarca',
                'direccion' => 'Av. Independencia 1234, Cajamarca',
                'telefono'  => '(076) 123-456',
                'whatsapp'  => '+51966154210',
                'horario'   => $horario,
                'orden'     => 1,
            ],
            [
                'nombre'    => 'Sede Baños del Inca',
                'ciudad'    => 'Cajamarca',
                'direccion' => 'Carretera Baños del Inca km 3.5',
                'telefono'  => '(076) 789-012',
                'whatsapp'  => '+51966154210',
                'horario'   => $horario,
                'orden'     => 2,
            ],
            [
                'nombre'    => 'Sede Lima',
                'ciudad'    => 'Lima',
                'direccion' => 'Av. Principal 567, Lima',
                'telefono'  => '(01) 456-789',
                'whatsapp'  => '+51966154210',
                'horario'   => $horario,
                'orden'     => 3,
            ],
            [
                'nombre'    => 'Sede Piura',
                'ciudad'    => 'Piura',
                'direccion' => 'Av. Grau 890, Piura',
                'telefono'  => '(073) 321-654',
                'whatsapp'  => '+51966154210',
                'horario'   => $horario,
                'orden'     => 4,
            ],
        ];

        foreach ($locales as $data) {
            Local::updateOrCreate(
                ['nombre' => $data['nombre']],
                array_merge($data, ['activo' => true])
            );
        }
    }
}
