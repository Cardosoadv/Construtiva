<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Imoveis extends Migration
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
            'codigo'   => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null'       => true,
            ],
            'bairro' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'quadra' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'lote' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'escritura' => [
                'type'       => 'TINYINT',
                'default'    => '0',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('imoveis');
    }

    public function down()
    {
        $this->forge->dropTable('imoveis');
    }
}
