<?php 

include "../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];

	 if ($page=='thriller_video' AND $act=='unpublish_thriller_video')
	{
		
		$id_thriller = $_GET['id_thriller'];
		$kueri = mysql_query("UPDATE thriller_video SET status='N' WHERE id_thriller ='$id_thriller'");
		
		header('location:../../media.php?page='.$page);

	}
else if ($page=='thriller_video' AND $act=='publish_thriller_video')
	{
		$id_thriller = $_GET['id_thriller'];
		 mysql_query("UPDATE thriller_video SET status='Y' WHERE id_thriller ='$id_thriller'");
		 mysql_query("UPDATE thriller_video SET status='N' WHERE id_thriller !='$id_thriller'");
		header('location:../../media.php?page='.$page);

	}
	
else if ($page=='thriller_video' AND $act=='delete_thriller')
	{
				$id_thriller = $_GET["id_thriller"];
				
					$video_thriller = mysql_query("SELECT * from thriller_video where id_thriller = '$id_thriller' ");
					$file = mysql_fetch_array($video_thriller);
				if (!empty($file['file_video']))
					{
						unlink("../../../upload/album_video/thriller/$file[file_video]");
						mysql_query("DELETE FROM thriller_video WHERE id_thriller = '$id_thriller'");	
					}
				else
					{
						mysql_query("DELETE FROM thriller_video WHERE id_thriller = '$id_thriller'");
					}
					
				header('Location: ' . $_SERVER['HTTP_REFERER']);



	}
?>