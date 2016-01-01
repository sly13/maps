<?php

use yii\db\Schema;
use yii\db\Migration;

class m151221_190204_create_map_table extends Migration
{
    public function up()
    {
        $this->createTable('map', [
            'id' => 'int(11) unsigned not null auto_increment',
            'userId' => 'int(11) UNSIGNED NOT NULL',
            'type' => 'enum("flat","meeting","driving") not null default "flat"',
            'latitude' => 'varchar(250) not null',
            'longitude' => 'varchar(250) not null',
            'timeCreated' => 'timestamp not null default current_timestamp',
            'timeUpdated' => 'timestamp null default null',
            'primary key (id)',
        ]);
    }

    public function down()
    {
       $this->dropTable('map');
    }
}
