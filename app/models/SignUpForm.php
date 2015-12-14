<?php
namespace app\models;

use yii\base\Model;

class SignUpForm extends Model
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'string', 'max' => 100],
            ['name', 'trim'],
            ['name', 'required', 'message' => 'Укажите Ваше имя'],

            ['email', 'string', 'max' => 200],
            ['email', 'trim'],
            ['email', 'required', 'message' => 'Необходимо указать адрес электронной почты.'],
            ['email', 'email', 'message' => 'Такой адрес электронной почты не поддерживается.'],
            ['email', 'unique', 'targetClass' => User::className(), 'message' => 'Эта почта уже занята'],

            ['password', 'string', 'min' => 6],
            ['password', 'required', 'message' => 'Укажите пароль'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Ваше имя',
            'email' => 'Email',
            'password' => 'Пароль',
        ];
    }
}