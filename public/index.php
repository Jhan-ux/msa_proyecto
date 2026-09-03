<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Auto-detect basePath (local vs cPanel /home/msaautom/repositories/msa_proyecto)
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    $basePath = dirname(__DIR__);
} elseif (file_exists('/home/msaautom/repositories/msa_proyecto/vendor/autoload.php')) {
    $basePath = '/home/msaautom/repositories/msa_proyecto';
} elseif (file_exists(__DIR__ . '/../repositories/msa_proyecto/vendor/autoload.php')) {
    $basePath = dirname(__DIR__) . '/repositories/msa_proyecto';
} else {
    $basePath = dirname(__DIR__);
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = $basePath . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require $basePath . '/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once $basePath . '/bootstrap/app.php';

$app->handleRequest(Request::capture());
