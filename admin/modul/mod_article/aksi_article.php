<?php 

include "../../config/connect.php";
include "../../config/library.php";
$page=$_GET['page'];
$act=$_GET['act'];
						function getExtension($str) 
								{

										 $i = strrpos($str,".");
										 if (!$i) { return ""; } 
										 $l = strlen($str) - $i;
										 $ext = substr($str,$i+1,$l);
										 return $ext;
								 }						
						$id_article = $_POST["id_article"];
						$title1 = addslashes($_POST["title"]);
						$title2 = str_replace('/','atau',$title1);
						$title = str_replace('&','dan',$title2);
						$title_eng = addslashes($_POST["title_eng"]);
						
						
						$url_article1 = strtolower($_POST["title"]);
						$url_article2 = str_replace(' ','-',$url_article1);
						$url_article3 = str_replace('/','atau',$url_article2);
						$url_article = str_replace('&','dan',$url_article3);
						
						$headline = $_POST["headline"];
						$username = $_POST["username"];
						$tanggal = $_POST["tanggal"];
						$isi_article = $_POST["isi_article"];
						$isi_article_eng = $_POST["isi_article_eng"];
						$video_active = $_POST["video_active"];
						$embbed_video = $_POST["embbed_video"];
						$komentar_status = $_POST["komentar_status"];
						$running_news = $_POST["running_news"];
						$gen_code_article = $_POST['gen_code_article'];
						
						
							/* Eksekusi Menu*/
							$id_menu = $_POST['id_menu'];
							$query_menu = mysql_fetch_array(mysql_query("select * from menu where id_menu = '$id_menu' "));
							$menu_stats = $query_menu['menu_stats'];
								
						/* Eksekusi file Upload GAMBAR	*/
						  $gambar_sources     	 = $_FILES['gambar']['tmp_name'];
						  $gambar_type    	  	 = $_FILES['gambar']['type'];
						  $gambar_name			 = $_FILES['gambar']['name'];
						  $ext_gambar			 = getExtension($gambar_name);
						  $gambar		 		= time().substr(str_replace(" ", "_", $txt), 5).".".$ext_gambar;
						  
						
						 /* Eksekusi file Upload VIDEO	& Auto Thumbnail*/
							$ffmpeg = "ffmpeg\\ffmpeg";
							$video_sources 		 = $_FILES["video"]["tmp_name"];
							$video_name			 = $_FILES['video']['name'];
						    $ext_video			 = getExtension($video_name);
							$video = time().substr(str_replace(" ", "_", $txt), 5).".".$ext_video;
							$poster_video = time().substr(str_replace(" ", "_", $txt), 5).".jpg";
							$size = "220x130";
							$getFromSecond = 10;
							
						 /* FILE UPLOAD DOCUMENT*/ 
							$document_sources		 = $_FILES['document']['tmp_name'];
							$document_type    	  	 = $_FILES['document']['type'];
							$document_name			 = $_FILES['document']['name'];
							$ext_document			 = getExtension($document_name);
							$document		 		 = "(".$url_article.")-".$document_name;
							
						/*DIREKTORI  */
							$direktori_video = "../../../upload/file_article/video/";
							$direktori_gambar = "../../../upload/file_article/gambar_article/";
							$direktori_document = "../../../upload/file_article/document/";
	
