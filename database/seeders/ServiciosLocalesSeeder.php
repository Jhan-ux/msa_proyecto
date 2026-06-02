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
            ['nombre' => 'Promociones',          'descripcion' => 'Ofertas especiales en vehículos y accesorios'],
            ['nombre' => 'Accesorios',            'descripcion' => 'Equipamiento original para tu vehículo'],
            ['nombre' => 'Mantenimiento',         'descripcion' => 'Servicio técnico certificado por marca'],
            ['nombre' => 'Repuestos',             'descripcion' => 'Repuestos originales disponibles'],
            ['nombre' => 'Carrocería y Pintura',  'descripcion' => 'Reparación profesional de carrocería'],
            ['nombre' => 'Seguros',               'descripcion' => 'Planes de seguro para tu tranquilidad'],
            ['nombre' => 'Agenda tu Cita',        'descripcion' => 'Reserva tu cita de mantenimiento online'],
        ];

        foreach ($servicios as $index => $data) {
            Servicio::updateOrCreate(
                ['slug' => Str::slug($data['nombre'])],
                [
                    'nombre'      => $data['nombre'],
                    'descripcion' => $data['descripcion'],
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
