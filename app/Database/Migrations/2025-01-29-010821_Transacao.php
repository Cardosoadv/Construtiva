<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transacao extends Migration
{
    public function up()
    {
        $this->forge->addField([
            
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tipo'   => [
                'type'       => 'ENUM',
                'constraint' => ['Venda', 'Transferencia', 'Troca', 'Devolução'],
                'default'    => 'Venda', // Valor padrão (opcional)
            ],
            'data' => [
                'type'       => 'DATE',
                'null'       => true,
            ],
            'num_parcelas' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            'num_parcelas_pagas' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            'dt_minuta' => [
                'type'       => 'DATE',
                'null'       => true,
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'deleted_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('transacoes');
    }


    public function down()
    {
        $this->forge->dropTable('transacoes');
    }
}
