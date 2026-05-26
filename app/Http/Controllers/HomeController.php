<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Modelos destacados para la home (datos estáticos hasta tener datos en DB)
        $modelos = [
            ['marca' => 'Chevrolet',      'slug' => 'chevrolet',      'nombre' => 'Chevrolet Auto',    'descripcion' => 'Urbano, eficiente y económico',          'imagen' => 'img/chevrolet/chevrolet_pruebas.jpeg'],
            ['marca' => 'Honda',          'slug' => 'honda-motos',    'nombre' => 'Honda Motos',       'descripcion' => 'Potencia y estilo en cada curva',        'imagen' => 'img/honda_motos/hondamo_pruebas.jpeg'],
            ['marca' => 'Isuzu',          'slug' => 'isuzu-pick-ups', 'nombre' => 'Isuzu Pick-Up',    'descripcion' => 'Pick-up robusta para todo terreno',     'imagen' => 'img/isuzu_pick_ups/isuzupic_pruebas.jpeg'],
            ['marca' => 'Isuzu',          'slug' => 'isuzu-camiones', 'nombre' => 'Isuzu Camiones',   'descripcion' => 'Camión de carga media resistente',       'imagen' => 'img/isuzu_camiones/isuzuca_pruebas.jpeg'],
            ['marca' => 'Honda',          'slug' => 'honda-autos',    'nombre' => 'Honda Autos',       'descripcion' => 'Auto de trabajo y aventura',            'imagen' => 'img/honda_autos/hondaau_pruebas.jpg'],
            ['marca' => 'BAIC',           'slug' => 'baic',           'nombre' => 'BAIC',              'descripcion' => 'SUV moderno al mejor costo',             'imagen' => 'img/baic/baic_pruebas.jpg'],
            ['marca' => 'Dongfeng',       'slug' => 'dongfeng',       'nombre' => 'Dongfeng',          'descripcion' => 'Pick-up con tecnología avanzada',        'imagen' => 'img/dongfeng/dongfeng_pruebas.jpg'],
            ['marca' => 'Foton',          'slug' => 'foton',          'nombre' => 'Foton',             'descripcion' => 'Carga y comodidad sin compromiso',       'imagen' => 'img/foton/foton_pruebas.jpg'],
            ['marca' => 'Forland',        'slug' => 'forland',        'nombre' => 'Forland',           'descripcion' => 'Vehículo confiable para transporte',     'imagen' => 'img/forland/forland_pruebas.jpg'],
            ['marca' => 'Omoda & Jaecoo', 'slug' => 'omoda-jaecoo',   'nombre' => 'Omoda & Jaecoo',   'descripcion' => 'SUVs con diseño futurista',              'imagen' => 'img/omoda_faecoo/omoda_pruebas.jpg'],
        ];

        return view('home', compact('modelos'));
    }
}
