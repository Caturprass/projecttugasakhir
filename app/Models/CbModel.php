<?php

namespace App\Models;

use CodeIgniter\Model;

class CbModel extends Model
{
    protected $table = 'data_cb';
    protected $useTimesstamp = true;
    protected $allowedFields = ['kode', 'slug', 'nama', 'jenis', 'nilai'];


    public function getCenter($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }


        return $this->where(['id' => $slug])->first();
    }
}
