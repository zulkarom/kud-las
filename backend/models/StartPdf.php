<?php

namespace backend\models;

class StartPdf extends \TCPDF {
	
	
	public $image_background = null;
	

    //Page header
    public function Header() {

        if($this->image_background){
            $img_file = $this->image_background;
            $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        }
    }

    // Page footer
    public function Footer() {

    }
}
