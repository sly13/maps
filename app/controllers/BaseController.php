<?php
namespace app\controllers;

use yii\web\Controller;

abstract class BaseController extends Controller
{
    /**
     * @inheritdoc
     */
    public $layout = 'main';
}
