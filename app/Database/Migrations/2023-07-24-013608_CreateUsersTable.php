<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' =>[
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => 100,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => 255,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => 11,
            ],
            'cep' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => 8,
            ],
            'street' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => 100,
            ],
            'neighborhood' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => 100,
            ],
            'number_house' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => 100,
            ],
            'city' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => 100,
            ],
            'state' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => 100,
            ],
            'country' => [
                'type' => 'VARCHAR',
                'null' => false,
                'constraint' => 100,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
