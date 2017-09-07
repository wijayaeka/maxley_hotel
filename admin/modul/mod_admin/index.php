<?php 
	
	
	include "../config/connect.php";
	$aksi="modul/mod_admin/aksi_admin.php";
	switch($_GET[act]){	
		default:
			$p = new Paging;					
			$batas = 10;
			$posisi = $p->cariPosisi($batas);
			$no = $posisi+1;
			$tampil2 = mysql_query("select * from admin ");
			$jmldata=mysql_num_rows($tampil2);
			$jmlhalaman = $p->jumlahHalaman($jmldata,$batas);
			$linkHalaman = $p->navHalaman($_GET[halaman],$jmlhalaman);	
			$sql = mysql_query("select * from admin order by id_admin  DESC limit $posisi, $batas");
			$no = 1;
			echo "
				<h2>Web Administrator</h2>
							
			<div id='add_new'>
			<a href='?page=admin&act=add_admin'> Add New</a>
			</div>
			
							  <div class='button'>
									$linkHalaman
							  </div>
							  <div id='stripe-separator'></div>";
			
				echo"
				<table id='table1'>
					<tr><th>No</th><th>Nama Admin</th><th>Username</th><th>Email</th><th>Status</th><th>Aksi</th><tr>";
							while($z = mysql_fetch_array($sql))
							{
								echo "<tr><td width=5px> $no</td>";
								echo "<td> $z[nama_lengkap]</td>";
								echo "<td> $z[username]</td>";
								echo "<td> $z[email]</td>";
								echo "<td> $z[status]</td>";
								echo "<td align=center >
								<div id='icon'><a href='?page=admin&act=edit_admin&id_admin=$z[id_admin]' class='tip2'> <img src='images/edit.png' /> <span>Edit</span></a>";
										?>
								<a href="<?php echo"$aksi?page=admin&act=delete_admin&id_admin=$z[id_admin]" ?>" class='tip2' onClick="return confirm('Anda yakin akan menghapus data ini?');">
									<img src='images/delete.png' /><span>Delete</span></a>
				<?php echo" </div>
							</tr>";
						$no++;
						}
				
				echo "</table>";
					
		break;
		
		case "add_admin":
						echo "
						<div class='tab_content'>
											<input type='radio' name='holder' id='tab_child_content' class='tab_child_content' checked='checked'/>
											
											<label for='tab_child_content' id='tab_child_content'>Add Mitra Kerja</label>
						<div  class='tab_child_content' >	
						<form method='post' style='margin-top:-50px;' action='$aksi?page=admin&act=input_admin'   name='form_admin' id='form_admin'  class='form_admin'>
									<h2>Create New Admin</h2>
						<div id='stripe-separator'></div>
											
											<label>Username:</label>
											<input type='text' id='username' name='username'   class='easyui-validatebox' required='true'/>
										
											<label>Password:</label>
											<input type='password' id='password' name='password' class='easyui-validatebox' required='true' />
										
											<label>Nama :</label>
											<input type='text' id='nama_lengkap' name='nama_lengkap' class='easyui-validatebox' required='true'/>
											
											<label>Email :</label>
											<input type='text' id='email' name='email' class='easyui-validatebox' required='true'/>
											
											<label>No Telp :</label>
											<input type='text' id='no_telp' name='no_telp' class='easyui-validatebox' required='true'/>
											
											<label>Status :</label>
										<select name='status' class='easyui-validatebox' required='true'>
												<option> - Select Status -</option>
												<option value='superadmin'>Super Admin</option>
												<option value='admin'> Admin</option>
										</select><br><br><br>
										<input type='submit'   value='Simpan' /><input type='button' value= 'CANCel' onclick='history.back()'>
					  </form></div></div>";
		break;
		
		case "edit_admin":
				
				$id_admin = $_GET['id_admin'];
				$q = mysql_fetch_array(mysql_query("SELECT * from admin where id_admin = '$id_admin' "));
				
				echo "<div class='tab_content'>
											<input type='radio' name='holder' id='tab_child_content' class='tab_child_content' checked='checked'/>
											
											<label for='tab_child_content' id='tab_child_content'>Add Mitra Kerja</label>
						<div  class='tab_child_content' ><form method='post' style='margin-top:-50px;' action='$aksi?page=admin&act=update_admin' name='form_admin' id='form_admin'  class='form_admin'>
								<h2>Edit Admin</h2>
						<div id='stripe-separator'></div>
								<input type='hidden' name='id_admin' value='$q[id_admin]' />
								<label>Username:</label>
											<input type='text' id='username' name='username'  value='$q[username]'  class='easyui-validatebox' required='true'/>
										
											<label>Password:</label>
											<input type='password' id='password' name='password'  /> 
											<small> * kosongkan bila password tidak diganti</small><br>
										
											<label>Nama :</label>
											<input type='text' id='nama_lengkap' name='nama_lengkap' value='$q[nama_lengkap]' class='easyui-validatebox' required='true'/>
											
											<label>Email :</label>
											<input type='text' id='email' name='email' value='$q[email]' class='easyui-validatebox' required='true'/>
											
											<label>No Telp :</label>
											<input type='text' id='no_telp' name='no_telp' value='$q[no_telp]' class='easyui-validatebox' required='true'/>
											
											<label>Status :</label>
										 <select name='status' id='status'>";
									if ( $q['status'] == '')
										{
											
										echo "<option> - SELECT STATUS -</option>
											  <option name='status' id='status' value='superadmin'> Superadmin</option>
										<option name='status' id='status' value='admin'> Admin</option>";
										
										}
									else if ( $q['status'] == "superadmin")
										{
										
										echo "<option name='status' id='status' value='superadmin'> Superadmin</option>";
										echo "<option name='status' id='status' value='admin'> Admin</option>";
										
										}
									else if($q['status'] == "admin")
										{
									
									
										echo "<option name='status' id='status' value='admin'> Admin</option>";
										echo "<optionname='status' id='status' value='superadmin'> Superadmin</option>";
										}										
							echo"	</select><input type='submit' name='update'  value='Update' /><input type='button' value= 'CANCel' onclick='history.back()'>
					</form></div></div>";
		break;
		}
		

?>