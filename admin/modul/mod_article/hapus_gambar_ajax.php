<?php
	include "../../../config/connect.php";

	$data = $_GET['id'];
	
	
	$sql = mysql_query("Select * from article where id_article = '$data'");
	$r = mysql_fetch_array($sql);
	 unlink("../../../upload/file_article/gambar_article/$r[gambar]");
		mysql_query("update  article  set gambar = '' WHERE id_article = '$data'");
	
?>
