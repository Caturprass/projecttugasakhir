<?php

namespace App\Controllers;

use App\Models\RbModel;

class Rightback extends BaseController
{
    protected $rbModel;
    public function __construct()
    {
        $this->rbModel = new RbModel();
    }
    public function index()
    {
        //$pemain = $this->pemainModel->findAll();

        $data = [
            'title' => 'Data Kriteria RB',
            'data_rb' => $this->rbModel->getRight()
        ];

        return view('datarb/home', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Data RB',
            'data_rb' => $this->rbModel->getRight($slug)
        ];

        if (empty($data['data_rb'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pemain tidak ditemukan.');
        }

        // jika pemain tidak ada di tabel

        return view('datarb/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kriteria RB',
            'validation' => \Config\Services::validation(),
        ];


        return view('datarb/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'kode' => [
                'rules' => 'required|is_unique[data_rb.kode]',
                'errors' => [
                    'required' => '{field} kode harus diisi.',
                    'is_unique' => '{field} kode sudah ada.'
                ]
            ],
            'nama' => [
                'rules' => 'required[data_rb.nama]',
                'errors' => [
                    'required' => '{field} tanggal kegiatan harus diisi.',

                ]
            ],
            'jenis' => [
                'rules' => 'required[data_rb.jenis]',
                'errors' => [
                    'required' => '{field} jam mulai harus diisi.',
                ]
            ],
            'nilai' => [
                'rules' => 'required[data_rb.nilai]',
                'errors' => [
                    'required' => '{field} jam selesai harus diisi.',
                ]
            ],
        ])) {

            // $validation = \Config\Services::validation();
            // return redirect()->to('/pemain/tambah')->withInput()->with('validation', $validation);
            return redirect()->to('/rightback/create')->withInput();
        }

        $slug = url_title($this->request->getVar('kode'), '-', true);
        $this->rbModel->save([
            'kode' => $this->request->getVar('kode'),
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'nilai' => $this->request->getVar('nilai'),
        ]);


        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('/rightback');
    }

    public function delete($id)
    {
        //CARI GAMBAR BERDASARKAN ID
        $data_rb = $this->rbModel->find($id);

        // //CEK JIKA GAMBARNYA DEFAULT
        // if ($pemain['sampul'] != 'default1.jpg') {
        //     //HAPUS GAMBAR
        //     unlink('img/' . $pemain['sampul']);
        // }



        $this->rbModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/rightback');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Kriteria RB',
            'validation' => \Config\Services::validation(),
            'data_rb' => $this->rbModel->getRight($slug)
        ];


        return view('datarb/edit', $data);
    }

    public function update($id)
    {
        // //CEK JUDUL
        // $laporanlama = $this->rbModel->getLaporan($this->request->getVar('slug'));
        // if ($laporanlama['username'] == $this->request->getVar('username')) {
        //     $rule_username = 'required';
        // } else {
        //     $rule_username = 'required|is_unique[datakiper.username]';
        // }

        if (!$this->validate([
            'kode' => [
                'rules' => 'required[data_rb.kode]',
                'errors' => [
                    'required' => '{field} kode harus diisi.',
                    'is_unique' => '{field} kode sudah ada.'
                ]
            ],
            'nama' => [
                'rules' => 'required[data_rb.nama]',
                'errors' => [
                    'required' => '{field} tanggal kegiatan harus diisi.',

                ]
            ],
            'jenis' => [
                'rules' => 'required[data_rb.jenis]',
                'errors' => [
                    'required' => '{field} jam mulai harus diisi.',
                ]
            ],
            'nilai' => [
                'rules' => 'required[data_rb.nilai]',
                'errors' => [
                    'required' => '{field} jam selesai harus diisi.',
                ]
            ],
        ])) {

            return redirect()->to('/rightback/edit' . $this->request->getVar('slug'))->withInput();
        }

        $slug = url_title($this->request->getVar('kode'), '-', true);
        $this->rbModel->save([
            'id' => $id,
            'kode' => $this->request->getVar('kode'),
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'nilai' => $this->request->getVar('nilai'),
        ]);


        session()->setFlashdata('pesan', 'Data Berhasil Ubah');

        return redirect()->to('/rightback');
    }
}
