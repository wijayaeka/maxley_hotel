<html>
<body>
<?php 
	$aksi="modul/mod_reservation_checkout/aksi_reservation_checkout.php";
	$pdf_checkout="modul/mod_pdf_checkout/index.php";
	$admin_login = $_SESSION['id_admin'];
	$admin = mysql_fetch_array(mysql_query("select * from admin cross join reservasi on reservasi.id_req = admin.id_admin"));
	switch($_GET[act]){	
		default:
		
						$sql = mysql_query("select * from reservasi
							cross join customer on customer.id_reservasi = reservasi.id_reservasi 
							cross join room_kategori on room_kategori.id_room_kategori = reservasi.id_room_kategori
							where reservasi.status = 'O' limit $posisi, $batas");
						
		echo "<div class='workplace'>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-user'></div>
                        <h1>Reservation Check In $z[first_name] $z[last_name] </h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
		<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
			<thead>
			<tr><th style='width:1%;'><input type='checkbox' name='checkbox'/></th><th> Nama Customer </th><th>Check In</th><th>Check Out</th><th>Detail</th></tr>
			</thead>
			<tbody>";
					while($z = mysql_fetch_array($sql))
					{
						echo "<td><input type='checkbox' name='checkbox'/></td>
						<td> $z[first_name] $z[last_name] </td>";
						echo"<td align=center> $z[date_in]</td>
							</td><td align=center> $z[date_out]</td>
							<td align=center>
									<a href='?page=reservation_checkout&act=detail_checkout&id_reservasi=$z[id_reservasi]' class='icon-search' >
								</a>
							  </td>";
						echo"</tr>";
							}
			
			echo "</tbody></table>
			</div>
			</div>
			</div>
			</div>
			";
			
			break;
			case "detail_checkout";
		
			$id_reservasi = $_GET['id_reservasi'];
			$sql = mysql_query("select * from reservasi
								cross join customer on customer.id_reservasi = reservasi.id_reservasi 
								cross join room_kategori on room_kategori.id_room_kategori = reservasi.id_room_kategori 
								where reservasi.id_reservasi = '$id_reservasi'");
			$no = 1;
			$z = mysql_fetch_array($sql);
				$check_out = $z['date_out'];				
				$check_in =$z['date_in'];
				$hari = dateDiff("-",$check_out,$check_in);
			
				$sql = mysql_query("select * from reservasi
							cross join customer on customer.id_reservasi = reservasi.id_reservasi 
							cross join room_kategori on room_kategori.id_room_kategori = reservasi.id_room_kategori 
							where reservasi.id_reservasi = '$id_reservasi' AND reservasi.status = 'O' order by id asc ");
				$z = mysql_fetch_array($sql);
				$no = 1;
				
				echo "<div class='workplace'>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-user'></div>
                        <h1>Customer</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
				<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
				<thead>
					<tr><th>CUSTOMER DETAIL</th>
					<th>
						<a href='?page=reservation_checkin&act=customer_update&id_reservasi=$z[id_reservasi]' class='icon-edit'>  
						</a> Edit
					</th>
					</tr>
				</thead>
				<tbody>
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
						<td>$z[postal_code]</td>
						</tr>
				</tbody>
					</table>
			</div></div></div></div>";
			$admin_request = mysql_fetch_array(mysql_query("select * from reservasi CROSS JOIN admin on reservasi.id_req = admin.id_admin where reservasi.id_reservasi = '$id_reservasi' "));
			$admin_app = mysql_fetch_array(mysql_query("select * from reservasi CROSS JOIN admin on reservasi.id_app = admin.id_admin  where reservasi.id_reservasi = '$id_reservasi' "));
			$admin_checkin = mysql_fetch_array(mysql_query("select * from reservasi CROSS JOIN admin on reservasi.id_checkin = admin.id_admin  where reservasi.id_reservasi = '$id_reservasi' "));
			
			$sql = mysql_query("select * from reservasi
								cross join customer on customer.id_reservasi = reservasi.id_reservasi 
								cross join room_kategori on room_kategori.id_room_kategori = reservasi.id_room_kategori 
								where reservasi.id_reservasi = '$id_reservasi'");
			$no = 1;
			$z = mysql_fetch_array($sql);
			echo"<div class='workplace'>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Booking Detail</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
				<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>				
					<tbody>	
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
				<tbody></table>
			</div></div></div></div>
			<div class='workplace'>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-user'></div>
                        <h1>Reservation Detail</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
			<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
				<thead>
						<tr><th style='width:150px; text-align:center;'>Check in</th>
							<th style='width:150px; text-align:center;'>Check Out</th>
							<th style='width:150px; text-align:center;'>Total Night</th>
							<th style='width:150px; text-align:center;'>Total Rooms</th>
							<th style='width:150px; text-align:center;'>Price </th>
							<th></th>
						</tr>
				</thead>
				<tbody>
							<tr>
								<td align=center>$z[date_in]</td>
								<td align=center>$z[date_out]</td>
								<td align=center>$hari -Night</td>
								<td align=center>$z[room_amount]</td>
								<td align=center>"; echo' Rp. &nbsp'. number_format( $z['harga'], 0 , '' , '.' ).''; echo"</td>
								<td></td>
							</tr>
							";
						$total_room = mysql_query("select sum(price) as jumlah , room_amount FROM  reservasi 
												CROSS JOIN room_kategori on reservasi.id_room_kategori = room_kategori.id_room_kategori
												where reservasi.id_reservasi = '$id_reservasi' ");
								$tr = mysql_fetch_array($total_room);
								
								
								$total = $tr['jumlah'] * $hari;
								
					echo"	<tr><td colspan=4 style='background:#e87671; padding-right:150px; font-weight:bold; font-size:1.1em;' align=right>
					TOTAL :</td><td style='background:#e87671; padding-right:150px; font-weight:bold; font-size:1.1em;' colspan=2>";
					echo' Rp. &nbsp'. number_format( $total, 0 , '' , '.' ).''; echo"</td></tr>
							</tbody></table>";
					$detail_room = mysql_query("select * from detail_reservasi_room 
												CROSS JOIN room on detail_reservasi_room.id_room = room.id_room
												CROSS JOIN room_kategori on room_kategori.id_room_kategori	 = room.id_room_kategori
												where id_reservasi = '$id_reservasi' ");
					
echo" <div class='row-fluid'>
                <div class='span12'>   
                    <div class='block-fluid table-sorting clearfix'>
					<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
					<thead>
						<tr><th style='width:1%;'><input type='checkbox' name='checkbox'/></th><th style='width:10%; text-align:center;'>No Room</th><th style='width:150px; text-align:center;'>Category</th>
							<th style='width:25%;'></th>
						</tr>
					</thead><body>";
					$no = 1;
					while ($dr = mysql_fetch_array($detail_room))
						{
							echo"<tr>
								<td align='center'><input type='checkbox' name='checkbox'/></td>
								<td align='center' >$dr[nmr_room]</td>
								<td align='center'>$dr[nama_room_kategori]</td>
								<td>
								</td>
							</tr>";
							$no++;
						}
				echo"		
				</tbody></table>
			</div></div></div>";
			$cari_service = mysql_query("select * from detail_reservasi_service  
											CROSS JOIN service on detail_reservasi_service.id_service = service.id_service 
											where detail_reservasi_service.id_reservasi = '$id_reservasi' ");
			
			if (mysql_num_rows($cari_service) == 0)
					{
						echo"<div class='workplace'>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-user'></div>
                        <h1>Services</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
								<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
								<thead>
								<tr><th style='text-align:center;'><input type='checkbox' name='checkbox'/></th><th>Service Type</th><th>Price</th><th>Amount</th>
								<th style='width:1%;'></th>
								</th></tr>
								</thead>
								</tbody>
								<tr>
									<td align=center colspan=10>No Service Found</td>
									</tr>
								</tbody>
								</table>
					</div></div></div></div>";
						
					}
				else {
				echo" <div class='row-fluid'>
                <div class='span12'>   
				    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Services</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
					<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
					<thead>
							<tr><th style='width:1%;'><input type='checkbox' name='checkbox'/></th><th>Service Type</th><th >Price</th>
							<th style='width:1%;'></th>
						</tr>
					</thead>
					<tbody>";
							while($sr = mysql_fetch_array($cari_service))
								{
								echo"<tr>
								<td align=center><input type='checkbox' name='checkbox'/></td>
								<td>$sr[nama_service]</td>
								<td>"; echo'Rp. '. number_format( $sr['harga'], 0 , '' , '.' ).''; echo"</td>
								<td>
								</td>
							</tr>";
								$no++;
								}
									
						$total_service = mysql_query("select sum(harga) as jumlah FROM  service 
												CROSS JOIN detail_reservasi_service on detail_reservasi_service.id_service = service.id_service
												where detail_reservasi_service.id_reservasi = '$id_reservasi' ");
								$ts = mysql_fetch_array($total_service);
					echo"	<tr><td colspan=2 style='background:#e87671; padding-right:150px; font-weight:bold; font-size:1.1em;' align=right>
						TOTAL :</td><td colspan=2 style='background:#e87671; padding-right:150px; font-weight:bold; font-size:1.1em;' >";
							echo' Rp. &nbsp'. number_format( $ts['jumlah'], 0 , '' , '.' ).''; echo"</td></tr>
				
					</tbody></table></div></div></div>";
				
						}
					$sub_total = $total + $ts['jumlah'] ;
				echo"<div class='row-fluid'>
                <div class='span12'>   
                    <div class='block-fluid table-sorting clearfix'>
					<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable' style='font-size: 1.6em;'>
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
									<td colspan='2' align=right style='font-weight:bold; font-size: 1.4em;'> ";echo' Rp. &nbsp'. number_format( $sub_total, 0 , '' , '.' ).''; echo"</td>
								</tr>
								
							</tr>
							
				</table></div></div></div>
				<div class='row-fluid'>
                <div class='span12'>   
                    <div class='block-fluid table-sorting clearfix'>
					<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
					<thead>
						<tr><th colspan=2>Payment Details</th></tr>
					</thead>
					<tbody>
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
					<button onClick="javascript:pdf_checkin('<?php echo "$pdf_checkout?id_reservasi=$id_reservasi";?>');"  class='btn' >PDF</button>
				</div>
			</div>
			<script>
		

/* Popup Image Edit Article */
				function Popup(url) {
						 popupWindow = window.open(
						  url,'popUpWindow','height=350,width=300,left=60,top=10,resizable=yes,scrollbars=yes,toolbar=no, navigation=no, menubar=no,location=no,directories=no,status=Oes')
				}
				
				function pdf_checkin(url) {
						 popupWindow = window.open(
						  url,'popUpWindow','height=650,width=900,left=60,top=10,resizable=yes,scrollbars=yes,toolbar=no, navigation=no, menubar=no,location=no,directories=no,status=Oes')
				}
				
				
/* PRIEVIEW Image Edit Article */
				function HandleFileButtonClick()
                                                          {
                                                                document.image_upload2.image2.click();
                                                                $('#img_prev').show();
                                                          }
		</script>
								<?php echo"</td></tr>
				</tbody></table></div></div></div>";
				
			?>
		<style>
		#modal-container-md_print_checkin, .modal-content, .modal-dialog
{
  height:500px;
  width:900px;
  left:500px;
  overflow:auto;
}
		</style>
		
		<!-- <a data-toggle="modal" href="#modal-container-md_print_checkin" role="button" class="btn" data-toggle="modal">Launch modal</a> -->

<div id="modal-container-md_print_checkin" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="dialog"  aria-hidden="true">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">
         <?php include "print_preview.php"; ?>
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn">Close</a>
          <a href="#" class="btn btn-primary">Save changes</a>
        </div>
      </div>
    </div>
</div>
<?php
			break;
			
		}
		

?>

</body>
</html>