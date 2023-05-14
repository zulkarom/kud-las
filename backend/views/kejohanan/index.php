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
                'format' => 'html',
                'attribute' => 'is_active',
                'filter' => Html::activeDropDownList($searchModel, 'is_active', $searchModel->statusArray,['class'=> 'form-control','prompt' => 'Pilih Status']),
                'label' => 'Status',
                'value' => function($model){
                    return $model->statusLabel;
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update}',
            'buttons'=>[
                'update'=>function ($url, $model) {
                    return Html::a('<span class="fa fa-edit"></span> View',['view', 'id' => $model->id],['class'=>'btn btn-primary btn-sm']);
                }
                ]
            ],


            
        ],
    ]); ?>


</div>
</div>
    </div>