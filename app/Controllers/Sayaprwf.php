<?php

namespace App\Controllers;

use App\Models\RwfModel;

class Sayaprwf extends BaseController
{
    protected $rwfModel;
    public function __construct()
    {
        $this->rwfModel = new RwfModel();
    }
    public function index()
    {
        //$pemain = $this->pemainModel->findAll();

        $data = [
            'title' => 'Data Kriteria RWF',
            'data_rwf' => $this->rwfModel->getKanan()
        ];

        return view('datarwf/home', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Data RWF',
            'data_rwf' => $this->rwfModel->getKanan($slug)
        ];

        if (empty($data['data_rwf'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pemain tidak ditemukan.');
        }

        // jika pemain tidak ada di tabel

        return view('datarwf/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kriteria RWF',
            'validation' => \Config\Services::validation(),
        ];


        return view('datarwf/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'kode' => [
                'rules' => 'required|is_unique[data_rwf.kode]',
                'errors' => [
                    'required' => '{field} kode harus diisi.',
                    'is_unique' => '{field} kode sudah ada.'
                ]
            ],
            'nama' => [
                'rules' => 'required[data_rwf.nama]',
                'errors' => [
                    'required' => '{field} tanggal kegiatan harus diisi.',

                ]
            ],
            'jenis' => [
                'rules' => 'required[data_rwf.jenis]',
                'errors' => [
                    'required' => '{field} jam mulai harus diisi.',
                ]
            ],
            'nilai' => [
                'rules' => 'required[data_rwf.nilai]',
                'errors' => [
                    'required' => '{field} jam selesai harus diisi.',
                ]
            ],
        ])) {

            // $validation = \Config\Services::validation();
            // return redirect()->to('/pemain/tambah')->withInput()->with('validation', $validation);
            return redirect()->to('/sayaprwf/create')->withInput();
        }

        $slug = url_title($this->request->getVar('kode'), '-', true);
        $this->rwfModel->save([
            'kode' => $this->request->getVar('kode'),
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'nilai' => $this->request->getVar('nilai'),
        ]);


        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('/sayaprwf');
    }

    public function delete($id)
    {
        //CARI GAMBAR BERDASARKAN ID
        $data_rwf = $this->rwfModel->find($id);

        // //CEK JIKA GAMBARNYA DEFAULT
        // if ($pemain['sampul'] != 'default1.jpg') {
        //     //HAPUS GAMBAR
        //     unlink('img/' . $pemain['sampul']);
        // }



        $this->rwfModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/sayaprwf');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Kriteria RWF',
            'validation' => \Config\Services::validation(),
            'data_rwf' => $this->rwfModel->getKanan($slug)
        ];


        return view('datarwf/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'kode' => [
                'rules' => 'required[data_rwf.kode]',
                'errors' => [
                    'required' => '{field} kode harus diisi.',
                    'is_unique' => '{field} kode sudah ada.'
                ]
            ],
            'nama' => [
                'rules' => 'required[data_rwf.nama]',
                'errors' => [
                    'required' => '{field} tanggal kegiatan harus diisi.',

                ]
            ],
            'jenis' => [
                'rules' => 'required[data_rwf.jenis]',
                'errors' => [
                    'required' => '{field} jam mulai harus diisi.',
                ]
            ],
            'nilai' => [
                'rules' => 'required[data_rwf.nilai]',
                'errors' => [
                    'required' => '{field} jam selesai harus diisi.',
                ]
            ],
        ])) {

            return redirect()->to('/sayaprwf/edit' . $this->request->getVar('slug'))->withInput();
        }

        $slug = url_title($this->request->getVar('kode'), '-', true);
        $this->rwfModel->save([
            'id' => $id,
            'kode' => $this->request->getVar('kode'),
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'nilai' => $this->request->getVar('nilai'),
        ]);


        session()->setFlashdata('pesan', 'Data Berhasil Ubah');

        return redirect()->to('/sayaprwf');
    }
}
