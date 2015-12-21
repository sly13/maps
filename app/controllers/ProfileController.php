<?php
namespace app\controllers;


class ProfileController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}