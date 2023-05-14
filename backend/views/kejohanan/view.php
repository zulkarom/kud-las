<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kejohanan */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Kejohanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kejohanan-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php 
        if($model->is_active == 0){ echo Html::a('Make Active', ['make-active', 'id' => $model->id], ['class' => 'btn btn-success']);
        }?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'date_start',
            'date_end',
            'location',
            [
                'format' => 'html',
                'attribute' => 'is_active',
                'label' => 'Status',
                'value' => function($model){
                    return $model->statusLabel;
                }
            ],
        ],
    ]) ?>

</div>
