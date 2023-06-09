<?php

/** @var yii\web\View $this */

use backend\models\Rider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
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
    <a class="nav-link active" href="#"><span class="stepnum">2</span> RIDER</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"><span class="stepnum">3</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="#"><span class="stepnum">4</span></a>
  </li>
</ul>

<div class="contact-box">




                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info pt-25">
                          
      <?=$this->render('_title', [
            'kejohanan' => $kejohanan,
          ]);
      ?>
                        
                          
                            <div class="mt-30" style="font-size:20px;">
                        
                                <div class="info-content">
                                    Sila masukkan maklumat rider.
                                </div>
                            </div> <!-- single info -->
                       
                        </div> <!-- contact info -->
                    </div> 
                    <div class="col-lg-8">

                    <div class="contact-form">
                        
                        
                            <?php $form = ActiveForm::begin(); ?>
    
     <div class="row">
     <div class="col-lg-12">
                  <div class="single-form form-group">
                     <?= $form->field($model, 'rider_name', 
                    )->textInput()->label('Nama Penuh Rider (Nama atas sijil)') ?>



                        </div> <!-- single form -->
                    </div>
              <div class="col-lg-12">
                  <div class="single-form form-group">
                     <?= $form->field($model, 'nric', 
                    )->textInput(['disabled' => true]) ?>



                        </div> <!-- single form -->
                    </div>
                    <div class="col-lg-12">
                  <div class="single-form form-group">
                     <?= $form->field($model, 'email', 
                    )->textInput() ?>
                  </div>
                    </div>

<div class="col-lg-12">
                  <div class="single-form form-group">
                     <?= $form->field($model, 'phone', 
                    )->textInput() ?>



                        </div> <!-- single form -->
                    </div>

                    <div class="col-lg-12">
                  <div class="single-form form-group">
                     <?= $form->field($model, 'address', 
                    )->textarea(['rows' => 2]) ?>



                        </div> <!-- single form -->
                    </div>

                    <div class="col-lg-12">
                  <div class="single-form form-group">
                     <?= $form->field($model, 'kelab', 
                    )->textInput() ?>



                        </div> <!-- single form -->
                    </div>

                    <div class="col-lg-12">
                  <div class="single-form form-group">
                     <?= $form->field($model, 'eam_member_no', 
                    )->textInput() ?>



                        </div> <!-- single form -->
                    </div>

                   
                          
                                    <p class="form-message"></p>
                                    <div class="col-lg-12">
                                        <div class="single-form form-group">
                                        <a href="<?=Url::to(['/site/index', 'n' => $model->nric])?>" class="btn btn-secondary" >KEMBALI</a>  <button class="btn btn-danger" type="submit">SETERUSNYA</button> 
                                       
                                        </div> <!-- single form -->
                                    </div>
                                </div> <!-- row -->



    <?php ActiveForm::end(); ?>
    
                    
                               
                   
                            
                            
                            
                            
                        </div>
                        
                     <!-- row -->
                    </div> 
                </div> <!-- row -->
        
</div>        
            
            