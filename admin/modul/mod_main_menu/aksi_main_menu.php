<?php 

include "../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];

	

if ($page=='main_menu' AND $act=='input_main_menu'){	
			$nama_main_menu = $_POST["nama_main_menu"];
			$urutan = $_POST["urutan"];
			$set_as = $_POST['set_as'];
			$inisial1 = strtolower($_POST["nama_main_menu"]);
			$inisial = str_replace(' ','-',$inisial1);
			$status = $_POST['status'];
			
				$sql = " INSERT INTO main_menu (nama_main_menu, set_as, inisial, urutan, status) values ('$nama_main_menu', '$set_as' ,'$inisial' ,'$urutan','$status')";
				mysql_query($sql);
				
				
				header('location:../../media.php?page='.$page);
	}
	
else if ($page=='main_menu' AND $act=='update_main_menu')
	{
			$id_main_menu = $_POST["id_main_menu"];
			$nama_main_menu = $_POST["nama_main_menu"];
			$inisial1 = strtolower($_POST["nama_main_menu"]);
			$inisial = str_replace(' ','-',$inisial1);
			$set_as = $_POST["set_as"];
			$urutan = $_POST['urutan'];
			$status = $_POST['status'];			
			mysql_query("UPDATE main_menu SET nama_main_menu='$nama_main_menu', set_as = '$set_as', inisial = '$inisial', urutan = '$urutan', status = '$status' WHERE id_main_menu = '$id_main_menu'");
			
			header('location:../../media.php?page='.$page);

	}
else if ($page=='main_menu' AND $act=='unpublish_main_menu')
	{
		
		$id_main_menu = $_GET['id_main_menu'];
		$kueri = mysql_query("UPDATE main_menu SET status='N' WHERE id_main_menu ='$id_main_menu'");
		header('location:../../media.php?page='.$page);

	}
else if ($page=='main_menu' AND $act=='publish_main_menu')
	{
		$id_main_menu = $_GET['id_main_menu'];
		$kueri = mysql_query("UPDATE main_menu SET status='Y' WHERE id_main_menu ='$id_main_menu'");
		header('location:../../media.php?page='.$page);

	}
	
else if ($page=='page' AND $act=='delete_page')
	{
				$id_page = $_GET["id_page"];
				mysql_query("DELETE FROM page WHERE id_page = '$id_page'");			
					header('Location: ' . $_SERVER['HTTP_REFERER']);



	}
?>