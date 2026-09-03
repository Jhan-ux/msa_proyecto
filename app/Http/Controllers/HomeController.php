<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Servicio;
use App\Models\Local;
use App\Models\TransporteRenting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $marcas = Marca::where('activo', true)->orderBy('orden')->get();

        $modelos = Modelo::with('marca')
            ->where('activo', true)
            ->where('destacado', true)
            ->orderBy('orden')
            ->take(8)
            ->get();

        $servicios         = Servicio::where('activo', true)->orderBy('orden')->take(4)->get();
        $locales           = Local::where('activo', true)->orderBy('orden')->get();
        $transporteRenting = TransporteRenting::where('activo', true)->orderBy('orden')->get();

        return view('home', compact('marcas', 'modelos', 'servicios', 'locales', 'transporteRenting'));
    }
}
