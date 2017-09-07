<?php 
		include "../config/connect.php";
		
		
	$aksi="modul/mod_kategori_page/aksi_kategori_page.php";
	switch($_GET[act]){	
		default:
		
		$sql = mysql_query("select * from kategori_page order by id_kategori_page asc");
		$no = 1;
		$p = new Paging;
							
							//Tentukan Limit
							$batas = 10;
							
							//Cek posisi halaman
							$posisi = $p->cariPosisi($batas);
		$no = $posisi+1;
		$tampil2 = mysql_query("select * from kategori_page");
					$jmldata=mysql_num_rows($tampil2);
					
						//Dapatkan Jumlah Halaman
						$jmlhalaman = $p->jumlahHalaman($jmldata,$batas);
						//Cetak Link Navigasi
						$linkHalaman = $p->navHalaman($_GET[halaman],$jmlhalaman);
		echo "
			<h2> Kategori Menu</h2>	
				<div id='add_new'>
				<a href='?page=kategori_page&act=add_kategori_page'>Add New</a>
				</div>
							  <div class='button'>
									$linkHalaman
							  </div>
							  	<div id='stripe-separator'></div>";					
			echo"
			
		<table id='table1'>
			<tr><th>No</th><th>Nama Kategori Page</th><th>Aksi</th><tr>
			";
					while($z = mysql_fetch_array($sql))
					{
						echo "<tr><td width=5px> $no</td>";
						echo "<td> $z[jenis_page]</td>";
						echo "<td align=center >
						<div id='icon'><a href='?page=kategori_page&act=edit_kategori_page&id_kategori_page=$z[id_kategori_page]' class='tip2'> <img src='images/edit.png' /> <span>Edit</span></a> 
								";
								?>
						<a href="<?php echo"$aksi?page=kategori_page&act=delete_kategori_page&id_kategori_page=$z[id_kategori_page]" ?>" class='tip2' onClick="return confirm('Anda yakin akan menghapus data ini?');">
							<img src='images/delete.png' /><span>Delete</span></a>
		<?php echo" </div>
						</tr>";
					$no++;
					}
			
			echo "</table>";
				
		break;
		
		case "add_kategori_page":
						echo "<form method='post' style='margin-top:-50px;' action='$aksi?page=kategori_page&act=input_kategori_page'   name='form_kategori_page' id='form_kategori_page'  class='form_category'>
									<h2>Add Kategori Page</h2>
						<div id='stripe-separator'></div>
										<label>Nama Kategori Page:</label>
										<input type='text' id='jenis_page' name='jenis_page' class='easyui-validatebox' required='true'/>
										
	
										<input type='submit'   value='Simpan' /><input type='button' value= 'CANCel' onclick='history.back()'>
					  </form>";
		break;
		
		case "edit_kategori_page":
			$id_kategori_page = $_GET['id_kategori_page'];
					$q = mysql_fetch_array(mysql_query("SELECT * from kategori_page where id_kategori_page = '$id_kategori_page' "));
				echo "<form method='post' style='margin-top:-50px;' action='$aksi?page=kategori_page&act=update_kategori_page' name='form_kategori_page' id='form_kategori_page' >
								<h2>Edit Kategori Page</h2>
						<div id='stripe-separator'></div>
								<input type='hidden' name='id_kategori_page' value='$q[id_kategori_page]' class='easyui-validatebox' required='true'/>
								<label>Nama Kategori:</label>
								<input type='text' id='jenis_page' name='jenis_page' value='$q[jenis_page]' class='easyui-validatebox' required='true'/>
								<input type='submit' name='update'  value='Update' /><input type='button' value= 'CANCel' onclick='history.back()'>
					</form>";
		
		}
			  

?>