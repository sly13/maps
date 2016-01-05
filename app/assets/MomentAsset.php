<?php
namespace app\assets;

use yii\web\AssetBundle;

class MomentAsset extends AssetBundle
{
    public $sourcePath = '@bower/moment';

    public $css = [
    ];

    public $js = [
        'min/moment-with-locales.min.js'
    ];

    public $depends = [

    ];
}