<?php

// Script seguro de despliegue y sincronización de assets para cPanel
$secretKey = 'msa_deploy_2026';

if (($_GET['key'] ?? '') !== $secretKey) {
    http_response_code(403);
    die('Acceso no autorizado. Clave de seguridad incorrecta.');
}

header('Content-Type: text/html; charset=UTF-8');
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

if (is_dir($repoPath)) {
    chdir($repoPath);
}

// 1. Limpiar repositorio Git local en el servidor
echo "--------------------------------------------------\n";
echo "1. Limpiando archivos temporales en Git...\n";
passthru("git reset --hard HEAD 2>&1");
passthru("git clean -fd 2>&1");

// 2. Ejecutar migraciones de base de datos
echo "\n--------------------------------------------------\n";
echo "2. Ejecutando migraciones de base de datos...\n";
passthru("$phpBin $repoPath/artisan migrate --force 2>&1");

// 3. Publicar assets de Filament
echo "\n--------------------------------------------------\n";
echo "3. Publicando assets de Filament...\n";
passthru("$phpBin $repoPath/artisan filament:upgrade 2>&1");
passthru("$phpBin $repoPath/artisan filament:assets 2>&1");

// 4. Copiar y sincronizar TODOS los assets (css, js, img, build, fonts) con public_html
echo "\n--------------------------------------------------\n";
echo "4. Sincronizando estilos (CSS), scripts (JS) e imágenes a public_html...\n";
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

// 5. Limpieza y optimización de caché
echo "\n--------------------------------------------------\n";
echo "5. Limpiando y optimizando caché...\n";
passthru("$phpBin $repoPath/artisan optimize:clear 2>&1");
passthru("$phpBin $repoPath/artisan config:cache 2>&1");
passthru("$phpBin $repoPath/artisan route:cache 2>&1");
passthru("$phpBin $repoPath/artisan view:cache 2>&1");

echo "\n==================================================\n";
echo "<span class=\"ok\">✅ ¡DESPLIEGUE Y ESTILOS SINCRONIZADOS CON ÉXITO!</span>\n";
echo "==================================================\n";
echo '</pre></body></html>';
