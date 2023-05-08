<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Competition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="competition-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kejohanan_id')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'rider_id')->textInput() ?>

    <?= $form->field($model, 'horse_id')->textInput() ?>

    <?= $form->field($model, 'hadlaju')->textInput() ?>

    <?= $form->field($model, 'jarak')->textInput() ?>

    <?= $form->field($model, 'cert_achive')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'register_at')->textInput() ?>

    <?= $form->field($model, 'register_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
