<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kejohanan */

$this->title = 'Update: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Kejohanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kejohanan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
