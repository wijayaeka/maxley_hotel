<script type="text/javascript" src="modul/mod_halaman_statis/js/jquery.wallform.js"></script>
<script type="text/javascript" src="modul/mod_halaman_statis(single)/js/fancybox_gallery.js"></script>
<script type="text/javascript" src="modul/mod_halaman_statis/js/jquery.fancybox.js"></script>

<link rel="stylesheet" type="text/css" href="modul/mod_article/css/tab.css" />
<script type="text/javascript" src="modul/mod_halaman_statis/js/jquery-1.8.3.js"></script>
<link rel="stylesheet" type="text/css" href="modul/mod_halaman_statis/js/source_fancybox/jquery.fancybox.css" media="screen" />
<link rel="stylesheet" type="text/css" href="modul/mod_halaman_statis/css/style.css" media="screen" />
<script type="text/javascript">		 
$(function(){
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
				   url: "modul/mod_halaman_statis/hapus_gambar_ajax.php",
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
	
$("#upload_link").on('click', function(e){
    e.preventDefault();
    $("#upload:hidden").trigger('click');
});
});

				$(document).ready(function()
				{

				$('#photoimg').live('change', function()
				 {
				var A=$("#imageloadstatus");
				var B=$("#imageloadbutton");

				$("#imageform").ajaxForm({target: '#preview',
				beforeSubmit:function(){
				A.show();
				B.hide();
				},
				success:function(){
				 
				A.hide();
				B.show();
				document.location.reload();
				},
				error:function(){
				A.hide();
				B.show();
				} }).submit();
				});

				});
				
$(document).ready(function() {
$("#apply_album_photo").click(function() {
		window.location.href = "media.php?page=album_photo";
	});
});

$(function() {
		$(".delete_photo").click(function() {
		var r=confirm("Hapus Gambar ini dari album?");
		if (r == true)
			{
			$('#load').fadeIn();
			var commentContainer = $(this).parent();
			var id = $(this).attr("id");
			var string = 'id='+ id ;
				
			$.ajax({
			   type: "GET",
			   url: "modul/mod_album_photo(single)/delete_image.php",
			   data: string,
			   cache: false,
			   success: function(){
				commentContainer.slideUp('slow', function() {$(this).remove();});
				$('#load').fadeOut();
				 document.location.reload();
			  }
			   
			 });
			return false;
			}
	});
});

