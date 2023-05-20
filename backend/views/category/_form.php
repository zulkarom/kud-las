<?php

use backend\models\Vest;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card">
        <div class="card-body">
        <div class="category-form">

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'is_enabled')->dropDownList($model->statusArray) ?>

<?= $form->field($model, 'color')->dropDownList(Vest::listColors(), ['prompt' => 'Pilih']) ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
        </div>
    </div>


