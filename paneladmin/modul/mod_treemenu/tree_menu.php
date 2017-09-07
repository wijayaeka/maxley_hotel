	<!--<script src="modul/mod_treemenu/js/jquery-1.9.1.js"></script> -->
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
		// alert (info);
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
include "../../config/connect.php";
?>
 <div class=''>

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
												<img src='img/icon/add5.png'/>
												</a></li>";
												//end sub5
												echo "</ul>
											</li>";
											}
											else{
												$sbm4= $r4[id_menu];
												echo"<ul><li><a href='#login-box4' onclick='sm4($sbm4)' title='Add Submenu' class='login-window tipb'  id='tip3'>
												<img src='img/icons/bb/ic_plus.png'/>
												</a></li></ul></li>";
											}
											
										}
										$sbm3a= $r3a[id_menu];
										echo"<li><a href='#login-box3a' onclick='sm3a($sbm3a)' title='Add Submenu' class='login-window tipb' id='tip3'>
										<img src='img/icons/bb/ic_plus.png'/>
										</a></li>";
										//end sub4
										echo "</ul>
										</li>";
									}
									else{
										$sbm3a= $r3a[id_menu];
										echo"<ul><li><a href='#login-box3a' onclick='sm3a($sbm3a)' title='Add Submenu' class='login-window tipb' id='tip3'>
										<img src='img/icons/bb/ic_plus.png'/>
										</a></li></ul></li>";
									}

								}
								$sbm3= $r3[id_menu];
								echo"<li><a href='#login-box3' onclick='sm3($sbm3)' title='Add Submenu' class='login-window tipb' id='tip3'>
								<img src='img/icons/bb/ic_plus.png'/>
								</a></li>";
								//end sub3
								echo "</ul>
								</li>";
							}
							else{
								$sbm3= $r3[id_menu];
								echo"<ul><li><a href='#login-box3' onclick='sm3($sbm3)' title='Add Submenu' class='login-window tipb' id='tip3'>
								<img src='img/icons/bb/ic_plus.png'/>
								</a></li></ul></li>";
							}
					
						}
					$sbm2= $r2[id_menu];
					echo"<li><a href='#login-box2' onclick='sm2($sbm2)' class='login-window tipb' id='tip3'  title='Add Submenu'>
					<img src='img/icons/bb/ic_plus.png'/>
					</a></li>";
					//end sub2
					echo "</ul>
					</li>";
					}
					else{
						$sbm2= $r2[id_menu];
						echo"<ul><li><a href='#login-box2' onclick='sm2($sbm2)' class='login-window tipb' id='tip3' title='Add Submenu'>
						<img src='img/icons/bb/ic_plus.png'/>
						</a></li></ul></li>";
					}
	
				}
				$sbm1= $r1[id_menu];
				echo"<li><a href='#login-box1' onclick='sm1($sbm1)' class='login-window tipb' id='tip3' title='Add Submenu'>
				<img src='img/icons/bb/ic_plus.png'/>
				</a></li>";
				//End sub1
				echo "</ul>
				</li>";
				
			}
			else{
				$sbm1= $r1[id_menu];
				echo"<ul><li><a href='#login-box1' onclick='sm1($sbm1)' class='login-window tipb' id='tip3' title='Add Submenu'>
				<img src='img/icons/bb/ic_plus.png'/>
				</a></li></ul></li>";
			}
		}
		echo "<div class='post'>
        	<div class='btn-sign'>
				<a href='#login-box'  class='login-window tipb'>
					<img src='img/icons/bb/ic_plus.png'/>
				</a>
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
				include"edit_form/edit_menu1.php";
		break;
		case "edit_menu_sm1":
				include"edit_form/edit_menu2.php";
		break;
		
		
		case "edit_menu_sm2":
				include"edit_form/edit_menu3.php";
		break;
		
		case "edit_menu_sm3":
				include"edit_form/edit_menu4.php";	
		break;
		
		case "edit_menu_sm4":
			include"edit_form/edit_menu5.php";	
		break;
		
		case "edit_menu_sm5":
				include"edit_form/edit_menu6.php";		
		break;
		}

?>

</div>