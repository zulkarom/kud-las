<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Vest $model */

$this->title = 'Create Vest';
$this->params['breadcrumbs'][] = ['label' => 'Vests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vest-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
