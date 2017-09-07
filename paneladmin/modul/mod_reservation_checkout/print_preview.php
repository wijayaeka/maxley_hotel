<h2>Maxley Hotel</h2>
						<div id="left_head">
						JL.Pluit Selatan 1 No.49<br>
						JAKARTA UTARA - INDONESIA
						</div>
						
						<div id="right_head">
						Telp: (021)669 1696<br>
							  (021)669 5565<br>
							  (021)5595 6930<br>
						Email: stay@maxleyhotel.co.id<br>
						Website www.maxleyhotel.co.id
								www.maxleyhotel.com
						</div>
				</div>
				
					<p ><?php
				$id_reservasi = $_GET['id_reservasi'];
				$admin_request = mysql_fetch_array(mysql_query("select * from reservasi CROSS JOIN admin on reservasi.id_req = admin.id_admin where reservasi.id_reservasi = '$id_reservasi' "));
				$admin_app = mysql_fetch_array(mysql_query("select * from reservasi CROSS JOIN admin on reservasi.id_app = admin.id_admin  where reservasi.id_reservasi = '$id_reservasi' "));
				$admin_checkin = mysql_fetch_array(mysql_query("select * from reservasi CROSS JOIN admin on reservasi.id_checkin = admin.id_admin  where reservasi.id_reservasi = '$id_reservasi' "));
				
			
				$sql = mysql_query("select * from reservasi
								cross join customer on customer.id_reservasi = reservasi.id_reservasi 
								cross join room_kategori on room_kategori.id_room_kategori = reservasi.id_room_kategori 
								where reservasi.id_reservasi = '$id_reservasi'");
				$no = 1;
				$z = mysql_fetch_array($sql);
				$check_out = $z['date_out'];				
				$check_in =$z['date_in'];
				$hari = dateDiff("-",$check_out,$check_in);
			
				
				echo "
				<h2>Booking Details</h2>
						
				<table id='table_detail_checkin' border=1>
					<tr><th colspan=2>CUSTOMER DETAIL
					</th>
					</tr>
						<tr>
						<td style='font-weight:bold;'>Nama:</td>
						<td>$z[first_name] $z[last_name]</td>
						</tr>
						
						<tr>
						<td style='font-weight:bold;'>Address:</td>
						<td>$z[address]</td>
						</tr>
						
						<tr>
						<td style='font-weight:bold;'>City:</td>
						<td>$z[city]</td>
						</tr>
						
						<tr>
						<td style='font-weight:bold;'>State:</td>
						<td>$z[state]</td>
						</tr>
						
						<tr>
						<td style='font-weight:bold;'>Postal Code:</td>
						<td>$z[postal_code]</td>
						</tr>
						
						<tr>
						<td style='font-weight:bold;'>Country:</td>
						<td>$z[country]</td>
						</tr>
					</table>
					<table id='table_detail_checkin' >
					
				<th colspan=3 style='text-align:left; padding-left: 10px;'> Booking Details </th>
						
						
						<tr>
								<td style='font-weight:bold;'>Booking Number :</td>
								<td>$z[id_reservasi]</td>
						</tr>
						<tr>
								<td style='font-weight:bold;'>Customer Name :</td>
								<td>$z[first_name] $z[last_name] </td>
						</tr>
						
						<tr>
								<td style='font-weight:bold;'>Mobile Phone :</td>
								<td>$z[mobile_phone]</td>
						</tr>
						<tr>
								<td style='font-weight:bold;'>Home Phone :</td>
								<td>$z[home_phone]</td>
						</tr>
						
						<tr>
								<td style='font-weight:bold;'>Admin Request :</td>
								<td>$admin_request[username]</td>
						</tr>
						
						<tr>
								<td style='font-weight:bold;'>Admin Approve :</td>
								<td>$admin_app[username]</td>
						</tr>
						
						<tr>
								<td style='font-weight:bold;'>Admin Checkin :</td>
								<td>$admin_checkin[username]</td>
						</tr>
				</table>
				<table id='table_checkin'>
				
						<tr><th style='width:150px; text-align:center;'>Check in</th>
							<th style='width:150px; text-align:center;'>Check Out</th>
							<th style='width:150px; text-align:center;'>Total Night</th>
							<th style='width:150px; text-align:center;'>Total Rooms</th>
							<th style='width:150px; text-align:center;'>Price</th>
						</tr>
							<tr>
								<td align=center>$z[date_in]</td>
								<td align=center>$z[date_out]</td>
								<td align=center>$hari -Night</td>
								<td align=center>$z[room_amount]</td>
								<td align=center>"; echo' Rp. &nbsp'. number_format( $z['price'], 0 , '' , '.' ).''; echo"</td>
							</tr>
							";
						$total_room = mysql_query("select sum(price) as jumlah , room_amount FROM  reservasi 
												CROSS JOIN room_kategori on reservasi.id_room_kategori = room_kategori.id_room_kategori
												where reservasi.id_reservasi = '$id_reservasi' ");
								$tr = mysql_fetch_array($total_room);
								
								
								$total = $tr['jumlah'] * $hari;
								
					echo"	<tr><td colspan=4 style='background:#e87671; padding-right:150px; font-weight:bold; font-size:1.1em;' align=right>TOTAL :</td><td style='background:#e87671; padding-right:150px; font-weight:bold; font-size:1.1em;' colspan=2>"; echo' Rp. &nbsp'. number_format( $total, 0 , '' , '.' ).''; echo"</td></tr>
							</table>";
					$detail_room = mysql_query("select * from detail_reservasi_room 
												CROSS JOIN room on detail_reservasi_room.id_room = room.id_room
												CROSS JOIN room_kategori on room_kategori.id_room_kategori	 = room.id_room_kategori
												where id_reservasi = '$id_reservasi' ");
					
				echo"<table id='table_checkin' style='width:70%;'>
					<tr><th style=' text-align:center;'>No</th><th style='width:150px; text-align:center;'>No Room</th><th style='width:150px; text-align:center;'>Category</th><th>Action</th></tr>";
					$no = 1;
					while ($dr = mysql_fetch_array($detail_room))
						{
							echo"<tr>
								<td align='center'>$no</td>
								<td align='center' >$dr[nmr_room]</td>
								<td align='center'>$dr[nama_room_kategori]</td>
								<td  style='background: #cccccc; text-align:center;' >
								</td>
							</tr>";
							$no++;
						}
				echo"		
				</table>";
			$cari_service = mysql_query("select * from detail_reservasi_service  
											CROSS JOIN service on detail_reservasi_service.id_service = service.id_service 
											where detail_reservasi_service.id_reservasi = '$id_reservasi' ");
			
			if (mysql_num_rows($cari_service) == 0)
					{
						echo"	
								<table id='table_detail_checkin'>
								<tr><th style='text-align:center;'>No</th><th>Service Type</th><th>Price</th><th>Amount</th></tr>
								<tr>
									<td align=center colspan=10>No Service Found</td>
									</tr>
								</table>
						";
						
					}
				else {
						echo"<table id='table_detail_checkin'>
							<tr><th style='text-align:center;'>No</th><th>Service Type</th><th>Price
							</th></tr>";
							while($sr = mysql_fetch_array($cari_service))
								{
								echo"<tr>
								<td align=center>$no</td>
								<td>$sr[nama_service]</td>
								<td>"; echo'Rp. '. number_format( $sr['harga'], 0 , '' , '.' ).''; echo"</td>";
								
								//<td align=center>";
									?>
										<!-- <a href="<?php echo"$aksi?page=reservation_checkin&act=delete_service&id_detail_reservasi_service=$sr[id_detail_reservasi_service]" ?>" class='tip2' onClick="return confirm('Batalkan Service ini?');">
											<img src='images/delete.png' style='width:13px; height:13px;'/><span>Delete</span></a> -->
									<?php 
								//</td>
							echo"</tr>";
								$no++;
								}
									
						$total_service = mysql_query("select sum(harga) as jumlah FROM  service 
												CROSS JOIN detail_reservasi_service on detail_reservasi_service.id_service = service.id_service
												where detail_reservasi_service.id_reservasi = '$id_reservasi' ");
								$ts = mysql_fetch_array($total_service);
					echo"	<tr><td colspan=2 style='background:#e87671; padding-right:150px; font-weight:bold; font-size:1.1em;' align=right>TOTAL :</td><td style='background:#e87671; padding-right:150px; font-weight:bold; font-size:1.1em;' >"; echo' Rp. &nbsp'. number_format( $ts['jumlah'], 0 , '' , '.' ).''; echo"</td></tr>
				
						</table>";
				
						}
					$sub_total = $total + $ts['jumlah'] ;
				echo"<table id='table_checkin' style='font-size: 1.6em;'>
					
						<tr>
								<tr>
									<td colspan='3' align=right style='font-weight:bold;'>Sub Total</td>
									<td colspan='2' align=right style='font-weight:bold; font-size: 1.4em;'>";echo' Rp. &nbsp'. number_format( $sub_total, 0 , '' , '.' ).''; echo"</td>
								</tr>
								<tr>
									<td colspan='3'  align=right style='font-weight:bold;'>Tax (%)</td>
									<td colspan='2' align=right style='font-weight:bold; font-size: 1.4em;'> 0 %</td>
								</tr>
								<tr>
									<td colspan='3'  align=right style='font-weight:bold;'>Grand Total</td>
									<td colspan='2' align=right style='font-weight:bold; font-size: 1.4em;'> ";
									echo' Rp. &nbsp'. number_format( $sub_total, 0 , '' , '.' ).''; echo"</td>
								</tr>
								
							</tr>
							
				</table>
				<table id='table_checkin' >
						<tr><th colspan=2>Payment Details</th></tr>
							
								<tr>
									<td style='font-weight:bold;'>Payment Option</td>
									<td align=left>Manual: Pay On Arrival</td>
								</tr>
								<tr>
									<td style='font-weight:bold;'>Transaction ID</td>
									<td align=left>N/A</td>
								</tr>
								
							
						<tr><th colspan=3>Customer Status</th></tr>
							
								<tr>
									<td style='font-weight:bold;'>Membership Number</td>
									<td align=left>$z[mobile_phone]</td>
								</tr>
								<tr>
									<td style='font-weight:bold;'>Free Room</td>
									<td align=left></td>
								</tr>
								<tr style='background:#e87671;'>
									<td style='font-weight:bold;'>Member Get Member</td>
									<td align=left></td>
								</tr>
						<tr><th colspan=3>Booking Status</th></tr>
						<tr>
							<td style='font-weight:bold;'>Active</td>
							<td></td>
						</tr>
						<tr><td colspan=2>";
						?>
					
					</p></div>
					
				</div>