</script>
<?php 
		include "../config/connect.php";
		function gen_code() { 
					$create = strtoupper(md5(uniqid(rand(),true))); 
					$style = substr($create,0,8);
					return $style;
				}

				$gen_code = gen_code();
		
	$aksi="modul/mod_halaman_statis/aksi_halaman_statis.php";
	switch($_GET[act]){	
		default:
		
		$sql = mysql_query("select * from halaman_statis order by id_hal_statis asc");
		$no = 1;
		$p = new Paging;
							
							//Tentukan Limit
							$batas = 10;
							
							//Cek posisi halaman
							$posisi = $p->cariPosisi($batas);
		$no = $posisi+1;
		$tampil2 = mysql_query("select * from halaman_statis");
					$jmldata=mysql_num_rows($tampil2);
					
						//Dapatkan Jumlah Halaman
						$jmlhalaman = $p->jumlahHalaman($jmldata,$batas);
						//Cetak Link Navigasi
						$linkHalaman = $p->navHalaman($_GET[halaman],$jmlhalaman);
		echo "
			<h2>Halaman Statis</h2>	
				<div id='add_new'>
				<a href='?page=halaman_statis&act=add_halaman_statis'>Add New</a>
				</div>
							  <div class='button'>
									$linkHalaman
							  </div>
							  	<div id='stripe-separator'></div>";					
			echo"
		<table id='table1' >
			<tr><th>No</th><th>Judul</th><th>Link</th><th>Image</th><th>Aksi</th><tr>";
					while($z = mysql_fetch_array($sql))
					{
						echo "<tr><td width=5px> $no</td>";
						echo "<td> $z[nama_hal_statis]</td>";
						echo "<td> $z[link_hal_statis].html</td>";
						echo "<td align='center'>";
						if (!empty($z['gambar']))
							{
								echo"<img src='../upload/static/$z[gambar]' style='width: 120px; height:70px;'>";
							}
							 echo"</td>";
							 
						echo "<td align=center  style='width:100px;'>
						<div id='icon'>
							<a href='?page=halaman_statis&act=edit_halaman_statis&id_hal_statis=$z[id_hal_statis]' class='tip2'> <img src='images/edit.png' /> 
									<span>Edit</span></a> ";
									?>
							<a href='<?php echo"$aksi?page=halaman_statis&act=delete_halaman_statis&id_hal_statis=$z[id_hal_statis]" ?>' class='tip2' onClick="return confirm('Anda yakin akan menghapus data ini?');">
								<img src='images/delete.png' /><span>Delete</span>
							</a>
		<?php echo" 	</div>
						</td></tr>";
					$no++;
					}
			
			echo "</table>";
				
		break;
		
		case "add_halaman_statis":
						echo "<h2>Add Halaman Statis</h2>
						<div class='tab_content'>
											<input type='radio' name='holder' id='tab_child_content' class='tab_child_content' checked='checked'/>
											
											<label for='tab_child_content' id='tab_child_content'>Add Mitra Kerja</label>
						<div  class='tab_child_content' >	
						<form method='post'  action='$aksi?page=halaman_statis&act=input_halaman_statis'  enctype='multipart/form-data'>
						<div id='stripe-separator'></div>
										<label>Judul:</label>
										<input type='text' id='nama_halaman_statis' name='nama_halaman_statis' class='easyui-validatebox' required='true'/>
										<br><br>
										<div class='tabGroup'>
											<input type='radio' name='tabGroup1' id='tab_ind' class='tab_ind' checked='checked'/>
											<label for='tab_ind'>Indonesian</label>
											<input type='radio' name='tabGroup1' id='tab_eng' class='tab_eng'/>
											<label for='tab_eng'>English</label>
											<div  class='tab_ind' >
										  <textarea name='isi_hal_statis' id='isi_hal_statis' style='width:500px; height:350px;'	></textarea>
										 </div>
										 <div class='tab_eng'  >
										  <textarea name='isi_article_eng' id='isi_article_eng'  style='width:600px; height:350px;' ></textarea>
										 </div>
										</div>
										<br><br>
										
										<label>Gambar</label><br><br>
										<input type='file' name='gambar' id='gambar' /></br></br></br></br>
										<input type='submit'   value='Simpan' /><input type='button' value= 'Cancel' onclick='history.back()'>
					  </form></div></div>";
		break;
			
		case "edit_halaman_statis":
		$id_hal_statis = $_GET['id_hal_statis'];
			$hal = mysql_fetch_array(mysql_query("select * from halaman_statis where id_hal_statis = '$id_hal_statis' "));
						echo "<h2>Edit Halaman Statis</h2>
						<div class='tab_content'>
											<input type='radio' name='holder' id='tab_child_content'  class='tab_child_content' checked='checked'/>
											<label for='tab_child_content' id='tab_child_content'> Edit Album Photo</label>
								<div  class='tab_child_content' >
								<form method='post'  action='$aksi?page=halaman_statis&act=update_halaman_statis'   enctype='multipart/form-data' name='form_kategori_page' id='form_kategori_page'  class='form_category'>
										<input type='hidden' name='id_hal_statis' id='id_hal_statis' value='$hal[id_hal_statis]' />
										<label>Judul:</label>
										<input type='text' id='nama_halaman_statis' name='nama_halaman_statis' value ='$hal[nama_hal_statis]' class='easyui-validatebox' required='true'/>
										<br><br>
										<div class='tabGroup'>
											<input type='radio' name='tabGroup1' id='tab_ind' class='tab_ind' checked='checked'/>
											<label for='tab_ind'>Indonesian</label>
											<input type='radio' name='tabGroup1' id='tab_eng' class='tab_eng'/>
											<label for='tab_eng'>English</label>
											<div  class='tab_ind' >
										  <textarea name='isi_hal_statis' id='isi_hal_statis' style='width:500px; height:350px;'	> $hal[isi_hal_statis]</textarea>
										 </div>
										 <div class='tab_eng'  >
										  <textarea name='isi_article_eng' id='isi_article_eng'  style='width:600px; height:350px;' ></textarea>
										 </div>
										</div>
										<br><br>
										
										<label>Gambar</label><br><br>";
										if ($hal['gambar'] != 0)
											{
												echo"<div class='record' >
														<img src='../upload/static/$hal[gambar]' /> 
															<a href='#' id='$hal[id_hal_statis]' class='delete' ></a>	
													</div>";
											}
										echo"<small>* Kosongkan Gambar Bila Tidak Diganti</small><br>
										<input type='file' name='gambar' id='gambar' /></br></br>
										<input type='submit'   value='Simpan' />
										<input type='button' value= 'Cancel' onclick='history.back()'>
					  </form></div></div>";
		break;
		}
			  

?>