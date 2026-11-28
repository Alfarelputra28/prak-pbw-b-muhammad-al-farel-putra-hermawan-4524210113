<?php

namespace App\Controllers;

class TestDatabase extends BaseController
{
    public function index()
    {
        try {
            $db = \Config\Database::connect();
            $db->initialize();

            return 'Koneksi database berhasil!';
        } catch (\Throwable $e) {
            return 'Koneksi database gagal: ' . $e->getMessage();
        }
    }
}