<?php

namespace app\models;

use app\models\query\UserQuery;
use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $group
 * @property string $name
 * @property string $email
 * @property string $passwordHash
 * @property string $authKey
 * @property string $timeCreated
 * @property string $timeVisited
 */
class User extends ActiveRecord implements IdentityInterface
{
    const GROUP_USER = 'user';
    const GROUP_ADMIN = 'admin';


    /**
     * @return string
     */
    public static function tableName()
    {
        return 'user';
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
                    static::EVENT_BEFORE_INSERT => ['timeCreated', 'timeVisited'],
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
            [['group', 'email', 'passwordHash', 'authKey', 'name'], 'required'],
            [['timeCreated', 'timeVisited'], 'safe'],
            [['group'], 'string', 'max' => 10],
            [['email', 'passwordHash'], 'string', 'max' => 100],
            [['authKey'], 'string', 'max' => 32],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group' => 'Group',
            'name' => 'Name',
            'email' => 'Email',
            'passwordHash' => 'Password Hash',
            'authKey' => 'Auth Key',
            'status' => 'Status',
            'timeCreated' => 'Time Created',
            'timeVisited' => 'Time Visited',
        ];
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        return $this->passwordHash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Validates password
     *
     * @param  string $password password to validate
     *
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * @return UserQuery
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
}
