<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nome'      => 'Admin',
            'email'     => 'admin@example.com',
            'senha'     => password_hash('admin123', PASSWORD_DEFAULT),
            'is_admin'  => 1,
        ];

        $this->db->table('users')->insert($data);
    }
}
