<?php 

$aksi="modul/mod_room/aksi_room.php";
	switch($_GET[act]){	
		default:
	
	echo "  <div class='workplace'>
		  <p align='right'><a href='?page=room&act=tambah' role='button' class='btn'>Input Room Baru</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Room</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th width='1%'><input type='checkbox' name='checkbox'/></th>
                                     <th width='5%'>NO ROOM</th>
                                    <th width='15%'>ROOM CATEGORY</th>
                                    <th width='4%'>AKTIF</th>
                                    <th width='5%' style='text-align:center;'>AKSI</th>                                  
                                </tr>
                            </thead>
                            <tbody>";
		$tp=mysql_query('select * from room  
						cross join room_kategori on room.id_room_kategori = room_kategori.id_room_kategori 
						order by nmr_room ASC ');
		while($z=mysql_fetch_array($tp)){
			$harga=format_rupiah($r[harga]);		
			echo "<tr><td width=5px> $no</td>
					<td> $z[nmr_room]</td>
					<td> $z[nama_room_kategori]</td>
					<td  style='text-align:center;'>";
					if ($z['status'] == 'Y'){
							echo"<input type='button' class='btn btn-success' value='Available'>";
					}
						else if ($z['status'] == 'B'){
						echo"<input type='button' class='btn btn-inverse' value='Booked'>";
					}
					else{
						echo"<input type='button' class='btn btn-danger' value='Not Available'>";
					}
		echo"<td style='text-align:center;'>
											<a href='?page=room&act=edit&id=$z[id_room]' class='icon-edit'></a>|";?>
									   <a href="<?php echo"$aksi?page=room&act=delete_room&id=$z[id_room]"; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?');"class='icon-remove'></a>
										</td>
                                </tr><?php
					}
			
			echo "</tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>";    
	 break;
	 case "tambah";					
		echo "<form method='post' action='$aksi?page=rooms&act=input_room' name='form_room' id='form_room'  class='form_category' style='margin-top: -50px;' enctype='multipart/form-data'>
				<div class='workplace form'>
					<div class='row-fluid'>
					<div class='span6'>
					  <div class='block-fluid'>                        
						<div class='head clearfix'>
							<div class='isw-bookmark'></div>
								<h1>Input Room</h1>
						</div>
						<div class='row-form clearfix'>
							<div class='span3'>Room Kategori :</div>
							<div class='span5'>
							<select name='id_room_kategori'  id='s2_1' required='true' style='width: 100%;'/>";
									$sql = mysql_query("select * from room_kategori");
										while($x =mysql_fetch_array($sql))		
											{
												
											
												echo "<option  value='$x[id_room_kategori]'>$x[nama_room_kategori]</option>";
											
											}
									echo"</select>
								</div>	
						</div>
						<div class='row-form clearfix'>
							<div class='span3'>Nomor Room:</div>
								<div class='span5'>
									<input type='text' id='nmr_room' name='nmr_room' class='easyui-validatebox' required='true'/>
								</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span3'>Status:</div>
								<div class='span5'>
									<input type='radio' id='status' name='status' value='Y' class='required'/> Y <br>
									<input type='radio' id='status' name='status' value='N' class='required'/> N <br>
									
								</div>
						</div>
						<div class='row-form clearfix'>
							<input type='submit'   class='btn' value='Simpan' />
							<input type='button' value= 'Cancel'  class='btn' onclick='history.back()'>
						</div> 
				</div></div></div></div>		
			  </form>";
	 break;
	 
	 case  "edit";
			
			$id_room = $_GET['id'];
			$q = mysql_fetch_array(mysql_query("SELECT * from room 
												cross join room_kategori on room.id_room_kategori = room_kategori.id_room_kategori 
												where id_room = '$id_room' "));
		echo "	
		<form method='post' action='$aksi?page=rooms&act=update_room' name='form_subcategory' id='form_subcategory'  class='form_category' style='margin-top: -50px;' enctype='multipart/form-data'>
			<div class='workplace form'>
				<div class='row-fluid'>
				<div class='span6'>
				<div class='block-fluid'>                        
				<div class='head clearfix'>
					<div class='isw-bookmark'></div>
					<h1>Input Room</h1>
				</div>
					<input type='hidden' name='id_room' value='$q[id_room]' />
				<div class='row-form clearfix'>
					<div class='span3'>Room Kategori :</div>
					<div class='span5'>
						<select name='id_room_kategori' id='s2_1' required='true' style='width: 100%;'/>
						<option  value='$q[id_room_kategori]'>$q[nama_room_kategori]</option>";
						$sql = mysql_query("select * from room_kategori where id_room_kategori != $q[id_room_kategori]");
						while($x =mysql_fetch_array($sql))		
							{
							echo "<option  value='$x[id_room_kategori]'>$x[nama_room_kategori]</option>";
							}
							echo"</select>
					</div>
				</div>
				<div class='row-form clearfix'>
					<div class='span3'>Status :</div>
					<div class='span5'>
						<input type='text' id='nmr_room' name='nmr_room' value='$q[nmr_room]' class='required'/>
					</div>
				</div>
				<div class='row-form clearfix'>
					<div class='span3'>Status :</div>
					<div class='span5'>";
						if ( $q['status'] == 'Y'){
								echo" <input type='radio' id='status' name='status' value='Y' class='required' checked/> Y <br>
									<input type='radio' id='status' name='status' value='N' class='required'/> N ";
							}
						else {
								echo" <input type='radio' id='status' name='status' value='Y' class='required'/> Y<br>
									<input type='radio' id='status' name='status' value='N' class='required' checked/> N";
							}
				echo"</div>
				</div>
				<div class='row-form clearfix'>
					<input type='submit'   class='btn' value='Simpan' />
					<input type='button' value= 'Cancel'  class='btn' onclick='history.back()'>
				</div> 			
		</form>";
	 
	 break;
}
?>