<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "flat".
 *
 * @property string $id
 * @property string $userId
 * @property string $mapId
 * @property string $timeStart
 * @property string $timeEnd
 * @property integer $whoNeed
 * @property string $minAmount
 * @property string $maxAmount
 * @property integer $alcohol
 * @property string $howToGet
 * @property string $description
 * @property string $timeCreated
 * @property string $timeUpdated
 *
 * @property SocialProfile $user
 * @property Map $map
 */
class Flat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flat';
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
            [['userId', 'mapId', 'timeStart', 'timeEnd', 'whoNeed', 'minAmount', 'maxAmount', 'alcohol'], 'required'],
            [['userId', 'mapId', 'whoNeed', 'minAmount', 'maxAmount', 'alcohol'], 'integer'],
            [['timeStart', 'timeEnd', 'timeCreated', 'timeUpdated'], 'safe'],
            [['howToGet'], 'string'],
            [['description'], 'string', 'max' => 250]
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
            'timeStart' => 'Time Start',
            'timeEnd' => 'Time End',
            'whoNeed' => 'Who Need',
            'minAmount' => 'Min Amount',
            'maxAmount' => 'Max Amount',
            'alcohol' => 'Alcohol',
            'howToGet' => 'How To Get',
            'description' => 'Description',
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
