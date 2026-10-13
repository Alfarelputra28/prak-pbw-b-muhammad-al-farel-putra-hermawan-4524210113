# Tugas Pertemuan 6 — CRUD Data Mahasiswa

## 1. Deskripsi
Tugas ini merupakan pengembangan aplikasi web CRUD (Create, Read, Update, Delete) data mahasiswa menggunakan PHP, MySQL, HTML, dan Tailwind CSS. Aplikasi digunakan untuk menampilkan, menambahkan, mengubah, mencari, dan menghapus data mahasiswa.

## 2. Struktur File
Folder `tugas pertemuan 6` memiliki file berikut:

- `index.php` — Menampilkan daftar mahasiswa dan fitur pencarian data.
- `create.php` — Menampilkan formulir tambah mahasiswa.
- `store.php` — Memproses dan menyimpan data mahasiswa baru ke database.
- `edit.php` — Menampilkan formulir untuk mengubah data mahasiswa.
- `update.php` — Memproses perubahan data mahasiswa.
- `delete.php` — Menghapus data mahasiswa dari database.

## 3. Perubahan yang Dilakukan

### Perubahan 1: Fitur Pencarian Mahasiswa
Pada file `index.php`, ditambahkan fitur pencarian berdasarkan NIM, nama, atau program studi. Fitur ini memudahkan pengguna menemukan data mahasiswa tanpa harus mencari satu per satu.

### Perubahan 2: Validasi Input
Pada file `store.php` dan `update.php`, ditambahkan validasi input untuk memeriksa kelengkapan data, format email, rentang tahun angkatan, serta nilai IPK antara 0 dan 4. Validasi membantu mencegah data yang tidak sesuai disimpan ke database.

### Perubahan 3: Keamanan Query Database
Query untuk menambah, mengubah, mencari, dan menghapus data menggunakan prepared statement untuk mengurangi risiko SQL injection.

### Perubahan 4: Tampilan Antarmuka
Tampilan halaman menggunakan Tailwind CSS agar formulir dan tabel data lebih rapi, responsif, serta mudah digunakan.

## 4. Lima Bagian Kode Penting

### 1. Koneksi Database
File `Koneksi.php` digunakan untuk menghubungkan aplikasi PHP dengan database MySQL. Koneksi ini diperlukan agar aplikasi dapat membaca dan mengelola data mahasiswa.

### 2. Menampilkan dan Mencari Data
File `index.php` mengambil data dari tabel `mahasiswa`, menampilkannya dalam tabel, dan menyediakan fitur pencarian berdasarkan kata kunci yang dimasukkan pengguna.

### 3. Menambahkan Data
File `create.php` menampilkan formulir input, sedangkan `store.php` memvalidasi data dan menjalankan query INSERT untuk menyimpan mahasiswa baru.

### 4. Mengubah Data
File `edit.php` mengambil data mahasiswa berdasarkan NIM dan menampilkannya pada formulir. File `update.php` memvalidasi input lalu menjalankan query UPDATE untuk menyimpan perubahan.

### 5. Menghapus Data
File `delete.php` menerima NIM mahasiswa, menjalankan query DELETE menggunakan prepared statement, lalu mengarahkan pengguna kembali ke halaman daftar mahasiswa.

## 5. Pengujian Aplikasi

Pengujian dilakukan atau akan dilakukan dengan skenario berikut:

| No. | Pengujian | Hasil yang Diharapkan |
|---|---|---|
| 1 | Membuka `index.php` | Daftar mahasiswa tampil |
| 2 | Mencari mahasiswa | Data sesuai kata kunci ditampilkan |
| 3 | Menambah mahasiswa | Data baru tersimpan |
| 4 | Mengubah data mahasiswa | Perubahan tersimpan |
| 5 | Menghapus mahasiswa | Data terhapus setelah konfirmasi |
| 6 | Memasukkan email tidak valid | Input ditolak |
| 7 | Memasukkan IPK di luar rentang 0–4 | Input ditolak |

## 6. Dokumentasi Error dan Perbaikan

**Error:** Halaman menampilkan pesan `Not Found (404)` ketika aplikasi dibuka melalui browser.

**Penyebab:** Alamat URL yang digunakan tidak sesuai dengan struktur folder aplikasi, atau folder aplikasi tidak ditemukan pada direktori yang dilayani Apache.

**Perbaikan:** Memeriksa lokasi folder aplikasi di dalam `C:\xampp\htdocs`, memastikan nama folder dan file `index.php` benar, serta memastikan Apache berjalan melalui XAMPP.

**URL aplikasi:**

`http://localhost/Pertemuan%206/tugas%20pertemuan%206/index.php`

Catatan: URL tersebut berlaku apabila struktur folder berada di `C:\xampp\htdocs\Pertemuan 6\tugas pertemuan 6\`.

## 7. Dokumentasi Screenshot

Tambahkan screenshot berikut sebagai bukti pengerjaan:

1. **Sebelum perubahan:** Tampilan aplikasi atau kode program sebelum dimodifikasi.
2. **Sesudah perubahan:** Tampilan aplikasi setelah fitur pencarian dan perubahan lainnya diterapkan.
3. **Form tambah mahasiswa:** Bukti formulir penambahan data.
4. **Form edit mahasiswa:** Bukti formulir pengubahan data.
5. **Hasil pengujian:** Bukti data berhasil ditambah, diubah, dicari, atau dihapus.

Simpan screenshot pada folder `screenshots` dan sesuaikan nama file dengan screenshot yang benar-benar tersedia.

## 8. Kesimpulan

Melalui tugas ini, aplikasi CRUD data mahasiswa dikembangkan dengan fitur pencarian, validasi input, prepared statement, serta tampilan antarmuka yang lebih terstruktur. Pengujian dilakukan untuk memastikan fungsi utama aplikasi berjalan sesuai kebutuhan.

## 9. Teknologi yang Digunakan

- PHP
- MySQL
- HTML
- Tailwind CSS
- XAMPP
- Git dan GitHub
