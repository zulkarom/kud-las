<?php

use backend\models\Competition;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompetitionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PENDAFTARAN';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
        <div class="card-body">
            

<div class="competition-index">

<?=$this->render('_search', ['model' => $searchModel])?>
<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
            'class' => 'yii\bootstrap4\LinkPager',
        ],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
			    'label' => 'NO.',
                'format' => 'html',
                'value' => function($model){
                    $html = 'ID: ' . $model->id;
                    if($model->vest_id){
                        $html .= '<br /> VEST: ' . $model->vest->vest_no . '<br />('.$model->vest->color.')';
                    }
                    return $html;
                }
                
            ],
            [
                'attribute' => 'rider_id',
			    'label' => 'Maklumat Rider',
                'format' => 'html',
                'value' => function($model){
                    $html = '';
                    $html .= $model->rider->rider_name . ' ('.$model->rider->nric.')';
                    $html .= '<br />' . $model->rider_phone . ' ' . $model->rider_address;
                    return $html;
                    
                }
                
            ],
            [
                'attribute' => 'horse_id',
			    'label' => 'Maklumat Kuda',
                'format' => 'html',
                'value' => function($model){
                    $html = '';
                    if($model->horse){
                    $model=$model->horse;
                   
                    
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
         
                  $eam =  $model->eam_id ? $model->eam_id : '-';
                  $html .= '<br />ID: '. $model->horse_code .'; EAM: '.$eam.'<br />';
                  
                }
                    return $html;
                    
                }
                
            ],
            [
                'attribute' => 'category_id',
			    'label' => 'Kategori',
                'format' => 'html',
                'value' => function($model){
if($model->category){
    return $model->category->category_name . '<br />Size: ' . $model->rider_size;
}
                    
                    
                }
                
            ],
            [
                'format' => 'html',
                'attribute' => 'status',
                'filter' => Html::activeDropDownList($searchModel, 'status', $searchModel->statusArray,['class'=> 'form-control','prompt' => 'Pilih Status']),
                'label' => 'Status',
                'value' => function($model){
                    return $model->statusLabel;
                }
            ],

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update} {pdf}',
            'buttons'=>[
                'update'=>function ($url, $model) {
                    return Html::a('<span class="fa fa-eye"></span> VIEW',['view', 'id' => $model->id],['class'=>'btn btn-primary btn-sm']);
                },
                'pdf'=>function ($url, $model) {
                    return Html::a('<span class="fa fa-pdf"></span> PDF',['download-pdf', 'id' => $model->id],['class'=>'btn btn-danger btn-sm', 'target' => '_blank']);
                }
                ]
            ]
            
            //'hadlaju',
            //'jarak',
            //'cert_achive',
            //'status',
            //'register_at',
            //'register_status',
            
        ],
    ]); ?></div>


</div>
</div>
    </div>