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
                'constraint' => '8',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('enderecos');
    }

    public function down()
    {
        $this->forge->dropTable('enderecos');
    }
}
