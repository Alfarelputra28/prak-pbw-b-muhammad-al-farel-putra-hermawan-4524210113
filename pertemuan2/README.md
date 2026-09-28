# Tugas 2 Praktikum PBW

## Identitas

Nama: Muhammad Al Farel Putra Hermawan
NPM: 4524210113
Mata Kuliah: Pemrograman Berbasis Web

## Modifikasi

### 1. Menambahkan Field Angkatan

Menambahkan field `angkatan` pada data mahasiswa dengan nilai 2024. Field ini ditampilkan bersama data biodata mahasiswa.

### 2. Menambahkan Status Mahasiswa

Menambahkan fungsi `statusMahasiswa()` untuk menentukan status mahasiswa berdasarkan semester. Jika semester sampai 4, statusnya adalah Mahasiswa Aktif Awal. Jika semester lebih dari 4, statusnya adalah Mahasiswa Aktif Lanjutan.

## Penjelasan 5 Bagian Kode

1. **Fungsi `statusKelulusan()`**
   Digunakan untuk menentukan predikat mahasiswa berdasarkan IPK.

2. **Fungsi `statusMahasiswa()`**
   Digunakan untuk menentukan status mahasiswa berdasarkan semester.

3. **Array `$mahasiswa`**
   Digunakan untuk menyimpan data NIM, nama, prodi, semester, IPK, dan angkatan.

4. **Perulangan `foreach`**
   Digunakan untuk menampilkan data mahasiswa.

5. **`htmlspecialchars()`**
   Digunakan untuk menampilkan data dengan lebih aman pada halaman HTML.

## Error yang Ditemukan

**Error:** Muncul `404 Not Found` saat membuka `biodata.php`.

**Penyebab:** Server PHP dijalankan dari folder yang tidak sesuai dengan lokasi file.

**Perbaikan:** Masuk ke folder `pertemuan2` terlebih dahulu, kemudian menjalankan server PHP dari folder tersebut menggunakan XAMPP.

## Screenshot

### Sebelum Modifikasi

![Screenshot Sebelum](screenshots/sebelum.png)

### Sesudah Modifikasi

![Screenshot Sesudah](screenshots/sesudah.png)
