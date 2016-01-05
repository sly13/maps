<?php
namespace app\controllers;

use app\models\form\FlatForm;
use app\models\Map;
use app\repositories\DrivingRepository;
use app\repositories\FlatRepository;
use app\repositories\MapRepository;
use app\repositories\MeetingRepository;
use Yii;

class MapController extends BaseController
{
    /**
     * @var string
     */
    public $layout = 'map';

    /**
     * @var $maps MapRepository
     */
    public $maps;
    /**
     * @var $flats FlatRepository
     */
    public $flats;
    /**
     * @var $meetings MeetingRepository
     */
    public $meetings;
    /**
     * @var $drivings DrivingRepository
     */
    public $drivings;


    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->maps = new MapRepository();
        $this->flats = new FlatRepository();
        $this->meetings = new MeetingRepository();
        $this->drivings = new DrivingRepository();
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
    public function actionFlat()
    {
        $this->layout = 'main';
        $model = new FlatForm();

        //var_dump(Yii::$app->request->post());die();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $data['latitude'] = Yii::$app->request->post('latitude');
            $data['longitude'] = Yii::$app->request->post('longitude');
            $map = $this->maps->create($data);
            if ($map) {
                $this->flats->create($model->attributes, $map->id);
            }
            $this->redirect('/map/index');
        }

        return $this->render('create-flat', compact('model'));
    }

    /**
     * @return string
     */
    public function actionMeeting()
    {
        $this->layout = 'main';
        $model = new FlatForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $data = $model->attributes;
            $map = $this->maps->create($data);
            var_dump($map->id);die();
            $this->redirect('/map/index');
        }

        return $this->render('create', compact('model'));
    }

    /**
     * @return string
     */
    public function actionDriving()
    {
        $this->layout = 'main';
        $model = new FlatForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $data = $model->attributes;
            $map = $this->maps->create($data);
            var_dump($map->id);die();
            $this->redirect('/map/index');
        }

        return $this->render('create', compact('model'));
    }

    /**
     * @param $data array
     * @return string
     */
    public function actionMap($data)
    {
        $model = new Map();
        $model->attributies = $data;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $data = $model->attributes;
            $map = $this->maps->create($data);
            var_dump($map->id);die();
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