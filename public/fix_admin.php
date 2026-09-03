<?php

// Script directo para limpiar OPcache, caché de Laravel y activar Filament Admin
define('LARAVEL_START', microtime(true));

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// Limpiar opcache si está habilitado
if (function_exists('opcache_reset')) {
    @opcache_reset();
}

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

echo "<!DOCTYPE html><html><head><title>Activador Panel MSA</title></head><body style='background:#0d0d0d;color:#ffffff;font-family:sans-serif;padding:30px;'>";
echo "<div style='max-width:800px;margin:0 auto;background:#181818;border-radius:12px;padding:25px;border-left:5px solid #d90429;box-shadow:0 10px 30px rgba(0,0,0,0.5);'>";
echo "<h1 style='color:#d90429;margin-top:0;'>🚀 ACTIVADOR DEL PANEL DE ADMINISTRACIÓN</h1>";
echo "<pre style='background:#111111;padding:15px;border-radius:8px;color:#a0c4ff;overflow-x:auto;font-family:monospace;line-height:1.6;'>";

echo "1. Limpiando caché de rutas, vistas y configuración...\n";
Artisan::call('optimize:clear');
echo Artisan::output();

echo "\n2. Ejecutando migraciones de base de datos...\n";
try {
    Artisan::call('migrate', ['--force' => true]);
    echo Artisan::output() ?: "Migraciones al día.\n";
} catch (\Throwable $e) {
    echo "Aviso migraciones: " . $e->getMessage() . "\n";
}

echo "\n3. Publicando assets de Filament...\n";
try {
    Artisan::call('filament:upgrade');
    echo Artisan::output();
} catch (\Throwable $e) {
    echo "Aviso upgrade: " . $e->getMessage() . "\n";
}

echo "\n4. Sincronizando archivos públicos a public_html...\n";
$publicHtml = '/home/msaautom/public_html';
$folders = ['css', 'js', 'img', 'build', 'fonts'];
foreach ($folders as $folder) {
    $src = __DIR__ . "/$folder";
    $dest = "$publicHtml/$folder";
    if (is_dir($src)) {
        File::ensureDirectoryExists($dest);
        File::copyDirectory($src, $dest);
        echo "✓ Carpeta $folder copiada.\n";
    }
}

if (file_exists(__DIR__ . '/.htaccess')) {
    @copy(__DIR__ . '/.htaccess', "$publicHtml/.htaccess");
    echo "✓ Archivo .htaccess sincronizado.\n";
}

echo "\n==================================================\n";
echo "<b style='color:#4ade80;'>✅ ¡PANEL DE ADMINISTRACIÓN ACTIVADO CON ÉXITO!</b>\n";
echo "==================================================\n";
echo "</pre>";

echo "<div style='margin-top:20px;text-align:center;'>";
echo "<a href='/admin/login' style='background:#d90429;color:#ffffff;text-decoration:none;padding:14px 28px;border-radius:8px;font-weight:bold;font-size:1.1rem;display:inline-block;box-shadow:0 4px 15px rgba(217,4,41,0.4);'>Ingresar al Panel de Administración ➔</a>";
echo "</div></div></body></html>";
