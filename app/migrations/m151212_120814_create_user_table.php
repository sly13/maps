<?php

use yii\db\Schema;
use yii\db\Migration;

class m151212_120814_create_user_table extends Migration
{
    public function up()
    {
        $this->createTable('user',[
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT',
            'group' => 'VARCHAR(10) NOT NULL',
            'name' => 'VARCHAR(100) NOT NULL',
            'email' => 'VARCHAR(100) NOT NULL',
            'passwordHash' => 'VARCHAR(100) NOT NULL',
            'authKey' => 'VARCHAR(32) NOT NULL',
            'timeCreated' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'timeVisited' => 'TIMESTAMP NULL DEFAULT NULL',
            'PRIMARY KEY (id)',
            'UNIQUE KEY (email)'
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }
}
