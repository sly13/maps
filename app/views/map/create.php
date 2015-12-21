<?php
/* @var $article  app\models\Map */
/* @var $this     yii\web\View */

$this->title = 'Карта - Новое событие';
$this->params['breadcrumbs'][] = ['label' => 'Карта', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Новое событие';
?>

<?= $this->render('_form', compact('model')) ?>

