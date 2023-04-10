<?php

namespace App\Controllers;

use App\Models\PemainModel;

class Pemain extends BaseController
{
    protected $pemainModel;
    public function __construct()
    {
        $this->pemainModel = new PemainModel();
    }
    public function index()
    {
        //$pemain = $this->pemainModel->findAll();

        $data = [
            'title' => 'Data Pemain Ac.milan',
            'pemain' => $this->pemainModel->getPemain()
        ];

        return view('datapemain/formpemain', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Pemain',
            'pemain' => $this->pemainModel->getPemain($slug)
        ];

        if (empty($data['pemain'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pemain tidak ditemukan.');
        }

        // jika pemain tidak ada di tabel

        return view('datapemain/detail', $data);
    }

    public function tambah()
    {


        $data = [
            'title' => 'Form Tambah Data Pemain',
            'validation' => \Config\Services::validation(),
        ];


        return view('datapemain/create', $data,);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[pemain.nama]',
                'errors' => [
                    'required' => '{field} pemain harus diisi.',
                    'is_unique' => '{field} pemain sudah ada.'
                ]
            ],
            'nationaly' => [
                'rules' => 'required[pemain.nationaly]',
                'errors' => [
                    'required' => '{field} pemain harus diisi.',

                ]
            ],
            'position' => [
                'rules' => 'required[pemain.position]',
                'errors' => [
                    'required' => '{field} pemain harus diisi.',
                ]
            ],
            'foot' => [
                'rules' => 'required[pemain.foot]',
                'errors' => [
                    'required' => '{field} pemain harus diisi.',
                ]
            ],
            'height' => [
                'rules' => 'required[pemain.height]',
                'errors' => [
                    'required' => '{field} pemain harus diisi.',
                ]
            ],
            'number' => [
                'rules' => 'required[pemain.number]',
                'errors' => [
                    'required' => '{field} pemain harus diisi.',
                ]
            ],
            'age' => [
                'rules' => 'required[pemain.age]',
                'errors' => [
                    'required' => '{field} pemain harus diisi.',
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {

            // $validation = \Config\Services::validation();
            // return redirect()->to('/pemain/tambah')->withInput()->with('validation', $validation);
            return redirect()->to('/pemain/tambah')->withInput();
        }

        // AMBIL GAMBAR
        $fileSampul = $this->request->getFile('sampul');
        //APAKAH TIDAK ADA GAMBAR YANG DI UPLOAD
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default1.jpg';
        } else {
            // PINDAHKAN GAMBAR KE FOLDER IMG YANG ADA DI PUBLIC
            $fileSampul->move('img');
            //AMBIL NAMA FILENYA
            $namaSampul = $fileSampul->getName();
        }




        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->pemainModel->save([
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'nationaly' => $this->request->getVar('nationaly'),
            'position' => $this->request->getVar('position'),
            'foot' => $this->request->getVar('foot'),
            'height' => $this->request->getVar('height'),
            'number' => $this->request->getVar('number'),
            'age' => $this->request->getVar('age'),
            'sampul' => $namaSampul
        ]);


        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('/pemain');
    }

    public function delete($id)
    {
        //CARI GAMBAR BERDASARKAN ID
        $pemain = $this->pemainModel->find($id);

        //CEK JIKA GAMBARNYA DEFAULT
        if ($pemain['sampul'] != 'default1.jpg') {
            //HAPUS GAMBAR
            unlink('img/' . $pemain['sampul']);
        }



        $this->pemainModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/pemain');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Pemain',
            'validation' => \Config\Services::validation(),
            'pemain' => $this->pemainModel->getPemain($slug)
        ];


        return view('data/edit', $data);
    }

    public function update($id)
    {
        //CEK JUDUL
        $pemainlama = $this->pemainModel->getPemain($this->request->getVar('slug'));
        if ($pemainlama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[pemain.nama]';
        }

        if (!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} pemain harus diisi.',
                    'is_unique' => '{field} pemain sudah ada.'
                ]
            ],
            'nationaly' => [
                'rules' => 'required[pemain.nationaly]',
                'errors' => [
                    'required' => '{field} pemain harus diisi.',

                ]
            ],
            'position' => [
                'rules' => 'required[pemain.position]',
                'errors' => [
                    'required' => '{field} pemain harus diisi.',
                ]
            ],
            'foot' => [
                'rules' => 'required[pemain.foot]',
                'errors' => [
                    'required' => '{field} pemain harus diisi.',
                ]
            ],
            'height' => [
                'rules' => 'required[pemain.height]',
                'errors' => [
                    'required' => '{field} pemain harus diisi.',
                ]
            ],
            'number' => [
                'rules' => 'required[pemain.number]',
                'errors' => [
                    'required' => '{field} pemain harus diisi.',
                ]
            ],
            'age' => [
                'rules' => 'required[pemain.age]',
                'errors' => [
                    'required' => '{field} pemain harus diisi.',
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {

            return redirect()->to('/pemain/edit' . $this->request->getVar('slug'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');

        // CEK GAMBAR,APAKAH TETAP GAMBAR LAMA
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // PINDAHKAN GAMBAR KE FOLDER IMG YANG ADA DI PUBLIC
            $fileSampul->move('img');
            //AMBIL NAMA FILENYA
            $namaSampul = $fileSampul->getName();
        }





        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->pemainModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'nationaly' => $this->request->getVar('nationaly'),
            'position' => $this->request->getVar('position'),
            'foot' => $this->request->getVar('foot'),
            'height' => $this->request->getVar('height'),
            'number' => $this->request->getVar('number'),
            'age' => $this->request->getVar('age'),
            'sampul' => $namaSampul
        ]);


        session()->setFlashdata('pesan', 'Data Berhasil Ubah');

        return redirect()->to('/pemain');
    }
}
