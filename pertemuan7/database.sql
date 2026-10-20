CREATE DATABASE IF NOT EXISTS penjualan_mvc;
USE penjualan_mvc;

CREATE TABLE IF NOT EXISTS produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100) NOT NULL,
    harga DECIMAL(12,2) NOT NULL DEFAULT 0,
    stok INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO produk (nama_produk, harga, stok)
SELECT 'Buku Tulis', 5000, 25
WHERE NOT EXISTS (SELECT 1 FROM produk WHERE nama_produk = 'Buku Tulis');

INSERT INTO produk (nama_produk, harga, stok)
SELECT 'Pulpen', 3000, 40
WHERE NOT EXISTS (SELECT 1 FROM produk WHERE nama_produk = 'Pulpen');

INSERT INTO produk (nama_produk, harga, stok)
SELECT 'Tas', 75000, 10
WHERE NOT EXISTS (SELECT 1 FROM produk WHERE nama_produk = 'Tas');