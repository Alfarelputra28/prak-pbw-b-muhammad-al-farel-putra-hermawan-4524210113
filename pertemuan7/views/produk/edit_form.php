<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Produk</title>
<style>
body{font-family:Arial,sans-serif;background:#f3f5f9;margin:0;color:#222}.box{max-width:600px;margin:40px auto;background:#fff;padding:26px;border-radius:12px;box-shadow:0 4px 18px #00000010}
h1{color:#243b63;margin-top:0}label{display:block;margin:16px 0 6px}input{width:100%;padding:11px;border:1px solid #ccd2dd;border-radius:6px}
button,.back{display:inline-block;margin-top:20px;padding:11px 15px;border:0;border-radius:6px;background:#2457c5;color:#fff;text-decoration:none;cursor:pointer}.error{color:#b42318}
</style></head><body><div class="box"><h1>Edit Produk</h1>
<?php if (!empty($error)): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form method="post" action="">
<label>Nama Produk</label><input type="text" name="nama_produk" required value="<?= htmlspecialchars($data["nama_produk"]) ?>">
<label>Harga (Rp)</label><input type="number" name="harga" min="0" step="0.01" required value="<?= htmlspecialchars($data["harga"]) ?>">
<label>Stok</label><input type="number" name="stok" min="0" required value="<?= htmlspecialchars($data["stok"]) ?>">
<button type="submit">Simpan Perubahan</button> <a class="back" href="../../index.php">Kembali</a>
</form></div></body></html>