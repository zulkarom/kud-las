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
    <p>
        <?= Html::a('Create Kejohanan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class="card">
        <div class="card-body">
            

<div class="kejohanan-index">



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'attribute' => 'name',
                'format' => 'html',
                'value' => function($model){
                    return Html::a($model->name, ['view', 'id' => $model->id]);
                }
            ],
            [
                'attribute' => 'date_start',
			    'label' => 'Date',
                'format' => 'html',
                'value' => function($model){
                    return $model->dateStartEndFormat();
                }
            ],
            'location',
            [
                'format' => 'html',
                'attribute' => 'is_active',
                'filter' => Html::activeDropDownList($searchModel, 'is_active', $searchModel->statusArray,['class'=> 'form-control','prompt' => 'Pilih Status']),
                'label' => 'Status',
                'value' => function($model){
                    return $model->statusLabel;
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update}',
            'buttons'=>[
                'update'=>function ($url, $model) {
                    return Html::a('<span class="fa fa-edit"></span> Update',['update', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
                },
                'view'=>function ($url, $model) {
                    return Html::a('<span class="fa fa-eye"></span> View',['view', 'id' => $model->id],['class'=>'btn btn-primary btn-sm']);
                }
                ]
            ],


            
        ],
    ]); ?>


</div>
</div>
    </div>