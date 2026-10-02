<?php
/**
 * Aplikasi Data Siswa - Update (Edit Data)
 * Praktikum 7 - Tugas Akhir (CRUD Sederhana PHP & MySQL)
 * SMK Negeri 2 Surakarta - Kelas XI PPLG
 */

include "koneksi.php";

$error = "";

// Mengambil ID siswa dari parameter URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header("Location: index.php");
    exit();
}

// Mengambil data siswa saat ini menggunakan prepared statement
$stmt = mysqli_prepare($koneksi, "SELECT * FROM siswa WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$siswa = mysqli_fetch_assoc($result);

if (!$siswa) {
    header("Location: index.php?pesan=gagal");
    exit();
}

// Proses update saat formulir disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = trim($_POST['nama']);
    $kelas = trim($_POST['kelas']);
    $nilai = trim($_POST['nilai']);

    if (empty($nama) || empty($kelas) || $nilai === '') {
        $error = "Semua kolom formulir wajib diisi!";
    } elseif (!is_numeric($nilai) || $nilai < 0 || $nilai > 100) {
        $error = "Nilai harus berupa angka antara 0 sampai 100!";
    } else {
        $nilai = (int)$nilai;

        // Prepared statement update
        $update_stmt = mysqli_prepare($koneksi, "UPDATE siswa SET nama = ?, kelas = ?, nilai = ? WHERE id = ?");
        mysqli_stmt_bind_param($update_stmt, "ssii", $nama, $kelas, $nilai, $id);

        if (mysqli_stmt_execute($update_stmt)) {
            header("Location: index.php?pesan=sukses_edit");
            exit();
        } else {
            $error = "Gagal memperbarui data: " . mysqli_error($koneksi);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa — Praktikum 7 CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <header class="app-header">
        <div class="brand-wrapper">
            <div class="brand-badge">P7</div>
            <div>
                <h1 class="brand-title">Edit Data <span>Siswa</span></h1>
                <p class="brand-subtitle">Perbarui data siswa pada database</p>
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
                    value="<?= htmlspecialchars(isset($_POST['nama']) ? $_POST['nama'] : $siswa['nama']) ?>" 
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
                    value="<?= htmlspecialchars(isset($_POST['kelas']) ? $_POST['kelas'] : $siswa['kelas']) ?>" 
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
                    min="0" 
                    max="100" 
                    value="<?= htmlspecialchars(isset($_POST['nilai']) ? $_POST['nilai'] : $siswa['nilai']) ?>" 
                    required
                >
            </div>

            <div class="form-actions">
                <a href="index.php" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <footer class="app-footer">
        <p>&copy; 2026 <span>SMK Negeri 2 Surakarta</span> &bull; Praktikum Pemrograman Web PHP</p>
    </footer>
</div>

</body>
</html>
