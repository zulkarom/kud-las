<?php

/** @var yii\web\View $this */

use backend\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\UrlRule;
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
                                   Berikut maklumat pendaftaran anda. Sila tekan butang Kemaskini untuk mengemaskini maklumat pendaftaran. Jika sekiranya anda ingin menambah pendaftaran sila klik butang di bawah.
                                </div>

                                <div class="form-group">  <a href="<?=Url::to(['/site/index', 'n' => $model->rider->nric])?>" class="btn btn-secondary" >KEMBALI</a>  
                          <?=Html::a('TAMBAH PENDAFTARAN',['summary', 'f' => $model->id, 'new' => 1], ['class' => 'btn btn-danger'])?>
                        </div>
                            </div> <!-- single info -->
                       
                        </div> <!-- contact info -->
                    </div> 
                    <div class="col-lg-7">

                    <div class="contact-form">
                        
                 
      <?php  
      
      if($semua){
        foreach($semua as $s){
          ?>
          
          <div class="card mt-50">
  <div class="card-body">
    (<?php echo $s->id;?>)<br />
    <b>Maklumat Rider:</b> 

          <?php  
          echo $s->rider->rider_name. ' (' . $s->rider->nric. ') ' . $s->rider_phone . ' ' .
                $s->rider->email . '; Alamat: ' .
                $s->rider->address . '; Kelab: ' .
                $s->rider_kelab ;
          ?>
<?php if($s->horse_id){ ?>
<br /><br />
<b>Maklumat Kuda:</b> 

<?php  
$m = $s->horse;
$html = '';
$g = '';
$g .= $m->horse_name.'/';
$g .= $m->horse_color.'/';
$g .= $m->genderShort;
$html .= strtoupper($g);

if($m->horse_dob){
  $html .= '<br />DOB: ' . date('d/m/Y', strtotime($m->horse_dob));
  if($m->countryText){
    $html .= '@' . $m->countryText;
  }
}
$eam =  $m->eam_id ? $m->eam_id : '-';
$html .= '<br />ID: '. $m->horse_code .'; EAM: '.$eam;
echo $html;
}
?>


<?php  if($s->category_id){ ?>
<br /><br />
<b>Kejohanan:</b> 

<?php  
echo 'Kategory: ' . $s->category->category_name . '; Size: ' . $s->rider_size ;
}
?>
<br /><br />
<a href="<?=Url::to(['s2edit', 'f' => $s->id])?>" class="btn btn-primary">Kemaskini</a>
  </div> 







    </div>   

          <?php


        }
      }
      
      
      
      
      
      
      
      
      ?>
    
                    
                               
                   
                            
                            
                            
                            
                        </div>
                        
                     <!-- row -->
                    </div> 
                </div> <!-- row -->
        
</div>        
            
            