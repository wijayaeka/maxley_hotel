<?php 

include "../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];

if ($page=='admin' AND $act=='input_admin'){	
			$nama_lengkap = $_POST["nama_lengkap"];
			$username = $_POST["username"];
			$password = md5($_POST["password"]);
			$email = $_POST['email'];
			$no_telp = $_POST['no_telp'];
			$status = $_POST['status'];
			$sql = " INSERT INTO admin (nama_lengkap, username, password, email, no_telp, status) values ('$nama_lengkap', '$username' ,'$password', '$email' ,'$no_telp', '$status')";
			$kueri = mysql_query($sql);
				
				
				header('location:../../media.php?page='.$page);
	}
	
else if ($page=='admin' AND $act=='update_admin')
	{
			$id_admin = $_POST["id_admin"];
			$nama_lengkap = $_POST["nama_lengkap"];
			$username = $_POST["username"];
			$password = md5($_POST["password"]);
			$email = $_POST['email'];
			$no_telp = $_POST['no_telp'];
			$status = $_POST['status'];
			if (empty($_POST["password"]))
				{		
				
				$sql = " UPDATE admin SET nama_lengkap='$nama_lengkap' , username = '$username', email = '$email', status = '$status' WHERE id_admin = '$id_admin'";
				}
			else {
				$sql = " UPDATE admin SET nama_lengkap='$nama_lengkap' , no_telp = '$no_telp', email = '$email', username = '$username', password = '$password', status = '$status' WHERE id_admin = '$id_admin'";
			
				}
			
			$kueri = mysql_query($sql);
			header('location:../../media.php?page='.$page);
	}

else if ($page=='admin' AND $act=='delete_admin')
	{
				$id_admin = $_GET["id_admin"];
				mysql_query("DELETE FROM admin WHERE id_admin = '$id_admin'");			
					header('Location: ' . $_SERVER['HTTP_REFERER']);



	}
?>