<?php
namespace app\assets;

use yii\web\AssetBundle;

class MapAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/component.css',
        'css/default.css'
    ];

    public $js = [
        //'https://api-maps.yandex.ru/2.1/?lang=ru_RU',
        'js/yandex-map.js',
        'js/map-points.js',
        'js/classie.js',
        'js/modernizr.custom.js',
        'js/map-filter.js'
    ];

    public $depends = [
        '\yii\web\JqueryAsset'
    ];
}