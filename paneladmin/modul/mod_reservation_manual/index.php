<script>$(function() {
$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
$( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
});
</script>
	
<?php 
		function StyleId() { 
					$create = strtoupper(md5(uniqid(rand(),true))); 
					$style = 
						substr($create,0,8);
					return $style;
				}
				// End of function

				$id_reservasi = StyleId();
				
		include "../config/connect.php";
			
	$aksi="modul/mod_reservation_manual/aksi_reservation_manual.php";
	switch($_GET[act]){	
		default:
echo "<form method='post' style='margin-top:-50px;' action='$aksi?page=reservation_manual&act=add_reservation'   name='form_category' id='form_category'  class='form_category'>
		<div class='workplace form'>
			<div class='row-fluid'>
				<div class='span12'>
				<div class='block-fluid'>                        
				<div class='head clearfix'>
				<div class='isw-favorite'></div>
					<h1>Reservasi Manual</h1>
				</div>    
				<input type='hidden' name='id_reservasi' value='$id_reservasi' />
				<input type='hidden' name='id_req' value='$id_admin' />
				<div class='row-form clearfix'>
					<div class='span3'>Title :</div>
					<div class='span3'>
					<select name='title' class='easyui-validatebox' required='true' >
						<option value='mr'>Mr.</option>
						<option value='ms'>Ms.</option>
						<option value='mrs'>Mrs.</option>
					</select>
					</div>
				</div>
				<div class='row-form clearfix'>
					<div class='span3'>First Name :</div>
					<div class='span3'>
					<input type='text' class='easyui-validatebox' required='true'  id='first_name' name='first_name' />
					</div>
				</div>
				<div class='row-form clearfix'>
					<div class='span3'>Last Name :</div>
					<div class='span3'>
					<input type='text' class='easyui-validatebox' required='true'  id='last_name' name='last_name' />
					</div>
				</div>
				<div class='row-form clearfix'>
								<div class='span3'>Address :</div>
								<div class='span5'>				
					<textarea name='address' id='address' class='easyui-validatebox' required='true'></textarea>
				</div></div>";
					$sql = mysql_query("select * from room_kategori ");
					echo "
					<div class='row-form clearfix'>
								<div class='span3'>Room Type :</div>
								<div class='span5'>
							<select name='id_room_kategori' id='s2_2'required='true' style='width: 60%;'required='true'>" ;
							echo "<option value=''> Room Type </option>";
							while($z=mysql_fetch_array($sql))		
							{
								echo "<option value='$z[id_room_kategori]'>$z[nama_room_kategori]</option>";
							}	
						echo"</select>
					</div></div>
					<div class='row-form clearfix'>
						<div class='span3'>Room Amount:</div>
						<div class='span5'>
						<select name='room_amount' id='s2_1'required='true' style='width: 30%;'>
							<option value='1' >1</option>
							<option value='2' >2</option>
							<option value='3' >3</option>
							<option value='4' >4</option>
							<option value='5' >5</option>
						</select>
					</div></div>
					<div class='row-form clearfix'>
								<div class='span3'>Date In :</div>
								<div class='span5'>
							<input type='text' class='text' id='datepicker' name='date_in' required='true' style='width:100px;'>
							<br><div class='span3'>Date Out :</div></br>
							<input type='text' class='text' id='datepicker2' name='date_out'  required='true' style='width:100px;'>
							</div>
					</div>
					<div class='row-form clearfix'>
								<div class='span3'>City :</div>
								<div class='span3'>
									<input type='text' class='easyui-validatebox' required='true'  id='city' name='city' />
								</div></div>
					<div class='row-form clearfix'>
								<div class='span3'>State :</div>
								<div class='span3'>
										<input type='text' class='easyui-validatebox' required='true'  id='state' name='state' />
								</div>
					</div>
					<div class='row-form clearfix'>
								<div class='span3'>Postal Code :</div>
								<div class='span3'>
										<input type='text' class='easyui-validatebox' required='true'  id='postal_code' name='postal_code' />
								</div>
					</div>
					<div class='row-form clearfix'>
								<div class='span3'>Country :</div>
								<div class='span3'>
										<input type='text' class='easyui-validatebox' required='true'  id='country' name='country' />
								</div>
					</div>
					<div class='row-form clearfix'>
						<div class='span3'>Mobile Phone :</div>
						<div class='span3'>
										<input type='text' class='easyui-validatebox' required='true'  id='mobile_phone' name='mobile_phone' />
						</div>				
					</div>				
					<div class='row-form clearfix'>
						<div class='span3'>Home Phone :</div>
						<div class='span3'>
							<input type='text' class='easyui-validatebox' required='true'  id='home_phone' name='home_phone' />
						</div>
					</div>
					<div class='row-form clearfix'>
								<div class='span3'>Email :</div>
								<div class='span3'>
								<input type='text' class='easyui-validatebox' required='true'  id='email' name='email' />
					</div>
					</div>
					<div class='row-form clearfix'>
								<div class='span5'>
										<input type='submit'   class='btn' value='Simpan' />
										<input type='button' class='btn' value= 'Cancel' onclick='history.back()'>
					</div></div>
					</div></div>
					</div></div>
					  </form>";
		break;
		
		}
			  

?>