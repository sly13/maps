<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <?php
    $menuItems = [
        ['label' => 'Главная', 'url' => ['/site/index']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    ?>

    <?php
    NavBar::begin([
        'brandLabel' => 'BlablaFlat',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    if (Yii::$app->user->isGuest) :
        $menuItems[] = [
            'label' => 'Регистрация',
            'url' => ['/auth/sign-up']
        ];
        $menuItems[] = [
            'label' => 'Вход',
            'url' => ['/auth/login']
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
            'label' => 'Выйти (' . Yii::$app->user->identity->userName . ')',
            'url' => ['/auth/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    endif;

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems
    ]);
    NavBar::end();
    ?>

    <div >
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
