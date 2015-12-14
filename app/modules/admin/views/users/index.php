
<?
use yii\grid\GridView;

/* @var $dataProvider yii\data\DataProviderInterface */
$this->title = 'Пользователи';
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'name',
        'email'
    ]
]) ?>