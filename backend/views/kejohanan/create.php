<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kejohanan */

$this->title = 'Create Kejohanan';
$this->params['breadcrumbs'][] = ['label' => 'Kejohanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kejohanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
