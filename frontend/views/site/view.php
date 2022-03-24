<?php

use common\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Rider */

$this->title = $model->riderName;
$this->params['breadcrumbs'][] = ['label' => 'Riders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rider-view">

    <h4 class="info-title mb-15">MAKLUMAT PESERTA</h4>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'riderName',
            'horseName',
            'horseColor',
            'kelab'

        ],
    ]) ?>
    <?= Alert::widget() ?>
    <br />
    
    <h4 class="info-title mb-15">MUAT TURUN</h4>
    <p>Sila masukkan no. kad pengenalan dan tekan butang sijil untuk muat turun</p>
    
    
<?php $form = ActiveForm::begin(); ?>

<div class="row">
	<div class="col-md-6"> <?= $form->field($download, 'nric')->textInput(['placeholder' => 'NO. KAD PENGENALAN'])->label(false) ?></div>
	<div class="col-md-6"></div>
</div>

   
    
    <br />
<div class="form-group">
        
<?= Html::submitButton('SIJIL PENYERTAAN', ['class' => 'btn btn-warning', 'name' => 'jenis', 'value' => 1]) ?> 
<?php 

if($model->cert_achive == 1){
    echo Html::submitButton('SIJIL KEJAYAAN', ['class' => 'btn btn-success', 'name' => 'jenis', 'value' => 2]) ;
}
?>
    </div>

    <?php ActiveForm::end(); ?>
    

</div>
