<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TamanhoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'descricao' => 'P',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'descricao' => 'M',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'descricao' => 'G',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'descricao' => 'GG',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('tamanhos')->insertBatch($data);
    }
}
