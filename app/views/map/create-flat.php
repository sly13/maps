<?php

use app\assets\IcheckAsset;
use app\assets\RangeSliderAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\form\FlatForm */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = 'Карта - Замутить флэт';

$this->registerCssFile('@web/css/field.css');
RangeSliderAsset::register($this);
iCheckAsset::register($this);
$this->registerJsFile('@web/js/range-slider.js', ['depends' => '\yii\web\JqueryAsset']);

//$this->registerJsFile('https://api-maps.yandex.ru/2.1.31/?lang=ru_RU');
$this->registerJsFile('@web/js/api.js', ['depends' => '\yii\web\JqueryAsset']);
$this->registerJsFile('@web/js/map.js', ['depends' => '\yii\web\JqueryAsset']);

?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'options' => ['enctype' => 'multipart/form-data'],
    'fieldConfig' => [
        'options' => ['class' => 'grid form-group'],
        'template' => "{label}\n<div class=\"col-sm-8 col-sm-offset-2\">{input}\n{hint}\n{error}</div>",
    ],
]); ?>

<div class="form-group">
    <div class="col-sm-8 col-sm-offset-2">
        <h3>Новое событие</h3>
        <div id="map" style="width: 100%; height: 200px"></div>
    </div>
</div>

<?= $form->field($model, 'latitude', ['template'=>'{input}'])->textInput()->hiddenInput()?>
<?= $form->field($model, 'longitude', ['template'=>'{input}'])->textInput()->hiddenInput() ?>

<div class="form-group row">
    <div class="col-sm-8 col-sm-offset-2">
        <!--<b>Тусим</b> :-->
        <div id="range" ></div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-1 col-sm-offset-2">
        <label>Ждем</label>
    </div>
    <div class="col-sm-6">
        <input type="checkbox" name="girls" checked> Девушек
        <input type="checkbox" name="boys"> Парней
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-1 col-sm-offset-2">
        <label>Алкоголь</label>
    </div>
    <div class="col-sm-6">
        <input type="checkbox" name="alcohol" checked> Есть
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-1 col-sm-offset-2">
        <label>Добираться</label>
    </div>
    <div class="col-sm-6">
        <input type="radio" name="iCheck" checked> Сами
        <input type="radio" name="iCheck"> Заберем
        <input type="radio" name="iCheck"> Такси
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-1 col-sm-offset-2">
        <label>Описание</label>
    </div>
    <div class="col-sm-7">
        <textarea class="form-control" rows="3" placeholder="Enter ..." style="resize: none;"></textarea>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-8 col-sm-offset-2">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-lg btn-success js-flat-location', 'style' => 'border-radius:0px']) ?>
        <?= Html::a('Отмена', ['index'], ['class' => 'btn btn-lg btn-default', 'style' => 'border-radius:0px']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
