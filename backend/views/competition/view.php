<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Competition */

$this->title = $model->rider->rider_name;
$this->params['breadcrumbs'][] = ['label' => 'Pendaftaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="competition-view">


<div class="row">
    <div class="col-md-6">

    <div class="card">



    <div class="card-header">
    <h3 class="card-title">
MAKLUMAT RIDER
</h3>


  </div>
  <div class="card-body">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
			    'label' => 'NAMA',
                'value' => function($model){
                    return $model->rider->rider_name ;
                } 
            ],
            [
			    'label' => 'NO. K/P',
                'value' => function($model){
                    return $model->rider->nric ;
                } 
            ],
            [
			    'label' => 'NO. TELEFON',
                'value' => function($model){
                    return $model->rider_phone ;
                } 
            ],
            [
			    'label' => 'EMAIL',
                'value' => function($model){
                    return $model->rider->email ;
                } 
            ],
            [
			    'label' => 'ALAMAT',
                'value' => function($model){
                    return $model->rider->address ;
                } 
            ],
            [
			    'label' => 'KELAB/STABLE',
                'value' => function($model){
                    return $model->rider_kelab ;
                } 
            ],
        ],
    ]) ?>

  </div></div>




  <div class="card">



<div class="card-header">
<h3 class="card-title">
MAKLUMAT KUDA
</h3>


</div>
<div class="card-body">


<?php 


if($model->horse){
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'label' => 'NAMA KUDA',
            'value' => function($model){
                return $model->horse->horse_name ;
            } 
        ],
        [
            'label' => 'WARNA KUDA',
            'value' => function($model){
                return $model->horse->horse_color ;
            } 
        ],
        [
            'label' => 'TARIKH LAHIR KUDA',
            'value' => function($model){
                return $model->horse->horse_dob ? date('d/m/Y', strtotime($model->horse->horse_dob)): '' ;
            } 
        ],
        [
            'label' => 'JANTINA KUDA',
            'value' => function($model){
                return $model->horse->genderShort ;
            } 
        ],
        [
            'label' => 'NEGARA KELAHIRAN KUDA',
            'value' => function($model){
                return $model->horse->countryText ;
            } 
        ],
        [
            'label' => 'EKUDALASAK ID',
            'value' => function($model){
                return $model->horse->horse_code ;
            } 
        ],
        [
            'label' => 'NO.EAM',
            'value' => function($model){
                return $model->horse->eam_id ;
            } 
        ],
    ],
]);

}

?>

</div></div>




</div>





    <div class="col-md-6">

    <div class="card">



<div class="card-header">
<h3 class="card-title">
MAKLUMAT KEJOHANAN
</h3>


</div>
<div class="card-body">


<?php 

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'label' => 'NO. PENDAFTARAN',
            'value' => function($model){
                    return $model->id;
                
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
        [
            'label' => 'ACTION',
            'format' => 'raw',
            'value' => function($model){
                if($model->register_status == 100){
                    return Html::a('<i class="fas fa-arrow-left"></i> Return this form', ['return-form', 'id' => $model->id], ['class' => 'btn btn-warning btn-sm', 'data-confirm' => 'Are you sure to return this form?']);
                }else{
                    return '-';
                }
                
            } 
        ],


    ],
]);

?>

</div></div>

<div class="card">
<div class="card-header">
<h3 class="card-title">
MAKLUMAT VEST & DEPOSIT
</h3>


</div>
<div class="card-body">

<?php 
if($model->register_status == 100) {
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'NO. VEST',
                'value' => function ($model) {
                    if($model->vest){
                        return $model->vest->vest_no;
                    }
                    

                }
            ],
            [
                'label' => 'COLOR',
                'format' => 'html',
                'value' => function ($model) {
                    if($model->vest){
                        return $model->vest->colorLabel;
                    }
                    

                }
            ],
            [
                'label' => 'DEPOSIT',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->depositLabel;

                }
            ],
           /*  [
                'label' => 'ACTION',
                'format' => 'raw',
                'value' => function ($model) {
                    if($model->register_status == 100) {
                        return Html::a('<i class="fas fa-edit"></i> Update', ['update-vest', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']);
                    } else {
                        return '-';
                    }

                }
            ],
 */

        ],
    ]);
}
?>

</div></div>

<a href="<?=Url::to(['update-vest', 'id' => $model->id])?>" class="btn btn-warning"><i class="fa fa-edit"></i> KEMASKINI</a>
<a href="<?=Url::to(['delete-all', 'id' => $model->id])?>" class="btn btn-danger" data-confirm="Are you sure to delete? This action cannot be undone!">DELETE REGISTRATION + RIDER* + KUDA*</a><br />
* bergantung klu kebergantungan foreign key
    
    </div>
</div>


</div>
