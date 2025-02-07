<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateItensPedidosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'valoritem' => [
                'type'       => 'DECIMAL',
                'constraint' => '7,2',
                'null'       => false
            ],
            'quantidade' => [
                'type'       => 'BIGINT',
                'null'       => false
            ],
            'totalprod' => [
                'type'       => 'DECIMAL',
                'constraint' => '7,2',
                'null'       => false
            ],
            'pedido_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true
            ],
            'produtos_variacoes_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true
            ],
        ]);

        $this->forge->addPrimaryKey(['pedido_id', 'produtos_variacoes_id']);
        $this->forge->addForeignKey('pedido_id', 'pedidos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('produtos_variacoes_id', 'produtos_variacoes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('itens_pedidos');
    }

    public function down()
    {
        $this->forge->dropTable('itens_pedidos');
    }
}
