<?php
require_once __DIR__ . "/../models/ProdukModel.php";

class ProdukController
{
    private $model;

    public function __construct()
    {
        $this->model = new ProdukModel();
    }

    public function index()
    {
        $produk = $this->model->semua();
        require __DIR__ . "/../views/produk/index.php";
    }

    public function create()
    {
        $error = "";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nama = trim($_POST["nama_produk"] ?? "");
            $harga = (float) ($_POST["harga"] ?? 0);
            $stok = (int) ($_POST["stok"] ?? 0);

            if ($nama === "" || $harga < 0 || $stok < 0) {
                $error = "Isi semua data dengan benar.";
            } elseif ($this->model->tambah($nama, $harga, $stok)) {
                header("Location: ../index.php?pesan=tambah");
                exit;
            } else {
                $error = "Data produk gagal disimpan.";
            }
        }
        require __DIR__ . "/../views/produk/create_form.php";
    }

    public function edit()
    {
        $id = (int) ($_GET["id"] ?? 0);
        $data = $this->model->cari($id);

        if (!$data) {
            header("Location: ../index.php?pesan=tidak_ditemukan");
            exit;
        }

        $error = "";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nama = trim($_POST["nama_produk"] ?? "");
            $harga = (float) ($_POST["harga"] ?? 0);
            $stok = (int) ($_POST["stok"] ?? 0);

            if ($nama === "" || $harga < 0 || $stok < 0) {
                $error = "Isi semua data dengan benar.";
                $data["nama_produk"] = $nama;
                $data["harga"] = $harga;
                $data["stok"] = $stok;
            } elseif ($this->model->ubah($id, $nama, $harga, $stok)) {
                header("Location: ../index.php?pesan=ubah");
                exit;
            } else {
                $error = "Perubahan produk gagal disimpan.";
            }
        }
        require __DIR__ . "/../views/produk/edit_form.php";
    }
}
?>