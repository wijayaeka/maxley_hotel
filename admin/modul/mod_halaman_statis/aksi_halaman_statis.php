<?php 

include "../../config/connect.php";
function getExtension($str) 
								{

										 $i = strrpos($str,".");
										 if (!$i) { return ""; } 
										 $l = strlen($str) - $i;
										 $ext = substr($str,$i+1,$l);
										 return $ext;
								 }
$page=$_GET['page'];
$act=$_GET['act'];
			$id_hal_statis = $_POST["id_hal_statis"];
			$id_halstatis = $_GET["id_hal_statis"];
			$nama_halaman_statis = $_POST["nama_halaman_statis"];
			$isi_hal_statis = $_POST["isi_hal_statis"];
						  $gambar_sources     	 = $_FILES['gambar']['tmp_name'];
						  $gambar_type    	  	 = $_FILES['gambar']['type'];
						  $gambar_name			 = $_FILES['gambar']['name'];
						  $ext_gambar			 = getExtension($gambar_name);
						  $gambar		 		= time().substr(str_replace(" ", "_", $txt), 5).".".$ext_gambar;	
						  $direktori_gambar = "../../../upload/static/";		
						$link1 = strtolower($_POST["nama_halaman_statis"]);
						$link2 = str_replace(' ','-',$link1);
						$link3 = str_replace('/','atau',$link2);
						$link = str_replace('&','dan',$link3);

if ($page=='halaman_statis' AND $act=='input_halaman_statis')
	{	
				mysql_query("INSERT INTO halaman_statis (nama_hal_statis, link_hal_statis, isi_hal_statis, gambar) values ('$nama_halaman_statis','$link', '$isi_hal_statis', '$gambar')");
				if (move_uploaded_file($gambar_sources, $direktori_gambar.$gambar))
					{
						header('location:../../media.php?page='.$page);
					}
				
	}
	
else if ($page=='halaman_statis' AND $act=='update_halaman_statis')
	{
		if(!empty($_FILES['gambar']['tmp_name']))
			{
				$sql = mysql_query("Select * from halaman_statis where id_hal_statis = '$id_hal_statis'");
				$r = mysql_fetch_array($sql);
				if(!empty ($r['gambar']))
					{
						$hapus = unlink("../../../upload/static/$r[gambar]");
					}
				
				$query = mysql_query("UPDATE halaman_statis SET 
												nama_hal_statis='$nama_halaman_statis' ,
												isi_hal_statis = '$isi_hal_statis',
												gambar='$gambar', 
												link_hal_statis = '$link' WHERE id_hal_statis = '$id_hal_statis'");
				
				if ($query)
					{
						header('location:../../media.php?page='.$page);
						move_uploaded_file($gambar_sources, $direktori_gambar.$gambar);
					}
					
			}
		else
			{
			
				mysql_query("UPDATE halaman_statis SET 
											nama_hal_statis='$nama_halaman_statis', 
											isi_hal_statis = '$isi_hal_statis',
											link_hal_statis = '$link' WHERE id_hal_statis = '$id_hal_statis'");
				header('location:../../media.php?page='.$page);				
			}
		

	}
	
else if ($page=='halaman_statis' AND $act=='delete_halaman_statis')
	{
			
			
			$sql = mysql_query("Select * from halaman_statis where id_hal_statis = '$id_halstatis'");
				$r = mysql_fetch_array($sql);
				if(!empty ($r['gambar']))
					{
						$hapus = unlink("../../../upload/static/$r[gambar]");
					}
				mysql_query("DELETE From halaman_statis where id_hal_statis = '$id_halstatis'");
				header('location:../../media.php?page='.$page);
	}
?>