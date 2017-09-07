<?php
include "class_upload.php";
/* AKSI RESERVASI
------------------------------------------------------
*/
	$db = new server();
	$db->connectMysql();
	//Clear Data
		// $db->clearreservasi($data_reservasi['id_reservasi']);
   // LOOPING DATA LOKAL DAN INSERT KE SERVER
   foreach($array_reservasi as $data_reservasi)
	{
		
		//Insert Data
		$db->insertreservasi(
			$data_reservasi['id_reservasi'],
			$data_reservasi['id_room_kategori'],
			$data_reservasi['room_amount'],
			$data_reservasi['date_in'],
			$data_reservasi['date_out'],
			$data_reservasi['price'],
			$data_reservasi['status'],
			$data_reservasi['id_req'],
			$data_reservasi['id_app'],
			$data_reservasi['id_checkin'],
			$data_reservasi['id_checkout']
			);
	}

	
/* AKSI DETAIL RESERVASI ROOM
------------------------------------------------------
*/
	$db = new server();
	$db->connectMysql();
		
	//Clear Data
	$db->cleardetailreservasiroom($array_detailreservasiroom['id_detail_reservasi_room']);
	
   // LOOPING DATA LOKAL DAN INSERT KE SERVER
   foreach($array_detailreservasiroom as $data_detail_reservasi_room)
	{
		//Insert Data
		$db->insertdetailreservasiroom(
			$data_detail_reservasi_room['id_detail_reservasi_room'],
			$data_detail_reservasi_room['id_reservasi'],
			$data_detail_reservasi_room['id_room']
			);
	}

	
/* AKSI DETAIL RESERVASI SERVICE
------------------------------------------------------
*/
	$db = new server();
	$db->connectMysql();		
	// Clear Data
	// $db->cleardetailreservasiservice($array_detailreservasiservice['id_detail_reservasi_service']);
	
   // LOOPING DATA LOKAL DAN INSERT KE SERVER
   foreach($array_detailreservasiservcie as $data_detail_reservasi_service)
	{
		// Insert Data
		$db->insertdetailreservasiservice(
			$data_detail_reservasi_service['id_detail_reservasi_service'],
			$data_detail_reservasi_service['id_reservasi'],
			$data_detail_reservasi_service['id_service']
			);
	}
	
/* AKSI SERVICE
------------------------------------------------------
*/
	$db = new server();
	$db->connectMysql();		
	// Clear Data
	$db->clearservice($array_service['id_service']);
	
   // LOOPING DATA LOKAL DAN INSERT KE SERVER
   foreach($array_service as $data_service)
	{
		// Insert Data
		$db->insertservice(
			$data_service['id_service'],
			$data_service['nama_service'],
			$data_service['harga'],
			$data_service['stok'],
			$data_service['status']
			);
	}
	
	
/* AKSI CUSTOMER
------------------------------------------------------
*/
	$db = new server();
	$db->connectMysql();		
	// Clear Data
	$db->clearcustomer($array_customer['id_customer']);
	
   // LOOPING DATA LOKAL DAN INSERT KE SERVER
   foreach($array_customer as $data_customer)
	{
		// Insert Data
		$db->insertcustomer(
			$data_customer['id_reservasi'],
			$data_customer['title'],
			$data_customer['first_name'],
			$data_customer['last_name'],
			$data_customer['address'],
			$data_customer['city'],
			$data_customer['state'],
			$data_customer['postal_code'],
			$data_customer['country'],
			$data_customer['mobile_phone'],
			$data_customer['home_phone'],
			$data_customer['email']
			);
	}
	
	
/* AKSI ROOM
------------------------------------------------------
*/
	$db = new server();
	$db->connectMysql();		
	// Clear Data
	$db->clearroom($array_room['id_room']);
	
   // LOOPING DATA LOKAL DAN INSERT KE SERVER
   foreach($array_room as $data_room)
	{
		// Insert Data
		$db->insertroom(
			$data_room['id_room'],
			$data_room['id_room_kategori'],
			$data_room['nmr_room'],
			$data_room['status']
			);
	}
	

	/* AKSI ROOM KATEGORI
------------------------------------------------------
*/
	$db = new server();
	$db->connectMysql();		
	// Clear Data
	$db->clearroomkategori($array_roomkategori['id_room_kategori']);
	
   // LOOPING DATA LOKAL DAN INSERT KE SERVER
   foreach($array_roomkategori as $data_room_kategori)
	{
		// Insert Data
		$db->insertroomkategori(
			$data_room_kategori['id_room_kategori'],
			$data_room_kategori['nama_room_kategori'],
			$data_room_kategori['harga']
			);
	}
	

	
	
	
	
	
	
	
	
	
?>