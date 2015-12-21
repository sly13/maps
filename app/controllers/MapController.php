<?php
namespace app\controllers;

use app\models\form\MapForm;
use app\models\Map;
use app\repositories\MapRepository;
use Yii;

class MapController extends BaseController
{
    /**
     * @var $maps MapRepository
     */
    public $maps;

    public function init()
    {
        $this->maps = new MapRepository();
    }

    public function actionIndex()
    {
        $dots = new Map();
        return $this->render('index', compact('dots'));
    }

    public function actionCreate()
    {
        $model = new MapForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $data = $model->attributes;
            $data['userId'] = Yii::$app->user->id;
            $this->maps->create($data);

            $this->redirect('/map/index');
        }

        return $this->render('create', compact('model'));
    }
}