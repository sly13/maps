<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "map".
 *
 * @property string $id
 * @property string $latitude
 * @property string $longitude
 *
 * @property Driving[] $drivings
 * @property Flat[] $flats
 * @property Meeting[] $meetings
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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['latitude', 'longitude'], 'required'],
            [['latitude', 'longitude'], 'string', 'max' => 250]
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrivings()
    {
        return $this->hasMany(Driving::className(), ['mapId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlats()
    {
        return $this->hasMany(Flat::className(), ['mapId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeetings()
    {
        return $this->hasMany(Meeting::className(), ['mapId' => 'id']);
    }
}
