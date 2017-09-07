<?php 

include "../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];

	

if ($page=='service' AND $act=='input_service'){	
			
			$nama_service = $_POST["nama_service"];
			$harga = $_POST["harga"];
			$harga = str_replace('.', '', $harga);       // menghilangkan titik dari string harga
			$harga = str_replace(',', '', $harga);       // menghilangkan koma dari string harga
			$harga2 = (int)$harga;                       // mengubah string ke integer lalu simpan dalam variabel harga2
			$stok = $_POST["stok"];
				$sql = " INSERT INTO service (nama_service, harga, stok) values ('$nama_service', '$harga2' ,'$stok')";
						$kueri = mysql_query($sql);
				
				
				header('location:../../media.php?page='.$page);
	}
	
else if ($page=='service' AND $act=='update_service')
	{
		$nama_service = $_POST["nama_service"];
		$harga = $_POST["harga"];
		$harga = str_replace('.', '', $harga);       // menghilangkan titik dari string harga
		$harga = str_replace(',', '', $harga);       // menghilangkan koma dari string harga
		$harga2 = (int)$harga;    
		$id_service = $_POST["id_service"];
		$stok = $_POST["stok"];
		$sql = " UPDATE service SET nama_service='$nama_service' , harga = '$harga2', stok = '$stok' WHERE id_service = '$id_service'";
		$kueri = mysql_query($sql);
		header('location:../../media.php?page='.$page);

	}
else if ($page=='service' AND $act=='delete_service')
	{
				$id_service = $_GET["id"];
				mysql_query("DELETE FROM service WHERE id_service = '$id_service'");			
					header('Location: ' . $_SERVER['HTTP_REFERER']);



	}
?>