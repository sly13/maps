<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\form\MapForm */
/* @var $form yii\widgets\ActiveForm */


$this->registerJsFile('https://api-maps.yandex.ru/2.1/?lang=ru_RU');
$this->registerJsFile('@web/js/map.js', ['depends' => '\yii\web\JqueryAsset']);
?>

<div class="row">
    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-6">
        <?= $form->field($model, 'type')->dropDownList([ 'FLAT' => 'FLAT', 'MEET' => 'MEET', 'CAR' => 'CAR', ], ['prompt' => 'Выберите тип события']) ?>
        <?= $form->field($model, 'latitude')->textInput()?>

        <?= $form->field($model, 'longitude')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Create', ['class' => 'btn btn-success js-location']) ?>
        </div>
    </div>

    <div class="col-lg-6">
        <div id="map" style="width: 100%; height: 700px"></div>
    </div>

    <?php ActiveForm::end(); ?>

</div>