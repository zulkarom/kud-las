<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use kartik\grid\GridView;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ParticipantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PENDAFTARAN';
$this->params['breadcrumbs'][] = $this->title;

$exportColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'attribute' => 'id',
        'label' => 'NO. PENDAFTARAN'
    ],
    [
        'label' => 'STATUS',
        'value' => function($model){
            return $model->statusText;
        }
    ],
    [
        'label' => 'VEST NO',
        'value' => function($model){
            if($model->vest){
                return $model->vest->vest_no;
            }
            
        }
    ],
    [
        'label' => 'WARNA VEST',
        'value' => function($model){
            if($model->vest){
                return $model->vest->color;
            }
            
        }
    ],
    [
        'label' => 'KATEGORI',
        'value' => function($model){
            if($model->category){
                return $model->category->category_name;
            }
            
        }
    ],
    [
        'label' => 'NAMA RIDER',
        'value' => function($model){
            if($model->rider){
                return strtoupper($model->rider->rider_name);
            }
        } 
    ],
    [
        'label' => 'NO. KP',
        'contentOptions' => ['cellFormat' => DataType::TYPE_STRING], 
        'value' => function($model){
            return $model->rider->nric;
        }
    ],
    [
        'label' => 'PHONE',
        'value' => function($model){
            return $model->rider_phone;
        }
    ],
    [
        'label' => 'EMAIL',
        'value' => function($model){
            return $model->rider->email;
        }
    ],
    [
        'label' => 'ALAMAT',
        'value' => function($model){
            return $model->rider_address;
        }
    ],
    [
        'label' => 'KELAB/STABLE',
        'value' => function($model){
            return $model->rider_kelab;
        }
    ],
    [
        'label' => 'NAMA KUDA',
        'value' => function($model){
            if($model->horse){
                $k = $model->horse;
                return strtoupper($k->horse_name);
            }
            
        }
    ],
    [
        'label' => 'WARNA KUDA',
        'value' => function($model){
            if($model->horse){
                $k = $model->horse;
                return $k->horse_color;
            }
            
        }
    ],
    [
        'label' => 'JANTINA KUDA',
        'value' => function($model){
            if($model->horse){
                $k = $model->horse;
                return $k->genderShort;
            }
            
        }
    ],
    [
        'label' => 'D.O.B KUDA',
        'value' => function($model){
            if($model->horse){
                $k = $model->horse;
                return date('d/m/Y', strtotime($k->horse_dob));
            }
            
        }
    ],
    [
        'label' => 'NEGARA LAHIR KUDA',
        'value' => function($model){
            if($model->horse){
                $k = $model->horse;
                return $k->countryText;
            }
            
        }
    ],
    [
        'label' => 'NO. EAM',
        'value' => function($model){
            if($model->horse){
                $k = $model->horse;
                return $k->eam_id;
            }
            
        }
    ],
    [
        'label' => 'EKUDALASAK ID',
        'value' => function($model){
            if($model->horse){
                $k = $model->horse;
                return $k->horse_code;
            }
            
        }
    ],
    [
        'label' => 'PARTICULAR OF HORSE',
        'value' => function($model){
            if($model->horse){
                $k = $model->horse;
                $code = strtoupper($k->horse_name). '/' . $k->genderShort . '/' . $k->horse_color . '/' . date('Y', strtotime($k->horse_dob)) ;
                if($k->eam_id){
                    $code .= '/' . $k->eam_id;
                }
                return $code;
            }
            
        }
    ],
    [
        'label' => 'SAIZ BAJU',
        'value' => function($model){
            return $model->rider_size;
        }
    ],
    [
        'label' => 'DEPOSIT',
        'value' => function($model){
            return $model->depositText;
        }
    ],




];


?>
    <div class="form-group" style="text-align:right" align="right"> <?=
        ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $exportColumns,
            'columnSelectorOptions'=>[
                'label' => 'Columns',
                'class' => 'btn btn-success',
                'style'=> 'color:white;',
                //'style'=> 'display:none;', 
            ],
            'fontAwesome' => true,
            'dropdownOptions' => [
                'label' => 'Export Data',
                'class' => 'btn btn-success',
                'style'=> 'color:white;',
            ],
            'filename' => 'DATA PENDAFTARAN',
            'clearBuffers' => true,
            
            'exportConfig' => [
                //ExportMenu::FORMAT_EXCEL_X => false,
                //ExportMenu::FORMAT_EXCEL => false,
                //ExportMenu::FORMAT_HTML => false,
                //ExportMenu::FORMAT_CSV => false,
                ExportMenu::FORMAT_TEXT => false,
                ExportMenu::FORMAT_PDF => false,
            ],
        ]);
    ?> </div>
<div class="card">
  <div class="card-body">

  <?=$this->render('_search', ['model' => $searchModel])?>

  </div> 
    </div>


   

<div class="card">
        <div class="card-body">
            

<div class="competition-index">

<?php $form = ActiveForm::begin(['method' => 'post', 'options'=>['target'=>'_blank'], 'action'=> Url::to(['competition/download-selected'])]); ?>
<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
            'class' => 'yii\bootstrap4\LinkPager',
        ],
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
			    'label' => 'NO.',
                'format' => 'html',
                'value' => function($model){
                    $html = 'ID: ' . $model->id;
                    if($model->vest_id){
                        $html .= '<br /> VEST: ' . $model->vestParticipant->vest_no . '<br />('.$model->vest->color.')';
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
    return $model->category->category_name . '<br />Size: ' . $model->rider_size . '<br />Deposit: ' . $model->depositLabel;
}
                    
                    
                }
                
            ],
            [
                'format' => 'html',
                'attribute' => 'status',
                //'filter' => Html::activeDropDownList($searchModel, 'status', $searchModel->statusArray,['class'=> 'form-control','prompt' => 'Pilih Status']),
                'label' => 'Status',
                'value' => function($model){
                    return $model->statusLabel;
                }
            ],

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {pdf}',
            'buttons'=>[
                'view'=>function ($url, $model) {
                    return Html::a('<span class="fa fa-eye"></span> VIEW',['view', 'id' => $model->id],['class'=>'btn btn-primary btn-sm']);
                },
                'update'=>function ($url, $model) {
                    return Html::a('<span class="fa fa-edit"></span>',['update-vest', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
                },
                'pdf'=>function ($url, $model) {
                    return Html::a('<span class="fa fa-file-pdf"></span>',['download-pdf', 'id' => $model->id],['class'=>'btn btn-danger btn-sm', 'target' => '_blank']);
                }
                ]
            ]
            
            
        ],
    ]); ?></div>

<p>
    <?= Html::submitButton('<i class="fa fa-file-pdf"></i>  DOWNLOAD PDF SELECTED (COMBINED)<span id="pay-selected"></span>', [
    'class' => 'btn btn-danger'
    ]);
    ?>  

</p>

<?php ActiveForm::end(); ?>


</div>
</div>
    </div>