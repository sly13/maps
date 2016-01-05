<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = 'Карта';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head()?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <?= $this->render('menu') ?>

    <div class="container-fluid main-content" style="padding-left: 0;">
        <?= $content ?>
    </div>
</div>

<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="map-filter" style="margin-top: 50px">
    <div class="filter">
        <p>Форма поиска</p>
        <input type="text" class="form-control"> <br>
        <input type="text" class="form-control"><br>

        <button type="submit" class="btn btn-primary"> Поиск </button>
    </div>
</div>

<footer class="footer">
    <div class="container-fluid">
        <p class="pull-left">&copy; blablaflat.by <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
