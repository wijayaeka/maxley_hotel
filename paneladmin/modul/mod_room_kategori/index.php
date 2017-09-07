<?php 
	$aksi="modul/mod_room_kategori/aksi_room_kategori.php";
	switch($_GET[act]){	
	default:
		$sql = mysql_query("select * from room_kategori order by id_room_kategori ");
		$no = 1;
echo " <div class='workplace'>
		  <p align='right'><a href='?page=room_category&act=tambah' role='button' class='btn'>Input Room Category Baru</a></p>
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
					<th> Jenis Room</th>
					<th>Harga</th>
					<th>Aksi</th>
					<th></th>
					</tr> 
			</thead>
			 <tbody>";
					while($z = mysql_fetch_array($sql))
					{
						echo "<tr>
								<td></td>";
						echo "<td> $z[nama_room_kategori]</td>";
						echo "<td> Rp. $z[harga]</td>";
						echo"<td style='text-align:center;'>
								<a href='?page=room_category&act=edit&id=$z[id_room_kategori]' class='icon-edit'></a>|";?>
								<a href="<?php echo"$aksi?page=room_category&act=delete_room&id=$z[id_room_kategori]"; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?');"class='icon-remove'></a>
							 </td><td></td>
						</tr><?php echo"
					</tr>
			</tbody>";
					$no++;
					}
			
			echo "</table>
			</div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>";
	break;
	case "tambah":
		echo "	<form method='post' action='$aksi?page=room_kategori&act=input_room_kategori' name='form_roomcategory' id='form_roomcategory'  class='form_roomcategory' style='margin-top: -50px;' enctype='multipart/form-data'>
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
									<input type='text' id='nama_room_kategori' name='nama_room_kategori' class='easyui-validatebox' required='true' />
							</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span3'>Harga :</div>
							<div class='span5'>
									<input type='text' id='harga' name='harga' class='easyui-validatebox' required='true'/>
							</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span5'>
									<input type='submit' name='save'  class='btn' value='Simpan' />
									<input type='button' value= 'Cancel' class='btn' onclick='history.back()'>
							</div>
						</div>
						</div>
						</div>
						</div>
						</div>
			  </form>";
			break;
case "edit":
			$id_room_kategori = $_GET['id'];
			$q = mysql_fetch_array(mysql_query("SELECT * from room_kategori where id_room_kategori = '$id_room_kategori' "));
	
			echo "<form method='post' action='$aksi?page=room_kategori&act=update_room_kategori' name='form_roomcategory' id='form_roomcategory'  class='form_category' style='margin-top: -50px;' enctype='multipart/form-data'>
					<div class='workplace form'>
					<div class='row-fluid'>
					<div class='span6'>
					  <div class='block-fluid'>                        
						<div class='head clearfix'>
							<div class='isw-bookmark'></div>
								<h1>Update Room</h1>
						</div>
						<div class='row-form clearfix'>
						<input type=hidden name='id_room_kategori' value='$id_room_kategori' />
						<div class='row-form clearfix'>
							<div class='span3'>Room Kategori :</div>
							<div class='span5'>
						<input type='text' id='nama_room_kategori' value ='$q[nama_room_kategori]' name='nama_room_kategori' class='easyui-validatebox' required='true'/>
							</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span3'>Harga :</div>
							<div class='span5'>
								<input type='text' id='harga' value ='$q[harga]' name='harga' class='required'/>
							
							</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span5'>
									<input type='submit' name='update' class='btn' value='Update' /> 
									<input type='button' value= 'Cancel' class='btn' onclick='history.back()'>
							</div>
						</div>
			  </form>";
			break;
	}

?>