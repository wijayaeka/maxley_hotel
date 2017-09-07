<?php
require_once('../../report_pdf/templates/cetak_template.php');

// Extend the TCPDF class to create custom Header and Footer
class CetakPDF extends SMEP_PDF {	
	public function CetakPDF (){
		parent :: __construct();
		// set default header data
		
		//$CI = &get_instance();
		//$this->SetHeaderData("", 13, $CI->config->item("client_name"), $CI->config->item("client_address"));
		
		//$this->SetHeaderData("", 100, 'client', 'address',false); //->berhasil
		
		
		$this->SetHeaderData("../../images/logo2.png", 48);
		
		

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
		$this->SetFont('helvetica', 'I', 1.5);
		// Page number
		$this->Cell(0, 10, 'Halaman '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
	
	public function generate($data,$doc_name="Dokumen.pdf",$download_flag="I"){
		$numcolom_data_paket = 7;
		$this->addPage();
		
		$html = <<<EOD
		
				<style>
					
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
					Reservation Detail
				</div><br><br>
EOD;
if(count($data['customer_data']) > 0){
		//==========================================================
		//    Customer Detail
		//==========================================================
		$no=0;
		foreach ($data['customer_data'] as $row){
			
		$html .= <<<EOD
			<table class="font" width="700" style="font: 12px Century Gothic;"   cellspacing="0" cellpadding="3"  >
				<tr class="head" >
					<td width="550" align="left" colspan="10">Customer Detail </td>
				</tr >
				
				<tr>
					
					<td align="left" width="120">Nama </td>
					<td align="left" width="430" colspan="2"> : {$row['first_name']}</td>
				</tr> 
				
				<tr>
					
					<td align="left" width="120">Address </td>
					<td align="left" width="430" colspan="2"> : {$row['address']}</td>
				</tr> 
				
				
				<tr>
					
					<td align="left" width="120">Home Phone </td>
					<td align="left" width="430" colspan="2"> : {$row['home_phone']}</td>
				</tr> 
				
				<tr>
					
					<td align="left" width="120">Mobile Phone </td>
					<td align="left" width="430" colspan="2"> : {$row['mobile_phone']}</td>
				</tr> 
				
				
				<tr>
					
					<td align="left" width="120">Email </td>
					<td align="left" width="430" colspan="2"> : {$row['email']}</td>
				</tr> 
				
				
				
				<tr>
					
					<td align="left" width="120">City </td>
					<td align="left" width="430" colspan="2"> : {$row['city']}</td>
				</tr> 
				
				<tr>
					
					<td align="left" width="120">State </td>
					<td align="left" width="430" colspan="2"> : {$row['state']}</td>
				</tr> 
				<tr>
					
					<td align="left" width="120">Country </td>
					<td align="left" width="430" colspan="2"> : {$row['country']}</td>
				</tr> 
				
				
			</table>
			
EOD;
		}
		
		// $html .= <<<EOD
						
			
			 
// EOD;
		
		}


//******************************************************************************************************************

if(count($data['reservasi_detail']) > 0){

		//==========================================================
		//    Customer Detail
		//==========================================================
		$no=0;
		foreach ($data['reservasi_detail'] as $row){
			
		$html .= <<<EOD
			<table class="font" width="700" style="font: 12px Century Gothic;"   cellspacing="0" cellpadding="3"  >
				<tr class="head" >
					<td width="550" align="left" colspan="10">Customer Detail </td>
				</tr >
				
				<tr>
					
					<td align="left" width="120">Nama </td>
					<td align="left" width="430" colspan="2"> : {$row['id_reservasi']}</td>
				</tr> 
				
				<tr>
					
					<td align="left" width="120">Admin Request </td>
					<td align="left" width="430" colspan="2"> : {$row['admin_req']}</td>
				</tr> 
				
				
				<tr>
					
					<td align="left" width="120">Admin Approve </td>
					<td align="left" width="430" colspan="2"> : {$row['admin_app']}</td>
				</tr> 
				
				<tr>
					
					<td align="left" width="120">Admin Checkin </td>
					<td align="left" width="430" colspan="2"> : {$row['admin_checkin']}</td>
				</tr> 
				
				
			</table>
			
EOD;
		}
		
		// $html .= <<<EOD
						
			
			 
// EOD;
		
		}


//******************************************************************************************************************
		if(count($data['total_room']) > 0){

		//==========================================================
		//   Total Room
		//==========================================================
		$html .= <<<EOD
			<table>
			<tr class="judul"><td width="150">Total Room :</td></tr>
			</table>
			<table class="font" width="700" style="font: 12px Century Gothic;" border="1"  cellspacing="0" cellpadding="3"  >
				<tr class="head" >
					<td width="120" align="center">Check In</td>
					<td width="120" align="center">Check Out</td>
					<td width="150" align="center">Total Night</td>
					<td width="150" align="center">Total Rooms</td>
					<td width="160" align="center">Price</td>
				</tr >
EOD;
		$no=0;
		foreach ($data['total_room'] as $row){
			$no++;
			$html.=<<<EOD
				<tr>
					<td align="center">{$row['date_in']}</td>
					<td align="center">{$row['date_out']}</td>
					<td align="center">{$row['hari']}</td>
					<td align="center">{$row['room_amount']}</td>
					<td align="center">Rp. {$row['harga']}</td>					
EOD;

				
		$html.=<<<EOD
				</tr> 
				<tr class="red"><td align="right" colspan="4" > TOTAL : </td>
				<td align="center">Rp. {$row['total']} </td></tr>
EOD;
		}
		
		$html.=<<<EOD
			</table>
EOD;

		}
//******************************************************************************************************************
		if(count($data['room_detail']) > 0){

		//==========================================================
		//    Room Detail
		//==========================================================
		$html .= <<<EOD
			<table>
			<tr class="judul"><td width="150">Detail Room :</td></tr>
			</table>
			<table class="font" width="700" style="font: 12px Century Gothic;" border="1"  cellspacing="0" cellpadding="3"  >
				<tr class="head" >
					<td width="50" align="center">No</td>
					<td width="120" align="center">No Room</td>
					<td width="200" align="center">Category</td>
				</tr >
EOD;
		$no=0;
		foreach ($data['room_detail'] as $row){
			$no++;
			$html.=<<<EOD
				<tr>
					<td align="center">{$no}</td>
					<td align="center">{$row['nmr_room']}</td>
					<td>{$row['nama_room_kategori']}</td>
					
EOD;

				
		$html.=<<<EOD
				</tr> 
EOD;
		}
		
		$html.=<<<EOD
			</table>
EOD;

		}
//******************************************************************************************************************
//******************************************************************************************************************
		if(count($data['service']) > 0){

		//==========================================================
		//    Service
		//==========================================================
		$html .= <<<EOD
			
			<table class="font" width="300" style="font: 12px Century Gothic;" border="1"  cellspacing="0" cellpadding="3"  >
				<tr class="head" >
					<td width="200" align="center">No</td>
					<td width="200" align="center">Nama Service</td>
					<td width="200" align="center">Service</td>
				</tr >
EOD;
		$no=0;
		foreach ($data['service'] as $row){
			$no++;
			$html.=<<<EOD
				<tr>
					<td align="center" width="200" >{$no}</td>
					<td align="center" width="200" >{$row['nama_service']}</td>
					<td align="center">Rp. {$row['harga']}</td>
					
EOD;

				
		$html.=<<<EOD
				</tr> 
				
EOD;
		}
		
		$html.=<<<EOD
		<tr class="red"><td align="right" colspan="2" > TOTAL : </td>
				<td align="center">Rp. {$row['jumlah']} </td></tr>
			</table>
EOD;

		}
//******************************************************************************************************************


//******************************************************************************************************************
		if(count($data['grand']) > 0){

		//==========================================================
		//   Total Room
		//==========================================================
		$html .= <<<EOD
			
			<table class="font" width="700" style="font: 12px Century Gothic;" border="0"  cellspacing="0" cellpadding="3"  >
EOD;
		$no=0;
		foreach ($data['grand'] as $row){
			$no++;
			$html.=<<<EOD
				<tr class="total">
					<td>Sub Total : </td><td align="left">Rp. {$row['grand_total']}</td>		
				</tr>
				<tr class="total">
					<td>Tax : </td><td align="left"> 0% </td>		
				</tr class="total">
				<tr class="total">
					<td>Grand Total : </td><td align="left">Rp. {$row['grand_total']}</td>		
				</tr>
				
				
EOD;

				
		$html.=<<<EOD
				
				
EOD;
		}
		
		$html.=<<<EOD
			</table>
EOD;

$html.=<<<EOD
		<table border="1" class="font" width="700" style="font: 12px Century Gothic;" cellspacing="0" cellpadding="3" >
				<tr class="head" >
					<td width="550" align="left" colspan="10">Payment Detail </td>
				</tr >
				<tr>
					<td width="130" >Payment Option</td>		
					<td width="420" align="left" colspan="13">Manual Pay On Arrival </td>
				</tr>
				<tr>
					<td width="130" >Transaction ID</td>		
					<td width="420" align="left" colspan="13"> N/A </td>
				</tr>
				<tr class="head" >
					<td width="550" align="left" colspan="10">Customer Status </td>
				</tr >
				<tr>
					<td width="130" >Payment Option</td>		
					<td width="420" align="left" colspan="13">Manual Pay On Arrival </td>
				</tr>
				<tr>
					<td width="130" >Free Room</td>		
					<td width="420" align="left" colspan="13"> </td>
				</tr>
				<tr class="red">
					<td width="130" >Member Get Member</td>		
					<td width="420" align="left" colspan="13">  </td>
				</tr>
					<tr class="head" >
					<td width="550" align="left" colspan="10">Booking Status </td>
				</tr >
				<tr>
					<td width="130" >Active</td>		
					<td width="420" align="left" colspan="13"> </td>
				</tr>
			</table>
				
				
EOD;
$html .= <<<EOD
			
			<table class="font" width="700" style="font: 12px Century Gothic;" border="0"  cellspacing="0" cellpadding="3"  >
EOD;
		$no=0;
		foreach ($data['grand'] as $row){
			$no++;
			$html.=<<<EOD
				<tr class="total">
					<td>Sub Total : </td><td align="left">Rp. {$row['grand_total']}</td>		
				</tr>
				<tr class="total">
					<td>Tax : </td><td align="left"> 0% </td>		
				</tr class="total">
				<tr class="total">
					<td>Grand Total : </td><td align="left">Rp. {$row['grand_total']}</td>		
				</tr>
				
				
EOD;

				
		$html.=<<<EOD
				
				
EOD;
		}
		
		$html.=<<<EOD
			</table>
EOD;

		}
//******************************************************************************************************************






		$this->writeHTML($html, true, true, true, true, '');
		
		//Close and output PDF document
		$this->Output($doc_name,$download_flag);
	}
}
