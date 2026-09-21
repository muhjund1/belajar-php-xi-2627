<?php
require "koneksi.php";

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    http_response_code(400);
    exit('ID tamu tidak valid.');
}

$sql = "SELECT * FROM tamu WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute(['id' => $id]);

$tamu = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$tamu) {
    http_response_code(404);
    exit('Data tamu tidak ditemukan.');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Tamu</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
            }

            form {
                max-width: 400px;
                margin: 0 auto;
            }

            input[type="text"],
            input[type="email"],
            textarea {
                width: 100%;
                padding: 8px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            button {
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            button:hover {
                background-color: #45a049;
            }
        </style>
    </head>

<body>
    <h1>Edit Data Tamu</h1>

    <form action="proses_edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo (int) $tamu['id']; ?>">

        <p>
            Nama:<br>
            <input type="text" name="nama" value="<?php echo htmlspecialchars($tamu["nama"]); ?>" required>
        </p>

        <p>
            Email:<br>
            <input type="email" name="email" value="<?php echo htmlspecialchars($tamu["email"]); ?>" required>
        </p>

        <p>
            Pesan:<br>
            <textarea name="pesan" required><?php echo htmlspecialchars($tamu["pesan"]); ?></textarea>  
        </p>

        <p>
            Nomor Telepon:<br>
            <input type="text" name="nomor_telepon" value="<?php echo htmlspecialchars($tamu["nomor_telepon"] ?? ''); ?>">
        </p>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <p><a href="index.php">Kembali ke Daftar Tamu</a></p>
</body>
</html>