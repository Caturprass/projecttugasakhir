<?php

namespace App\Models;

use CodeIgniter\Model;

class GkModel extends Model
{
    protected $table = 'data_gk';
    protected $useTimesstamp = true;
    protected $allowedFields = ['kode', 'slug', 'nama', 'jenis', 'nilai'];


    public function getKiper($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }


        return $this->where(['id' => $slug])->first();
    }
}
