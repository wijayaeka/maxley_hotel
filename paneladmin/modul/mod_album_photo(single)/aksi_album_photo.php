<?php 

include "../../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];

	

if ($page=='album_photo' AND $act=='input_album_photo'){	
			$nama_album_photo = $_POST["nama_album_photo"];
			$gen_code_photo = $_POST["gen_code_photo"];
			$id_menu = $_POST["id_menu"];
			
				mysql_query("INSERT INTO album_photo (nama_album_photo,gen_code_photo,id_menu) values ('$nama_album_photo','$gen_code_photo','$id_menu')");
				header('location:../../media.php?page='.$page);
	}
	
else if ($page=='album_photo' AND $act=='update_album_photo')
	{
		$id_album_photo = $_POST["id_album_photo"];
		$nama_album_photo = $_POST["nama_album_photo"];
		$id_menu = $_POST["id_menu"];
			$sql = " UPDATE album_photo SET nama_album_photo='$nama_album_photo', id_menu='$id_menu' WHERE id_album_photo = '$id_album_photo'";
			$kueri = mysql_query($sql);
			header('location:../../media.php?page='.$page);

	}
	
else if ($page=='album_photo' AND $act=='delete_album_photo')
	{
				$id_album_photo = $_GET["id_album_photo"];
				$query = mysql_query("select * from gallery_photo 
									CROSS JOIN album_photo on album_photo.gen_code_photo = gallery_photo.gen_code_photo
									WHERE album_photo.id_album_photo = '$id_album_photo' ");
				while($cek_album = mysql_fetch_array($query))
				{
					if (!empty($cek_album['photo']))
					{
						unlink("../../../upload/album_photo/$cek_album[photo]");
						mysql_query("DELETE FROM album_photo WHERE id_album_photo = '$id_album_photo'");		
						mysql_query("DELETE FROM gallery_photo WHERE gen_code_photo = '$cek_album[gen_code_photo]'");		
					}
				
				
				}
					mysql_query("DELETE FROM album_photo WHERE id_album_photo = '$id_album_photo'");	
				header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>