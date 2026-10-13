
<?php
require_once "koneksi.php";

$sql = "CREATE TABLE IF NOT EXISTS mahasiswa (
    nim VARCHAR(20) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    prodi VARCHAR(100) NOT NULL,
    angkatan INT NOT NULL,
    ipk DECIMAL(3,2) NOT NULL
)";

if (mysqli_query($koneksi, $sql)) {
    echo "Tabel mahasiswa berhasil dibuat atau sudah tersedia.";
    echo "<br><a href='form.php'>Buka Form Mahasiswa</a>";
} else {
    echo "Tabel gagal dibuat: " . mysqli_error($koneksi);
}
?>