if ($page=='article' AND $act=='input_article'){	

							if(!empty($gambar_sources) AND !empty($video_sources) AND !empty($document_sources) )
										{	
										// echo "Gambar =>	OK	Video =>	OK	Document =>	OK	";	
											$cmd = "$ffmpeg -i $video_sources -an -ss $getFromSecond -s $size ../../../upload/file_article/poster_video/$poster_video";
											shell_exec($cmd);
													mysql_query("INSERT INTO article (
																title, 
																title_eng, 
																url_article, 
																headline, 
																isi_article,
																isi_article_eng,
																hari,
																tanggal,
																jam,
																gambar,
																video,
																poster_video,
																document,
																embbed_video,
																video_active,
																gen_code_article,
																komentar_status,
																running_news,
																id_menu,
																menu_stats
																
															  ) 
														values
															(
																'$title',
																'$title_eng',
																'$url_article',
																'$headline',
																'$isi_article',
																'$isi_article_eng',
																'$hari_ini',
																'$tanggal',
																'$jam_sekarang',
																'$gambar',
																'$video',
																'$poster_video',
																'$document',
																'$embbed_video',
																'$video_active',
																'$gen_code_article',
																'$komentar_status',
																'$running_news',
																'$id_menu',
																'$menu_stats'
																
															)");
														move_uploaded_file($video_sources, $direktori_video.$video);
														move_uploaded_file($gambar_sources, $direktori_gambar.$gambar);
														move_uploaded_file($document_sources, $direktori_document.$document);
														header('location:../../media.php?page='.$page);	
												
										}
if(!empty($gambar_sources) AND !empty($video_sources) AND empty($document_sources))
							{	
								// echo"Gambar =>	OK	Video =>	OK	Document =>	NO	";
								$cmd ="$ffmpeg -i $video_sources -an -ss $getFromSecond -s $size ../../../upload/file_article/poster_video/$poster_video";
													shell_exec($cmd);
													mysql_query("INSERT INTO article (
																title, 
																title_eng, 
																url_article, 
																headline, 
																isi_article,
																isi_article_eng,
																hari,
																tanggal,
																jam,
																gambar,
																video,
																poster_video,
																embbed_video,
																video_active,
																gen_code_article,
																komentar_status,
																running_news,
																id_menu,
																menu_stats
															  ) 
														values
															(
																'$title',
																'$title_eng',
																'$url_article',
																'$headline',
																'$isi_article',
																'$isi_article_eng',
																'$hari_ini',
																'$tanggal',
																'$jam_sekarang',
																'$gambar',
																'$video',
																'$poster_video',
																'$embbed_video',
																'$video_active',
																'$gen_code_article',
																'$komentar_status',
																'$running_news',
																'$id_menu',
																'$menu_stats'
																
															)");
														move_uploaded_file($gambar_sources, $direktori_gambar.$gambar);
														move_uploaded_file($video_sources, $direktori_video.$video);
														header('location:../../media.php?page='.$page);
							}
					if( !empty($gambar_sources)  AND empty($video_sources)  AND !empty($document_sources) )
							{
									// echo"Gambar =>	OK	Video =>	NO	Document =>	OK	";
													mysql_query("INSERT INTO article (
																title, 
																title_eng, 
																url_article, 
																headline, 
																isi_article,
																isi_article_eng,
																hari,
																tanggal,
																jam,
																gambar,
																document,
																embbed_video,
																video_active,
																gen_code_article,
																komentar_status,
																running_news,
																id_menu,
																menu_stats
															  ) 
														values
															(
																'$title',
																'$title_eng',
																'$url_article',
																'$headline',
																'$isi_article',
																'$isi_article_eng',
																'$hari_ini',
																'$tanggal',
																'$jam_sekarang',
																'$gambar',
																'$document',
																'$embbed_video',
																'$video_active',
																'$gen_code_article',
																'$komentar_status',
																'$running_news',
																'$id_menu',
																'$menu_stats'
																
																)");
														move_uploaded_file($gambar_sources, $direktori_gambar.$gambar);
														move_uploaded_file($document_sources, $direktori_document.$document);
														header('location:../../media.php?page='.$page);
										
							
							}
					if (!empty($gambar_sources) AND   empty($video_sources) AND  empty($document_sources))
							{
								// echo "Gambar =>	OK	Video =>	NO	Document =>	NO	";
													mysql_query("INSERT INTO article (
																title, 
																title_eng, 
																url_article, 
																headline, 
																isi_article,
																isi_article_eng,
																hari,
																tanggal,
																jam,
																gambar,
																embbed_video,
																video_active,
																gen_code_article,
																komentar_status,
																running_news,
																id_menu,
																menu_stats
															  ) 
														values
															(
																'$title',
																'$title_eng',
																'$url_article',
																'$headline',
																'$isi_article',
																'$isi_article_eng',
																'$hari_ini',
																'$tanggal',
																'$jam_sekarang',
																'$gambar',
																'$embbed_video',
																'$video_active',
																'$gen_code_article',
																'$komentar_status',
																'$running_news',
																'$id_menu',
																'$menu_stats'
																
																)");
														move_uploaded_file($gambar_sources, $direktori_gambar.$gambar);
														header('location:../../media.php?page='.$page);
												
							}
			if (empty($gambar_sources) AND   !empty($video_sources) AND  !empty($document_sources))
							{
								// echo"Gambar =>	NO	Video =>	OK	Document =>	OK	";
													mysql_query("INSERT INTO article (
																title, 
																title_eng, 
																url_article, 
																headline, 
																isi_article,
																isi_article_eng,
																hari,
																tanggal,
																jam,
																video,
																poster_video,
																document,
																embbed_video,
																video_active,
																gen_code_article,
																komentar_status,
																running_news,
																id_menu,
																menu_stats
															  ) 
														values
															(
																'$title',
																'$title_eng',
																'$url_article',
																'$headline',
																'$isi_article',
																'$isi_article_eng',
																'$hari_ini',
																'$tanggal',
																'$jam_sekarang',
																'$video',
																'$poster_video',
																'$document',
																'$embbed_video',
																'$video_active',
																'$gen_code_article',
																'$komentar_status',
																'$running_news',
																'$id_menu',
																'$menu_stats'
															)");
														move_uploaded_file($video_sources, $direktori_video.$video);
														move_uploaded_file($document_sources, $direktori_document.$document);
														header('location:../../media.php?page='.$page);
							}
			if (empty($gambar_sources) AND   !empty($video_sources) AND  empty($document_sources))
							{
								// echo "Gambar =>	NO	Video =>	OK	Document =>	NO";
													mysql_query("INSERT INTO article (
																title, 
																title_eng, 
																url_article, 
																headline, 
																isi_article,
																isi_article_eng,
																hari,
																tanggal,
																jam,
																video,
																poster_video,
																embbed_video,
																video_active,
																gen_code_article,
																komentar_status,
																running_news,
																id_menu,
																menu_stats
															  ) 
														values
															(
																'$title',
																'$title_eng',
																'$url_article',
																'$headline',
																'$isi_article',
																'$isi_article_eng',
																'$hari_ini',
																'$tanggal',
																'$jam_sekarang',
																'$video',
																'$poster_video',
																'$embbed_video',
																'$video_active',
																'$gen_code_article',
																'$komentar_status',
																'$running_news',
																'$id_menu',
																'$menu_stats'
															)");
														move_uploaded_file($video_sources, $direktori_video.$video);
														header('location:../../media.php?page='.$page);
							}
							
			if (empty($gambar_sources) AND   empty($video_sources) AND  !empty($document_sources))
							{
								// echo"Gambar =>	NO	Video =>	NO	Document =>	OK	";
													mysql_query("INSERT INTO article (
																title, 
																title_eng, 
																url_article, 
																headline, 
																isi_article,
																isi_article_eng,
																hari,
																tanggal,
																jam,
																document,
																embbed_video,
																video_active,
																gen_code_article,
																komentar_status,
																running_news,
																id_menu,
																menu_stats
															  ) 
														values
															(
																'$title',
																'$title_eng',
																'$url_article',
																'$headline',
																'$isi_article',
																'$isi_article_eng',
																'$hari_ini',
																'$tanggal',
																'$jam_sekarang',
																'$document',
																'$embbed_video',
																'$video_active',
																'$gen_code_article',
																'$komentar_status',
																'$running_news',
																'$id_menu',
																'$menu_stats'
															)");
														move_uploaded_file($document_sources, $direktori_document.$document);
														header('location:../../media.php?page='.$page);
										
							}
				if (empty($gambar_sources) AND   empty($video_sources) AND  empty($document_sources))
							{
								// echo $tanggal;
													mysql_query("INSERT INTO article (
																title, 
																title_eng, 
																url_article, 
																headline, 
																isi_article,
																isi_article_eng,
																hari,
																tanggal,
																jam,
																embbed_video,
																video_active,
																gen_code_article,
																komentar_status,
																running_news,
																id_menu,
																menu_stats
															  ) 
														values
															(
																'$title',
																'$title_eng',
																'$url_article',
																'$headline',
																'$isi_article',
																'$isi_article_eng',
																'$hari_ini',
																'$tanggal',
																'$jam_sekarang',
																'$embbed_video',
																'$video_active',
																'$gen_code_article',
																'$komentar_status',
																'$running_news',
																'$id_menu',
																'$menu_stats'
															)");
														header('location:../../media.php?page='.$page);
										
							}
	}
	
	
