<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCarrinhoTable extends Migration
{
    public function up()
    {
        // Define a estrutura da tabela 'carrinho'
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'produto_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'quantidade' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 1,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
                'default' => null,
                'on_update' => 'CURRENT_TIMESTAMP',
            ],
        ]);

        // Define a chave primária
        $this->forge->addPrimaryKey('id');

        // Define as chaves estrangeiras
        $this->forge->addForeignKey('produto_id', 'produtos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');

        // Cria a tabela
        $this->forge->createTable('carrinho');
    }

    public function down()
    {
        // Remove a tabela 'carrinho' se a migration for revertida
        $this->forge->dropTable('carrinho');
    }
}