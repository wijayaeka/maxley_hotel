<?php 

/*==============================================  
	AMBIL DATA LOKAL
==============================================    */
include "../config/connect.php";

// Fungsi Ambil Data Reservasi
	function ambilreservasi() {
      $reservasi=mysql_query("SELECT * FROM reservasi ORDER BY id_reservasi");
	    while($row=mysql_fetch_array($reservasi))
		    $data[]=$row;
	      return $data;
   }
  //Inisial array data reservasi room
	$array_reservasi = ambilreservasi();
/*=========================================================================================*/	
	
// Fungsi Ambil Data Detail Reservasi Room
	function ambildetailreservasiroom() {
      $query=mysql_query("SELECT * FROM detail_reservasi_room ORDER BY id_reservasi");
	    while($row=mysql_fetch_array($query))
		    $data[]=$row;
	      return $data;
   }
   //Inisial array data detail reservasi room
    $array_detailreservasiroom = ambildetailreservasiroom();
/*=========================================================================================*/
	
// Fungsi Ambil Data Detail Service
	function ambilservice() {
      $query=mysql_query("SELECT * FROM service ORDER BY id_service");
	    while($row=mysql_fetch_array($query))
		    $data[]=$row;
	      return $data;
   }
   //Inisial array data detail  rervice
    $array_service = ambilservice();
/*=========================================================================================*/

  // Fungsi Ambil Data Detail Reservasi Service
	function ambildetailreservasservice() {
      $query=mysql_query("SELECT * FROM detail_reservasi_service ORDER BY id_detail_reservasi_service");
	    while($row=mysql_fetch_array($query))
		    $data[]=$row;
	      return $data;
   }
   //Inisial array data detail reservasi service
    $array_detailreservasiservcie = ambildetailreservasservice();
	
/*=========================================================================================*/
   // Fungsi Ambil Data Customer
	function ambilcustomer() {
      $query=mysql_query("SELECT * FROM customer ORDER BY id_customer");
	    while($row=mysql_fetch_array($query))
		    $data[]=$row;
	      return $data;
   }
   //Inisial array data customer
    $array_customer = ambilcustomer();
  
/*=========================================================================================*/
   // Fungsi Ambil Data Room
	function ambilroom() {
      $query=mysql_query("SELECT * FROM room ORDER BY id_room");
	    while($row=mysql_fetch_array($query))
		    $data[]=$row;
	      return $data;
   }
   //Inisial array data customer
    $array_room = ambilroom();
	
/*=========================================================================================*/
   // Fungsi Ambil Data Kategori Room
	function ambilroomkategori() {
      $query=mysql_query("SELECT * FROM room_kategori ORDER BY id_room_kategori");
	    while($row=mysql_fetch_array($query))
		    $data[]=$row;
	      return $data;
   }
   //Inisial array data customer
    $array_roomkategori = ambilroomkategori();
	

  
  
  
  

/*==============================================  
	MASUK KE SERVER
==============================================    */
class server{
		//properti
		private $dbHost="localhost";
		private $dbUser="root";
		private $dbPass="";
		private $dbName="server";
		function connectMysql(){
			mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
			mysql_select_db($this->dbName) or die ("Database Tidak Ditemukan");
		}

