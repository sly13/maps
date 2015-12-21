<?php
namespace app\modules\admin\assets;

use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/AdminLTE.min.css',
        'css/_all-skins.min.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/app.min.js',
        'js/demo.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
