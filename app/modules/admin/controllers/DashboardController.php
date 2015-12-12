<?php

namespace app\modules\admin\controllers;

class DashboardController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}