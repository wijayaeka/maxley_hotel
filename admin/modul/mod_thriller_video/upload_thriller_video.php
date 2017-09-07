<?php

include "../../config/connect.php";
include "../../config/library.php";

function getExtension($str) 
								{

										 $i = strrpos($str,".");
										 if (!$i) { return ""; } 
										 $l = strlen($str) - $i;
										 $ext = substr($str,$i+1,$l);
										 return $ext;
								 }
							
$act = $_GET['act'];


 /* Eksekusi file Upload VIDEO	& Auto Thumbnail*/
						$ffmpeg = "ffmpeg\\ffmpeg";
						$id_thriller = $_POST['id_thriller'];
						$judul_thriller = $_POST['judul_thriller'];
						$embed_video = $_POST['embed_video'];
						$thrl_video_sources 		 = $_FILES["thrl_video"]["tmp_name"];
						$thrl_video_name			 = $_FILES['thrl_video']['name'];
						$ext_thrl_video		 = getExtension($thrl_video_name);
						$thrl_video = time().substr(str_replace(" ", "_", $txt), 5).".".$ext_thrl_video;
						$poster_thrl_video = time().substr(str_replace(" ", "_", $txt), 5).".jpg";
						$size = "220x130";
						$getFromSecond = 10;
						/*DIREKTORI  */
						$direktori_video = "../../../upload/album_video/thriller/";
						
if ( $act == 'insert')
{
						
						$cmd = "$ffmpeg -i $thrl_video_sources -an -ss $getFromSecond -s $size ../../../upload/album_video/thriller/poster/$poster_thrl_video";
								shell_exec($cmd);
						if (empty($thrl_video_sources))
							{
								$insert_video = mysql_query("INSERT INTO thriller_video (
																		judul_thriller, 
																		embed_video
																		) 
																	values
																		(
																		
																		'$judul_thriller',												
																		'$embed_video'																
																	)");
							}
						if (!empty($thrl_video_sources))
							{
								move_uploaded_file($thrl_video_sources,$direktori_video.$thrl_video);
								
								$insert_video = mysql_query("INSERT INTO thriller_video (
																		judul_thriller,
																		file_video, 
																		poster_video
																	  ) 
																values
																	(
																		'$judul_thriller',
																		'$thrl_video',
																		'$poster_thrl_video'																
																	)");
							
									
							}
}
if ($act == 'update')
{
	$direktori_video = "../../../upload/album_video/thriller/";
						
						if (!empty($thrl_video_sources))
							{
								$duplicate= mysql_query("SELECT * from thriller_video where id_thriller = '$id_thriller' ;");
								$pecah = mysql_fetch_array($duplicate);
								
								if($pecah['file_video'] != 0 )
									{
										unlink("../../../upload/album_video/thriller/$pecah[file_video]");
										unlink("../../../upload/album_video/thriller//poster/$pecah[poster_video]");
									}
								mysql_query("UPDATE thriller_video  
											SET judul_thriller = '$judul_thriller', 
											embed_video='$embed_video', 
											file_video='$thrl_video',
											poster_video='$poster_thrl_video'
											where id_thriller = '$id_thriller' ");
								$cmd = "$ffmpeg -i $thrl_video_sources -an -ss $getFromSecond -s $size ../../../upload/album_video/thriller/poster/$poster_thrl_video";
								shell_exec($cmd);
								move_uploaded_file($thrl_video_sources,$direktori_video.$thrl_video);
								
							}
						if (empty($thrl_video_sources)){
								mysql_query("UPDATE thriller_video  
											SET judul_thriller = '$judul_thriller', 
											embed_video='$embed_video'
											where id_thriller = '$id_thriller' ");
						
						
						
							}
						


}					
?>