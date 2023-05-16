<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Vest $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card">
  <div class="card-body">

  <div class="vest-form">

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'vest_no')->textInput() ?>

<?= $form->field($model, 'color')->dropDownList($model->listColors()) ?>

<?= $form->field($model, 'status')->dropDownList($model->statusArray) ?>


<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>

  </div> 
    </div>


