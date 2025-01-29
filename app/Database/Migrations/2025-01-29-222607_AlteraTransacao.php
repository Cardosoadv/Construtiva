<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlteraTransacao extends Migration
{
    public function up()
    {
        // Adiciona uma coluna para armazenar os IDs dos clientes
        $this->forge->addColumn('transacoes', [
            'clientes' => [
                'type' => 'json', 
                'null' => true,   // Permite valores nulos
            ],
        ]);
    }

    public function down()
    {
        // Remove a coluna caso a migration seja revertida
        $this->forge->dropColumn('transacoes', 'clientes');
    }
}
