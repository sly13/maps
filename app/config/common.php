<?php

use yii\helpers\ArrayHelper;

$params = ArrayHelper::merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'basePath' => dirname(dirname(__DIR__)),
    'runtimePath' => dirname(dirname(__DIR__)) . '/runtime',
    'viewPath' => dirname(__DIR__) . '/views',

    'name' => 'blablaflat',
    'language' => 'ru-RU',

    'aliases' => [
        '@app' => dirname(__DIR__),
        '@home' => '/site/index',
    ],

    'bootstrap' => ['log'],

    'components' => [
        'request' => [
            'baseUrl'=> '',
        ],
        'user' => [
            //'class' => 'app\models\User',
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => 'auth/login',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'charset' => 'utf8',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                //'<action>'=>'site/<action>',
                'admin' => 'admin/dashboard/index',
                'admin/<controller:\w+>' => 'admin/<controller>/index',
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'cache' => [
            'class' => 'yii\caching\DummyCache',
        ],
        'log' => [
            'class' => 'yii\log\Dispatcher',
        ],
    ],
    'params' => $params,
];