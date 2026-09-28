<?php

function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

function statusMahasiswa(int $semester): string
{
    if ($semester <= 4) {
        return 'Mahasiswa Aktif Awal';
    }

    return 'Mahasiswa Aktif Lanjutan';
}

$mahasiswa = [
    'nim' => '4524210113',
    'nama' => 'Muhammad Al Farel Putra Hermawan',
    'prodi' => 'Teknik Informatika',
    'semester' => 5,
    'ipk' => 3.75,
    'angkatan' => 2024
];

?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Biodata Mahasiswa</title>
</head>

<body>

    <h1>Biodata Mahasiswa</h1>

    <ul>
        <?php foreach ($mahasiswa as $kunci => $nilai): ?>
            <li>
                <?= ucfirst($kunci) ?>:
                <?= htmlspecialchars((string)$nilai) ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <p>
        Predikat:
        <?= statusKelulusan($mahasiswa['ipk']) ?>
    </p>

    <p>
        Status Mahasiswa:
        <?= statusMahasiswa($mahasiswa['semester']) ?>
    </p>

</body>
</html>