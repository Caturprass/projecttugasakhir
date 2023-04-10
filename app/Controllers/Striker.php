<?php

namespace App\Controllers;

use App\Models\CfModel;

class Striker extends BaseController
{
    protected $cfModel;
    public function __construct()
    {
        $this->cfModel = new CfModel();
    }
    public function index()
    {
        //$pemain = $this->pemainModel->findAll();

        $data = [
            'title' => 'Data Kriteria CF',
            'data_cf' => $this->cfModel->getStriker()
        ];

        return view('datacf/home', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Data CF',
            'data_cf' => $this->cfModel->getStriker($slug)
        ];

        if (empty($data['data_cf'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pemain tidak ditemukan.');
        }

        // jika pemain tidak ada di tabel

        return view('datacf/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kriteria CF',
            'validation' => \Config\Services::validation(),
        ];


        return view('datacf/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'kode' => [
                'rules' => 'required|is_unique[data_cf.kode]',
                'errors' => [
                    'required' => '{field} kode harus diisi.',
                    'is_unique' => '{field} kode sudah ada.'
                ]
            ],
            'nama' => [
                'rules' => 'required[data_cf.nama]',
                'errors' => [
                    'required' => '{field} tanggal kegiatan harus diisi.',

                ]
            ],
            'jenis' => [
                'rules' => 'required[data_cf.jenis]',
                'errors' => [
                    'required' => '{field} jam mulai harus diisi.',
                ]
            ],
            'nilai' => [
                'rules' => 'required[data_cf.nilai]',
                'errors' => [
                    'required' => '{field} jam selesai harus diisi.',
                ]
            ],
        ])) {

            // $validation = \Config\Services::validation();
            // return redirect()->to('/pemain/tambah')->withInput()->with('validation', $validation);
            return redirect()->to('/striker/create')->withInput();
        }

        $slug = url_title($this->request->getVar('kode'), '-', true);
        $this->cfModel->save([
            'kode' => $this->request->getVar('kode'),
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'nilai' => $this->request->getVar('nilai'),
        ]);


        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('/striker');
    }

    public function delete($id)
    {
        //CARI GAMBAR BERDASARKAN ID
        $data_cf = $this->cfModel->find($id);

        $this->cfModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/striker');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Kriteria CF',
            'validation' => \Config\Services::validation(),
            'data_cf' => $this->cfModel->getStriker($slug)
        ];


        return view('datacf/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'kode' => [
                'rules' => 'required[data_cf.kode]',
                'errors' => [
                    'required' => '{field} kode harus diisi.',
                    'is_unique' => '{field} kode sudah ada.'
                ]
            ],
            'nama' => [
                'rules' => 'required[data_cf.nama]',
                'errors' => [
                    'required' => '{field} tanggal kegiatan harus diisi.',

                ]
            ],
            'jenis' => [
                'rules' => 'required[data_cf.jenis]',
                'errors' => [
                    'required' => '{field} jam mulai harus diisi.',
                ]
            ],
            'nilai' => [
                'rules' => 'required[data_cf.nilai]',
                'errors' => [
                    'required' => '{field} jam selesai harus diisi.',
                ]
            ],
        ])) {

            return redirect()->to('/striker/edit' . $this->request->getVar('slug'))->withInput();
        }

        $slug = url_title($this->request->getVar('kode'), '-', true);
        $this->cfModel->save([
            'id' => $id,
            'kode' => $this->request->getVar('kode'),
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'nilai' => $this->request->getVar('nilai'),
        ]);


        session()->setFlashdata('pesan', 'Data Berhasil Ubah');

        return redirect()->to('/striker');
    }
}
