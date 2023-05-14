<?php

namespace backend\models;

use Yii;
use common\models\Common;


class CompetitionPrint
{
	public $model;
	public $pdf;
	public $directoryAsset;

	
	public function generatePdf(){

		$this->directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/views/myasset');
		
		$this->pdf = new CompetitionPrintStart(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		$this->writeHeaderFooter();
		$this->startPage();
		
		 $this->writeTitle();
		 $this->borangKuda();
		 $this->borangRider();


		$this->pdf->Output('borang-tuntutan.pdf', 'I');
	}
	
	public function writeHeaderFooter(){
		$this->pdf->top_margin_first_page = - 4;
		$this->pdf->header_first_page_only = true;
		$this->pdf->header_html ='
		
		';
		
		
		
		$this->pdf->footer_first_page_only = true;
		$this->pdf->footer_html ='';
	}

	public function writeTitle(){
		$k = $this->model->kejohanan;
		$html = '
		<br /><br /><br />
		<table border="0">
		<tr>
		<td width="500" align="center"><span style="font-size:15px;font-weight:bold">'.$k->name.'</span><br />
		'.strtoupper($k->dateStartEndFormat()).'<br />
		'.$k->location.'<br />
		</td>
		<td width="100">
		
		<table border="1" cellpadding="10">
		<tr>
		<td>VEST NO:
		<br />
		
		</td>
		</tr>
		</table>

		</td>

		

		</tr>
		</table>
		';
		$this->pdf->SetFont('helvetica', '', 10);
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
	}

	public function borangKuda(){
		$k = $this->model->kejohanan;
		$m = $this->model;
		$dob = '';
		$color = '';
		$country = '';
		$gender = '';
		if($m->horse){
			$dob = $m->horse->horse_dob ? date('d/m/Y', strtotime($m->horse->horse_dob)) : '';
			$color = $m->horse->horse_color ? $m->horse->horse_color: '';
			if($m->horse->country_born){
				$country = $m->horse->countryText;
			}
			$gender = $m->horse->genderShort;
		}
		
		$html = '
		<br />
		<div align="center"><b>BORANG PENDAFTARAN</b> <br />
		(Sila lengkapkan borang ini)</div>

		<br /><br />
		<b>Butiran Kuda</b><br />
		<table border="1" cellpadding="5">
		<tr>
		<td width="240" rowspan="2">
		<b>Nama Kuda:</b><br />
		'.$m->horse->horse_name.'
		</td>
		<td width="180">
		<b>Tarikh Lahir:</b>
		<br />'.$dob.'
		</td>

		<td width="180">
		<b>Warna:</b>
		<br />'.$color.'
		</td>
		</tr>

		<tr>
		
		<td width="180">
		<b>Negara Lahir:</b>
		<br/>'.$country.'
		</td>

		<td width="180">
		<b>Jantina:</b>
		<br />'.$gender.'
		</td>
		</tr>

		</table>
		';
		$this->pdf->SetFont('helvetica', '', 10);
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
	}

	public function borangRider(){
		$k = $this->model->kejohanan;
		$m = $this->model;
		$dob = '';
		$color = '';
		$country = '';
		$gender = '';
		if($m->rider){
			$dob = $m->horse->horse_dob ? date('d/m/Y', strtotime($m->horse->horse_dob)) : '';
			$color = $m->horse->horse_color ? $m->horse->horse_color: '';
			if($m->horse->country_born){
				$country = $m->horse->countryText;
			}
			$gender = $m->horse->genderShort;
		}
		
		$html = '

		<br /><br />
		<b>Butiran Peserta</b><br />
		<table border="1" cellpadding="5">
		<tr>
		<td width="300">
		<b>Nama Peserta:</b><br />
		'.$m->rider->rider_name.'
		</td>
		<td width="300">
		<b>Tarikh Lahir:</b>
		<br />
		</td>


		</tr>

		

		</table>
		';
		$this->pdf->SetFont('helvetica', '', 10);
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
	}
	
	
	public function startPage(){
		// set document information
		$this->pdf->SetCreator(PDF_CREATOR);
		$this->pdf->SetAuthor('Pusat Kokurikulum');
		$this->pdf->SetTitle('BORANG TUNTUTAN');
		$this->pdf->SetSubject('BORANG TUNTUTAN');
		$this->pdf->SetKeywords('');



		// set header and footer fonts
		$this->pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$this->pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$this->pdf->SetMargins(25, 10, PDF_MARGIN_RIGHT);
		//$this->pdf->SetMargins(0, 0, 0);
		$this->pdf->SetHeaderMargin(10);
		//$this->pdf->SetHeaderMargin(0);

		 //$this->pdf->SetHeaderMargin(0, 0, 0);
		$this->pdf->SetFooterMargin(20);

		// set auto page breaks
		$this->pdf->SetAutoPageBreak(TRUE, 20); //margin bottom

		// set image scale factor
		$this->pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$this->pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------



		// add a page
		$this->pdf->AddPage("P");
	}
	
	
}
