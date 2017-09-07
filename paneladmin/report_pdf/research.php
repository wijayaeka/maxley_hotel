<?php
define('K_TCPDF_EXTERNAL_CONFIG',1);
require_once("libraries/tcpdf/config/tcpdf_config_pdf.php");
require_once("tcpdf_lib.php");
require_once("fungsi_date.php");
$tcpdf_lib = new tcpdf_lib();
require_once("templates/temp_ces.php");
include "connect.php";
		//  ROOM DETAIL
		$query_room_detail = mysql_query("select * from detail_reservasi_room 
												CROSS JOIN room on detail_reservasi_room.id_room = room.id_room
												CROSS JOIN room_kategori on room_kategori.id_room_kategori	 = room.id_room_kategori
												where id_reservasi = 'DFC75978' ");
		$room_detail=array();
		while($rs=mysql_fetch_array($query_room_detail)){
			$room_detail[]=$rs;
			$data['room_detail'] = $room_detail;
		}
		
		
		//  Customer DETAIL
		$admin_request = mysql_fetch_array(mysql_query("select * from reservasi CROSS JOIN admin on reservasi.id_req = admin.id_admin where reservasi.id_reservasi = 'DFC75978' "));
		$admin_app = mysql_fetch_array(mysql_query("select * from reservasi CROSS JOIN admin on reservasi.id_app = admin.id_admin  where reservasi.id_reservasi = 'DFC75978'"));
		$admin_checkin = mysql_fetch_array(mysql_query("select * from reservasi CROSS JOIN admin on reservasi.id_checkin = admin.id_admin  where reservasi.id_reservasi = 'DFC75978' "));
			
		$query_customer = mysql_query("select * from reservasi
								cross join customer on customer.id_reservasi = reservasi.id_reservasi 
								cross join room_kategori on room_kategori.id_room_kategori = reservasi.id_room_kategori 
								where reservasi.id_reservasi  = 'DFC75978' ");
		$customer=array();
		while($cs=mysql_fetch_array($query_customer)){
			$cs['admin_req'] =  $admin_request['nama_admin'];
			$cs['admin_app'] =  $admin_app['nama_admin'];
			$cs['admin_checkin'] =  $admin_checkin['nama_admin'];
		
			$customer[]=$cs;
			$data['customer_data'] = $customer;
			$data['reservasi_detail'] = $customer;
		}
		
		
		
		
		
		//  Total Room
		
		$total_room_query = mysql_query("select sum(price) as jumlah , room_amount, date_in, date_out FROM  reservasi 
												CROSS JOIN room_kategori on reservasi.id_room_kategori = room_kategori.id_room_kategori
												where reservasi.id_reservasi  = 'DFC75978' ");
		$data1=array();
		while($tr=mysql_fetch_array($total_room_query)){
			$tr['hari'] = dateDiff("-",$tr['date_out'],$tr['date_in']);
			$total = $tr['jumlah'] * $tr['room_amount'];
			$tr['harga'] = $total = number_format($total, 0 , '' , '.' ).'';
			$data1[]=$tr;
			
			$data['total_room'] = $data1;
		}
		
		//Service
		$query_service = mysql_query("select * from detail_reservasi_service  
								CROSS JOIN service on detail_reservasi_service.id_service = service.id_service 
								where detail_reservasi_service.id_reservasi = 'DFC75978' ");
		
		$service=array();
		while($s=mysql_fetch_array($query_service)){
			$total = $s['harga'];
			$s['harga'] = $total = number_format($total, 0 , '' , '.' ).'';
			$service[]=$s;
			$data['service'] = $service;
		}
		
		
		//grand total
		$total_service = mysql_fetch_array(mysql_query("select sum(price) as jumlah , room_amount FROM  reservasi 
												CROSS JOIN room_kategori on reservasi.id_room_kategori = room_kategori.id_room_kategori
												where reservasi.id_reservasi = 'DFC75978'"));
												
		$query_grand = mysql_query("select sum(harga) as jumlah2 FROM  service 
												CROSS JOIN detail_reservasi_service on detail_reservasi_service.id_service = service.id_service
												where detail_reservasi_service.id_reservasi =  'DFC75978' ");
		
		$data2=array();
		while($gt=mysql_fetch_array($query_grand)){
			$res_total = $total_service['jumlah'] * $total_service['room_amount'];
			$grand_total = $gt['jumlah2'] + $res_total;
			$gt['grand_total'] =  number_format($grand_total, 0 , '' , '.' ).'';
			$data2[]=$gt;
			$data['grand'] = $data2;
		}
		
		$pdf = new CetakPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$pdf->generate($data, "Report CES.pdf");		
	



?>