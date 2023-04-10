<?php

namespace App\Controllers;

use App\Models\CbModel;


class Centerback extends BaseController
{
    protected $cbModel;
    public function __construct()
    {
        $this->cbModel = new CbModel();
    }
    public function index()
    {
        //$pemain = $this->pemainModel->findAll();

        $data = [
            'title' => 'Data Kriteria CB',
            'data_cb' => $this->cbModel->getCenter()
        ];

        return view('datacb/home', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Data CB',
            'data_cb' => $this->cbModel->getCenter($slug)
        ];

        if (empty($data['data_cb'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pemain tidak ditemukan.');
        }

        // jika pemain tidak ada di tabel

        return view('datacb/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kriteria Centerback',
            'validation' => \Config\Services::validation(),
        ];


        return view('datacb/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'kode' => [
                'rules' => 'required|is_unique[data_cb.kode]',
                'errors' => [
                    'required' => '{field} kode harus diisi.',
                    'is_unique' => '{field} kode sudah ada.'
                ]
            ],
            'nama' => [
                'rules' => 'required[data_cb.nama]',
                'errors' => [
                    'required' => '{field} tanggal kegiatan harus diisi.',

                ]
            ],
            'jenis' => [
                'rules' => 'required[data_cb.jenis]',
                'errors' => [
                    'required' => '{field} jam mulai harus diisi.',
                ]
            ],
            'nilai' => [
                'rules' => 'required[data_cb.nilai]',
                'errors' => [
                    'required' => '{field} jam selesai harus diisi.',
                ]
            ],
        ])) {

            // $validation = \Config\Services::validation();
            // return redirect()->to('/pemain/tambah')->withInput()->with('validation', $validation);
            return redirect()->to('/centerback/create')->withInput();
        }

        // AMBIL GAMBAR
        // $fileSampul = $this->request->getFile('sampul');
        // //APAKAH TIDAK ADA GAMBAR YANG DI UPLOAD
        // if ($fileSampul->getError() == 4) {
        //     $namaSampul = 'default1.jpg';
        // } else {
        //     // PINDAHKAN GAMBAR KE FOLDER IMG YANG ADA DI PUBLIC
        //     $fileSampul->move('img');
        //     //AMBIL NAMA FILENYA
        //     $namaSampul = $fileSampul->getName();
        // }




        $slug = url_title($this->request->getVar('kode'), '-', true);
        $this->cbModel->save([
            'kode' => $this->request->getVar('kode'),
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'nilai' => $this->request->getVar('nilai'),
        ]);


        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('/centerback');
    }

    public function delete($id)
    {
        //CARI GAMBAR BERDASARKAN ID
        $data_cb = $this->cbModel->find($id);

        // //CEK JIKA GAMBARNYA DEFAULT
        // if ($pemain['sampul'] != 'default1.jpg') {
        //     //HAPUS GAMBAR
        //     unlink('img/' . $pemain['sampul']);
        // }



        $this->cbModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/centerback');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Kriteria CB',
            'validation' => \Config\Services::validation(),
            'data_cb' => $this->cbModel->getCenter($slug)
        ];


        return view('datacb/edit', $data);
    }

    public function update($id)
    {
        //     //CEK JUDUL
        //     $laporanlama = $this->cbModel->getLaporan($this->request->getVar('slug'));
        //     if ($laporanlama['kode'] == $this->request->getVar('kode')) {
        //         $rule_username = 'required';
        //     } else {
        //         $rule_username = 'required|is_unique[data_cb.kode]';
        //     }

        if (!$this->validate([
            'kode' => [
                'rules' => 'required[data_cb.kode]',
                'errors' => [
                    'required' => '{field} kode harus diisi.',
                    'is_unique' => '{field} kode sudah ada.'
                ]
            ],
            'nama' => [
                'rules' => 'required[data_cb.nama]',
                'errors' => [
                    'required' => '{field} tanggal kegiatan harus diisi.',

                ]
            ],
            'jenis' => [
                'rules' => 'required[data_cb.jenis]',
                'errors' => [
                    'required' => '{field} jam mulai harus diisi.',
                ]
            ],
            'nilai' => [
                'rules' => 'required[data_cb.nilai]',
                'errors' => [
                    'required' => '{field} jam selesai harus diisi.',
                ]
            ],
        ])) {

            return redirect()->to('/centerback/edit' . $this->request->getVar('slug'))->withInput();
        }

        $slug = url_title($this->request->getVar('kode'), '-', true);
        $this->cbModel->save([
            'id' => $id,
            'kode' => $this->request->getVar('kode'),
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'nilai' => $this->request->getVar('nilai'),
        ]);


        session()->setFlashdata('pesan', 'Data Berhasil Ubah');

        return redirect()->to('/centerback');
    }
}
