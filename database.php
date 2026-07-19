<?php
// database.php

// Memuat konfigurasi
$config = require __DIR__ . '/config/config.php';

$dsn = "mysql:host={$config['host']};dbname={$config['db']};charset={$config['charset']}";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Membuat dan mengembalikan koneksi PDO
    $pdo = new PDO($dsn, $config['user'], $config['pass'], $options);
} catch (\PDOException $e) {
    // Menangani error koneksi jika diperlukan
    http_response_code(500);
    echo json_encode([
        "status" => "error", 
        "message" => "Database Connection Error: " . $e->getMessage()
    ]);
    exit;
}

return $pdo;
