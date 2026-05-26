<?php

namespace App\Http\Controllers;

use App\Models\Local;

class LocalesController extends Controller
{
    public function index()
    {
        $locales = Local::where('activo', true)->orderBy('orden')->get();
        return view('locales', compact('locales'));
    }

    public function show(int $id)
    {
        $local = Local::where('id', $id)->where('activo', true)->firstOrFail();
        $otrosLocales = Local::where('activo', true)->where('id', '!=', $local->id)->orderBy('orden')->get();
        return view('locales.show', compact('local', 'otrosLocales'));
    }
}

