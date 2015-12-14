<?php
namespace app\modules\admin\controllers;

use app\models\User;
use yii\data\ActiveDataProvider;

class UsersController extends BaseController
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()
        ]);

        return $this->render('index', compact('dataProvider'));
    }
}