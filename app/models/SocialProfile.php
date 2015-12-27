<?php

namespace app\models;

use app\models\query\UserQuery;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user_social".
 *
 * @property string $id
 * @property string $socialId
 * @property string $accessToken
 * @property string $userName
 * @property string $userSex
 * @property string $userEmail
 * @property string $userAvatarUrl
 * @property string $userAttributesStorage
 * @property string $timeCreated
 */
class SocialProfile extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_social';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accessToken'], 'integer'],
            [['userSex', 'userAttributesStorage'], 'string'],
            [['timeCreated'], 'safe'],
            [['socialId'], 'string', 'max' => 100],
            [['userName', 'userEmail', 'userAvatarUrl'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'socialId' => 'Social ID',
            'accessToken' => 'Access Token',
            'userName' => 'User Name',
            'userSex' => 'User Sex',
            'userEmail' => 'User Email',
            'userAvatarUrl' => 'User Avatar Url',
            'userAttributesStorage' => 'User Attributes Storage',
            'timeCreated' => 'Time Created',
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
        if (!$this->passwordHash) {
            return false;
        }

        return Yii::$app->security->validatePassword($password, $this->passwordHash);
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

    /**
     * @return boolean
     */
    public function hasUser()
    {
        return (bool)$this->socialId;
    }
}
