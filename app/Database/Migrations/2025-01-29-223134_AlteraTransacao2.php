<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlteraTransacao2 extends Migration
{
    public function up()
    {
        // Adiciona uma coluna para armazenar os IDs dos clientes
        $this->forge->addColumn('transacoes', [
            'imovel' => [
                'type' => 'int', 
            ],
        ]);
    }

    public function down()
    {
        // Remove a coluna caso a migration seja revertida
        $this->forge->dropColumn('transacoes', 'imovel');
    }
}
