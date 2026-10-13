
<?php
require_once "Koneksi.php";

function gagal($pesan) {
    echo "<h2>Perubahan gagal</h2>";
    echo "<p>" . htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8') . "</p>";
    echo '<a href="index.php">Kembali ke daftar</a>';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

$nim = trim($_POST['nim'] ?? '');
$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$prodi = trim($_POST['prodi'] ?? '');
$angkatanInput = $_POST['angkatan'] ?? '';
$ipkInput = $_POST['ipk'] ?? '';

if ($nim === '' || strlen($nim) > 20) {
    gagal("NIM tidak valid.");
}
if ($nama === '' || strlen($nama) > 100) {
    gagal("Nama wajib diisi, maksimal 100 karakter.");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 100) {
    gagal("Format email tidak valid.");
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

$sql = "UPDATE mahasiswa
        SET nama = ?, email = ?, prodi = ?, angkatan = ?, ipk = ?
        WHERE nim = ?";

$stmt = mysqli_prepare($koneksi, $sql);

if (!$stmt) {
    mysqli_close($koneksi);
    gagal("Query tidak dapat disiapkan.");
}

mysqli_stmt_bind_param(
    $stmt,
    "sssids",
    $nama,
    $email,
    $prodi,
    $angkatan,
    $ipk,
    $nim
);

if (mysqli_stmt_execute($stmt) && mysqli_stmt_affected_rows($stmt) >= 0) {
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
    header("Location: index.php?status=update_sukses");
    exit;
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
gagal("Data tidak berhasil diperbarui.");
?>
