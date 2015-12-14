<?php

namespace app\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $password;

    /**
     * @var User|false|null
     */
    private $_user = false;


    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['email', 'string'],
            ['email', 'trim'],
            ['email', 'required', 'message' => 'Необходимо указать адрес электронной почты.'],
            ['email', 'email', 'message' => 'Такой адрес электронной почты не поддерживается.'],

            ['password', 'string'],
            ['password', 'trim'],
            ['password', 'required', 'message' => 'Необходимо указать пароль'],
            ['password', 'validatePassword', 'params' => ['message' => 'Необходимо указать пароль.']],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'password' => 'Пароль',
        ];
    }

    /**
     * @param string $attribute
     * @param array $params
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            /* @var $user /app/models/User */
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, $params['message']);
            }
        }
    }

    /**
     * @return boolean
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), Yii::$app->params['user.loginDuration']);
        }
        return false;
    }

    /**
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findOne($this->email);
        }

        return $this->_user;
    }
}
