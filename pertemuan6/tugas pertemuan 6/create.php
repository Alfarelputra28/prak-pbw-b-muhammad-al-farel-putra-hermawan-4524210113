
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Tambah Mahasiswa</title>
</head>
<body class="bg-gray-100 min-h-screen p-6">
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-md p-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Mahasiswa</h1>

    <form action="store.php" method="POST" class="space-y-4">
        <div>
            <label class="block mb-1 font-medium">NIM</label>
            <input type="text" name="nim" maxlength="20" required
                   class="w-full border rounded-lg p-2">
        </div>

        <div>
            <label class="block mb-1 font-medium">Nama</label>
            <input type="text" name="nama" maxlength="100" required
                   class="w-full border rounded-lg p-2">
        </div>

        <div>
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" maxlength="100" required
                   class="w-full border rounded-lg p-2">
        </div>

        <div>
            <label class="block mb-1 font-medium">Program Studi</label>
            <input type="text" name="prodi" maxlength="100" required
                   class="w-full border rounded-lg p-2">
        </div>

        <div>
            <label class="block mb-1 font-medium">Angkatan</label>
            <input type="number" name="angkatan" min="2000" max="2100" required
                   class="w-full border rounded-lg p-2">
        </div>

        <div>
            <label class="block mb-1 font-medium">IPK</label>
            <input type="number" name="ipk" min="0" max="4" step="0.01" required
                   class="w-full border rounded-lg p-2">
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Simpan
            </button>
            <a href="index.php"
               class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg">
                Kembali
            </a>
        </div>
    </form>
</div>
</body>
</html>
