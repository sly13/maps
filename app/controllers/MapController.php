<?php
namespace app\controllers;

use app\models\form\MapForm;
use app\models\Map;
use app\repositories\MapRepository;
use Yii;

class MapController extends BaseController
{
    /*
     * @var string
     */
    public $layout = 'map';

    /**
     * @var $maps MapRepository
     */
    public $maps;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->maps = new MapRepository();
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $dots = new Map();
        return $this->render('index', compact('dots'));
    }

    /**
     * @return string
     */
    public function actionCreate()
    {
        $this->layout = 'main';
        $model = new MapForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $data = $model->attributes;
            $data['userId'] = Yii::$app->user->id;
            $this->maps->create($data);

            $this->redirect('/map/index');
        }

        return $this->render('create', compact('model'));
    }

    /**
     * @return string
     */
    public function actionGetDots()
    {
        $points = Map::find()->all();
        $data = [];
        /* @var $point Map */
        foreach ($points as $point) {
            $item= [
                'center' => [$point->latitude, $point->longitude],
                'name' => $point->type,
                'preset' => "3islands#circleDotIcon",
                'iconColor' => "#0095b6",
                'balloonContent' => $point->type,
                'image' => '/images/'. $point->type .'.gif'
            ];
            $data[] = $item;
        }
        return json_encode($data);
    }
}