<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Kejohanan */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="card">
  <div class="card-body">

  <div class="kejohanan-form">

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<div class="row">
    <div class="col-md-4">

<?=$form->field($model, 'date_start')->widget(DatePicker::classname(), [
   'removeButton' => false,
   'pluginOptions' => [
       'autoclose'=>true,
       'format' => 'yyyy-mm-dd',
       'todayHighlight' => true,
       
   ], 
]);
?>

</div>
    <div class="col-md-4"><?=$form->field($model, 'date_end')->widget(DatePicker::classname(), [
   'removeButton' => false,
   'pluginOptions' => [
       'autoclose'=>true,
       'format' => 'yyyy-mm-dd',
       'todayHighlight' => true,
       
   ], 
]);
?></div>
</div>





<?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>


<div class="row">
    <div class="col-md-4">

<?=$form->field($model, 'date_vest')->widget(DatePicker::classname(), [
   'removeButton' => false,
   'pluginOptions' => [
       'autoclose'=>true,
       'format' => 'yyyy-mm-dd',
       'todayHighlight' => true,
       
   ], 
]);
?>

</div>
<div class="col-md-4">
<?= $form->field($model, 'deposit_amount', [
    'addon' => ['prepend' => ['content'=> 'RM']]

]); ?>
</div>

</div>

<div class="row">
    <div class="col-md-4">

<?=$form->field($model, 'cert_publish_at')->widget(DatePicker::classname(), [
   'removeButton' => false,
   'pluginOptions' => [
       'autoclose'=>true,
       'format' => 'yyyy-mm-dd',
       'todayHighlight' => true,
       
   ], 
]);
?>

</div>
<div class="col-md-4">

<div class="form-group">
<?php 
if(!$model->isNewRecord && $model->cert_participant){
echo Html::img(Url::to(['download-file','id' => $model->id]),['width' => '50%']);
}
?>
</div>
<?= $form->field($model, 'cert_instance')->fileInput() ?>

</div>

</div>


<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>

  </div> 
    </div>


