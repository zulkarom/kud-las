<?php

namespace backend\models;

class CertParticipation
{
	public $model;
	public $pdf;
	public $filename;
	public $frontend = false;

	
	public function generatePdf(){

		$this->pdf = new StartPdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		if($this->frontend){
		    $this->pdf->image_background = 'admin/images/cert-participation.jpg';
		}else{
		    $this->pdf->image_background = 'images/cert-participation.jpg';
		}
		$this->startPage();
		$this->writeData();
		$this->pdf->Output($this->filename .'.pdf', 'I'); 
        
	}

	public function writeData(){

		$this->pdf->SetFont('helvetica','b', 17);
		$html ='<table border="0"> 
<tr>
<td height="490"></td>

</tr>
<tr>
<td align="center" style="color:#231644">'. $this->model->riderName . '</td>

</tr>
</table>';
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
	}
	
	
	public function startPage(){
		// set document information
		
	    $title = $this->model->riderName;
	    $title = str_replace(' ', '_', $title);
	    $title = 'SIJIL_KEJAYAAN_'.$title;
	    $this->filename = $title;
	    
	    
		$this->pdf->SetCreator(PDF_CREATOR);
		$this->pdf->SetAuthor('KUDA LASAK');
		$this->pdf->SetTitle($title);
		$this->pdf->SetSubject($title);
		$this->pdf->SetKeywords('');

		// set default header data
		$this->pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		//$this->pdf->writeHTML("<strong>hai</strong>", true, 0, true, true);
		// set header and footer fonts
		$this->pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$this->pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		//$this->pdf->SetMargins(25, 10, PDF_MARGIN_RIGHT);
		$this->pdf->SetMargins(0, 0, 0);
		//$this->pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$this->pdf->SetHeaderMargin(0);

		 //$this->pdf->SetHeaderMargin(0, 0, 0);
		$this->pdf->SetFooterMargin(0);

		// set auto page breaks
		$this->pdf->SetAutoPageBreak(TRUE, -30); //margin bottom

		// set image scale factor
		$this->pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$this->pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		$this->pdf->setImageScale(1.53);

		// add a page
		$this->pdf->AddPage("P");
	}
	
	
}
