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
						line-height: 8px;
					}
					.head{
						background-color:#4f81bd;
					}
					.judul{
						font-weight:bold;
					}
				</style>
				
				<div class="header1">
					CUSTOMER EXECUTIVE SUMMARY <br>
					Customer Name
				</div>
				<div style="height:100px;" ></div>
				<table>
				<tr><td width="20"><b>1.</b></td><td><b>Informasi Customer</b></td></tr>
				<tr><td width="20"></td><td>
					<table class="font" width="695" style="font-size:10pt" border="1"  cellspacing="0" cellpadding="3">
						<tr>
							<td width="180">a. Nama Customer</td>
							<td width="10">:</td>
							<td width="480">{$data['customer']['customer_name']}</td>
						</tr>
						<tr>
							<td width="180">b. Alamat Kantor</td>
							<td width="10">:</td>
							<td width="480"></td>
						</tr>
						<tr>
							<td width="180">c. Key Person</td>
							<td width="10">:</td>
							<td width="480"></td>
						</tr>
						<tr>
							<td width="180">d. Bidang Usaha</td>
							<td width="10">:</td>
							<td width="480"></td>
						</tr>
						<tr>
							<td width="180">e. Account Type</td>
							<td width="10">:</td>
							<td width="480"></td>
						</tr>
						<tr>
							<td width="180">f. Relationship Manager</td>
							<td width="10">:</td>
							<td width="480"></td>
						</tr>
					</table>
				</td></tr>
				</table>
EOD;

		if(count($data['identitas']) > 0){

		//==========================================================
		//    RIWAYAT JABATAN
		//==========================================================
		$html .= <<<EOD
			<br>
			<table>
			<tr><td width="20"><b>2.</b></td><td><b>Posisi Dana Customer di Bank Mandiri periode</b></td></tr>
			<tr><td width="20"></td><td>
			<table class="font" width="695" style="font-size:10pt" border="1"  cellspacing="0" cellpadding="3"  >
				<tr class="head" >
					<td width="165">Low Cost Fund</td>
					<td width="160">Time Deposit</td>
					<td width="160">Product Holding</td>
					<td width="90">CPA</td>
					<td width="95">Total</td>
				</tr >
EOD;
		$no=0;
		foreach ($data['identitas'] as $row){
			$no++;
			$html.=<<<EOD
				<tr>
					<td >$no</td>
					<td>{$row['emp_no']}</td>
					<td >{$row['fullname']}</td>
					<td>{$row['sex']}</td>
					<td >{$row['dob']}</td>
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
		
		if(count($data['identitas']) > 0){

		//==========================================================
		//    RIWAYAT JABATAN
		//==========================================================
		$html .= <<<EOD
			<br>
			<table>
			<tr><td width="20"><b>3.</b></td><td><b>Issue(s)</b></td></tr>
			<tr><td width="20"></td><td>
			<table class="font" width="695" style="font-size:10pt" border="1"  cellspacing="0" cellpadding="3"  >
				<tr class="head" >
					<td width="175">Start Date</td>
					<td width="160">Matter</td>
					<td width="160">Comment</td>
					<td width="175">Actions</td>
				</tr >
EOD;
		$no=0;
		foreach ($data['identitas'] as $row){
			$no++;
			$html.=<<<EOD
				<tr>
					<td >$no</td>
					<td>{$row['emp_no']}</td>
					<td>{$row['fullname']}</td>
					<td>{$row['sex']}</td>
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
