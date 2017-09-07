<?php 

include "/../../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];

	

if ($page=='kategori' AND $act=='input_kategori'){	
			$nama_kategori = $_POST["nama_kategori"];
			$inisial1 = strtolower($_POST["nama_kategori"]);
			$inisial = str_replace(' ','-',$inisial1);
			$urutan = $_POST['urutan'];
				$sql = " INSERT INTO kategori (nama_kategori, inisial, urutan) values ('$nama_kategori', '$inisial' ,'$urutan')";
						$kueri = mysql_query($sql);
				
				
				header('location:../../media.php?page='.$page);
	}
	
else if ($page=='kategori' AND $act=='update_kategori')
	{
		$nama_kategori = $_POST["nama_kategori"];
		$urutan = $_POST['urutan'];
		$id_kategori = $_POST["id_kategori"];
		$inisial1 = strtolower($_POST["nama_kategori"]);
			$inisial = str_replace(' ','-',$inisial1);
			$sql = " UPDATE kategori SET nama_kategori='$nama_kategori' , inisial = '$inisial', urutan = '$urutan' WHERE id_kategori = '$id_kategori'";
			$kueri = mysql_query($sql);
			header('location:../../media.php?page='.$page);

	}
else if ($page=='kategori' AND $act=='unpublish_kategori')
	{
		
		$id_kategori = $_GET['id_kategori'];
		$kueri = mysql_query("UPDATE kategori SET status='N' WHERE id_kategori ='$id_kategori'");
		
		header('location:../../media.php?page='.$page);

	}
else if ($page=='kategori' AND $act=='publish_kategori')
	{
		$id_kategori = $_GET['id_kategori'];
		$kueri = mysql_query("UPDATE kategori SET status='Y' WHERE id_kategori ='$id_kategori'");
		header('location:../../media.php?page='.$page);

	}
	
else if ($page=='kategori' AND $act=='delete_kategori')
	{
				$id_kategori = $_GET["id_kategori"];
				mysql_query("DELETE FROM kategori WHERE id_kategori = '$id_kategori'");			
					header('Location: ' . $_SERVER['HTTP_REFERER']);



	}
?>