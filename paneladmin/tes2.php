<?php
	include "tes.php";
   // Ambil Data Dari Database Lokal
   foreach($array as $data)
	{
		$id_reservasi = $data['id_reservasi'];
	
/* ============================================================= */
// Masuk Ke Database Server
  

	echo $id_reservasi;
	
	//Fungsi Connect
	function connectMysql(){
	$dbHost="localhost";
	$dbUser="root";
	$dbPass="";
	$dbName="oop";
		mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
		mysql_select_db($this->dbName) or die ("Database Tidak Ditemukan");
		if(mysql_connect){
				// echo"Koneksi Berhasil";
		}
		else{ echo"Koneksi Gagal"; }
	}
	//Fungsi Clear Data 
	function clear_data($id_hotel){
		$query("Delete FROM reservasi where id_hotel = '$id_hotel'");
		$hasil = mysql_query($query);
	}
	
	//Fungsi Insert
	function tambahAnggota($nama, $alamat, $telepon){
		$query= "INSERT INTO anggota (nama, alamat, telepon) values('$nama','$alamat','$telepon')";
		$hasil = mysql_query($query);
	}
	
	
	}
	
?>