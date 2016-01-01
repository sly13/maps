<?php
use yii\helpers\Html;

//$this->registerJsFile('https://api-maps.yandex.ru/2.1/?lang=ru_RU');
$this->registerJsFile('@web/js/yandex-map.js');
$this->registerJsFile('@web/js/dots.js', ['depends' => '\yii\web\JqueryAsset']);

$this->registerCssFile('@web/css/component.css');
$this->registerCssFile('@web/css/default.css');
$this->registerJsFile('@web/js/classie.js');
$this->registerJsFile('@web/js/modernizr.custom.js');
$this->registerJsFile('@web/js/menu.js', ['depends' => '\yii\web\JqueryAsset']);
?>

<div id="map" style="width: 100vw;
  height: 100vh;
  position: fixed;
  overflow: auto; padding-bottom:60px">
</div>
