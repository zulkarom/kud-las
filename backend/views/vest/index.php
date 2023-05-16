<?php

use backend\models\Vest;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\VestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Vests';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="vest-index">

    <p>
        <?= Html::a('Create Vest', ['create'], ['class' => 'btn btn-success']) ?>
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
            'vest_no',
            [
                'attribute' => 'color',
                'format' => 'html',
                'filter' => Html::activeDropDownList($searchModel, 'color', $searchModel->listColors(),['class'=> 'form-control','prompt' => 'Pilih Warna']),
			    'label' => 'Warna',
                'value' => function($model){
                    return $model->colorLabel;
                    
                }
                
            ],
            [
                'attribute' => 'status',
                'format' => 'html',
                'filter' => Html::activeDropDownList($searchModel, 'status', $searchModel->statusArray,['class'=> 'form-control','prompt' => 'Pilih Status']),
			    'label' => 'Status',
                'value' => function($model){
                    return $model->statusLabel;
                    
                }
                
            ],
            
            'competition_id',
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
