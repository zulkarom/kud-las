<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Competition */

$this->title = $model->rider->rider_name;
$this->params['breadcrumbs'][] = ['label' => 'Pendaftaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="competition-view">


<div class="row">
    <div class="col-md-6">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kejohanan_id',
            'category_id',
            'rider_id',
            'horse_id',

            'register_at',
        ],
    ]) ?>


    </div>
    <div class="col-md-6"></div>
</div>


</div>
