<?php
namespace app\assets;

use yii\web\AssetBundle;

class RangeSliderAsset extends AssetBundle
{
    public $sourcePath = '@bower/ion.rangeslider';

    public $css = [
        'css/normalize.css',
        'css/ion.rangeSlider.css',
        'css/ion.rangeSlider.skinNice.css'
    ];

    public $js = [
        'js/ion.rangeSlider.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'app\assets\MomentAsset'
    ];
}