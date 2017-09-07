<?php 

include "../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];

$id_komentar = $_GET["id_komentar"];	
	if ($page=='komentar' AND $act=='unpublish_komentar')
	{
		
		mysql_query("UPDATE komentar SET status_komentar='N' WHERE id_komentar ='$id_komentar'");
		
		header('location:../../media.php?page='.$page);

	}
else if ($page=='komentar' AND $act=='publish_komentar')
	{
		
		 mysql_query("UPDATE komentar SET status_komentar='Y' WHERE id_komentar ='$id_komentar'");
		header('Location: ' . $_SERVER['HTTP_REFERER']);

	}
	
else if ($page=='komentar' AND $act=='delete_komentar')
	{
				
				mysql_query("DELETE FROM komentar WHERE id_komentar = '$id_komentar'");			
					header('location:../../media.php?page='.$page);



	}
?>