<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Horse */

$this->title = 'Create Horse';
$this->params['breadcrumbs'][] = ['label' => 'Horses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
