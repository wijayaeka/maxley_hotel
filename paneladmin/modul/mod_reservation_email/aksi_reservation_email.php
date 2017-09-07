<?php 

include "../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];

	

if ($page=='reservation_email' AND $act=='input_email'){	
			
			$nama_email = $_POST["nama_email"];
			$alamat_email = $_POST["alamat_email"];
			
				$sql = " INSERT INTO email_penerima_reservasi (nama_email, alamat_email) values ('$nama_email', '$alamat_email')";
						$kueri = mysql_query($sql);
				
				
				header('location:../../media.php?page='.$page);
	}
	
else if ($page=='reservation_email' AND $act=='update_email')
	{
			$id_email = $_POST["id_email"];
			$nama_email = $_POST["nama_email"];
			$alamat_email = $_POST["alamat_email"];
			
				$sql = " UPDATE email_penerima_reservasi SET nama_email='$nama_email' , alamat_email = '$alamat_email' WHERE id_email = '$id_email'";
				
			
			$kueri = mysql_query($sql);
			header('location:../../media.php?page='.$page);

	}
else if ($page=='reservation_email' AND $act=='delete_email')
	{
				$id_email = $_GET["id"];
				mysql_query("DELETE FROM email_penerima_reservasi WHERE id_email = '$id_email'");			
					header('Location: ' . $_SERVER['HTTP_REFERER']);



	}
?>