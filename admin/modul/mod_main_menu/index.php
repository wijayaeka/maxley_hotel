
<?php 
	include "../config/connect.php";
		
		
	$aksi="modul/mod_main_menu/aksi_main_menu.php";
	switch($_GET[act]){	
		default:
		
	
		$no = 1;
		$p = new Paging;
							
							//Tentukan Limit
							$batas = 10;
							
							//Cek posisi halaman
							$posisi = $p->cariPosisi($batas);
		$no = $posisi+1;
		$sql = mysql_query("select * from main_menu order by urutan asc limit $posisi , $batas");
		$tampil2 = mysql_query("select * from main_menu order by urutan asc");
					$jmldata=mysql_num_rows($tampil2);
					
						//Dapatkan Jumlah Halaman
						$jmlhalaman = $p->jumlahHalaman($jmldata,$batas);
						//Cetak Link Navigasi
						$linkHalaman = $p->navHalaman($_GET[halaman],$jmlhalaman);
		echo "
			<h2>main Menu</h2>	
				<div id='add_new'>
				<a href='?page=main_menu&act=add_main_menu'>Add New</a>
				</div>
							  <div class='button'>
									$linkHalaman
							  </div><div id='stripe-separator'></div>";						
			echo"
			
		<table id='table1'>
			<tr><th>No</th><th>Main Menu</th><th>Set As</th><th>link</th><th>Status</th><th>Aksi</th><tr>
			";
					while($z = mysql_fetch_array($sql))
					{
						echo "<tr><td width=5px> $no</td>";
						echo "<td> $z[nama_main_menu]</td>";
						echo "<td> $z[set_as]</td>";
						echo "<td > $z[inisial]</td>";
						echo "<td align='center'>";
						
						if ( $z['status'] == 'Y' )
						{
								echo"<div id='unpublish'>";?>
									<a href="<?php echo"$aksi?page=main_menu&act=unpublish_main_menu&id_main_menu=$z[id_main_menu]" ?>" class="tip2" onClick="return confirm('Nonaktifkan Page ini?');"> 
									Publish <span>Nonaktifkan Main Menu ini</span>
									</a>
								
								<?php echo"
								</div>";
						
						}
						
						if ( $z['status'] == 'N' )
						{
								echo"<div id='publish'>";?>
									<a href="<?php echo"$aksi?page=main_menu&act=publish_main_menu&id_main_menu=$z[id_main_menu]" ?>" class="tip2" onClick="return confirm('Aktifkan Page ini??');"> 
									Unpublish <span>Aktifkan Main Menu ini</span>
									</a>
								
								<?php echo"
								</div>";
						
						}
						echo "	</td>";
						echo "<td align=center >
						<div id='icon'><a href='?page=main_menu&act=edit_main_menu&id_main_menu=$z[id_main_menu]' class='tip2'> <img src='images/edit.png' /> <span>Edit</span></a> 
								";
								?>
						<a href="<?php echo"$aksi?page=page&act=delete_main_menu&id_main_menu=$z[id_main_menu]" ?>" class='tip2' onClick="return confirm('Anda yakin akan menghapus data ini?');">
							<img src='images/delete.png' /><span>Delete</span></a>
		<?php echo" </div>
						</tr>";
					$no++;
					}
			
			echo "</table>";
				
		break;
		
		case "add_main_menu":
						echo "
						<h2>Add Main Menu</h2>
						<div class='tab_content'>
											<input type='radio' name='holder' id='tab_child_content' class='tab_child_content' checked='checked'/>
											<label for='tab_child_content' id='tab_child_content'>Add Main Menu</label>
								<div  class='tab_child_content' >			
										<form method='post' style='margin-top:-50px;' action='$aksi?page=main_menu&act=input_main_menu'   name='form_page' id='form_page' >
										<div id='stripe-separator'></div>";
									echo"<label>Name:</label>
										<input type='text' id='nama_main_menu' name='nama_main_menu' class='easyui-validatebox' required='true'/>
										
										<label>Set As:</label>
										<select name='set_as' id='set_as' class='easyui-validatebox' required='true'>
											<option value=''></option>
											<option value='category_content'>Category Content</option>
											<option value='single_content'>Single Content</option>
										</select>
										<br>
										
										<label>Status:</label><br><br>
										<input type='radio' id='status' name='status' value='Y'/> <small>Active</small> <br><br>
										<input type='radio' id='status' name='status' value='N' /> <small> Non Active </small>
										<br>
										<label>Urutan</label>
										<input type='text' name='urutan' id='urutan' style='width:40px;' />
										<br>
										<input type='submit'   value='Simpan' /><input type='button' value= 'CANCel' onclick='history.back()'>
					  </form>
					  </div>
					  </div>
					  ";
		break;
		
		case "edit_main_menu":
			$id_main_menu = $_GET['id_main_menu'];
					$q = mysql_fetch_array(mysql_query("SELECT * from main_menu where id_main_menu = '$id_main_menu' "));
				echo "<h2>Edit Main Menu</h2>
				<div class='tab_content'>
											<input type='radio' name='holder' id='tab_child_content' class='tab_child_content' checked='checked'/>
											<label for='tab_child_content' id='tab_child_content'>Edit Main Menu</label>
								<div  class='tab_child_content' >	<form method='post' style='margin-top:-50px;' action='$aksi?page=main_menu&act=update_main_menu' name='form_page' id='form_page' >
								<div id='stripe-separator'></div>
								<input type='hidden' name='id_main_menu' value='$q[id_main_menu]' class='easyui-validatebox' required='true'/>
								<label>Nama Main Menu</label>
								<input type='text' id='nama_main_menu' name='nama_main_menu' value='$q[nama_main_menu]' class='easyui-validatebox' required='true'/>
								<label>Set As</label>
								<select name='set_as' id='set_as' class='easyui-validatebox' required='true'>";
									if ($q['set_as'] == 'category_content')
										{
										echo"<option value='category_content'> Category Content</option>
											<option value='single_content'> Single Content</option>";
										}
										
									else{
										echo"<option value='single_content'> Single Content</option>
											<option value='category_content'> Category Content</option>";
									
										}
									echo "</select>
										<label> Status</label> <br><br>";
									if ( $q['status'] == 'Y')
									{
											echo" <input type='radio' id='status' name='status' value='Y' class='required' checked/> Y <br><br>
											<input type='radio' id='status' name='status' value='N' class='required'/> N <br><br>";
									
									}
									
									else {
											echo" <input type='radio' id='status' name='status' value='Y' class='required'/> Y <br><br>
													<input type='radio' id='status' name='status' value='N' class='required' checked/> N <br><br>";
										}
								echo"
									<label>Urutan</label>
										<input type='text' name='urutan' id='urutan' value='$q[urutan]' style='width:40px;' />
								";
								echo"<input type='submit' name='update'  value='Update' /><input type='button' value= 'CANCel' onclick='history.back()'>
					</form></div></div>";
		
		}
			  

?>