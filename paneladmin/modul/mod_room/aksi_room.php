<?php 

include "../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];

	

if ($page=='rooms' AND $act=='input_room')

	{	
			$id_room_kategori = $_POST['id_room_kategori'];
			$nmr_room = $_POST['nmr_room'];
			$status = $_POST['status'];
				
			$sql = "INSERT INTO room (id_room_kategori	,nmr_room, status) values ('$id_room_kategori','$nmr_room','$status')";
						$kueri = mysql_query($sql);
				
				header('location:../../media.php?page='.$page);
	}
	
else if ($page=='rooms' AND $act=='update_room')
	{
		$id_room = $_POST['id_room'];
		$id_room_kategori = $_POST['id_room_kategori'];
		$nmr_room = $_POST['nmr_room'];
		$status = $_POST['status'];
		$sql = " UPDATE room SET id_room_kategori = '$id_room_kategori', nmr_room='$nmr_room', status = '$status' WHERE id_room = '$id_room'";
		$kueri = mysql_query($sql);
			header('location:../../media.php?page='.$page);

	}

	
else if ($page=='rooms' AND $act=='delete_room')
	{
				$id_room = $_GET['id_room'];
				
				mysql_query("DELETE FROM room WHERE id_room = '$id_room'");			
					header('Location: ' . $_SERVER['HTTP_REFERER']);



	}
?>