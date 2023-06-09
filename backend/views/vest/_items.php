<?php 
use yii\helpers\Url; 
$color = '';
$status = '';
if($model->status == 0){
    $color = '#cccccc';
    $status = 'Missing/Damaged';
}else{
    $color = $model->colorCode();
    if($model->competition){
        if($model->competition->rider){
            $status = $model->competition->rider->rider_name;
        }
    }
}
?>
<div class="col-md-2 col-xs-6 col-sm-6">


    <div class="card"  style="min-height:230px;background-color:<?=$color?>">
       
        <div class="card-body" style="text-align:center; vertical-align:middle;;font-size:20px">

<a href="<?=Url::to(['update', 'id' => $model->id])?>" style="color:white">
VEST NO.
<h1><?=$model->vest_no?></h1></a>
<hr />


<span style="font-style: italic;font-size:small; color:white"><?=$status?></span>

            </div>
        </div>
    </div>