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
        'pager' => [
            'class' => 'yii\bootstrap4\LinkPager',
        ],
        
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'rider_name',
            'horse_name',
            'nric',
            [
                'attribute' => 'cert_achive',
                'format' => 'html',
                'filter' => Html::activeDropDownList($searchModel, 'cert_achive', $searchModel->achiveList(),['class'=> 'form-control','prompt' => 'Choose']),
                'value' => function($model){
                return $model->achieveText;
                }
                ],
             'hadlaju',
            
            [
                'attribute' => 'status',
                'format' => 'html',
                'filter' => Html::activeDropDownList($searchModel, 'status', $searchModel->statusList(),['class'=> 'form-control','prompt' => 'Choose Status']),
                'value' => function($model){
                return $model->statusText;
                }
                ],
                
            //'address',
            //'horse_dob',
            //'horse_color',
            //'horse_gender',
            //'country_born',
            //'kelab',
            //'hadlaju',
            //'jarak',
            //'cert_achive',
            //'status',
            ['class' => 'yii\grid\ActionColumn',
                 'contentOptions' => ['style' => 'width: 13%'],
                'template' => '{view} {update}',
                //'visible' => false,
                'buttons'=>[
                    'update'=>function ($url, $model) {
                        return Html::a('UPDATE', 
                            ['update', 'id' => $model->id], ['class'=>'btn btn-warning btn-sm']);
                    },
                    'view'=>function ($url, $model) {
                    return Html::a('VIEW',
                        ['view', 'id' => $model->id], ['class'=>'btn btn-primary btn-sm']);
                    },
                    'delete'=>function ($url, $model) {
                        return Html::a('DELETE', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this data?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ],
            
            ],
        ],
    ]); ?>


</div>
