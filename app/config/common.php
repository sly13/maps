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
        '@map' => 'map/index',
        '@runtimePath' => dirname(dirname(__DIR__)) . '/runtime',
    ],

    'bootstrap' => ['log'],

    'components' => [
        'user' => [
            //'class' => 'app\models\User',
            'identityClass' => 'app\models\SocialProfile',
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
                'admin' => 'admin/dashboard/index',
                'admin/<controller:\w+>' => 'admin/<controller>/index',

                '' => 'site/index',
                '<controller:\w+>' => '<controller>/index',
                'get-dots' => 'map/get-dots'
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