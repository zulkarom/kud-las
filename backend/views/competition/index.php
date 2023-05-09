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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
                    $model=$model->horse;
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
         
                  $eam =  $model->eam_id ? $model->eam_id : '-';
                  $html .= '<br />ID: '. $model->horse_code .'; EAM: '.$eam.'<br />';
                  

                    return $html;
                    
                }
                
            ],
            [
                'attribute' => 'category_id',
			    'label' => 'Kategori',
                'format' => 'html',
                'value' => function($model){

                    return $model->category->category_name;
                    
                }
                
            ],

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update}',
            'buttons'=>[
                'update'=>function ($url, $model) {
                    return Html::a('<span class="fa fa-eye"></span> VIEW',['view', 'id' => $model->id],['class'=>'btn btn-primary btn-sm']);
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
    ]); ?>


</div>
</div>
    </div>