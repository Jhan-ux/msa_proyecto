<?php

namespace App\Http\Controllers;

use App\Models\ConsultaServicio;
use App\Models\TransporteRenting;
use Illuminate\Http\Request;

class TransporteRentingController extends Controller
{
    public function index()
    {
        $servicio = TransporteRenting::where('activo', true)->orderBy('orden')->first();
        if ($servicio) {
            return redirect()->route('transporte-renting.show', $servicio->slug);
        }
        return redirect()->route('home');
    }

    public function show(string $slug)
    {
        $servicio = TransporteRenting::where('slug', $slug)->where('activo', true)->firstOrFail();
        $otros = TransporteRenting::where('activo', true)->where('id', '!=', $servicio->id)->orderBy('orden')->get();
        return view('transporte.show', compact('servicio', 'otros'));
    }

    public function consultar(Request $request, string $slug)
    {
        $servicio = TransporteRenting::where('slug', $slug)->where('activo', true)->firstOrFail();

        $validated = $request->validate([
            'nombre'   => 'required|string|max:100',
            'email'    => 'required|email|max:150',
            'telefono' => 'nullable|string|max:20',
            'empresa'  => 'nullable|string|max:150',
            'mensaje'  => 'nullable|string|max:1000',
        ]);

        ConsultaServicio::create([
            'servicio_id'     => null,
            'servicio_nombre' => 'B2B: ' . $servicio->nombre,
            'nombre'          => $validated['nombre'],
            'email'           => $validated['email'],
            'telefono'        => $validated['telefono'] ?? null,
            'vehiculo'        => $validated['empresa'] ?? null,
            'mensaje'         => $validated['mensaje'] ?? null,
            'estado'          => 'nuevo',
        ]);

        return back()->with('consulta_enviada', true);
    }
}
