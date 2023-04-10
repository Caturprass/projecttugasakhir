<?php

namespace App\Controllers;

// use App\Models\AlternatifModel;


class Alternatif extends BaseController
{
    protected $alternatifModel;
    public function __construct()
    {
        // $this->alternatifModel = new AlternatifModel();
    }

    public function index()
    {
        //menampilkan sebuah Views return
        //CI akan mencari parameter dengan nama home.php di folder view
        $data = [
            'title' => 'Home | Alternatif',
            'alternatifsaw' => $this->alternatifModel->getAlternatif()


        ];
        //dari echo kita bisa kembalikan lagi return
        return view('alternatif/home', $data);
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Alternatif',
            'alternatifsaw' => $this->alternatifModel->getAlternatif($id)
        ];
        return view('alternatif/detail', $data);
    }
    public function create()
    {


        $data = [
            'title' => 'Form Alternatif',
        ];


        return view('alternatif/create', $data);
    }
    public function save()
    {
        $this->alternatifModel->save([
            'kode' => $this->request->getVar('kode'),
            'nama' => $this->request->getVar('nama')
        ]);

        return redirect()->to('/alternatif');
    }
    public function delete($id)
    {
        //CARI GAMBAR BERDASARKAN ID
        // $alternatifsaw = $this->alternatifModel->find($id);

        $this->alternatifModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/alternatif');
    }
}
