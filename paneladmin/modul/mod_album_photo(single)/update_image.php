<?php

include '../../config/connect.php';
function getExtension($str) 
								{

										 $i = strrpos($str,".");
										 if (!$i) { return ""; } 
										 $l = strlen($str) - $i;
										 $ext = substr($str,$i+1,$l);
										 return $ext;
								 }
			$path = "../../../upload/album_photo/";
			$photo_sources     	 = $_FILES['photoimg']['tmp_name'];
			$photo_type    	  	 = $_FILES['photoimg']['type'];
			$photo_name			 = $_FILES['photoimg']['name'];
			$ext_photo			 = getExtension($photo_name);
			$photo		 		= time().substr(str_replace(" ", "_", $txt), 5).".".$ext_photo;
			$id_gallery = $_POST['id_gallery'];
			$update_keterangan = $_POST['update_keterangan'];
			$update_keterangan_eng = $_POST['update_keterangan_eng'];		
			
			
						
	if (!empty($photo_sources))
		{
				$duplicate= mysql_query("SELECT * from gallery_photo where id_gallery_photo = '$id_gallery' ;");
				$pecah = mysql_fetch_array($duplicate);
				if( $pecah['photo'] > 0)
						{
							// unlink("$path.$pecah[gambar]");
							unlink("../../../upload/album_photo/$pecah[photo]");
						}
			
			mysql_query("UPDATE gallery_photo SET 
											photo = '$photo', 
											keterangan = '$update_keterangan', 
											keterangan_eng = '$update_keterangan_eng'
											where id_gallery_photo= '$id_gallery'");
						move_uploaded_file($photo_sources, $path.$photo);
						header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	else 
		{
			mysql_query("UPDATE gallery_photo SET 
											keterangan = '$update_keterangan', 
											keterangan_eng = '$update_keterangan_eng'
											where id_gallery_photo= '$id_gallery'");
						header('Location: ' . $_SERVER['HTTP_REFERER']);
		
		
		
		}
?>