<?php

use yii\db\Schema;
use yii\db\Migration;

class m151225_113607_create_user_social_table extends Migration
{
    public function up()
    {
        $this->createTable('user_social', [
            "id" => "int(11) unsigned not null auto_increment",
            "socialId" => "varchar(100) default null",
            "accessToken" => "int(11) unsigned default null",
            "userName" => "varchar(255) default null",
            "userSex" => "enum('male', 'female') default 'male'",
            "userEmail" => "varchar(255) default null",
            "userAvatarUrl" => "varchar(255) default null",
            "userAttributesStorage" => "text",
            "timeCreated" => "timestamp not null default current_timestamp",
            "primary key (id)",
        ]);
    }

    public function down()
    {
        $this->dropTable('user_social');
    }
}
