<?php 
		include "../config/connect.php";
		
		
		$aksi="modul/mod_template/aksi_template.php";
	switch($_GET[act]){	
		default:
		$sql = mysql_query("select * from template order by id_template asc");
				
				
		$no = 1;
	
		echo "
		<h2>Template Website</h2>
						<div id='stripe-separator'></div>
						<div id='add_new'>
		<a href='?page=template&act=add_template'>Add New</a>
		</div>
							  <div class='button'>
									$linkHalaman
							  </div><br>
		<table id='table1'>
			<tr><th>No</th><th>Nama Template</th><th>Status</th><th>Aksi</th><tr>
			";
					while($z = mysql_fetch_array($sql))
					{
						echo "<tr><td width=5px> $no</td>";
						echo "<td> $z[nama_template]</td>";
						
						echo "<td align='center'>";
						
						if ( $z['status'] == 'Y' )
						{
								echo"<div id='unpublish'>";?>
													<a href="#" class="tip2"> 
													Aktif
												<?php echo"
												</div>";
						
						}
						
						if ( $z['status'] == 'N' )
						{
								echo"<div id='publish'>";?>
													<a href="<?php echo"$aksi?page=template&act=active&id_template=$z[id_template]" ?>" class="tip2" >
													Nonaktif<span>Aktifkan Template Ini</span></a>
												<?php echo"
												</div>";
						
						}
						echo "	</td>";
						
						echo "<td align=center >
						<div id='icon'><a href='?page=template&act=edit_template&id_template=$z[id_template]'> <img src='images/edit.png' /></a> 
								";
								?>
						<a href="<?php echo"$aksi?page=template&act=delete_template&id_template=$z[id_template]" ?>" onClick="return confirm('Anda yakin akan menghapus data ini?');"> <img src='images/delete.png' /></a>
			<?php echo" </div>
						</tr>";
					$no++;
					}
			
			echo "</table>";
			break;
			case "add_template";
					
					echo "
					
					<form method='post' action='$aksi?page=template&act=add_template' name='form_template' id='form_template  class='form_template'>
					<h2>Add New Template </h2>
					<div id='stripe-separator'></div>
								<label>Nama Template:</label>
								<input type='text' id='nama_template' name='nama_template' class='required'/>
								
								<label>Direktori:</label>
								<input type='text' id='folder' name='folder' class='required' value='template/'/>
								<input type='submit' name='save'  value='Simpan' /><input type='button' value= 'CANCel' onclick='history.back()'>
						</form>";
			break;
			
			
			case "edit_template";
				
				$id_template = $_GET['id_template'];
					$q = mysql_fetch_array(mysql_query("SELECT * from template where id_template = '$id_template' "));
				echo "
						<form method='post' action='$aksi?page=template&act=update_template' name='form_template' id='form_template'  class='form_category'>
							<h2>Edit Template</h2>
						<div id='stripe-separator'></div>
								<input type='hidden' name='aksi' value='update_template' />
								<input type='hidden' name='id_template' value='$q[id_template]' />
								
								<label>Nama Template:</label>
								<input type='text' id='nama_template' name='nama_template' class='required' value='$q[nama_template]'/>
								
								<label>Direktori:</label>
								<input type='text' id='folder' name='folder' class='required' value='$q[folder]'/>
								<input type='submit' name='update'  value='Update' /><input type='button' value= 'CANCel' onclick='history.back()'>
			  </form>";
			break;
		
			
			
		}
			  

?>