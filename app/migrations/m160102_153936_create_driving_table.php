<?php

use yii\db\Schema;
use yii\db\Migration;

class m160102_153936_create_driving_table extends Migration
{
    public function up()
    {
        $this->createTable('driving', [
            'id' => 'int(11) unsigned not null auto_increment',
            'userId' => 'int(11) unsigned not null',
            'mapId' => 'int(11) unsigned not null',
            'timeCreated' => 'timestamp not null default current_timestamp',
            'timeUpdated' => 'timestamp null default null',
            'primary key (id)'
        ]);
        $this->addForeignKey('driving_ibfk_1', 'driving', 'userId', 'user_social', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('driving_ibfk_2', 'driving', 'mapId', 'map', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('driving');
    }
}
