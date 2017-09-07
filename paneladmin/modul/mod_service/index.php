<?php 
	include "../config/connect.php";
	$aksi="modul/mod_service/aksi_service.php";
	switch($_GET[act]){	
		default:
		
		$sql = mysql_query("select * from service order by id_service ");
		
		echo "
			<div class='workplace'>
		<p align='right'>
		  <a href='?page=service&act=tambah' role='button' class='btn'>Tambah</a>
		</p>
		<div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-user'></div>
                        <h1>Service</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
			<thead><tr><th>Service</th><th>Harga</th><th>Status</th><th></th><th>Aksi</th></tr></thead>
			<tbody>";
					while($z = mysql_fetch_array($sql))
					{
						echo "<td> $z[nama_service]</td>";
						echo '<td> Rp. ' . number_format( $z['harga'], 0 , '' , '.' ) .'</td>';
						echo "<td align='center'>";
						
						if ( $z['status'] == 'Y' )
						{
								echo"<div id='avail'>";?>
									Available 
								<?php echo"
								</div>";
						
						}
						
						if ( $z['status'] == 'N' )
						{
								echo"<div id='not_avail'>";?>
									Not Availiable 								
								<?php echo"
								</div>";
						
						}
						echo "	</td>";
						echo "<td align=center></td>";
						echo " <td style='text-align:center;'><a href='?page=service&act=edit&id=$z[id_service]' class='icon-edit'></a>|";?>
									   <a href="<?php echo"$aksi?page=service&act=delete&id=$z[id_service]"; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?');"class='icon-remove'></td>
                                
		<?php echo"
						</tr>";
					$no++;
					}
			
			echo "</tbody></table></div></div></div></div>";
				
		break;
		
		case "tambah":
						echo "<form method='post' style='margin-top:-50px;' action='$aksi?page=service&act=input_service'   name='form_service' id='form_service'  class='form_service'>
							<div class='workplace form'>
					<div class='row-fluid'>
						<div class='span6'>
						  <div class='block-fluid'>                        
							<div class='head clearfix'>
								<div class='isw-favorite'></div>
									<h1>Update Service </h1>
							</div>    
						<div id='stripe-separator'></div>
							<div class='row-form clearfix'>
								<div class='span3'>Service Name :</div>
								<div class='span5'>
										<input type='text' id='nama_service' name='nama_service' class='easyui-validatebox' required='true'/>
								</div></div>
								<div class='row-form clearfix'>
								<div class='span3'>Harga :</div>
								<div class='span5'>";?>
										<input type='text' id='harga' name='harga' class='easyui-validatebox' required='true'  onchange="document.getElementById('harga').value = formatCurrency(this.value);"/>
										<span  id="format"></span>
								</div>
								</div>
								<!--<div class='row-form clearfix'>
								<div class='span3'>Stok :</div>
								<div class='span5'>
										<input type='text' id='stok' name='stok' class='easyui-validatebox' required='true' style='width:80px;' />
								</div>
								</div>-->
						<?php echo"<div class='row-form clearfix'>
								<div class='span3'>Status :</div>
								<div class='span5'>
										<select  id='s2_2' name='status' class='easyui-validatebox' required='true' style='width:120px;'  >
											<option value='' > - Pilih Status - </option>
											<option value='Y'> Tersedia </option>
											<option value='N'> Kosong </option>
										</select>
										</div>
								</div>
								<div class='row-form clearfix'>
								<div class='span5'>		
										<input type='submit'   class='btn' value='Simpan' />
										<input type='button' class='btn' value= 'Cancel' onclick='history.back()'>
								</div></div></div></div>
					  </form>";
		break;
		
		case "edit":
			$id_service = $_GET['id'];
					$q = mysql_fetch_array(mysql_query("SELECT * from service where id_service = '$id_service' "));
				echo "<form method='post' style='margin-top:-50px;' action='$aksi?page=service&act=update_service' name='form_service' id='form_service'  class='form_service'>
						<div class='workplace form'>
					<div class='row-fluid'>
						<div class='span6'>
						  <div class='block-fluid'>                        
							<div class='head clearfix'>
								<div class='isw-favorite'></div>
									<h1>Update Service </h1>
							</div>    
								<input type='hidden' name='id_service' value='$q[id_service]' class='easyui-validatebox' required='true'/>
							<div class='row-form clearfix'>
								<div class='span3'>Service Name :</div>
								<div class='span5'>
								<input type='text'  name='nama_service' value='$q[nama_service]' class='easyui-validatebox' required='true'/>
							</div></div>";
								?>
								<div class='row-form clearfix'>
								<div class='span3'>Harga :</div>
								<div class='span5'>
								<input type='text' id='harga' name='harga' class='required' value='<?php echo number_format( $q['harga'], 0 , '' , '.' )  ?>' onchange="document.getElementById('harga').value = formatCurrency(this.value);" class='easyui-validatebox' required='true'/>
								</div></div>
								<?php echo"
								<div class='row-form clearfix'>
								";
								// <div class='span3'>Stok :</div>
								// <div class='span5'>
								// <input type='text' id='stok' name='stok' class='required' value='$q[stok]' class='easyui-validatebox' required='true' style='width:80px;' />
								// </div></div>
								echo"
								<div class='row-form clearfix'>
								<div class='span3'>Status :</div>
								<div class='span5'>
								<select name='status' id='s2_1' class='easyui-validatebox' required='true' style='width:120px;' > ";
									
									if ( $q['status']  == "")
										{
										echo"
												<option> - SELECT STATUS -</option>
												<option value='Y' selected> Y </option>
												<option value='N' > N </option>
										";
										
										
										}
									else if( $q['status'] == 'Y')
										{
										
										echo "
											<option value='Y' selected> Y </option>
											<option value='N' > N </option>
										
										";
										
										}
									else if ( $q['status'] == 'N'){
									
											echo "<option value='N' selected> N </option>
											<option value='Y' > Y </option>";
									
									
											}
								
								echo "
								</select>
								</div></div>
								<div class='row-form clearfix'>
								<div class='span5'>
								<input type='submit' name='update' class='btn' value='Update' />
								<input class='btn' type='button' value= 'Cancel' onclick='history.back()'>
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>
					</form>";
		
		}
			  

?>