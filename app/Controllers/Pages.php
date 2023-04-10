<?php

namespace App\Controllers;

// use App\Models\GrafikModel;


class Pages extends BaseController
{
    // protected $grafikModel;
    // public function __construct()
    // {
    //     $this->grafikModel = new GrafikModel();
    // }

    public function index()
    {
        //menampilkan sebuah Views return
        //CI akan mencari parameter dengan nama home.php di folder view
        $data = [
            'title' => 'Home | Aplikasi SAW'

        ];
        //dari echo kita bisa kembalikan lagi return
        return view('pages/home', $data);
    }
    // public function indexgrafik()
    // {
    //     //menampilkan sebuah Views return
    //     //CI akan mencari parameter dengan nama home.php di folder view
    //     $data = [
    //         'title' => 'data grafik | Aplikasi SAW',
    //         'tb_penjualan' => $this->grafikModel->getPenjualan()
    //     ];
    //     //dari echo kita bisa kembalikan lagi return
    //     return view('pages/indexgrafik', $data);
    // }
    // public function create()
    // {


    //     $data = [
    //         'title' => 'Form Tambah Data Pemain',

    //     ];
    //     return view('pages/creategrafik', $data);
    // }
    // public function save()
    // {
    //     $this->grafikModel->save([
    //         'jumlah' => $this->request->getVar('jumlah'),
    //         'tahun' => $this->request->getVar('tahun')
    //     ]);
    //     return redirect()->to('/pages/grafik');
    // }


    // public function grafik()
    // {
    //     //menampilkan sebuah Views return
    //     //CI akan mencari parameter dengan nama home.php di folder view
    //     $data = [
    //         'title' => 'grafik | Aplikasi SAW',
    //         'tb_penjualan' => $this->grafikModel->getPenjualan()
    //     ];
    //     //dari echo kita bisa kembalikan lagi return
    //     return view('pages/v_chart', $data);
    // }


    public function about()
    {
        //karena ingin memanggil 1 controller punya beberapa view menggunakan view
        //return dalam 1 function atau 1 method hanya ada satu
        $data = [
            'title' => 'About Me'
        ];
        echo view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact us',
            'alamat' => [
                [
                    'tipe' => 'Alamat',
                    'alamat' => 'Jl. Simo balerejo No.332 Madiun',
                    'no' => '085731884483'
                ]

            ]


        ];
        return view('pages/contact', $data);
    }
}