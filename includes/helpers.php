<?php
function input(string $key, $default = null) {
    return $_POST[$key] ?? $_GET[$key] ?? $default;
}

function redirect(string $route): void {
    header("Location: index.php?route={$route}");
    exit;
}

function render(string $view, array $data = []): void {
    extract($data);
    require __DIR__ . '/header.php';
    require __DIR__ . "/../views/{$view}.php";
    require __DIR__ . '/footer.php';
}
