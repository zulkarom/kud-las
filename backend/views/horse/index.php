<?php

use backend\models\Horse;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HorseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Horses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horse-index">


    <p>
        <?= Html::a('Create Horse', ['create'], ['class' => 'btn btn-success']) ?>
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
            'horse_name',
            //'eam_id',
            'horse_code',
            'horse_dob',
            'horse_color',
            'genderShort',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Horse $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

</div>
    </div>
</div>
