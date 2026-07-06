<?php
header("Content-Type: application/json");

// Konfigurasi Database
$host = '127.0.0.1';
$db   = 'belajar_backend_db';
$user = 'root';
$pass = 'passwordrahasia';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // 1. Membuat Koneksi (PDO)
    $pdo = new PDO($dsn, $user, $pass, $options);

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
        "message" => "Database Error: " . $e->getMessage()
    ]);
}
?>
