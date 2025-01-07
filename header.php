<?php

// Memasukkan koneksi ke database
require_once 'koneksi.php';

// Mengambil data dari tabel header
$query = "SELECT logo, nama_web, informasi_web, alamat_lokasi FROM header LIMIT 1";
$result = mysqli_query($koneksi, $query);

// Cek jika query gagal
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Menyimpan data dari hasil query
$header = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Header</title>
    </head>
    <body>

        <header>
            <div class="header">
                <!-- Logo -->
                <?php if ($header && $header['logo']) : ?>
                    <img src="data:image/png;base64,<?= base64_encode($header['logo']) ?>" alt="Logo">
                <?php endif; ?>

                <!-- Nama, Informasi, Alamat Lokasi Web -->
                <p><?= htmlspecialchars($header['nama_web']) ?></p>
                <p><?= htmlspecialchars($header['informasi_web']) ?></p>
                <p><?= htmlspecialchars($header['alamat_lokasi']) ?></p>
            </div>
        </header>

    </body>
</html>
