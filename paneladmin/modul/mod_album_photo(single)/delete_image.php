<?php
	include "../../config/connect.php";

	$data = $_GET['id'];
	
	
	$sql = mysql_query("Select * from gallery_photo where id_gallery_photo = '$data'");
	$r = mysql_fetch_array($sql);
	// echo $data;
	$hapus = unlink("../../../upload/album_photo/$r[photo]");
	
	mysql_query("DELETE FROM gallery_photo WHERE id_gallery_photo = '$data'");
	
	
?>
