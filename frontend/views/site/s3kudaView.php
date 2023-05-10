<?php

/** @var yii\web\View $this */

use backend\models\Country;
use backend\models\HorseGender;
use backend\models\Rider;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'PENDAFTARAN SUKAN KUDA LASAK';

?>

<style>
  .stepnum{
    color: #fff;
    background-color: #007bff;
    display: inline-block;
    padding: 0.25em 0.4em;
    font-size: 14pt;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.85rem;
  }
</style>
<ul class="nav nav-tabs  mt-15">
  <li class="nav-item">
    <a class="nav-link" href="#"><span class="stepnum">1</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"><span class="stepnum">2</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="#"><span class="stepnum">3</span> KUDA</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="#"><span class="stepnum">4</span></a>
  </li>
</ul>

<div class="contact-box">




                <div class="row">
                    <div class="col-lg-5">
                        <div class="contact-info pt-25">

                        <h4 class="info-title">KEJOHANAN KUDA LASAK TERBUKA PIALA NAIB CANSELOR UMK</h4>
                        <p>6 - 9 June 2023</p>
                        
                          
                            <div class="mt-30" style="font-size:20px;">
                        
                                <div class="info-content">
                                    Sila masukkan maklumat kuda.
                                </div>
                            </div> <!-- single info -->
                       
                        </div> <!-- contact info -->
                    </div> 
                    <div class="col-lg-7">

                    <div class="contact-form">
                        
                        
                            <?php $form = ActiveForm::begin(); ?>
    

                     <?php 
                     $d = $model->horse_name && $model->is_confirmed == 1 ? ['disabled' => true] : ['disabled' => false];
                     
                     echo $form->field($model, 'horse_name',['template' => '{label}{input}<i class="form-note">(HURUF BESAR, untuk tujuan SIJIL)</i>{error}
            '])->textInput($d) ?>

             

                    


<?php 
                     $d = $model->horse_color && $model->is_confirmed == 1 ? ['disabled' => true] : ['disabled' => false];
                     
                     echo  $form->field($model, 'horse_color', 
                    )->textInput($d) ?>


                 

<?php
$d = $model->horse_gender  && $model->is_confirmed == 1  ? ['prompt' => 'Pilih Jantina', 'disabled' => 'disabled']  : ['prompt' => 'Pilih Jantina'];
 echo $form->field($model, 'horse_gender')
 ->dropdownlist(HorseGender::getGenderList(), $d);

?>


<?php 
                     $d = $model->horse_dob && $model->is_confirmed == 1  ? true : false;
                     
                     echo  $form->field($model, 'horse_dob',['template' => '{label}{input}<i class="form-note">(Jika hanya ingat tahun, pilih tarikh 01 Jan utk tahun tersebut)</i>{error}
            '])->widget(DatePicker::classname(), [
    'removeButton' => false,
    'disabled' => $d,
    'pluginOptions' => [
        'autoclose'=>true,
        
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true,
        
    ],
    
    
]);
?>


<?php 
                     $d = $model->eam_id && $model->is_confirmed == 1  ? ['disabled' => true] : ['disabled' => false] ;
                     
                     echo $form->field($model, 'eam_id', 
                    )->textInput($d)->label('No. EAM (Jika ada)') ?>


               
<?php
$d = $model->country_born  && $model->is_confirmed == 1  ? ['prompt' => 'Pilih Negara', 'disabled' => 'disabled']  : ['prompt' => 'Pilih Negara'];
 echo $form->field($model, 'country_born')->dropdownlist(Country::getCountryList(), $d)->label('Negara Kelahiran Kuda (Jika ada)');
 

?>
<br />
<?=$form->field($model, 'sky')->hiddenInput(['value' => 1])->label(false)?>
          <div class="form-group">
          <a href="<?=Url::to(['s2edit', 'f' => $daftar->id])?>" class="btn btn-secondary" >KEMBALI</a>  
          <a href="<?=Url::to(['s3kuda-view', 'f' => $daftar->id, 'b' => 1])?>" class="btn btn-warning" >BATAL</a>  
          <button class="btn btn-danger" type="submit">SETERUSNYA</button> 
          
          </div> </div> 



    <?php ActiveForm::end(); ?>
    
                    
                               
                   
                            
                            
                            
                            
                        </div>
                        
                     <!-- row -->
                    </div> 
                </div> <!-- row -->
        
</div>        
            
            