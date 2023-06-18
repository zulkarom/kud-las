<?php

use backend\models\Category;
use yii\helpers\Html;
use kartik\date\DatePicker;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Kejohanan */

$this->title = 'Add Certificate';
$this->params['breadcrumbs'][] = ['label' => $model->kejohanan->name, 'url' => ['view', 'id' => $model->kejohanan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>


<?= $this->render('_form_cert', [
        'model' => $model,
    ]) ?>
