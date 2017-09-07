<?php 
		include "../config/connect.php";
		
		
	$aksi="modul/mod_kategori_berita/aksi_kategori.php";
	switch($_GET[act]){	
		default:
		
		$sql = mysql_query("select * from kategori_berita order by urutan asc");
		$no = 1;
		$p = new Paging;
							
							//Tentukan Limit
							$batas = 10;
							
							//Cek posisi halaman
							$posisi = $p->cariPosisi($batas);
		$no = $posisi+1;
		$tampil2 = mysql_query("select * from kategori_berita");
					$jmldata=mysql_num_rows($tampil2);
					
						//Dapatkan Jumlah Halaman
						$jmlhalaman = $p->jumlahHalaman($jmldata,$batas);
						//Cetak Link Navigasi
						$linkHalaman = $p->navHalaman($_GET[halaman],$jmlhalaman);
		echo "
			<h2>Kategori Berita</h2><div id='add_new'>
				<a href='?page=kategori_berita&act=add_kategori'>Add New</a>
				</div>
							  <div class='button'>
									$linkHalaman
							  </div>
							  <div id='stripe-separator'></div>";					
			echo"
			
		<table id='table1'>
			<tr><th>No</th><th>Nama Kategori</th><th>Inisial</th><th>Urutan</th><th>Status</th><th>Aksi</th><tr>
			";
					while($z = mysql_fetch_array($sql))
					{
						echo "<tr><td width=5px> $no</td>";
						echo "<td> $z[nama_kategori]</td>";
						echo "<td > $z[inisial].html</td>";
						echo "<td align='center'> $z[urutan]</td>";
						echo "<td align='center'>";
						
						if ( $z['status'] == 'Y' )
						{
								echo"<div id='unpublish'>";?>
									<a href="<?php echo"$aksi?page=kategori_berita&act=unpublish_kategori&id_kategori=$z[id_kategori]" ?>" class="tip2" onClick="return confirm('Anda yakin akan nonaktifkan Kategori ini beserta Beritanya?');"> 
									Publish <span>Nonaktifkan  Kategori beserta Beritanya</span>
									</a>
								
								<?php echo"
								</div>";
						
						}
						
						if ( $z['status'] == 'N' )
						{
								echo"<div id='publish'>";?>
									<a href="<?php echo"$aksi?page=kategori_berita&act=publish_kategori&id_kategori=$z[id_kategori]" ?>" class="tip2" onClick="return confirm('Anda yakin akan Mengaktifkan Kategori ini beserta Beritanya?');"> 
									Unpublish <span>Aktifkan  Kategori beserta Beritanya</span>
									</a>
								
								<?php echo"
								</div>";
						
						}
						echo "	</td>";
						echo "<td align=center >
						<div id='icon'><a href='?page=kategori_berita&act=edit_kategori&id_kategori=$z[id_kategori]' class='tip2'> <img src='images/edit.png' /> <span>Edit</span></a> 
								";
								?>
						<a href="<?php echo"$aksi?page=kategori_berita&act=delete_kategori&id_kategori=$z[id_kategori]" ?>" class='tip2' onClick="return confirm('Anda yakin akan menghapus data ini?');">
							<img src='images/delete.png' /><span>Delete</span></a>
		<?php echo" </div>
						</tr>";
					$no++;
					}
			
			echo "</table>";
				
		break;
		
		case "add_kategori":
						echo "<form method='post' style='margin-top:-50px;' action='$aksi?page=kategori_berita&act=input_kategori'   name='form_category' id='form_category'  class='form_category'>
									<h2>Add Kategori Berita</h2>
									<div id='stripe-separator'></div>
								<table  class='table_form'>
									<tr>
										<td>
										<label>Nama Kategori:</label>
										</td>
										<td>
										<input type='text' id='nama_kategori' name='nama_kategori' class='easyui-validatebox' required='true'/>
										</td>
									</tr>
									<tr>
										<td>
											<label>Urutan:</label>
										</td>
										<td>
										<input type='text' id='urutan' name='urutan' style='width:50px;' class='easyui-validatebox' required='true'  />
										</td>
									</tr>
									<tr>
										<td colspan=2 align='center'>
											<input type='submit'   value='Simpan' /><input type='button' value= 'CANCel' onclick='history.back()'>
										</td>
									</tr>
								</table>
					  </form>";
		break;
		
		case "edit_kategori":
			$id_kategori = $_GET['id_kategori'];
					$q = mysql_fetch_array(mysql_query("SELECT * from kategori_berita where id_kategori = '$id_kategori' "));
				echo "<form method='post' style='margin-top:-50px;' action='$aksi?page=kategori_berita&act=update_kategori' name='form_category' id='form_category'  class='form_category'>
								<h2>Edit Kategori Berita</h2>
								<div id='stripe-separator'></div>
							<table  class='table_form'>
								<tr>
									<td>
										<input type='hidden' name='id_kategori' value='$q[id_kategori]' class='easyui-validatebox' required='true'/>
										<label>Nama Kategori:</label>
									</td>
									<td>
											<input type='text' id='nama_kategori' name='nama_kategori' value='$q[nama_kategori]' class='easyui-validatebox' required='true'/>
									</td>
								</tr>
								<tr>
									<td>
										<label>Urutan:</label>
									</td>
									<td>
										<input type='text' id='urutan' name='urutan' class='required' style='width:50px;'  value='$q[urutan]' class='easyui-validatebox' required='true'/>
									</td>
								</tr>
								<tr>
									<td colspan='2' align='center'>
										<input type='submit' name='update'  value='Update' /><input type='button' value= 'CANCel' onclick='history.back()'>
									</td>
								</tr>
					</form>";
		
		}
			  

?>