<?php

use yii\db\Schema;
use yii\db\Migration;

class m151225_113607_create_user_social_table extends Migration
{
    public function up()
    {
        $this->createTable('user_social', [
            "id" => "int(11) unsigned NOT NULL AUTO_INCREMENT",
            "socialId" => "varchar(100) DEFAULT NULL",
            "accessToken" => "int(11) unsigned DEFAULT NULL",
            "userName" => "varchar(255) DEFAULT NULL",
            "userSex" => "ENUM('male', 'female') DEFAULT 'male'",
            "userEmail" => "varchar(255) DEFAULT NULL",
            "userAvatarUrl" => "varchar(255) DEFAULT NULL",
            "userAttributesStorage" => "text",
            "timeCreated" => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",
            "PRIMARY KEY (id)",
        ]);
    }

    public function down()
    {

    }
}
