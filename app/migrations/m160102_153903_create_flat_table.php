<?php

use yii\db\Schema;
use yii\db\Migration;

class m160102_153903_create_flat_table extends Migration
{
    public function up()
    {
        $this->createTable('flat', [
            'id' => 'int(11) unsigned not null auto_increment',
            'userId' => 'int(11) unsigned not null',
            'mapId' => 'int(11) unsigned not null',
            'timeStart' => 'timestamp not null',
            'timeEnd' => 'timestamp not null',
            'whoNeed' => 'tinyint(1) unsigned not null',
            'minAmount' => 'int(11) unsigned not null',
            'maxAmount' => 'int(11) unsigned not null',
            'alcohol' => 'tinyint(1) unsigned not null',
            'howToGet' => "enum('themselves', 'pick', 'tax') default 'themselves'",
            'description' => 'varchar(250) default null',
            'timeCreated' => 'timestamp not null default current_timestamp',
            'timeUpdated' => 'timestamp null default null',
            'primary key (id)'
        ]);
        $this->addForeignKey('flat_ibfk_1', 'flat', 'userId', 'user_social', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('flat_ibfk_2', 'flat', 'mapId', 'map', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('flat');
    }
}
