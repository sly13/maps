<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "map".
 *
 * @property integer $id
 * @property integer $userId
 * @property string $type
 * @property double $latitude
 * @property double $longitude
 * @property string $timeCreated
 * @property string $timeUpdated
 */
class Map extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'map';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    static::EVENT_BEFORE_INSERT => ['timeCreated', 'timeUpdated'],
                ],
                'value' => function () {
                    return date('Y-m-d H:i:s');
                },
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'latitude', 'longitude'], 'required'],
            [['userId'], 'integer'],
            [['type'], 'string'],
            [['latitude', 'longitude'], 'number'],
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
            'type' => 'Type',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'timeCreated' => 'Time Created',
            'timeUpdated' => 'Time Visited',
        ];
    }
}
