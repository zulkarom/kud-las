<?php

namespace backend\models;

use Yii;
use common\models\Common;


class CompetitionPrint
{
	public $model;
	public $models = null;
	public $pdf;
	public $directoryAsset;

	
	public function generatePdf(){
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$this->directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/views/myasset');
		
		$this->pdf = new CompetitionPrintStart(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$this->writeHeaderFooter();
		$this->startPage();

		if($this->models){
			foreach($this->models as $i => $m){
				if($i>0){
					$this->pdf->AddPage("P");
				}
				$this->model = $m;
				 $this->writeTitle();
				 $this->borangKuda();
				 $this->borangRider();
				 $this->borangDaftar();
				 $this->disclaimer();
				 
			}
			
		}else{
			$this->writeTitle();
				 $this->borangKuda();
				 $this->borangRider();
				 $this->borangDaftar();
				 $this->disclaimer();
		}
		

		$this->pdf->Output('Kejohanan-Kuda-Lasak.pdf', 'I');
	}
	
	public function writeHeaderFooter(){
		$this->pdf->top_margin_first_page = - 4;
		$this->pdf->margin_top = -4;
		$this->pdf->header_first_page_only = true;
		$this->pdf->header_html ='';
		
		
		
		$this->pdf->footer_first_page_only = true;
		$this->pdf->footer_html ='';
	}

	public function writeTitle(){
		$k = $this->model->kejohanan;
		$m = $this->model;
		$html = '
		<br /><br /><br />
		<table border="0" cellpadding="5">
		<tr>

		<td width="106"><img src="images/logo.jpg" /></td>


		<td width="400" align="center">
		
		<span style="font-size:15px;font-weight:bold">'.$k->name.'</span><br />
		'.strtoupper($k->dateStartEndFormat()).'<br />
		'.$k->location.'<br />
		</td>
		<td width="100">
		
		<table border="1" cellpadding="10">
		<tr>
		<td align="center">VEST NO
		<br />';
		if($m->vest){
			$vest = '<span style="font-size:23px;font-weight:bold">' .$m->vest->vest_no . '</span>
			<br /><span style="font-size:11px;"><i>' .$m->vest->color . '</i></span>';
			if(!Yii::$app->user->isGuest && Yii::$app->user->identity->id == 1){
				$html .= $vest;
			}else{
				if($k->date_vest){
					$release_time = strtotime($k->date_vest);
					if(time() > $release_time){
						$html .= $vest;
					}
				}
				
			}
		}

		
		$html .= '</td>
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
		$eam='';
		$name = '';
		if($m->horse){
			$dob = $m->horse->horse_dob ? date('d/m/Y', strtotime($m->horse->horse_dob)) : '';
			$color = $m->horse->horse_color ? $m->horse->horse_color: '';
			if($m->horse->country_born){
				$country = $m->horse->countryText;
			}
			$gender = $m->horse->genderShort;
			$eam = $m->horse->eam_id;
			$name = $m->horse->horse_name;
		}
		$cat = '';
		if($m->category){
			$cat = $m->category->category_name;
		}
		
		$html = '
		
		<div align="center"><b>BORANG PENDAFTARAN</b> <br />
		(Sila lengkapkan borang ini)</div>
		
		<h3 style="text-align:right">'.$cat.'</h3>
		
		
		<b>Butiran Kuda</b><br />
		<table border="1" cellpadding="5">
		<tr>
		<td width="255">
		<b>Nama Kuda:</b><br />
		'.$name.'
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

		<td>
		<b>No. Pasport EAM:</b>
		<br/>'.$eam.'
		</td>
		
		<td>
		<b>Negara Lahir:</b>
		<br/>'.$country.'
		</td>

		<td>
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
			
		}
		
		$html = '

		<br />
		<b>Butiran Peserta</b><br />
		<table border="1" cellpadding="5">

		<tr>
		<td width="615" colspan="3">
		<b>Nama Peserta:</b><br />
		'.$m->rider->rider_name.'
		</td>
	
		</tr>

		<tr>
		<td width="215">
		<b>No. Kad Pengenalan:</b><br />
		'.$m->rider->nric.'
		</td>
		<td width="200">
		<b>No. Telefon:</b>
		<br />'.$m->rider_phone.'
		</td>

		<td width="200">
		<b>Email:</b><br />
		'.$m->rider->email.'
		</td>

		</tr>

		<tr>



		<td width="215">
		<b>No. Ahli EAM:</b><br />

		</td>

		<td width="400" colspan="2">
		<b>Kelab/Stable:</b>
		<br />'.$m->rider_kelab.'
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

	public function borangDaftar(){
		$k = $this->model->kejohanan;
		$m = $this->model;
		$cat = '';
		if($m->category){
			$cat = $m->category->category_name;
		}

		$html = '
		<br />
		<b>Butiran Pendaftaran</b><br />
		<table border="1" cellpadding="5">

		<tr>
		<td width="310">
		<b>Kategori:</b><br />
		'.$cat.'
		</td>
		<td width="305">
		<b>Saiz Baju:</b>
		<br />'.$m->rider_size .'
		</td>
		</tr>

		<tr>
		<td width="615" colspan="2">

		


		<table>

		<tr>
		<td width="120"><b>Deposit Vest:</b><br />
		RM ' . $k->deposit_amount . '</td>
		<td>';
		
		$c1 = '';$c2 = '';
		if($m->deposit_paid == 0){

		}else if($m->deposit_paid == 1){
			$c1 = '<span style="font-family:zapfdingbats;">3</span>';
		}else if($m->deposit_paid == 2){
			$c1 = '<span style="font-family:zapfdingbats;">3</span>';
			$c2 = '<span style="font-family:zapfdingbats;">3</span>';
		}
		$html .= '<br /><br /><table border="0">

<tr>

<td width="190">


<table border="0" cellpadding="2">
<tr>
<td width="20" style="border:1px solid #000000">'.$c1.'</td>
<td width="100"> <b>Paid</b></td>
</tr>
</table>
<i>Verifikasi oleh:</i>


</td>

<td width="200">


<table border="0" cellpadding="2">
<tr>
<td width="20" style="border:1px solid #000000">'.$c2.'</td><td width="100"> <b>Return</b></td>
</tr>
</table>
<i>Verifikasi oleh:</i>

</td>


</tr>

</table>
		
		
		</td>
		</tr>

		</table>';





		$html .= '<br /><br /><br /><span style="font-size:8pt">Deposit akan dipulangkan setelah vest diserahkan semula kepada penganjur</span>
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

	public function disclaimer(){
		$k = $this->model->kejohanan;
		$m = $this->model;

		$html = '
		<br />
	
		<br />
		<table width="600" border="0">
		<tr>
		<td width="600">
		
		<span style="font-weight:bold">Perakuan : Saya <u>'.$m->rider->rider_name.'</u> yang bertandatangan di bawah ini menyatakan bahawa:-</span><br /><br />

		<span style="text-align:justify">Saya telah membaca dan memahami jadual pertandingan dan saya menjanji untuk mematuhi semua peraturan pertandingan. Saya membebaskan JAWATANKUASA PENGANJUR dari segala tanggungjawab untuk kemalangan yang mungkin berlaku pada penunggang, kuda atau pembantu semasa tempoh pertandingan.</span>

		<br /><br /><br /><br />
		<span style="font-weight:bold">Tandatangan : ..................................................................... Tarikh : .................................................</span>
		</td>
		</tr>
		</table>
		';
		$this->pdf->SetFont('helvetica', '', 9.5);
		$tbl = <<<EOD
		$html
EOD;
		
		$this->pdf->writeHTML($tbl, true, false, false, false, '');
	}
	
	
	public function startPage(){
		// set document information
		$this->pdf->SetCreator(PDF_CREATOR);
		$this->pdf->SetAuthor('EKUDALASA');
		$this->pdf->SetTitle('BORANG PENDAFTARAN - EKUDALASAK');
		$this->pdf->SetSubject('BORANG PENDAFTARAN - EKUDALASAK');
		$this->pdf->SetKeywords('');



		// set header and footer fonts
		$this->pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$this->pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$this->pdf->SetMargins(19, 10, PDF_MARGIN_RIGHT);
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
