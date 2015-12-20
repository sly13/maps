<?
use yii\grid\GridView;

/* @var $dataProvider yii\data\DataProviderInterface */
$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => $this->render('_grid'),
                'tableOptions' => [
                    'class' => 'table table-bordered table-hover'
                ],
                'columns' => [
                    [
                        'attribute' => 'name',
                        'label' => 'Имя',
                        'headerOptions' => ['width' => 500],
                    ],
                    'email'
                ]
            ]) ?>

        </div>
    </div>
</div>