<?php
namespace app\models;

use yii\base\Model;

class SignUpForm extends Model
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
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
            'email' => 'Email',
            'password' => 'Пароль',
        ];
    }

    public function signUp()
    {
        $user = new User();
        $user->email = $this->email;
        $user->group = User::GROUP_USER;
        $user->status = User::STATUS_ACTIVE;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->save();

        return $user->save() ? $user : null;

    }
}