else if ($page=='article' AND $act=='update_article'){	
							
			
			
		if(!empty($gambar_sources) AND !empty($video_sources) AND !empty($document_sources))
							{	
								$duplicate= mysql_query("SELECT * from article where id_article = '$id_article' ;");
								$pecah = mysql_fetch_array($duplicate);
								
								if($pecah['video'] != 0 )
									{
										unlink("../../../upload/file_article/video/$pecah[video]");
										unlink("../../../upload/file_article/video/poster_video/$pecah[poster_video]");
									}
								if($pecah['gambar'] != 0 )
									{
										unlink("../../../upload/file_article/gambar_article/$pecah[gambar]");
									}
								if($pecah['document'] != 0 )
									{
										unlink("../../../upload/file_article/document/$pecah[document]");
									}
								
										$cmd ="$ffmpeg -i $video_sources -an -ss $getFromSecond -s $size ../../../upload/file_article/poster_video/$poster_video";
										shell_exec($cmd);
										mysql_query("UPDATE article SET 
																title = '$title', 
																title_eng = '$title_eng', 
																url_article = '$url_article',
																headline = '$headline', 
																isi_article = '$isi_article', 
																isi_article_eng = '$isi_article_eng', 
																hari = '$hari_ini', 
																tanggal = '$tanggal', 
																jam = '$jam_sekarang', 
																gambar = '$gambar', 
																video = '$video',  
																document = '$document',  
																poster_video = '$poster_video',  
																embbed_video = '$embbed_video',
																video_active = '$video_active', 
																komentar_status = '$komentar_status',
																running_news = '$running_news',
																id_menu = '$id_menu',
																menu_stats = '$menu_stats'
											where id_article = '$id_article'");
											move_uploaded_file($video_sources, $direktori_video.$video);
											move_uploaded_file($gambar_sources, $direktori_gambar.$gambar);
											move_uploaded_file($video_document, $direktori_document.$document);
											header('location:../../media.php?page='.$page);
									
									// echo $video;
									
							}	
						
					if( !empty($gambar_sources) AND !empty($video_sources) AND empty($document_sources))
							{	
								$duplicate= mysql_query("SELECT * from article where id_article = '$id_article' ;");
								$pecah = mysql_fetch_array($duplicate);
								if( $pecah['gambar'] > 0)
									{
										unlink("../../../upload/file_article/gambar_article/$pecah[gambar]");
									}
								if( $pecah['video'] > 0)
									{
										unlink("../../../upload/file_article/video/$pecah[video]");
										unlink("../../../upload/file_article/poster_video/$pecah[poster_video]");
									}
								
										$cmd ="$ffmpeg -i $video_sources -an -ss $getFromSecond -s $size ../../../upload/file_article/poster_video/$poster_video";
										shell_exec($cmd);
										mysql_query("UPDATE article SET 
																title = '$title', 
																title_eng = '$title_eng', 
																url_article = '$url_article',
																headline = '$headline', 
																isi_article = '$isi_article', 
																isi_article_eng = '$isi_article_eng', 
																hari = '$hari_ini', 
																tanggal = '$tanggal', 
																jam = '$jam_sekarang', 
																gambar = '$gambar',  
																video = '$video',  
																poster_video = '$poster_video',  
																embbed_video = '$embbed_video',
																video_active = '$video_active', 
																komentar_status = '$komentar_status', 
																running_news = '$running_news',
																id_menu = '$id_menu',
																menu_stats = '$menu_stats'																
											where id_article= '$id_article'");
											move_uploaded_file($gambar_sources, $direktori_gambar.$gambar);
											move_uploaded_file($video_sources, $direktori_video.$video);
											header('location:../../media.php?page='.$page);
							}
					if (!empty($gambar_sources) AND empty($video_sources) AND empty($document_sources))
							{
								$duplicate= mysql_query("SELECT * from article where id_article = '$id_article' ;");
								$pecah = mysql_fetch_array($duplicate);
								if( $pecah['gambar'] > 0)
									{
										unlink("../../../upload/file_article/gambar_article/$pecah[gambar]");
									}
								if( $pecah['document'] > 0)
									{
										unlink("../../../upload/file_article/document/$pecah[document]");
									}
								mysql_query("UPDATE article SET  
																title = '$title', 
																title_eng = '$title_eng', 
																url_article = '$url_article',
																headline = '$headline', 
																isi_article = '$isi_article', 
																isi_article_eng = '$isi_article_eng', 
																hari = '$hari_ini', 
																tanggal = '$tanggal', 
																jam = '$jam_sekarang', 
																gambar = '$gambar', 
																jam = '$jam_sekarang', 
																embbed_video = '$embbed_video',
																video_active = '$video_active', 
																komentar_status = '$komentar_status', 
																running_news = '$running_news',
																id_menu = '$id_menu',
																menu_stats = '$menu_stats'
											where id_article = '$id_article'");
											move_uploaded_file($gambar_sources, $direktori_gambar.$gambar);
											header('location:../../media.php?page='.$page);
										// echo "dua duanya kosong";
							}
							if (!empty($gambar_sources) AND empty($video_sources) AND !empty($document_sources))
							{
								$duplicate= mysql_query("SELECT * from article where id_article = '$id_article' ;");
								$pecah = mysql_fetch_array($duplicate);
								if( $pecah['gambar'] > 0)
									{
										unlink("../../../upload/file_article/gambar_article/$pecah[gambar]");
									}
								if( $pecah['document'] > 0)
									{
										unlink("../../../upload/file_article/document/$pecah[document]");
									}
								mysql_query("UPDATE article SET  
																title = '$title', 
																title_eng = '$title_eng', 
																url_article = '$url_article',
																headline = '$headline', 
																isi_article = '$isi_article', 
																isi_article_eng = '$isi_article_eng', 
																hari = '$hari_ini', 
																tanggal = '$tanggal', 
																jam = '$jam_sekarang', 
																gambar = '$gambar', 
																document = '$document', 
																jam = '$jam_sekarang', 
																embbed_video = '$embbed_video',
																video_active = '$video_active', 
																komentar_status = '$komentar_status', 
																running_news = '$running_news',
																id_menu = '$id_menu',
																menu_stats = '$menu_stats'
											where id_article = '$id_article'");
											move_uploaded_file($gambar_sources, $direktori_gambar.$gambar);
											move_uploaded_file($document_sources, $direktori_document.$document);
											header('location:../../media.php?page='.$page);
										// echo "dua duanya kosong";
							}
							
					if (empty($gambar_sources) AND !empty($video_sources) AND !empty($document_sources))
							{
								$duplicate= mysql_query("SELECT * from article where id_article = '$id_article' ;");
								$pecah = mysql_fetch_array($duplicate);
								if( !empty($pecah['video']) AND !empty($pecah['document']) )
									{
										unlink("../../../upload/file_article/video/$pecah[video]");
										unlink("../../../upload/file_article/poster_video/$pecah[poster_video]");
										unlink("../../file_article/document/$pecah[document]");
									}
								
										$cmd ="$ffmpeg -i $video_sources -an -ss $getFromSecond -s $size ../../../upload/file_article/poster_video/$poster_video";
										shell_exec($cmd);
										mysql_query("UPDATE article SET 
																title = '$title', 
																title_eng = '$title_eng', 
																url_article = '$url_article',
																headline = '$headline', 
																isi_article = '$isi_article', 
																isi_article_eng = '$isi_article_eng', 
																hari = '$hari_ini', 
																tanggal = '$tanggal', 
																jam = '$jam_sekarang', 
																video = '$video',  
																document = '$document',  
																poster_video = '$poster_video',  
																embbed_video = '$embbed_video',
																video_active = '$video_active',
																komentar_status = '$komentar_status', 
																running_news = '$running_news',
																id_menu = '$id_menu',
																menu_stats = '$menu_stats'
											where id_article = '$id_article'");
											move_uploaded_file($video_sources, $direktori_video.$video);
											move_uploaded_file($document_sources, $direktori_document.$document);
											header('location:../../media.php?page='.$page);
									
							}
					if (empty($gambar_sources) AND !empty($video_sources) AND empty($document_sources))
							{
								$duplicate= mysql_query("SELECT * from article where id_article = '$id_article' ;");
								$pecah = mysql_fetch_array($duplicate);
								if( !empty($pecah['video']) )
									{
										unlink("../../../upload/file_article/video/$pecah[video]");
										unlink("../../../upload/file_article/poster_video/$pecah[poster_video]");
									}
								
										$cmd ="$ffmpeg -i $video_sources -an -ss $getFromSecond -s $size ../../../upload/file_article/poster_video/$poster_video";
										shell_exec($cmd);
										mysql_query("UPDATE article SET 
																title = '$title', 
																title_eng = '$title_eng', 
																url_article = '$url_article',
																headline = '$headline', 
																isi_article = '$isi_article', 
																isi_article_eng = '$isi_article_eng', 
																hari = '$hari_ini', 
																tanggal = '$tanggal', 
																jam = '$jam_sekarang', 
																video = '$video',  
																poster_video = '$poster_video',  
																embbed_video = '$embbed_video',
																video_active = '$video_active', 
																komentar_status = '$komentar_status', 
																running_news = '$running_news',
																id_menu = '$id_menu',
																menu_stats = '$menu_stats'
											where id_article = '$id_article'");
											move_uploaded_file($video_sources, $direktori_video.$video);
											move_uploaded_file($document_sources, $direktori_document.$document);
											header('location:../../media.php?page='.$page);
									
							}
					if (empty($gambar_sources) AND empty($video_sources) AND !empty($document_sources))
							{
								$duplicate= mysql_query("SELECT * from article where id_article = '$id_article' ;");
								$pecah = mysql_fetch_array($duplicate);
								if( !empty($pecah['document']))
									{
										unlink("../../../upload/file_article/document/$pecah[document]");
									}
								
										
										mysql_query("UPDATE article SET 
																title = '$title', 
																title_eng = '$title_eng', 
																url_article = '$url_article',
																headline = '$headline', 
																isi_article = '$isi_article', 
																isi_article_eng = '$isi_article_eng', 
																hari = '$hari_ini', 
																tanggal = '$tanggal', 
																jam = '$jam_sekarang',  
																document = '$document',  
																embbed_video = '$embbed_video',
																video_active = '$video_active', 
																komentar_status = '$komentar_status', 
																running_news = '$running_news',
																id_menu = '$id_menu',
																menu_stats = '$menu_stats'
											where id_article = '$id_article'");
											move_uploaded_file($document_sources, $direktori_document.$document);
											header('location:../../media.php?page='.$page);
									
							}
				if (empty($gambar_sources) AND empty($video_sources) AND empty($document_sources))
							{
								
										
										mysql_query("UPDATE article SET 
																title = '$title', 
																title_eng = '$title_eng', 
																url_article = '$url_article',
																headline = '$headline', 
																isi_article = '$isi_article', 
																isi_article_eng = '$isi_article_eng', 
																hari = '$hari_ini', 
																tanggal = '$tanggal', 
																jam = '$jam_sekarang',  
																embbed_video = '$embbed_video',
																video_active = '$video_active',
																komentar_status = '$komentar_status', 
																running_news = '$running_news', 
																id_menu = '$id_menu',
																menu_stats = '$menu_stats'
											where id_article = '$id_article'");
											header('location:../../media.php?page='.$page);
									
							}
				
							
					
	}
	
	
else if ($page=='article' AND $act=='delete_article')
	{
					$id_article = $_GET["id_article"];
					$article = mysql_query("SELECT * from article where id_article = '$id_article' ");
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
				if (!empty($gambar['document']))
					{
						unlink("../../../upload/file_article/document/$gambar[document]");
					}
				
					mysql_query("DELETE FROM article WHERE id_article = '$id_article'");
					header('Location: ' . $_SERVER['HTTP_REFERER']);



	}
else if ($page=='article' AND $act=='publish_article')
	{
					$id_article = $_GET["id_article"];
						
		 mysql_query("UPDATE article SET status='Y' WHERE id_article ='$id_article'");
				header('Location: ' . $_SERVER['HTTP_REFERER']);



	}
	
else if ($page=='article' AND $act=='unpublish_article')
	{
					$id_article = $_GET["id_article"];
					
					 mysql_query("UPDATE article SET status = 'N' WHERE id_article ='$id_article'");
					header('Location: ' . $_SERVER['HTTP_REFERER']);



	}


else if ($page=='article' AND $act=='headline_article')
	{
					$id_article = $_GET["id_article"];
					
					 mysql_query("UPDATE article SET headline = 'Y' WHERE id_article ='$id_article'");
					 mysql_query("UPDATE article SET headline = 'N' WHERE id_article != '$id_article'");
					header('Location: ' . $_SERVER['HTTP_REFERER']);



	}

else if ($page=='article' AND $act=='unheadline_article')
	{
					$id_article = $_GET["id_article"];
					
					 mysql_query("UPDATE article SET headline = 'N' WHERE id_article ='$id_article'");
					 mysql_query("UPDATE article SET headline = 'N' WHERE id_article != '$id_article'");
					header('Location: ' . $_SERVER['HTTP_REFERER']);



	}



else if ($page=='article' AND $act=='slide_news')
	{
					$id_article = $_GET["id_article"];
					
					 mysql_query("UPDATE article SET running_news = 'Y' WHERE id_article ='$id_article'");
					header('Location: ' . $_SERVER['HTTP_REFERER']);



	}

else if ($page=='article' AND $act=='unslide_news')
	{
					$id_article = $_GET["id_article"];
					
					 mysql_query("UPDATE article SET running_news = 'N' WHERE id_article ='$id_article'");
					header('Location: ' . $_SERVER['HTTP_REFERER']);



	}



?>