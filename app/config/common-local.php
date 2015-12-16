<?php

return [
    'components' => [
        'db' => [
            'dsn' => 'mysql:host=localhost;dbname=blablaflat',
            'username' => 'root',
            'password' => '',
            //'tablePrefix' => 'keys_',
        ],
        'mailer' => [
            'useFileTransport' => true,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];