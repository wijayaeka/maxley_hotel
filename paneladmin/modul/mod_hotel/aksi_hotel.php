<?php 

include "../../config/connect.php";
$page=$_GET['page'];


function StyleId(){ 
		$create = md5(uniqid(rand(),true)); 
		$style = substr($create,0,8);
		return $style;
	}
$id = $_POST['id'];
$nama_hotel = $_POST['nama_hotel'];
$alamat = $_POST['alamat'];
$deskripsi = $_POST['deskripsi'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];

$unik = StyleId();
$inisial = strtoupper (substr($nama_hotel,0,3));
$id_hotel = $inisial."_".$unik;

// echo $id_hotel."</br>";
// echo $nama_hotel."</br>";
// echo $alamat."</br>";
// echo $no_telp."</br>";
// echo $email."</br>";
mysql_query("UPDATE hotel set id_hotel ='$id_hotel' ,nama_hotel='$nama_hotel', deskripsi='$deskripsi', alamat='$alamat', no_telp='$no_telp', email='$email' ");
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>