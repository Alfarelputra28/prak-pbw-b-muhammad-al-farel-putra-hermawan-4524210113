
<?php
require_once "Koneksi.php";

$nim = trim($_GET['nim'] ?? '');

if ($nim === '' || strlen($nim) > 20) {
    mysqli_close($koneksi);
    exit("NIM tidak valid. <a href='index.php'>Kembali</a>");
}

$sql = "DELETE FROM mahasiswa WHERE nim = ?";
$stmt = mysqli_prepare($koneksi, $sql);

if (!$stmt) {
    mysqli_close($koneksi);
    exit("Query penghapusan gagal disiapkan.");
}

mysqli_stmt_bind_param($stmt, "s", $nim);

if (mysqli_stmt_execute($stmt)) {
    $jumlah = mysqli_stmt_affected_rows($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);

    if ($jumlah > 0) {
        header("Location: index.php?status=hapus_sukses");
        exit;
    }

    exit("Data tidak ditemukan. <a href='index.php'>Kembali</a>");
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
exit("Data gagal dihapus. <a href='index.php'>Kembali</a>");
?>
