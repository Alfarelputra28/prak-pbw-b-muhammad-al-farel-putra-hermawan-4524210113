<?php
require_once __DIR__ . "/../koneksi.php";

class ProdukModel
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function semua()
    {
        return mysqli_query($this->conn, "SELECT * FROM produk ORDER BY id DESC");
    }

    public function cari($id)
    {
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM produk WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

    public function tambah($nama, $harga, $stok)
    {
        $stmt = mysqli_prepare($this->conn, "INSERT INTO produk (nama_produk, harga, stok) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sdi", $nama, $harga, $stok);
        return mysqli_stmt_execute($stmt);
    }

    public function ubah($id, $nama, $harga, $stok)
    {
        $stmt = mysqli_prepare($this->conn, "UPDATE produk SET nama_produk = ?, harga = ?, stok = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "sdii", $nama, $harga, $stok, $id);
        return mysqli_stmt_execute($stmt);
    }
}
?>