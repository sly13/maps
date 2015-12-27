<?php
use yii\helpers\Html;

$this->registerJsFile('https://api-maps.yandex.ru/2.1/?lang=ru_RU');
$this->registerJsFile('@web/js/dots.js', ['depends' => '\yii\web\JqueryAsset']);
?>

<?/*= Html::a('Новое событие', ['map/create'], ['class' => 'btn btn-xs']) */?>

<div id="map" style="width: 100vw; padding-top: 50px;
  height: 100vh;
  position: fixed;
  overflow: auto; padding-bottom: 60px"></div>
