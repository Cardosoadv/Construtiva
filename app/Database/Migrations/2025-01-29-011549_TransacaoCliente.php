<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransacaoCliente extends Migration
{
    public function up()
    {
        $this->forge->addField([
            
            'id_cliente' => [
                'type'       => 'INT',
            ],
            'id_transacao' => [
                'type'       => 'INT',
            ],
        ]);
        $this->forge->createTable('transacao_cliente');
    }

    public function down()
    {
        $this->forge->dropTable('transacao_cliente');
    }
}
