<?php 

include "/../../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];

	

if ($page=='template' AND $act=='add_template'){	
			
			$nama_template = $_POST["nama_template"];
			$folder = $_POST["folder"];
			$sql = "INSERT INTO template (nama_template, folder) values ('$nama_template','$folder' )";
			$kueri = mysql_query($sql);
				
				
				header('location:../../media.php?page='.$page);
	}
	
else if ($page=='template' AND $act=='update_template')
	{
			$nama_template = $_POST["nama_template"];
			$id_template = $_POST["id_template"];
			$folder = $_POST["folder"];
			$sql = " UPDATE template SET nama_template = '$nama_template', folder = '$folder' WHERE id_template = '$id_template'";
			$kueri = mysql_query($sql);
				header('location:../../media.php?page='.$page);

	}
	
else if ($page=='template' AND $act=='delete_template')
	{
					$id_template = $_GET['id_template'];													
					mysql_query("DELETE FROM template WHERE id_template = '$id_template'");			
				
					header('Location: ' . $_SERVER['HTTP_REFERER']);



	}
else if ($page=='template' AND $act=='active')
	{
				  $query1=mysql_query("UPDATE template SET status='Y' WHERE id_template='$_GET[id_template]'");
					$query2=mysql_query("UPDATE template SET status='N' WHERE id_template!='$_GET[id_template]'");
		 
				header('Location: ' . $_SERVER['HTTP_REFERER']);



	}
				





	

?>