<?php

/** @var yii\web\View $this */

$this->title = 'e-SIJIL KUDA LASAK';
?>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="contact-title text-center">
                        <h2 class="title" style="color:white">e-SIJIL KUDA LASAK</h2>
                    </div> <!-- contact title -->
                </div>
            </div> <!-- row -->
            <div class="contact-box mt-15">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info pt-25">
                            <h4 class="info-title">Carian Sijil</h4>
                          
                                    <div class="mt-30" style="font-size:20px;">
                                
                                        <div class="info-content">
                                            Sila taip nama pemilik dan nama kuda (keywords)
                                        </div>
                                    </div> <!-- single info -->
                       
                        </div> <!-- contact info -->
                    </div> 
                    <div class="col-lg-8">
                        <div class="contact-form">
                            <form id="contact-form" action="test/contact.php" method="post" data-toggle="validator">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single-form form-group">
                                            <input type="text" name="pemilik" placeholder="NAMA PEMILIK" data-error="Sila isi nama pemilik." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-form form-group">
                                            <input type="text" name="kuda" placeholder="NAMA KUDA">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                          
                                    <p class="form-message"></p>
                                    <div class="col-lg-12">
                                        <div class="single-form form-group">
                                            <button class="main-btn" type="submit">CARI</button>
                                        </div> <!-- single form -->
                                    </div>
                                </div> <!-- row -->
                            </form>
                        </div> <!-- row -->
                    </div> 
                </div> <!-- row -->
            </div> <!-- contact box -->