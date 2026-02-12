<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProdutosVariacoes extends Migration
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
            'produto_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'cor_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tamanho_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'default' => 'Ativo',
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('produto_id', 'produtos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('cor_id', 'cores', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('tamanho_id', 'tamanhos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('produtos_variacoes');
    }

    public function down()
    {
        $this->forge->dropTable('produtos_variacoes');
    }
}
