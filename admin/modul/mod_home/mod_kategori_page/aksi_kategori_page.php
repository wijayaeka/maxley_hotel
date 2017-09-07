<?php 

include "../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];

	

if ($page=='kategori_page' AND $act=='input_kategori_page'){	
			$jenis_page = $_POST["jenis_page"];
			$inisial1 = strtolower($_POST["jenis_page"]);
			$inisial = str_replace(' ','-',$inisial1);
				$sql = " INSERT INTO kategori_page (jenis_page, inisial ) values ('$jenis_page', '$inisial')";
						$kueri = mysql_query($sql);
				
				header('location:../../media.php?page='.$page);
	}
	
else if ($page=='kategori_page' AND $act=='update_kategori_page')
	{
		$id_kategori_page = $_POST["id_kategori_page"];
		$jenis_page = $_POST["jenis_page"];
		$inisial1 = strtolower($_POST["jenis_page"]);
		$inisial = str_replace(' ','-',$inisial1);
		
			$sql = " UPDATE kategori_page SET jenis_page='$jenis_page', inisial='$inisial' WHERE id_kategori_page = '$id_kategori_page'";
			$kueri = mysql_query($sql);
			header('location:../../media.php?page='.$page);

	}
	
else if ($page=='kategori_page' AND $act=='delete_kategori_page')
	{
				$id_kategori_page = $_GET["id_kategori_page"];
				mysql_query("DELETE FROM kategori_page WHERE id_kategori_page = '$id_kategori_page'");			
				header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>