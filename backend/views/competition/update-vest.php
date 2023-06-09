<?php

use backend\models\Category;
use backend\models\Country;
use backend\models\HorseGender;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Vest $model */

$this->title = 'KEMASKINI PENYERTAAN';
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

<?= $form->field($model, 'deposit_paid')->dropDownList($model->depositArray, ['prompt' => 'Sila Pilih']) ?>


<?php
 echo $form->field($model, 'rider_size')->dropdownlist($model->listSize, ['prompt' => 'Pilih Saiz']);
?>

<?=$form->field($model, 'category_id')->dropdownlist(Category::getCategoryList(), ['prompt' => 'Pilih Kategori']);

?>

<?php
 echo $form->field($model, 'register_status')->dropdownlist($model->statusArray);
?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>

</div>
            
        </div>
    </div>


    </div>
    <div class="col-md-6">

    
    <div class="card">
    <div class="card-header">
<h3 class="card-title">
Rider Data
</h3>


</div>
        <div class="card-body">



        <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
    <div class="col-lg-12">
                 <div class="single-form form-group">
                    <?= $form->field($rider, 'rider_name', 
                   )->textInput()?>



                       </div> <!-- single form -->
                   </div>
             <div class="col-lg-12">
                 <div class="single-form form-group">
                    <?= $form->field($rider, 'nric', 
                   )->textInput() ?>



                       </div> <!-- single form -->
                   </div>
                   <div class="col-lg-12">
                 <div class="single-form form-group">
                    <?= $form->field($rider, 'email', 
                   )->textInput() ?>
                 </div>
                   </div>

<div class="col-lg-12">
                 <div class="single-form form-group">
                    <?= $form->field($rider, 'phone', 
                   )->textInput() ?>



                       </div> <!-- single form -->
                   </div>

                   <div class="col-lg-12">
                 <div class="single-form form-group">
                    <?= $form->field($rider, 'address', 
                   )->textarea(['rows' => 4]) ?>



                       </div> <!-- single form -->
                   </div>

                   <div class="col-lg-12">
                 <div class="single-form form-group">
                    <?= $form->field($rider, 'kelab', 
                   )->textInput() ?>



                       </div> <!-- single form -->
                   </div>

                   <div class="col-lg-12">
                 <div class="single-form form-group">
                    <?= $form->field($rider, 'eam_member_no', 
                   )->textInput() ?>



                       </div> <!-- single form -->
                   </div>

                  
                         
                                   <p class="form-message"></p>
                                   <div class="col-lg-12">
                                       <div class="single-form form-group">
                                       
                                       <button class="btn btn-primary" type="submit">Save Rider Data</button> 
                                      
                                       </div> <!-- single form -->
                                   </div>
                               </div> <!-- row -->



   <?php ActiveForm::end(); ?>





        </div>




    </div>


    <div class="card">
    <div class="card-header">
<h3 class="card-title">
Horse Data
</h3>


</div>
        <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>
    

    <?= $form->field($horse, 'horse_name')->textInput() ?>

    <?= $form->field($horse, 'horse_color', 
   )->textInput() ?>

<?php
echo $form->field($horse, 'horse_gender')->dropdownlist(HorseGender::getGenderList(), ['prompt' => 'Pilih Jantina']);

?>


<?=$form->field($horse, 'horse_dob',['template' => '{label}{input}<i class="form-note"></i>{error}
'])->widget(DatePicker::classname(), [
'removeButton' => false,
'pluginOptions' => [
'autoclose'=>true,
'format' => 'yyyy-mm-dd',
'todayHighlight' => true,

],


]);
?>


    <?= $form->field($horse, 'eam_id', 
   )->textInput()->label('No. EAM ') ?>



<?php
echo $form->field($horse, 'country_born')->dropdownlist(Country::getCountryList(), ['prompt' => 'Pilih Negara'])->label('Negara Kelahiran Kuda');


?>
<br />

<div class="form-group">
<button class="btn btn-primary" type="submit">Save Horse Data</button> 

</div> </div> 



<?php ActiveForm::end(); ?>

        </div>
    </div>




</div>


