-- ============================================================
-- Database: db_sekolah
-- Praktikum 7 - Tugas Akhir CRUD Pemrograman Web PHP
-- SMK Negeri 2 Surakarta - Kelas XI PPLG
-- ============================================================

CREATE DATABASE IF NOT EXISTS `db_sekolah` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_sekolah`;

-- --------------------------------------------------------
-- Struktur Tabel `siswa`
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `siswa` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(50) NOT NULL,
  `kelas` VARCHAR(20) NOT NULL,
  `nilai` INT(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Data Sampel Tabel `siswa`
-- --------------------------------------------------------

INSERT INTO `siswa` (`id`, `nama`, `kelas`, `nilai`) VALUES
(1, 'Josua Bagus Rusdianto', 'XI PPLG B', 92),
(2, 'Jason Christopher Hukom', 'XI PPLG B', 88),
(3, 'Aizat Fahim Firmansyah', 'XI PPLG B', 95),
(4, 'Satrio Ernesto Utomo', 'XI PPLG B', 90),
(5, 'Devon Christan Setiawan', 'XI PPLG B', 85);
