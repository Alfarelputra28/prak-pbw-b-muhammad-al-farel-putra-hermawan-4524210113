<?php
require_once 'koneksi.php';

mysqli_select_db($koneksi, 'akademik');

// ==========================================
// 1. INSERT DATA MAHASISWA
// ==========================================
echo "=== 1. INSERT DATA MAHASISWA ===\n";

$dataMahasiswa = [
    ['2026001', 'Andi Pratama', 'andi@example.ac.id', 'Teknik Informatika', 2025, 3.75],
    ['2026002', 'Siti Rahma', 'siti@example.ac.id', 'Sistem Informasi', 2026, 3.80],
    ['2026003', 'Budi Santoso', 'budi@example.ac.id', 'Teknik Informatika', 2025, 3.25],
    ['2026004', 'Lina Permata', 'lina@example.ac.id', 'Sistem Informasi', 2026, 3.20]
];

foreach ($dataMahasiswa as $data) {
    if ($data[5] < 0 || $data[5] > 4) {
        echo "[ERROR] IPK tidak valid untuk {$data[1]}.\n";
        continue;
    }

    $nim = mysqli_real_escape_string($koneksi, $data[0]);
    $nama = mysqli_real_escape_string($koneksi, $data[1]);
    $email = mysqli_real_escape_string($koneksi, $data[2]);
    $prodi = mysqli_real_escape_string($koneksi, $data[3]);
    $angkatan = (int) $data[4];
    $ipk = (float) $data[5];

    $sqlInsert = "INSERT IGNORE INTO mahasiswa
        (nim, nama, email, prodi, angkatan, ipk)
        VALUES ('$nim', '$nama', '$email', '$prodi',
                $angkatan, $ipk)";

    if (mysqli_query($koneksi, $sqlInsert)) {
        if (mysqli_affected_rows($koneksi) > 0) {
            echo "[SUKSES] Data $nama ditambahkan.\n";
        } else {
            echo "[INFO] Data $nama sudah ada atau diabaikan.\n";
        }
    } else {
        echo "[ERROR] " . mysqli_error($koneksi) . "\n";
    }
}

// ==========================================
// 2. SELECT DENGAN FILTER IPK DAN PRODI
// ==========================================
echo "\n=== 2. HASIL QUERY SELECT ===\n";

$filterProdi = 'Teknik Informatika';

$sqlSelect = "SELECT nim, nama, prodi, ipk
              FROM mahasiswa
              WHERE ipk >= 3.50
              AND prodi = ?
              ORDER BY ipk DESC, nama ASC
              LIMIT 10";

$stmt = mysqli_prepare($koneksi, $sqlSelect);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $filterProdi);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "NIM  : {$row['nim']}\n";
            echo "Nama : {$row['nama']}\n";
            echo "Prodi: {$row['prodi']}\n";
            echo "IPK  : {$row['ipk']}\n";
            echo "----------------------\n";
        }
    } else {
        echo "Tidak ada mahasiswa yang memenuhi kriteria.\n";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "[ERROR SELECT] " . mysqli_error($koneksi) . "\n";
}

// ==========================================
// 3. UPDATE DATA IPK
// ==========================================
echo "\n=== 3. PROSES UPDATE DATA ===\n";

$nimUpdate = '2026003';
$ipkBaru = 3.60;

if ($ipkBaru >= 0 && $ipkBaru <= 4) {
    $stmt = mysqli_prepare(
        $koneksi,
        "UPDATE mahasiswa SET ipk = ? WHERE nim = ?"
    );

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ds", $ipkBaru, $nimUpdate);

        if (mysqli_stmt_execute($stmt)) {
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "[SUKSES] IPK berhasil diperbarui.\n";
            } else {
                echo "[INFO] Data tidak berubah atau NIM tidak ditemukan.\n";
            }
        } else {
            echo "[ERROR UPDATE] " . mysqli_stmt_error($stmt) . "\n";
        }

        mysqli_stmt_close($stmt);
    }
} else {
    echo "[ERROR] IPK harus berada pada rentang 0 sampai 4.\n";
}

// ==========================================
// MODIFIKASI 2: PREDIKAT IPK
// ==========================================
echo "\n=== MODIFIKASI 2: PREDIKAT IPK ===\n";

if ($ipkBaru >= 3.80) {
    $predikat = "Dengan Pujian (Cumlaude)";
} elseif ($ipkBaru >= 3.50) {
    $predikat = "Sangat Memuaskan";
} elseif ($ipkBaru >= 3.00) {
    $predikat = "Memuaskan";
} else {
    $predikat = "Cukup";
}

echo "NIM      : $nimUpdate\n";
echo "IPK      : $ipkBaru\n";
echo "Predikat : $predikat\n";

// ==========================================
// 4. REKAP JUMLAH DAN RATA-RATA IPK
// ==========================================
echo "\n=== 4. REKAP MAHASISWA PER PRODI ===\n";

$sqlRekap = "SELECT prodi,
                    COUNT(*) AS jumlah,
                    ROUND(AVG(ipk), 2) AS rata_ipk
             FROM mahasiswa
             GROUP BY prodi
             ORDER BY jumlah DESC";

$resultRekap = mysqli_query($koneksi, $sqlRekap);

if ($resultRekap) {
    if (mysqli_num_rows($resultRekap) > 0) {
        while ($row = mysqli_fetch_assoc($resultRekap)) {
            echo "Prodi        : {$row['prodi']}\n";
            echo "Jumlah       : {$row['jumlah']} mahasiswa\n";
            echo "Rata-rata IPK: {$row['rata_ipk']}\n";
            echo "----------------------\n";
        }
    } else {
        echo "Belum ada data mahasiswa.\n";
    }
} else {
    echo "[ERROR REKAP] " . mysqli_error($koneksi) . "\n";
}

// ==========================================
// 5. VERIFIKASI DATA
// ==========================================
echo "\n=== 5. VERIFIKASI DATA ===\n";

$nimHapus = '2026003';

$stmt = mysqli_prepare(
    $koneksi,
    "SELECT nim, nama, ipk FROM mahasiswa WHERE nim = ?"
);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $nimHapus);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        echo "Data ditemukan.\n";
        echo "NIM  : {$row['nim']}\n";
        echo "Nama : {$row['nama']}\n";
        echo "IPK  : {$row['ipk']}\n";
    } else {
        echo "Data dengan NIM $nimHapus tidak ditemukan.\n";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($koneksi);

echo "\n=== PROGRAM SELESAI ===\n";
?>