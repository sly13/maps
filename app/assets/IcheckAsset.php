<?php
namespace app\assets;

use yii\web\AssetBundle;

class IcheckAsset extends AssetBundle
{
    public $sourcePath = '@bower/iCheck';

    public $css = [
        'skins/flat/red.css'
    ];

    public $js = [
        'icheck.min.js'
    ];

    public $depends = [
        '\yii\web\JqueryAsset'
    ];
}