	/* FUNGSI RESERVASI
	------------------------------------------------------
	*/
	function insertreservasi($id_reservasi,$id_room_kategori,$room_amount,$date_in,$date_out,$price,$status,$id_req,$id_app,$id_checkin,$id_checkout){
		$query= "INSERT INTO reservasi (id_reservasi,id_room_kategori,room_amount,date_in,date_out,price,status,id_req,id_app,id_checkin,id_checkout)
		values('$id_reservasi','$id_room_kategori','$room_amount','$date_in','$date_out','$price','$status','$id_req','$id_app','$id_checkin','$id_checkout')";
			$hasil = mysql_query($query);
		}
		function clearreservasi($id_reservasi){
			$query= "DELETE FROM reservasi";
			$hasil = mysql_query($query);
		}

		
	/* FUNGSI DETAIL RESERVASI ROOM
	------------------------------------------------------
	*/
	function insertdetailreservasiroom($id_detail_reservasi_room,$id_reservasi,$id_room){
		$query= "INSERT INTO detail_reservasi_room (id_detail_reservasi_room,id_reservasi,id_room)
		values('$id_detail_reservasi_room','$id_reservasi','$id_room')";
			$hasil = mysql_query($query);
		}
		function cleardetailreservasiroom($id_detail_reservasi_room){
			$query= "DELETE FROM detail_reservasi_room where id_detail_reservasi_room = '$id_detail_reservasi_room' ";
			$hasil = mysql_query($query);
		}
		
		
	/* FUNGSI SERVICE
	------------------------------------------------------
	*/
	function insertdetailreservasiservice($id_detail_reservasi_service,$id_reservasi,$id_service){
		$query= "INSERT INTO detail_reservasi_service (id_detail_reservasi_service,id_reservasi,id_service)
		values('$id_detail_reservasi_service','$id_reservasi','$id_service')";
			$hasil = mysql_query($query);
		}
		function cleardetailreservasiservice($id_detail_reservasi_service){
			$query= "DELETE FROM detail_reservasi_service where id_detail_reservasi_service = '$id_detail_reservasi_service' ";
			$hasil = mysql_query($query);
		}
		
			
	/* FUNGSI DETAIL RESERVASI SERVICE
	------------------------------------------------------
	*/
	function insertservice($id_service,$nama_service,$harga, $stok, $status  ){
		$query= "INSERT INTO service (id_service, nama_service, harga, stok, status)
		values('$id_service','$nama_service','$harga','$stok','$status')";
			$hasil = mysql_query($query);
		}
		function clearservice($id_detail_reservasi_service){
			$query= "DELETE FROM service where id_service = '$id_service' ";
			$hasil = mysql_query($query);
		}
		
		
	/* FUNGSI DETAIL CUSTOMER
	------------------------------------------------------
	*/
	function insertcustomer($id_reservasi,$title,$first_name,$last_name,$address,$city,$state,$postal_code,$country,$mobile_phone,$home_phone,$email){
		$query= "INSERT INTO customer (id_reservasi, title, first_name, last_name, address, city, state, postal_code, country, mobile_phone, home_phone, email)
		values('$id_reservasi', '$title','$first_name','$last_name','$address','$city','$state','$postal_code','$country','$mobile_phone','$home_phone','$email')";
			$hasil = mysql_query($query);
		}
		function clearcustomer($id_customer){
			$query= "DELETE FROM customer where id_customer = '$id_customer' ";
			$hasil = mysql_query($query);
		}
		
		
	/* FUNGSI ROOM
	------------------------------------------------------
	*/
	function insertroom($id_room,$id_room_kategori,$nmr_room,$status){
		$query= "INSERT INTO room (id_room, id_room_kategori , nmr_room, status)
		values('$id_room','$id_room_kategori','$nmr_room','$status')";
			$hasil = mysql_query($query);
		}
		function clearroom($id_customer){
			$query= "DELETE FROM room where id_room = '$id_room' ";
			$hasil = mysql_query($query);
		}
		
		
		/* FUNGSI ROOM KATEGORI
	------------------------------------------------------
	*/
	function insertroomkategori($id_room_kategori,$nama_room_kategori,$harga){
		$query= "INSERT INTO room_kategori (id_room_kategori, nama_room_kategori , harga)
		values('$id_room_kategori','$nama_room_kategori','$harga')";
			$hasil = mysql_query($query);
		}
		function clearroomkategori($id_room_kategori){
			$query= "DELETE FROM room_kategori where id_room_kategori = '$id_room_kategori' ";
			$hasil = mysql_query($query);
		}
		
		
		
	
}





?>