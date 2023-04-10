<?php

namespace App\Controllers;

use App\Models\LwfModel;

class Sayaplwf extends BaseController
{
    protected $lwfModel;
    public function __construct()
    {
        $this->lwfModel = new LwfModel();
    }
    public function index()
    {
        //$pemain = $this->pemainModel->findAll();

        $data = [
            'title' => 'Data Kriteria LWF',
            'data_lwf' => $this->lwfModel->getKiri()
        ];

        return view('datalwf/home', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Data LWF',
            'data_lwf' => $this->lwfModel->getKiri($slug)
        ];

        if (empty($data['data_lwf'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pemain tidak ditemukan.');
        }

        // jika pemain tidak ada di tabel

        return view('datalwf/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kriteria LWF',
            'validation' => \Config\Services::validation(),
        ];


        return view('datalwf/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'kode' => [
                'rules' => 'required|is_unique[data_lwf.kode]',
                'errors' => [
                    'required' => '{field} kode harus diisi.',
                    'is_unique' => '{field} kode sudah ada.'
                ]
            ],
            'nama' => [
                'rules' => 'required[data_lwf.nama]',
                'errors' => [
                    'required' => '{field} tanggal kegiatan harus diisi.',

                ]
            ],
            'jenis' => [
                'rules' => 'required[data_lwf.jenis]',
                'errors' => [
                    'required' => '{field} jam mulai harus diisi.',
                ]
            ],
            'nilai' => [
                'rules' => 'required[data_lwf.nilai]',
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
        $this->lwfModel->save([
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
        $data_lwf = $this->lwfModel->find($id);

        // //CEK JIKA GAMBARNYA DEFAULT
        // if ($pemain['sampul'] != 'default1.jpg') {
        //     //HAPUS GAMBAR
        //     unlink('img/' . $pemain['sampul']);
        // }



        $this->lwfModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/sayaprwf');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Kriteria LWF',
            'validation' => \Config\Services::validation(),
            'data_lwf' => $this->lwfModel->getKiri($slug)
        ];


        return view('datalwf/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'kode' => [
                'rules' => 'required[data_lwf.kode]',
                'errors' => [
                    'required' => '{field} kode harus diisi.',
                    'is_unique' => '{field} kode sudah ada.'
                ]
            ],
            'nama' => [
                'rules' => 'required[data_lwf.nama]',
                'errors' => [
                    'required' => '{field} tanggal kegiatan harus diisi.',

                ]
            ],
            'jenis' => [
                'rules' => 'required[data_lwf.jenis]',
                'errors' => [
                    'required' => '{field} jam mulai harus diisi.',
                ]
            ],
            'nilai' => [
                'rules' => 'required[data_lwf.nilai]',
                'errors' => [
                    'required' => '{field} jam selesai harus diisi.',
                ]
            ],
        ])) {

            return redirect()->to('/sayaprwf/edit' . $this->request->getVar('slug'))->withInput();
        }

        $slug = url_title($this->request->getVar('kode'), '-', true);
        $this->lwfModel->save([
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