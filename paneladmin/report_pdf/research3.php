<?php
session_start();

define('K_TCPDF_EXTERNAL_CONFIG',1);
require_once("libraries/tcpdf/config/tcpdf_config_pdf.php");
require_once("tcpdf_lib.php");
$tcpdf_lib = new tcpdf_lib();
require_once("templates/temp_ci.php");
mysql_connect('localhost','root','');
mysql_select_db('pareto');
$data = array();
$nip = $_SESSION['nip'];
$query2 = mysql_query("
	select* from employee where nip = '$nip'");
$query = mysql_query("SELECT employee.nip, employee.nama, unit.nama_unit, 
employee.mobile_phone, employee.job_title, employee.photo, customer.customer_name, 
customer_fund.lcf , customer_fund.td , customer.cif, 
customer_fund.product_holding, 
customer_fund.cpa, customer_issue.comment, customer_issue.start_date,
contact_person.nama, customer.id_customer,
MAX(customer_fund.tanggal_sekarang)
FROM employee
INNER JOIN unit ON employee.unit_id = unit.unit_id
INNER JOIN customer ON employee.NIP = customer.NIP
INNER JOIN customer_fund ON customer.CIF = customer_fund.CIF
INNER JOIN contact_person ON contact_person.id_temp = customer.id_customer 
INNER JOIN customer_issue ON customer_issue.cif = customer.cif
WHERE customer_fund.NIP =  '$nip'
GROUP BY customer.CIF
");

//echo $_SESSION["nip"];

$query = mysql_query("select * from employee where nip = '".$_SESSION["nip"]."'");
$data['head']=mysql_fetch_array($query);

$data1 = array();

while($r=mysql_fetch_array($query2)){
	$r['total'] = $r['lcf'] + $r['td'];
	$data1[] = $r;
	$data['ci'] = $data1;
}

$pdf = new CetakPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->generate($data,"DATA PEGAWAI.pdf");

?>