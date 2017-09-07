<?php
define('K_TCPDF_EXTERNAL_CONFIG',1);
require_once("libraries/tcpdf/config/tcpdf_config_pdf.php");
require_once("tcpdf_lib.php");
$tcpdf_lib = new tcpdf_lib();
require_once("templates/temp_rm.php");
include "../../connect.php";

$nip = $_GET['nip'];
if(isset($nip)){
	if(!empty($nip)){
		$query = mysql_query("select * from employee, unit where employee.unit_id = unit.unit_id and employee.nip = '".$nip."'");

		$data = array();
		$data['emp'] = mysql_fetch_array($query);

		/*$query2 = mysql_query("
			select e.nip, e.nama, c.cif, c.lcf, c.td, c.cpa, c.product_holding, e.photo
			from employee e, unit, customer_fund c 
			where e.unit_id = unit.unit_id and e.nip = c.nip and e.nip = '".$nip."'
		");*/
		
		$query2 = mysql_query("
			SELECT employee.nip, employee.nama, unit.nama_unit AS  unit_kerja, 
			employee.mobile_phone, employee.job_title, employee.photo, customer.customer_name, 
			customer_fund.lcf AS  lcf, customer_fund.td AS td, 
			customer_fund.product_holding AS product_holding, 
			customer_fund.cpa AS  cpa, customer_fund.cif,
			DATE_FORMAT(MAX(customer_fund.tanggal_sekarang),'%d-%m-%Y') AS MAX_TGL
			FROM employee
			INNER JOIN unit ON employee.unit_id = unit.unit_id
			INNER JOIN customer ON employee.NIP = customer.NIP
			INNER JOIN customer_fund ON customer.CIF = customer_fund.CIF
			WHERE employee.NIP =  '".$nip."'
			GROUP BY customer.CIF		
		");

		$data1 = array();

		while($r=mysql_fetch_array($query2)){
			$r['total'] = $r['lcf'] + $r['td'];
			$data1[] = $r;
			$data['fund1'] = $data1;
		}

		$pdf = new CetakPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$pdf->generate($data,"DATA PEGAWAI.pdf");
	}
}
?>