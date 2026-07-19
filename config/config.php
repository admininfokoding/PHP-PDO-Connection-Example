<?php
// config/config.php

// Fungsi sederhana untuk membaca file .env tanpa library tambahan
function loadEnv($path) {
    if (!file_exists($path)) {
        return false;
    }
    
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($name, $value) = explode('=', $line, 2);
        
        $name = trim($name);
        $value = trim($value);
        
        if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
            putenv(sprintf('%s=%s', $name, $value));
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
    return true;
}

// Memuat .env dari root direktori
loadEnv(__DIR__ . '/../.env');

// Mengembalikan konfigurasi sebagai array
return [
    'host'    => getenv('DB_HOST') ?: '127.0.0.1',
    'db'      => getenv('DB_NAME') ?: 'belajar_backend_db',
    'user'    => getenv('DB_USER') ?: 'root',
    'pass'    => getenv('DB_PASS') ?: '',
    'charset' => getenv('DB_CHARSET') ?: 'utf8mb4'
];
