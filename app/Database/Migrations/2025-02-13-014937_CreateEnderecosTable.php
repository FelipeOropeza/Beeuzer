<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEnderecosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'rua' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'cidade' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'estado' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'cep' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'numero' => [
                'type' => 'VARCHAR',
                'constraint' => '4',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'default' => 'ativo',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('enderecos');
    }

    public function down()
    {
        $this->forge->dropTable('enderecos');
    }
}
