<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCartoesTable extends Migration
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
            'numero_cartao' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'nome_titular' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'validade' => [
                'type' => 'DATE',
            ],
            'tipo_cartao' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'default' => 'ativo',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('cartoes');
    }
    public function down() {
        $this->forge->dropTable('cartoes');
    }
}
