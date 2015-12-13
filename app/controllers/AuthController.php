<?php
namespace app\controllers;

use app\models\LoginForm;
use app\models\SignUpForm;
use Yii;

class AuthController extends BaseController
{

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
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

            if ($user = $model->signUp()) {
                if (Yii::$app->getUser()->login($user))
                    return $this->goHome();
            }
        } else {
            Yii::$app->session->setFlash('error', 'Возникла ошибка при регистрации');
            Yii::error('Ошибка при регистрации');
            //return $this->refresh();
        }

        return $this->render('sign-up', compact('model'));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        $this->goHome();
    }
}