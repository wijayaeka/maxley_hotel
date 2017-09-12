<?php
require_once('../../report_pdf/templates/cetak_template.php');
error_reporting(0);
// Extend the TCPDF class to create custom Header and Footer
class CetakPDF extends SMEP_PDF {	
	public function CetakPDF (){
		parent :: __construct();
		// set default header data
		
		//$CI = &get_instance();
		//$this->SetHeaderData("", 13, $CI->config->item("client_name"), $CI->config->item("client_address"));
		
		//$this->SetHeaderData("", 100, 'client', 'address',false); //->berhasil
		
		
		$this->SetHeaderData("../../images/logo2.png", 50);
		
		

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
		$this->SetY(-25);
		// Set font
		$this->SetFont('helvetica', 'I', 1.5);
		// Page number
		$this->Cell(0, 10, 'Halaman '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
	
	public function generate($data,$doc_name="Dokumen.pdf",$download_flag="I"){
		$numcolom_data_paket = 7;
		$this->addPage();
		
		$html = <<<EOD
		
				<style>
					p {
							background-color:#ffffff;
							font-size:9.8pt Century Gothic;
							font-weight:
						}
					td {
						font-size:8.8pt Century Gothic;
						padding:10px 10px;
					}
					h1, img{
						text-align:center;
					}
					.header1{
						height: 40px;
						width: 100px;
						text-align:center;
						font-weight:bold;
						line-height: 1px;
						top:0px;
						font-size:16pt;
					}
					.head{
						background-color:#747c8a;
						color: #ffffff;
					}
				.red{
						background-color:#e87671;
						font-weight:bold;
						font-size:13pt;
					}
				.total{
						font-weight:bold;
						font-size:13pt;
						
					}
				
				</style>
					
				<div class="header1">
					Reservation Report
				</div>
					<table>
						<tr><td colspan="2" width="100">From : </td></tr>  
						<tr><td width="60">{$data['tanggal_awal']}</td><td width="20" align="center"> - </td><td width="60">{$data['tanggal_akhir']}</td></tr>
					</table>
				
EOD;

if(count($data['reservasi_detail']) > 0){
		
		//==========================================================
		//   Reservasi
		//==========================================================
		$html .= <<<EOD
					
				
				
					<p>Reservasi</p>
			
			<table class="font" width="600" style="font: 12px Century Gothic;" border="1"  cellspacing="0" cellpadding="3"  >
				<tr class="head" >
					<td width="100" align="center">No</td>
					<td width="100" align="center">Nama</td>
					<td width="100" align="center">Date In</td>
					<td width="100" align="center">Date Out</td>
					<td width="100" align="center">Room Amount</td>
					<td width="140" align="center">Price</td>
				</tr >
EOD;
		/*$no=0;
		foreach ($data['get_data'] as $row){
			$no++; */
			$html.=<<<EOD
				<tr>
					<td align="center">TES</td>
					
					
EOD;

				
		$html.=<<<EOD
				</tr> 
				<tr class="red"><td align="right" colspan="5" > TOTAL : </td>
				<td align="center">Rp. {$row['harga']} </td></tr>
EOD;
		//}
		
		$html.=<<<EOD
			</table>
			
EOD;

		}

//******************************************************************************************************************
if(count($data['room_executive_detil']) > 0){

		// ==========================================================
		  // Total Room
		// ==========================================================
		$html .= <<<EOD
			<table><tr><td height="30px"></td></tr></table>
				<p>Rooms Executive</p>
				<img alt="Vertical bars chart" src="../../chart/chart_executive.png" style="border: 1px solid gray; width=100px;  margin-left:0px; position:absolute;"/>
			
EOD;

		}
		
		
		
		
		
if(count($data['room_superior_detil']) > 0){

		//==========================================================
		//   Total Room
		//==========================================================
		$html .= <<<EOD
				<table><tr><td height="50px"></td></tr></table>
				<p>Rooms Superior</p>
				<img alt="Vertical bars chart" src="../../chart/chart_superior.png" style="border: 1px solid gray; width=100px; position:absolute;"/>
			
EOD;

		}
		

//**************************************************************************

if(count($data['service_detail']) > 0){

		//==========================================================
		//   Service
		//==========================================================
		$html .= <<<EOD
		<table><tr><td height="50px"></td></tr></table>
					<p>Services</p>
			
			<table class="font" width="800" style="font: 12px Century Gothic; " border="1"  cellspacing="0" cellpadding="3"  >
				<tr class="head" >
					<td width="50" align="center">No</td>
					<td width="280" align="left" >Nama</td>
					<td width="280" align="center">Price</td>
				</tr >
EOD;
		$no=0;
		foreach ($data['service_detail'] as $row){
			$no++;
			$html.=<<<EOD
				<tr>
					<td align="center">{$no}</td>
					<td align="center">{$row['nama_service']}</td>
					<td align="center">Rp. {$row['harga']}</td>	
					</tr>			
EOD;

				
	
		}
		
		$html.=<<<EOD
		<tr class="red"><td align="right" colspan="2" > TOTAL : </td>
				<td align="center">Rp. {$row['total']} </td></tr>
			</table>
			
EOD;

		}
		
		
	
if(count($data['customer_checkin_detail']) > 0){

		//==========================================================
		//   Reservasi
		//==========================================================
		$html .= <<<EOD
		<table><tr><td height="30px"></td></tr></table>
					<p>Customer Check In</p>
			
			<table class="font" width="900" style="font: 12px Century Gothic; " border="1"  cellspacing="0" cellpadding="3"  >
				<tr class="head" >
					<td width="50" align="center">No</td>
					<td width="140" align="left" >Nama Customer</td>
					<td width="140" align="center">Mobile Phone</td>
					<td width="140" align="center">Home Phone</td>
					<td width="170" align="center">Email</td>
				</tr >
EOD;
		$no=0;
		foreach ($data['customer_checkin_detail'] as $row){
			$no++;
			$html.=<<<EOD
				<tr>
					<td align="center">{$no}</td>
					<td align="center">{$row['first_name']} {$row['last_name']} </td>
					<td align="center">{$row['mobile_phone']}</td>	
					<td align="center">{$row['home_phone']}</td>	
					<td align="center">{$row['email']}</td>	
					</tr>			
EOD;

				
	
		}
		
		$html.=<<<EOD
			</table>
			
EOD;

		}
		
		
		
if(count($data['customer_cancel_detail']) > 0){

		//==========================================================
		//   Reservasi
		//==========================================================
		$html .= <<<EOD
		<table><tr><td height="30px"></td></tr></table>
					<p>Customer Cancel</p>
			
			<table class="font" width="800" style="font: 12px Century Gothic; " border="1"  cellspacing="0" cellpadding="3"  >
				<tr class="head" >
					<td width="50" align="center">No</td>
					<td width="140" align="left" >Nama Customer</td>
					<td width="140" align="center">Mobile Phone</td>
					<td width="140" align="center">Home Phone</td>
					<td width="140" align="center">Email</td>
				</tr >
EOD;
		$no=0;
		foreach ($data['customer_cancel_detail'] as $row){
			$no++;
			$html.=<<<EOD
				<tr>
					<td align="center">{$no}</td>
					<td align="center">{$row['first_name']} {$row['last_name']}  </td>
					<td align="center">{$row['mobile_phone']}</td>	
					<td align="center">{$row['home_phone']}</td>	
					<td align="center">{$row['email']}</td>	
					</tr>			
EOD;

				
	
		}
		
		$html.=<<<EOD
			</table>
			
EOD;

		}
		
		$html.=<<<EOD
		<table><tr><td height="30px"></td></tr></table>
		
		<table width="700px" >
					<tr>
									<td colspan='3' align=right style="font-weight:bold; font-size: 1.4em;">Sub Total</td>
									<td colspan='2' align=right style='font-weight:bold; font-size: 1.4em;'> </td>
								</tr>
								<tr>
									<td colspan='3'  align=right style="font-weight:bold; font-size: 1.4em;">Tax (%) :</td>
									<td colspan='2' align=right style="font-weight:bold; font-size: 1.4em;"> 0 %</td>
								</tr>
								<tr>
									<td colspan='3'  align=right style="font-weight:bold; font-size: 1.4em;">Grand Total :</td>
									<td colspan='2' align=right style="font-weight:bold; font-size: 1.4em;">Rp. {$data['grand_total']} </td>
								</tr>
			</table>
EOD;

		
		
	

		$this->writeHTML($html, true, true, true, true, '');
		
		//Close and output PDF document
		$this->Output($doc_name,$download_flag);
	}
}