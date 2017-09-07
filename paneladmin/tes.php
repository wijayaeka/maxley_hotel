<?php
include "class_upload.php";
/* AKSI RESERVASI
------------------------------------------------------
*/
	$db = new server();
	$array_reservasi = new ambilreservasi();
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
    $array_detailreservasiroom = ambildetailreservasiroom();
		
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

?>