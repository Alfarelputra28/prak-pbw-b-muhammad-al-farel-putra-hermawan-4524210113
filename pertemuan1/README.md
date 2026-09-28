# Tugas 1 Praktikum PBW

## Identitas

Nama: Muhammad Al Farel Putra Hermawan  
NPM: 4524210113  
Mata Kuliah: Pemrograman Berbasis Web

## Modifikasi

### 1. Menambahkan Semester
Menambahkan informasi semester mahasiswa dan menampilkannya pada halaman.

### 2. Menambahkan Diskon Produk
Menambahkan diskon pada produk dan menghitung harga akhir setelah diskon.

## Penjelasan Bagian Kode

1. Interface `Identitas` digunakan sebagai aturan untuk class Mahasiswa.
2. Class `Mahasiswa` digunakan untuk menyimpan data mahasiswa.
3. Fungsi `setIpk()` digunakan untuk memvalidasi nilai IPK 0 sampai 4.
4. Fungsi `statusKelulusan()` digunakan untuk menentukan status berdasarkan IPK.
5. Perulangan `foreach` digunakan untuk menampilkan produk dan menghitung harga setelah diskon.

## Error yang Ditemukan

PHP tidak dikenali saat dijalankan melalui terminal karena PHP belum masuk ke PATH Windows.

Solusinya menggunakan PHP dari XAMPP:

`C:\xampp\php\php.exe -S localhost:8000`

## Screenshot

### Sebelum Modifikasi

![Screenshot Sebelum](screenshots/sebelum.png)

### Sesudah Modifikasi

![Screenshot Sesudah](screenshots/sesudah.png)