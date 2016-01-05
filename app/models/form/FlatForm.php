<?php
namespace app\models\form;

use yii\base\Model;

class FlatForm extends Model
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
    public $timeStart;
    /**
     * @var string
     */
    public $timeEnd;

    /**
     * @var integer
     */
    public $whoNeed;
    /**
     * @var integer
     */
    public $minAmount;
    /**
     * @var integer
     */
    public $maxAmount;
    /**
     * @var integer
     */
    public $alcohol;

    /**
     * @var string
     */
    public $howToGet;
    /**
     * @var string
     */
    public $description;


    public function rules()
    {
        return [
            ['latitude', 'string'],
            ['latitude', 'trim'],
            ['latitude', 'required'],

            ['longitude', 'string'],
            ['longitude', 'trim'],
            ['longitude', 'required'],

            ['timeStart', 'string'],
            ['timeStart', 'trim'],
            ['timeStart', 'required'],

            ['timeEnd', 'string'],
            ['timeEnd', 'trim'],
            ['timeEnd', 'required'],

            ['whoNeed', 'integer'],
            ['whoNeed', 'trim'],
            ['whoNeed', 'required'],

            ['minAmount', 'integer'],
            ['minAmount', 'trim'],
            ['minAmount', 'required'],

            ['maxAmount', 'integer'],
            ['maxAmount', 'trim'],
            ['maxAmount', 'required'],

            ['alcohol', 'integer'],
            ['alcohol', 'trim'],
            ['alcohol', 'required'],

            ['howToGet', 'string'],
            ['howToGet', 'trim'],
            ['howToGet', 'required'],


            [['description'], 'string', 'max' => 250],
            ['description', 'trim'],
            ['description', 'required'],
        ];
    }

    public function safeAttributes()
    {
        return ['latitude', 'longitude'];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
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

}