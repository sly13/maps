<?php

namespace app\modules\admin\controllers;

class DefaultController extends BaseController
{
    /**
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect(['dashboard/index']);
    }
}
