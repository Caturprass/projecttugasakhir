<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class OrangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'          => 'Catur Edi p',
                'alamat'        => 'desa simo kecamatan balerejo',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
            [
                'nama'          => 'Clarissa Putri Aurelia',
                'alamat'        => 'desa berbek kecamatan berbek',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
            [
                'nama'          => 'Clar Clar',
                'alamat'        => 'desa berbek kecamatan nganjuk',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ]
        ];

        // Simple Queries
        //$this->db->query('INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)', $data);

        // Using Query Builder
        // $this->db->table('orang')->insert($data);
        $this->db->table('orang')->insertBatch($data);
    }
}
