<?php

use backend\models\Kejohanan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KejohananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kejohanan';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
        <div class="card-body">
            

<div class="kejohanan-index">

    <p>
        <?= Html::a('Create Kejohanan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'date_start',
            'date_end',
            'location',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Kejohanan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
</div>
    </div>