<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMessageTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => false,
                'auto_increment' => true
            ],
            'sender_id' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'receiver_id' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'message' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('sender_id', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('receiver_id', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('messages');
    }

    public function down()
    {
        $this->forge->dropTable('messages');
    }
}
