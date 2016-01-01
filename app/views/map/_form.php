<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\form\MapForm */
/* @var $form yii\bootstrap\ActiveForm */

$this->registerCssFile('@web/css/field.css');
$this->registerJsFile('https://api-maps.yandex.ru/2.1/?lang=ru_RU');
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
        <h1>Новое событие</h1>
        <div id="map" style="width: 100%; height: 200px"></div>
    </div>
</div>

<?= $form->field($model, 'type')->dropDownList([
    'flat' => 'Флэт', 'meeting' => 'Встреча', 'driving' => 'Покатушки'], [
    'prompt' => 'Выберите тип события',
    'class' => 'input-lg' ,
    'style' => 'width:100%; border-radius:0px'
])->label(false) ?>

<?= $form->field($model, 'latitude', ['template'=>'{input}'])->textInput()->hiddenInput()?>
<?= $form->field($model, 'longitude', ['template'=>'{input}'])->textInput()->hiddenInput() ?>

<div class="form-group row">
    <div class="col-sm-8 col-sm-offset-2">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-lg btn-success js-location', 'style' => 'border-radius:0px']) ?>
        <?= Html::a('Отмена', ['index'], ['class' => 'btn btn-lg btn-default', 'style' => 'border-radius:0px']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
