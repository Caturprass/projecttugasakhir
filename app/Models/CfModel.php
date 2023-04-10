<?php

namespace App\Models;

use CodeIgniter\Model;

class CfModel extends Model
{
    protected $table = 'data_cf';
    protected $useTimesstamp = true;
    protected $allowedFields = ['kode', 'slug', 'nama', 'jenis', 'nilai'];


    public function getStriker($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }


        return $this->where(['id' => $slug])->first();
    }
}