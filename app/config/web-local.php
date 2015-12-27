<?php

return [
    'components' => [
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'vk' => [
                    'class' => 'yii\authclient\clients\VKontakte',
                    'clientId' => '5148322',
                    'clientSecret' => 'L9NB7DZBjAo5CHYIjvWO',
                    'scope' => 'email, friends, offline',
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => '1gJjzpyuDc97DKCtm-7Y1ZDnPU5b3ag_',
        ],
        'assetManager' => [
            'linkAssets' => true,
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error'],
                    'logFile' => '@app/runtime/logs/web-error.log'
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['warning'],
                    'logFile' => '@app/runtime/logs/web-warning.log'
                ],
            ],
        ],
    ],
];