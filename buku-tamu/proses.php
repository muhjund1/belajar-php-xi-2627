<?php
require "koneksi.php";

$name = $_POST['name'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

$sql = "INSERT INTO tamu (nama, email, pesan) VALUES (:nama, :email, :pesan)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nama' => $name,
    ':email' => $email,
    ':pesan' => $pesan
]);

header("Location: index.php");
exit;
?>