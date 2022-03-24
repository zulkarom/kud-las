<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Rider */

$this->title = 'Create Rider';
$this->params['breadcrumbs'][] = ['label' => 'Riders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rider-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
