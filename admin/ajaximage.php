<?php

include 'config/connect.php';

$path = "album_photo/";

function getExtension($str) 
{

         $i = strrpos($str,".");
         if (!$i) { return ""; } 

         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

	$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			$id_album_photo = $_POST['id_album_photo'];
			
			$cek =	mysql_num_rows(mysql_query("select * from gallery_photo where id_album_photo = '$id_album_photo' "));
			
		if($cek < 20)
						{
						
			if(strlen($name))
				{
					 $ext = getExtension($name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								
									
								{
								mysql_query("INSERT into gallery_photo (id_album_photo, photo ) VALUES ('$id_album_photo','$actual_image_name')");
								$zz = mysql_fetch_array(mysql_query("select * from gallery_photo where photo = '$actual_image_name' "));
								$im = $zz['id_image'];
									echo "<img src='album_photo/".$actual_image_name."'  class='preview' style='display:none;' >
									";
								}
							else
								echo "Fail upload folder with read access.";
						}
						else
						echo "Image file size max 1 MB";					
						}
						else
						echo "Invalid file format..";	
				}
				
			else
				echo "Please select image..!";
				
			exit;
		}
		
			else {
			
			
				echo "Maximal 8!";
			
				}
	}
?>