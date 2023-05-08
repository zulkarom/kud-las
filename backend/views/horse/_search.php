<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HorseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="horse-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'eam_id') ?>

    <?= $form->field($model, 'horse_code') ?>

    <?= $form->field($model, 'horse_name') ?>

    <?= $form->field($model, 'horse_dob') ?>

    <?php // echo $form->field($model, 'horse_color') ?>

    <?php // echo $form->field($model, 'horse_gender') ?>

    <?php // echo $form->field($model, 'country_born') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
