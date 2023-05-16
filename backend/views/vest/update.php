<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Vest $model */

$this->title = 'Update Vest: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vest-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
