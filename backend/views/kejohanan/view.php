<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kejohanan */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Kejohanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
table.detail-view th {
    width:20%;
}
</style>
<div class="kejohanan-view">
    

    <div class="card">
  <div class="card-body">

  <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'attribute' => 'date_start',
			    'label' => 'Date',
                'format' => 'html',
                'value' => function($model){
                    return $model->dateStartEndFormat();
                }
                
            ],
            'location',
            [
                'format' => 'html',
                'attribute' => 'is_active',
                'label' => 'Status',
                'value' => function($model){
                    return $model->statusLabel;
                }
            ],
            'date_vest:date',
            [
                'label' => 'Deposit',
                'value' => function($model){
                    return 'RM ' . number_format($model->deposit_amount,2);
                }
            ],
            'cert_publish_at:date',
            [
                'label' => 'Participant Cert Template',
                'format' => 'raw',
                'value' => function($model){
                    if(!$model->isNewRecord && $model->cert_participant){
                        return Html::img(Url::to(['download-file','id' => $model->id]),['width' => '20%']);
                        }
                }
            ],
        ],
    ]) ?>

  </div> 
    </div>

   

    <div class="row">
    <div class="col-md-6">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Tambah Sijil Kejayaan', ['cert-add', 'id' => $model->id], ['class' => 'btn btn-secondary']) ?>
        
        <?php 
        if($model->is_active == 0){ echo Html::a('Make Active', ['make-active', 'id' => $model->id], ['class' => 'btn btn-success']);
        }?>
    </p>


    </div>
    <div class="col-md-6" align="right">


    <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->id], [
            'data' => [
                'confirm' => 'Are you sure you want to delete this [kejohanan]?',
                'method' => 'post',
            ],
        ]) ?>

    </div>
</div>



<div class="card">
  <div class="card-body">

  <table class="table">
<thead>
    <tr>
        <th>Category</th>
        <th>Template</th>
        <th></th>
    </tr>
</thead>
<tbody>
<?php 

if($certs){
    foreach($certs as $cert){
        echo '<tr>
        <td width="20%"><a href="'.Url::to(['cert-update', 'id' => $cert->id]).'">'. $cert->category->category_name .'</a></td>
        <td>';

        if($cert->certificate_file){
            echo Html::img(Url::to(['download-cert-file','id' => $cert->id]),['width' => '20%']);
            }
        
        
        echo '</td>
        <td><a href="'.Url::to(['cert-delete', 'id' => $cert->id]).'" data-confirm="Are you sure to delete this cert?"><i class="fa fa-trash"></i></a></td>
        </tr>';
    }
}

?>
    
</tbody>
</table>


  </div> 
    </div>






</div>

