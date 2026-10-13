
<?php
require_once "koneksi.php";

$sql = "SELECT nim, nama, email, prodi, angkatan, ipk
        FROM mahasiswa
        ORDER BY nama ASC";

$result = mysqli_query($koneksi, $sql);

if (!$result) {
    exit("Data gagal dibaca. Jalankan setup.php terlebih dahulu.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            padding: 25px 15px;
        }

        main {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 24px;
            border-radius: 12px;
            overflow-x: auto;
        }

        h1 {
            color: #174ea6;
        }

        .btn {
            display: inline-block;
            padding: 10px 14px;
            margin-bottom: 16px;
            background: #1f5fd1;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            min-width: 700px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #eaf1ff;
        }

        tr:nth-child(even) {
            background: #f8faff;
        }
    </style>
</head>

<body>
<main>
    <h1>Data Mahasiswa</h1>

    <a class="btn" href="form.php">+ Tambah Mahasiswa</a>

    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Prodi</th>
                <th>Angkatan</th>
                <th>IPK</th>
            </tr>
        </thead>

        <tbody>
        <?php if (mysqli_num_rows($result) === 0): ?>
            <tr>
                <td colspan="6">Belum ada data mahasiswa.</td>
            </tr>
        <?php else: ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nim'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row['nama'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row['prodi'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= (int)$row['angkatan'] ?></td>
                    <td><?= number_format((float)$row['ipk'], 2, ',', '.') ?></td>
                </tr>
            <?php endwhile; ?>
        <?php endif; ?>
        </tbody>
    </table>
</main>
</body>
</html>

<?php
mysqli_free_result($result);
mysqli_close($koneksi);
?>
