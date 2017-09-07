		<script src="modul/mod_treemenu/js/jquery-1.9.1.js"></script>
	<script src="modul/mod_treemenu/js/jquery.cookie.js" type="text/javascript"></script>
	<script src="modul/mod_treemenu/js/jquery.treeview.js" type="text/javascript"></script>
	<link rel="stylesheet" href="modul/mod_treemenu/css/jquery.treeview.css"  type="text/css"/> 
	<link rel="stylesheet" href="modul/mod_treemenu/css/tab.css"  type="text/css"/> 
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
				url: "modul/mod_treemenu/act/delete.php",
				data: info,
				success: function() {
									$(this).parents(".record_delete").animate({ backgroundColor: "#fbc7c7" }, "fast")
			.animate({ opacity: "hide" }, "slow");
			location.reload();
								}
			});
			
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
function sm1(intValue){			
		// alert('tae')
	$('#id_loginmodal').val(intValue);
	var id = +intValue;
	$.ajax({
        type: "GET",
        url: "modul/mod_treemenu/act/pop_form_sm1.php",
        data:"id="+id,
        success: function() {
            alert("Request Berhasil Dikirim");
        }
    });
    return true;
}

//SM2
function sm2(intValue){			
	$('#id_loginmodal2').val(intValue);
	var id = +intValue;
	$.ajax({
        type: "GET",
        url: "modul/mod_treemenu/act/pop_form_sm2.php",
        data:"id="+id,
        success: function() {
            alert("Request Berhasil Dikirim");
        }
    });
    return true;
}

//SM3
function sm3(intValue){			
	$('#id_loginmodal3').val(intValue);
	var id = +intValue;
	$.ajax({
        type: "GET",
        url: "modul/mod_treemenu/act/pop_form_sm3.php",
        data:"id="+id,
        success: function() {
            alert("Request Berhasil Dikirim");
        }
    });
    return true;
}

//SM3a
function sm3a(intValue){			
	$('#id_loginmodal3a').val(intValue);
	var id = +intValue;
	$.ajax({
        type: "GET",
        url: "modul/mod_treemenu/act/pop_form_sm3a.php",
        data:"id="+id,
        success: function() {
            alert("Request Berhasil Dikirim");
        }
    });
    return true;
}

//SM4
function sm4(intValue){			
	$('#id_loginmodal4').val(intValue);
	var id = +intValue;
	$.ajax({
        type: "GET",
        url: "modul/mod_treemenu/act/pop_form_sm4.php",
        data:"id="+id,
        success: function() {
            alert("Request Berhasil Dikirim");
        }
    });
    return true;
}
</script>	

<?php
include "modul/mod_treemenu/menu_3/menu_pop_form.php";
include "../config/connect.php";
	// mysql_connect("localhost","root","") or die 	("Gagal;");
	// mysql_select_db("cms") or die ("Database Salah");
?>
<h2>Tree Menu </h2>
<div class='tab_content'>
								<input type='radio' name='holder' id='tab_child_content' class='tab_child_content' checked='checked'/>
								<label for='tab_child_content' id='tab_child_content'>Tree Menu</label>
								<div  class='tab_child_content' >		

