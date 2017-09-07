<script src="modul/mod_album_video/js/jquery.form.js"></script>
	<script type="text/javascript" src="modul/mod_thriller_video/js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="modul/mod_thriller_video/js/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="modul/mod_thriller_video/js/source/jquery.fancybox.css?v=2.1.5" media="screen" />
	<link rel="stylesheet" type="text/css" href="modul/mod_thriller_video/css/style.css" />
<script type="text/javascript">		
function embed() {
				var albm_upload = document.getElementById('albm_upload');
				var albm_embed = document.getElementById('albm_embed');
				if(albm_upload.className=='hide'){  //check if classname is show 
					albm_upload.style.display = "none";
					albm_embed.style.display = "block";
				}
			}
function upload() {
				var albm_upload = document.getElementById('albm_upload');
				var albm_embed = document.getElementById('albm_embed');
				if(albm_embed.className=='hide'){  //check if classname is show 
					albm_upload.style.display = "block";
					albm_embed.style.display = "none";
				}
			}    

jQuery(document).ready(function() {

	$(".video").click(function() {
		$.fancybox({
			'padding'		: 0,
			'autoScale'		: false,
			'transitionIn'	: 'none',
			'transitionOut'	: 'none',
			'title'			: this.title,
			'width'			: 640,
			'height'		: 385,
			'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
			'type'			: 'swf',
			'swf'			: {
			'wmode'				: 'transparent',
			'allowfullscreen'	: 'true',
			'autoplay'		: 'true'
			}
		});

		return false;
	});
});
$('a.fancybox-video').fancybox({
		'padding'       : 0,
            	'autoScale'     : false,
            	'transitionIn'  : 'none',
            	'transitionOut' : 'none',
				'titleShow': false,
				'type': 'swf',
				'width': 480,
				'height': 385,
				'swf'           : {
									'wmode'             : 'transparent',
									'allowfullscreen'   : 'true'
								}
		});
