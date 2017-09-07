<?php 

include "../../config/connect.php";
include "../../config/library.php";

			
			if (isset ($_GET["gen_code_article"]))
			{
				$gen_code_article_cancel = $_GET["gen_code_article"];
					
					$article = mysql_query("SELECT * from article where gen_code_article = '$gen_code_article_cancel' ");
					$gambar = mysql_fetch_array($article);
				if (!empty($gambar['gambar']))
					{
						unlink("../../../upload/file_article/gambar_article/$gambar[gambar]");
					}
				 if (!empty($gambar['video']))
					{
						unlink("../../../upload/file_article/video/$gambar[video]");
					}
				 if (!empty($gambar['poster_video']))
					{
						unlink("../../../upload/file_article/poster_video/$gambar[poster_video]");
					}
					
					mysql_query("DELETE FROM article WHERE gen_code_article = '$gen_code_article_cancel'");
					header('Location: ' . $_SERVER['HTTP_REFERER']);
					
			}
?>