
<?php 

	$admin_login = $_SESSION['id_admin'];
	$admin = mysql_fetch_array(mysql_query("select * from reservasi cross join admin on reservasi.id_app = admin.id_admin "));
	$aksi="modul/mod_reservation_approved/aksi_reservation_approved.php";
	switch($_GET[act]){	
		default:
		$sql = mysql_query("select * from reservasi
							cross join customer on customer.id_reservasi = reservasi.id_reservasi 
							cross join room_kategori on room_kategori.id_room_kategori = reservasi.id_room_kategori 
							where reservasi.status = 'B'");
echo "<div class='workplace'>
		<div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-user'></div>
                        <h1>Reservation Approved</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
		<table table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
			<thead>
				<tr>
				<th><input type='checkbox' name='checkbox'/></th>
				<th> Nama Customer </th>
				<th>Room Type</th>
				<th>Detail</th><th></th></tr>
			</thead>
			<tbody>";
					while($z = mysql_fetch_array($sql))
					{
						echo "<tr><td width=5px><input type='checkbox' name='checkbox'/></td>";
						echo "<td> $z[first_name] $z[last_name] </td>";
						echo "<td> $z[nama_room_kategori]</td>";
						echo "<td align=center>
									<a href='?page=reservation_approved&act=detail_reservasi_approved&id_reservasi=$z[id_reservasi]' class='icon-search' > 
									
							  </td><td></td>";
						echo"</tr>";
				}
			
			
			echo "</tbody></table>";
			
			break;
			
			case "detail_reservasi_approved";
				$id_reservasi = $_GET['id_reservasi'];
				$sql = mysql_query("select * from reservasi
									cross join customer on customer.id_reservasi = reservasi.id_reservasi 
									cross join room_kategori on room_kategori.id_room_kategori = reservasi.id_room_kategori 
									cross join room on room_kategori.id_room_kategori = room.id_room_kategori 
									cross join detail_reservasi_room on detail_reservasi_room.id_room = room.id_room 
									where reservasi.id_reservasi = '$id_reservasi'");
				$no = 1;
				$z = mysql_fetch_array($sql);
				$check_out = $z['date_out'];				
				$check_in =$z['date_in'];
				$hari = dateDiff("-",$check_out,$check_in);
			echo "
			<div class='workplace'>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-user'></div>
                        <h1>Reservation Approved $z[first_name] $z[last_name] </h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
				<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
				<thead></thead>
				<tbody>
						<tr>
								<td>Nama :</td>
								<td>$z[first_name] $z[last_name] </td>
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
								<td>Request Admin :</td>
								<td> $admin[username]</td>
						</tr>
						
				</tbody>		
				</table>
		
				<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
					<thead>
						<tr>
						<th style='text-align:center;'>No</th>
						<th>Room Type</th><th>Check In</th><th>Check Out</th><th>Room Amount</th><th>long Time</th><th>Price
					</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td align=center>$no</td>
						<td>$z[nama_room_kategori]</td>
						<td align=center>$z[date_in]</td>
						<td align=center>$z[date_out]</td>
						<td align=center>$z[room_amount]</td>
						<td align=center>$hari -night</td>
						<td>"; echo'Rp. '. number_format( $z['harga'], 0 , '' , '.' ).''; echo"</td>
						</tr>";
						$total_room = mysql_query("select sum(price) as jumlah , room_amount FROM  reservasi 
												CROSS JOIN room_kategori on reservasi.id_room_kategori = room_kategori.id_room_kategori
												where reservasi.id_reservasi = '$id_reservasi' ");
								$tr = mysql_fetch_array($total_room);
								
								
								$total = $tr['jumlah'] * $hari;
								
					echo"	<tr><td colspan=6 style='background:#e87671;  font-weight:bold; font-size:1.3em;' align=right>
							TOTAL :</td><td style='background:#e87671; font-weight:bold; font-size:1.3em;' colspan=2>"; 
					echo' Rp. &nbsp'. number_format( $total, 0 , '' , '.' ).''; echo"</td></tr>
				</tbody></table>";
				$cari_service = mysql_query("select * from detail_reservasi_service  
											CROSS JOIN service on detail_reservasi_service.id_service = service.id_service 
											where detail_reservasi_service.id_reservasi = '$id_reservasi' ");
				
			if (mysql_num_rows($cari_service) == 0)
					{
						echo"
            <div class='row-fluid'>
                <div class='span8'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Services</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>	
								<table cellpadding='0' cellspacing='0' width='100%' class='table table-bordered table-striped' id='tSortable'>
								<thead>
									<tr>
										<th style='text-align:center;'>No</th><th>Service Type</th><th>Price</th><th>Amount</th>
										<th width='10%'><a href='?page=reservation_approved&act=add_service&id_reservasi=$id_reservasi' class='icon-edit' >
										</th>
									</tr>
								</thead>
								<tbody>
								<tr><td></td>
									<td align=center colspan=3>No Service Found</td>
									<td>
									</td>
									</tr>
								</tbody>
								</table>
						</div>
						</div>
						</div>
						";
					}
				else {
						echo"
						<div class='row-fluid'>
                <div class='span8'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Services</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
					<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
							<thead>
								<tr>
									<th style='text-align:center;'>No</th><th>Service Type</th><th>Price</th><th> Action</th>
									<th>
										<a href='?page=reservation_approved&act=add_service&id_reservasi=$id_reservasi' class='icon-edit' >
									</th>
								</tr>
							</thead>
							<tbody>";
							while($sr = mysql_fetch_array($cari_service))
								{
								echo"<tr>
								<td align=center>$no</td>
								<td>$sr[nama_service]</td>
								<td>"; echo'Rp. '. number_format( $sr['harga'], 0 , '' , '.' ).''; echo"</td>
								
								<td align=center colspan=2> ";
									?>
										<a href="<?php echo"$aksi?page=reservation_approved&act=delete_service&id_detail_reservasi_service=$sr[id_detail_reservasi_service]" ?>" onClick="return confirm('Anda yakin akan menghapus service ini?');" class='icon-remove'></a>
									<?php 
						echo"</td>	
								</tr>";
								$no++;
								}
								$total_service = mysql_query("select sum(harga) as jumlah FROM  service 
												CROSS JOIN detail_reservasi_service on detail_reservasi_service.id_service = service.id_service
												where detail_reservasi_service.id_reservasi = '$id_reservasi' ");
								$ts = mysql_fetch_array($total_service);
								echo"<tr><td colspan=3 style='background:#e87671;  font-weight:bold; font-size:1.3em;' align=right>TOTAL SERVICE</td><td style='background:#e87671; padding-left:20px;  font-weight:bold; font-size:1.3em;' colspan=2>"; echo' Rp. &nbsp'. number_format( $ts['jumlah'], 0 , '' , '.' ).''; echo"</td></tr>
						</tbody></table>
						</div></div></div>";
				
						}
					$detail_room = mysql_query("select * from detail_reservasi_room 
												CROSS JOIN room on detail_reservasi_room.id_room = room.id_room
												CROSS JOIN room_kategori on room_kategori.id_room_kategori	 = room.id_room_kategori
												where id_reservasi = '$id_reservasi' ");
					
				echo"
				<div class='row-fluid'>
                <div class='span8'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Rooms</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'><table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
					<thead>
						<tr><th>No Room</th><th>Category</th></tr>
					</thead>
					<tbody>";
					while ($dr = mysql_fetch_array($detail_room))
						{
							echo"<tr>
								
								<td align='center' >$dr[nmr_room]</td>
								<td align='center'>$dr[nama_room_kategori]</td>
								
							</tr>";
							$no++;
						}
				echo"</tbody>		
				</table>
					</div></div>
					</div>";
				
						$grand_total = $total + $ts['jumlah'];
						echo'<table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped" id="tSortable">
						<tr><td style=" text-align:right; padding: 10px 10px; font-size: 18px; font-weight:bold; background:#e87671;">
								Grand Total :
								Rp. &nbsp'. number_format( $grand_total, 0 , '' , '.' ).''; echo"</b>
								</td></tr></table>
				
					<div class='row-form clearfix'>
								<div class='span5'>
					<form action='$aksi?page=reservation_approved&act=checkin' method='POST' id='approve-form' style='background: transparent;'>
					<input type='hidden' name='id_reservasi' value='$id_reservasi' />
					<input type='hidden' name='id_checkin' value='$admin_login' />
					<input type='hidden' name='room' value='$z[id_detail_reservasi_room]' />
					<input type='submit' name='save' id='approve' value='Check In!'  class='btn' />";?>
					<input type='submit' name='cancel' value='Cancel Reserve' class='btn' onClick="return confirm('Cancel This Reservation?');"/>
					<?php echo"</div></div>
				</form></div></div></div></div>";
				
			break;
			
			
			
			case "add_service";
						$id_reservasi = $_GET['id_reservasi'];
						$data_service = mysql_query("select * from service");
									$no = 1;
									echo "<form action='$aksi?page=reservation_approved&act=input_service' method='post'>
											<input type='hidden' name='id_reservasi' value='$id_reservasi' />
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-user'></div>
                        <h1>Reservation Approved $z[first_name] $z[last_name] </h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
						<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
						<thead>
						<tr><th style='text-align:center;'>No</th>
							<th style='text-align:center;'>Service</th>
							<th style='text-align:center;'>Harga</th>
							<th style='text-align:center;'>Pilih</th>
							<th></th>
						</tr></thead>
						<tbody>";
							while($x = mysql_fetch_array($data_service))
								{
								echo "
									<tr><td align='center'>$no</td>
										<td>$x[nama_service]</td>
										<td  align='center'>"; echo'Rp. '. number_format( $x['harga'], 0 , '' , '.' ).''; echo"</td>
										<td align='center'><input type='checkbox' name='service[]' value='$x[id_service]' id='id_service'  $key /></td>
										<td></td>
									</tr>";						
								}
						echo"</tbody></table>
					</div>
					</div>
						<input type='submit' class='btn' name='submit' value='Add'>
						<input class='btn' type='button' name='submit' value='Cancel'  onclick='history.back()'>
					</div>
					</div>";
			
			break;
		}

?>