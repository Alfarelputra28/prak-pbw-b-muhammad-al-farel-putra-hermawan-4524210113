<?php
include_once __DIR__ . "/../models/MahasiswaModel.php";

class MahasiswaController {
    private $model;

    public function __construct($koneksi) {
        $this->model = new MahasiswaModel($koneksi);
    }

    public function index() {
        $dataMahasiswa = $this->model->getAllMahasiswa();

        include __DIR__ . "/../views/index.php";
    }
}
?>