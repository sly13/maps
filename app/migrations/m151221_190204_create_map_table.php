<?php

use yii\db\Schema;
use yii\db\Migration;

class m151221_190204_create_map_table extends Migration
{
    public function up()
    {
        $this->createTable('map', [
            'id' => 'int(11) unsigned not null auto_increment',
            'latitude' => 'varchar(250) not null',
            'longitude' => 'varchar(250) not null',
            'address' => 'varchar(250) default null',
            'primary key (id)',
        ]);
    }

    public function down()
    {
        $this->dropTable('map');
    }
}
