<?php

namespace app\controllers;

use app\models\SocialProfile;
use Exception;
use Yii;
use yii\authclient\ClientInterface;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
            ],
        ];
    }

    public function successCallback(ClientInterface $client)
    {
        /* @var $profile SocialProfile*/
        if ($profile = $this->findSocialProfile($client)) {
            Yii::$app->user->login($profile);
            return $this->redirect(['@map']);
        }

        return $this->redirect(['auth/login']);
        // user login or signup comes here
    }

    /**
     * Ищет в базе и возвращает авторизующийся социальный профиль.
     * Если не найден — сохраняет и возвращает.
     *
     * @param ClientInterface $client
     *
     * @throws Exception
     * @return SocialProfile
     */
    protected function findSocialProfile(ClientInterface $client)
    {
        $attributes = $client->getUserAttributes();
        if (null === ($profile = SocialProfile::findOne(['socialId' => $attributes['user_id']]))) {
            $profile = $this->save($attributes);
        }
        return $profile;
    }

    public function save($attributes)
    {
        $profile = new SocialProfile();
        $profile->socialId = (string)$attributes['user_id'];
        $profile->accessToken = '12345';
        $profile->userName = $attributes['first_name'] . ' ' . $attributes['last_name'];
        $profile->userSex = (string)$attributes['sex'];
        $profile->userAvatarUrl = $attributes['photo'];
        $profile->userAttributesStorage = json_encode($attributes);
        $profile->timeCreated = time();
        if ($profile->save()) {
            return $profile;
        } else {
            throw new Exception("Failed to create social profile record");
        }
    }


    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
}
