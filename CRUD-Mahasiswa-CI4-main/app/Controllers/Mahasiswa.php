<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use RuntimeException;

class Mahasiswa extends BaseController
{
    public function index()
    {
        return view('mahasiswa/index', [
            'mahasiswa' => (new MahasiswaModel())->orderBy('nim', 'ASC')->findAll(),
        ]);
    }

    public function create()
    {
        return view('mahasiswa/create');
    }

    public function store()
    {
        if (! $this->validate($this->validationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new MahasiswaModel();
        if (! $model->insert($this->formData())) {
            throw new RuntimeException('Data mahasiswa gagal disimpan.');
        }

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $mahasiswa = (new MahasiswaModel())->find($id);
        if ($mahasiswa === null) {
            throw PageNotFoundException::forPageNotFound('Data mahasiswa tidak ditemukan.');
        }

        return view('mahasiswa/edit', ['mahasiswa' => $mahasiswa]);
    }

    public function update(int $id)
    {
        $model = new MahasiswaModel();
        if ($model->find($id) === null) {
            throw PageNotFoundException::forPageNotFound('Data mahasiswa tidak ditemukan.');
        }

        if (! $this->validate($this->validationRules($id))) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if (! $model->update($id, $this->formData())) {
            throw new RuntimeException('Data mahasiswa gagal diperbarui.');
        }

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function delete(int $id)
    {
        $model = new MahasiswaModel();
        if ($model->find($id) === null) {
            throw PageNotFoundException::forPageNotFound('Data mahasiswa tidak ditemukan.');
        }

        if (! $model->delete($id)) {
            throw new RuntimeException('Data mahasiswa gagal dihapus.');
        }

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus.');
    }

    private function validationRules(?int $id = null): array
    {
        $nimUnique = 'is_unique[mahasiswa.nim]';
        $emailUnique = 'is_unique[mahasiswa.email]';
        if ($id !== null) {
            $nimUnique = "is_unique[mahasiswa.nim,id,{$id}]";
            $emailUnique = "is_unique[mahasiswa.email,id,{$id}]";
        }

        return [
            'nim' => [
                'label' => 'NIM',
                'rules' => "required|max_length[20]|{$nimUnique}",
            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required|max_length[100]',
            ],
            'email' => [
                'label' => 'Email',
                'rules' => "required|valid_email|max_length[100]|{$emailUnique}",
            ],
            'program_studi' => [
                'label' => 'Program Studi',
                'rules' => 'required|max_length[100]',
            ],
            'angkatan' => [
                'label' => 'Angkatan',
                'rules' => 'required|integer|greater_than_equal_to[2000]|less_than_equal_to[2100]',
            ],
        ];
    }

    private function formData(): array
    {
        return [
            'nim' => trim((string) $this->request->getPost('nim')),
            'nama' => trim((string) $this->request->getPost('nama')),
            'email' => trim((string) $this->request->getPost('email')),
            'program_studi' => trim((string) $this->request->getPost('program_studi')),
            'angkatan' => (int) $this->request->getPost('angkatan'),
        ];
    }
}
