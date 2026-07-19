<?php
// index.php
header("Content-Type: application/json");

// 1. Memanggil Koneksi (PDO)
/** @var PDO $pdo */
$pdo = require __DIR__ . '/database.php';

try {
    $method = $_SERVER['REQUEST_METHOD'];

    // 2. Routing Sederhana
    if ($method === 'GET') {
        // [READ] Menampilkan semua pengguna
        $stmt = $pdo->query("SELECT * FROM users");
        $users = $stmt->fetchAll();
        
        echo json_encode([
            "status" => "success",
            "data" => $users
        ]);

    } elseif ($method === 'POST') {
        // [CREATE] Menambahkan pengguna baru
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (!isset($input['nama']) || !isset($input['email'])) {
            http_response_code(400);
            echo json_encode(["message" => "Nama dan email wajib diisi!"]);
            exit;
        }

        // Mencegah SQL Injection dengan Prepared Statement
        $stmt = $pdo->prepare("INSERT INTO users (nama, email) VALUES (:nama, :email)");
        $stmt->execute([
            'nama' => $input['nama'],
            'email' => $input['email']
        ]);

        http_response_code(201);
        echo json_encode([
            "status" => "success",
            "message" => "Pengguna berhasil ditambahkan",
            "insertedId" => $pdo->lastInsertId()
        ]);
    } else {
        http_response_code(405);
        echo json_encode(["message" => "Metode HTTP tidak diizinkan"]);
    }

} catch (\PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "status" => "error", 
        "message" => "Query Error: " . $e->getMessage()
    ]);
}
