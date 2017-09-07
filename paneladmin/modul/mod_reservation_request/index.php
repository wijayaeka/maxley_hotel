<script>$(function() {
$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
$( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
});
</script>
<?php 
	$admin_login = $_SESSION['id_admin'];
	$admin_sebelumnya = mysql_fetch_array(mysql_query("select * from reservasi cross join admin on reservasi.id_req = admin.id_admin "));
	$aksi="modul/mod_reservation_request/aksi_reservation_request.php";
	$sql = mysql_query("select * from reservasi
							cross join customer on customer.id_reservasi = reservasi.id_reservasi 
							cross join room_kategori on room_kategori.id_room_kategori = reservasi.id_room_kategori 
							where reservasi.status = 'N'");
	switch($_GET[act]){	
		default:
echo "<div class='workplace'>
		<div class='dr'><span></span></div>
          <div class='row-fluid'>
            <div class='span12'>                    
              <div class='head clearfix'>
                <div class='isw-user'></div>
                        <h1>Data Admin</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
		<table cellpadding='0' cellspacing='0' width='100%' class='table table-bordered table-striped' id='tSortable'>
			<thead><tr>
						<th width='1%'><input type='checkbox' name='checkbox'/></th>
						<th> Nama Customer </th>
						<th>Room Type</th>
						<th>Status</th>
						<th>Detail</th>
					</tr>
			</thead>
			<tbody>";
					while($z = mysql_fetch_array($sql))
					{
						echo "<tr>
							 <td><input type='checkbox' name='checkbox'/></td>";
						echo "<td> $z[first_name] $z[last_name] </td>";
						echo "<td> $z[nama_room_kategori]</td>";
						echo "<td>";
							if( $z[status] == 'Y')
								{
									echo"<div id='check_in'> Check In </div>";
								}
							else
								{						
									echo"<div id='request'> Request </div>";
								}
						echo"</td>";
						echo "<td align=center>
									<a href='?page=reservation_request&act=detail_reservasi&id=$z[id_reservasi]' class='icon-search'> 									
								</a> 
							  </td>";
						echo"</tr>";
					}
			echo"</tbody></table>
			</div>
			</div>
			</div>
			</div>";
			break;
			case "detail_reservasi";
			$id_reservasi =$_GET['id'];
			$sql = mysql_query("select * from reservasi
								cross join customer on customer.id_reservasi = reservasi.id_reservasi 
								cross join room_kategori on room_kategori.id_room_kategori = reservasi.id_room_kategori 
								where reservasi.id_reservasi = '$id_reservasi' ");
			$no = 1;
			$z = mysql_fetch_array($sql);
			$check_out = $z['date_out'];				
			$check_in =$z['date_in'];
			$hari = dateDiff("-",$check_out,$check_in);
			echo "<div class='workplace'>
		<div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-user'></div>
                        <h1>Reservation Detail $z[first_name] $z[last_name] </h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
				<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable' >
				<thead>
				<tr>
				<th colspan=3 > Personal Detail</th>
				</tr>
				</thead>
				<tbody>
						<tr>
								<td>Nama :</td>
								<td>$z[first_name] $z[last_name]</td>
						</tr>
						<tr>
								<td>Alamat :</td>
								<td>$z[address]</td>
						</tr>
						<tr>
								<td>Mobile Phone :</td>
								<td>$z[mobile_phone]</td>
						</tr>
						<tr>
								<td>Home Phone :</td>
								<td>$z[home_phone]</td>
						</tr>
						
						<tr>
								<td>Email :</td>
								<td>$z[email]</td>
						</tr>
						<tr>
								<td>Petugas :</td>
								<td>$admin_sebelumnya[username]</td>
						</tr>
				<tbody>		
				</table>
				<form action='$aksi?page=reservation_request&act=approve' method='POST' name='form_approve' id='form_approve' NAME='form1' onSubmit='return validate()'>
				<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
					<thead><tr><th style='text-align:center;'>No</th><th>Room Type</th><th>Check In</th><th>Check Out</th><th>Room Amount</th><th>Long Time</th><th>Price Rooms
					</th><th>
					</th></tr>
					</thead>
				<tbody>	<tr>
						<td align=center>$no</td>
						<td>$z[nama_room_kategori]</td>
						<td align=center>$z[date_in]</td>
						<td align=center>$z[date_out]</td>
						<td align=center>$z[room_amount] - rooms</td>
						<td align=center>$hari - night</td>
						<td>"; echo'Rp. '. number_format( $z['harga'], 0 , '' , '.' ).''; echo"</td>
						<td><a href='?page=reservation_request&act=change_room&id_reservasi=$z[id_reservasi]' class='icon-edit' >
							</a>
						</td>
						</tr>";
						$total_room = mysql_query("select sum(price) as jumlah , room_amount FROM  reservasi 
												CROSS JOIN room_kategori on reservasi.id_room_kategori = room_kategori.id_room_kategori
												where reservasi.id_reservasi = '$id_reservasi' ");
								$tr = mysql_fetch_array($total_room);
								$total = $tr['jumlah']  * $hari;
								
					echo"	<tr><td colspan=5 style='background:#e87671;  font-weight:bold; font-size:1.3em;' align=right>
								TOTAL :</td><td style='background:#e87671; padding-right:150px; font-weight:bold; font-size:1.3em;' colspan=3 align=right>"; 
					echo' Rp. &nbsp'. number_format( $total, 0 , '' , '.' ).''; echo"</td></tr>
						<tr><td colspan=5 style='background:#e87671;  font-weight:bold; font-size:1.3em;' align=right>";
						echo'
								Grand Total :</td><td colspan=3 style="background:#e87671;  font-weight:bold; font-size:1.3em;" align=right>
								<div id="total"> Rp. &nbsp'. number_format( $total, 0 , '' , '.' ).''; echo"</b></div>
							
						</td></tr>
				<tbody></table>";
						
					echo"
						<input type='hidden' id='id_reservasi' name='id_reservasi' value='$id_reservasi' />
						<input type='hidden' id='id_app' name='id_app' value='$admin_login' />";
									$col = 3;
					echo "<div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1> Room List Available </h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
					<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
							<tr>";
					$cnt = 0;
					$sql = mysql_query("SELECT * from room where id_room_kategori = '".$z['id_room_kategori']."' and status = 'Y' order by nmr_room asc");
					$no = 1;
					if (mysql_num_rows($sql) == 0)
						{
						echo"
						<thead>
						<tr>
						<td colspan='5' style='color:red; font-weight:bold; border:none; padding: 10px 10px;'> No Room List Available</td>
						</tr></thead>
						<tbody>";
						}
						else
						{
							while ($r = mysql_fetch_array($sql)){
							if ($cnt >= $col){
								  echo "</tr><tr>";
								  $cnt = 0;
								}
								 $cnt++;
							echo "<td>
									<input type='hidden' name='amount' value='$z[room_amount]' />
									<input type=checkbox name='room[]' id='room' value='$r[id_room]' $key /> $r[nmr_room]
									</td>";
							}
						}
					echo "</tr></tbody></table></div>";
					echo"<input type='submit' class='btn' name='save' value='Approve' />";?>
					<input type='submit' name='cancel' class='btn' value='Cancel Request' onClick="return confirm('Are You Sure Cancel This Request?');"/>
					<?php echo"
				</form>
				</div></div></div></div>";
			break;
			case "change_room";
					$id_reservasi = $_GET['id_reservasi'];
					
					$customer = mysql_query("select * from reservasi
								cross join customer on customer.id_reservasi = reservasi.id_reservasi
								where reservasi.id_reservasi = '$id_reservasi'");
					$c = mysql_fetch_array($customer);
	echo"<div class='workplace'>
		<div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span6'>                    
                    <div class='head clearfix'>
                        <div class='isw-user'></div>
                        <h1>Personal Detail</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
							<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' >
												
						<tr>
								<td>Nama :</td>
								<td>$c[first_name] $z[last_name] </td>
						</tr>
						<tr>
								<td>Alamat :</td>
								<td>$c[address]</td>
						</tr>
						<tr>
								<td>Mobile Phone :</td>
								<td>$c[mobile_phone]</td>
						</tr>
						<tr>
								<td>Home Phone :</td>
								<td>$c[home_phone]</td>
						</tr>
						
						<tr>
								<td>Email :</td>
								<td>$c[email]</td>
						</tr>
						
				</table>
				</div>
				</div>";
					$room = mysql_query("select * from room_kategori
											CROSS JOIN room on room.id_room_kategori = room_kategori.id_room_kategori
											CROSS JOIN reservasi on reservasi.id_room_kategori = room_kategori.id_room_kategori where reservasi.id_reservasi = '$id_reservasi' ");
			$r= mysql_fetch_array($room);
			echo "<form method='post' action='$aksi?page=reservation_request&act=change_room_request'   name='change_room_request' id='change_room_request'  class='change_room_request'>
					<div class='row-fluid'>
						<div class='span6'>
						  <div class='block-fluid'>                        
							<div class='head clearfix'>
								<div class='isw-favorite'></div>
									<h1>Update Reservasi</h1>
							</div>    
							<div class='row-form clearfix'>
							<input type='hidden' name='id_reservasi' value='$id_reservasi' />
							<input type='hidden' name='price' value='$r[price]' />";
						$sql_room = mysql_query("select * from room_kategori where id_room_kategori != '$r[id_room_kategori]' ");
						echo "<div class='row-form clearfix'>
								<div class='span3'>Nama :</div>
								<div class='span5'>
							<select style='width:180px;  display:inline-block; margin-top: -1px;' name='room_kategori'  id='room_kategori' >
								<option value='$r[id_room_kategori]'> $r[nama_room_kategori] </option>";
								while($x= mysql_fetch_array($sql_room))
								{
									echo "<option value='$x[id_room_kategori]'> $x[nama_room_kategori] </option>";
								}
								echo"</select>
							</div></div>
							<div class='row-form clearfix'>
								<div class='span3'>Nama :</div>
								<div class='span5'><select  id='room_amount' name='room_amount' style='width:60px;'>
											<option value='$r[room_amount]'> $r[room_amount]</option>
											<option value='1'>1</option>
											<option value='2'>2</option>
											<option value='3'>3</option>
											<option value='4'>4</option>
											<option value='5'>5</option>
										<select>
									</div>
							</div>
							<div class='row-form clearfix'>
								<div class='span3'></div>
								<div class='span5'>
								Date In :</br>
							<input type='text' class='text' id='datepicker' value='$r[date_in]' name='date_in' required='true' style='width:100px;'>
							<br>Date Out :</br>
							<input type='text' class='text' id='datepicker2'value='$r[date_out]' name='date_out'  required='true' style='width:100px;'>
							</div>
							</div>	
							<div class='row-form clearfix'>
								<div class='span3'></div>
								<div class='span5'>
									<input type='submit'   value='Update' class='btn' />
									<input type='button' class='btn' value='Cancel' onclick='history.back()'>
					 </div>
					 </div>
					 </div>
					 </div>
					 </div>
					  </form>";
			break;
			
					
		}
		

?>