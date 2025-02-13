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
            ],
            [
                'nome' => 'Azul',
            ],
            [
                'nome' => 'Verde',
            ],
            [
                'nome' => 'Preto',
            ],
        ];

        $this->db->table('cores')->insertBatch($data);
    }
}
