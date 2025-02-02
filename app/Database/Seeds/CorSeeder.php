<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CorSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nome' => 'Vermelho',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nome' => 'Azul',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nome' => 'Verde',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nome' => 'Preto',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('cores')->insertBatch($data);
    }
}
