<?php
	include "../../../config/connect.php";

	$data = $_GET['id'];
	
	
	$sql = mysql_query("Select * from halaman_statis where id_hal_statis = '$data'");
	$r = mysql_fetch_array($sql);
	 unlink("../../../upload/static/$r[gambar]");
		mysql_query("update  halaman_statis  set gambar = '' WHERE id_hal_statis = '$data'");
	
?>
