<?php

use backend\models\Kejohanan;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CompetitionSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-6">

<?php $form = ActiveForm::begin([
    'id' => 'form-filter',
    'action' => ['index'],
    'method' => 'get',
]); ?>

<?= $form->field($model, 'kejohanan_id')->dropDownList(Kejohanan::getList())->label(false) ?>



<?php ActiveForm::end(); ?>


    </div>

</div>

<?php 


$this->registerJs('

$("#competitionsearch-kejohanan_id").change(function(){
    $("#form-filter").submit();
});



');


?>