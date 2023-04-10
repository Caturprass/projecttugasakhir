<?php

namespace App\Models;

use CodeIgniter\Model;

class LbModel extends Model
{
    protected $table = 'data_lb';
    protected $useTimesstamp = true;
    protected $allowedFields = ['kode', 'slug', 'nama', 'jenis', 'nilai'];


    public function getLeft($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }


        return $this->where(['id' => $slug])->first();
    }
}
