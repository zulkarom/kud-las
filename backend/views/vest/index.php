<?php

use backend\models\Vest;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var backend\models\VestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Vests';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="vest-index">

    <p>
        <?= Html::a('Create Vest', ['create'], ['class' => 'btn btn-success']) ?> 
        <?= Html::a('Assign Vest', ['assign'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>



  <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
            'class' => 'yii\bootstrap4\LinkPager',
        ],
        'itemView' => '_items',
        'summary'=>'',
        'layout' => '<div class="row">{items}</div>{summary}{pager}',
        'itemOptions' => ['tag' => null],
    ]); ?>

  <?php /* echo GridView::widget([
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

            [
                'format' => 'html',
			    'label' => 'Rider',
                'value' => function($model){
                    if($model->competition){
                        if($model->competition->rider){
                            return $model->competition->rider->rider_name;
                        }
                    }
                    
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
    ]); */ ?>

  </div> 

