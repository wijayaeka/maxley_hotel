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
						text-align:center;
						font-weight:bold;
						line-height: 8px;
						font-size:16pt;
					}
					.head{
						background-color:#4f81bd;
					}
					.judul{
						font-weight:bold;
					}
				</style>
				
				<div style="height:100px;" ></div>
				<div class="header1">
					Customer Information Detail 
				</div>
EOD;

		if(count($data['ci']) > 0){

		//==========================================================
		//    Customer Fund
		//==========================================================
		$html .= <<<EOD
			<table>
			<tr><td width="50">NIP</td><td width="10">:</td><td>{$data['head']['nip']}</td></tr>
			<tr><td width="50">Nama</td><td width="10">:</td><td>{$data['head']['nama']}</td></tr>
			</table>
			<table class="font" width="700" style="font-size:10pt" border="1"  cellspacing="0" cellpadding="3"  >
				<tr class="head" >
					<td width="100">Customer</td>
					<td width="120">PIC</td>
					<td width="80">Date</td>
					<td width="60">Issue</td>
					<td width="70">Low Cost Fund</td>
					<td width="60">Time Deposit</td>
					<td width="60">Amount</td>
					<td width="60">CPA</td>
					<td width="60">Product Holding</td>
				</tr >
EOD;
		$no=0;
		foreach ($data['ci'] as $row){
			$no++;
			$html.=<<<EOD
				<tr>
					<td>{$row['customer_name']}</td>
					<td>{$row['nama']} ({$row['no_hp']})</td>
					<td>{$row['tanggal_sekarang']}</td>
					<td>{$row['comment']}</td>
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
EOD;

		}
	
		$this->writeHTML($html, true, true, true, true, '');
		
		//Close and output PDF document
		$this->Output($doc_name,$download_flag);
	}
}
