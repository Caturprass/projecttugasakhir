<?php

namespace App\Models;

use CodeIgniter\Model;

class PemainModel extends Model
{
    protected $table = 'pemain';
    protected $useTimesstamp = true;
    protected $allowedFields = ['nama', 'slug', 'nationaly', 'position', 'foot', 'height', 'number', 'age', 'sampul'];


    public function getPemain($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }


        return $this->where(['slug' => $slug])->first();
    }
}
