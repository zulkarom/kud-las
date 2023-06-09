<?php

use backend\models\Category;
use backend\models\Kejohanan;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CompetitionSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
    'id' => 'form-filter',
    'action' => ['index'],
    'method' => 'get',
]); ?>

<div class="row">
    <div class="col-md-4">
<?= $form->field($model, 'vest_no')->textInput(['placeholder' => 'Search Vest No'])->label(false) ?>
    </div>


    <div class="col-md-3">
    <?= $form->field($model, 'status')->dropDownList($model->statusArray,['class'=> 'form-control','prompt' => 'Pilih Status'])->label(false)  ?>
    </div>

    <div class="col-md-3">
    <?= $form->field($model, 'color')->dropDownList($model->listColors(),['class'=> 'form-control','prompt' => 'Pilih Color'])->label(false)  ?>
    </div>


</div>

<?php ActiveForm::end(); ?>

<?php 


$this->registerJs('

$("#vestsearch-status").change(function(){
    $("#form-filter").submit();
});

$("#vestsearch-color").change(function(){
    $("#form-filter").submit();
});


');


?>