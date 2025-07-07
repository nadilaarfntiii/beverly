<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'unsigned' => false,
                'auto_increment' => false
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 60,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'jekel' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'bagian' => [
                'type' => 'ENUM',
                'constraint' => ['Gudang', 'Keuangan', 'Hr Personalia', 'Produksi'],
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
