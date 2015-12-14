<?php
namespace app\controllers;

use app\models\LoginForm;
use app\models\SignUpForm;
use app\repositories\UserRepository;
use Yii;

class AuthController extends BaseController
{
    /**
     * @var $user UserRepository
     */
    public $users;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->users = new UserRepository();
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        /* @var $model \app\models\LoginForm */
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', compact('model'));
    }

    public function actionSignUp()
    {

        /* @var $model \app\models\SignUpForm */
        $model = new SignUpForm();

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $user = $this->users->create($model->attributes, $model->password);
            Yii::$app->getUser()->login($user, Yii::$app->params['user.loginDuration']);
            return $this->goHome();
        }

        return $this->render('sign-up', compact('model'));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        $this->goHome();
    }
}