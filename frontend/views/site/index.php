<?php

/** @var yii\web\View $this */

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
    <a class="nav-link active" href="#"><span class="stepnum">1</span> NO.KP</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"><span class="stepnum">2</span></a>
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
                    <div class="col-lg-5">
                        <div class="contact-info pt-25">

                        <?=$this->render('_title', [
            'kejohanan' => $kejohanan,
          ]);
      ?>
                        
                          
                            <div class="mt-30" style="font-size:20px;">
                        
                                <div class="info-content">
                                    Sila taip nombor kad pengenalan anda untuk mula atau sambung proses pendaftaran.

                                    <br /><br />
                                       


                                </div>
                            </div> <!-- single info -->
                       
                        </div> <!-- contact info -->
                    </div> 
                    <div class="col-lg-7">

                    <div class="contact-form">
                        
                        
                            <?php $form = ActiveForm::begin(); ?>
    
     <div class="row">
              <div class="col-lg-12">
                  <div class="single-form form-group">
                     <?= $form->field($model, 'nric', ['template' => '{label}{input}<i class="form-note">(12 digit nombor kad pengenalan tanpa "-")</i>{error}
            '])->textInput(['type' => 'text', 'maxlength' => 12]) ?>



                        </div> <!-- single form -->
                    </div>
                   
                          
                                    <p class="form-message"></p>
                                    <div class="col-lg-12">
                                        <div class="single-form form-group">
                                            <button class="main-btn" type="submit">SETERUSNYA</button> 
                                       
                                        </div> <!-- single form -->
                                    </div>
                                </div> <!-- row -->



    <?php ActiveForm::end(); ?>
    
                    
                               
                   
                            
                            
                            
                            
                        </div>
                        
                     <!-- row -->
                    </div> 
                </div> <!-- row -->
                <div class="row">
    <div class="col-md-6"> <a href="<?=Url::to(['/ecert'])?>"><i class="small-link"><br /><br />Carian e-Sijil Kuda Lasak</i></a></div>
    <div class="col-md-6"></div>
</div>
        
</div>        
            
            