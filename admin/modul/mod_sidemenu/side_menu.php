		<script src="modul/mod_sidemenu/js/jquery-1.9.1.js"></script>
	<script src="modul/mod_sidemenu/js/jquery.cookie.js" type="text/javascript"></script>
	<script src="modul/mod_sidemenu/js/jquery.treeview.js" type="text/javascript"></script>
	<link rel="stylesheet" href="modul/mod_sidemenu/css/jquery.treeview.css"  type="text/css"/> 
	<link rel="stylesheet" href="modul/mod_sidemenu/css/tab.css"  type="text/css"/> 
<script type="text/javascript">
$(function() {
	$(".delbutton").click(function(){
		//Save the link in a variable called element
		var element = $(this);
		//Find the id of the link that was clicked
		var del_id = element.attr("id");
		//Built a url to send
		var info = 'id=' + del_id;
		if(confirm("Sure you want to remove this article from Menu?"))
		{
			$.ajax({
				type: "GET",
				url: "modul/mod_sidemenu/act/delete.php",
				data: info,
				success: function() {
								
								}
			});
			$(this).parents(".record_delete").animate({ backgroundColor: "#fbc7c7" }, "fast")
			.animate({ opacity: "hide" }, "slow");
			location.reload();
		}
		return false;
	});
});
</script>
	<!--Tree Menu-->
<script type="text/javascript">
$(document).ready(function(){
	$("#navigation").treeview({
		persist: "location",
		collapsed: true,
		unique: true
	});
});
</script>

<!--Get ID FOrm Popup-->
<script>	
//SM1
function sd1(intValue){			
		// alert('tae')
	$('#id_loginmodal').val(intValue);
	var id = +intValue;
	$.ajax({
        type: "GET",
        url: "modul/mod_sidemenu/act/act_sd1.php",
        data:"id="+id,
        success: function() {
            // alert("Request Berhasil Dikirim");
        }
    });
    return true;
}

//SM2
function sd2(intValue){			
	$('#id_loginmodal2').val(intValue);
	var id = +intValue;
	$.ajax({
        type: "GET",
        url: "modul/mod_sidemenu/act/act_sd2.php",
        data:"id="+id,
        success: function() {
            // alert("Request Berhasil Dikirim");
        }
    });
    return true;
}

//SM3
function sd3(intValue){			
	$('#id_loginmodal3').val(intValue);
	var id = +intValue;
	$.ajax({
        type: "GET",
        url: "modul/mod_sidemenu/act/act_sd3.php",
        data:"id="+id,
        success: function() {
            // alert("Request Berhasil Dikirim");
        }
    });
    return true;
}

//SM3a
function sd3a(intValue){			
	$('#id_loginmodal3a').val(intValue);
	var id = +intValue;
	$.ajax({
        type: "GET",
        url: "modul/mod_sidemenu/act/act_sd3a.php",
        data:"id="+id,
        success: function() {
            // alert("Request Berhasil Dikirim");
        }
    });
    return true;
}

//SM4
function sd4(intValue){			
	$('#id_loginmodal4').val(intValue);
	var id = +intValue;
	$.ajax({
        type: "GET",
        url: "modul/mod_sidemenu/act/act_sd4.php",
        data:"id="+id,
        success: function() {
            // alert("Request Berhasil Dikirim");
        }
    });
    return true;
}
</script>	

<?php
include "modul/mod_sidemenu/menu_3/sidemenu_pop_form.php";
include "../config/connect.php";
	// mysql_connect("localhost","root","") or die 	("Gagal;");
	// mysql_select_db("cms") or die ("Database Salah");
?>
<h2>Side Menu </h2>
<div class='tab_content'>
								<input type='radio' name='holder' id='tab_child_content' class='tab_child_content' checked='checked'/>
								<label for='tab_child_content' id='tab_child_content'>Side Menu</label>
								<div  class='tab_child_content' >		

