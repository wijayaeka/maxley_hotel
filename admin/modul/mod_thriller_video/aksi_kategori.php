<?php 

include "../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];

	

if ($page=='kategori_berita' AND $act=='input_kategori'){	
			$nama_kategori = $_POST["nama_kategori"];
			$inisial1 = strtolower($_POST["nama_kategori"]);
			$inisial = str_replace(' ','-',$inisial1);
			$urutan = $_POST['urutan'];
			$sql = " INSERT INTO kategori_berita (nama_kategori, inisial, urutan) values ('$nama_kategori', '$inisial' ,'$urutan')";
			$kueri = mysql_query($sql);
				
			// $data ='	
						// <IfModule mod_rewrite.c>
						// RewriteEngine on
								// RewriteRule ^'.$inisial.'-(.*)-(.*)\.html$ index.php?media=$1&urutan=$2 [L,NC]
						// Options All -Indexes
						// </IfModule>
						
						
					// ';
			// $f = fopen("../../../.htaccess", "a+");
			// fwrite($f, $data);
			// fclose($f);
			header('location:../../media.php?page='.$page);
	}
	
else if ($page=='kategori_berita' AND $act=='update_kategori')
	{
			$id_kategori = $_POST["id_kategori"];
			$nama_kategori = $_POST["nama_kategori"];
			$inisial1 = strtolower($_POST["nama_kategori"]);
			$inisial = str_replace(' ','-',$inisial1);
			$urutan = $_POST['urutan'];
			$sql = "UPDATE kategori_berita SET nama_kategori='$nama_kategori' , inisial = '$inisial', urutan = '$urutan' WHERE id_kategori = '$id_kategori'";
			$kueri = mysql_query($sql);
			// $data ='	
						// <IfModule mod_rewrite.c>
						// RewriteEngine on
								// RewriteRule ^'.$inisial.'-(.*)-(.*)\.html$ index.php?media=$1&urutan=$2 [L,NC]
						// Options All -Indexes
						// </IfModule>
						
						
					// ';
			// $f = fopen("../../../.htaccess", "a+");
			// fwrite($f, $data);
			// fclose($f);
			header('location:../../media.php?page='.$page);

	}
else if ($page=='kategori_berita' AND $act=='unpublish_kategori')
	{
		
		$id_kategori = $_GET['id_kategori'];
		$kueri = mysql_query("UPDATE kategori_berita SET status='N' WHERE id_kategori ='$id_kategori'");
		
		header('location:../../media.php?page='.$page);

	}
else if ($page=='kategori_berita' AND $act=='publish_kategori')
	{
		$id_kategori = $_GET['id_kategori'];
		$kueri = mysql_query("UPDATE kategori_berita SET status='Y' WHERE id_kategori ='$id_kategori'");
		header('location:../../media.php?page='.$page);

	}
	
else if ($page=='kategori_berita' AND $act=='delete_kategori')
	{
				$id_kategori = $_GET["id_kategori"];
				mysql_query("DELETE FROM kategori_berita WHERE id_kategori = '$id_kategori'");			
					header('Location: ' . $_SERVER['HTTP_REFERER']);



	}
?>