# Praktikum Pemrograman Web PHP

Repository ini berisi hasil praktikum **Pemrograman Web (PHP)** tahun ajaran **2026/2027** di **SMK Negeri 2 Surakarta**.

## 📁 Struktur Repository

```text
.
├── README.md
│
├── praktikum1/
│   ├── latihan.php
│   └── tugas.php
│
├── praktikum2/
│   ├── latihan.php
│   └── tugas.php
│
├── praktikum3/
│   ├── latihan.php
│   └── tugas.php
│
├── praktikum4/
│   ├── latihan.php
│   └── tugas.php
│
├── praktikum5/
│   ├── latihan.php
│   └── tugas.php
│
├── praktikum6/
│   ├── latihan/
│   │   ├── form.html
│   │   └── proses.php
│   │
│   └── tugas/
│       └── tugas.php
│
└── praktikum7/
    ├── latihan/
    │   ├── db_sekolah.sql
    │   ├── koneksi.php
    │   ├── tambah.php
    │   └── tampil.php
    │
    └── tugas/
        ├── db_sekolah.sql
        ├── edit.php
        ├── hapus.php
        ├── index.php
        ├── koneksi.php
        ├── style.css
        └── tambah.php
```
🎯 Tujuan Pembelajaran

Praktikum ini bertujuan untuk:

Memahami dasar-dasar pemrograman PHP.

Memahami penggunaan variabel, operator, percabangan, dan perulangan dalam PHP.

Membuat dan memproses form menggunakan PHP.

Membuat sistem CRUD sederhana.

Menghubungkan PHP dengan database MySQL.


🧪 Daftar Praktikum

Praktikum	Materi

Praktikum 1	Dasar PHP dan output
Praktikum 2	Variabel, operator, dan percabangan
Praktikum 3	Percabangan dan perulangan
Praktikum 4	Function dan pengolahan data
Praktikum 5	Array dan foreach
Praktikum 6	Form HTML, POST, dan PHP
Praktikum 7	Database MySQL dan CRUD


🛠️ Tools yang Digunakan

PHP

MySQL

XAMPP

Terminal

Web Browser seperti Chrome, Firefox, atau Brave

IDE seperti Visual Studio Code, Notepad++, atau AntiGravity IDE


🚀 Menjalankan Project

Pastikan PHP sudah terpasang dan XAMPP tersedia.

Project dapat dijalankan menggunakan PHP Development Server.

Contoh:

cd /xampp
php -S localhost:8000

Kemudian buka folder praktikum yang ingin dijalankan melalui browser.

Contoh:

http://localhost:8000/praktikum-php/praktikum1/latihan.php

> Sesuaikan URL dengan lokasi folder project di komputer.



🗄️ Praktikum 7

Praktikum 7 menggunakan database `db_sekolah` dan berisi latihan dasar serta tugas akhir CRUD lengkap (Create, Read, Update, Delete).

### Latihan
- Database: `praktikum7/latihan/db_sekolah.sql`
- File PHP:
  - `praktikum7/latihan/koneksi.php`
  - `praktikum7/latihan/tambah.php`
  - `praktikum7/latihan/tampil.php`

### Tugas Akhir (CRUD Lengkap)
- Database: `praktikum7/tugas/db_sekolah.sql`
- Fitur:
  - **Create**: `praktikum7/tugas/tambah.php` (Prepared statements `mysqli_prepare`)
  - **Read**: `praktikum7/tugas/index.php` (Tabel siswa dinamis, ringkasan statistik, kalkulasi predikat & status kelulusan, fitur pencarian)
  - **Update**: `praktikum7/tugas/edit.php` (Pembaruan data siswa dengan validasi)
  - **Delete**: `praktikum7/tugas/hapus.php` (Penghapusan data aman dengan konfirmasi dialog)
  - **Styling**: `praktikum7/tugas/style.css` (Modern dark mode & glassmorphism)

Import file `db_sekolah.sql` ke MySQL melalui phpMyAdmin sebelum menjalankan aplikasi database.

📚 Materi Praktikum

Praktikum 1

 - Mempelajari dasar-dasar PHP dan penggunaan echo untuk menampilkan output.

Praktikum 2

 - Mempelajari variabel, operasi matematika, perhitungan nilai, dan percabangan menggunakan if dan elseif.

Praktikum 3

 - Mempelajari struktur kontrol, perulangan for, operator modulus, serta penggunaan continue.

Praktikum 4

 - Mempelajari pembuatan dan penggunaan function serta pengolahan data siswa.

Praktikum 5

 - Mempelajari array, array asosiatif, dan perulangan foreach.

Praktikum 6

 - Mempelajari HTML Form, metode POST, pengambilan data menggunakan $_POST, serta pembuatan kalkulator sederhana menggunakan function.

Praktikum 7

 - Mempelajari koneksi PHP dengan database MySQL dan konsep CRUD sederhana.


---

👨‍💻 Informasi

Nama: Jason Christopher Hukom
Kelas: XI PPLG-B
No: 18
Sekolah: SMK Negeri 2 Surakarta
Mata Pelajaran: Pemrograman Web (PW)
Tahun Ajaran: 2026/2027


---

> Repository ini dibuat sebagai dokumentasi dan pengumpulan hasil praktikum Pemrograman Web menggunakan PHP.
