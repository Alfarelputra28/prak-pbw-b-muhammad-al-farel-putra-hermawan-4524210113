<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk - Penjualan MVC</title>
    <style>
        *{box-sizing:border-box}body{font-family:Arial,sans-serif;background:#f3f5f9;margin:0;color:#222}
        .container{max-width:1000px;margin:40px auto;padding:24px;background:#fff;border-radius:12px;box-shadow:0 4px 18px #00000010}
        h1{margin-top:0;color:#243b63}.top{display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap}
        a.btn{display:inline-block;background:#2457c5;color:white;text-decoration:none;padding:10px 14px;border-radius:6px}
        .notice{padding:12px;background:#e7f7eb;color:#176b2c;border-radius:6px;margin:18px 0}
        table{width:100%;border-collapse:collapse;margin-top:20px}th,td{padding:12px;border-bottom:1px solid #e5e7eb;text-align:left}
        th{background:#f0f3f8}td.actions{white-space:nowrap}.edit{color:#2457c5}.empty{text-align:center;color:#666;padding:24px}
    </style>
</head>
<body>
<div class="container">
    <div class="top">
        <div><h1>Daftar Produk</h1><p>Program Penjualan Produk dengan konsep MVC</p></div>
        <a class="btn" href="views/produk/create.php">+ Tambah Produk</a>
    </div>
    <?php if (isset($_GET["pesan"])): ?>
        <div class="notice">
            <?php
            $pesan = [
                "tambah" => "Produk berhasil ditambahkan.",
                "ubah" => "Data produk berhasil diperbarui.",
                "tidak_ditemukan" => "Produk tidak ditemukan."
            ];
            echo htmlspecialchars($pesan[$_GET["pesan"]] ?? "Proses selesai.");
            ?>
        </div>
    <?php endif; ?>
    <table>
        <thead><tr><th>No.</th><th>Nama Produk</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr></thead>
        <tbody>
        <?php if ($produk && mysqli_num_rows($produk) > 0): ?>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($produk)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row["nama_produk"]) ?></td>
                    <td>Rp <?= number_format((float)$row["harga"], 0, ",", ".") ?></td>
                    <td><?= (int)$row["stok"] ?></td>
                    <td class="actions"><a class="edit" href="views/produk/edit.php?id=<?= (int)$row["id"] ?>">Edit</a></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5" class="empty">Belum ada data produk. Klik Tambah Produk untuk mulai mengisi.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>