<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$this->title = $model->category_name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">


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
            'category_name',
            [
                'format' => 'html',
                'attribute' => 'is_enabled',
                'label' => 'Is Enabled',
                'value' => function($model){
                    return $model->statusLabel;
                }
            ],
            [
                'format' => 'html',
                'attribute' => 'color',
                'label' => 'Vest Color',
                'value' => function($model){
                    return $model->colorLabel;
                }
            ],
        ],
    ]) ?>

</div>
