<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\LibroReclamacionesController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\TransporteRentingController;
use App\Http\Controllers\LocalesController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Secciones estáticas
Route::get('/nosotros', [NosotrosController::class, 'index'])->name('nosotros');
Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios');
Route::get('/seminuevos', [ServiciosController::class, 'seminuevos'])->name('seminuevos');
Route::post('/servicios/promociones/{evento}/registrar', [ServiciosController::class, 'registrarPromocion'])->name('promociones.registrar');
Route::post('/servicios/promociones/{evento}/evaluar', [ServiciosController::class, 'evaluarPromocion'])->name('promociones.evaluar');
Route::post('/servicios/promociones/{evento}/girar', [ServiciosController::class, 'girarPromocion'])->name('promociones.girar');
Route::get('/servicios/{slug}', [ServiciosController::class, 'show'])->name('servicios.show');
Route::post('/servicios/{slug}/consultar', [ServiciosController::class, 'consultar'])->name('servicios.consultar');
Route::get('/locales', [LocalesController::class, 'index'])->name('locales');
Route::get('/locales/{id}', [LocalesController::class, 'show'])->name('locales.show')->whereNumber('id');


//Seminuevos
Route::get('/seminuevos/{slug}', [ServiciosController::class, 'showSeminuevo'])->name('seminuevos.show');
// Transporte y Renting
Route::get('/transporte-renting', [TransporteRentingController::class, 'index'])->name('transporte-renting');
Route::get('/transporte-renting/{slug}', [TransporteRentingController::class, 'show'])->name('transporte-renting.show');
Route::post('/transporte-renting/{slug}/consultar', [TransporteRentingController::class, 'consultar'])->name('transporte-renting.consultar');

// Marcas
Route::get('/marcas', [MarcaController::class, 'index'])->name('marcas.index');
Route::get('/marcas/{slug}', [MarcaController::class, 'show'])->name('marcas.show');
Route::get('/marcas/{marca_slug}/{modelo_slug}', [MarcaController::class, 'showModelo'])->name('modelos.show');

// Contacto
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');

// Libro de Reclamaciones
Route::get('/libro-reclamaciones', [LibroReclamacionesController::class, 'index'])->name('libro-reclamaciones');
Route::post('/libro-reclamaciones', [LibroReclamacionesController::class, 'store'])->name('libro-reclamaciones.store');

// Términos y Condiciones
Route::get('/terminos-condiciones', function () {
    return view('terminos-condiciones');
})->name('terminos-condiciones');

