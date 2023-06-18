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
    'method' => 'get',
]); ?>

<div class="row">
 
    <div class="col-md-3">
    <?= $form->field($model, 'category_id')->dropDownList(Category::getCategoryList(), ['prompt' => 'Pilih Kategori'])->label(false)  ?>
    </div>



    <div class="col-md-2">
    <?= $form->field($model, 'cert_achive')->dropDownList($model->achieveArray, ['class'=> 'form-control','prompt' => 'Pilih Layak'])->label(false)  ?>
    </div>

</div>

<?php ActiveForm::end(); ?>

<?php 


$this->registerJs('


$("#achievementsearch-category_id").change(function(){
    $("#form-filter").submit();
});


$("#achievementsearch-cert_achive").change(function(){
    $("#form-filter").submit();
});



');


?>