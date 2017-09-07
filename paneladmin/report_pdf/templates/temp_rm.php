<?php
require_once('cetak_template.php');

// Extend the TCPDF class to create custom Header and Footer
class CetakPDF extends SMEP_PDF {	
	public function CetakPDF (){
		parent :: __construct();
		// set default header data
		
		//$CI = &get_instance();
		//$this->SetHeaderData("", 13, $CI->config->item("client_name"), $CI->config->item("client_address"));
		
		//$this->SetHeaderData("", 100, 'client', 'address',false); //->berhasil
		
		
		$this->SetHeaderData("logo.jpg", 50);
		
		

		// set header and footer fonts
	
		$this->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$this->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		//$this->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		//set margins
		//$this->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$this->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$this->SetHeaderMargin(PDF_MARGIN_HEADER);
		$this->SetFooterMargin(PDF_MARGIN_FOOTER);

		//set auto page breaks
		$this->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		//set image scale factor
		$this->setImageScale(PDF_IMAGE_SCALE_RATIO);
		global $l;
	
		//set some language-dependent strings
		$this->setLanguageArray($l);
		
	}
	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Halaman '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
	
	public function generate($data,$doc_name="Dokumen.pdf",$download_flag="I"){
		$numcolom_data_paket = 7;
		$this->addPage();
		$path = "../../employee/images/";
		$path2 = "../../image/";
		if(!empty($data['emp']['photo'])){
			$foto = $path.$data['emp']['photo'];
			if(file_exists($foto)){
				if(substr(strtolower($foto),-3)=="jpeg" || substr(strtolower($foto),-3)=="png" || substr(strtolower($foto),-3)=="jpg"){
				}else
					$foto =$path.'no_image.jpg';
			} else {
				$foto =$path2.'user.jpg';
			}			
		}
		else{
			$foto =$path2.'user.jpg';
		}
		$html = <<<EOD
		
				<style>
					h1,h2,h3,h4{
						background-color:#ffffff;
					}
					.tabel{}
					tr.head{
						font-weight:bold;
					}
					h1, img{
						text-align:center;
					}
					.header1{
						height: 30px;
						width: 100px;
						border: 1px solid #000000;
						text-align:center;
						font-weight:bold;
						background-color:#e0e0e0;
						line-height: 9px;
					}
					.head{
						background-color:#4f81bd;
					}
					.judul{
						font-weight:bold;
					}
				</style>
				
				<div class="header1">
					<u>RM PORTOFOLIO</u> <br>
					{$data['emp']['nama']}
				</div>
				<div style="height:100px;" ></div>
				<img src="$foto"  height="170" width="130" />
				<div style="height:100px;" ></div>
				
				<table>
				<tr><td width="20"></td><td></td></tr>
				<tr><td width="20"></td><td>
					<table class="font" width="695" style="font-size:10pt" border="0"  cellspacing="0" cellpadding="3">
						<tr>
							<td width="180">Nip</td>
							<td width="10">:</td>
							<td width="480">{$data['emp']['nip']}</td>
						</tr>
						<tr>
							<td width="180">Nama</td>
							<td width="10">:</td>
							<td width="480">{$data['emp']['nama']}</td>
						</tr>
						<tr>
							<td width="180">Unit Kerja</td>
							<td width="10">:</td>
							<td width="480">{$data['emp']['nama_unit']}</td>
						</tr>
						<tr>
							<td width="180">Mobile Phone</td>
							<td width="10">:</td>
							<td width="480">{$data['emp']['mobile_phone']}</td>
						</tr>
						<tr>
							<td width="180">Job Title</td>
							<td width="10">:</td>
							<td width="480">{$data['emp']['job_title']}</td>
						</tr>
					</table>
				</td></tr>
				</table>
EOD;

		if(count($data['fund1']) > 0){

		//==========================================================
		//    Customer Fund
		//==========================================================
		$html .= <<<EOD
			<br>
			<table>
			<tr><td width="20"><b>1.</b></td><td><b>Nasabah Kelolaan</b></td></tr>
			<tr><td width="20"></td><td>
			<table class="font" width="695" style="font-size:10pt" border="1"  cellspacing="0" cellpadding="3"  >
				<tr class="head" >
					<td width="85">CIF</td>
					<td width="150">Nama Nasabah</td>
					<td width="85">LCF</td>
					<td width="85">TD</td>
					<td width="85">Total</td>
					<td width="85">CPA</td>
					<td width="85">PH</td>
					
				</tr >
EOD;
		$no=0;
		foreach ($data['fund1'] as $row){
			$no++;
			$html.=<<<EOD
				<tr>
					<td>{$row['cif']}</td>
					<td>{$row['customer_name']}</td>
					<td>{$row['lcf']}</td>
					<td>{$row['td']}</td>
					<td>{$row['total']}</td>
					<td>{$row['cpa']}</td>
					<td>{$row['product_holding']}</td>
					
EOD;

				
		$html.=<<<EOD
				</tr> 
EOD;
		}
		
		$html.=<<<EOD
			</table>
			</td></tr></table>
EOD;

		}

		$this->writeHTML($html, true, true, true, true, '');
		
		//Close and output PDF document
		$this->Output($doc_name,$download_flag);
	}
}
