<?php

namespace backend\models\cert;

use backend\models\StartPdf;

class CertAchievement2022
{
	public $model;
	public $pdf;
	public $cert;
	public $filename;
	public $frontend = false;

	
	public function generatePdf(){

		$this->pdf = new StartPdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


		if($this->frontend){
		    $this->pdf->image_background = 'admin/images/ecertdir/'. $this->cert->certificate_file;
		}else{
		    $this->pdf->image_background = 'images/ecertdir/'. $this->cert->certificate_file;
		}
		
		$this->startPage();
		$this->writeData();
		
		$this->pdf->Output($this->filename .'.pdf', 'I'); 
        
	}

	public function writeData(){

		$this->pdf->SetFont('helvetica','b', 10);
		$this->pdf->SetTextColor(35, 22, 68);
		
		$all = 740;
		
		$left = 70;
		$kuda = 260;
		$laju = 157;
		$jarak = 153;
		$right = $all - $left -$kuda - $laju - $jarak;
		
		$html ='<table border="0"> 
<tr>
<td colspan="2" height="330"></td>
</tr>

<tr>
<td width="170"></td>
<td align="center" width="740" style="font-size:17pt">'. $this->model->rider->rider_name . '</td>
</tr>

<tr>
<td colspan="2" height="493"></td>
</tr>

<tr style="font-size:14">
<td></td>

<td align="center" width="'.$left.'" ></td>
<td align="center" width="'.$kuda.'" >'. $this->model->horse->horse_name .'</td>
<td align="center" width="'.$laju.'" >'. $this->model->hadlaju .' KM/J</td>
<td align="center" width="'.$jarak.'" >'. $this->model->category->category_name .'</td>
<td align="center" width="'.$right.'" ></td>
</tr>


</table>';
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
	}
	
	
	public function startPage(){
		// set document information
	    $title = $this->model->rider->rider_name;
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
