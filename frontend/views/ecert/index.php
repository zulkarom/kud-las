<?php

/** @var yii\web\View $this */

use backend\models\Rider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'e-SIJIL KUDA LASAK';
?>

            
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info pt-25">
                            <h4 class="info-title">Carian Sijil</h4>
                          
                                    <div class="mt-30" style="font-size:20px;">
                                
                                        <div class="info-content">
                                            Sila taip nama <i>rider</i> dan nama kuda (keywords)
                                        </div>
                                    </div> <!-- single info -->
                       
                        </div> <!-- contact info -->
                    </div> 
                    <div class="col-lg-8">
                        <div class="contact-form">
                        
                        
                            <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
     <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single-form form-group">
                                            <?= $form->field($model, 'rider_name', [
                    'template' => '{input}{error}',
                    'options' => [
                        'tag' => false, // Don't wrap with "form-group" div
                    ]]
                                                )->textInput(['placeholder' => "NAMA RIDER", 'required' => true])->label(false) ?>
                                        </div> <!-- single form -->
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-form form-group">
                                            <?php  echo $form->field($model, 'horse_name', [
                    'template' => '{input}{error}',
                    'options' => [
                        'tag' => false, // Don't wrap with "form-group" div
                    ]]
                                                )->textInput(['placeholder' => "NAMA KUDA"])->label(false) ?>
                                        </div> <!-- single form -->
                                    </div>
                          
                                    <p class="form-message"></p>
                                    <div class="col-lg-12">
                                        <div class="single-form form-group">
                                            <button class="main-btn" type="submit">SEARCH</button> 
                                            <a href="<?php echo Url::to(['/'])?>" class="reset-btn" >RESET</a>
                                        </div> <!-- single form -->
                                    </div>
                                </div> <!-- row -->



    <?php ActiveForm::end(); ?>
    
                    
                               
                   
                            
                            
                            
                            
                        </div> <!-- row -->
                    </div> 
                </div> <!-- row -->
        
            
            
            
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
            'riderName',
            
            'horseName',
            ['class' => 'yii\grid\ActionColumn',
                 'contentOptions' => ['style' => 'width: 13%'],
                'template' => '{view}',
                //'visible' => false,
                'buttons'=>[
                    'view'=>function ($url, $model) {
                        return Html::a('VIEW', 
                            ['view', 'id' => $model->id], ['class'=>'btn btn-primary btn-sm']);
                    },
 
                ],
            
            ],
        ],
    ]); 
                    
              
              
              } ?>
            
            
             