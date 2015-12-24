<?php
use yii\helpers\Html;

$this->registerJsFile('https://api-maps.yandex.ru/2.1/?lang=ru_RU');
$this->registerJsFile('@web/js/dots.js', ['depends' => '\yii\web\JqueryAsset']);
?>

<h1>Map</h1>

<?= Html::a('Новое событие', ['map/create'], ['class' => 'btn btn-xs'])?>

<div id="map" style="width: 100%; height: 700px"></div>
