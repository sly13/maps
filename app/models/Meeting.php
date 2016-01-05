<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meeting".
 *
 * @property string $id
 * @property string $userId
 * @property string $mapId
 * @property string $timeCreated
 * @property string $timeUpdated
 *
 * @property SocialProfile $user
 * @property Map $map
 */
class Meeting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meeting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'mapId'], 'required'],
            [['userId', 'mapId'], 'integer'],
            [['timeCreated', 'timeUpdated'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'mapId' => 'Map ID',
            'timeCreated' => 'Time Created',
            'timeUpdated' => 'Time Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(SocialProfile::className(), ['id' => 'userId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMap()
    {
        return $this->hasOne(Map::className(), ['id' => 'mapId']);
    }
}
