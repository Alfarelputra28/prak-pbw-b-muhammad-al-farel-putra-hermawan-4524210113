<?php

require_once 'koneksi.php';

$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS akademik";

if (mysqli_query($koneksi, $sqlCreateDB)) {
    echo "Database berhasil dibuat atau sudah ada.\n";
} else {
    echo "Error membuat database: " . mysqli_error($koneksi) . "\n";
}

mysqli_set_charset($koneksi, "utf8mb4");

mysqli_select_db($koneksi, 'akademik');

$sqlCreateTables = [
    "CREATE TABLE IF NOT EXISTS mahasiswa (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nim VARCHAR(15) NOT NULL UNIQUE,
        nama VARCHAR(100) NOT NULL,
        email VARCHAR(120) NOT NULL UNIQUE,
        prodi VARCHAR(80) NOT NULL,
        angkatan YEAR NOT NULL,
        ipk DECIMAL(3,2) DEFAULT 0.00
    ) ENGINE=InnoDB",

    "CREATE TABLE IF NOT EXISTS dosen (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nidn VARCHAR(20) NOT NULL UNIQUE,
        nama VARCHAR(100) NOT NULL,
        email VARCHAR(120) NOT NULL UNIQUE
    ) ENGINE=InnoDB",

    "CREATE TABLE IF NOT EXISTS mata_kuliah (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        kode_mk VARCHAR(12) NOT NULL UNIQUE,
        nama_mk VARCHAR(100) NOT NULL,
        sks TINYINT UNSIGNED NOT NULL,
        dosen_id BIGINT UNSIGNED,
        CONSTRAINT fk_mk_dosen
        FOREIGN KEY (dosen_id) REFERENCES dosen(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
    ) ENGINE=InnoDB",

    "CREATE TABLE IF NOT EXISTS kartu_mahasiswa (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nim VARCHAR(15) NOT NULL UNIQUE,
        tanggal_terbit DATE NOT NULL,
        status VARCHAR(20) DEFAULT 'Aktif',
        CONSTRAINT fk_kartu_mahasiswa
        FOREIGN KEY (nim) REFERENCES mahasiswa(nim)
        ON UPDATE CASCADE
        ON DELETE CASCADE
    ) ENGINE=InnoDB"
];

foreach ($sqlCreateTables as $query) {
    if (mysqli_query($koneksi, $query)) {
        echo "Tabel berhasil dibuat atau sudah ada.\n";
    } else {
        echo "Gagal membuat tabel: " . mysqli_error($koneksi) . "\n";
    }
}

echo "\n=== MODIFIKASI 1: KOLOM TELEPON ===\n";

$cekTelepon = mysqli_query(
    $koneksi,
    "SHOW COLUMNS FROM mahasiswa LIKE 'telepon'"
);

if (mysqli_num_rows($cekTelepon) == 0) {
    $tambahTelepon = "ALTER TABLE mahasiswa ADD COLUMN telepon VARCHAR(15)";

    if (mysqli_query($koneksi, $tambahTelepon)) {
        echo "Kolom telepon berhasil ditambahkan ke tabel mahasiswa.\n";
    } else {
        echo "Gagal menambahkan kolom telepon: " . mysqli_error($koneksi) . "\n";
    }
} else {
    echo "Kolom telepon sudah tersedia pada tabel mahasiswa.\n";
}

echo "\n=== MODIFIKASI 2: KARTU MAHASISWA ===\n";

$cekKartu = mysqli_query(
    $koneksi,
    "SHOW TABLES LIKE 'kartu_mahasiswa'"
);

if (mysqli_num_rows($cekKartu) > 0) {
    echo "Tabel kartu_mahasiswa berhasil tersedia.\n";
} else {
    echo "Tabel kartu_mahasiswa belum tersedia.\n";
}

echo "\n=== PROGRAM SELESAI ===\n";

mysqli_close($koneksi);

?>