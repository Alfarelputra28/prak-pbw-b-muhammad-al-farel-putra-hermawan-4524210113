<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('css/mahasiswa.css') ?>" rel="stylesheet">
</head>
<body class="app-shell">
<nav class="navbar navbar-dark app-navbar">
    <div class="container"><a class="navbar-brand" href="<?= site_url('/') ?>">Modul Mahasiswa</a></div>
</nav>
<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h2 mb-0">Tambah Mahasiswa</h1>
                <a class="btn btn-outline-secondary" href="<?= site_url('/') ?>">Kembali</a>
            </div>
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>
            <form class="card card-body shadow-sm" action="<?= site_url('mahasiswa') ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label class="form-label" for="nim">NIM</label>
                    <input class="form-control" id="nim" name="nim" maxlength="20" value="<?= old('nim') ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama</label>
                    <input class="form-control" id="nama" name="nama" maxlength="100" value="<?= old('nama') ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" id="email" name="email" type="email" maxlength="100" value="<?= old('email') ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="program_studi">Program Studi</label>
                    <input class="form-control" id="program_studi" name="program_studi" maxlength="100" value="<?= old('program_studi') ?>" required>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="angkatan">Angkatan</label>
                    <input class="form-control" id="angkatan" name="angkatan" type="number" min="2000" max="2100" value="<?= old('angkatan') ?>" required>
                </div>
                <button class="btn btn-primary" type="submit">Simpan Mahasiswa</button>
            </form>
        </div>
    </div>
</main>
</body>
</html>
