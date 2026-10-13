
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 30px 15px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px #00000015;
        }

        h1 {
            color: #174ea6;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #bbb;
            border-radius: 6px;
        }

        .field {
            margin-bottom: 16px;
        }

        button, .link {
            display: inline-block;
            padding: 11px 16px;
            background: #1f5fd1;
            color: white;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
        }

        .link {
            background: #53657f;
        }

        .note {
            color: #666;
            font-size: 13px;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Form Data Mahasiswa</h1>
    <p class="note">Silakan isi data mahasiswa dengan benar.</p>

    <form action="simpan.php" method="post">
        <div class="field">
            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim"
                   maxlength="20" required>
        </div>

        <div class="field">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama"
                   maxlength="100" required>
        </div>

        <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email"
                   maxlength="100" required>
        </div>

        <div class="field">
            <label for="prodi">Program Studi</label>
            <input type="text" id="prodi" name="prodi"
                   maxlength="100" required>
        </div>

        <div class="field">
            <label for="angkatan">Angkatan</label>
            <input type="number" id="angkatan"
                   name="angkatan" min="2000"
                   max="2100" required>
        </div>

        <div class="field">
            <label for="ipk">IPK</label>
            <input type="number" id="ipk" name="ipk"
                   min="0" max="4" step="0.01" required>
            <p class="note">IPK harus antara 0,00 sampai 4,00.</p>
        </div>

        <button type="submit">Simpan Data</button>
        <a class="link" href="data.php">Lihat Data</a>
    </form>
</div>
</body>
</html>
