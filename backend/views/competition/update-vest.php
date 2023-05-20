<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Vest $model */

$this->title = 'EDIT VEST & DEPOSIT ';
$this->params['breadcrumbs'][] = ['label' => 'Pendaftaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="row">
    <div class="col-md-6">

    <div class="card">



<div class="card-header">
<h3 class="card-title">
MAKLUMAT PENYERTAAN
</h3>


</div>
<div class="card-body">


<?php 

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'label' => 'RIDER',
            'value' => function($model){
                    return $model->rider->rider_name;
                
            } 
        ],
        [
            'label' => 'KETEGORI',
            'value' => function($model){
                if($model->category){
                    return $model->category->category_name;
                }
                
            } 
        ],
        [
            'label' => 'VEST COLOR',
            'format' => 'html',
            'value' => function($model){
                if($model->category){
                    return $model->category->colorLabel;
                }
                
            } 
        ],
        [
            'label' => 'SAIZ BAJU',
            'value' => function($model){
                return $model->rider_size ;
            } 
        ],
        [
            'label' => 'STATUS',
            'format' => 'html',
            'value' => function($model){
                return $model->statusLabel ;
            } 
        ],



    ],
]);

?>

</div></div>


    </div>
    <div class="col-md-6">

    <div class="card">
    <div class="card-header">
<h3 class="card-title">
BORANG KEMASKINI
</h3>


</div>
        <div class="card-body">

        <div class="vest-update">

        <div class="competition-form">

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'vest_id')->dropDownList($vest_list, ['prompt' => 'Sila Pilih']) ?>



<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>

</div>
            
        </div>
    </div>





    </div>
</div>