<div id="css_menu_tree">
<ul id="navigation">
	<?php
		$sidemenu=mysql_query("SELECT * FROM side_menu WHERE sidemenu_stats='sd' ORDER BY sidemenu_list_number");
		while($r1=mysql_fetch_array($sidemenu)){
			echo "<li  ><a href='?page=side_menu&act=edit_sidemenu&id=$r1[id_sidemenu]'>$r1[sidemenu_name]</a>";
			
			//sub1
			$sidemenu2=mysql_query("SELECT * FROM side_menu 
								WHERE sidemenu_stats='sd1' AND id_sidemenu_parent=$r1[id_sidemenu] ORDER BY sidemenu_list_number");
			$cnt1=mysql_num_rows($sidemenu2);
			if($cnt1 > 0){
				echo"<ul>";
				while ($r2=mysql_fetch_array($sidemenu2)){
					echo"<li ><a href='?page=side_menu&act=edit_sidemenu_sd1&id=$r2[id_sidemenu]' >$r2[sidemenu_name]</a>";
					
					//sub2
					$menu3=mysql_query("SELECT * FROM side_menu 
								WHERE sidemenu_stats='sd2' AND id_sidemenu_parent=$r2[id_sidemenu] ORDER BY sidemenu_list_number");
					$cnt2=mysql_num_rows($menu3);
					if($cnt2 > 0){
						echo"<ul>";
						while ($r3=mysql_fetch_array($menu3)){
							echo"<li ><a href='?page=side_menu&act=edit_sidemenu_sd2&id=$r3[id_sidemenu]'>$r3[sidemenu_name]</a>";
							
							
								//sub3
							$menu3a=mysql_query("SELECT * FROM side_menu 
								WHERE sidemenu_stats='sd3' AND id_sidemenu_parent=$r3[id_sidemenu] ORDER BY sidemenu_list_number");
							$cnt3=mysql_num_rows($menu3a);
							if($cnt3 > 0){
								echo"<ul>";
								while ($r3a=mysql_fetch_array($menu3a)){
									echo"<li ><a href='?page=side_menu&act=edit_sidemenu_sd3&id=$r3a[id_sidemenu]'>$r3a[sidemenu_name]</a>";
									
									
									//sub4
									$menu4=mysql_query("SELECT * FROM side_menu 
										WHERE sidemenu_stats='sd3a' AND id_sidemenu_parent=$r3a[id_sidemenu] ORDER BY sidemenu_list_number");
									$cnt4=mysql_num_rows($menu4);
									if($cnt4 > 0){
										echo"<ul>";
										while ($r4=mysql_fetch_array($menu4)){
											echo"<li ><a href='?page=side_menu&act=edit_sidemenu_sd4&id=$r4[id_sidemenu]' >$r4[sidemenu_name]</a>";	
							
											//sub5
											$menu5=mysql_query("SELECT * FROM side_menu 
												WHERE sidemenu_stats='sd4' AND id_parent=$r4[id_sidemenu] ORDER BY sidemenu_list_number");
											$cnt5=mysql_num_rows($menu5);
											if($cnt5 > 0){
												echo"<ul>";
												while ($r5=mysql_fetch_array($menu5)){
													echo"<li ><a href='?page=side_menu&act=edit_sidemenu_sd5&id=$r5[id_sidemenu]' >$r5[sidemenu_name]</a></li>";	
																				
												}
												$sd4= $r4[id_sidemenu];
												echo"<li><a href='#login-box4' onclick='sd4($sd4)' class='login-window' id='tip3'>
												<img src='images/add5.png'/>
												<span> Click for Add Submenu from this Parent</span>
												</a></li>";
												//end sub5
												echo "</ul>
											</li>";
											}
											else{
												$sd4= $r4[id_sidemenu];
												echo"<ul><li><a href='#login-box4' onclick='sm4($sd4)' class='login-window' id='tip3'>
												<img src='images/add5.png'/>
												<span> Click for Add Submenu from this Parent</span>
												</a></li></ul></li>";
											}
											
										}
										$sd3a= $r3a[id_sidemenu];
										echo"<li><a href='#login-box3a' onclick='sd3a($sd3a)' class='login-window' id='tip3'>
										<img src='images/add4.png'/>
										<span> Click for Add Submenu from this Parent</span>
										</a></li>";
										//end sub4
										echo "</ul>
										</li>";
									}
									else{
										$sd3a= $r3a[id_sidemenu];
										echo"<ul><li><a href='#login-box3a' onclick='sm3a($sd3a)' class='login-window' id='tip3'>
										<img src='images/add4.png'/>
										<span> Click for Add Submenu from this Parent</span>
										</a></li></ul></li>";
									}

								}
								$sd3= $r3[id_sidemenu];
								echo"<li><a href='#login-box3' onclick='sd3($sd3)' class='login-window' id='tip3'>
								<img src='images/add3.png'/>
								<span> Click for Add Submenu from this Parent</span>
								</a></li>";
								//end sub3
								echo "</ul>
								</li>";
							}
							else{
								$sd3= $r3[id_sidemenu];
								echo"<ul><li><a href='#login-box3' onclick='sd3($sd3)' class='login-window' id='tip3'>
								<img src='images/add3.png'/>
								<span> Click for Add Submenu from this Parent</span>
								</a></li></ul></li>";
							}
					
						}
					$sd2= $r2[id_sidemenu];
					echo"<li><a href='#login-box2' onclick='sd2($sd2)' class='login-window' id='tip3'>
					<img src='images/add2.png'/>
					<span> Click for Add Submenu from this Parent</span>
					</a></li>";
					//end sub2
					echo "</ul>
					</li>";
					}
					else{
						$sd2= $r2[id_sidemenu];
						echo"<ul><li><a href='#login-box2' onclick='sd2($sd2)' class='login-window' id='tip3'>
						<img src='images/add2.png'/>
						<span> Click for Add Submenu from this Parent</span>
						</a></li></ul></li>";
					}
	
				}
				$sd1= $r1[id_sidemenu];
				echo"<li><a href='#login-box1' onclick='sd1($sd1)' class='login-window' id='tip3'>
				<img src='images/add1.png'/>
				<span> Click for Add Submenu from this Parent</span>
				</a></li>";
				//End sub1
				echo "</ul>
				</li>";
				
			}
			else{
				$sd1= $r1[id_sidemenu];
				echo"<ul><li><a href='#login-box1' onclick='sd1($sd1)' class='login-window' id='tip3'>
				<img src='images/add1.png'/>
				<span> Click for Add Submenu from this Parent</span>
				</a></li></ul></li>";
			}
		}
		echo "<div class='post'>
        	<div class='btn-sign'>
				<a href='#login-box' class='login-window'><img src='images/add.png' class='add_menu_b' title='Add Menu' alt='Add Menu'/></a>
        	</div>
		</div>"; 	
				//Menu Pop Up//
				include "menu_3/pop_form.php";
				include "modul/mod_sidemenu/menu_3/pop_form_sd1.php";
				include "modul/mod_sidemenu/menu_3/pop_form_sd2.php";
				include "modul/mod_sidemenu/menu_3/pop_form_sd3.php";
				include "modul/mod_sidemenu/menu_3/pop_form_sd3a.php";
				include "modul/mod_sidemenu/menu_3/pop_form_sd4.php";
			?>
</ul>
</div>
<?php 

$aksi="modul/mod_sidemenu/aksi_side_menu.php";
switch($_GET[act]){	

		default:
			
		break;
		// EDIT MENU TERATAS (NO-PARENT)
		case "edit_sidemenu":
						$id_sidemenu = $_GET['id'];
						$sql = mysql_query("select * from side_menu where id_sidemenu = '$id_sidemenu' ");
						$x = mysql_fetch_array($sql);
					echo"<div class='tabGroupmenu'>
											<input type='radio' name='tabGroup1' id='tab_edit' class='tab_edit' checked='checked'/>
											
											<label for='tab_edit'>Edit Side Menu</label>
											<input type='radio' name='tabGroup1' id='tab_article' class='tab_article'/>
											<label for='tab_article'>Pilih Article</label>
									<div  class='tab_edit' >
									<form method='post' style='padding:45px 10px' action='$aksi?page=side_menu&act=update_sidemenu'   name='form_page' id='form_page' >
									<a href='$aksi?page=side_menu&gen=delete_side_menu&id=$id_sidemenu' class='tip2' ";?>onClick="return confirm('Anda yakin akan menghapus data ini?');"><?php echo"<img src='images/delete.png' style='width:14px; height:14px;'><span>Delete this Menu</span></a>
									<input type='hidden' name='id_sidemenu' id='id_sidemenu' value='$x[id_sidemenu]'>
										<label2>Edit Menu $x[sidemenu_name]</label2><br><br>
										<label>Name (indonesian):</label>
										<input type='text' id='sidemenu_name' name='sidemenu_name' value='$x[sidemenu_name]' class='easyui-validatebox' required='true'/>
										<label>Name (English):</label>
										<input type='text' id='sidemenu_name_english' name='sidemenu_name_english' value='$x[sidemenu_name_english]' class='easyui-validatebox' required='true'/>
										<label>Urutan</label>
										<input type='text' name='urutan' value='$x[sidemenu_list_number]' id='urutan' style='width:40px;' /><br>
										<input type='submit'   value='UPDATE' /><input type='button' value= 'CANCel' onclick='history.back()'>
										</form>
										<label>Article</label>
										
											<table id='table1'>
												<tr><th style='text-align:center; width:10px;'>No</th>
													<th style='text-align:center;'>Judul Article</th>
													<th style='text-align:center;'>Remove</th>
												</tr>";
												$article = mysql_query("select * from article WHERE sidemenu_stats='sd' AND id_sidemenu='$x[id_sidemenu]' ");
												$no = 1;
												while($y = mysql_fetch_array($article))
												{
													echo "
														<tr class='record_delete'>
														<td align='center' style='width:20px;'>$no</td>
														<td style='padding-left:10px;'>".(implode(" ", array_slice(explode(" ", $y['title']), 0, 3))); echo"..</td>
														<td align='center'>
															<a href='#' id=$y[id_article] class='delbutton'>
																<img src='images/remove.png' />
															</a>
														</td>
														</tr>";						
													$no++;
												}
											echo"</table>
										 </div>
										  <div class='tab_article' >
										  <form  method='post' id='select_album_video' action='modul/mod_sidemenu/aksi_side_menu.php?page=side_menu&act=update_sd'>
											<input type='text' name='id_sidemenu' id='id_sidemenu' value='$x[id_sidemenu]'>
											<label> Pilih Article</label>
											
											<table id='table1'>
												<tr ><th style='text-align:center;'>No</th>
													<th style='text-align:center;'>Judul_Article</th>
													<th style='text-align:center;'>Pilih</th>
												</tr>";?>
												
												
												<?php
												$article = mysql_query("select * from article WHERE sidemenu_stats ='' and status = 'Y' ");
												$no = 1;
												while($x = mysql_fetch_array($article))
												{
													echo "
														<tr><td align='center'>$no</td>
														<td>$x[title]</td>
														<td align='center'>
															<input type='checkbox'  value='$x[id_article]' name='id_article[]' $key /> 
														</td>
														</tr>";						
													$no++;
													echo "";
												}
											echo"</table>
											<input type='submit' name='ok' value='Add'>
											</form>
										 </div>
										</div>";
		break;
		case "edit_sidemenu_sd1":
					$id_sidemenu = $_GET['id'];
						$sql = mysql_query("select * from side_menu where id_sidemenu = '$id_sidemenu' ");
						$x = mysql_fetch_array($sql);
					echo"<div class='tabGroupmenu'>
											<input type='radio' name='tabGroup1' id='tab_edit' class='tab_edit' checked='checked'/>
											<label for='tab_edit'>Edit Side Menu</label>
											<input type='radio' name='tabGroup1' id='tab_article' class='tab_article'/>
											<label for='tab_article'>Pilih Article</label>
									<div  class='tab_edit' >
									<form method='post' style='padding:45px 10px' action='$aksi?page=side_menu&act=update_sidemenu'   name='form_page' id='form_page' >
										<a href='$aksi?page=side_menu&gen=delete_sd1&id=$id_sidemenu' class='tip2' ";?>onClick="return confirm('Anda yakin akan menghapus data ini?');"><?php echo"<img src='images/delete.png' style='width:14px; height:14px;'><span>Delete this Menu</span></a>
										<input type='hidden' name='id_sidemenu' id='id_sidemenu' value='$x[id_sidemenu]'>
										<label2>Edit Menu $x[sidemenu_name]</label2><br><br>
										<label>Name (indonesian):</label>
										<input type='text' id='sidemenu_name' name='sidemenu_name' value='$x[sidemenu_name]' class='easyui-validatebox' required='true'/>
										<label>Name (English):</label>
										<input type='text' id='sidemenu_name_english' name='sidemenu_name_english' value='$x[sidemenu_name_english]' class='easyui-validatebox' required='true'/>
										<input type='text' name='urutan' value='$x[sidemenu_list_number]' id='urutan' style='width:40px;' /><br>
										<input type='submit'   value='UPDATE' /><input type='button' value= 'CANCel' onclick='history.back()'>
										</form>
										<label>Article</label>
										
											<table id='table1'>
												<tr><th style='text-align:center; width:10px;'>No</th>
													<th style='text-align:center;'>Judul Article</th>
													<th style='text-align:center;'>Remove</th>
												</tr>";
												$article = mysql_query("select * from article WHERE sidemenu_stats='sd1' AND id_sidemenu='$x[id_sidemenu]' ");
												$no = 1;
												while($y = mysql_fetch_array($article))
												{
													echo "
														<tr class='record_delete'>
														<td align='center' style='width:20px;'>$no</td>
														<td style='padding-left:10px;'>".(implode(" ", array_slice(explode(" ", $y['title']), 0, 3))); echo"..</td>
														<td>
															<a href='#' id=$y[id_article] class='delbutton'>
																<img src='images/remove.png' />
															</a>
														</td>
														</tr>";						
													$no++;
												}
											echo"</table>
										 </div>
										  <div class='tab_article' >
										  <form  method='post' id='select_album_video' action='modul/mod_sidemenu/aksi_side_menu.php?page=side_menu&act=update_sd1'>
											<input type='hidden' name='id_sidemenu' id='id_sidemenu' value='$x[id_sidemenu]'>
											<label> Pilih Article</label>
											
											<table id='table1'>
												<tr ><th style='text-align:center;'>No</th>
													<th style='text-align:center;'>Judul_Article</th>
													<th style='text-align:center;'>Pilih</th>
												</tr>";?>
												
												
												<?php
												$article = mysql_query("select * from article WHERE sidemenu_stats ='' and status = 'Y' ");
												$no = 1;
												while($x = mysql_fetch_array($article))
												{
													echo "
														<tr><td align='center'>$no</td>
														<td>$x[title]</td>
														<td align='center'>
															<input type='checkbox'  value='$x[id_article]' name='id_article[]' $key /> 
														</td>
														</tr>";						
													$no++;
													echo "";
												}
											echo"</table>
											<input type='submit' name='ok' value='Add'>
											</form>
										 </div>
										</div>";
		break;
		
		
		case "edit_sidemenu_sd2":
					// echo $_GET['id'];
						$id_sidemenu = $_GET['id'];
						$sql = mysql_query("select * from side_menu where id_sidemenu = '$id_sidemenu' ");
						$x = mysql_fetch_array($sql);
					echo"<div class='tabGroupmenu'>
											<input type='radio' name='tabGroup1' id='tab_edit' class='tab_edit' checked='checked'/>
											<label for='tab_edit'>Edit Menu</label>
											<input type='radio' name='tabGroup1' id='tab_article' class='tab_article'/>
											<label for='tab_article'>Pilih Article</label>
									<div  class='tab_edit' >
									<form method='post' style='padding:45px 10px' action='$aksi?page=side_menu&act=update_sidemenu'   name='form_page' id='form_page' >
										<a href='$aksi?page=side_menu&gen=delete_sd2&id=$id_sidemenu' class='tip2' ";?>onClick="return confirm('Anda yakin akan menghapus data ini?');"><?php echo"<img src='images/delete.png' style='width:14px; height:14px;'><span>Delete this Menu</span></a>
										<input type='hidden' name='id_sidemenu' id='id_sidemenu' value='$x[id_sidemenu]'>
										<label2>Edit Menu $x[sidemenu_name]</label2><br><br>
										<label>Name (indonesian):</label>
										<input type='text' id='sidemenu_name' name='sidemenu_name' value='$x[sidemenu_name]' class='easyui-validatebox' required='true'/>
										<label>Name (English):</label>
										<input type='text' id='sidemenu_name_english' name='sidemenu_name_english' value='$x[sidemenu_name_english]' class='easyui-validatebox' required='true'/>
										<label>Urutan</label>
										<input type='text' name='urutan' value='$x[list_number]' id='urutan' style='width:40px;' /><br>
										<input type='submit'   value='UPDATE' /><input type='button' value= 'CANCel' onclick='history.back()'>
										</form>
										<label>Article</label>
										
											<table id='table1'>
												<tr><th style='text-align:center; width:10px;'>No</th>
													<th style='text-align:center;'>Judul Article</th>
													<th style='text-align:center;'>Remove</th>
												</tr>";
												$article = mysql_query("select * from article WHERE sidemenu_stats='sd2' AND id_sidemenu='$x[id_sidemenu]' ");
												$no = 1;
												while($y = mysql_fetch_array($article))
												{
													echo "
														<tr class='record_delete'>
														<td align='center' style='width:20px;'>$no</td>
														<td style='padding-left:10px;'>".(implode(" ", array_slice(explode(" ", $y['title']), 0, 3))); echo"..</td>
														<td>
															<a href='#' id=$y[id_article] class='delbutton'> 
																<img src='images/remove.png' />$y[id_article]
															</a>
														</td>
														</tr>";						
													$no++;
												}
											echo"</table>
										 </div>
										  <div class='tab_article' >
						<form  method='post' id='select_album_video' action='modul/mod_sidemenu/aksi_side_menu.php?page=side_menu&act=update_sd2'>
											<input type='hidden' name='id_sidemenu' id='id_sidemenu' value='$x[id_sidemenu]'>
											<label> Pilih Article</label>
											<table id='table1'>
												<tr ><th style='text-align:center;'>No</th>
													<th style='text-align:center;'>Judul_Article</th>
													<th style='text-align:center;'>Pilih</th>
												</tr>";?>
												<?php
												$article = mysql_query("select * from article WHERE sidemenu_stats ='' and status = 'Y'");
												$no = 1;
												while($x = mysql_fetch_array($article))
												{
													echo "
														<tr><td align='center'>$no</td>
														<td>$x[title]</td>
														<td align='center'>
															<input type='checkbox'  value='$x[id_article]' name='id_article[]' $key   /> 
														</td>
														</tr>";						
													$no++;
													echo "";
												}
											echo"</table>
											<input type='submit' name='ok' value='Add'>
											</form>
										 </div>
										</div>";
		break;
		
		case "edit_sidemenu_sd3":
						$id_sidemenu = $_GET['id'];
						$sql = mysql_query("select * from menu where id_sidemenu = '$id_sidemenu' ");
						$x = mysql_fetch_array($sql);
					echo"<div class='tabGroupmenu'>
											<input type='radio' name='tabGroup1' id='tab_edit' class='tab_edit' checked='checked'/>
											<label for='tab_edit'>Edit Menu</label>
											<input type='radio' name='tabGroup1' id='tab_article' class='tab_article'/>
											<label for='tab_article'>Pilih Article</label>
									<div  class='tab_edit' >
									<form method='post' style='padding:45px 10px' action='$aksi?page=side_sidemenu&act=update_sidemenu'   name='form_page' id='form_page' >
										<a href='$aksi?page=side_menu&gen=delete_sd3&id=$id_sidemenu' class='tip2' ";?>onClick="return confirm('Anda yakin akan menghapus data ini?');"><?php echo"<img src='images/delete.png' style='width:14px; height:14px;'><span>Delete this Menu</span></a>
										<input type='hidden' name='id_sidemenu' id='id_sidemenu' value='$x[id_sidemenu]'>
										<label2>Edit Menu $x[sidemenu_name]</label2><br><br>
										<label>Name (indonesian):</label>
										<input type='text' id='sidemenu_name' name='sidemenu_name' value='$x[sidemenu_name]' class='easyui-validatebox' required='true'/>
										<label>Name (English):</label>
										<input type='text' id='sidemenu_name_english' name='sidemenu_name_english' value='$x[sidemenu_name_english]' class='easyui-validatebox' required='true'/>
										<label>Urutan</label>
										<input type='text' name='urutan' value='$x[sidemenu_list_number]' id='urutan' style='width:40px;' /><br>
										<input type='submit'   value='UPDATE' /><input type='button' value= 'CANCel' onclick='history.back()'>
										</form>
										<label>Article</label>
										
											<table id='table1'>
												<tr><th style='text-align:center; width:10px;'>No</th>
													<th style='text-align:center;'>Judul Article</th>
													<th style='text-align:center;'>Remove</th>
												</tr>";
												$article = mysql_query("select * from article WHERE menu_stats='sd3' AND id_sidemenu='$x[id_sidemenu]' ");
												$no = 1;
												while($y = mysql_fetch_array($article))
												{
													echo "
														<tr class='record_delete'>
														<td align='center' style='width:20px;'>$no</td>
														<td style='padding-left:10px;'>".(implode(" ", array_slice(explode(" ", $y['title']), 0, 3))); echo"..</td>
														<td>
															<a href='#' id=$y[id_article] class='delbutton'>
																<img src='images/remove.png' />
															</a>
														</td>
														</tr>";						
													$no++;
												}
											echo"</table>
										 </div>
										  <div class='tab_article' >
						<form  method='post'  action='modul/mod_sidemenu/aksi_tree_menu.php?page=side_menu&act=update_sd3'>
											<input type='hidden' name='id_sidemenu' id='id_sidemenu' value='$x[id_sidemenu]'>
											<label> Pilih Article</label>
											
											<table id='table1'>
												<tr ><th style='text-align:center;'>No</th>
													<th style='text-align:center;'>Judul_Article</th>
													<th style='text-align:center;'>Pilih</th>
												</tr>";?>
												
												
												<?php
												$article = mysql_query("select * from article WHERE sidemenu_stats ='' and status = 'Y' ");
												$no = 1;
												while($x = mysql_fetch_array($article))
												{
													echo "
														<tr><td align='center'>$no</td>
														<td>$x[title]</td>
														<td align='center'>
															<input type='checkbox'  value='$x[id_article]' name='id_article[]' $key /> 
														</td>
														</tr>";						
													$no++;
													echo "";
												}
											echo"</table>
											<input type='submit' name='ok' value='Add'>
											</form>
										 </div>
										</div>";
		break;
		
		case "edit_sidemenu_sd4":
						$id_sidemenu = $_GET['id'];
						$sql = mysql_query("select * from sidemenu where id_sidemenu = '$id_sidemenu' ");
						$x = mysql_fetch_array($sql);
					echo"<div class='tabGroupmenu'>
											<input type='radio' name='tabGroup1' id='tab_edit' class='tab_edit' checked='checked'/>
											<label for='tab_edit'>Edit Menu</label>
											<input type='radio' name='tabGroup1' id='tab_article' class='tab_article'/>
											<label for='tab_article'>Pilih Article</label>
									<div  class='tab_edit' >
									<form method='post' style='padding:45px 10px' action='$aksi?page=side_menu&act=update_sidemenu'   name='form_page' id='form_page' >
										<a href='$aksi?page=side_menu&gen=delete_sd4&id=$id_sidemenu' class='tip2' ";?>onClick="return confirm('Anda yakin akan menghapus data ini?');"><?php echo"<img src='images/delete.png' style='width:14px; height:14px;'><span>Delete this Menu</span></a>
										<input type='hidden' name='id_sidemenu' id='id_sidemenu' value='$x[id_sidemenu]'>
										<label2>Edit Menu $x[sidemenu_name]</label2><br><br>
										<label>Name (indonesian):</label>
										<input type='text' id='sidemenu_name' name='sidemenu_name' value='$x[sidemenu_name]' class='easyui-validatebox' required='true'/>
										<label>Name (English):</label>
										<input type='text' id='sidemenu_name_english' name='sidemenu_name_english' value='$x[sidemenu_name_english]' class='easyui-validatebox' required='true'/>
										<label>Urutan</label>
										<input type='text' name='urutan' value='$x[list_number]' id='urutan' style='width:40px;' /><br>
										<input type='submit'   value='UPDATE' /><input type='button' value= 'CANCel' onclick='history.back()'>
										</form>
										<label>Article</label>
										
											<table id='table1'>
												<tr><th style='text-align:center; width:10px;'>No</th>
													<th style='text-align:center;'>Judul Article</th>
													<th style='text-align:center;'>Remove</th>
												</tr>";
												$article = mysql_query("select * from article WHERE sidemenu_stats='sd4' AND id_sidemenu='$x[id_sidemenu]' ");
												$no = 1;
												while($y = mysql_fetch_array($article))
												{
													echo "
														<tr class='record_delete'>
														<td align='center' style='width:20px;'>$no</td>
														<td style='padding-left:10px;'>".(implode(" ", array_slice(explode(" ", $y['title']), 0, 3))); echo"..</td>
														<td>
															<a href='#' id=$y[id_article] class='delbutton'>
																<img src='images/remove.png' />
															</a>
														</td>
														</tr>";						
													$no++;
												}
											echo"</table>
										 </div>
										  <div class='tab_article' >
						<form  method='post' id='select_album_video' action='modul/mod_sidemenu/aksi_side_menu.php?page=side_menu&act=update_sd4'>
											<input type='hidden' name='id_sidemenu' id='id_sidemenu' value='$x[id_sidemenu]'>
											<label> Pilih Article</label>
											
											<table id='table1'>
												<tr ><th style='text-align:center;'>No</th>
													<th style='text-align:center;'>Judul_Article</th>
													<th style='text-align:center;'>Pilih</th>
												</tr>";?>
												
												
												<?php
												$article = mysql_query("select * from article WHERE sidemenu_stats ='' and status = 'Y' ");
												$no = 1;
												while($x = mysql_fetch_array($article))
												{
													echo "
														<tr><td align='center'>$no</td>
														<td>$x[title]</td>
														<td align='center'>
															<input type='checkbox'  value='$x[id_article]' name='id_article[]' $key /> 
														</td>
														</tr>";						
													$no++;
													echo "";
												}
											echo"</table>
											<input type='submit' name='ok' value='Add'>
											</form>
										 </div>
										</div>";
		break;
		
		case "edit_menu_sm5":
									$id_sidemenu = $_GET['id'];
						$sql = mysql_query("select * from side_menu where id_menu = '$id_sidemenu' ");
						$x = mysql_fetch_array($sql);
					echo"<div class='tabGroupmenu'>
											<input type='radio' name='tabGroup1' id='tab_edit' class='tab_edit' checked='checked'/>
											<label for='tab_edit'>Edit Side Menu</label>
											<input type='radio' name='tabGroup1' id='tab_article' class='tab_article'/>
											<label for='tab_article'>Pilih Article</label>
									<div  class='tab_edit' >
									<form method='post' style='padding:45px 10px' action='$aksi?page=side_menu&act=update_menu'   name='form_page' id='form_page' >
										<a href='$aksi?page=side_menu&gen=delete_sd5&id=$id_sidemenu' class='tip2' ";?>onClick="return confirm('Anda yakin akan menghapus data ini?');"><?php echo"<img src='images/delete.png' style='width:14px; height:14px;'><span>Delete this Menu</span></a>
										<input type='hidden' name='id_sidemenu' id='id_sidemenu' value='$x[id_sidemenu]'>
										<label2>Edit Side Menu $x[sidemenu_name]</label2><br><br>
										<label>Name (indonesian):</label>
										<input type='text' id='menu_name' name='sidemenu_name' value='$x[sidemenu_name]' class='easyui-validatebox' required='true'/>
										<label>Name (English):</label>
										<input type='text' id='sidemenu_name_english' name='sidemenu_name_english' value='$x[sidemenu_name_english]' class='easyui-validatebox' required='true'/>
										<label>Urutan</label>
										<input type='text' name='urutan' value='$x[list_number]' id='urutan' style='width:40px;' /><br>
										<input type='submit'   value='UPDATE' /><input type='button' value= 'CANCel' onclick='history.back()'>
										</form>
										<label>Article</label>
										
											<table id='table1'>
												<tr><th style='text-align:center; width:10px;'>No</th>
													<th style='text-align:center;'>Judul Article</th>
													<th style='text-align:center;'>Remove</th>
												</tr>";
												$article = mysql_query("select * from article WHERE menu_stats='sd5' AND id_sidemenu='$x[id_sidemenu]' ");
												$no = 1;
												while($y = mysql_fetch_array($article))
												{
													echo "
														<tr class='record_delete'>
														<td align='center' style='width:20px;'>$no</td>
														<td style='padding-left:10px;'>".(implode(" ", array_slice(explode(" ", $y['title']), 0, 3))); echo"..</td>
														<td align='center' >
															<a href='#' id=$y[id_article] class='delbutton'>
																<img src='images/remove.png' />
															</a>
														</td>
														</tr>";						
													$no++;
												}
											echo"</table>
										 </div>
										  <div class='tab_article' >
						<form  method='post' id='select_album_video' action='modul/mod_sidemenu/aksi_side_menu.php?page=side_menu&act=update_sd5'>
											<input type='hidden' name='id_sidemenu' id='id_sidemenu' value='$x[id_sidemenu]'>
											<label> Pilih Article</label>
											
											<table id='table1'>
												<tr ><th style='text-align:center;'>No</th>
													<th style='text-align:center;'>Judul_Article</th>
													<th style='text-align:center;'>Pilih</th>
												</tr>";?>
												
												
												<?php
												$article = mysql_query("select * from article WHERE sidemenu_stats ='' and status = 'Y' ");
												$no = 1;
												while($x = mysql_fetch_array($article))
												{
													echo "
														<tr><td align='center'>$no</td>
														<td>$x[title]</td>
														<td align='center'>
															<input type='checkbox'  value='$x[id_article]' name='id_article[]' $key   /> 
														</td>
														</tr>";						
													$no++;
													echo "";
												}
											echo"</table>
											<input type='submit' name='ok' value='Add'>
											</form>
										 </div>
										</div>";
		break;
		
		
		
		
		}

?>

</div>