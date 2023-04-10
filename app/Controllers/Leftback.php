<?php

namespace App\Controllers;

use App\Models\LbModel;

class Leftback extends BaseController
{
    protected $lbModel;
    public function __construct()
    {
        $this->lbModel = new LbModel();
    }
    public function index()
    {
        //$pemain = $this->pemainModel->findAll();

        $data = [
            'title' => 'Data Kriteria LB',
            'data_lb' => $this->lbModel->getLeft()
        ];

        return view('datalb/home', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Data RB',
            'data_lb' => $this->lbModel->getLeft($slug)
        ];

        if (empty($data['data_lb'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pemain tidak ditemukan.');
        }

        // jika pemain tidak ada di tabel

        return view('datalb/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kriteria LB',
            'validation' => \Config\Services::validation(),
        ];


        return view('datalb/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'kode' => [
                'rules' => 'required|is_unique[data_lb.kode]',
                'errors' => [
                    'required' => '{field} kode harus diisi.',
                    'is_unique' => '{field} kode sudah ada.'
                ]
            ],
            'nama' => [
                'rules' => 'required[data_lb.nama]',
                'errors' => [
                    'required' => '{field} tanggal kegiatan harus diisi.',

                ]
            ],
            'jenis' => [
                'rules' => 'required[data_lb.jenis]',
                'errors' => [
                    'required' => '{field} jam mulai harus diisi.',
                ]
            ],
            'nilai' => [
                'rules' => 'required[data_lb.nilai]',
                'errors' => [
                    'required' => '{field} jam selesai harus diisi.',
                ]
            ],
        ])) {

            // $validation = \Config\Services::validation();
            // return redirect()->to('/pemain/tambah')->withInput()->with('validation', $validation);
            return redirect()->to('/leftback/create')->withInput();
        }

        $slug = url_title($this->request->getVar('kode'), '-', true);
        $this->lbModel->save([
            'kode' => $this->request->getVar('kode'),
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'nilai' => $this->request->getVar('nilai'),
        ]);


        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('/leftback');
    }

    public function delete($id)
    {
        //CARI GAMBAR BERDASARKAN ID
        $data_lb = $this->lbModel->find($id);

        // //CEK JIKA GAMBARNYA DEFAULT
        // if ($pemain['sampul'] != 'default1.jpg') {
        //     //HAPUS GAMBAR
        //     unlink('img/' . $pemain['sampul']);
        // }



        $this->lbModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/leftback');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Kriteria LB',
            'validation' => \Config\Services::validation(),
            'data_lb' => $this->lbModel->getLeft($slug)
        ];


        return view('datalb/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'kode' => [
                'rules' => 'required[data_lb.kode]',
                'errors' => [
                    'required' => '{field} kode harus diisi.',
                    'is_unique' => '{field} kode sudah ada.'
                ]
            ],
            'nama' => [
                'rules' => 'required[data_lb.nama]',
                'errors' => [
                    'required' => '{field} tanggal kegiatan harus diisi.',

                ]
            ],
            'jenis' => [
                'rules' => 'required[data_lb.jenis]',
                'errors' => [
                    'required' => '{field} jam mulai harus diisi.',
                ]
            ],
            'nilai' => [
                'rules' => 'required[data_lb.nilai]',
                'errors' => [
                    'required' => '{field} jam selesai harus diisi.',
                ]
            ],
        ])) {

            return redirect()->to('/leftback/edit' . $this->request->getVar('slug'))->withInput();
        }

        $slug = url_title($this->request->getVar('kode'), '-', true);
        $this->lbModel->save([
            'id' => $id,
            'kode' => $this->request->getVar('kode'),
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'nilai' => $this->request->getVar('nilai'),
        ]);


        session()->setFlashdata('pesan', 'Data Berhasil Ubah');

        return redirect()->to('/leftback');
    }
}
