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
            ],
            [
                'descricao' => 'M',
            ],
            [
                'descricao' => 'G',
            ],
            [
                'descricao' => 'GG',
            ],
        ];

        $this->db->table('tamanhos')->insertBatch($data);
    }
}
