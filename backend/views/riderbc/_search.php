<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RiderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rider-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'rider_name') ?>

    <?= $form->field($model, 'nric') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'horse_name') ?>

    <?php // echo $form->field($model, 'horse_dob') ?>

    <?php // echo $form->field($model, 'horse_color') ?>

    <?php // echo $form->field($model, 'horse_gender') ?>

    <?php // echo $form->field($model, 'country_born') ?>

    <?php // echo $form->field($model, 'kelab') ?>

    <?php // echo $form->field($model, 'hadlaju') ?>

    <?php // echo $form->field($model, 'jarak') ?>

    <?php // echo $form->field($model, 'cert_achive') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
