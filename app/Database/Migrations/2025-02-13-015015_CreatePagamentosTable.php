<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePagamentosTable extends Migration
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
            'pedido_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'metodo_pagamento' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status_pagamento' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'datapagamento' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'total' => [
                'type' => 'DECIMAL',
                'constraint' => '7,2',
                'null' => false,
            ],
            'cartao_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'endereco_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('pedido_id', 'pedidos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('cartao_id', 'cartoes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('endereco_id', 'enderecos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pagamentos');
    }

    public function down()
    {
        $this->forge->dropTable('pagamentos');
    }
}
