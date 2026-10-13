
<?php
require_once "Koneksi.php";

function aman($nilai) {
    return htmlspecialchars((string)($nilai ?? ''), ENT_QUOTES, 'UTF-8');
}

$nim = trim($_GET['nim'] ?? '');

if ($nim === '') {
    exit("NIM tidak diberikan. <a href='index.php'>Kembali</a>");
}

$sql = "SELECT nim, nama, email, prodi, angkatan, ipk
        FROM mahasiswa WHERE nim = ?";

$stmt = mysqli_prepare($koneksi, $sql);

if (!$stmt) {
    exit("Query gagal disiapkan.");
}

mysqli_stmt_bind_param($stmt, "s", $nim);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $nimDb, $nama, $email, $prodi, $angkatan, $ipk);

if (!mysqli_stmt_fetch($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
    exit("Data mahasiswa tidak ditemukan. <a href='index.php'>Kembali</a>");
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Edit Mahasiswa</title>
</head>
<body class="bg-gray-100 min-h-screen p-6">
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-md p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Mahasiswa</h1>

    <form action="update.php" method="POST" class="space-y-4">
        <div>
            <label class="block mb-1 font-medium">NIM</label>
            <input type="text" name="nim" value="<?= aman($nimDb); ?>"
                   readonly class="w-full border rounded-lg p-2 bg-gray-100">
        </div>
        <div>
            <label class="block mb-1 font-medium">Nama</label>
            <input type="text" name="nama" maxlength="100" required
                   value="<?= aman($nama); ?>" class="w-full border rounded-lg p-2">
        </div>
        <div>
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" maxlength="100" required
                   value="<?= aman($email); ?>" class="w-full border rounded-lg p-2">
        </div>
        <div>
            <label class="block mb-1 font-medium">Program Studi</label>
            <input type="text" name="prodi" maxlength="100" required
                   value="<?= aman($prodi); ?>" class="w-full border rounded-lg p-2">
        </div>
        <div>
            <label class="block mb-1 font-medium">Angkatan</label>
            <input type="number" name="angkatan" min="2000" max="2100" required
                   value="<?= aman($angkatan); ?>" class="w-full border rounded-lg p-2">
        </div>
        <div>
            <label class="block mb-1 font-medium">IPK</label>
            <input type="number" name="ipk" min="0" max="4" step="0.01" required
                   value="<?= aman($ipk); ?>" class="w-full border rounded-lg p-2">
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
                Simpan Perubahan
            </button>
            <a href="index.php"
               class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg">
                Batal
            </a>
        </div>
    </form>
</div>
</body>
</html>
