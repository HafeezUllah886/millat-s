<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));
$domains = [
    'millat-s.test',
    'millat.test',
    'millat.diamondquetta.com',
    'superupas.diamondquetta.com',
    '127.0.0.1:8000'
    ];

    $current_domain = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'];
    if (!in_array($current_domain, $domains)) {
        die("Invalid Configrations");
    }
// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
