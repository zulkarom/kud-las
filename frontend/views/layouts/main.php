<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
   <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
     <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

  
  <style type="text/css">
  a {
    color: #fff;
    font-weight: bold;
    text-decoration: none;
}
table.table th a {
    color: #212529;
}
  a:hover {
    color: #fff;
    text-decoration:underline;
}

.stroke{
-webkit-text-stroke: 1px black;
}

  .reset-btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    @inlude user-select(none): ;
    border: 1px solid #fe7865;
    padding: 0 35px;
    font-size: 16px;
    line-height: 48px;
    color: #fe7865;
    cursor: pointer;
    z-index: 5;
    -webkit-transition: all 0.4s ease-out 0s;
    -moz-transition: all 0.4s ease-out 0s;
    -ms-transition: all 0.4s ease-out 0s;
    -o-transition: all 0.4s ease-out 0s;
    transition: all 0.4s ease-out 0s;
}
.help-block{
    color:#721c24;
}

.form-group{
    margin-top:18px;
}

.form-note{
    font-size:12px;
}
.small-link{
    font-style: italic;
    color:cornflowerblue;
    font-size: small;
}
  
  </style>
</head>

<body>
   <?php $this->beginBody() ?>

    

   

    <!--====== CONTACT PART START ======-->
    
    <section id="contact" class="contact-area pt-11">
        <div class="container">
        <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="contact-title text-center">
                        <h2 class="title"><a href="<?php echo Url::to(['/'])?>" class="stroke">Pendaftaran Sukan Kuda Lasak</a></h2>
                    </div> <!-- contact title -->
                </div>
            </div> <!-- row -->
            
             
<?php echo $content; ?>

        </div> <!-- container -->
    </section>
    
    <!--====== CONTACT PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
    
    <section id="footer" class="footer-area">
        <div class="container">
             <!-- footer widget -->
            <div class="footer-copyright pt-15 pb-15">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p></p>
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!--  footer copyright -->
        </div> <!-- container -->
    </section>
    
    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TO TOP PART START ======-->
    
    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>
    
    <!--====== BACK TO TOP PART ENDS ======-->
    
    
    
    
    

    


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
