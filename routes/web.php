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
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

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

// Seminuevos
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

// Despliegue y Sincronización 100% Nativa en PHP para cPanel
Route::get('/cpanel-deploy', function (\Illuminate\Http\Request $request) {
    if ($request->query('key') !== 'msa_deploy_2026') {
        abort(403, 'Acceso no autorizado');
    }

    echo '<!DOCTYPE html><html><head><title>Despliegue MSA Automotriz</title>';
    echo '<style>body{background:#111;color:#fff;font-family:monospace;padding:30px;line-height:1.6;} pre{background:#1e1e1e;padding:20px;border-radius:10px;border-left:4px solid #d90429;overflow-x:auto;} .ok{color:#10b981;font-weight:bold;} .title{color:#d90429;font-size:1.4rem;font-weight:bold;margin-bottom:15px;}</style></head><body>';
    echo '<div class="title">🚀 DESPLIEGUE NATIVO MSA AUTOMOTRIZ (PHP ' . PHP_VERSION . ')</div>';
    echo '<pre>';

    $repoPath = base_path();
    $publicHtml = '/home/msaautom/public_html';

    echo "Directorio base: $repoPath\n";
    echo "Directorio public_html: $publicHtml\n\n";

    // 1. Migraciones de Base de Datos
    echo "--------------------------------------------------\n";
    echo "1. Ejecutando migraciones de base de datos...\n";
    try {
        Artisan::call('migrate', ['--force' => true]);
        echo Artisan::output() ?: "Migraciones al día.\n";
    } catch (\Throwable $e) {
        echo "Aviso migraciones: " . $e->getMessage() . "\n";
    }

    // 2. Limpieza y refresco de caché
    echo "\n--------------------------------------------------\n";
    echo "2. Limpiando caché y descubriendo rutas del panel...\n";
    try {
        Artisan::call('optimize:clear');
        echo Artisan::output();
    } catch (\Throwable $e) {
        echo "Aviso caché: " . $e->getMessage() . "\n";
    }

    // 3. Sincronización de assets vía File API de Laravel
    echo "\n--------------------------------------------------\n";
    echo "3. Sincronizando estilos, scripts e imágenes con public_html...\n";
    $folders = ['css', 'js', 'img', 'build', 'fonts'];
    foreach ($folders as $folder) {
        $src = public_path($folder);
        $dest = "$publicHtml/$folder";
        if (is_dir($src)) {
            File::ensureDirectoryExists($dest);
            File::copyDirectory($src, $dest);
            echo "✓ $folder sincronizado con éxito.\n";
        }
    }

    // 4. Sincronizar .htaccess
    if (file_exists(public_path('.htaccess'))) {
        copy(public_path('.htaccess'), "$publicHtml/.htaccess");
        echo "✓ Archivo .htaccess sincronizado con éxito.\n";
    }

    echo "\n==================================================\n";
    echo "<span class=\"ok\">✅ ¡DESPLIEGUE Y RUTAS DE ADMIN ACTIVADAS CON ÉXITO!</span>\n";
    echo "==================================================\n";
    echo '</pre></body></html>';
    exit;
});
