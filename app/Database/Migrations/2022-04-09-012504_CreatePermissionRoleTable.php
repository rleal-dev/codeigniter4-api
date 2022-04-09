<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePermissionRoleTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'role_id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
            ],
            'permission_id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('role_id', 'roles', 'id');
        $this->forge->addForeignKey('permission_id', 'permissions', 'id');
        $this->forge->createTable('permission_role');
    }

    public function down()
    {
        $this->forge->dropTable('permission_role');
    }
}
