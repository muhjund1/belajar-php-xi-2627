<?php

require __DIR__ . "/koneksi.php";

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$pesan = trim($_POST['pesan'] ?? '');

if (!$id || $nama === '' || $email === '' || $pesan === '') {
    http_response_code(400);
    exit('Data yang dikirim tidak lengkap.');
}

$sql = "UPDATE tamu SET nama = :nama, email = :email, pesan = :pesan WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    "nama" => $nama,
    "email" => $email,
    "pesan" => $pesan,
    "id" => $id
]);

header("Location: index.php");
exit;
?>