<?php

namespace App\Models;

use CodeIgniter\Model;

class RwfModel extends Model
{
    protected $table = 'data_rwf';
    protected $useTimesstamp = true;
    protected $allowedFields = ['kode', 'slug', 'nama', 'jenis', 'nilai'];


    public function getKanan($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }


        return $this->where(['id' => $slug])->first();
    }
}
