<?php
use app\assets\MapAsset;
use yii\helpers\Html;

/* @var $this yii\web\View */
MapAsset::register($this);
?>

<div id="map" style="width: 100vw;
  height: 100vh;
  position: fixed;
  overflow: auto; padding-bottom:60px">
</div>
