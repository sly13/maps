<?php

use yii\db\Schema;
use yii\db\Migration;

class m151221_190204_create_map_table extends Migration
{
    public function up()
    {
        $this->createTable('map', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT',
            'userId' => 'INT(11) UNSIGNED NOT NULL',
            'type' => 'ENUM("FLAT","MEET","CAR") NOT NULL DEFAULT "FLAT"',
            'latitude' => 'FLOAT NOT NULL',
            'longitude' => 'FLOAT NOT NULL',
            'timeCreated' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'timeUpdated' => 'TIMESTAMP NULL DEFAULT NULL',
            'PRIMARY KEY (id)',
        ]);
    }

    public function down()
    {
       $this->dropTable('map');
    }
}
