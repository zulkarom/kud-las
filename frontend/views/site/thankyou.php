<?php

/** @var yii\web\View $this */

use backend\models\Category;
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


<div class="contact-box">




                <div class="row">
                    <div class="col-lg-5">
                        <div class="contact-info pt-25">

                        <h4 class="info-title"><?=$kejohanan->name?></h4>
                        <p><?=$kejohanan->dateStartEndFormat()?></p>
                        
                          
                            <div class="mt-30" style="font-size:20px;">
                        
                                <div class="info-content">
                                <i class="fa fa-check"></i> Terima kasih, pendaftaran anda telah berjaya dihantar.
                                </div>
                                <br /><br />
                                <a href="<?=Url::to(['/']) ?>" class="btn btn-secondary">Kembali ke Halaman Utama</a>
                            </div> <!-- single info -->
                       
                        </div> <!-- contact info -->
                    </div> 
                    <div class="col-lg-7">

                    <div class="contact-form">
                        
      
                    <div class="card mt-50">
  <div class="card-body">
    <?php $s = $model;?>
    No. Pendaftaran: <?php echo $s->id;?><br />
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
<?php 

/* <a href="<?=Url::to(['download-pdf', 'f' => $s->id])?>" target="_blank" class="btn btn-danger">Download PDF</a> */

?>

  </div> 







    </div>   

                    
                               
                   
                            
                            
                            
                            
                        </div>
                        
                     <!-- row -->
                    </div> 
                </div> <!-- row -->
        
</div>        
            
            