<?php 
	include "../config/connect.php";
		
		
	$aksi="modul/mod_page/aksi_page.php";
	switch($_GET[act]){	
		default:
		
	
		$no = 1;
		$p = new Paging;
							
							//Tentukan Limit
							$batas = 10;
							
							//Cek posisi halaman
							$posisi = $p->cariPosisi($batas);
		$no = $posisi+1;
		$sql = mysql_query("select * from page  
							CROSS JOIN kategori_page on kategori_page.id_kategori_page = page.id_kategori_page 
							order by id_page asc limit $posisi , $batas");
		$tampil2 = mysql_query("select * from  page order by id_page ");
					$jmldata=mysql_num_rows($tampil2);
					
						//Dapatkan Jumlah Halaman
						$jmlhalaman = $p->jumlahHalaman($jmldata,$batas);
						//Cetak Link Navigasi
						$linkHalaman = $p->navHalaman($_GET[halaman],$jmlhalaman);
		echo "
			<h2>Admin Menu</h2>	
				<div id='add_new'>
				<a href='?page=page&act=add_page'>Add New</a>
				</div>
							  <div class='button'>
									$linkHalaman
							  </div><div id='stripe-separator'></div>";						
			echo"
			
		<table id='table1'>
			<tr><th>No</th><th>Nama Page</th><th>Jenis</th><th>link</th><th>Urutan</th><th>Status</th><th>Aksi</th><tr>
			";
					while($z = mysql_fetch_array($sql))
					{
						echo "<tr><td width=5px> $no</td>";
						echo "<td> $z[nama_page]</td>";
						echo "<td> $z[jenis_page]</td>";
						echo "<td> $z[link]</td>";
						echo "<td> $z[urutan]</td>";
						echo "<td align='center'>";
						
						if ( $z['status_page'] == 'Y' )
						{
								echo"<div id='unpublish'>";?>
									<a href="<?php echo"$aksi?page=page&act=unpublish_page&id_page=$z[id_page]" ?>" class="tip2" onClick="return confirm('Nonaktifkan Page ini?');"> 
									Publish <span>Nonaktifkan Page ini</span>
									</a>
								
								<?php echo"
								</div>";
						
						}
						
						if ( $z['status_page'] == 'N' )
						{
								echo"<div id='publish'>";?>
									<a href="<?php echo"$aksi?page=page&act=publish_page&id_page=$z[id_page]" ?>" class="tip2" onClick="return confirm('Aktifkan Page ini??');"> 
									Unpublish <span>Aktifkan Page ini</span>
									</a>
								
								<?php echo"
								</div>";
						
						}
						echo "	</td>";
						echo "<td align=center >
						<div id='icon'><a href='?page=page&act=edit_page&id_page=$z[id_page]' class='tip2'> <img src='images/edit.png' /> <span>Edit</span></a> 
								";
								?>
						<a href="<?php echo"$aksi?page=page&act=delete_page&id_page=$z[id_page]" ?>" class='tip2' onClick="return confirm('Anda yakin akan menghapus data ini?');">
							<img src='images/delete.png' /><span>Delete</span></a>
		<?php echo" </div>
						</tr>";
					$no++;
					}
			
			echo "</table>";
				
		break;
		
		case "add_page":
						echo "
						<div class='tab_content'>
											<input type='radio' name='holder' id='tab_child_content' class='tab_child_content' checked='checked'/>
											
											<label for='tab_child_content' id='tab_child_content'>Add Mitra Kerja</label>
						<div  class='tab_child_content' ><form method='post' style='margin-top:-50px;' action='$aksi?page=page&act=input_page'   name='form_page' id='form_page' >
									<h2>Add Page</h2>
						<div id='stripe-separator'></div>";
									$kategori_page = mysql_query("select * from kategori_page");
									echo"<label> Kategori Page:</label>
									<select name='id_kategori_page' id='id_kategori_page'  class='easyui-validatebox' required='true'>
										<option value=''> - select category -</option>
									";
										while( $r = mysql_fetch_array($kategori_page))
											{
												echo "<option value='$r[id_kategori_page]'> $r[jenis_page]</option>";		
											}
											echo"</select>";
									
									
									echo"<label>Nama Page:</label>
										<input type='text' id='nama_page' name='nama_page' class='easyui-validatebox' required='true'/>
										
										<label>Link:</label>
										<input type='text' id='link' name='link' class='easyui-validatebox' required='true' placeholder='?page=example' />
										<br>
										<label>Urutan:</label>
										<input type='text' id='urutan' name='urutan' class='easyui-validatebox' required='true' />
										<br>
										<label>Status:</label><br><br>
										<input type='radio' id='status_page' name='status_page' value='Y'/> <small>Active</small> <br><br>
										<input type='radio' id='status_page' name='status_page' value='N' /> <small> Non Active </small>
										<br><br>
										<input type='submit'   value='Simpan' /><input type='button' value= 'CANCel' onclick='history.back()'>
					  </form></div></div>";
		break;
		
		case "edit_page":
			$id_page = $_GET['id_page'];
					$q = mysql_fetch_array(mysql_query("SELECT * from page 
														CROSS JOIN kategori_page on kategori_page.id_kategori_page = page.id_kategori_page
														where page.id_page = '$id_page' "));
				echo "<div class='tab_content'>
											<input type='radio' name='holder' id='tab_child_content' class='tab_child_content' checked='checked'/>
											
											<label for='tab_child_content' id='tab_child_content'>Add Mitra Kerja</label>
						<div  class='tab_child_content' ><form method='post' style='margin-top:-50px;' action='$aksi?page=page&act=update_page' name='form_page' id='form_page' >
								<h2>Edit Page</h2>
								<div id='stripe-separator'></div>
								<input type='hidden' name='id_page' value='$q[id_page]' class='easyui-validatebox' required='true'/>";
								$sql_kategori_page= mysql_query("select * from kategori_page where id_kategori_page != '$q[id_kategori_page]' ");
								echo "
										<select name='id_kategori_page' id='id_kategori_page' class='easyui-validatebox' required='true'>
											<option value='$q[id_kategori_page]'> $q[jenis_page]</option>";
									while($r = mysql_fetch_array($sql_kategori_page))
										{
										echo"<option value='$r[id_kategori_page]'> $r[jenis_page]</option>";
										
										}
									echo "</select>";
								echo"<label>Nama Modul:</label>
								<input type='text' id='nama_page' name='nama_page' value='$q[nama_page]' class='easyui-validatebox' required='true'/>
								
								<label>Link:</label>
								<input type='text' id='link' name='link' class='required' value='$q[link]' class='easyui-validatebox' required='true'/>
								<label>Urutan:</label>
										<input type='text' id='urutan' name='urutan' value='$q[urutan]' class='easyui-validatebox' required='true' />
										<br>
								<label> Status</label> <br><br>";
									if ( $q['status_page'] == 'Y')
									{
											echo" <input type='radio' id='status_page' name='status_page' value='Y' class='required' checked/> Y <br><br>
											<input type='radio' id='status_page' name='status_page' value='N' class='required'/> N <br><br>";
									
									}
									
									else {
											echo" <input type='radio' id='status_page' name='status_page' value='Y' class='required'/> Y <br><br>
													<input type='radio' id='status_page' name='status_page' value='N' class='required' checked/> N <br><br>";
										}
								
								echo"<input type='submit' name='update'  value='Update' /><input type='button' value= 'CANCel' onclick='history.back()'>
					</form></div></div>";
		
		}
			  

?>