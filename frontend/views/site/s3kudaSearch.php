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
    <a class="nav-link active" href="#"><span class="stepnum">3</span> MAKLUMAT KUDA</a>
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
                                    Sekiranya kuda anda telah pernah berdaftar dengan kejohanan kuda lasak UMK, sila cari & pilih. Taip No. EAM, eKUDALASAK ID atau nama kuda (keywords)
                                </div>
                            </div> <!-- single info -->

                            <div class="mt-30" style="font-size:20px;">
                        
                        <div class="info-content">
                            Jika belum pernah berdaftar sila daftar kuda anda.
                        </div>
                        <div class="form-group">
                          <?=Html::a('DAFTAR KUDA',['s3kuda', 'f' => $daftar->id], ['class' => 'btn btn-danger'])?>
                        </div>
                    </div> 
                       
                        </div> <!-- contact info -->
                    </div> 
                    <div class="col-lg-7">

                    <div class="contact-form">
                        
                        
                    <?php $form = ActiveForm::begin([
        'method' => 'get',
    ]); ?>
    
     <div class="row">
                       
                                    <div class="col-lg-12">
                                        <div class="single-form form-group">
                                            <?php  echo $form->field($model, 'str_search', [
                    'template' => '{input}{error}',
                    'options' => [
                        'tag' => false, // Don't wrap with "form-group" div
                    ]]
                                                )->textInput(['placeholder' => "NO. EAM, EKUDALASAK ID, NAMA KUDA"])->label(false) ?>
                                        </div> <!-- single form -->
                                    </div>
                          
                                    <p class="form-message"></p>
                                    <div class="col-lg-12">
                                        <div class="single-form form-group">
                                            <button class="main-btn" type="submit">CARI</button> 
                                            <a href="<?php echo Url::to(['s2edit', 'f' => $daftar->id])?>" class="reset-btn" >KEMBALI</a>
                                        </div> <!-- single form -->
                                    </div>
                                </div> <!-- row -->



    <?php ActiveForm::end(); ?>
    
    <br /><br />
            
              <?php
              
              if($result){
              echo GridView::widget([
        'dataProvider' => $dataProvider,
                  'pager' => [
                      'class' => 'yii\bootstrap4\LinkPager',
                  ],
                  
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'horse_name',
                'label' => 'Maklumat Kuda',
                'format' => 'html',
                'value' => function($model){
                  $html = '';
                  $s = '';
                  $s .= $model->horse_name.'/';
                  $s .= $model->horse_color.'/';
                  $s .= $model->genderShort;
                  $html .= strtoupper($s);

                  if($model->horse_dob){
                    $html .= '<br />DOB: ' . date('d/m/Y', strtotime($model->horse_dob));
                    if($model->countryText){
                      $html .= '@' . $model->countryText;
                    }
                  }
                  if($model->lastRider){
                    $html .= '<br /> PRV RIDER: ' . strtoupper($model->lastRider);
                  }
                  $eam =  $model->eam_id ? $model->eam_id : '-';
                  $html .= '<br />ID: '. $model->horse_code .'; EAM: '.$eam.'<br />';
                  

                    return $html;
                    
                }
            ],
            
            ['class' => 'yii\grid\ActionColumn',
                 'contentOptions' => ['style' => 'width: 13%'],
                'template' => '{view}',
                //'visible' => false,
                'buttons'=>[
                    'view'=>function ($url, $model)use($daftar) {
                        return Html::a('PILIH', 
                            ['s3kuda-search', 'f' => $daftar->id, 'h' => $model->id], ['class'=>'btn btn-primary btn-sm']);
                    },
 
                ],
            
            ],
        ],
    ]); 
                    
              
              
              } ?>
                               
                   
                            
                            
                            
                            
                        </div>
                        
                     <!-- row -->
                    </div>
                        
                     <!-- row -->
                    </div> 
                </div> <!-- row -->
        
</div>        
            
            