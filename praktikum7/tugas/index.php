<?php
/**
 * Aplikasi Data Siswa - Read & Dashboard
 * Praktikum 7 - Tugas Akhir (CRUD Sederhana PHP & MySQL)
 * SMK Negeri 2 Surakarta - Kelas XI PPLG
 */

include "koneksi.php";

// Logika Pencarian
$cari = isset($_GET['cari']) ? trim($_GET['cari']) : '';

if (!empty($cari)) {
    // Prepared statement untuk query pencarian aman
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM siswa WHERE nama LIKE ? OR kelas LIKE ? ORDER BY id DESC");
    $param = "%" . $cari . "%";
    mysqli_stmt_bind_param($stmt, "ss", $param, $param);
    mysqli_stmt_execute($stmt);
    $query = mysqli_stmt_get_result($stmt);
} else {
    $query = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY id DESC");
}

// Menghitung statistik keseluruhan
$stat_query = mysqli_query($koneksi, "SELECT COUNT(*) as total, AVG(nilai) as rata_rata, MAX(nilai) as max_nilai, MIN(nilai) as min_nilai FROM siswa");
$stats = mysqli_fetch_assoc($stat_query);

// Helper function menentukan predikat (konsisten dengan Praktikum 2)
function hitungPredikat($nilai) {
    if ($nilai >= 90) return ["grade" => "A", "class" => "badge-a"];
    if ($nilai >= 80) return ["grade" => "B", "class" => "badge-b"];
    if ($nilai >= 70) return ["grade" => "C", "class" => "badge-c"];
    return ["grade" => "D", "class" => "badge-d"];
}

// Notifikasi pesan status
$pesan = isset($_GET['pesan']) ? $_GET['pesan'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa — Praktikum 7 CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <!-- Header -->
    <header class="app-header">
        <div class="brand-wrapper">
            <div class="brand-badge">P7</div>
            <div>
                <h1 class="brand-title">Data Siswa <span>PPLG</span></h1>
                <p class="brand-subtitle">Praktikum 7 — Sistem CRUD PHP & MySQL &bull; SMKN 2 Surakarta</p>
            </div>
        </div>
        <div>
            <a href="tambah.php" class="btn btn-primary">+ Tambah Siswa Baru</a>
        </div>
    </header>

    <!-- Notifikasi Alert -->
    <?php if ($pesan == 'sukses_tambah'): ?>
        <div class="alert alert-success">
            <span>✅ Data siswa baru berhasil disimpan ke database!</span>
            <button class="alert-close" onclick="this.parentElement.remove()">&times;</button>
        </div>
    <?php elseif ($pesan == 'sukses_edit'): ?>
        <div class="alert alert-success">
            <span>✅ Data siswa berhasil diperbarui!</span>
            <button class="alert-close" onclick="this.parentElement.remove()">&times;</button>
        </div>
    <?php elseif ($pesan == 'sukses_hapus'): ?>
        <div class="alert alert-success">
            <span>✅ Data siswa berhasil dihapus dari database!</span>
            <button class="alert-close" onclick="this.parentElement.remove()">&times;</button>
        </div>
    <?php elseif ($pesan == 'gagal'): ?>
        <div class="alert alert-danger">
            <span>❌ Terjadi kesalahan saat memproses data. Silakan coba lagi.</span>
            <button class="alert-close" onclick="this.parentElement.remove()">&times;</button>
        </div>
    <?php endif; ?>

    <!-- Statistik Ringkas -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-label">Total Siswa</div>
            <div class="stat-value accent-orange"><?= (int)$stats['total'] ?></div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Rata-Rata Nilai</div>
            <div class="stat-value accent-cyan">
                <?= $stats['rata_rata'] !== null ? number_format($stats['rata_rata'], 1) : '0' ?>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Nilai Tertinggi</div>
            <div class="stat-value accent-emerald"><?= $stats['max_nilai'] !== null ? (int)$stats['max_nilai'] : '0' ?></div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Nilai Terendah</div>
            <div class="stat-value accent-rose"><?= $stats['min_nilai'] !== null ? (int)$stats['min_nilai'] : '0' ?></div>
        </div>
    </div>

    <!-- Konten Utama: Tabel Siswa -->
    <main class="main-card">
        <div class="toolbar">
            <form action="" method="GET" class="search-box">
                <input 
                    type="text" 
                    name="cari" 
                    class="form-control" 
                    placeholder="Cari berdasarkan nama atau kelas..." 
                    value="<?= htmlspecialchars($cari) ?>"
                >
                <button type="submit" class="btn btn-secondary">Cari</button>
                <?php if (!empty($cari)): ?>
                    <a href="index.php" class="btn btn-secondary" title="Reset Pencarian">Reset</a>
                <?php endif; ?>
            </form>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th class="td-center" style="width: 60px;">No</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th class="td-center">Nilai</th>
                        <th class="td-center">Predikat</th>
                        <th class="td-center">Status</th>
                        <th class="td-center" style="width: 170px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    if (mysqli_num_rows($query) > 0):
                        while ($data = mysqli_fetch_assoc($query)): 
                            $predikatInfo = hitungPredikat($data['nilai']);
                            $statusLulus = ($data['nilai'] >= 75);
                    ?>
                    <tr>
                        <td class="td-center"><?= $no++ ?></td>
                        <td>
                            <span class="student-name"><?= htmlspecialchars($data['nama']) ?></span>
                        </td>
                        <td><?= htmlspecialchars($data['kelas']) ?></td>
                        <td class="td-center">
                            <strong><?= (int)$data['nilai'] ?></strong>
                        </td>
                        <td class="td-center">
                            <span class="badge <?= $predikatInfo['class'] ?>">
                                <?= $predikatInfo['grade'] ?>
                            </span>
                        </td>
                        <td class="td-center">
                            <?php if ($statusLulus): ?>
                                <span class="status-pill status-lulus">Lulus</span>
                            <?php else: ?>
                                <span class="status-pill status-remidi">Remidi</span>
                            <?php endif; ?>
                        </td>
                        <td class="td-center">
                            <div class="actions-group">
                                <a href="edit.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-edit">Edit</a>
                                <a 
                                    href="hapus.php?id=<?= $data['id'] ?>" 
                                    class="btn btn-sm btn-delete" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data siswa <?= htmlspecialchars(addslashes($data['nama'])) ?>?')"
                                >Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <?php 
                        endwhile; 
                    else: 
                    ?>
                    <tr>
                        <td colspan="7">
                            <div class="empty-state">
                                <h3>Data Tidak Ditemukan</h3>
                                <p><?= !empty($cari) ? 'Tidak ada siswa yang cocok dengan kata kunci pencarian.' : 'Belum ada data siswa di database. Silakan klik Tambah Siswa Baru.' ?></p>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Footer -->
    <footer class="app-footer">
        <p>&copy; 2026 <span>SMK Negeri 2 Surakarta</span> &bull; Praktikum Pemrograman Web PHP</p>
    </footer>
</div>

</body>
</html>
