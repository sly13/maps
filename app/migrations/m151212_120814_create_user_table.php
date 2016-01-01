<?php

use yii\db\Schema;
use yii\db\Migration;

class m151212_120814_create_user_table extends Migration
{
    public function up()
    {
        $this->createTable('user',[
            'id' => 'int(11) unsigned not null auto_increment',
            'group' => 'varchar(10) not null',
            'name' => 'varchar(100) not null',
            'email' => 'varchar(100) not null',
            'passwordHash' => 'varchar(100) not null',
            'authKey' => 'varchar(32) not null',
            'timeCreated' => 'timestamp not null default current_timestamp',
            'timeVisited' => 'timestamp null default null',
            'primary key (id)',
            'unique key (email)'
        ]);
    }
    
    public function down()
    {
        $this->dropTable('user');
    }
}
