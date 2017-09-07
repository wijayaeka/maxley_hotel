<?php 

include "../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];

	

if ($page=='room_kategori' AND $act=='input_room_kategori')

	{	
			$nama_room_kategori = $_POST["nama_room_kategori"];
			$harga = $_POST["harga"];
				
				$sql = "INSERT INTO room_kategori (nama_room_kategori, harga) values ('$nama_room_kategori','$harga')";
						$kueri = mysql_query($sql);
				
				header('location:../../media.php?page='.$page);
	}
	
else if ($page=='room_kategori' AND $act=='update_room_kategori')
	{
		$id_room_kategori = $_POST['id_room_kategori'];
		$nama_room_kategori = $_POST["nama_room_kategori"];
		$harga = $_POST["harga"];
		$sql = " UPDATE room_kategori SET nama_room_kategori = '$nama_room_kategori', harga = '$harga' WHERE id_room_kategori = '$id_room_kategori'";
		$kueri = mysql_query($sql);
			header('location:../../media.php?page='.$page);

	}

	
else if ($page=='room_kategori' AND $act=='delete_room_kategori')
	{
				$id_room_kategori = $_GET['id_room_kategori'];
				
				mysql_query("DELETE FROM room_kategori WHERE id_room_kategori = '$id_room_kategori'");			
					header('Location: ' . $_SERVER['HTTP_REFERER']);



	}
?>