
<?php
include "Koneksi.php";

// Modifikasi 1: fitur pencarian berdasarkan NIM, nama, atau prodi
$cari = trim($_GET['q'] ?? '');

if ($cari !== '') {
    $sql = "SELECT * FROM mahasiswa
            WHERE nim LIKE ? OR nama LIKE ? OR prodi LIKE ?
            ORDER BY nama ASC";

    $stmt = mysqli_prepare($koneksi, $sql);

    if (!$stmt) {
        die("Terjadi kesalahan saat menyiapkan query.");
    }

    $keyword = "%" . $cari . "%";
    mysqli_stmt_bind_param(
        $stmt,
        "sss",
        $keyword,
        $keyword,
        $keyword
    );

    mysqli_stmt_execute($stmt);
    $query = mysqli_stmt_get_result($stmt);
} else {
    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM mahasiswa ORDER BY nama ASC"
    );
}

if (!$query) {
    die("Gagal mengambil data mahasiswa.");
}

// Modifikasi 2: output teks akan diamankan dengan htmlspecialchars()
function aman($teks) {
    return htmlspecialchars(
        (string)($teks ?? ''),
        ENT_QUOTES,
        'UTF-8'
    );
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Data Mahasiswa</title>
</head>

<body class="bg-gray-50 p-6 font-sans text-gray-800">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">

        <h1 class="text-2xl font-bold mb-4">
            Data Mahasiswa
        </h1>

        <a href="create.php"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded mb-4">
            + Tambah Mahasiswa
        </a>

        <!-- Form pencarian -->
        <form method="GET" action="index.php"
              class="flex flex-col sm:flex-row gap-2 mb-5">

            <input
                type="text"
                name="q"
                value="<?= aman($cari); ?>"
                placeholder="Cari NIM, nama, atau prodi..."
                class="border border-gray-300 rounded px-3 py-2 flex-1"
            >

            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                Cari
            </button>

            <a href="index.php"
               class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded text-center">
                Reset
            </a>
        </form>

        <div class="mb-3 text-sm text-gray-600">
            <?php if ($cari !== '') { ?>
                Hasil pencarian untuk:
                <strong><?= aman($cari); ?></strong>
            <?php } else { ?>
                Daftar seluruh mahasiswa
            <?php } ?>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-200 p-3">NIM</th>
                        <th class="border border-gray-200 p-3">Nama</th>
                        <th class="border border-gray-200 p-3">Email</th>
                        <th class="border border-gray-200 p-3">Prodi</th>
                        <th class="border border-gray-200 p-3">Angkatan</th>
                        <th class="border border-gray-200 p-3">IPK</th>
                        <th class="border border-gray-200 p-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php if (mysqli_num_rows($query) > 0) { ?>
                    <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr class="hover:bg-blue-50 transition">
                            <td class="border border-gray-200 p-3">
                                <?= aman($data['nim']); ?>
                            </td>
                            <td class="border border-gray-200 p-3">
                                <?= aman($data['nama']); ?>
                            </td>
                            <td class="border border-gray-200 p-3">
                                <?= aman($data['email']); ?>
                            </td>
                            <td class="border border-gray-200 p-3">
                                <?= aman($data['prodi']); ?>
                            </td>
                            <td class="border border-gray-200 p-3">
                                <?= aman($data['angkatan']); ?>
                            </td>
                            <td class="border border-gray-200 p-3">
                                <?= aman($data['ipk']); ?>
                            </td>
                            <td class="border border-gray-200 p-3 text-center whitespace-nowrap">
                                <a
                                    href="edit.php?nim=<?= urlencode($data['nim']); ?>"
                                    class="text-blue-600 hover:underline font-medium">
                                    Edit
                                </a>

                                <span class="mx-1 text-gray-300">|</span>

                                <a
                                    href="delete.php?nim=<?= urlencode($data['nim']); ?>"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                    class="text-red-600 hover:underline font-medium">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="7"
                            class="border border-gray-200 p-6 text-center text-gray-500">
                            Data mahasiswa tidak ditemukan.
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
if (isset($stmt)) {
    mysqli_stmt_close($stmt);
}
mysqli_close($koneksi);
?>
