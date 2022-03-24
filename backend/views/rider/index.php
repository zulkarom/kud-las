<?php

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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rider', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'phone',
            'rider_name',
            'nric',
            'email:email',
            //'address',
            //'horse_name',
            //'horse_dob',
            //'horse_color',
            //'horse_gender',
            //'country_born',
            //'kelab',
            //'hadlaju',
            //'jarak',
            //'cert_achive',
            //'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Rider $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
