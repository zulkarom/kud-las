<?php

/** @var yii\web\View $this */

use backend\models\Category;
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
    <a class="nav-link" href="#"><span class="stepnum">3</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="#"><span class="stepnum">4</span> DAFTAR</a>
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
                                    Sila masukkan maklumat kejohanan yang anda ingin sertai
                                </div>
                            </div> <!-- single info -->
                       
                        </div> <!-- contact info -->
                    </div> 
                    <div class="col-lg-7">

                    <div class="contact-form">
                        
                        
                            <?php $form = ActiveForm::begin(); ?>
    
<?php
 echo $form->field($model, 'category_id')->dropdownlist(Category::getCategoryList(), ['prompt' => 'Pilih Kategori']);

?>

<?php
$size = ['XS', 'S', 'M','L', 'XL', 'XXL'];
$a=[];
foreach($size as $s){
  $a[$s] = $s;
}
 echo $form->field($model, 'rider_size')->dropdownlist($a, ['prompt' => 'Pilih Saiz']);

?>
<div class="form-group">PERAKUAN:
DENGAN MENGHANTAR (SUBMIT) BORANG INI SECARA ONLINE: Saya menyatakan bahawa: Saya telah membaca dan memahami jadual pertandingan dan saya menjanji untuk mematuhi semua peraturan pertandingan. Saya membebaskan JAWATANKUASA PENGANJUR dari segala tanggungjawab untuk kemalangan yang mungkin berlaku pada penunggang, kuda atau pembantu semasa tempoh pertandingan.</div>

<br />
        
          <div class="form-group">
          <a href="<?=Url::to(['s3kuda-view', 'f' => $model->id])?>" class="btn btn-secondary" >KEMBALI</a>  <button class="btn btn-danger" type="submit">HANTAR PENDAFTARAN</button> 
          
          </div> </div> 



    <?php ActiveForm::end(); ?>
    
                    
                               
                   
                            
                            
                            
                            
                        </div>
                        
                     <!-- row -->
                    </div> 
                </div> <!-- row -->
        
</div>        
            
            