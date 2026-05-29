<?php

namespace App\Http\Controllers;

use App\Models\Marca;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::where('activo', true)->orderBy('orden')->get();
        return view('marcas.index', compact('marcas'));
    }

    public function show(string $slug)
    {
        $marca = Marca::where('slug', $slug)->where('activo', true)->firstOrFail();
        $modelos = $marca->modelos()->where('activo', true)->orderBy('orden')->get();
        return view('marcas.show', compact('marca', 'modelos'));
    }

    public function showModelo(string $marcaSlug, string $modeloSlug)
    {
        $marca   = Marca::where('slug', $marcaSlug)->where('activo', true)->firstOrFail();
        $modelo  = $marca->modelos()->with(['versiones' => fn($q) => $q->where('activo', true)->orderBy('orden')])->where('slug', $modeloSlug)->where('activo', true)->firstOrFail();
        $otrosModelos = $marca->modelos()->where('activo', true)->where('id', '!=', $modelo->id)->orderBy('orden')->get();
        return view('marcas.modelo', compact('marca', 'modelo', 'otrosModelos'));
    }
}
