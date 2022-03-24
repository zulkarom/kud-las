<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Rider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rider-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
	<div class="col-md-6">  
	
	<?= $form->field($model, 'rider_name')->textInput(['maxlength' => true]) ?>
	   <?= $form->field($model, 'horse_name')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nric')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

 

    <?= $form->field($model, 'horse_dob')->textInput() ?>
</div>
	<div class="col-md-6"> 
	
	
    <?= $form->field($model, 'horse_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'horse_gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_born')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'kelab')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hadlaju')->textInput() ?>

    <?= $form->field($model, 'jarak')->textInput() ?>

    <?= $form->field($model, 'cert_achive')->dropDownList($model->achiveList()) ?>

    <?= $form->field($model, 'status')->dropDownList($model->statusList())?></div>
</div>

  

   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