<div id="css_menu_tree">
<ul id="navigation">
	<?php
		$menu=mysql_query("SELECT * FROM menu WHERE menu_stats='mm' ORDER BY list_number");
		while($r1=mysql_fetch_array($menu)){
			echo "<li  ><a href='?page=tree_menu&act=edit_menu&id=$r1[id_menu]'>$r1[menu_name]</a>";
			
			//sub1
			$menu2=mysql_query("SELECT * FROM menu 
								WHERE menu_stats='sm1' AND id_parent=$r1[id_menu] ORDER BY list_number");
			$cnt1=mysql_num_rows($menu2);
			if($cnt1 > 0){
				echo"<ul>";
				while ($r2=mysql_fetch_array($menu2)){
					echo"<li ><a href='?page=tree_menu&act=edit_menu_sm1&id=$r2[id_menu]' >$r2[menu_name]</a>";
					
					//sub2
					$menu3=mysql_query("SELECT * FROM menu 
								WHERE menu_stats='sm2' AND id_parent=$r2[id_menu] ORDER BY list_number");
					$cnt2=mysql_num_rows($menu3);
					if($cnt2 > 0){
						echo"<ul>";
						while ($r3=mysql_fetch_array($menu3)){
							echo"<li ><a href='?page=tree_menu&act=edit_menu_sm2&id=$r3[id_menu]'>$r3[menu_name]</a>";
							
							
								//sub3
							$menu3a=mysql_query("SELECT * FROM menu 
								WHERE menu_stats='sm3' AND id_parent=$r3[id_menu] ORDER BY list_number");
							$cnt3=mysql_num_rows($menu3a);
							if($cnt3 > 0){
								echo"<ul>";
								while ($r3a=mysql_fetch_array($menu3a)){
									echo"<li ><a href='?page=tree_menu&act=edit_menu_sm3&id=$r3a[id_menu]'>$r3a[menu_name]</a>";
									
									
									//sub4
									$menu4=mysql_query("SELECT * FROM menu 
										WHERE menu_stats='sm3a' AND id_parent=$r3a[id_menu] ORDER BY list_number");
									$cnt4=mysql_num_rows($menu4);
									if($cnt4 > 0){
										echo"<ul>";
										while ($r4=mysql_fetch_array($menu4)){
											echo"<li ><a href='?page=tree_menu&act=edit_menu_sm4&id=$r4[id_menu]' >$r4[menu_name]</a>";	
							
											//sub5
											$menu5=mysql_query("SELECT * FROM menu 
												WHERE menu_stats='sm4' AND id_parent=$r4[id_menu] ORDER BY list_number");
											$cnt5=mysql_num_rows($menu5);
											if($cnt5 > 0){
												echo"<ul>";
												while ($r5=mysql_fetch_array($menu5)){
													echo"<li ><a href='?page=tree_menu&act=edit_menu_sm5&id=$r5[id_menu]' >$r5[menu_name]</a></li>";	
																				
												}
												$sbm4= $r4[id_menu];
												echo"<li><a href='#login-box4' onclick='sm4($sbm4)' class='login-window' id='tip3'>
												<img src='images/add5.png'/>
												<span> Click for Add Submenu from this Parent</span>
												</a></li>";
												//end sub5
												echo "</ul>
											</li>";
											}
											else{
												$sbm4= $r4[id_menu];
												echo"<ul><li><a href='#login-box4' onclick='sm4($sbm4)' class='login-window' id='tip3'>
												<img src='images/add5.png'/>
												<span> Click for Add Submenu from this Parent</span>
												</a></li></ul></li>";
											}
											
										}
										$sbm3a= $r3a[id_menu];
										echo"<li><a href='#login-box3a' onclick='sm3a($sbm3a)' class='login-window' id='tip3'>
										<img src='images/add4.png'/>
										<span> Click for Add Submenu from this Parent</span>
										</a></li>";
										//end sub4
										echo "</ul>
										</li>";
									}
									else{
										$sbm3a= $r3a[id_menu];
										echo"<ul><li><a href='#login-box3a' onclick='sm3a($sbm3a)' class='login-window' id='tip3'>
										<img src='images/add4.png'/>
										<span> Click for Add Submenu from this Parent</span>
										</a></li></ul></li>";
									}

								}
								$sbm3= $r3[id_menu];
								echo"<li><a href='#login-box3' onclick='sm3($sbm3)' class='login-window' id='tip3'>
								<img src='images/add3.png'/>
								<span> Click for Add Submenu from this Parent</span>
								</a></li>";
								//end sub3
								echo "</ul>
								</li>";
							}
							else{
								$sbm3= $r3[id_menu];
								echo"<ul><li><a href='#login-box3' onclick='sm3($sbm3)' class='login-window' id='tip3'>
								<img src='images/add3.png'/>
								<span> Click for Add Submenu from this Parent</span>
								</a></li></ul></li>";
							}
					
						}
					$sbm2= $r2[id_menu];
					echo"<li><a href='#login-box2' onclick='sm2($sbm2)' class='login-window' id='tip3'>
					<img src='images/add2.png'/>
					<span> Click for Add Submenu from this Parent</span>
					</a></li>";
					//end sub2
					echo "</ul>
					</li>";
					}
					else{
						$sbm2= $r2[id_menu];
						echo"<ul><li><a href='#login-box2' onclick='sm2($sbm2)' class='login-window' id='tip3'>
						<img src='images/add2.png'/>
						<span> Click for Add Submenu from this Parent</span>
						</a></li></ul></li>";
					}
	
				}
				$sbm1= $r1[id_menu];
				echo"<li><a href='#login-box1' onclick='sm1($sbm1)' class='login-window' id='tip3'>
				<img src='images/add1.png'/>
				<span> Click for Add Submenu from this Parent</span>
				</a></li>";
				//End sub1
				echo "</ul>
				</li>";
				
			}
			else{
				$sbm1= $r1[id_menu];
				echo"<ul><li><a href='#login-box1' onclick='sm1($sbm1)' class='login-window' id='tip3'>
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
				include "modul/mod_treemenu/menu_3/pop_form_sm1.php";
				include "modul/mod_treemenu/menu_3/pop_form_sm2.php";
				include "modul/mod_treemenu/menu_3/pop_form_sm3.php";
				include "modul/mod_treemenu/menu_3/pop_form_sm3a.php";
				include "modul/mod_treemenu/menu_3/pop_form_sm4.php";
			?>
</ul>
</div>
<?php 

$aksi="modul/mod_treemenu/aksi_tree_menu.php";
switch($_GET[act]){	

		default:
			
		break;
		// EDIT MENU TERATAS (NO-PARENT)
		case "edit_menu":
					$id_menu = $_GET['id'];
						$sql = mysql_query("select * from menu where id_menu = '$id_menu' ");
						$x = mysql_fetch_array($sql);
					echo"<div class='tabGroupmenu'>
											<input type='radio' name='tabGroup1' id='tab_edit' class='tab_edit' checked='checked'/>
											
											<label for='tab_edit'>Edit Menu</label>
											<input type='radio' name='tabGroup1' id='tab_article' class='tab_article'/>
											<label for='tab_article'>Pilih Article</label>
									<div  class='tab_edit' >
									<form method='post' style='padding:45px 10px;' action='$aksi?page=tree_menu&act=update_menu'   name='form_page' id='form_page' >
									<a href='$aksi?page=tree_menu&gen=delete_main_menu&id=$id_menu' class='tip2' ";?>onClick="return confirm('Anda yakin akan menghapus data ini?');"><?php echo"<img src='images/delete.png' style='width:14px; height:14px;'><span>Delete this Menu</span></a>
									<input type='hidden' name='id_menu' id='id_menu' value='$x[id_menu]'>
										<label2>Edit Menu $x[menu_name]</label2><br><br>
										<label>Name (indonesian):</label>
										<input type='text' id='menu_name' name='menu_name' value='$x[menu_name]' class='easyui-validatebox' required='true'/>
										<label>Name (English):</label>
										<input type='text' id='menu_name_english' name='menu_name_english' value='$x[menu_name_english]' class='easyui-validatebox' required='true'/>
										
										<label>Icon</label><small> *kosongkan bila tidak perlu</small>
											<select name='icon'>
												<option value='$x[icon]'> $x[icon] </option>
												<option value='home'>home</option>
												<option value='bars'>bars</option>
												<option value='user'>user</option>
												<option value='university'>university</option>
												<option value='institution'>institution</option>
												<option value='envelope'>envelope</option>
												<option value='photo'>photo</option>
												<option value='suitcase'>suitcase</option>
												<option value='tags'>tags</option>
												<option value='lightbulb'>lightbulb</option>
												<option value='gears'>gears</option>
												<option value='gift'>gift</option>
												<option value='glass'>glass</option>
												<option value='plane'>plane</option>
												<option value='star'>star</option>
											</select>
										<label>Urutan</label>
										<input type='text' name='urutan' value='$x[list_number]' id='urutan' style='width:40px;' />
										<input type='submit'   value='UPDATE' /><input type='button' value= 'CANCel' onclick='history.back()'>
										</form>
										<label>Article</label>
										
											<table id='table1'>
												<tr><th style='text-align:center; width:10px;'>No</th>
													<th style='text-align:center;'>Judul Article</th>
													<th style='text-align:center;'>Remove</th>
												</tr>";
												$article = mysql_query("select * from article WHERE menu_stats='main_menu' AND id_menu='$x[id_menu]' ");
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
										  <form  method='post' id='select_album_video' action='modul/mod_treemenu/aksi_tree_menu.php?page=tree_menu&act=update_main_menu'>
											<input type='hidden' name='id_menu' id='id_menu' value='$x[id_menu]'>
											<label> Pilih Article</label>
											
											<table id='table1'>
												<tr ><th style='text-align:center;'>No</th>
													<th style='text-align:center;'>Judul_Article</th>
													<th style='text-align:center;'>Pilih</th>
												</tr>";?>
												
												
												<?php
												$article = mysql_query("select * from article WHERE menu_stats ='' and status = 'Y' ");
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
		case "edit_menu_sm1":
					$id_menu = $_GET['id'];
						$sql = mysql_query("select * from menu where id_menu = '$id_menu' ");
						$x = mysql_fetch_array($sql);
					echo"<div class='tabGroupmenu'>
											<input type='radio' name='tabGroup1' id='tab_edit' class='tab_edit' checked='checked'/>
											<label for='tab_edit'>Edit Menu</label>
											<input type='radio' name='tabGroup1' id='tab_article' class='tab_article'/>
											<label for='tab_article'>Pilih Article</label>
									<div  class='tab_edit' >
									<form method='post' style='padding:45px 10px' action='$aksi?page=tree_menu&act=update_menu'   name='form_page' id='form_page' >
										<a href='$aksi?page=tree_menu&gen=delete_sm1&id=$id_menu' class='tip2' ";?>onClick="return confirm('Anda yakin akan menghapus data ini?');"><?php echo"<img src='images/delete.png' style='width:14px; height:14px;'><span>Delete this Menu</span></a>
										<input type='hidden' name='id_menu' id='id_menu' value='$x[id_menu]'>
										<label2>Edit Menu $x[menu_name]</label2><br><br>
										<label>Name (indonesian):</label>
										<input type='text' id='menu_name' name='menu_name' value='$x[menu_name]' class='easyui-validatebox' required='true'/>
										<label>Name (English):</label>
										<input type='text' id='menu_name_english' name='menu_name_english' value='$x[menu_name_english]' class='easyui-validatebox' required='true'/>
										<label>Icon</label><small> *kosongkan bila tidak perlu</small>
											<select name='icon'>
												<option value='$x[icon]'> $x[icon] </option>
												<option value='home'>home</option>
												<option value='bars'>bars</option>
												<option value='user'>user</option>
												<option value='university'>university</option>
												<option value='institution'>institution</option>
												<option value='envelope'>envelope</option>
												<option value='photo'>photo</option>
												<option value='suitcase'>suitcase</option>
												<option value='tags'>tags</option>
												<option value='lightbulb'>lightbulb</option>
												<option value='gears'>gears</option>
												<option value='gift'>gift</option>
												<option value='glass'>glass</option>
												<option value='plane'>plane</option>
												<option value='star'>star</option>
											</select>
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
												$article = mysql_query("select * from article WHERE menu_stats='sm1' AND id_menu='$x[id_menu]' ");
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
										  <form  method='post' id='select_album_video' action='modul/mod_treemenu/aksi_tree_menu.php?page=tree_menu&act=update_sm1'>
											<input type='hidden' name='id_menu' id='id_menu' value='$x[id_menu]'>
											<label> Pilih Article</label>
											
											<table id='table1'>
												<tr ><th style='text-align:center;'>No</th>
													<th style='text-align:center;'>Judul_Article</th>
													<th style='text-align:center;'>Pilih</th>
												</tr>";?>
												
												
												<?php
												$article = mysql_query("select * from article WHERE menu_stats ='' and status = 'Y' ");
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
		
		
		case "edit_menu_sm2":
					// echo $_GET['id'];
						$id_menu = $_GET['id'];
						$sql = mysql_query("select * from menu where id_menu = '$id_menu' ");
						$x = mysql_fetch_array($sql);
					echo"<div class='tabGroupmenu'>
											<input type='radio' name='tabGroup1' id='tab_edit' class='tab_edit' checked='checked'/>
											<label for='tab_edit'>Edit Menu</label>
											<input type='radio' name='tabGroup1' id='tab_article' class='tab_article'/>
											<label for='tab_article'>Pilih Article</label>
									<div  class='tab_edit' >
									<form method='post' style='padding:45px 10px' action='$aksi?page=tree_menu&act=update_menu'   name='form_page' id='form_page' >
										<a href='$aksi?page=tree_menu&gen=delete_sm2&id=$id_menu' class='tip2' ";?>onClick="return confirm('Anda yakin akan menghapus data ini?');"><?php echo"<img src='images/delete.png' style='width:14px; height:14px;'><span>Delete this Menu</span></a>
										<input type='hidden' name='id_menu' id='id_menu' value='$x[id_menu]'>
										<label2>Edit Menu $x[menu_name]</label2><br><br>
										<label>Name (indonesian):</label>
										<input type='text' id='menu_name' name='menu_name' value='$x[menu_name]' class='easyui-validatebox' required='true'/>
										<label>Name (English):</label>
										<input type='text' id='menu_name_english' name='menu_name_english' value='$x[menu_name_english]' class='easyui-validatebox' required='true'/>
										<label>Icon</label><small> *kosongkan bila tidak perlu</small>
											<select name='icon'>
												<option value='$x[icon]'> $x[icon] </option>
												<option value='home'>home</option>
												<option value='bars'>bars</option>
												<option value='user'>user</option>
												<option value='university'>university</option>
												<option value='institution'>institution</option>
												<option value='envelope'>envelope</option>
												<option value='photo'>photo</option>
												<option value='suitcase'>suitcase</option>
												<option value='tags'>tags</option>
												<option value='lightbulb'>lightbulb</option>
												<option value='gears'>gears</option>
												<option value='gift'>gift</option>
												<option value='glass'>glass</option>
												<option value='plane'>plane</option>
												<option value='star'>star</option>
											</select>
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
												$article = mysql_query("select * from article WHERE menu_stats='sm2' AND id_menu='$x[id_menu]' ");
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
						<form  method='post' id='select_album_video' action='modul/mod_treemenu/aksi_tree_menu.php?page=tree_menu&act=update_sm2'>
											<input type='hidden' name='id_menu' id='id_menu' value='$x[id_menu]'>
											<label> Pilih Article</label>
											<table id='table1'>
												<tr ><th style='text-align:center;'>No</th>
													<th style='text-align:center;'>Judul_Article</th>
													<th style='text-align:center;'>Pilih</th>
												</tr>";?>
												
												
												<?php
												$article = mysql_query("select * from article WHERE menu_stats ='' and status = 'Y'");
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
		
		case "edit_menu_sm3":
						$id_menu = $_GET['id'];
						$sql = mysql_query("select * from menu where id_menu = '$id_menu' ");
						$x = mysql_fetch_array($sql);
					echo"<div class='tabGroupmenu'>
											<input type='radio' name='tabGroup1' id='tab_edit' class='tab_edit' checked='checked'/>
											<label for='tab_edit'>Edit Menu</label>
											<input type='radio' name='tabGroup1' id='tab_article' class='tab_article'/>
											<label for='tab_article'>Pilih Article</label>
									<div  class='tab_edit' >
									<form method='post' style='padding:45px 10px' action='$aksi?page=tree_menu&act=update_menu'   name='form_page' id='form_page' >
										<a href='$aksi?page=tree_menu&gen=delete_sm3&id=$id_menu' class='tip2' ";?>onClick="return confirm('Anda yakin akan menghapus data ini?');"><?php echo"<img src='images/delete.png' style='width:14px; height:14px;'><span>Delete this Menu</span></a>
										<input type='hidden' name='id_menu' id='id_menu' value='$x[id_menu]'>
										<label2>Edit Menu $x[menu_name]</label2><br><br>
										<label>Name (indonesian):</label>
										<input type='text' id='menu_name' name='menu_name' value='$x[menu_name]' class='easyui-validatebox' required='true'/>
										<label>Name (English):</label>
										<input type='text' id='menu_name_english' name='menu_name_english' value='$x[menu_name_english]' class='easyui-validatebox' required='true'/>
										<label>Icon</label><small> *kosongkan bila tidak perlu</small>
											<select name='icon'>
												<option value='$x[icon]'> $x[icon] </option>
												<option value='home'>home</option>
												<option value='bars'>bars</option>
												<option value='user'>user</option>
												<option value='university'>university</option>
												<option value='institution'>institution</option>
												<option value='envelope'>envelope</option>
												<option value='photo'>photo</option>
												<option value='suitcase'>suitcase</option>
												<option value='tags'>tags</option>
												<option value='lightbulb'>lightbulb</option>
												<option value='gears'>gears</option>
												<option value='gift'>gift</option>
												<option value='glass'>glass</option>
												<option value='plane'>plane</option>
												<option value='star'>star</option>
											</select>
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
												$article = mysql_query("select * from article WHERE menu_stats='sm3' AND id_menu='$x[id_menu]' ");
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
						<form  method='post' id='select_album_video' action='modul/mod_treemenu/aksi_tree_menu.php?page=tree_menu&act=update_sm3'>
											<input type='hidden' name='id_menu' id='id_menu' value='$x[id_menu]'>
											<label> Pilih Article</label>
											
											<table id='table1'>
												<tr ><th style='text-align:center;'>No</th>
													<th style='text-align:center;'>Judul_Article</th>
													<th style='text-align:center;'>Pilih</th>
												</tr>";?>
												
												
												<?php
												$article = mysql_query("select * from article WHERE menu_stats ='' and status = 'Y' ");
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
		
		case "edit_menu_sm4":
									$id_menu = $_GET['id'];
						$sql = mysql_query("select * from menu where id_menu = '$id_menu' ");
						$x = mysql_fetch_array($sql);
					echo"<div class='tabGroupmenu'>
											<input type='radio' name='tabGroup1' id='tab_edit' class='tab_edit' checked='checked'/>
											<label for='tab_edit'>Edit Menu</label>
											<input type='radio' name='tabGroup1' id='tab_article' class='tab_article'/>
											<label for='tab_article'>Pilih Article</label>
									<div  class='tab_edit' >
									<form method='post' style='padding:45px 10px' action='$aksi?page=tree_menu&act=update_menu'   name='form_page' id='form_page' >
										<a href='$aksi?page=tree_menu&gen=delete_sm4&id=$id_menu' class='tip2' ";?>onClick="return confirm('Anda yakin akan menghapus data ini?');"><?php echo"<img src='images/delete.png' style='width:14px; height:14px;'><span>Delete this Menu</span></a>
										<input type='hidden' name='id_menu' id='id_menu' value='$x[id_menu]'>
										<label2>Edit Menu $x[menu_name]</label2><br><br>
										<label>Name (indonesian):</label>
										<input type='text' id='menu_name' name='menu_name' value='$x[menu_name]' class='easyui-validatebox' required='true'/>
										<label>Name (English):</label>
										<input type='text' id='menu_name_english' name='menu_name_english' value='$x[menu_name_english]' class='easyui-validatebox' required='true'/>
										<label>Icon</label><small> *kosongkan bila tidak perlu</small>
											<select name='icon'>
												<option value='$x[icon]'> $x[icon] </option>
												<option value='home'>home</option>
												<option value='bars'>bars</option>
												<option value='user'>user</option>
												<option value='university'>university</option>
												<option value='institution'>institution</option>
												<option value='envelope'>envelope</option>
												<option value='photo'>photo</option>
												<option value='suitcase'>suitcase</option>
												<option value='tags'>tags</option>
												<option value='lightbulb'>lightbulb</option>
												<option value='gears'>gears</option>
												<option value='gift'>gift</option>
												<option value='glass'>glass</option>
												<option value='plane'>plane</option>
												<option value='star'>star</option>
											</select>
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
												$article = mysql_query("select * from article WHERE menu_stats='sm4' AND id_menu='$x[id_menu]' ");
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
						<form  method='post' id='select_album_video' action='modul/mod_treemenu/aksi_tree_menu.php?page=tree_menu&act=update_sm4'>
											<input type='hidden' name='id_menu' id='id_menu' value='$x[id_menu]'>
											<label> Pilih Article</label>
											
											<table id='table1'>
												<tr ><th style='text-align:center;'>No</th>
													<th style='text-align:center;'>Judul_Article</th>
													<th style='text-align:center;'>Pilih</th>
												</tr>";?>
												
												
												<?php
												$article = mysql_query("select * from article WHERE menu_stats ='' and status = 'Y' ");
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
									$id_menu = $_GET['id'];
						$sql = mysql_query("select * from menu where id_menu = '$id_menu' ");
						$x = mysql_fetch_array($sql);
					echo"<div class='tabGroupmenu'>
											<input type='radio' name='tabGroup1' id='tab_edit' class='tab_edit' checked='checked'/>
											<label for='tab_edit'>Edit Menu</label>
											<input type='radio' name='tabGroup1' id='tab_article' class='tab_article'/>
											<label for='tab_article'>Pilih Article</label>
									<div  class='tab_edit' >
									<form method='post' style='padding:45px 10px' action='$aksi?page=tree_menu&act=update_menu'   name='form_page' id='form_page' >
										<a href='$aksi?page=tree_menu&gen=delete_sm5&id=$id_menu' class='tip2' ";?>onClick="return confirm('Anda yakin akan menghapus data ini?');"><?php echo"<img src='images/delete.png' style='width:14px; height:14px;'><span>Delete this Menu</span></a>
										<input type='hidden' name='id_menu' id='id_menu' value='$x[id_menu]'>
										<label2>Edit Menu $x[menu_name]</label2><br><br>
										<label>Name (indonesian):</label>
										<input type='text' id='menu_name' name='menu_name' value='$x[menu_name]' class='easyui-validatebox' required='true'/>
										<label>Name (English):</label>
										<input type='text' id='menu_name_english' name='menu_name_english' value='$x[menu_name_english]' class='easyui-validatebox' required='true'/>
										<label>Icon</label><small> *kosongkan bila tidak perlu</small>
											<select name='icon'>
												<option value='$x[icon]'> $x[icon] </option>
												<option value='home'>home</option>
												<option value='bars'>bars</option>
												<option value='user'>user</option>
												<option value='university'>university</option>
												<option value='institution'>institution</option>
												<option value='envelope'>envelope</option>
												<option value='photo'>photo</option>
												<option value='suitcase'>suitcase</option>
												<option value='tags'>tags</option>
												<option value='lightbulb'>lightbulb</option>
												<option value='gears'>gears</option>
												<option value='gift'>gift</option>
												<option value='glass'>glass</option>
												<option value='plane'>plane</option>
												<option value='star'>star</option>
											</select>
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
												$article = mysql_query("select * from article WHERE menu_stats='sm5' AND id_menu='$x[id_menu]' ");
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
						<form  method='post' id='select_album_video' action='modul/mod_treemenu/aksi_tree_menu.php?page=tree_menu&act=update_sm5'>
											<input type='hidden' name='id_menu' id='id_menu' value='$x[id_menu]'>
											<label> Pilih Article</label>
											
											<table id='table1'>
												<tr ><th style='text-align:center;'>No</th>
													<th style='text-align:center;'>Judul_Article</th>
													<th style='text-align:center;'>Pilih</th>
												</tr>";?>
												
												
												<?php
												$article = mysql_query("select * from article WHERE menu_stats ='' and status = 'Y' ");
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