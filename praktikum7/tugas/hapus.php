<?php
/**
 * Aplikasi Data Siswa - Delete (Hapus Data)
 * Praktikum 7 - Tugas Akhir (CRUD Sederhana PHP & MySQL)
 * SMK Negeri 2 Surakarta - Kelas XI PPLG
 */

include "koneksi.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    // Prepared statement untuk menghapus data siswa secara aman
    $stmt = mysqli_prepare($koneksi, "DELETE FROM siswa WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php?pesan=sukses_hapus");
        exit();
    } else {
        header("Location: index.php?pesan=gagal");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
