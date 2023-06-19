<?php

use backend\models\Category;
use backend\models\Kejohanan;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ParticipantSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
    'id' => 'form-filter',
    'action' => ['index'],
    'method' => 'get',
]); ?>

<div class="row">
    <div class="col-md-4">
<?= $form->field($model, 'kejohanan_id')->dropDownList(Kejohanan::getList())->label(false) ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model, 'category_id')->dropDownList(Category::getCategoryList(), ['prompt' => 'Pilih Kategori'])->label(false)  ?>
    </div>

    <div class="col-md-3">
    <?= $form->field($model, 'register_status')->dropDownList($model->statusArray,['class'=> 'form-control','prompt' => 'Pilih Status'])->label(false)  ?>
    </div>

    <div class="col-md-2">
    <?= $form->field($model, 'deposit_paid')->dropDownList($model->depositArray,['class'=> 'form-control','prompt' => 'Pilih Deposit'])->label(false)  ?>
    </div>

</div>

<?php ActiveForm::end(); ?>

<?php 


$this->registerJs('

$("#competitionsearch-kejohanan_id").change(function(){
    $("#form-filter").submit();
});

$("#competitionsearch-category_id").change(function(){
    $("#form-filter").submit();
});

$("#competitionsearch-register_status").change(function(){
    $("#form-filter").submit();
});

$("#competitionsearch-deposit_paid").change(function(){
    $("#form-filter").submit();
});



');


?>