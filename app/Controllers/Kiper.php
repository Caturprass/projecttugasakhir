<?php

namespace App\Controllers;

use App\Models\GkModel;

class Kiper extends BaseController
{
    protected $gkModel;
    public function __construct()
    {
        $this->gkModel = new GkModel();
    }
    public function index()
    {
        // $pemain = $this->pemainModel->findAll();

        $data = [
            'title' => 'Data Kriteria Kiper',
            'data_gk' => $this->gkModel->getKiper()
        ];

        return view('datakiper/home', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Data Kiper',
            'data_gk' => $this->gkModel->getKiper($slug)
        ];

        if (empty($data['data_gk'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pemain tidak ditemukan.');
        }

        // jika pemain tidak ada di tabel

        return view('datakiper/detail', $data);
    }

    public function create()
    {


        $data = [
            'title' => 'Tambah Kriteria Kiper',
            'validation' => \Config\Services::validation(),
        ];


        return view('datakiper/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'kode' => [
                'rules' => 'required|is_unique[data_gk.kode]',
                'errors' => [
                    'required' => '{field} kode harus diisi.',
                    'is_unique' => '{field} kode sudah ada.'
                ]
            ],
            'nama' => [
                'rules' => 'required[data_gk.nama]',
                'errors' => [
                    'required' => '{field} tanggal kegiatan harus diisi.',

                ]
            ],
            'jenis' => [
                'rules' => 'required[data_gk.jenis]',
                'errors' => [
                    'required' => '{field} jam mulai harus diisi.',
                ]
            ],
            'nilai' => [
                'rules' => 'required[data_gk.nilai]',
                'errors' => [
                    'required' => '{field} jam selesai harus diisi.',
                ]
            ],
        ])) {

            // $validation = \Config\Services::validation();
            // return redirect()->to('/pemain/tambah')->withInput()->with('validation', $validation);
            return redirect()->to('/kiper/create')->withInput();
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
        $this->gkModel->save([
            'kode' => $this->request->getVar('kode'),
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'nilai' => $this->request->getVar('nilai'),
        ]);


        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('/kiper');
    }

    public function delete($id)
    {
        //CARI GAMBAR BERDASARKAN ID
        $data_gk = $this->gkModel->find($id);

        // //CEK JIKA GAMBARNYA DEFAULT
        // if ($pemain['sampul'] != 'default1.jpg') {
        //     //HAPUS GAMBAR
        //     unlink('img/' . $pemain['sampul']);
        // }



        $this->gkModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/kiper');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Kriteria Kiper',
            'validation' => \Config\Services::validation(),
            'data_gk' => $this->gkModel->getKiper($slug)
        ];


        return view('datakiper/edit', $data);
    }

    public function update($id)
    {
        // //CEK JUDUL
        // $laporanlama = $this->gkModel->getLaporan($this->request->getVar('slug'));
        // if ($laporanlama['username'] == $this->request->getVar('username')) {
        //     $rule_username = 'required';
        // } else {
        //     $rule_username = 'required|is_unique[datakiper.username]';
        // }

        if (!$this->validate([
            'kode' => [
                'rules' => 'required[data_gk.kode]',
                'errors' => [
                    'required' => '{field} kode harus diisi.',
                    'is_unique' => '{field} kode sudah ada.'
                ]
            ],
            'nama' => [
                'rules' => 'required[data_gk.nama]',
                'errors' => [
                    'required' => '{field} tanggal kegiatan harus diisi.',

                ]
            ],
            'jenis' => [
                'rules' => 'required[data_gk.jenis]',
                'errors' => [
                    'required' => '{field} jam mulai harus diisi.',
                ]
            ],
            'nilai' => [
                'rules' => 'required[data_gk.nilai]',
                'errors' => [
                    'required' => '{field} jam selesai harus diisi.',
                ]
            ],
        ])) {

            return redirect()->to('/kiper/edit' . $this->request->getVar('slug'))->withInput();
        }

        // $fileSampul = $this->request->getFile('sampul');

        // // CEK GAMBAR,APAKAH TETAP GAMBAR LAMA
        // if ($fileSampul->getError() == 4) {
        //     $namaSampul = $this->request->getVar('sampulLama');
        // } else {
        //     // PINDAHKAN GAMBAR KE FOLDER IMG YANG ADA DI PUBLIC
        //     $fileSampul->move('img');
        //     //AMBIL NAMA FILENYA
        //     $namaSampul = $fileSampul->getName();
        // }





        $slug = url_title($this->request->getVar('kode'), '-', true);
        $this->gkModel->save([
            'id' => $id,
            'kode' => $this->request->getVar('kode'),
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'nilai' => $this->request->getVar('nilai'),
        ]);


        session()->setFlashdata('pesan', 'Data Berhasil Ubah');

        return redirect()->to('/kiper');
    }
}
