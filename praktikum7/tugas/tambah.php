<?php
/**
 * Aplikasi Data Siswa - Create (Tambah Data)
 * Praktikum 7 - Tugas Akhir (CRUD Sederhana PHP & MySQL)
 * SMK Negeri 2 Surakarta - Kelas XI PPLG
 */

include "koneksi.php";

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = trim($_POST['nama']);
    $kelas = trim($_POST['kelas']);
    $nilai = trim($_POST['nilai']);

    // Validasi form dasar
    if (empty($nama) || empty($kelas) || $nilai === '') {
        $error = "Semua kolom formulir wajib diisi!";
    } elseif (!is_numeric($nilai) || $nilai < 0 || $nilai > 100) {
        $error = "Nilai harus berupa angka antara 0 sampai 100!";
    } else {
        $nilai = (int)$nilai;

        // Prepared statement untuk mencegah SQL Injection (sesuai instruksi guru poin 7.4)
        $stmt = mysqli_prepare($koneksi, "INSERT INTO siswa (nama, kelas, nilai) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssi", $nama, $kelas, $nilai);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php?pesan=sukses_tambah");
            exit();
        } else {
            $error = "Gagal menyimpan data: " . mysqli_error($koneksi);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa — Praktikum 7 CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <header class="app-header">
        <div class="brand-wrapper">
            <div class="brand-badge">P7</div>
            <div>
                <h1 class="brand-title">Tambah Siswa <span>Baru</span></h1>
                <p class="brand-subtitle">Formulir penambahan data siswa ke database</p>
            </div>
        </div>
        <div>
            <a href="index.php" class="btn btn-secondary">&larr; Kembali ke Daftar</a>
        </div>
    </header>

    <div class="form-card">
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger" style="margin-bottom: 20px;">
                <span><?= htmlspecialchars($error) ?></span>
                <button class="alert-close" onclick="this.parentElement.remove()">&times;</button>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="nama">Nama Lengkap Siswa</label>
                <input 
                    type="text" 
                    id="nama" 
                    name="nama" 
                    class="form-control" 
                    placeholder="Contoh: Josua Bagus Rusdianto" 
                    value="<?= isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '' ?>" 
                    required 
                    autofocus
                >
            </div>

            <div class="form-group">
                <label for="kelas">Kelas</label>
                <input 
                    type="text" 
                    id="kelas" 
                    name="kelas" 
                    class="form-control" 
                    placeholder="Contoh: XI PPLG B" 
                    value="<?= isset($_POST['kelas']) ? htmlspecialchars($_POST['kelas']) : '' ?>" 
                    required
                >
            </div>

            <div class="form-group">
                <label for="nilai">Nilai Siswa (0 - 100)</label>
                <input 
                    type="number" 
                    id="nilai" 
                    name="nilai" 
                    class="form-control" 
                    placeholder="Contoh: 90" 
                    min="0" 
                    max="100" 
                    value="<?= isset($_POST['nilai']) ? htmlspecialchars($_POST['nilai']) : '' ?>" 
                    required
                >
            </div>

            <div class="form-actions">
                <a href="index.php" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Data Siswa</button>
            </div>
        </form>
    </div>

    <footer class="app-footer">
        <p>&copy; 2026 <span>SMK Negeri 2 Surakarta</span> &bull; Praktikum Pemrograman Web PHP</p>
    </footer>
</div>

</body>
</html>
