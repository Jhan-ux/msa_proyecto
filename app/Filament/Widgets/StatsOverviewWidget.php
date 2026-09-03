<?php

namespace App\Filament\Widgets;

use App\Models\Contacto;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Reclamacion;
use App\Models\User;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = -2;

    protected function getStats(): array
    {
        $user = auth()->user();

        if (! $user) {
            return [];
        }

        // Si es Vendedor: Estadísticas de su especialidad y asignaciones
        if ($user->isVendedor()) {
            $cat = $user->categoria_vendedor ?? 'todos';

            $baseQuery = Contacto::query();
            if ($cat !== 'todos') {
                $baseQuery->where(function ($q) use ($cat, $user) {
                    $q->where('categoria_vehiculo', $cat)
                      ->orWhere('vendedor_id', $user->id);
                });
            }

            $misLeads = (clone $baseQuery)->where('vendedor_id', $user->id)->count();
            $nuevos = (clone $baseQuery)->where('estado', 'nuevo')->count();
            $enSeguimiento = (clone $baseQuery)->where('estado', 'en_seguimiento')->count();
            $ganados = (clone $baseQuery)->where('estado', 'ganado')->count();

            $catNombre = match ($cat) {
                'autos'    => 'Autos & SUVs',
                'motos'    => 'Motos',
                'camiones' => 'Camiones & Pesados',
                default    => 'Todas las Categorías',
            };

            return [
                Stat::make('Cotizaciones Nuevas', $nuevos)
                    ->description("Pendientes ({$catNombre})")
                    ->descriptionIcon(Heroicon::OutlinedBellAlert)
                    ->color($nuevos > 0 ? 'danger' : 'gray'),

                Stat::make('En Seguimiento', $enSeguimiento)
                    ->description('Clientes en negociación activa')
                    ->descriptionIcon(Heroicon::OutlinedClock)
                    ->color('warning'),

                Stat::make('Asignadas a Mí', $misLeads)
                    ->description('Tus prospectos directos')
                    ->descriptionIcon(Heroicon::OutlinedBriefcase)
                    ->color('info'),

                Stat::make('Ventas Concretadas', $ganados)
                    ->description('Cotizaciones ganadas con éxito')
                    ->descriptionIcon(Heroicon::OutlinedCheckCircle)
                    ->color('success'),
            ];
        }

        // Si es Administrador: Métricas Globales del Negocio
        $totalContactos = Contacto::count();
        $contactosNuevos = Contacto::where('estado', 'nuevo')->count();
        $totalModelos = Modelo::where('activo', true)->count();
        $totalVendedores = User::where('role', 'vendedor')->where('activo', true)->count();
        $reclamosPendientes = Reclamacion::where('estado', 'pendiente')->count();

        return [
            Stat::make('Total Cotizaciones', $totalContactos)
                ->description("{$contactosNuevos} sin atender actualmente")
                ->descriptionIcon(Heroicon::OutlinedDocumentText)
                ->color($contactosNuevos > 0 ? 'danger' : 'success'),

            Stat::make('Modelos en Catálogo', $totalModelos)
                ->description(Marca::where('activo', true)->count() . ' marcas oficiales activas')
                ->descriptionIcon(Heroicon::OutlinedTruck)
                ->color('info'),

            Stat::make('Equipo Comercial', $totalVendedores)
                ->description('Asesores de ventas activos')
                ->descriptionIcon(Heroicon::OutlinedUsers)
                ->color('warning'),

            Stat::make('Libro de Reclamaciones', $reclamosPendientes)
                ->description($reclamosPendientes > 0 ? 'Reclamos por responder' : 'Sin reclamos pendientes')
                ->descriptionIcon(Heroicon::OutlinedClipboardDocumentList)
                ->color($reclamosPendientes > 0 ? 'danger' : 'success'),
        ];
    }
}
