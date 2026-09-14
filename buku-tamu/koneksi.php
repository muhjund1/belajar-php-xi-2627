
<?php

$host = "localhost";
$dbname = "buku_tamu";
$username = "root";
$password = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(
        pdo::ATTR_ERRMODE,
        pdo::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}