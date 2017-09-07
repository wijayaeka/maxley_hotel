<script type="text/javascript" src="modul/mod_article/js/jquery.wallform.js"></script>
<script type="text/javascript" src="modul/mod_article/js/fancybox_gallery.js"></script>
<script type="text/javascript" src="modul/mod_article/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="modul/mod_article/js/jquery-1.8.3.js"></script>
<link rel="stylesheet" type="text/css" href="modul/mod_article/js/source_fancybox/jquery.fancybox.css" media="screen" />
<link rel="stylesheet" type="text/css" href="modul/mod_article/css/tab.css" />
<link rel="stylesheet" type="text/css" href="modul/mod_article/css/style.css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
<script>$(function() {
$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
$( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
});
</script>

	<!-- <script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script> -->
	
<script type="text/javascript">	


function simpan_artikel()
	{
		tinyMCE.triggerSave();
				$("#form_berita").ajaxForm({ 
				     beforeSubmit:function(){ 
						$("#loading").show();
					 
					 }, 
					success:function(){ 
					console.log('z');
					$("#loading").hide();
					// $("#label_tab_gambar").show();
					// $("#label_tab_video").show();
					$("#apply").show();
					
					$('html, body').animate({ scrollTop: 0 }, 'slow');
						window.location.href = "media.php?page=article";
					// $(".success").show(); 
					// setTimeout(function() 
						// {$('#tool').fadeIn(); },1000);
					// setTimeout(function() 
						// {$('#tool').fadeOut(); },4000);
					document.getElementById("submit_article").disabled = true; 
					 $("#submit_article").hide();
					 $("#cancel").hide();
					 
					 // alert('sukses')
					}, 
					error:function(){ 
							console.log('d');
					 $("#imageloadstatus2").hide();
					} }).submit();
	
	}
$(document).ready(function() { 
  $("#submit_article").click(function() {
				
				var gambar = $('#gambar').val().split('.').pop().toLowerCase();
				var video = $('#video_upload').val().split('.').pop().toLowerCase();
				var doc = $('#document').val().split('.').pop().toLowerCase();
				var title = $('#title').val();
				
							if(title == "")
								{
									alert ('Judul artikel Masih Kosong')
								
								}
							else if($.inArray(gambar, ['','gif','png','jpg','jpeg']) == -1) 
								{
								alert('invalid extension for Gambar!');
								}
							else if($.inArray(video, ['','mp4','flv','mpeg4']) == -1) 
								{
								alert('invalid extension for Video!');
								}
							else if($.inArray(doc, ['','doc','xls','pdf','ppt','docx','xlsx','pdf','pptx']) == -1) 
								{
								alert('invalid extension document!');
								}
							else
								{
								simpan_artikel()					
								}
					return false;
			});
			
        }); 

		

		
function insert()
	{
		tinyMCE.triggerSave();
					$("#form_edit_berita").ajaxForm({ 
				     beforeSubmit:function(){ 
						$("#loading").show();
					 }, 
					success:function(){ 
					console.log('z');
					$("#loading").hide();
					// $("#label_tab_gambar").show();
					// $("#label_tab_video").show();
					// $("#apply").show();
					
					$('html, body').animate({ scrollTop: 0 }, 'slow');
					window.location.href = "media.php?page=article";
					// $(".success").show(); 
					setTimeout(function() 
						{$('#tool').fadeIn(); },1000);
					setTimeout(function() 
						{$('#tool').fadeOut(); },4000);
					document.getElementById("submit_article").disabled = true; 
					 $("#submit_article").hide();
					 $("#cancel").hide();
					 
					 // alert('sukses')
					}, 
					error:function(){ 
							console.log('d');
					 $("#imageloadstatus2").hide();
					} }).submit();
	
	}
		
		
$(document).ready(function() { 
		
  $("#update_article").click(function() {
			
			    // var gambar_edit = $('#gambar_edit').val().split('.').pop().toLowerCase();
				// var video_edit = $('#video_edit').val().split('.').pop().toLowerCase();
				// var doc_edit = $('#document_edit').val().split('.').pop().toLowerCase();
				var title_edit = $('#title_edit').val();
				
							if(title_edit == "")
								{
									alert ('Judul artikel Masih Kosong')
								
								}
							// else if($.inArray(gambar_edit, ['','gif','png','jpg','jpeg']) == -1) 
								// {
								// alert('invalid extension for Gambar!');
								// }
							// else if($.inArray(video_edit, ['','mp4','flv','mpeg4']) == -1) 
								// {
									// alert('invalid extension for Video!');
								// }
							// else if($.inArray(doc_edit, ['','doc','xls','pdf','ppt','docx','xlsx','pdf','pptx']) == -1) 
								// {
									// alert('invalid extension document!');
								// }
							// else
								{
									insert()					
								}
					
			});
			
        }); 

/* FUNGSI DELETE IMAGE */	 
$(function() {
		$(".delete").click(function() {
		var r=confirm("Remove this Picture?");
		if (r == true)
			{
				$('#load').fadeIn();
				var commentContainer = $(this).parent();
				var id = $(this).attr("id");
				var string = 'id='+ id ;
					
				$.ajax({
				   type: "GET",
				   url: "modul/mod_article/hapus_gambar_ajax.php",
				   data: string,
				   cache: false,
				   success: function(){
					commentContainer.slideUp('slow', function() {$(this).remove();});
					$('#load').fadeOut();
				  }
				   
				 });
				return false;
			}
	});
	

$("#apply_button").click(function() {
			window.location.href = "media.php?page=article";
	});

$("#cancel_button_add").click(function() {
			var r = confirm("Cancel dan hapus Article?");
				if( r == true)
					{
						var gen_code_article = document.getElementById("gen_code_article").value;
						$.ajax({
							   type: "GET",
							   url: "modul/mod_article/cancel_article.php",
							   data: "gen_code_article=" + gen_code_article,
							   cache: false,
							   success: function(){
												window.location.href = "media.php?page=article";
									}
							 });
					}
					return false;
	});	
	
$("#cancel_button_edit").click(function() {
			window.location.href = "media.php?page=article";
	});
});


	

/* FUNGSI RADIO BUTTON ACTIVE VIDEO */
	
		    function disable_video() {
				var upload = document.getElementById('upload');
				var embed = document.getElementById('embed');
				if(upload.className=='hide'){  //check if classname is show 
					upload.style.display = "none";
					embed.style.display = "none";
				}
			}
			function upload_video() {
				var upload = document.getElementById('upload');
				var embed = document.getElementById('embed');
				if(upload.className=='hide'){  //check if classname is show 
					upload.style.display = "block";
					embed.style.display = "none";
				}
			}
			function embed_video() {
				var upload = document.getElementById('upload');
				var embed = document.getElementById('embed');
				if(upload.className=='hide'){  //check if classname is show 
					upload.style.display = "none";
					embed.style.display = "block";
				}
				
				
			}
			
			
</script>
<script language="javascript" >
var xmlhttp = false;

try {
	xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}

if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
	xmlhttp = new XMLHttpRequest();
}

