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
    /*$menuItems[] = [
        'label' => 'Регистрация',
        'url' => ['/auth/sign-up']
    ];*/
    /*$menuItems[] = [
        'label' => 'Вход',
        'url' => ['/auth/login']
    ];*/
    $menuItems[] = [
        'label' =>  Html::img('@web/images/vk7.png'),
        'url' => ['/site/auth?authclient=vk'],
    ];
else :
    $menuItems[] = [
        'label' => 'Админка',
        'url' => ['/admin']
    ];
    $menuItems[] = [
        'label' => 'Карта',
        'url' => ['/map']
    ];
    $menuItems[] = [
        'label' => 'Профиль',
        'url' => ['/profile']
    ];
    $menuItems[] = [
        'label' => '<button class="showLeft">' . Html::img('@web/images/filter2.png'). '</button>',
    ];
    $menuItems[] = [
        'label' => 'Выйти (' . Yii::$app->user->identity->userName . ')',
        'url' => ['/auth/logout'],
        'linkOptions' => ['data-method' => 'post']
    ];
endif;

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
    'encodeLabels'=> false
]);
NavBar::end();
?>