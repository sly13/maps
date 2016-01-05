<?php

use yii\db\Schema;
use yii\db\Migration;

class m160102_153921_create_meeting_table extends Migration
{
    public function up()
    {
        $this->createTable('meeting', [
            'id' => 'int(11) unsigned not null auto_increment',
            'userId' => 'int(11) unsigned not null',
            'mapId' => 'int(11) unsigned not null',
            'timeCreated' => 'timestamp not null default current_timestamp',
            'timeUpdated' => 'timestamp null default null',
            'primary key (id)'
        ]);
        $this->addForeignKey('meeting_ibfk_1', 'meeting', 'userId', 'user_social', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('meeting_ibfk_2', 'meeting', 'mapId', 'map', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('meeting');
    }
}
