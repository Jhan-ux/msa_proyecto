<?php

// Script seguro de despliegue y mantenimiento para cPanel
$secretKey = 'msa_deploy_2026';

if (($_GET['key'] ?? '') !== $secretKey) {
    http_response_code(403);
    die('Acceso no autorizado. Clave de seguridad incorrecta.');
}

header('Content-Type: text/html; charset=UTF-8');
echo '<!DOCTYPE html><html><head><title>Despliegue MSA Automotriz</title>';
echo '<style>body{background:#111;color:#fff;font-family:monospace;padding:30px;line-height:1.6;} pre{background:#1e1e1e;padding:20px;border-radius:10px;border-left:4px solid #d90429;overflow-x:auto;} .ok{color:#10b981;font-weight:bold;} .title{color:#d90429;font-size:1.4rem;font-weight:bold;margin-bottom:15px;}</style></head><body>';
echo '<div class="title">🚀 DESPLIEGUE AUTOMÁTICO MSA AUTOMOTRIZ (CPANEL)</div>';
echo '<pre>';

$repoPath = realpath(__DIR__ . '/..');
$phpBin = '/opt/cpanel/ea-php83/root/usr/bin/php';
if (!file_exists($phpBin)) {
    $phpBin = 'php';
}

echo "Directorio del proyecto: $repoPath\n";
echo "Binario PHP: $phpBin\n\n";

chdir($repoPath);

// 1. Limpiar repositorio Git local en el servidor
echo "--------------------------------------------------\n";
echo "1. Limpiando archivos temporales en Git...\n";
passthru("git reset --hard HEAD 2>&1");
passthru("git clean -fd 2>&1");

// 2. Ejecutar migraciones de base de datos
echo "\n--------------------------------------------------\n";
echo "2. Ejecutando migraciones de base de datos...\n";
passthru("$phpBin artisan migrate --force 2>&1");

// 3. Publicar assets de Filament
echo "\n--------------------------------------------------\n";
echo "3. Publicando assets de Filament...\n";
passthru("$phpBin artisan filament:upgrade 2>&1");
passthru("$phpBin artisan filament:assets 2>&1");

// 4. Copiar assets a public_html si aplica
echo "\n--------------------------------------------------\n";
echo "4. Sincronizando assets con public_html...\n";
@mkdir('/home/msaautom/public_html/css/filament', 0755, true);
@mkdir('/home/msaautom/public_html/js/filament', 0755, true);
@mkdir('/home/msaautom/public_html/fonts/filament', 0755, true);
passthru("cp -a public/css/filament/. /home/msaautom/public_html/css/filament/ 2>&1");
passthru("cp -a public/js/filament/. /home/msaautom/public_html/js/filament/ 2>&1");
passthru("cp -a public/fonts/filament/. /home/msaautom/public_html/fonts/filament/ 2>&1");

// 5. Limpieza de caché
echo "\n--------------------------------------------------\n";
echo "5. Limpiando y optimizando caché...\n";
passthru("$phpBin artisan optimize:clear 2>&1");

echo "\n==================================================\n";
echo "<span class=\"ok\">✅ ¡DESPLIEGUE COMPLETADO CON ÉXITO!</span>\n";
echo "==================================================\n";
echo '</pre></body></html>';
