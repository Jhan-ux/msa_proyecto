<?php

namespace App\Http\Controllers;

use App\Models\ConsultaServicio;
use App\Models\Servicio;
use App\Models\Seminuevo;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function index()
    {
        $servicios = Servicio::where('activo', true)->orderBy('orden')->get();
        return view('servicios', compact('servicios'));
    }

    public function show(string $slug)
    {
        $servicio = Servicio::where('slug', $slug)->where('activo', true)->firstOrFail();
        $otrosServicios = Servicio::where('activo', true)->where('id', '!=', $servicio->id)->orderBy('orden')->get();
        return view('servicios.show', compact('servicio', 'otrosServicios'));
    }

    public function consultar(Request $request, string $slug)
    {
        $servicio = Servicio::where('slug', $slug)->where('activo', true)->firstOrFail();

        $validated = $request->validate([
            'nombre'   => 'required|string|max:100',
            'email'    => 'required|email|max:150',
            'telefono' => 'nullable|string|max:20',
            'vehiculo' => 'nullable|string|max:100',
            'mensaje'  => 'nullable|string|max:1000',
        ]);

        ConsultaServicio::create([
            'servicio_id'     => $servicio->id,
            'servicio_nombre' => $servicio->nombre,
            'nombre'          => $validated['nombre'],
            'email'           => $validated['email'],
            'telefono'        => $validated['telefono'] ?? null,
            'vehiculo'        => $validated['vehiculo'] ?? null,
            'mensaje'         => $validated['mensaje'] ?? null,
            'estado'          => 'nuevo',
        ]);

        return back()->with('consulta_enviada', true);
    }

    public function seminuevos()
    {
        $seminuevos = Seminuevo::where('activo', true)->orderBy('orden')->get();
        return view('seminuevos', compact('seminuevos'));
    }

    public function showSeminuevo(string $slug)
    {
        $seminuevo = Seminuevo::where('slug', $slug)->where('activo', true)->firstOrFail();
        $otros = Seminuevo::where('activo', true)->where('id', '!=', $seminuevo->id)->orderBy('orden')->get();
        return view('seminuevos.show', compact('seminuevo', 'otros'));
    }
}

