
# Tugas Pertemuan 5
## Aplikasi Data Mahasiswa

### Deskripsi
Aplikasi ini dibuat menggunakan PHP dan MySQL untuk
menyimpan dan menampilkan data mahasiswa.

### Daftar File
1. form.php: Form untuk memasukkan data mahasiswa.
2. koneksi.php: Menghubungkan PHP dengan database MySQL.
3. setup.php: Membuat tabel mahasiswa.
4. simpan.php: Memvalidasi dan menyimpan data mahasiswa.
5. data.php: Menampilkan data mahasiswa dalam tabel.

### Modifikasi Program

**1. Validasi Input**

Pada file form.php ditambahkan atribut required,
type email, min, max, dan step untuk membantu
memastikan data yang dimasukkan sesuai format.

Pada simpan.php juga ditambahkan validasi server
untuk NIM, nama, email, program studi, angkatan,
dan IPK.

**2. Keamanan Query Database**

Pada simpan.php digunakan prepared statement
dengan mysqli_prepare dan mysqli_stmt_bind_param.
Cara ini membantu mencegah SQL injection karena
input dipisahkan dari perintah SQL.

**3. Perbaikan Tampilan**

Pada form.php dan data.php ditambahkan CSS agar
tampilan lebih rapi, mudah dibaca, dan responsif.

### Lima Bagian Kode Penting

**1. Koneksi Database — koneksi.php**

mysqli_connect() digunakan untuk menghubungkan
PHP dengan database MySQL. Jika koneksi gagal,
program menampilkan pesan kegagalan.

**2. Pembuatan Tabel — setup.php**

CREATE TABLE IF NOT EXISTS digunakan untuk
membuat tabel mahasiswa jika belum tersedia.
NIM dijadikan primary key agar nilainya unik.

**3. Form Input — form.php**

Form menggunakan method POST untuk mengirim
data ke simpan.php. Atribut required membantu
mencegah kolom wajib dikosongkan.

**4. Penyimpanan Data — simpan.php**

Data divalidasi sebelum disimpan. Prepared
statement digunakan untuk menjalankan INSERT
dengan parameter sehingga lebih aman.

**5. Tampilan Data — data.php**

SELECT digunakan untuk mengambil data mahasiswa.
htmlspecialchars() digunakan untuk menampilkan
teks dengan lebih aman dari HTML yang tidak
diinginkan.

### Contoh Error

Error: NIM sudah terdaftar.

Penyebab:
NIM yang dimasukkan sudah digunakan oleh mahasiswa
lain. Kolom NIM memiliki aturan primary key sehingga
nilainya tidak boleh duplikat.

Perbaikan:
Gunakan NIM yang berbeda dan belum terdaftar.

### Cara Menjalankan Program

1. Jalankan Apache dan MySQL di XAMPP.
2. Buat database bernama akademik1 di phpMyAdmin.
3. Simpan project di folder htdocs/tugas_pertemuan_5.
4. Buka localhost/tugas_pertemuan_5/setup.php.
5. Buka localhost/tugas_pertemuan_5/form.php.
6. Isi formulir dan klik Simpan Data.
7. Buka halaman data.php untuk melihat hasilnya.

### Screenshot

Screenshot sebelum modifikasi:
Masukkan gambar sebelum.png ke folder screenshots.

Screenshot sesudah modifikasi:
Masukkan gambar sesudah.png ke folder screenshots.
