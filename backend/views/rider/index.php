<?php

use backend\models\Rider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RiderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Riders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rider-index">

    <p>
        <?= Html::a('Create Rider', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="card">
        <div class="card-body">
            

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
            'class' => 'yii\bootstrap4\LinkPager',
        ],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'rider_name',
            'nric',
            'email:email',
            'address',
            //'phone',
            //'kelab',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Rider $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

</div>
    </div>
</div>
