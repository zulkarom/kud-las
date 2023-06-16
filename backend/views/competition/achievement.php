<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use kartik\grid\GridView;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompetitionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PENCAPAIAN';
$this->params['breadcrumbs'][] = $this->title;
?>
   

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
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'vest_no',
			    'label' => 'VEST',
                'value' => function($model){
                    if($model->vest){
                        return $model->vest->vest_no;
                    }else{
                        return '-';
                    }
                    
                }
            ],
            [
                'attribute' => 'rider_id',
			    'label' => 'RIDER',
                'value' => function($model){
                    $html = '';
                    return $model->rider->rider_name;
                }
                
            ],
            [
                'attribute' => 'rider_id',
			    'label' => 'NO.KP',
                'value' => function($model){
                    $html = '';
                    return $model->rider->nric;
                }
                
            ],
            [
                'attribute' => 'horse_id',
			    'label' => 'KUDA',
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
                  
                }
                    return $html;
                    
                }
                
            ],
            [
                'attribute' => 'category_id',
			    'label' => 'KATEGORI',
                'format' => 'html',
                'value' => function($model){
                    if($model->category){
                        return $model->category->category_name;
                    }
                    
                    
                }
                
            ],
    [
        'label' => 'LAYAK',
        'format' => 'raw',
        'value' => function($model){
            $check = $model->cert_achive == 1 ? 'checked ': '';

            return '<input type="checkbox" '.$check.'data-toggle="toggle" data-on="YES" data-off="NO" data-onstyle="success" data-competition="'.$model->id.'" data-offstyle="danger" data-size="sm" class="achbtn">';
        }
    ],
            [
			    'label' => 'KELAJUAN',
                'format' => 'raw',
                'value' => function($model){
                    return '<input type="test" class="form-control input-laju" style="width:100px" value="'. $model->hadlaju .'"  data-competition="'.$model->id.'">';
                    //add to class is-valid or is-warning is-invalid
                }
            ],
        ],
    ]); 
    

    $csrfToken = Yii::$app->request->getCsrfToken();

    $this->registerJs('

    $(".input-laju").blur(function() {
        let chk = $(this);
        var val = chk.val();
        var comp = $(this).data("competition");
        ajaxLaju(val, chk, comp);
    });

    $(".achbtn").change(function() {
        let chk = $(this);
        var val = chk.prop("checked");
        var vstatus = 0;
        if(val){
            console.log(val)
            vstatus = 1;
        }

        var comp = $(this).data("competition");
        console.log(comp);
        ajaxSubmit(vstatus, chk, comp);
      });

      function ajaxSubmit(val, chk, comp){
        $.ajax({url: "'. Url::to(['achievement-change']) .'", 
        timeout: 3000,   
        type: "POST", 
        data: { 
            astatus: val,
            competition: comp,
        },
        success: function(result){
            console.log(result);
            if(result == 0){
                reverseChk(val, chk);
            }
        },
        error: function (jqXhr, textStatus, errorMessage) { 
            // reverse
            reverseChk(val, chk);
        }
      });
    }

    function reverseChk(val, chk){
        val == 1 ? chk.bootstrapToggle("off", true) : chk.bootstrapToggle("on", true);
    }

    function ajaxLaju(val, chk, comp){
        chk.addClass("is-warning");
        $.ajax({url: "'. Url::to(['achievement-laju']) .'", 
        timeout: 3000,   
        type: "POST", 
        data: { 
            kelajuan: val,
            competition: comp,
        },
        success: function(result){
            console.log(result);
            if(result == 1){
                chk.removeClass("is-warning");
                chk.removeClass("is-invalid");
                chk.addClass("is-valid");
            }else{
                lajuError(chk);
            }
        },
        error: function (jqXhr, textStatus, errorMessage) {
            lajuError(chk)
        }
      });
    }

    

    function lajuError(chk){
        chk.removeClass("is-warning");
        chk.addClass("is-invalid");
    }

      
    
    ');

    
    
    
    ?></div>


<?php ActiveForm::end(); ?>


</div>
</div>
    </div>