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
            'nombre'   => 'required|string|max:120',
            'telefono' => 'required|string|max:20',
            'email'    => 'nullable|email|max:120',
            'marca'    => 'nullable|string|max:50',
            'asunto'   => 'required|string|max:200',
            'mensaje'  => 'required|string|max:2000',
        ]);

        Contacto::create(array_merge($validated, [
            'ip' => $request->ip(),
        ]));

        return redirect()->route('contacto')->with('success', '¡Mensaje enviado! Nos comunicaremos contigo pronto.');
    }
}
