<?php
/**
 * Koneksi Database MySQL
 * Praktikum 7 - Tugas Akhir (Aplikasi CRUD Siswa)
 * SMKN 2 Surakarta - Kelas XI PPLG
 */

$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_sekolah";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Set karakter encoding
mysqli_set_charset($koneksi, "utf8mb4");
?>
