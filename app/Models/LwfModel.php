<?php

namespace App\Models;

use CodeIgniter\Model;

class LwfModel extends Model
{
    protected $table = 'data_lwf';
    protected $useTimesstamp = true;
    protected $allowedFields = ['kode', 'slug', 'nama', 'jenis', 'nilai'];


    public function getKiri($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }


        return $this->where(['id' => $slug])->first();
    }
}
