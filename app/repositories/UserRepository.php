<?php

namespace app\repositories;

use app\models\User;
use Yii;

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
class UserRepository extends ActiveRepository
{
    /**
     * @param $data array
     * @param $password string
     * @return User
     */
    public function create($data, $password)
    {
        $user = new User();
        $user->setAttributes($data);
        $user->group = User::GROUP_USER;
        $user->setPassword($password);
        $user->authKey = Yii::$app->security->generateRandomString();
        $this->saveOrFail($user);

        return $user;
    }
}