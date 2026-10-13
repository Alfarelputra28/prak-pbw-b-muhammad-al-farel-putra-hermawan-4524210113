```php
<?php
require_once "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: form.php");
    exit;
}

// Mengambil dan membersihkan input
$nim = trim($_POST['nim'] ?? '');
$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$prodi = trim($_POST['prodi'] ?? '');
$angkatanInput = $_POST['angkatan'] ?? '';
$ipkInput = $_POST['ipk'] ?? '';

$errors = [];

// Validasi data
if ($nim === '' || strlen($nim) > 20) {
    $errors[] = "NIM wajib diisi, maksimal 20 karakter.";
}

if ($nama === '' || strlen($nama) > 100) {
    $errors[] = "Nama wajib diisi, maksimal 100 karakter.";
}

if (
    !filter_var($email, FILTER_VALIDATE_EMAIL)
    || strlen($email) > 100
) {
    $errors[] = "Format email tidak valid.";
}

if ($prodi === '' || strlen($prodi) > 100) {
    $errors[] = "Program studi wajib diisi.";
}

if (
    filter_var($angkatanInput, FILTER_VALIDATE_INT) === false
    || (int)$angkatanInput < 2000
    || (int)$angkatanInput > 2100
) {
    $errors[] = "Angkatan harus antara 2000 dan 2100.";
}

if (
    !is_numeric($ipkInput)
    || (float)$ipkInput < 0
    || (float)$ipkInput > 4
) {
    $errors[] = "IPK harus antara 0,00 dan 4,00.";
}

// Menampilkan error jika validasi gagal
if (!empty($errors)) {
    echo "<h2>Data belum dapat disimpan</h2><ul>";

    foreach ($errors as $error) {
        echo "<li>" .
            htmlspecialchars($error, ENT_QUOTES, 'UTF-8') .
            "</li>";
    }

    echo "</ul><a href='form.php'>Kembali ke form</a>";
    exit;
}

$angkatan = (int)$angkatanInput;
$ipk = (float)$ipkInput;

// Prepared statement untuk mencegah SQL injection
$sql = "INSERT INTO mahasiswa
        (nim, nama, email, prodi, angkatan, ipk)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($koneksi, $sql);

if (!$stmt) {
    http_response_code(500);
    exit("Query gagal disiapkan.");
}

// Mengikat parameter dengan tipe data yang sesuai
mysqli_stmt_bind_param(
    $stmt,
    "ssssid",
    $nim,
    $nama,
    $email,
    $prodi,
    $angkatan,
    $ipk
);

// Menjalankan query dan menangani hasilnya
if (mysqli_stmt_execute($stmt)) {
    echo "<h2>Data berhasil disimpan!</h2>";
    echo "<a href='form.php'>Tambah data lagi</a> | ";
    echo "<a href='data.php'>Lihat data mahasiswa</a>";
} else {
    if (mysqli_stmt_errno($stmt) === 1062) {
        echo "<h2>NIM sudah terdaftar!</h2>";
        echo "<a href='form.php'>Kembali ke form</a>";
    } else {
        http_response_code(500);
        echo "<h2>Data gagal disimpan.</h2>";
        echo "<a href='form.php'>Kembali ke form</a>";
    }
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>
```