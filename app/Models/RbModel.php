<?php

namespace App\Models;

use CodeIgniter\Model;

class RbModel extends Model
{
    protected $table = 'data_rb';
    protected $useTimesstamp = true;
    protected $allowedFields = ['kode', 'slug', 'nama', 'jenis', 'nilai'];


    public function getRight($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }


        return $this->where(['id' => $slug])->first();
    }
}
