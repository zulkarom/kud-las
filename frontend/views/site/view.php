<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Rider */

$this->title = $model->riderName;
$this->params['breadcrumbs'][] = ['label' => 'Riders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rider-view">

    <h4 class="info-title mb-15">MAKLUMAT PESERTA</h4>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'riderName',
            'horseName',
            'horseColor',
            'kelab'

        ],
    ]) ?>

</div>
