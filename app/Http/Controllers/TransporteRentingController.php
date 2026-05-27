<?php

namespace App\Http\Controllers;

use App\Models\TransporteRenting;

class TransporteRentingController extends Controller
{
    public function show(string $slug)
    {
        $servicio = TransporteRenting::where('slug', $slug)->where('activo', true)->firstOrFail();
        $otros = TransporteRenting::where('activo', true)->where('id', '!=', $servicio->id)->orderBy('orden')->get();
        return view('transporte.show', compact('servicio', 'otros'));
    }
}
