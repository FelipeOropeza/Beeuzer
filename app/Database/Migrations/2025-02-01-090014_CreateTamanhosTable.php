<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTamanhosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
                'unsigned'       => true,
            ],
            'descricao' => [
                'type'       => 'VARCHAR',
                'constraint' => 3, 
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tamanhos');
    }

    public function down()
    {
        $this->forge->dropTable('tamanhos');
    }
}
