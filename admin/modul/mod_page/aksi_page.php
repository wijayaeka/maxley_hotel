<?php 

include "../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];

	

if ($page=='page' AND $act=='input_page'){	
			$id_kategori_page = $_POST["id_kategori_page"];
			$nama_page = $_POST["nama_page"];
			$link = $_POST['link'];
			$urutan = $_POST['urutan'];
			$status_page = $_POST['status_page'];
			
				$sql = " INSERT INTO page (nama_page, id_kategori_page, link, urutan, status_page) values ('$nama_page', '$id_kategori_page' ,'$link', '$urutan',  '$status_page')";
				mysql_query($sql);
				
				
				header('location:../../media.php?page='.$page);
	}
	
else if ($page=='page' AND $act=='update_page')
	{
			$id_page = $_POST["id_page"];
			$id_kategori_page = $_POST["id_kategori_page"];
			$nama_page = $_POST["nama_page"];
			$link = $_POST['link'];
			$urutan = $_POST['urutan'];
			$status_page = $_POST['status_page'];				
			$sql = " UPDATE page SET nama_page='$nama_page' , id_kategori_page = '$id_kategori_page', link = '$link', urutan = '$urutan', status_page = '$status_page' WHERE id_page = '$id_page'";
			$kueri = mysql_query($sql);
			header('location:../../media.php?page='.$page);

	}
else if ($page=='page' AND $act=='unpublish_page')
	{
		
		$id_page = $_GET['id_page'];
		$kueri = mysql_query("UPDATE page SET status_page='N' WHERE id_page ='$id_page'");
		
		header('location:../../media.php?page='.$page);

	}
else if ($page=='page' AND $act=='publish_page')
	{
		$id_page = $_GET['id_page'];
		$kueri = mysql_query("UPDATE page SET status_page='Y' WHERE id_page ='$id_page'");
		header('location:../../media.php?page='.$page);

	}
	
else if ($page=='page' AND $act=='delete_page')
	{
				$id_page = $_GET["id_page"];
				mysql_query("DELETE FROM page WHERE id_page = '$id_page'");			
					header('Location: ' . $_SERVER['HTTP_REFERER']);



	}
?>