<?php

require __DIR__ . "/koneksi.php";

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$pesan = trim($_POST['pesan'] ?? '');
$nomor_telepon = trim($_POST['nomor_telepon'] ?? '');

if (!$id || $nama === '' || $email === '' || $pesan === '') {
    http_response_code(400);
    exit('Data yang dikirim tidak lengkap.');
}

$sql = "UPDATE tamu SET nama = :nama, email = :email, pesan = :pesan, nomor_telepon = :nomor_telepon WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    "nama" => $nama,
    "email" => $email,
    "pesan" => $pesan,
    "nomor_telepon" => $nomor_telepon,
    "id" => $id
]);

header("Location: index.php");
exit;
?>