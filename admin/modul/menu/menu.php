<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$act="modules/menu/menu_act.php";
include "modul/menu/tree_menu.php";
switch($_GET[gen]){
  // Show Menu
  default:
  
	echo"<script src='modules/menu/js/jquery.treeview.js' type='text/javascript'></script>";
	echo"<link rel='stylesheet' href='modules/menu/css/jquery.treeview.css'  type='text/css'/>";
	
   if ($_SESSION[leveluser]=='admin'){
	$lists = mysql_query("SELECT * FROM menu WHERE menu_stats='mm' ORDER BY list_number");
	echo "<div id='cover_table'><div class='button_h2'>
		<h2>Menu</h2>
	</div>";
    
    echo "<table id='table_menu'> 
          <tr>
			<th>no</th>
			<th>Menu Name</th>
			<th>Edit</th>
		</tr>"; 
    $no=1;
    while ($r=mysql_fetch_array($lists)){
       echo "<tr>
				<td>$no</td>
				<td style='font-weight: bold; width: 300px'>$r[menu_name]</td>
				
				
				<td style='width: 10px; padding-left: 10px;'><a href=?modules=menu&gen=edit_menu&id=$r[id_menu] class='tip2'><img src='images/icon_edit/edit.png'/><span> Click for Edit</span></a>";?>
				<a href="<?php echo"$act?modules=menu&gen=delete&id=$r[id_menu]"?>" onClick="return confirm('Anda yakin akan menghapus data ini?');" class="tip2">
				<img src="images/icon_edit/delete.png"/><span> Delete this Item</span>
			</a>
				
			 <?php echo "</td></tr>";
			 $no++;
		}
    echo "</table></div>";
    break;
	}else{
		echo "You Dont Have Access This Page.";
	}
	
//=============== Form Edit Main Menu =================//
  case "edit_menu":	
  
	echo"<script src='modules/menu/js/jquery.treeview.js' type='text/javascript'></script>";
	echo"<link rel='stylesheet' href='modules/menu/css/jquery.treeview.css'  type='text/css'/>";
	echo "<link rel='stylesheet' href='modules/menu/css/inner_table_add_main_menu.css'>";
	echo "<link rel='stylesheet' href='modules/menu/css/tabbed_menu.css'>";
	include"modules/menu/tab_menu.php";
	
    $edit=mysql_query("SELECT * FROM menu WHERE id_menu='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	$heading=$r[menu_name];
	
	echo "<div id='cover_table'><div class='h_one'>
		<h1>Edit Menu $heading</h1>
	</div>
	
	<form method=POST action='$act?modules=menu&gen=update' id='contact-form' class='basic-grey'>
		<input type=hidden name=id value='$r[id_menu]'>
		
		<ul class='tabs'> 
			<li class='active' rel='tab1'> Edit Menu</li>
			<li rel='tab2'>Add Menu from Article</li>
		</ul>
		
		<div class='tab_container'> 
			<div id='tab1' class='tab_content'> 
				<label>
					<span>Main Menu Name :</span>
					<input id='menu_name' type='text' name='menu_name' value='$r[menu_name]'/>
					<input type='hidden' name='id_article' value='$r[id_article]'/>
					<a href='$act?modules=menu&gen=delete_main_menu&id=$r[id_menu]'";?>
					onClick="return confirm('Anda yakin akan menghapus data ini?');"
					class="tip4"><?php echo"<img src='images/icon_edit/delete.png'/><span>Delete this Menu</span></a>
				</label>	
				<label>
					<span>List Number :</span>
					<input id='list_number' type='text' name='list_number' style='width:40px' number='true' value='$r[list_number]' />
				</label>";
		
				//table list of article who have menu
				echo"<table cellspacing='0' class=''>
					<tr><th width=15>
						No
					</th>
					<th>
						Title
					</th>
					<th>
						Remove from Menu
					</th>
				</tr>";
		
				$t_art=mysql_query("SELECT * FROM article WHERE menu_stats='main_menu' AND id_menu='$r[id_menu]'");
				$no=1;
				while($r_tbl=mysql_fetch_array($t_art)){
					echo"<tr class='record'>
						<td>
							$no
						</td>
						<td>
							$r_tbl[title]
						</td>
						<td>
							<a href='#' id=$r_tbl[id_article] class='delbutton'>
								<img src='images/icon_edit/remove.png'/>
							</a>
						</td>
						";
						
						echo "</tr>";
					$no++;
				}
				echo"</table>
			</div>
	
			<div id='tab2' class='tab_content'> 
				<table cellspacing='0' class=''>
					<tr><th width=15>
						No
					</th>
					<th width=15>
						Select
					</th>
					<th>
						Title
					</th>
					</tr>";
		
					$t_art=mysql_query("SELECT * FROM article WHERE menu_stats =''");
					$no=1;
					while($r_tbl=mysql_fetch_array($t_art)){
						echo"<tr>
						<td>$no</td>
						<td>
							<input type='checkbox' value='$r_tbl[id_article]' name='id_article[]' $key/>
						</td>
						<td>
							$r_tbl[title]
						</td>
						</tr>";
						$no++;
					}
				echo"</table>
			</div>
		</div>		
		<div class='bttn'>
			<input type='submit' class='button_form_add' value='Save' /> 
			<input type='button' class='button_form_add' onClick='self.history.back()' value='Cancel' /> 
		</div>
	</form></div>";
    break;  
	
	
	
	
//=============== Form Edit SM1 =================//
  case "edit_menu_sm1":	
	echo"<script src='modules/menu/js/jquery.treeview.js' type='text/javascript'></script>";
	echo"<link rel='stylesheet' href='modules/menu/css/jquery.treeview.css'  type='text/css'/>";
	echo "<link rel='stylesheet' href='modules/menu/css/inner_table_add_main_menu.css'>";
	echo "<link rel='stylesheet' href='modules/menu/css/tabbed_menu.css'>";
	include"modules/menu/tab_menu.php";
	
    $edit=mysql_query("SELECT * FROM menu WHERE id_menu='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	$heading=$r[menu_name];
	
	echo "<div id='cover_table'><div class='h_one'>
		<h1>Edit Menu $heading</h1>
	</div>
	
	<form method=POST action='$act?modules=menu&gen=update_sm1' id='contact-form' class='basic-grey'>
		<input type=hidden name=id value='$r[id_menu]'>
		
		<ul class='tabs'> 
			<li class='active' rel='tab1'> Edit Menu</li>
			<li rel='tab2'>Add Menu from Article</li>
		</ul>
	
		<div class='tab_container'> 
			<div id='tab1' class='tab_content'> 
				<label>
					<span>Main Menu Name :</span>
					<input id='menu_name' type='text' name='menu_name' value='$r[menu_name]'/>
					<input type='hidden' name='id_article' value='$r[id_article]'/>
					<a href='$act?modules=menu&gen=delete_sm1&id=$r[id_menu]'";?>
					onClick="return confirm('Anda yakin akan menghapus data ini?');"
					class="tip4"><?php echo"<img src='images/icon_edit/delete.png'/><span>Delete this Menu</span></a>
				</label>	
				<label>
					<span>List Number :</span>
					<input id='list_number' type='text' name='list_number' style='width:40px' number='true' value='$r[list_number]' />
				</label>";
		
				//table list of article who have menu
				echo"<table cellspacing='0' class=''>
					<tr><th width=15>
						No
					</th>
					<th>
						Title
					</th>
					<th>
						Remove from Menu
					</th>
				</tr>";
		
				$t_art=mysql_query("SELECT * FROM article WHERE menu_stats='sm1' AND id_menu='$r[id_menu]'");
				$no=1;
				while($r_tbl=mysql_fetch_array($t_art)){
					echo"<tr class='record'>
						<td>
							$no
						</td>
						<td>
							$r_tbl[title]
						</td>
						<td>
							<a href='#' id=$r_tbl[id_article] class='delbutton'>
								<img src='images/icon_edit/remove.png'  />
							</a>
						</td>";						
						echo "</tr>";
					$no++;
				}
				echo"</table>
			</div>
	 
			<div id='tab2' class='tab_content'> 
				<table cellspacing='0' class=''>
					<tr><th width=15>
						No
					</th>
					<th width=15>
						Select
					</th>
					<th>
						Title
					</th>
					</tr>";
		
					$t_art=mysql_query("SELECT * FROM article WHERE menu_stats =''");
					$no=1;
					while($r_tbl=mysql_fetch_array($t_art)){
						echo"<tr>
						<td>$no</td>
						<td>
							<input type='checkbox' value='$r_tbl[id_article]' name='id_article[]' $key/>
						</td>
						<td>
							$r_tbl[title]
						</td>
						</tr>";
						$no++;
					}
				echo"</table>
			</div>
		</div>		
		<div class='bttn'>
			<input type='submit' class='button_form_add' value='Save' /> 
			<input type='button' class='button_form_add' onClick='self.history.back()' value='Cancel' /> 
		</div>
	</form></div>";
    break;  
	
	
	
//=============== Form Edit SM2 =================//
  case "edit_menu_sm2":	
	echo"<script src='modules/menu/js/jquery.treeview.js' type='text/javascript'></script>";
	echo"<link rel='stylesheet' href='modules/menu/css/jquery.treeview.css'  type='text/css'/>";
	echo "<link rel='stylesheet' href='modules/menu/css/inner_table_add_main_menu.css'>";
	echo "<link rel='stylesheet' href='modules/menu/css/tabbed_menu.css'>";
	include"modules/menu/tab_menu.php";
	
    $edit=mysql_query("SELECT * FROM menu WHERE id_menu='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	$heading=$r[menu_name];
	
	echo "<div id='cover_table'><div class='h_one'>
		<h1>Edit Menu $heading</h1>
	</div>
	
	<form method=POST action='$act?modules=menu&gen=update_sm2' id='contact-form' class='basic-grey'>
		<input type=hidden name=id value='$r[id_menu]'>
		
		<ul class='tabs'> 
			<li class='active' rel='tab1'> Edit Menu</li>
			<li rel='tab2'>Add Menu from Article</li>
		</ul>
	
		<div class='tab_container'> 
			<div id='tab1' class='tab_content'> 
				<label>
					<span>Main Menu Name :</span>
					<input id='menu_name' type='text' name='menu_name' value='$r[menu_name]'/>
					<input type='hidden' name='id_article' value='$r[id_article]'/>
					<a href='$act?modules=menu&gen=delete_sm2&id=$r[id_menu]' ";?>
					onClick="return confirm('Anda yakin akan menghapus data ini?');"
					class="tip4"><?php echo"<img src='images/icon_edit/delete.png'/><span>Delete this Menu</span></a>
				</label>	
				<label>
					<span>List Number :</span>
					<input id='list_number' type='text' name='list_number' style='width:40px' number='true' value='$r[list_number]' />
				</label>";
		
				//table list of article who have menu
				echo"<table cellspacing='0' class=''>
					<tr><th width=15>
						No
					</th>
					<th>
						Title
					</th>
					<th>
						Remove from Menu
					</th>
				</tr>";
		
				$t_art=mysql_query("SELECT * FROM article WHERE menu_stats='sm2' AND id_menu='$r[id_menu]'");
				$no=1;
				while($r_tbl=mysql_fetch_array($t_art)){
					echo"<tr class='record'>
						<td>
							$no
						</td>
						<td>
							$r_tbl[title]
						</td>
						<td>
							<a href='#' id=$r_tbl[id_article] class='delbutton'>
								<img src='images/icon_edit/remove.png'  />
							</a>
						</td>
						";
						
						echo "</tr>";
					$no++;
				}
				echo"</table>
			</div>
	 
			<div id='tab2' class='tab_content'> 
				<table cellspacing='0' class=''>
					<tr><th width=15>
						No
					</th>
					<th width=15>
						Select
					</th>
					<th>
						Title
					</th>
					</tr>";
		
					$t_art=mysql_query("SELECT * FROM article WHERE menu_stats =''");
					$no=1;
					while($r_tbl=mysql_fetch_array($t_art)){
						echo"<tr>
						<td>$no</td>
						<td>
							<input type='checkbox' value='$r_tbl[id_article]' name='id_article[]' $key/>
						</td>
						<td>
							$r_tbl[title]
						</td>
						</tr>";
						$no++;
					}
				echo"</table>
			</div>
		</div>		
		<div class='bttn'>
			<input type='submit' class='button_form_add' value='Save' /> 
			<input type='button' class='button_form_add' onClick='self.history.back()' value='Cancel' /> 
		</div>
	</form></div>";
    break;  
	
	
	
		
	
//=============== Form Edit SM3 =================//
  case "edit_menu_sm3":	
	echo"<script src='modules/menu/js/jquery.treeview.js' type='text/javascript'></script>";
	echo"<link rel='stylesheet' href='modules/menu/css/jquery.treeview.css'  type='text/css'/>";
	echo "<link rel='stylesheet' href='modules/menu/css/inner_table_add_main_menu.css'>";
	echo "<link rel='stylesheet' href='modules/menu/css/tabbed_menu.css'>";
	include"modules/menu/tab_menu.php";
	
    $edit=mysql_query("SELECT * FROM menu WHERE id_menu='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	$heading=$r[menu_name];
	
	echo "<div id='cover_table'><div class='h_one'>
		<h1>Edit Menu $heading</h1>
	</div>
	
	<form method=POST action='$act?modules=menu&gen=update_sm3' id='contact-form' class='basic-grey'>
		<input type=hidden name=id value='$r[id_menu]'>
		
		<ul class='tabs'> 
			<li class='active' rel='tab1'> Edit Menu</li>
			<li rel='tab2'>Add Menu from Article</li>
		</ul>
	
		<div class='tab_container'> 
			<div id='tab1' class='tab_content'> 
				<label>
					<span>Main Menu Name :</span>
					<input id='menu_name' type='text' name='menu_name' value='$r[menu_name]'/>
					<input type='hidden' name='id_article' value='$r[id_article]'/>
					<a href='$act?modules=menu&gen=delete_sm3&id=$r[id_menu]'";?>
					onClick="return confirm('Anda yakin akan menghapus data ini?');"
					class="tip4"><?php echo"<img src='images/icon_edit/delete.png'/><span>Delete this Menu</span></a>
				</label>	
				<label>
					<span>List Number :</span>
					<input id='list_number' type='text' name='list_number' style='width:40px' number='true' value='$r[list_number]' />
				</label>";
		
				//table list of article who have menu
				echo"<table cellspacing='0' class=''>
					<tr><th width=15>
						No
					</th>
					<th>
						Title
					</th>
					<th>
						Remove from Menu
					</th>
				</tr>";
		
				$t_art=mysql_query("SELECT * FROM article WHERE menu_stats='sm3' AND id_menu='$r[id_menu]'");
				$no=1;
				while($r_tbl=mysql_fetch_array($t_art)){
					echo"<tr class='record'>
						<td>
							$no
						</td>
						<td>
							$r_tbl[title]
						</td>
						<td>
							<a href='#' id=$r_tbl[id_article] class='delbutton'>
								<img src='images/icon_edit/remove.png'  />
							</a>
						</td>";
						
						echo "</tr>";
					$no++;
				}
				echo"</table>
			</div>
	 
			<div id='tab2' class='tab_content'> 
				<table cellspacing='0' class=''>
					<tr><th width=15>
						No
					</th>
					<th width=15>
						Select
					</th>
					<th>
						Title
					</th>
					</tr>";
		
					$t_art=mysql_query("SELECT * FROM article WHERE menu_stats =''");
					$no=1;
					while($r_tbl=mysql_fetch_array($t_art)){
						echo"<tr>
						<td>$no</td>
						<td>
							<input type='checkbox' value='$r_tbl[id_article]' name='id_article[]' $key/>
						</td>
						<td>
							$r_tbl[title]
						</td>
						</tr>";
						$no++;
					}
				echo"</table>
			</div>
		</div>		
		<div class='bttn'>
			<input type='submit' class='button_form_add' value='Save' /> 
			<input type='button' class='button_form_add' onClick='self.history.back()' value='Cancel' /> 
		</div>
	</form></div>";
    break;  
	
	
//=============== Form Edit SM4 =================//
  case "edit_menu_sm4":	
	echo"<script src='modules/menu/js/jquery.treeview.js' type='text/javascript'></script>";
	echo"<link rel='stylesheet' href='modules/menu/css/jquery.treeview.css'  type='text/css'/>";
	echo "<link rel='stylesheet' href='modules/menu/css/inner_table_add_main_menu.css'>";
	echo "<link rel='stylesheet' href='modules/menu/css/tabbed_menu.css'>";
	include"modules/menu/tab_menu.php";
	
    $edit=mysql_query("SELECT * FROM menu WHERE id_menu='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	$heading=$r[menu_name];
	
	echo "<div id='cover_table'><div class='h_one'>
		<h1>Edit Menu $heading</h1>
	</div>
	
	<form method=POST action='$act?modules=menu&gen=update_sm4' id='contact-form' class='basic-grey'>
		<input type=hidden name=id value='$r[id_menu]'>
		
		<ul class='tabs'> 
			<li class='active' rel='tab1'> Edit Menu</li>
			<li rel='tab2'>Add Menu from Article</li>
		</ul>
	
		<div class='tab_container'> 
			<div id='tab1' class='tab_content'> 
				<label>
					<span>Main Menu Name :</span>
					<input id='menu_name' type='text' name='menu_name' value='$r[menu_name]'/>
					<input type='hidden' name='id_article' value='$r[id_article]'/>
					<a href='$act?modules=menu&gen=delete_sm4&id=$r[id_menu]'";?>
					onClick="return confirm('Anda yakin akan menghapus data ini?');"
					class="tip4"><?php echo"<img src='images/icon_edit/delete.png'/><span>Delete this Menu</span></a>
				</label>	
				<label>
					<span>List Number :</span>
					<input id='list_number' type='text' name='list_number' style='width:40px' number='true' value='$r[list_number]' />
				</label>";
		
				//table list of article who have menu
				echo"<table cellspacing='0' class=''>
					<tr><th width=15>
						No
					</th>
					<th>
						Title
					</th>
					<th>
						Remove from Menu
					</th>
				</tr>";
		
				$t_art=mysql_query("SELECT * FROM article WHERE menu_stats='sm4' AND id_menu='$r[id_menu]'");
				$no=1;
				while($r_tbl=mysql_fetch_array($t_art)){
					echo"<tr class='record'>
						<td>
							$no
						</td>
						<td>
							$r_tbl[title]
						</td>
						<td>
							<a href='#' id=$r_tbl[id_article] class='delbutton'>
								<img src='images/icon_edit/remove.png'  />
							</a>
						</td>";
						
						echo "</tr>";
					$no++;
				}
				echo"</table>
			</div>
	 
			<div id='tab2' class='tab_content'> 
				<table cellspacing='0' class=''>
					<tr><th width=15>
						No
					</th>
					<th width=15>
						Select
					</th>
					<th>
						Title
					</th>
					</tr>";
		
					$t_art=mysql_query("SELECT * FROM article WHERE menu_stats =''");
					$no=1;
					while($r_tbl=mysql_fetch_array($t_art)){
						echo"<tr>
						<td>$no</td>
						<td>
							<input type='checkbox' value='$r_tbl[id_article]' name='id_article[]' $key/>
						</td>
						<td>
							$r_tbl[title]
						</td>
						</tr>";
						$no++;
					}
				echo"</table>
			</div>
		</div>		
		<div class='bttn'>
			<input type='submit' class='button_form_add' value='Save' /> 
			<input type='button' class='button_form_add' onClick='self.history.back()' value='Cancel' /> 
		</div>
	</form></div>";
    break;  
	
		
	
//=============== Form Edit SM5 =================//
  case "edit_menu_sm5":	
	echo"<script src='modules/menu/js/jquery.treeview.js' type='text/javascript'></script>";
	echo"<link rel='stylesheet' href='modules/menu/css/jquery.treeview.css'  type='text/css'/>";
	echo "<link rel='stylesheet' href='modules/menu/css/inner_table_add_main_menu.css'>";
	echo "<link rel='stylesheet' href='modules/menu/css/tabbed_menu.css'>";
	include"modules/menu/tab_menu.php";
	
    $edit=mysql_query("SELECT * FROM menu WHERE id_menu='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	$heading=$r[menu_name];
	
	echo "<div id='cover_table'><div class='h_one'>
		<h1>Edit Menu $heading</h1>
	</div>
	
	<form method=POST action='$act?modules=menu&gen=update_sm5' id='contact-form' class='basic-grey'>
		<input type=hidden name=id value='$r[id_menu]'>
		
		<ul class='tabs'> 
			<li class='active' rel='tab1'> Edit Menu</li>
			<li rel='tab2'>Add Menu from Article</li>
		</ul>
	
		<div class='tab_container'> 
			<div id='tab1' class='tab_content'> 
				<label>
					<span>Main Menu Name :</span>
					<input id='menu_name' type='text' name='menu_name' value='$r[menu_name]'/>
					<input type='hidden' name='id_article' value='$r[id_article]'/>
					<a href='$act?modules=menu&gen=delete_sm5&id=$r[id_menu]'";?>
					onClick="return confirm('Anda yakin akan menghapus data ini?');"
					class="tip4"><?php echo"<img src='images/icon_edit/delete.png'/><span>Delete this Menu</span></a>
				</label>	
				<label>
					<span>List Number :</span>
					<input id='list_number' type='text' name='list_number' style='width:40px' number='true' value='$r[list_number]' />
				</label>";
		
				//table list of article who have menu
				echo"<table cellspacing='0' class=''>
					<tr><th width=15>
						No
					</th>
					<th>
						Titlewww
					</th>
					<th>
						Remove from Menu
					</th>
				</tr>";
		
				$t_art=mysql_query("SELECT * FROM article WHERE menu_stats='sm5' AND id_menu='$r[id_menu]'");
				$no=1;
				while($r_tbl=mysql_fetch_array($t_art)){
					echo"<tr class='record'>
						<td>
							$no
						</td>
						<td>
							$r_tbl[title]
						</td>
						<td>
							<a href='#' id=$r_tbl[id_article] class='delbutton'>
								<img src='images/icon_edit/remove.png'  />
							</a>
						</td>";
						
						echo "</tr>";
					$no++;
				}
				echo"</table>
			</div>
	 
			<div id='tab2' class='tab_content'> 
				<table cellspacing='0' class=''>
					<tr><th width=15>
						No
					</th>
					<th width=15>
						Select
					</th>
					<th>
						Title
					</th>
					</tr>";
		
					$t_art=mysql_query("SELECT * FROM article WHERE menu_stats =''");
					$no=1;
					while($r_tbl=mysql_fetch_array($t_art)){
						echo"<tr>
						<td>$no</td>
						<td>
							<input type='checkbox' value='$r_tbl[id_article]' name='id_article[]' $key/>
						</td>
						<td>
							$r_tbl[title]
						</td>
						</tr>";
						$no++;
					}
				echo"</table>
			</div>
		</div>		
		<div class='bttn'>
			<input type='submit' class='button_form_add' value='Save' /> 
			<input type='button' class='button_form_add' onClick='self.history.back()' value='Cancel' /> 
		</div>
	</form></div>";
    break;  
}
}
?>
