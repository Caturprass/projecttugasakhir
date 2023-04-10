<?php

namespace App\Controllers;

use App\Models\PemainModel;

class Subkriteria extends BaseController
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
            'title' => 'Data Sub Kriteria',
            'pemain' => $this->pemainModel->getPemain()
        ];

        return view('subkriteria/home', $data);
    }
}