
<?php
require_once "Koneksi.php";

function gagal($pesan) {
    echo "<h2>Data gagal disimpan</h2>";
    echo "<p>" . htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8') . "</p>";
    echo '<a href="create.php">Kembali ke form</a>';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: create.php");
    exit;
}

$nim = trim($_POST['nim'] ?? '');
$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$prodi = trim($_POST['prodi'] ?? '');
$angkatanInput = $_POST['angkatan'] ?? '';
$ipkInput = $_POST['ipk'] ?? '';

if ($nim === '' || strlen($nim) > 20) {
    gagal("NIM wajib diisi dan maksimal 20 karakter.");
}

if ($nama === '' || strlen($nama) > 100) {
    gagal("Nama wajib diisi dan maksimal 100 karakter.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 100) {
    gagal("Email tidak valid.");
}

if ($prodi === '' || strlen($prodi) > 100) {
    gagal("Program studi wajib diisi.");
}

if (filter_var($angkatanInput, FILTER_VALIDATE_INT) === false
    || (int)$angkatanInput < 2000
    || (int)$angkatanInput > 2100) {
    gagal("Angkatan harus antara 2000 sampai 2100.");
}

if (!is_numeric($ipkInput)
    || (float)$ipkInput < 0
    || (float)$ipkInput > 4) {
    gagal("IPK harus berada antara 0 sampai 4.");
}

$angkatan = (int)$angkatanInput;
$ipk = (float)$ipkInput;

$sql = "INSERT INTO mahasiswa (nim, nama, email, prodi, angkatan, ipk)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($koneksi, $sql);

if (!$stmt) {
    gagal("Query tidak dapat disiapkan.");
}

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

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
    header("Location: index.php?status=tambah_sukses");
    exit;
}

if (mysqli_stmt_errno($stmt) === 1062) {
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
    gagal("NIM sudah terdaftar. Gunakan NIM lain.");
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
gagal("Terjadi kesalahan saat menyimpan data.");
?>
