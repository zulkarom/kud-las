<?php

use backend\models\Vest;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\VestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Assign Vests';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="vest-index">



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="card">
    <div class="card-header">
    <h3 class="card-title">
<?=$kejohanan->name; ?>
</h3>


  </div>
  <div class="card-body">

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Kategory</th>
                <th>Vest Color</th>
                <th>Assigned Count</th>
                <th>Unassigned Count</th>
                <th>Bulk Assign</th>
                <th>Reset/Re-assign</th>
            </tr>
        </thead>
    <tbody>

        <?php
        if($list){
            $i=1;
            foreach($list as $item){
                echo '<tr><td>'.$i.'</td>
                <td>'.$item->category_name.'</td>
                <td>'.$item->colorLabel.'</td>
                <td>'.$item->count_assigned.'</td>
                <td>'.$item->count_unassigned.'</td>
                <td><a href="'.Url::to(['run-unassigned', 'cat' => $item->id]).'" class="btn btn-primary btn-sm">Run for Unassigned only</a></td>
                <td><a href="'.Url::to(['reset-all', 'cat' => $item->id]).'" class="btn btn-danger btn-sm">Reset</a> <a href="'.Url::to(['reassign-all', 'cat' => $item->id]).'" class="btn btn-danger btn-sm">Re-assign All</a></td>
                </tr>';
                $i++;
            }
        }
        ?>

    </tbody>
</table>
</div>


  </div> 
    </div>
   


</div>
