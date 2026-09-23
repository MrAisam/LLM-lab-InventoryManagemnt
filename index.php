<?php
require __DIR__ . '/config/db.php';
require __DIR__ . '/includes/helpers.php';

$parts  = explode('/', $_GET['route'] ?? 'dashboard');
$module = $parts[0] ?: 'dashboard';
$action = $parts[1] ?? 'index';
$param  = $parts[2] ?? null;

if ($module === 'dashboard') {
    render('dashboard');
    exit;
}

$file = __DIR__ . "/app/{$module}.php";
if (!file_exists($file)) { http_response_code(404); exit('404 - module not found'); }
require $file;

$fn = "{$module}_{$action}";
if (!function_exists($fn)) { http_response_code(404); exit('404 - action not found'); }

$param !== null ? $fn($param) : $fn();
