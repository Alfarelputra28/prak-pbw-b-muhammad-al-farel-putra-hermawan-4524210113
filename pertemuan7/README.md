# Tugas 7 PBW — Sistem Penjualan MVC

## Identitas Mahasiswa
- **Nama:** Muhammad Al Farel Putra Hermawan
- **NPM:** 4524210113
- **Program Studi:** Teknik Informatika
- **Fakultas:** Teknik
- **Universitas:** Universitas Pancasila

## Deskripsi
Sistem Penjualan MVC adalah aplikasi berbasis web menggunakan PHP dan MySQL. Aplikasi ini dibuat untuk menerapkan konsep Model-View-Controller (MVC) dalam pengelolaan data produk.

## Fitur Aplikasi
1. Menampilkan daftar produk.
2. Menambahkan produk baru.
3. Mengedit data produk.
4. Menghapus produk.
5. Menyimpan data produk ke database MySQL.

## Teknologi yang Digunakan
- PHP
- MySQL
- HTML
- CSS
- XAMPP

## Struktur Folder
```text
pertemuan7/
├── controllers/
│   └── ProdukController.php
├── models/
│   └── ProdukModel.php
├── views/
│   └── produk/
│       ├── index.php
│       ├── create.php
│       ├── edit.php
│       ├── create_form.php
│       └── edit_form.php
├── screenshots/
│   └── daftar-produk.png
├── index.php
├── koneksi.php
├── database.sql
└── README.md
```

## Database
Nama database: `penjualan_mvc`

Nama tabel: `produk`

Tabel digunakan untuk menyimpan data produk, harga, dan stok.

## Cara Menjalankan
1. Jalankan Apache dan MySQL melalui XAMPP.
2. Pastikan database `penjualan_mvc` dan tabel `produk` sudah dibuat.
3. Simpan folder proyek di dalam `htdocs`.
4. Buka browser dan akses alamat berikut:

   `http://localhost/prak-pbw-b-muhammad-al-farel-putra-hermawan-4524210113/pertemuan7/`

## Screenshot Aplikasi

### Halaman Daftar Produk
![Screenshot Halaman Daftar Produk](screenshots/daftar-produk.png)
