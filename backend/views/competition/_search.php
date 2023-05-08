<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CompetitionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="competition-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kejohanan_id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'rider_id') ?>

    <?= $form->field($model, 'horse_id') ?>

    <?php // echo $form->field($model, 'hadlaju') ?>

    <?php // echo $form->field($model, 'jarak') ?>

    <?php // echo $form->field($model, 'cert_achive') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'register_at') ?>

    <?php // echo $form->field($model, 'register_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
