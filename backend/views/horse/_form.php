<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Horse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="horse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'eam_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'horse_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'horse_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'horse_dob')->textInput() ?>

    <?= $form->field($model, 'horse_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'horse_gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_born')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
