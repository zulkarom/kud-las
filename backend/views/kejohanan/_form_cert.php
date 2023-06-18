<?php

use backend\models\Category;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;
?>
<div class="kejohanan-update">

<div class="card">
  <div class="card-body">

  <div class="kejohanan-form">

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

  <div class="row">
<div class="col-md-4">

<?= $form->field($model, 'category_id')->dropDownList(Category::getCategoryListAll()) ?>

</div>
  </div>



<div class="row">
<div class="col-md-4">

<div class="form-group">
<?php 
if(!$model->isNewRecord && $model->certificate_file){
echo Html::img(Url::to(['download-cert-file','id' => $model->id]),['width' => '50%']);
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




</div>