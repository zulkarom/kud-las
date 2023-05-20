<?php

use backend\models\Category;
use backend\models\Vest;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>

<p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class="category-index">

<div class="card">
        <div class="card-body">
            
 


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

   
            'category_name',
            [
                'format' => 'html',
                'attribute' => 'is_enabled',
                'filter' => Html::activeDropDownList($searchModel, 'is_enabled', $searchModel->statusArray,['class'=> 'form-control','prompt' => 'Pilih Enabled']),
                'label' => 'Is Enabled',
                'value' => function($model){
                    return $model->statusLabel;
                }
            ],
            [
                'format' => 'html',
                'attribute' => 'color',
                'label' => 'Vest Color',
                'filter' => Html::activeDropDownList($searchModel, 'color', Vest::listColors(),['class'=> 'form-control','prompt' => 'Pilih Warna']),
                'value' => function($model){
                    return $model->colorLabel;
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update} {view}',
            'buttons'=>[
                'update'=>function ($url, $model) {
                    return Html::a('<span class="fa fa-edit"></span> Update',['update', 'id' => $model->id],['class'=>'btn btn-primary btn-sm']);
                },
                'view'=>function ($url, $model) {
                    return Html::a('<span class="fa fa-eye"></span> View',['view', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
                }
                ]
            ],
        ],
    ]); ?>


</div>
</div>
    </div>