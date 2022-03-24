<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Rider */

$this->title = 'View: ' . $model->rider_name;
$this->params['breadcrumbs'][] = ['label' => 'Riders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rider-view">

    <h3><?= Html::encode($model->rider_name) ?></h3>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
          <?= Html::a('SIJIL PENYERTAAN', ['cert-participation', 'id' => $model->id], ['class' => 'btn btn-warning', 'target' => '_blank']) ?>
          
            <?php  
            if($model->cert_achive == 1){
                echo Html::a('SIJIL KEJAYAAN', ['cert-achievement', 'id' => $model->id], ['class' => 'btn btn-success', 'target' => '_blank']);
            }
            ?>
  
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'riderName',
            'horseName',
            'nric',
            'phone',
            
            
            'email:email',
            'address',
            
            'horse_dob',
            'horse_color',
            'horse_gender',
            'country_born',
            'kelab',
            'hadlaju',
            'jarak',
            'achieveText',
            'statusText',
        ],
    ]) ?>
    <br />
     <p>

        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
