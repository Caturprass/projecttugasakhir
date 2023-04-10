<?php

namespace App\Models;

use CodeIgniter\Model;

class AmfModel extends Model
{
    protected $table = 'data_amf';
    protected $useTimesstamp = true;
    protected $allowedFields = ['kode', 'slug', 'nama', 'jenis', 'nilai'];


    public function getTengah($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }


        return $this->where(['id' => $slug])->first();
    }
}
