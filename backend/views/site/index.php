<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'DASHBOARD';

?>

<div class="site-index">
<?php if($kejohanan){?>
<section class="content">
      <div class="container-fluid">
        <h4><i class="fas fa-trophy"></i> <?=$kejohanan->name;?></h4>
        <br />
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $kejohanan->countCategories()?></h3>

                <p> Categories</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $kejohanan->countParticipantByStatus(100)?></h3>

                <p>Total Submit</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $kejohanan->countParticipantByStatus(0)?></h3>

                <p>Total Draft</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $kejohanan->countParticipantByStatus(10)?></h3>

                <p>Total Withdraw</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>


        <div class="card">
  <div class="card-body">
  <div class="table-responsive">
<table class="table table-bordered table-striped">
<thead>
    <tr>
        <th>Categories</th>
        <th>Layak Sijil Kejayaan</th>
        <th>Tidak Layak</th>
        <th>Jumlah</th>
    </tr>
</thead>
<tbody>
<?php 
$total_layak = $kejohanan->countAchieve();
$total_xlayak = $kejohanan->countAchieve(0);
$gtotal = $total_layak + $total_xlayak;
if($kejohanan->certs){
    foreach($kejohanan->certs as $cert){
        $layak = $cert->countAchieveByCategory();
        $xlayak = $cert->countAchieveByCategory(0);
        $total = $layak + $xlayak;
        echo '<tr>
        <td>'. $cert->category->category_name .'</td>
        <td>'.$layak   .'</td>
        <td>'.$xlayak  .'</td>
        <td><b>'.$total  .'</b></td>
        </tr>';
    }
}


?>

<tr>
<td><i>Jumlah</i></td>
        <td><b><?=$total_layak?></b></td>
        <td><b><?=$total_xlayak?></b></td>
        
        <td><b><?=$gtotal?></b></td>
        </tr>
 
</tbody>
</table>

</div>


  </div> 
    </div>



        
       
      </div><!-- /.container-fluid -->
    </section>

   <?php } ?>
</div>
