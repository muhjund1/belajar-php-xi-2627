<?php
require __DIR__ . "/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$pesan = trim($_POST['pesan'] ?? '');

if ($nama === '' || $pesan === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    exit('Data yang dikirim tidak valid.');
}

$sql = "INSERT INTO tamu (nama, email, pesan) VALUES (:nama, :email, :pesan)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nama' => $nama,
    ':email' => $email,
    ':pesan' => $pesan
]);

header("Location: index.php");
exit;
?>