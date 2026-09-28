<?php

interface Identitas
{
    public function ringkasan(): string;
}

class Mahasiswa implements Identitas
{
    private string $nim;
    private string $nama;
    protected float $ipk;

    public function __construct(string $nim, string $nama, float $ipk)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->setIpk($ipk);
    }

    public function setIpk(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException('IPK harus 0 sampai 4.');
        }

        $this->ipk = $ipk;
    }

    public function getIpk(): float
    {
        return $this->ipk;
    }

    public function ringkasan(): string
    {
        return $this->nim . ' - ' . $this->nama . ' - IPK: ' . $this->ipk;
    }
}

function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) {
        return 'Sangat Memuaskan';
    }

    if ($ipk >= 3.00) {
        return 'Memuaskan';
    }

    return 'Perlu Peningkatan';
}

$mhs = new Mahasiswa(
    '4524210113',
    'Muhammad Al Farel Putra Hermawan',
    3.75
);

$semester = 5;

echo "<h1>Data Mahasiswa</h1>";
echo "<p>" . $mhs->ringkasan() . "</p>";
echo "<p>Semester: " . $semester . "</p>";
echo "<p>Status: " . statusKelulusan($mhs->getIpk()) . "</p>";

$produk = [
    ['nama' => 'Keyboard', 'harga' => 250000, 'diskon' => 10],
    ['nama' => 'Mouse', 'harga' => 150000, 'diskon' => 5]
];

echo "<h2>Daftar Produk</h2>";

foreach ($produk as $item) {
    $hargaDiskon = $item['harga'] - ($item['harga'] * $item['diskon'] / 100);

    echo "<p>" . $item['nama'] .
        " - Harga: Rp " . number_format($item['harga'], 0, ',', '.') .
        " - Diskon: " . $item['diskon'] . "%" .
        " - Harga Akhir: Rp " . number_format($hargaDiskon, 0, ',', '.') .
        "</p>";
}

?>