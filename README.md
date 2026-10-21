# Praktikum Pemrograman Web — PHP

Kumpulan latihan dan tugas **Pemrograman Web** untuk tahun ajaran **2026/2027** di **SMK Negeri 2 Surakarta**. Repository ini mendokumentasikan proses belajar PHP dari dasar hingga pengolahan formulir dan CRUD dengan MySQL.

## Daftar Isi

- [Tentang Proyek](#tentang-proyek)
- [Materi Praktikum](#materi-praktikum)
- [Struktur Repository](#struktur-repository)
- [Teknologi](#teknologi)
- [Menjalankan Proyek](#menjalankan-proyek)
- [Menjalankan Praktikum 7](#menjalankan-praktikum-7)
- [Catatan](#catatan)

## Tentang Proyek

Repository ini berisi latihan dan tugas praktikum yang dirancang untuk membangun pemahaman bertahap tentang:

- Sintaks dasar PHP, variabel, operator, dan output.
- Percabangan, perulangan, function, dan array.
- Form HTML serta pemrosesan data menggunakan metode `POST`.
- Koneksi PHP ke database MySQL.
- Operasi CRUD: **Create, Read, Update, and Delete**.

## Materi Praktikum

| Praktikum | Materi |
| --- | --- |
| 1 | Dasar PHP dan output |
| 2 | Variabel, operator, dan percabangan |
| 3 | Struktur kontrol dan perulangan |
| 4 | Function dan pengolahan data |
| 5 | Array dan `foreach` |
| 6 | Form HTML, metode `POST`, dan pemrosesan data |
| 7 | Database MySQL dan aplikasi CRUD siswa |

## Struktur Repository

```text
.
├── praktikum1/
│   ├── latihan.php
│   └── tugas.php
├── praktikum2/
│   ├── latihan.php
│   └── tugas.php
├── praktikum3/
│   ├── latihan.php
│   └── tugas.php
├── praktikum4/
│   ├── latihan.php
│   └── tugas.php
├── praktikum5/
│   ├── latihan.php
│   └── tugas.php
├── praktikum6/
│   ├── latihan/
│   │   ├── form.html
│   │   └── proses.php
│   └── tugas/
│       └── tugas.php
└── praktikum7/
    ├── latihan/
    │   ├── db_sekolah.sql
    │   ├── koneksi.php
    │   ├── tambah.php
    │   └── tampil.php
    └── tugas/
        ├── db_sekolah.sql
        ├── koneksi.php
        ├── index.php
        ├── tambah.php
        ├── edit.php
        ├── hapus.php
        └── style.css
```

## Teknologi

- **PHP** — server-side programming
- **MySQL** — relational database
- **XAMPP** — local PHP and MySQL environment
- **HTML and CSS** — page structure and styling
- **phpMyAdmin** — database management
- **Web browser and code editor** — development and testing

## Menjalankan Proyek

### 1. Siapkan lingkungan

Install PHP, atau install XAMPP yang menyediakan PHP dan MySQL/MariaDB. Untuk praktikum database, pastikan layanan database berjalan.

### 2. Unduh repository

```bash
git clone https://github.com/jasonhukom/Praktikum-Pemrograman-Web-PHP.git
cd Praktikum-Pemrograman-Web-PHP
```

### 3. Jalankan server PHP

Dari direktori utama repository, jalankan:

```bash
php -S localhost:8000
```

Buka file praktikum melalui browser, misalnya:

- [Praktikum 1 — Latihan](http://localhost:8000/praktikum1/latihan.php)
- [Praktikum 1 — Tugas](http://localhost:8000/praktikum1/tugas.php)

Sesuaikan nama file dan folder dengan praktikum yang ingin dibuka. Jika menggunakan XAMPP Apache, letakkan repository di dalam direktori `htdocs`, lalu akses melalui URL lokal yang sesuai.

## Menjalankan Praktikum 7

Praktikum 7 membutuhkan database MySQL bernama `db_sekolah`.

1. Jalankan MySQL dari XAMPP.
2. Buka phpMyAdmin.
3. Import file SQL dari salah satu folder berikut:
   - Latihan: `praktikum7/latihan/db_sekolah.sql`
   - Tugas CRUD: `praktikum7/tugas/db_sekolah.sql`
4. Pastikan pengaturan koneksi pada `koneksi.php` sesuai dengan konfigurasi MySQL lokal.
5. Jalankan server web dan buka halaman praktikum yang diinginkan.

### Fitur tugas CRUD

- **Create:** menambahkan data siswa.
- **Read:** menampilkan data siswa, pencarian, ringkasan statistik, serta perhitungan predikat dan status kelulusan.
- **Update:** mengedit data siswa dengan validasi.
- **Delete:** menghapus data siswa dengan konfirmasi.
- **Interface:** tampilan dark mode dengan gaya glassmorphism.

> **Catatan keamanan:** konfigurasi koneksi saat ini menggunakan akun lokal `root` tanpa kata sandi, sesuai konfigurasi pengembangan XAMPP yang umum. Gunakan akun database khusus dan kredensial yang aman di lingkungan produksi. Jangan mengekspos server praktikum ke internet.

## Catatan

Proyek ini merupakan dokumentasi pembelajaran dan pengumpulan hasil praktikum, bukan aplikasi produksi.

---

**Informasi pembelajaran**
- **Nama:** Jason Christopher Hukom
- **Kelas:** XI PPLG-B
- **Nomor:** 18
- **Sekolah:** SMK Negeri 2 Surakarta
- **Mata pelajaran:** Pemrograman Web (PW)
- **Tahun ajaran:** 2026/2027
