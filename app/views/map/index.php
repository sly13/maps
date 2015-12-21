<?php
use yii\helpers\Html;

$this->registerJsFile('@web/js/yandex-map.js');
$this->registerJsFile('@web/js/dots.js', ['depends' => '\yii\web\JqueryAsset']);
?>

<h1>Map</h1>

<button>Новое событие</button>

<?= Html::a('Новое событие', ['map/create'], ['class' => 'btn btn-xs'])?>

<div id="map" style="width: 100%; height: 700px"></div>
