<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    /**
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect(['dashboard/index']);
    }
}
