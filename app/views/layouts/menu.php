<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

/* @var $this \yii\web\View*/
?>

<?php
NavBar::begin([
    'brandLabel' => Html::img('@web/images/logo.png', ['style' => 'width:100px']),
    'innerContainerOptions' => ['class' => 'container-fluid'],
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-default navbar-fixed-top',
    ],
]);

if (Yii::$app->user->isGuest) :
    $menuItems[] = [
        'label' =>  Html::img('@web/images/vk7.png'),
        'url' => ['/site/auth?authclient=vk'],
    ];
else :
    $menuItems[] = [
        'label' => 'Карта',
        'url' => ['/map']
    ];

    $menuItems[] = [
        'label' => Html::img('@web/images/menu-flat.png', ['style' => 'width : 19px']),
        'url' => ['/map/flat']
    ];

    $menuItems[] = [
        'label' => Html::img('@web/images/menu-meeting.png', ['style' => 'width : 19px']),
        'url' => ['/map/meeting']
    ];
    $menuItems[] = [
        'label' => Html::img('@web/images/menu-driving.png', ['style' => 'width : 19px']),
        'url' => ['/map/driving']
    ];

    if (Yii::$app->controller->id=='map' && Yii::$app->controller->action->id =='index')
        $menuItems[] = [
            'label' => '<span class="showLeft">' . Html::img('@web/images/filter.png'). '</span>',
        ];

    $menuItems[] = [
        'label' =>  Yii::$app->user->identity->userName,
        'items' => [
            [
                'label' => 'Профиль',
                'url' => '/profile',
            ],
                '<li class="divider"> </li>',
            [
                'label' => 'Мои флэты',
                'url' => '/flat',
            ],
            [
                'label' => 'Мои встречи',
                'url' => '/meeting',
            ],
            [
                'label' => 'Мои покатушки',
                'url' => '/drivning',
            ],
                '<li class="divider"> </li>',
            [
                'label' => 'Выйти',
                'url' => ['/auth/logout'],
                'linkOptions' => ['data-method' => 'post']
            ]
        ],
    ];
endif;

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
    'encodeLabels'=> false
]);
NavBar::end();
?>

