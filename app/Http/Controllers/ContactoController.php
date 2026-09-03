<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'             => 'required|string|max:120',
            'telefono'           => 'required|string|max:20',
            'email'              => 'nullable|email|max:120',
            'marca'              => 'nullable|string|max:50',
            'categoria_vehiculo' => 'nullable|string|in:autos,motos,camiones,general',
            'asunto'             => 'required|string|max:200',
            'mensaje'            => 'required|string|max:2000',
        ]);

        // Auto-detectar categoría de vehículo
        $categoria = $request->input('categoria_vehiculo');
        if (!$categoria) {
            $marcaSlug = strtolower(trim($request->input('marca', '')));
            $asunto = strtolower(trim($request->input('asunto', '')));

            if ($marcaSlug === 'honda-motos' || str_contains($asunto, 'moto')) {
                $categoria = 'motos';
            } elseif (in_array($marcaSlug, ['isuzu-camiones', 'forland', 'foton']) || str_contains($asunto, 'camion') || str_contains($asunto, 'camión')) {
                $categoria = 'camiones';
            } elseif (!empty($marcaSlug) || str_contains($asunto, 'auto') || str_contains($asunto, 'cotizaci') || str_contains($asunto, 'seminuevo') || str_contains($asunto, 'modelo')) {
                $categoria = 'autos';
            } else {
                $categoria = 'general';
            }
        }

        Contacto::create(array_merge($validated, [
            'categoria_vehiculo' => $categoria,
            'ip'                 => $request->ip(),
        ]));

        return redirect()->route('contacto')->with('success', '¡Mensaje enviado! Nos comunicaremos contigo pronto.');
    }
}
