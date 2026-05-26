<?php

namespace App\Providers;

use App\Models\Local;
use App\Models\Servicio;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Compartir servicios y locales activos con el layout del nav
        View::composer('layouts.app', function ($view) {
            $view->with([
                'navServicios' => Servicio::where('activo', true)->orderBy('orden')->get(['id', 'nombre', 'slug']),
                'navLocales'   => Local::where('activo', true)->orderBy('orden')->get(['id', 'nombre', 'ciudad']),
            ]);
        });
    }
}
