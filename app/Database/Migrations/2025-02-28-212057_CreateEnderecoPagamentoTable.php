<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEnderecoPagamentoTable extends Migration
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
            'endereco_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'pagamento_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'numeroEndereco' => [
                'type' => 'VARCHAR',
                'constraint' => '4',
            ],
            'complemento' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('endereco_id', 'enderecos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('pagamento_id', 'pagamentos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('enderecospagamentos');
    }

    public function down()
    {
        $this->forge->dropTable('enderecospagamentos');
    }
}