</script>
<?php 
		include "../config/connect.php";
		
		
	$aksi="modul/mod_thriller_video/aksi_thriller.php";
	switch($_GET[act]){	
		default:
		
		$sql = mysql_query("select * from thriller_video order by id_thriller desc");
		$no = 1;
		$p = new Paging;
							
							//Tentukan Limit
							$batas = 5;
							
							//Cek posisi halaman
							$posisi = $p->cariPosisi($batas);
		$no = $posisi+1;
		$tampil2 = mysql_query("select * from thriller_video");
					$jmldata=mysql_num_rows($tampil2);
					
						//Dapatkan Jumlah Halaman
						$jmlhalaman = $p->jumlahHalaman($jmldata,$batas);
						//Cetak Link Navigasi
						$linkHalaman = $p->navHalaman($_GET[halaman],$jmlhalaman);
		echo "
			<h2> Video Thriller</h2><div id='add_new'>
				<a href='?page=thriller_video&act=add_thriller_video'>Add New</a>
				</div>
							  <div class='button'>
									$linkHalaman
							  </div>
							  <div id='stripe-separator'></div>";					
			echo"
			
		<table id='table1'>
			<tr><th>No</th><th>Judul Video</th><th>Preview</th><th>Status</th><th>Aksi</th><tr>
			";
					while($z = mysql_fetch_array($sql))
					{
						echo "<tr><td width=5px> $no</td>";
						echo "<td> $z[judul_thriller]</td>";
						echo "<td align='center'> 
						<div id='pancibox'>";
							if(!empty($z['file_video']) AND  empty($z['embed_video']))
								{
									echo"
									<div class='item'>
									<a class='fancybox-video' href='player.swf?file=../upload/album_video/thriller/$z[file_video]&amp;autostart=true'>
											<img src='../upload/album_video/thriller/poster/$z[poster_video]' alt='' />
											<span class='play'></span> 
									</a>
									</div>";
								}
							if(empty($z['file_video']) AND !empty($z['embed_video']))
								{
									echo"
									<div class='item'>
									<a class='video'  href='$z[embed_video]'>
											<img src='../images/kpkv11.jpg' alt=''/>
											<span class='play'></span> 
									</a>
									</div>";
								}
					echo"	</div>
							</td>";
						echo "<td align='center'>";
						
						if ( $z['status'] == 'Y' )
						{
								echo"<div id='unpublish'>";?>
									<a  > 
									Active 
									</a>
								
								<?php echo"
								</div>";
						
						}
						
						if ( $z['status'] == 'N' )
						{
								echo"<div id='publish'>";?>
									<a href="<?php echo"$aksi?page=thriller_video&act=publish_thriller_video&id_thriller=$z[id_thriller]" ?>" class="tip2" > 
									Nonactive <span>Aktifkan  Thriller</span>
									</a>
								
								<?php echo"
								</div>";
						
						}
						echo "	</td>";
						echo "<td align=center >
						<div id='icon'><a href='?page=thriller_video&act=edit_thriller_video&id_thriller=$z[id_thriller]' class='tip2'> <img src='images/edit.png' /> <span>Edit</span></a> 
								";
								?>
						<a href="<?php echo"$aksi?page=thriller_video&act=delete_thriller&id_thriller=$z[id_thriller]" ?>" class='tip2' onClick="return confirm('Anda yakin akan menghapus data ini?');">
							<img src='images/delete.png' /><span>Delete</span></a>
		<?php echo" </div>
						</tr>";
					$no++;
					}
			
			echo "</table>";
				
		break;
		
		case "add_thriller_video":
				
						echo "
				<div class='tab_content'>
											<input type='radio' name='holder' id='tab_child_content' class='tab_child_content' checked='checked'/>
											<label for='tab_child_content' id='tab_child_content'>Add Video Thriller</label>
											<div  class='tab_child_content' >
												<label>UPLOAD VIDEO<div id='result_nama_album_video'></div></label><br><br>
													<input type='radio' name='video_rd' onChange='upload()' value='U'   class='easyui-validatebox' required='true'  checked/> Upload Video 
													<br>
													<input type='radio' name='video_rd' onChange='embed()' value='E'  class='easyui-validatebox' required='true'  /> Embbed Video 
												<div id='albm_upload'  class='hide'>
												<form id='form_thriller' method='post' enctype='multipart/form-data'  action='modul/mod_thriller_video/upload_thriller_video.php?act=insert'>
																<label>Judul Video </label>
																<input type='text' name='judul_thriller' id='judul_thriller' class='easyui-validatebox' required='true'  >
																Upload Video : <br><br>
																<input type='file'  id='thrl_video' name='thrl_video' style='height: 30px;' />
																<div class='progress'>
																<div class='bar'></div >
																</div><br>
																<input type='submit'name='save' id='upload' value='Upload!' >
																<input type='button' value='Cancel' onclick='history.back()' />
															</form>
													</div>
													<div id='albm_embed' style='display:none' class='hide'>
														<form id='videoform_embed' method='post' action='modul/mod_thriller_video/upload_thriller_video.php?act=insert' >
															<label>Judul Video </label>
															<input type='text' name='judul_thriller' id='judul_thriller' class='easyui-validatebox' required='true'  >
															Embed Video : 
															<br><br>
															<input type='text' name='embed_video' id='embed_video' style='width:300px;' placeholder='http://youtube.com/...'/>
															<input type='submit' name='save' id='upload' value='Upload!' >	
															<input type='button' value='Cancel' onclick='history.back()' />
														</form>
													</div>
												
											</div>
											</div>
											";
		break;
		case "edit_thriller_video":
				$id_thriller = $_GET['id_thriller'];
				$query = mysql_query("select * from thriller_video where id_thriller = '$id_thriller'");
				$x =mysql_fetch_array($query);
						echo "<div class='tab_content'>
											<input type='radio' name='holder' id='tab_child_content' class='tab_child_content' checked='checked'/>
											<label for='tab_child_content' id='tab_child_content'>Add Video Thriller</label>
											<div  class='tab_child_content' >
												<label>UPLOAD VIDEO  <div id='result_nama_album_video'></div></label><br><br>
													<input type='radio' name='video_rd' onChange='upload()' value='U'   class='easyui-validatebox' required='true'  checked/> Upload Video 
													<br>
													<input type='radio' name='video_rd' onChange='embed()' value='E'  class='easyui-validatebox' required='true'  /> Embbed Video 
												<div id='albm_upload'  class='hide'>
												<form id='form_thriller' method='post' enctype='multipart/form-data'  action='modul/mod_thriller_video/upload_thriller_video.php?act=update'>
																<input type='hidden' name='id_thriller' id='id_thriller' value='$x[id_thriller]' />
																<label>Judul Video </label>
																<input type='text' value='$x[judul_thriller]' name='judul_thriller' id='judul_thriller' class='easyui-validatebox' required='true'>
																<div id='pancibox'>";
																if(!empty($x['file_video']) AND  empty($x['embed_video']))
								{
																		echo"
																		<a class='fancybox-video' href='player.swf?file=../upload/album_video/thriller/$x[file_video]&amp;autostart=true'>
																				<img src='../upload/album_video/thriller/poster/$x[poster_video]' alt='' />
																		</a>";
																	}
																if(empty($x['file_video']) AND !empty($x['embed_video']))
																	{
																		echo"
																		<a class='video'  href='$x[embed_video]'>
																				<img src='../images/kpkv11.jpg' alt=''/>
																		</a>";
																	}
																echo"</div>
																Upload Video : <br><br>
																<input type='file'   id='thrl_video' name='thrl_video' style='height: 30px;' />
																<small>* Kosongkan Bila Video Tidak Diganti</small>
																<div class='progress'>
																<div class='bar'></div >
																</div><br>
																<input type='submit'name='save' id='upload' value='Upload!' >
																<input type='button' value='Cancel' onclick='history.back()' />
															</form>
													</div>
													<div id='albm_embed' style='display:none' class='hide'>
														<form id='videoform_embed' method='post' action='modul/mod_thriller_video/upload_thriller_video.php?act=update' >
															<input type='hidden' name='id_thriller' id='id_thriller' value='$x[id_thriller]' />
															<label>Judul Video </label>
															<input type='text' value='$x[judul_thriller]'  name='judul_thriller' id='judul_thriller' class='easyui-validatebox' required='true'  >
															<div id='pancibox'>";
																if(!empty($x['file_video']) AND  empty($x['embed_video']))
								{
																		echo"
																		<a class='fancybox-video' href='player.swf?file=../upload/album_video/thriller/$x[file_video]&amp;autostart=true'>
																				<img src='../upload/album_video/thriller/poster/$x[poster_video]' alt='' />
																		</a>";
																	}
																if(empty($x['file_video']) AND !empty($x['embed_video']))
																	{
																		echo"
																		<a class='video'  href='$x[embed_video]'>
																				<img src='../images/kpkv11.jpg' alt=''/>
																		</a>";
																	}
																echo"</div>
															Embed Video : 
															<br><br>
															<input type='text' name='embed_video' id='embed_video' style='width:300px;' placeholder='http://youtube.com/...'/>
																<small>* Kosongkan Bila Video Tidak Diganti</small><br>
															<input type='submit' name='save' id='upload' value='Upload!' >	
															<input type='button' value='Cancel' onclick='history.back()' />
														</form>
													</div>
												
											</div>
											</div>
											";
		break;
		
		}
			  

?>
<script src="modul/mod_album_video(single)/js/jquery.form.js"></script>
<script>
(function() {

var bar = $('.bar');
var percent = $('.percent');
var status = $('#status');

$('#form_thriller').ajaxForm({
    beforeSend: function() {
        status.empty();
        var percentVal = '0%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
        //console.log(percentVal, position, total);
    },
    complete: function(xhr) {
        status.html(xhr.responseText);
		// location.reload(); 
		window.location.href = "media.php?page=thriller_video";
    }
}); 

})();       
</script>