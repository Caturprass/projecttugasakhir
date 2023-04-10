<?php

namespace App\Models;

use CodeIgniter\Model;

class CmfModel extends Model
{
    protected $table = 'data_cmf';
    protected $useTimesstamp = true;
    protected $allowedFields = ['kode', 'slug', 'nama', 'jenis', 'nilai'];


    public function getMid($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }


        return $this->where(['id' => $slug])->first();
    }
}
