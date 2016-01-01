<?php
namespace app\models\form;

use yii\base\Model;

class MapForm extends Model
{
    /**
     * @var string
     */
    public $latitude;
    /**
     * @var string
     */
    public $longitude;
    /**
     * @var string
     */
    public $type;

    public function rules()
    {
        return [
            ['latitude', 'string'],
            ['latitude', 'trim'],
            ['latitude', 'required'],

            ['longitude', 'string'],
            ['longitude', 'trim'],
            ['longitude', 'required'],

            ['type', 'string'],
            ['type', 'trim'],
            ['type', 'required'],
        ];
    }

    public function safeAttributes()
    {
        return ['latitude', 'longitude', 'type'];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'type' => 'Тип события',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'timeCreated' => 'Time Created',
            'timeUpdated' => 'Time Visited',
        ];
    }

}