<?php
define('K_TCPDF_EXTERNAL_CONFIG',1);
require_once("../../report_pdf/libraries/tcpdf/config/tcpdf_config_pdf.php");
require_once("../../report_pdf/tcpdf_lib.php");
require_once("../../config/fungsi_date.php");
include "../../config/libchart/classes/libchart.php";
$tcpdf_lib = new tcpdf_lib();
require_once("temp_ces.php");
include "../../config/connect.php";

$tanggal_awal = $_GET['tanggal_awal'];
$tanggal_akhir = $_GET['tanggal_akhir'];

$data['tanggal_awal'] = $tanggal_awal;
$data['tanggal_akhir'] = $tanggal_akhir;
//  RESERVASI
			
$reservasi = mysql_query("select sum(price) as jumlah , room_amount, date_in, date_out,price, first_name  from reservasi 
									cross join customer on customer.id_reservasi = reservasi.id_reservasi
									WHERE reservasi.date_out between '$tanggal_awal' and '$tanggal_akhir' 
									AND reservasi.status = 'Y' ORDER BY reservasi.date_out desc ");
		$reservasi_detail=array();
		while($rs=mysql_fetch_array($reservasi)){
			
			$total = $rs['jumlah'] * $rs['room_amount'];
			$rs['price'] = number_format($rs['price'], 0 , '' , '.' ).'';
			$rs['harga'] =  number_format($total, 0 , '' , '.' ).'';
			$reservasi_detail[]=$rs;
			$data['reservasi_detail'] = $reservasi_detail;
		}
		
//  EXECUTIVE USAGE

$room_executive = mysql_query("select * from room where id_room_kategori = '1'");
						$chart = new VerticalBarChart();
						$dataSet = new XYDataSet();
						$room_executive_detil=array();
							while($r = mysql_fetch_array($room_executive))
								{
									
									$detail = mysql_query("select  count(id_room) as jumlah  from detail_reservasi_room 
															cross join reservasi on reservasi.id_reservasi = detail_reservasi_room.id_reservasi 
															where detail_reservasi_room.id_room = '$r[id_room]' AND date_out between '$tanggal_awal' and '$tanggal_akhir' 
															AND reservasi.status = 'Y' ORDER BY date_out desc ");
									$x = mysql_fetch_array($detail);
									$dataSet->addPoint(new Point("$r[nmr_room]", $x['jumlah']));
									
									$room_executive_detil[]=$r;
									$data['room_executive_detil'] = $room_executive_detil;
								}
					// $dataSet->addPoint(new Point("Jan 2005", 873));
					$chart->setDataSet($dataSet);

					$chart->setTitle("Room EXECUTIVE Used Record ");
					$chart->render("../../chart/chart_executive.png");
		
//  SUPERIOR USAGE		
$room_superior = mysql_query("select * from room where id_room_kategori = '3'");
						$chart2 = new VerticalBarChart();
						$dataSet2 = new XYDataSet();
						$room_superior_detil=array();
							while($s = mysql_fetch_array($room_superior))
								{
									$detail2 = mysql_query("select  count(id_room) as jumlah  from detail_reservasi_room 
															cross join reservasi on reservasi.id_reservasi = detail_reservasi_room.id_reservasi 
															where detail_reservasi_room.id_room = '$s[id_room]' AND date_out between '$tanggal_awal' and '$tanggal_akhir' ORDER BY date_out desc ");
									$p = mysql_fetch_array($detail2);
									$dataSet2->addPoint(new Point("$s[nmr_room]", $p['jumlah']));
									
									$room_superior_detil[]=$p;
									$data['room_superior_detil'] = $room_superior_detil;
								}
					// $dataSet->addPoint(new Point("Jan 2005", 873));
					$chart2->setDataSet($dataSet2);

					$chart2->setTitle("Room SUPERIOR Used Record ");
					$chart2->render("../../chart/chart_superior.png");		
					
					
// SERVICE
$service = mysql_query("select * from detail_reservasi_service  
													CROSS JOIN service on detail_reservasi_service.id_service = service.id_service 
													CROSS JOIN reservasi on detail_reservasi_service.id_reservasi = reservasi.id_reservasi
													WHERE reservasi.date_out between '$tanggal_awal' and '$tanggal_akhir' 
													AND reservasi.status = 'Y' ORDER BY reservasi.date_out desc ");					

$total_service = mysql_fetch_array(mysql_query("select sum(harga) as jumlah FROM  service 
														CROSS JOIN detail_reservasi_service on detail_reservasi_service.id_service = service.id_service
														CROSS JOIN reservasi on detail_reservasi_service.id_reservasi = reservasi.id_reservasi
														WHERE reservasi.date_out between '$tanggal_awal' and '$tanggal_akhir' 
														AND reservasi.status = 'Y' ORDER BY reservasi.date_out desc "));												
		$service_detail=array();
		while($s=mysql_fetch_array($service))
		{
			$s['total'] = number_format($total_service['jumlah'], 0 , '' , '.' ).'';
			$service_detail[]=$s;
			$data['service_detail'] = $service_detail;
		}		
					
					
$customer_checkin = mysql_query("select * from customer  
													CROSS JOIN reservasi on customer.id_reservasi = reservasi.id_reservasi
													WHERE customer.status = 'Y' 
													AND reservasi.status = 'Y' AND reservasi.date_out between '$tanggal_awal' and '$tanggal_akhir' ORDER BY reservasi.date_out desc ");
		$customer_checkin_detail=array();
		while($c=mysql_fetch_array($customer_checkin))
		{
			$c['total'] = $total_service['jumlah'];
			$customer_checkin_detail[]=$c;
			$data['customer_checkin_detail'] = $customer_checkin_detail;
		}								
					
	
$customer_cancel = mysql_query("select * from customer  
													CROSS JOIN reservasi on customer.id_reservasi = reservasi.id_reservasi
													WHERE customer.status = 'C' 
													AND reservasi.status = 'C' AND reservasi.date_out between '$tanggal_awal' and '$tanggal_akhir' ORDER BY reservasi.date_out desc ");
									
		$customer_cancel_detail=array();
		while($c=mysql_fetch_array($customer_cancel))
		{
			$c['total'] = $total_service['jumlah'];
			$customer_cancel_detail[]=$c;
			$data['customer_cancel_detail'] = $customer_cancel_detail;
		}

			$total_service2 = mysql_fetch_array(mysql_query("select sum(harga) as jumlah1 FROM  service 
														CROSS JOIN detail_reservasi_service on detail_reservasi_service.id_service = service.id_service
														CROSS JOIN reservasi on detail_reservasi_service.id_reservasi = reservasi.id_reservasi
														WHERE reservasi.date_out between '$tanggal_awal' and '$tanggal_akhir' 
														AND reservasi.status = 'Y' ORDER BY reservasi.date_out desc "));
										
			$total_reservasi = mysql_fetch_array(mysql_query("select sum(price) as jumlah2 , room_amount FROM  reservasi 
																			CROSS JOIN room_kategori on reservasi.id_room_kategori = room_kategori.id_room_kategori
																			WHERE reservasi.date_out between '$tanggal_awal' and '$tanggal_akhir' AND reservasi.status = 'Y'  ORDER BY reservasi.date_out desc"));
						
			$total = $total_reservasi['jumlah2'] + $total_service2['jumlah1']; 
	
	$data['grand_total'] =  number_format($total, 0 , '' , '.' ).'';
	
				
		$pdf = new CetakPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$pdf->generate($data, "Report CES.pdf");		
	



?>