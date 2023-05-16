<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Vest $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vest-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'vest_no',
            [
                'attribute' => 'color',
                'format' => 'html',
			    'label' => 'Warna',
                'value' => function($model){
                    return $model->colorLabel;
                    
                }
                
            ],
            [
                'attribute' => 'status',
                'format' => 'html',
			    'label' => 'Status',
                'value' => function($model){
                    return $model->statusLabel;
                    
                }
                
            ],
            'competition_id',
        ],
    ]) ?>

</div>
