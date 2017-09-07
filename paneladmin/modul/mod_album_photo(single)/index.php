<script type="text/javascript" src="modul/mod_album_photo(single)/js/jquery.wallform.js"></script>
<link rel="stylesheet" type="text/css" href="modul/mod_album_photo(single)/css/style.css" media="screen" />


<script type="text/javascript" src="modul/mod_album_photo(single)/source/fancybox_gallery.js"></script>
<script type="text/javascript" src="modul/mod_album_photo(single)/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="modul/mod_album_photo(single)/source/jquery.fancybox.css?v=2.1.5" media="screen" />

<script type="text/javascript">		 
$(function(){
$("#upload_link").on('click', function(e){
    e.preventDefault();
    $("#upload:hidden").trigger('click');
});
});

				$(document).ready(function()
				{

				$('#input_image').click (function()
				 {
				var A=$("#imageloadstatus");
				var B=$("#imageloadbutton");

				$("#imageform").ajaxForm({target: '#preview',
				beforeSubmit:function(){
				A.show();
				B.hide();
				
				},
				success:function(){
				 location.reload();
				},
				error:function(){
				A.hide();
				B.show();
				} }).submit();
				setTimeout(function(){
							location.reload();
						}, 100); 
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

$(function() {
	$(".modalbox").click(function() {
		var id = $(this).attr("id");
		$.ajax({
			   type: "GET",
			   url: "modul/mod_album_photo(single)/dapet_image.php",
			   data: 'id='+id,
			   cache: false,
			   success: function(datas){
				var dapet = eval('(' + datas + ')');
						$("#id_gallery").val(dapet.id_gallery_photo);
						$("#update_keterangan").val(dapet.keterangan);
						$("#update_keterangan_eng").val(dapet.keterangan_eng);
						$(".box2").html("<img src=\"../upload/album_photo/"+dapet.photo+"\"/>");     //add the source to audio*										
			  }
			   
			 });
		
	});
	$('#update_button').click (function()
				 {
				$("#contact").ajaxForm({
				beforeSubmit:function(){
				},
				success:function(){
				document.location.reload();
				},
				error:function(){
				} }).submit();
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
	$sql = mysql_query("select * from album_photo order by id_album_photo asc");
	$aksi="modul/mod_album_photo(single)/aksi_album_photo.php";
	switch($_GET[act]){	
		default:
		echo "<div class='workplace'>
		  <p align='right'><a href='?page=album_photo&act=add_album_photo' role='button' class='btn'>Create New</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Content Article</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
		<table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
			<thead>
                <tr>
                <th width='1%'><input type='checkbox' name='checkbox'/></th>
                <th width='15%'>NAMA MENU</th>
                <th width='10%' style='text-align:center;'>DETAIL</th>
                <th width='5%' style='text-align:center;'>AKSI</th>             
				<th width='1%'></th>
                </tr>
            </thead>
			<tbody>";
					while($z = mysql_fetch_array($sql))
					{
						echo "<tr>
							  <td><input type='checkbox' name='checkbox'/></td>";
						echo "<td> $z[nama_album_photo]</td>";
						echo "<td align=center  style='width:100px;'>
						<td'>
							<a href='?page=album_photo&act=detail_album&id_album_photo=$z[id_album_photo]' class='icon-search'> 
							</a>
						</td>
						<td style='text-align:center;'>
							<a href='?page=album_photo&act=edit&id_album_photo=$z[id_album_photo]' class='icon-edit'></a>|";?>
							<a href="<?php echo"$aksi?page=album_photo&act=delete_album_photo&id_album_photo=$z[id_album_photo]"; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?');"class='icon-remove'></a>
					<?php echo" 	</td>
						<td></td>
						</tr>";
					$no++;
					}
			
			echo "</tbody></table>
			</div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>";
				
		break;
		
		case "add_album_photo":
						echo "<div class='workplace form'>
					<div class='row-fluid'>
						<div class='span6'>
						  <div class='block-fluid'>                        
							<div class='head clearfix'>
								<div class='isw-favorite'></div>
								<h1>Add Album Photo</h1>
						</div>    
						</div>    
							<fieldset style='border:1px solid #ddd; padding:10px 10px; width:250px;'><legend style='border:1px solid #ddd; padding:5px 5px; background:#fff;'><label>Album Position:</label></legend>";
										include "modul/mod_album_photo(single)/menu_tools/index.php";
										echo"</fieldset>
						<form method='post'  action='$aksi?page=album_photo&act=input_album_photo'   name='form_kategori_page' id='form_kategori_page'  class='form_category'>
						<div class='row-form clearfix'>
								<div class='span3'>Nama Album Photo :</div>
						</div>
						<div class='row-form clearfix'>
								<div class='span5'>
									<input type='hidden' name='gen_code_photo' value='$gen_code' /> 
										<input type='text' id='nama_album_photo' name='nama_album_photo' class='easyui-validatebox' required='true'/>
										<input type='text' name='id_menu' id='result'>
								</div>	
						</div>	
							<div class='row-form clearfix'>
								<input type='submit'   class='btn' value='Simpan' />
								<input type='button' value= 'Cancel'  class='btn' onclick='history.back()'>
							</div> 
							 </div> 
					</div> 
				</div> 
			</div> 
							</form>";
		break;
			
		case "edit":
		$id_album_photo = $_GET['id_album_photo'];
			$album = mysql_fetch_array(mysql_query("select * from album_photo where id_album_photo = '$id_album_photo'"));
			$menu1 = mysql_fetch_array(mysql_query("select * from menu where id_menu = '$album[id_menu]' "));
			$menu2 = mysql_fetch_array(mysql_query("select * from menu where id_menu = '$menu1[id_parent]' "));
			$menu3 = mysql_fetch_array(mysql_query("select * from menu where id_menu = '$menu2[id_parent1]' "));
		echo "<div class='workplace form'>
				<div class='row-fluid'>
						<div class='span6'>
						  <div class='block-fluid'>                        
							<div class='head clearfix'>
								<div class='isw-favorite'></div>
								<h1>Edit Album Photo</h1>
						</div>    
						</div>   
				<form method='post'  action='$aksi?page=album_photo&act=update_album_photo'   name='form_kategori_page' id='form_kategori_page'  class='form_category'>
					<input type='hidden' name='id_album_photo' value='$id_album_photo' >
					<div class='row-form clearfix'>
								<div class='span5'>
						<label>Nama Album Photo:</label>
						<input type='text' id='nama_album_photo' name='nama_album_photo' value='$album[nama_album_photo]' class='easyui-validatebox' required='true'/>
					</div>
					</div>
				
				<label>Before Position :</label> <small2> $menu3[menu_name] -> $menu2[menu_name] -> $menu1[menu_name] </small2><br>
					<br> <label>Move to :</label>";
					include "modul/mod_album_photo(single)/menu_tools/index.php";
				echo"
				<input type='hidden' name='id_menu' id='result' >
				<input type='submit'   value='Simpan' />
				<input type='button' value= 'Cancel' onclick='history.back()'></div> 
				</div> 
				</div> 
				 </form>";
		break;
		
		case "detail_album":
			$id_album_photo = $_GET['id_album_photo'];
			$r = mysql_fetch_array(mysql_query("select * from album_photo where id_album_photo = '$id_album_photo' "));
		
		echo" <form id='imageform' method='post' enctype='multipart/form-data' action='modul/mod_album_photo(single)/ajaximage.php'>
				<div class='workplace form'>
				<div class='row-fluid'>
				<div class='span10'>
				<div class='block-fluid'>                        
				<div class='head clearfix'>
				<div class='isw-bookmark'></div>
					<h1>Upload Image Album</h1>
				</div>
				<input type='hidden' name='gen_code_video' value='$gen_code' /> 
					<div class='row-form clearfix offset9'>
							<div class='span5'>
							<input type='button' value='Save Album' id='apply_album_photo'  class='btn' >
							</div>
					</div>
					<div class='row-form clearfix'>
							<div class='span3'>Image File:</div>
							<div class='span5'>
							<input type='hidden' name='gen_code_photo' id='gen_code_photo' value='$r[gen_code_photo]'>
							<input type='file' name='photoimg' id='photoimg' />
							</div>
					</div>
					<div class='row-form clearfix'>
							<div class='span3'>Keterangan:</div>
							<div class='span5'>
										<div class='tabbable' id='tabs-a'>
											<ul class='nav nav-tabs'>
												<li  class='active'>
													<a href='#panel-a1' data-toggle='tab'>Bahasa Indonesia</a>
												</li>
												<li>
													<a href='#panel-a2' data-toggle='tab'>English</a>
												</li>
											</ul>
											<div class='tab-content'>
												<div class='tab-pane active' id='panel-a1'>
													<textarea name='keterangan' id='keterangan' style='width:620px; height:200px;'	></textarea>
												</div>
												<div class='tab-pane ' id='panel-a2'>
													<textarea name='keterangan_eng' id='keterangan_eng'  style='width:620px; height:200px;' ></textarea>
												</div>
											</div>
										</div>
							</div>
					</div>
					<div class='row-form clearfix'>
						<div class='span5'>
							<input type='button' name='input_image' id='input_image' class='btn' value='Upload' />
							<input type='button' value= 'Cancel' onclick='history.back()' id='cancel' class='btn'>
							<div id='imageloadstatus' style='display:none; margin-top:50px;'><img src='images/loader.gif' alt='Uploading....'/></div>
						</div>
					</div>
					</div>
					</div>
					</div>
					</div>
					</form>";
					$col = 3;
					$result = mysql_query("SELECT * from gallery_photo  
											CROSS JOIN album_photo on album_photo.gen_code_photo = gallery_photo.gen_code_photo 
											WHERE album_photo.id_album_photo = '$id_album_photo' order by gallery_photo.id_gallery_photo desc");
					echo"<div class='span9'><div id='scroll'>";
				echo"<table id='table_edit_image'  ><tr>";
														$cnt = 0;
																	while($row = mysql_fetch_array($result)) 
														{
															if ($cnt >= $col) {
																	echo "</tr><tr>";
																	$cnt = 0;
																  }
																  $cnt++;		
																	
																	echo "<td >
																<div class='picture left' style='width:175px;'>
																	<div class='box'>
																			<a class='fancybox-buttons' data-fancybox-group='button' href='../upload/album_photo/$row[photo]' data-caption=".(implode(" ", array_slice(explode(" ", $row['keterangan']), 0, 10))); echo">
																			<img src='../upload/album_photo/$row[photo]' /></a>
																			<a href='#' id='$row[id_gallery_photo]' class='delete_photo' ></a>	
																	</div>
																<div id='caption'>".(implode(" ", array_slice(explode(" ", $row['keterangan']), 0, 3))); echo".. </div>
																<a class='button modalbox' href='#inline' id='$row[id_gallery_photo]'>Edit</a>
																</div>
																	</td>";
														}
													echo"</tr></table></div></div>
			
		<p></p>
		<div id='inline'>
			<form id='contact' name='contact' enctype='multipart/form-data' action='modul/mod_album_photo(single)/update_image.php'  method='post'>
				<fieldset>
				<legend>Update Image / Description</legend>
				<label>Update image: </label><br><br>
					<div id='imageloadstatus' style='display:none; margin-top:50px;'><img src='images/loader.gif' alt='Uploading....'/></div>
					<div id='imageloadbutton'>
					<input type='hidden' name='id_gallery' id='id_gallery'>
						<div class='box2'>
						</div>						
					<input type='file' name='photoimg' id='photoimg' />
					<small>*kosongkan bila gambar tidak diganti</small>
					</div>	<br><br>
					<label>Keterangan :</label><br><br>
					<div class='tabGroup2'>
											<input type='radio' name='tabGroup2' id='tab_ind2' class='tab_ind2' checked='checked'/>
											<label for='tab_ind2'>Indonesian</label>
											<input type='radio' name='tabGroup2' id='tab_eng2' class='tab_eng2'/>
											<label for='tab_eng2'>English</label>
											<div  class='tab_ind2' >
											  <textarea name='update_keterangan' id='update_keterangan' style='width:580px; height:200px;'></textarea>
											</div>
											<div class='tab_eng2'  >
											  <textarea name='update_keterangan_eng' id='update_keterangan_eng'  style='width:580px; height:200px;' ></textarea>
											</div>
					</div><br>
					<input type='button' class='btn' name='update_button' id='update_button' value='Update' />
					<input type='button' class='btn' value= 'Cancel' onclick='history.back()' id='cancel'>
				</fieldset>
				
			</form>
		</div>";
													
		break;
		}
			  

?>