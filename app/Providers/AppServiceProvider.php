<?php

namespace App\Providers;

use App\Models\Local;
use App\Models\Marca;
use App\Models\Servicio;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Compartir servicios, locales y marcas activas con todas las vistas
        View::composer('*', function ($view) {
            $view->with([
                'navServicios' => Servicio::where('activo', true)->orderBy('orden')->get(['id', 'nombre', 'slug']),
                'navLocales'   => Local::where('activo', true)->orderBy('orden')->get(['id', 'nombre', 'ciudad']),
                'navMarcas'    => Marca::where('activo', true)->orderBy('orden')
                    ->with(['modelos' => function ($q) {
                        $q->where('activo', true)->orderBy('orden')->select('id', 'marca_id', 'nombre', 'slug', 'imagen', 'tipo', 'precio');
                    }])
                    ->get(['id', 'nombre', 'slug', 'imagen']),
            ]);
        });
    }
}
