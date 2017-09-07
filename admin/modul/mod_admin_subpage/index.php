<?php 
	include "../config/connect.php";
		
		
	$aksi="modul/mod_admin_subpage/aksi_subpage.php";
	switch($_GET[act]){	
		default:
		
	
		$no = 1;
		$p = new Paging;
							
							//Tentukan Limit
							$batas = 10;
							
							//Cek posisi halaman
							$posisi = $p->cariPosisi($batas);
		$no = $posisi+1;
		$sql = mysql_query("select * from sub_page 
							CROSS JOIN page on page.id_page = sub_page.id_page
							order by sub_page.id_subpage  asc limit $posisi , $batas");
		$tampil2 = mysql_query("select * from  sub_page order by id_subpage ");
					$jmldata=mysql_num_rows($tampil2);
					
						//Dapatkan Jumlah Halaman
						$jmlhalaman = $p->jumlahHalaman($jmldata,$batas);
						//Cetak Link Navigasi
						$linkHalaman = $p->navHalaman($_GET[halaman],$jmlhalaman);
		echo "
			<h2>Admin Sub Menu</h2>	
				<div id='add_new'>
				<a href='?page=subpage&act=add_subpage'>Add New</a>
				</div>
							  <div class='button'>
									$linkHalaman
							  </div><div id='stripe-separator'></div>";						
			echo"
			
		<table id='table1'>
			<tr><th>No</th><th>Nama Sub Page</th><th>Parent</th><th>link</th><th>Urutan</th><th>Aksi</th><tr>
			";
					while($z = mysql_fetch_array($sql))
					{
						echo "<tr><td width=5px> $no</td>";
						echo "<td> $z[nama_subpage]</td>";
						echo "<td> $z[nama_page]</td>";
						echo "<td> $z[link_subpage]</td>";
						echo "<td align='center'>";
						
						if ( $z['status_subpage'] == 'Y' )
						{
								echo"<div id='unpublish'>";?>
									<a href="<?php echo"$aksi?page=subpage&act=unpublish_subpage&id_subpage=$z[id_subpage]" ?>" class="tip2" onClick="return confirm('Nonaktifkan Page ini?');"> 
									Publish <span>Nonaktifkan Page ini</span>
									</a>
								
								<?php echo"
								</div>";
						
						}
						
						if ( $z['status_subpage'] == 'N' )
						{
								echo"<div id='publish'>";?>
									<a href="<?php echo"$aksi?page=subpage&act=publish_subpage&id_subpage=$z[id_subpage]" ?>" class="tip2" onClick="return confirm('Aktifkan Page ini??');"> 
									Unpublish <span>Aktifkan Page ini</span>
									</a>
								
								<?php echo"
								</div>";
						
						}
						echo "	</td>";
						echo "<td align=center >
						<div id='icon'><a href='?page=subpage&act=edit_subpage&id_subpage=$z[id_subpage]' class='tip2'> <img src='images/edit.png' /> <span>Edit</span></a> 
								";
								?>
						<a href="<?php echo"$aksi?page=subpage&act=delete_subpage&id_subpage=$z[id_subpage]" ?>" class='tip2' onClick="return confirm('Anda yakin akan menghapus data ini?');">
							<img src='images/delete.png' /><span>Delete</span></a>
		<?php echo" </div>
						</tr>";
					$no++;
					}
			
			echo "</table>";
				
		break;
		
		case "add_subpage":
						echo "<div class='tab_content'>
											<input type='radio' name='holder' id='tab_child_content' class='tab_child_content' checked='checked'/>
											
											<label for='tab_child_content' id='tab_child_content'>Add Mitra Kerja</label>
						<div  class='tab_child_content' ><form method='post' style='margin-top:-50px;' action='$aksi?page=subpage&act=input_subpage'   name='form_page' id='form_page' >
									<h2>Add Sub Page</h2>
						<div id='stripe-separator'></div>";
									$page = mysql_query("select * from page");
									echo"<label> Parent Menu:</label>
									<select name='id_page' id='id_page'  class='easyui-validatebox' required='true'>
										<option value=''> - Parent Menu -</option>
									";
										while( $r = mysql_fetch_array($page))
											{
												echo "<option value='$r[id_page]'> $r[nama_page]</option>";		
											}
											echo"</select>";
									
									
									echo"<label>Nama SubPage:</label>
										<input type='text' id='nama_subpage' name='nama_subpage' class='easyui-validatebox' required='true'/>
										
										<label>Link:</label>
										<input type='text' id='link_subpage' name='link_subpage' class='easyui-validatebox' required='true' placeholder='?page=example' />
										<br>
										<label>Status:</label><br>
										<input type='radio' id='status_subpage' name='status_subpage' value='Y'/> <small>Active</small> <br><br>
										<input type='radio' id='status_subpage' name='status_subpage' value='N' /> <small> Non Active </small>
										<br><br>
										<label>Urutan:</label>
										<input type='text' id='urutan' name='urutan' style='width:50px;'/> 
										<br><br>
										<input type='submit'   value='Simpan' /><input type='button' value= 'CANCel' onclick='history.back()'>
					  </form></div></div>";
		break;
		
		case "edit_subpage":
			$id_subpage = $_GET['id_subpage'];
					$q = mysql_fetch_array(mysql_query("SELECT * from sub_page 
														CROSS JOIN page on page.id_page = sub_page.id_page
														where sub_page.id_subpage = '$id_subpage' "));
				echo "<div class='tab_content'>
											<input type='radio' name='holder' id='tab_child_content' class='tab_child_content' checked='checked'/>
											
											<label for='tab_child_content' id='tab_child_content'>Add Mitra Kerja</label>
						<div  class='tab_child_content' ><form method='post' style='margin-top:-50px;' action='$aksi?page=subpage&act=update_subpage' name='form_page' id='form_page' >
								<h2>Edit Page</h2>
								<div id='stripe-separator'></div>
								<input type='text' name='id_subpage' value='$q[id_subpage]' class='easyui-validatebox' required='true'/>";
								$sql_page= mysql_query("select * from page where id_page != '$q[id_page]' ");
								echo "
										<select name='id_page' id='id_page' class='easyui-validatebox' required='true'>
											<option value='$q[id_page]'> $q[nama_page]</option>";
									while($r = mysql_fetch_array($sql_page))
										{
										echo"<option value='$r[id_page]'> $r[nama_page]</option>";
										
										}
									echo "</select>";
								echo"<label>Nama Submenu:</label>
								<input type='text' id='nama_subpage' name='nama_subpage' value='$q[nama_subpage]' class='easyui-validatebox' required='true'/>
								
								<label>Link:</label>
								<input type='text' id='link_subpage' name='link_subpage' class='required' value='$q[link_subpage]' class='easyui-validatebox' required='true'/>
								<label> Status</label> <br><br>";
									if ( $q['status_subpage'] == 'Y')
										{
												echo" <input type='radio' id='status_subpage' name='status_subpage' value='Y' class='required' checked/> Y <br><br>
												<input type='radio' id='status_subpage' name='status_subpage' value='N' class='required'/> N <br><br>";
										
										}
									
									else {
											echo" <input type='radio' id='status_subpage' name='status_subpage' value='Y' class='required'/> Y <br><br>
													<input type='radio' id='status_subpage' name='status_subpage' value='N' class='required' checked/> N <br><br>";
										}
								
								echo"<label>Urutan:</label>
										<input type='text' id='urutan' name='urutan' value='$q[urutan]' style='width:50px;'/> 
										<br><br>
										<input type='submit' name='update'  value='Update' /><input type='button' value= 'CANCel' onclick='history.back()'>
					</form></div></div>";
		
		}
			  

?>