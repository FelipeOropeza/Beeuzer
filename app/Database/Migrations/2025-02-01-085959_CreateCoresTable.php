<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCoresTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('cores');
    }

    public function down()
    {
        $this->forge->dropTable('cores');
    }
}
