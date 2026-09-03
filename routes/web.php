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

// Despliegue y Sincronización Automática de Assets en cPanel
Route::get('/cpanel-deploy', function (\Illuminate\Http\Request $request) {
    if ($request->query('key') !== 'msa_deploy_2026') {
        abort(403, 'Acceso no autorizado');
    }

    echo '<!DOCTYPE html><html><head><title>Despliegue MSA Automotriz</title>';
    echo '<style>body{background:#111;color:#fff;font-family:monospace;padding:30px;line-height:1.6;} pre{background:#1e1e1e;padding:20px;border-radius:10px;border-left:4px solid #d90429;overflow-x:auto;} .ok{color:#10b981;font-weight:bold;} .title{color:#d90429;font-size:1.4rem;font-weight:bold;margin-bottom:15px;}</style></head><body>';
    echo '<div class="title">🚀 DESPLIEGUE &amp; SINCRONIZACIÓN MSA AUTOMOTRIZ (CPANEL)</div>';
    echo '<pre>';

    $repoPath = '/home/msaautom/repositories/msa_proyecto';
    $publicHtml = '/home/msaautom/public_html';
    $phpBin = '/opt/cpanel/ea-php83/root/usr/bin/php';
    if (!file_exists($phpBin)) {
        $phpBin = 'php';
    }

    echo "Directorio del repositorio: $repoPath\n";
    echo "Directorio public_html: $publicHtml\n";
    echo "Binario PHP: $phpBin\n\n";

    // 1. Ejecutar migraciones de base de datos
    echo "--------------------------------------------------\n";
    echo "1. Ejecutando migraciones de base de datos...\n";
    passthru("$phpBin $repoPath/artisan migrate --force 2>&1");

    // 2. Publicar assets de Filament
    echo "\n--------------------------------------------------\n";
    echo "2. Publicando assets de Filament...\n";
    passthru("$phpBin $repoPath/artisan filament:upgrade 2>&1");
    passthru("$phpBin $repoPath/artisan filament:assets 2>&1");

    // 3. Copiar y sincronizar TODOS los assets (css, js, img, build, fonts) con public_html
    echo "\n--------------------------------------------------\n";
    echo "3. Sincronizando estilos (CSS), scripts (JS) e imágenes a public_html...\n";
    @mkdir("$publicHtml/css", 0755, true);
    @mkdir("$publicHtml/js", 0755, true);
    @mkdir("$publicHtml/img", 0755, true);
    @mkdir("$publicHtml/build", 0755, true);
    @mkdir("$publicHtml/fonts", 0755, true);

    passthru("cp -a $repoPath/public/css/. $publicHtml/css/ 2>&1");
    passthru("cp -a $repoPath/public/js/. $publicHtml/js/ 2>&1");
    passthru("cp -a $repoPath/public/img/. $publicHtml/img/ 2>&1");
    if (is_dir("$repoPath/public/build")) {
        passthru("cp -a $repoPath/public/build/. $publicHtml/build/ 2>&1");
    }
    passthru("cp -a $repoPath/public/css/filament/. $publicHtml/css/filament/ 2>&1");
    passthru("cp -a $repoPath/public/js/filament/. $publicHtml/js/filament/ 2>&1");
    if (is_dir("$repoPath/public/fonts/filament")) {
        @mkdir("$publicHtml/fonts/filament", 0755, true);
        passthru("cp -a $repoPath/public/fonts/filament/. $publicHtml/fonts/filament/ 2>&1");
    }

    echo "Assets sincronizados correctamente con public_html.\n";

    // 4. Limpieza y optimización de caché
    echo "\n--------------------------------------------------\n";
    echo "4. Limpiando y optimizando caché...\n";
    passthru("$phpBin $repoPath/artisan optimize:clear 2>&1");

    echo "\n==================================================\n";
    echo "<span class=\"ok\">✅ ¡DESPLIEGUE Y ESTILOS SINCRONIZADOS CON ÉXITO!</span>\n";
    echo "==================================================\n";
    echo '</pre></body></html>';
    exit;
});
