<?php
require __DIR__ . "/koneksi.php";

$sql = "SELECT * FROM tamu ORDER BY id DESC";
$stmt = $pdo->query($sql);
$dataTamu = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Buku Tamu</title>
        <style>
            :root {
                --primary: #2563eb;
                --primary-dark: #1d4ed8;
                --ink: #172033;
                --muted: #667085;
                --line: #dbe3ef;
                --surface: #ffffff;
                --background: #f4f7fb;
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                min-height: 100vh;
                padding: 48px 20px;
                color: var(--ink);
                background: linear-gradient(135deg, #eef4ff 0%, var(--background) 55%, #eaf8f4 100%);
                font-family: "Segoe UI", Tahoma, sans-serif;
                line-height: 1.6;
            }

            body > h1,
            body > form,
            body > hr,
            body > h2,
            body > h3,
            body > p,
            body > small {
                width: min(100%, 720px);
                margin-right: auto;
                margin-left: auto;
            }

            h1 {
                margin-top: 0;
                margin-bottom: 28px;
                color: #102a56;
                font-size: clamp(2rem, 5vw, 3rem);
                letter-spacing: -0.03em;
            }

            form {
                padding: 28px;
                border: 1px solid rgba(255, 255, 255, 0.8);
                border-radius: 16px;
                background: rgba(255, 255, 255, 0.9);
                box-shadow: 0 18px 45px rgba(32, 58, 91, 0.1);
            }

            form p {
                margin: 0 0 18px;
            }

            form p:last-of-type {
                margin-bottom: 22px;
            }

            input,
            textarea {
                width: 100%;
                margin-top: 6px;
                padding: 12px 14px;
                color: var(--ink);
                border: 1px solid var(--line);
                border-radius: 9px;
                background: #fbfdff;
                font: inherit;
                transition: border-color 0.2s ease, box-shadow 0.2s ease;
            }

            textarea {
                min-height: 120px;
                resize: vertical;
            }

            input:focus,
            textarea:focus {
                outline: none;
                border-color: var(--primary);
                box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.14);
            }

            button {
                padding: 12px 22px;
                color: #fff;
                border: 0;
                border-radius: 9px;
                background: var(--primary);
                font: inherit;
                font-weight: 700;
                cursor: pointer;
                transition: background 0.2s ease, transform 0.2s ease;
            }

            button:hover {
                background: var(--primary-dark);
                transform: translateY(-1px);
            }

            hr {
                margin-top: 42px;
                margin-bottom: 28px;
                border: 0;
                border-top: 1px solid var(--line);
            }

            h2 {
                margin-bottom: 18px;
                font-size: 1.5rem;
            }

            h3 {
                margin-top: 24px;
                margin-bottom: 2px;
                font-size: 1.1rem;
            }

            h3 + p {
                margin-top: 0;
                color: var(--muted);
                font-size: 0.94rem;
            }

            h3 ~ p {
                margin-bottom: 8px;
            }

            small {
                display: block;
                color: var(--muted);
                font-size: 0.82rem;
            }

            .actions {
                margin-top: 6px;
                font-size: 0.9rem;
                color: var(--muted);
            }



            

            @media (max-width: 540px) {
                body {
                    padding: 28px 14px;
                }

                form {
                    padding: 20px;
                }
            }
        </style>
</head>
<body>
    <h1>Buku Tamu</h1>

    <form action="proses.php" method="POST">

    <p>
        <label for="nama">Nama:</label><br>
        <input id="nama" type="text" name="nama" maxlength="100" required>
    </p>
    <p>
        <label for="email">Email:</label><br>
        <input id="email" type="email" name="email" maxlength="255" required>
    </p>
    <p>
        <label for="pesan">Pesan:</label><br>
        <textarea id="pesan" name="pesan" maxlength="1000" required></textarea>
    </p>
    <p>
        <label for="nomor_telepon">Nomor Telepon:</label><br>
        <input id="nomor_telepon" type="text" name="nomor_telepon" maxlength="15">
    </p>

    <button type="submit">Simpan</button>
</form>

<hr>

<h2>Daftar Tamu</h2>

<?php foreach ($dataTamu as $tamu): ?>

    <h3><?php echo htmlspecialchars($tamu['nama']); ?></h3>
    <p>Email: <?php echo htmlspecialchars($tamu['email']); ?></p>
    <p><?php echo htmlspecialchars($tamu['pesan'], ENT_QUOTES, 'UTF-8'); ?></p>
    <small><?php echo htmlspecialchars($tamu['created_at'], ENT_QUOTES, 'UTF-8'); ?></small>
    <?php if (!empty($tamu['nomor_telepon'])): ?>
        <p>Nomor Telepon: <?php echo htmlspecialchars($tamu['nomor_telepon'], ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>
    <p class="actions">
        <a href="edit.php?id=<?php echo (int) $tamu['id']; ?>">Edit</a>
    
    
        <a href="hapus.php?id=<?php echo $tamu["id"]; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus tamu ini?')">Hapus</a>
    </p>
    <hr>

    <?php endforeach; ?>
</body>
</html>

