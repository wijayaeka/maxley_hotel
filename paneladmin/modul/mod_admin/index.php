<?php 
	
	
	include "../config/connect.php";
	
	$aksi="modul/mod_admin/aksi_admin.php";
	switch($_GET[act]){	
		default:
			
			
echo "<div class='workplace'>
		<p align='right'>
		  <a href='?page=admin&act=tambah' role='button' class='btn'>Tambah</a>
		</p>
		<div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-user'></div>
                        <h1>Data Admin</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
                            <thead>
                                <tr>
                                    <th width='3%'><input type='checkbox' name='checkbox'/></th>
                                    <th width='25%'>NAMA LENGKAP</th>
                                    <th width='25%'>USERNAME</th>
                                    <th width='25%'>STATUS</th>
                                    <th width='15%' style='text-align:center;'>AKSI</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM admin ORDER BY id_admin ASC');
							while($r=mysql_fetch_array($tp)){
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[nama_lengkap]</td>
                                    <td>$r[username]</td>
                                    <td>$r[status]</td>
                                    <td style='text-align:center;'><a href='?page=admin&act=edit&id=$r[id_admin]' class='icon-edit'></a>|";?>
									   <a href="<?php echo"$aksi?page=admin&act=delete_admin&id=$r[id_admin]"; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?');"class='icon-remove'></td>
                                </tr>
<?php
							}
                               
                                        
                        echo"</tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>";    

					
	break;
		
	case "tambah":
		echo "<form method='post' style='margin-top:-50px;' action='$aksi?page=admin&act=input_admin'   name='form_admin' id='form_admin'  class='form_admin'>
				<div class='workplace form'>
					<div class='row-fluid'>
						<div class='span6'>
						  <div class='block-fluid'>                        
							<div class='head clearfix'>
								<div class='isw-favorite'></div>
									<h1>Input Admin Baru</h1>
							</div>    
							<div class='row-form clearfix'>
								<div class='span3'>Nama :</div>
								<div class='span5'>
									<input type='text' id='nama_lengkap' name='nama_lengkap' class='easyui-validatebox' required='true'/>
								</div>	
							</div>	
							<div class='row-form clearfix'>
								<div class='span3'>Username :</div>
								<div class='span5'>
									<input type='text' id='username' name='username'   class='easyui-validatebox' required='true'/>
								</div>	
							</div>	
							<div class='row-form clearfix'>
								<div class='span3'>Password :</div>
								<div class='span5'>
									<input type='password' id='password' name='password' class='easyui-validatebox' required='true' />
								</div>	
							</div>	
							<div class='row-form clearfix'>
								<div class='span3'>Status :</div>
								<div class='span5'>
										<select name='status' class='easyui-validatebox' id='s2_1'required='true' style='width: 100%;'>
												<option> - Select Status -</option>
												<option value='superadmin'>Super Admin</option>
												<option value='admin'> Admin</option>
										</select>
								</div>	
								</div>
							<div class='row-form clearfix'>
								<input type='submit'   class='btn' value='Simpan' />
								<input type='button' value= 'Cancel'  class='btn' onclick='history.back()'>
							</div> 
					  </div> 
					</div> 
				</div> 
			</div> 
	</form>";
		break;
		
		case "edit":
				
				$id_admin = $_GET['id'];
				$q = mysql_fetch_array(mysql_query("SELECT * from admin where id_admin = '$id_admin' "));
				
				echo "<form method='post' style='margin-top:-50px;' action='$aksi?page=admin&act=update_admin'   name='form_admin' id='form_admin'  class='form_admin'>	
				<input type='hidden' name='id_admin' value='$q[id_admin]' />
				<div class='workplace form'>
					<div class='row-fluid'>
						<div class='span6'>
						  <div class='block-fluid'>                        
							<div class='head clearfix'>
								<div class='isw-edit'></div>
									<h1>Edit Admin</h1>
							</div>    
							<div class='row-form clearfix'>
								<div class='span3'>Nama :</div>
								<div class='span5'>
									<input type='text' id='nama_lengkap' value='$q[nama_lengkap]' name='nama_lengkap' class='easyui-validatebox' required='true'/>
								</div>	
							</div>	
							<div class='row-form clearfix'>
								<div class='span3'>Username :</div>
								<div class='span5'>
									<input type='text' id='username'value='$q[username]'  name='username'   class='easyui-validatebox' required='true'/>
								</div>	
							</div>	
							<div class='row-form clearfix'>
								<div class='span3'>Password :</div>
								<div class='span5'>
									<input type='password' id='password' name='password'  />
								</div>	
							</div>	
							<div class='row-form clearfix'>
								<div class='span3'>Status :</div>
								<div class='span5'>
										 <select name='status' id='s2_1' style='width: 100%;'>";
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
							echo"	</select>
								</div>	
								</div>
							<div class='row-form clearfix'>
								<input type='submit'   class='btn' value='Update' />
								<input type='button' value= 'Cancel'  class='btn' onclick='history.back()'>
							</div> 
					  </div> 
					</div> 
				</div> 
			</div> 
	</form>";
		break;
		}
		

?>