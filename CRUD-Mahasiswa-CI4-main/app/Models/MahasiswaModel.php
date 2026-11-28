<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['nim', 'nama', 'email', 'program_studi', 'angkatan'];
}
