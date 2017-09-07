<?php 

include "../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];

	

if ($page=='subpage' AND $act=='input_subpage'){	
			$id_page = $_POST["id_page"];
			$nama_subpage = $_POST["nama_subpage"];
			$link_subpage = $_POST['link_subpage'];
			$status_subpage = $_POST['status_subpage'];
			$urutan = $_POST['urutan'];
			$sql = "INSERT INTO sub_page(nama_subpage, id_page, link_subpage, status_subpage, urutan) values ('$nama_subpage', '$id_page' ,'$link_subpage', '$status_subpage' , '$urutan')";
			mysql_query($sql);
			header('location:../../media.php?page='.$page);
	}
	
else if ($page=='subpage' AND $act=='update_subpage')
	{
			$id_subpage = $_POST["id_subpage"];
			$id_page = $_POST["id_page"];
			$nama_subpage = $_POST["nama_subpage"];
			$link_subpage = $_POST['link_subpage'];
			$status_subpage = $_POST['status_subpage'];			
			$urutan = $_POST['urutan'];			
			$sql = " UPDATE sub_page SET nama_subpage='$nama_subpage' , id_page = '$id_page', link_subpage = '$link_subpage', status_subpage = '$status_subpage', urutan = '$urutan' WHERE id_subpage = '$id_subpage'";
			$kueri = mysql_query($sql);
			header('location:../../media.php?page='.$page);

	}
else if ($page=='subpage' AND $act=='unpublish_subpage')
	{
		
		$id_subpage = $_GET['id_subpage'];
		$kueri = mysql_query("UPDATE sub_page SET status_subpage='N' WHERE id_subpage ='$id_subpage'");
		
		header('location:../../media.php?page='.$page);

	}
else if ($page=='subpage' AND $act=='publish_page')
	{
		$id_subpage = $_GET['id_subpage'];
		$kueri = mysql_query("UPDATE sub_page SET status_subpage='Y' WHERE id_subpage ='$id_subpage'");
		header('location:../../media.php?page='.$page);

	}
	
else if ($page=='subpage' AND $act=='delete_subpage')
	{
				$id_subpage = $_GET["id_subpage"];
				mysql_query("DELETE FROM sub_page WHERE id_subpage = '$id_subpage'");			
					header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>