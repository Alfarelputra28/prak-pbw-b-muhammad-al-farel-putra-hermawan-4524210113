<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('css/mahasiswa.css') ?>" rel="stylesheet">
</head>
<body class="app-shell">
<nav class="navbar navbar-dark app-navbar">
    <div class="container"><a class="navbar-brand" href="<?= site_url('/') ?>">Modul Mahasiswa</a></div>
</nav>
<main class="container py-5">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="h2 mb-1">Daftar Mahasiswa</h1>
            <p class="text-secondary mb-0">Kelola data mahasiswa melalui aplikasi CRUD.</p>
        </div>
        <a class="btn btn-primary" href="<?= site_url('mahasiswa/create') ?>">Tambah Mahasiswa</a>
    </div>

    <?php if ($success = session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= esc($success) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    <?php endif ?>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-primary">
                <tr>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Program Studi</th>
                    <th scope="col">Angkatan</th>
                    <th scope="col" class="text-end">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($mahasiswa === []): ?>
                    <tr><td colspan="6" class="text-center text-secondary py-4">Belum ada data mahasiswa.</td></tr>
                <?php else: ?>
                    <?php foreach ($mahasiswa as $item): ?>
                        <tr>
                            <td><?= esc($item['nim']) ?></td>
                            <td><?= esc($item['nama']) ?></td>
                            <td><?= esc($item['email']) ?></td>
                            <td><?= esc($item['program_studi']) ?></td>
                            <td><?= esc($item['angkatan']) ?></td>
                            <td class="text-end text-nowrap">
                                <a class="btn btn-sm btn-outline-primary" href="<?= site_url('mahasiswa/edit/' . $item['id']) ?>">Edit</a>
                                <form class="d-inline" action="<?= site_url('mahasiswa/delete/' . $item['id']) ?>" method="post" onsubmit="return confirm('Hapus data mahasiswa ini?')">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