//untuk cari
function cari(key){
	
	var table=document.getElementById("table1");
	table.style.display = "none";
	var obj=document.getElementById("pencarian");
	var x=document.getElementById("key").value;
	var url='modul/mod_article/cari_article.php?key='+key;
	xmlhttp.open("GET", url);
	
	xmlhttp.onreadystatechange = function() {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			obj.innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.send(null);
}
//untuk cari
function cari_url(key2){
	
	var table2=document.getElementById("table2");
	table2.style.display = "none";
	var obj=document.getElementById("pencarian2");
	var x=document.getElementById("key2").value;
	var url='modul/mod_article/cari_url.php?key2='+key2;
	xmlhttp.open("GET", url);
	
	xmlhttp.onreadystatechange = function() {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			obj.innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.send(null);
}

</script>
<?php 

include "../config/connect.php";

function StyleId() { 
					$create = strtoupper(md5(uniqid(rand(),true))); 
					$style = 
						substr($create,0,8);
					return $style;
				}
				$gen_code = StyleId();
function getExtension($str) 
								{

										 $i = strrpos($str,".");
										 if (!$i) { return ""; } 
										 $l = strlen($str) - $i;
										 $ext = substr($str,$i+1,$l);
										 return $ext;
								 }					
	$aksi="modul/mod_article/aksi_article.php";
	echo"<div id='inline'>";	
						$sql = mysql_query("select * from article");						
						echo "
						<h2>Article</h2>
							 
							  <form  method='post' style='position:relative; top:-40px; margin-left:70%; height:10px; width:100px;'>
									<label>Pencarian : </label><br>
									<input type='text' name='key2' id='key2' placeholder='Judul Article' onkeyup='cari_url(key2.value)' />
									</form>
									<div id='pencarian2' style='margin-top:-30px;'></div>
						
							  <table id='table2'>
									<tr><th>No</th><th>Judul</th><th>URL ARTIKEL</th><tr>";
									while($z = mysql_fetch_array($sql))
									{
										echo "<tr>
										<td width=5px> $no</td>
										<td>".(implode(" ", array_slice(explode(" ", $z['title']), 0, 3))); echo"..</td>
										<td>$z[url_article].html</td>
										</tr>";
									$no++;
									}
						echo "</table>
		</div>";
	switch($_GET[act]){	
		default:
						$p = new Paging;	
						$batas = 10;	
						$posisi = $p->cariPosisi($batas);
						$no = $posisi+1;
						$sql = mysql_query("select * from article order by id_article  DESC limit $posisi, $batas");
						$tampil2 = mysql_query("select * from article");
						$jmldata=mysql_num_rows($tampil2);
						$jmlhalaman = $p->jumlahHalaman($jmldata,$batas);
						$linkHalaman = $p->navHalaman($_GET[halaman],$jmlhalaman);
						echo "
						<h2>Article</h2>
							   <div id='add_new'>
									<a href='?page=article&act=add_article'>Add New</a>
							  </div>
							  <div class='button'>
									$linkHalaman
							  </div>
							  <form  method='post' style='position:relative; top:-40px; margin-left:70%; height:10px; width:100px;'>
									<label>Pencarian : </label><br>
									<input type='text' name='key' id='key' placeholder='Judul Article' onkeyup='cari(key.value)' />
									</form>
									<div id='pencarian' style='margin-top:-30px;'></div>
						<br><br><br>
						<table id='table1'>
							<tr><th>No</th><th>Judul</th><th>Status</th><th>Aksi</th><tr>";
									while($z = mysql_fetch_array($sql))
									{
										echo "<tr>
										<td width=5px> $no</td>
										<td>".(implode(" ", array_slice(explode(" ", $z['title']), 0, 3))); echo"..</td>
												

										<td align='center'>";
										if ( $z['status'] == 'Y' )
										{
												echo"<div id='unpublish'>";?>
													<a href="<?php echo"$aksi?page=article&act=unpublish_article&id_article=$z[id_article]" ?>" class="tip2" onClick="return confirm('Anda yakin akan nonaktifkan artikel ini?');"> 
													Publish <span>Klik Untuk Menonaktifkan Article Ini</span>
												<?php echo"
												</div>";
										}
										if ( $z['status'] == 'N' )
										{
												echo"<div id='publish'>";?>
													<a href="<?php echo"$aksi?page=article&act=publish_article&id_article=$z[id_article]" ?>" class="tip2" onClick="return confirm('Anda yakin akan Mengaktifkan artikel ini?');">
													Unpublish <span>Klik Untuk Menonaktifkan Article Ini</span>
												<?php echo"
												</div>";
										}
										echo"</td>
										
										
										<td align=center >
												<div id='icon'>
												<a href='?page=article&act=edit_article&id_article=$z[id_article]' class='tip2'> 
														<img src='images/edit.png' /><span>Edit Article</span></a>";?>
													<a href="<?php echo"$aksi?page=article&act=delete_article&id_article=$z[id_article]";?>" class="" onClick="return confirm('Anda yakin akan menghapus data ini?');"> <img src='images/delete.png' /></a>
										</td>
									<?php echo"</div></tr>";
									$no++;
									}
							
							echo "</table>";
							
			
			break;

			case "add_article":
				echo "<h2>Input Article </h2>
			<form method='POST' name='form_berita' id='form_berita'  action='modul/mod_article/aksi_article.php?page=article&act=input_article' style='margin-top: -50px;' enctype='multipart/form-data'>
							<input type='hidden' name='gen_code_article' id='gen_code_article' value='$gen_code' />
							<input type='hidden' name='username' id='username' value='$_SESSION[namauser]' />
							<div id='apply' style='display:none;'>
									<input type='button' name='apply' id='apply_button' value='APPLY' />
									<input type='button' name='cancel' id='cancel_button_add' value='Cancel' />
							</div>	
				<div class='tabGroupForm'>
							<input type='radio' name='tabGroup0' id='content_berita' class='content_berita' checked='checked'/>
											<label for='content_berita'>Kontent </label>
							<input type='radio' name='tabGroup0' id='album_gambar' class='album_gambar'/>
											<label id='label_tab_gambar' for='album_gambar'>Album Gambar</label>
							<input type='radio' name='tabGroup0' id='album_video' class='album_video'/>
											<label id='label_tab_video' for='album_video'>Album Video</label>		
					<div  class='content_berita' >";
					?>
		
					<?php
					echo"
							<table class='table_form' >
								<tr>
									<td >
											<label>Select Menu</label>
									</td>
										<td colspan=2>";
											include "modul/mod_article/menu_tools/index.php";
										echo"</td>
								</tr>
								<tr>
									<td>
									
											<label>Judul :</label>
									</td>
									<td colspan=3>
											<input type='text' name='id_menu' id='result' style='display:none;'>
									<div class='tabGroupx'>
											<input type='radio' name='tabGroupx' id='tab2_ind' class='tab2_ind' checked='checked'/>
											<label for='tab2_ind'>Indonesian</label>
												<input type='radio' name='tabGroupx' id='tab2_eng' class='tab2_eng'/>
												<label for='tab2_eng'>English</label>
												<div  class='tab2_ind' >
												<input type='text' id='title' style='width:500px;' name='title' class='easyui-validatebox2' required='true'/>
												</div>
												<div class='tab2_eng'  >
												<input type='text' id='title_eng' style='width:500px;' name='title_eng' class='easyui-validatebox2' required='true'/>
												</div>
									</div>
									</td>
								</tr>
								
								<tr>
									<td>
											<label>Running News</label>
									</td>
									<td colspan=3 >
											<div style='display:inline;'><input type='radio' name='running_news' value='Y'> Y  
											&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp 
											<input type='radio' name='running_news' value='N' checked> N
											</div>
									</td>
								</tr>
								
								<tr>
									<td>
											<label>Tanggal</label>
									</td>
									<td colspan=3 >
											<input type='text' class='text' id='datepicker' name='tanggal' class='easyui-validatebox' required='true' style='width:100px;'>
									</td>
								</tr>
								
								<tr>
									<td valign='top'>
										<label>Isi Article:</label>
									</td>
									<td colspan=3>
										<div class='tabGroup'>
											<input type='radio' name='tabGroup1' id='tab_ind' class='tab_ind' checked='checked'/>
											<label for='tab_ind'>Indonesian</label>
											<input type='radio' name='tabGroup1' id='tab_eng' class='tab_eng'/>
											<label for='tab_eng'>English</label>
											<input type='radio' name='tabGroup1' id='tab3' class='tab3'/>
											<label  for='tab3'><a class='button modalbox' href='#inline' style='text-decoration:none; color:black;'><label>Link Article </label></a></label>
										 <div  class='tab_ind' >
										  <textarea name='isi_article' id='isi_article' style='width:500px; height:350px;'	></textarea>
										 </div>
										 <div class='tab_eng'  >
										  <textarea name='isi_article_eng' id='isi_article_eng'  style='width:600px; height:350px;' ></textarea>
										 </div>
										</div>
									</td>
								</tr>
								<tr>
									<td valign='top' >
										<label>Gambar </label>
									</td>
									<td colspan=3>
									
									<small> *Format must .jpg/.jpeg/.png/.gif </small><br>
									<input type='file' id='gambar' name='gambar'/>
									</td>
								</tr>
								<tr>
									<td valign='top' rowspan='1'>
										<label>Video </label>
									</td>
									<td valign='top'>
											<input type='radio' name='video_active' onchange='disable_video()' value='D'  class='easyui-validatebox' required='true' checked/> Disable Video Active 
											<br><br>
											<input type='radio' name='video_active' onChange='upload_video()' value='U'  class='easyui-validatebox' required='true'/> Upload Video Active 
											<br><br>
											<input type='radio' name='video_active' onChange='embed_video()' value='E'  class='easyui-validatebox' required='true'/> Embbed Video Active 
									</td>
									<td>
										<div id='upload' style='display:none' class='hide'>
											Upload Video : <br><br>
											<small> *Format must .mp4/.flv/.mpeg4 </small><br>
											<input type='file' name='video' id='video_upload'/>
										</div>
										<div id='embed' style='display:none' class='hide'>
											Embed Video : 
												<br><br>
											<input type='text' name='embbed_video' id='embbed_video' style='width:300px;' placeholder='http://youtube.com/...'/>
										</div>
									</td>
								</tr>
								<tr><td>
										
										<label>Document </label>
									</td>
									<td colspan=3>
											<small> *Format must .doc/.xls/.pdf/.ppt </small><br>
											<input type='file' name='document' id='document'/>
									</td>
								</tr>
								<tr><td>
										
										<label>Komentari </label>
									</td>
									<td colspan=3>
											<input type='checkbox' name='komentar_status' id='komentar_status' value='Y' />
											<small> *Check untuk artikel dapat dikomentari</small>
									</td>
								</tr>
								
								<tr>
									<td colspan=3 >
										<input class='button' type='button' name='update' id='submit_article' value='Simpan' />
										<input type='button' value= 'CANCel' onclick='history.back()' id='cancel'>
										<div id='loading' style='display:none;'><img src='images/loader.gif' ></div>
									</td>
								</tr>
								</form>
							</table>
							
						</div>";
			break;
			
			case "edit_article":
					$id_article = $_GET['id_article'];
					$sql_article = mysql_query("select * from article 
												CROSS JOIN menu on menu.id_menu = article.id_menu where article.id_article = '$id_article' ");
					
					$r = mysql_fetch_array($sql_article);
						echo "<h2>UPDATE Article </h2>
			<form method='POST' name='form_edit_berita' id='form_edit_berita'  action='modul/mod_article/aksi_article.php?page=article&act=update_article'  enctype='multipart/form-data'>
				<input type='hidden' name='id_article' id='id_article' value='$r[id_article]' />
				<input type='hidden' name='gen_code' value='$r[gen_code_article]' />
				<div class='tabGroupForm_edit'>
							<input type='radio' name='tabGroup0' id='content_berita_edit' class='content_berita_edit' checked='checked'/>
											<label for='content_berita_edit'>Kontent </label>
					<div  class='content_berita_edit' >	
						<div class='success' >Create News Successful </div>
							<table class='table_form' >
								<tr>
									<td >
											<label>Select Menu</label>
									</td>
										<td colspan=2>
											Before Position : ( <label> $r[menu_name] </label> )
											<br> <label>Move to :</label>";
											include "modul/mod_article/menu_tools/index.php";
										echo"<small>* kosongkan bila tidak diganti</small></td>
								</tr>
								<tr>
									<td>
											<label>Judul :</label>
									</td>
									<td colspan=3>
										<input type='hidden' name='id_menu' id='result' value='$r[id_menu]'>
									<div class='tabGroupx'>
											<input type='radio' name='tabGroupx' id='tab2_ind' class='tab2_ind' checked='checked'/>
											<label for='tab2_ind'>Indonesian</label>
												<input type='radio' name='tabGroupx' id='tab2_eng' class='tab2_eng'/>
												<label for='tab2_eng'>English</label>
												<div  class='tab2_ind' >
												<input type='text' id='title' value='$r[title]' style='width:500px;' name='title' class='easyui-validatebox2' required='true'/>
												</div>
												<div class='tab2_eng'  >
												<input type='text' id='title_eng'  value='$r[title_eng]' style='width:500px;' name='title_eng' />
												</div>
									</div>
									</td>
								</tr>
								<tr>
									<td>
											<label>Headline</label>
									</td>
									<td colspan=3 >
											<div style='display:inline;'>";
											if ($r['headline'] == 'Y' )
												{
												echo "<input type='radio' name='headline' value='Y' checked> Y  
														&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp 
														<input type='radio' name='headline' value='N'> N";
												
												}
											else
												{
													echo "<input type='radio' name='headline' value='Y' > Y  
														&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp 
														<input type='radio' name='headline' value='N' checked> N";
												}
									echo"</div>
									</td>
								</tr>
								<tr>
									<td>
											<label>Running News</label>
									</td>
									<td colspan=3 >";
									if ($r['running_news'] == 'Y' )
												{
												echo "<input type='radio' name='running_news' value='Y' checked> Y  
														&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp 
														<input type='radio' name='running_news' value='N'> N";
												
												}
									else
												{
												echo "<input type='radio' name='running_news' value='Y' > Y  
														&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp 
														<input type='radio' name='running_news' value='N' checked> N";
												
												}
									echo"</td>
								</tr>
								<tr>
									<td>
											<label>Tanggal</label>
									</td>
									<td colspan=3 >
											<input type='text' class='text' id='datepicker2' value='$r[tanggal]' name='tanggal' class='easyui-validatebox' required='true' style='width:100px;'>
									</td>
								</tr>
								<tr>
									<td valign='top'>
										<label>Isi Article:</label>
									</td>
									<td colspan=3>
										<div class='tabGroup'>
											<input type='radio' name='tabGroup1' id='tab_ind' class='tab_ind' checked='checked'/>
											<label for='tab_ind'>Indonesian</label>
										 
											<input type='radio' name='tabGroup1' id='tab_eng' class='tab_eng'/>
											<label for='tab_eng'>English</label>
											<input type='radio' name='tabGroup1' id='tab3' class='tab3'/>
											<label  for='tab3'><a class='button modalbox' href='#inline' style='text-decoration:none; color:black;'><label>Link Article </label></a></label>
										 
										 <div  class='tab_ind' >
										  <textarea name='isi_article' id='isi_article' style='width:500px; height:350px;'>$r[isi_article]</textarea>
										 </div>
										 <div class='tab_eng'  >
										  <textarea name='isi_article_eng' id='isi_article_eng'  style='width:600px; height:350px;' >$r[isi_article_eng]</textarea>
										 </div>
										</div>
									</td>
								</tr>
								<tr>
									<td valign='top'>
										<label>Gambar </label>
									</td>
									<td  colspan=3>
										<small>* kosongkan bila gambar tidak diganti</small><br><br>";
										if ($r['gambar'] != 0)
											{
												echo"<div class='record' >
														<img src='../upload/file_article/gambar_article/$r[gambar]' /> 
														
															<a href='#' id='$r[id_article]' class='delete' ></a>	
													</div>";
											}
									echo"<input type='file' name='gambar' id='gambar_edit'/>
									</td>
								</tr>
								<tr>
												<td valign='top' >
										<label>Video </label>
									</td>
									<td valign='top'  colspan=2>";
										$query = mysql_query("select * from article where id_article = '$id_article' ");
										$fetch = mysql_fetch_array($query);
										
										if( $fetch['video_active'] == 'U')
											{
												echo "
													 <input type='radio' name='video_active' onchange='disable_video()' value='D'  class='easyui-validatebox' required='true' /> Disable Video Active 
													<br><br>
													<input type='radio' name='video_active' onChange='upload_video()' value='U'  class='easyui-validatebox' required='true' checked /> Upload Video Active 
													<br><br>
													<input type='radio' name='video_active' onChange='embed_video()' value='E'  class='easyui-validatebox' required='true'/> Embbed Video Active 
													<small>* kosongkan bila video tidak diganti</small><br><br>
													
													<div id='upload' class='hide'>
															<div class='flowplayer is-closeable -is-splash' data-debug='true' data-ratio='.417'>
																	  <video controls id='thumb_video' poster='../upload/file_article/poster_video/$r[poster_video]'>
																		 <source type='video/mp4' src='../upload/file_article/video/$r[video]'  />
																	  </video>
															  </div>
															  Upload Video : 
															  <input type='file' name='video' id='video'/>
													</div>
													<div id='embed' style='display:none;' class='hide'>
															Embed Video : 
															<br><br>
															<input type='text' name='embbed_video' value='$q[embbed_video]' id='embbed_video' style='width:400px;' />
													</div>
											";
											}
										else if ( $fetch['video_active'] == 'E' )
											{
													echo "
														 <input type='radio' name='video_active' onchange='disable_video()' value='D'  class='easyui-validatebox' required='true' /> Disable Video Active 
														<br><br>
														<input type='radio' name='video_active' onChange='upload_video()' value='U'  class='easyui-validatebox' required='true'  /> Upload Video Active 
														<br><br>
														<input type='radio' name='video_active' onChange='embed_video()' value='E'  class='easyui-validatebox' required='true' checked/> Embbed Video Active 
														<br><br>
														
														
													<div id='upload'  style='display:none;'  class='hide'>
															<div class='flowplayer is-closeable -is-splash' data-debug='true' data-ratio='.417'>
																	  <video controls id='thumb_video' poster='file_articel/poster_video/$q[poster_video]'>
																		 <source type='video/mp4' src='file_articel/video/$q[video]'  />
																	  </video>
															  </div>
															  Upload Video : 
															  <input type='file' name='video' id='video'/>
													</div>
													<div id='embed' class='hide'>
															Embed Video : 
															<br><br>
															<input type='text' name='embbed_video' value='$q[embbed_video]' id='embbed_video' style='width:400px;' />
													</div>
												";
											}
											else if ( $fetch['video_active'] == 'D' )
											{
													echo "
														 <input type='radio' name='video_active' onchange='disable_video()' value='D'  class='easyui-validatebox' required='true' checked/> Disable Video Active 
														<br><br>
														<input type='radio' name='video_active' onChange='upload_video()' value='U'  class='easyui-validatebox' required='true'  /> Upload Video Active 
														<br><br>
														<input type='radio' name='video_active' onChange='embed_video()' value='E'  class='easyui-validatebox' required='true' /> Embbed Video Active 
														
													<div id='upload'  style='display:none;'  class='hide'>
															<div class='flowplayer is-closeable -is-splash' data-debug='true' data-ratio='.417'>
																	  <video controls id='thumb_video' poster='../upload/file_articel/poster_video/$q[poster_video]'>
																		 <source type='video/mp4' src='../upload/file_article/video/$q[video]'  />
																	  </video>
															  </div>
															  Upload Video : 
															  <input type='file' name='video' id='video_edit'/>
													</div>
													<div id='embed' style='display:none;'  class='hide'>
															Embed Video : 
															<br><br>
															<input type='text' name='embbed_video' value='$q[embbed_video]' id='embbed_video' style='width:400px;' />
													</div>";
											}	
								echo"</td>
								</tr>
								<tr><td>
										
										<label>Document </label>
									</td>
									<td >
									
									
											<small> *Format must .doc/.xls/.pdf/.ppt </small><br>
											<input type='file' name='document' id='document_edit'/>
									</td>
									<td align='center'>";
												if(!empty ($r['document']))
													{
														$ext_document = getExtension($r['document']);
														if($ext_document == 'doc'|| $ext_document == 'docx'  )
															{
																echo"<img src='images/word.png'><br>
																	".(implode(" ", array_slice(explode(" ", $r['document']), 1, 3))); echo"..";
															}
														if($ext_document == 'xls' || $ext_document == 'xlsx')
															{
																echo"<img src='images/excel.png'><br>
																		<label>$r[document]</label>";
															
															}
														if($ext_document == 'ppt' || $ext_document == 'pptx')
															{
																echo"<img src='images/ppt.png'><br>
																		<label>$r[document]</label>";
															
															}
														if($ext_document == 'pdf')
															{
																echo"<img src='images/pdf.png'><br>
																		<label>$r[document]</label>";
															
															}	
													}
									echo"
									</td>
								</tr>
								<tr><td>
										
										<label>Komentari </label>
									</td>
									<td colspan=3>";
									
										if($r['komentar_status'] == 'Y' )
											{
												echo "<input type='checkbox' name='komentar_status' id='komentar_status' value='Y' checked/>
														<small> *Check untuk artikel dapat dikomentari</small>";
											}
										else
											{
												echo"<input type='checkbox' name='komentar_status' id='komentar_status' value='Y' />
													 <small> *Check untuk artikel dapat dikomentari</small>";
											}
							echo"</td>
								</tr>
								<tr>
									<td colspan=4 >
										<input class='button' type='button' name='update' id='update_article' value='Simpan' />
										<input type='button' value= 'CANCel' onclick='history.back()' id='cancel'>
										<div id='loading' style='display:none;'><img src='images/loader.gif' ></div>
									</td>
								</tr>
								</form>
							</table>
							
						</div>
						</div>"; 
							
			break;
	}	
?>