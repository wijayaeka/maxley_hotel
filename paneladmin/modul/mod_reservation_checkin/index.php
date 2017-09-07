<html>
<body>
<?php 
	$aksi="modul/mod_reservation_checkin/aksi_reservation_checkin.php";
	$pdf_checkin="modul/mod_pdf_checkin/index.php";
	$admin_login = $_SESSION['id_admin'];
	$admin = mysql_fetch_array(mysql_query("select * from admin cross join reservasi on reservasi.id_req = admin.id_admin"));
	switch($_GET[act]){	
		default:
		
						$sql = mysql_query("select * from reservasi
							cross join customer on customer.id_reservasi = reservasi.id_reservasi 
							cross join room_kategori on room_kategori.id_room_kategori = reservasi.id_room_kategori
							where reservasi.status = 'Y'");
					
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
			<tr><th> Nama Customer </th><th>Status</th><th>Check In</th><th>Check Out</th><th>Detail</th></tr>
			</thead>
			<tbody>";
					while($z = mysql_fetch_array($sql))
					{
						echo "<td> $z[first_name] $z[last_name] </td>";
						echo "<td align=center >";

							if( $z[status] == 'Y')
							{
								
								echo"<div id='check_in'> Check In </div>";
											
							}
							else
							{
							
								echo"
								<div id='waiting'> Waiting </div>";
							
							}
						echo"
							</td><td align=center> $z[date_in]</td>
							</td><td align=center> $z[date_out]</td>
							<td align=center>
									<a href='?page=reservation_checkin&act=detail_checkin&id_reservasi=$z[id_reservasi]' class='icon-search' >
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
			case "detail_checkin";
		
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
							<th><a href='?page=reservation_checkin&act=add_extra_time&id_reservasi=$z[id_reservasi]' class='icon-edit' >
								</a>Add  Extra Time</th>
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
								<td><a href='?page=reservation_checkin&act=change_room&id_reservasi=$dr[id_reservasi]&id_room=$dr[id_room]' class='icon-edit' >
								</a>Change Room
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
								<tr><th style='text-align:center;'>
								<input type='checkbox' name='checkbox'/></th><th>Service Type</th><th>Price</th><th>Amount</th>
								<th style='width:1%;'>
									<a href='?page=reservation_checkin&act=add_service&id_reservasi=$z[id_reservasi]' class='icon-edit' >
								</a>Add Service</th>
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
							<th style='width:1%;'><a href='?page=reservation_checkin&act=add_service&id_reservasi=$z[id_reservasi]' class='icon-edit' >
								</a>Add Service</th>
						</tr>
					</thead>
					<tbody>";
							while($sr = mysql_fetch_array($cari_service))
								{
								echo"<tr>
								<td align=center><input type='checkbox' name='checkbox'/></td>
								<td>$sr[nama_service]</td>
								<td>"; echo'Rp. '. number_format( $sr['harga'], 0 , '' , '.' ).''; echo"</td>
								<td>";
								?>
										<a href="<?php echo"$aksi?page=reservation_checkin&act=delete_service&id_detail_reservasi_service=$sr[id_detail_reservasi_service]" ?>" onClick="return confirm('Anda yakin akan menghapus service ini?');" class='icon-remove'></a>
									<?php echo" 
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
						echo"
						<form action='$aksi?page=reservation_checkin&act=checkout'  method='post'>
							<input type='hidden' name='id_reservasi' value='$id_reservasi' />
							<input type='submit' class='btn' value='Checkout'> </button>
						</form>"; ?>
					<button onClick="window.open('?page=reservation_checkin', '_self')" class='btn'>Cancel</button>
					<button onClick="javascript:pdf_checkin('<?php echo "$pdf_checkin?id_reservasi=$id_reservasi";?>');"  class='btn' >PDF</button>
				</div>
			</div>
			<script>
		

/* Popup Image Edit Article */
				function Popup(url) {
						 popupWindow = window.open(
						  url,'popUpWindow','height=350,width=300,left=60,top=10,resizable=yes,scrollbars=yes,toolbar=no, navigation=no, menubar=no,location=no,directories=no,status=yes')
				}
				
				function pdf_checkin(url) {
						 popupWindow = window.open(
						  url,'popUpWindow','height=650,width=900,left=60,top=10,resizable=yes,scrollbars=yes,toolbar=no, navigation=no, menubar=no,location=no,directories=no,status=yes')
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
			
			case "add_service";
						$id_reservasi = $_GET['id_reservasi'];
						$data_service = mysql_query("select * from service");
						$no = 1;
						echo "<form action='$aksi?page=reservation_checkin&act=input_service' method='post'>
							<input type='hidden' name='id_reservasi' value='$id_reservasi' />
							<div class='workplace'>
								<div class='row-fluid'>
								<div class='span12'>                    
									<div class='head clearfix'>
										<div class='isw-user'></div>
										<h1>Services</h1>                               
									</div>
								<div class='block-fluid table-sorting clearfix'>
								<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
								<thead>	<tr ><th style='text-align:center; width:1%'>No</th>
										<th style='text-align:center;'>Service</th>
										<th style='text-align:center;'>Harga</th>
										<th style='text-align:center;'>Aksi</th>
										<th></th>
									</tr>
								<thead>
								<tbody>";?>
												<?php
												while($x = mysql_fetch_array($data_service))
												{
													echo "
														<tr><td align='center'>$no</td>
														<td>$x[nama_service]</td>
														<td  align='center'>"; echo'Rp. '. number_format( $x['harga'], 0 , '' , '.' ).''; echo"</td>
														<td align='center'><input type='checkbox' name='service[]' value='$x[id_service]' id='id_service'  $key /></td>
														<td></td>
														</tr>";						
													$no++;
												}
								echo"</tbody></table>
								<input type='submit' class='btn' name='submit' value='Add Service'>
								<input type='button' class='btn' name='submit' value='Cancel'  onclick='history.back()'>
								</div></div></div></form>";
			
			break;
			case "customer_update";
						$id_reservasi = $_GET['id_reservasi'];
						$customer = mysql_query("select * from customer where id_reservasi = '$id_reservasi' ");
						$c = mysql_fetch_array($customer);
						echo "
						<form method='post' style=' padding:20px 20px;' action='$aksi?page=reservation_checkin&act=update_customer'   name='form_customer' id='form_customer'  class='form_customer'>
						<div class='workplace form'>
							<div class='row-fluid'>
								<div class='span6'>
								  <div class='block-fluid'>                        
									<div class='head clearfix'>
										<div class='isw-favorite'></div>
											<h1>Input Admin Baru</h1>
									</div>    <input type='hidden' name='id_reservasi' value='$id_reservasi' />
									<div class='row-form clearfix'>
										<div class='span3'>Title :</div>
											<div class='span5'>	
										<select name='title' class='easyui-validatebox' required='true' >";
									echo "<option value= '$c[title]'> $c[title] </option>
											<option  value='mr'>Mr</option>
											<option  value='mrs'>Mrs</option>
											<option  value='ms'>Ms</option>
										</select>
											</div>	
										</div>	
										<div class='row-form clearfix'>
										<div class='span3'>First Name :</div>
											<div class='span5'>
										<input type='text' class='easyui-validatebox' required='true'  value='$c[first_name]' id='first_name' name='first_name' />
										</div>
										</div>
										<div class='row-form clearfix'>
										<div class='span3'>Last Name :</div>
											<div class='span5'>
										<input type='text' class='easyui-validatebox' required='true' value='$c[last_name]'  id='last_name' name='last_name' />
											</div>
										</div>
										<div class='row-form clearfix'>
										<div class='span3'>Address :</div>
											<div class='span5'>
										<textarea name='address' id='address' class='easyui-validatebox' required='true' style='width:250px; font-size: 12px; height:100px; padding: 10px 10px;'>
										 $c[address]
										</textarea></div></div>
											<div class='row-form clearfix'>
										<div class='span3'>City :</div>
											<div class='span5'>
										<input type='text' class='easyui-validatebox' required='true' value='$c[city]'  id='city' name='city' />
										</div>
										</div>
										<div class='row-form clearfix'>
										<div class='span3'>State :</div>
											<div class='span5'>
										<input type='text' class='easyui-validatebox' required='true'  value='$c[state]'  id='state' name='state' />
										</div>
										</div>
										<div class='row-form clearfix'>
										<div class='span3'>Postal Code :</div>
											<div class='span5'>
										<input type='text' class='easyui-validatebox' required='true'  value='$c[postal_code]' id='postal_code' name='postal_code' />
										</div>
										</div>
										<div class='row-form clearfix'>
										<div class='span3'>Country :</div>
											<div class='span5'>
										<input type='text' class='easyui-validatebox' required='true'  value='$c[country]'  id='country' name='country' />
										</div>
										</div>
										<div class='row-form clearfix'>
										<div class='span3'>Mobile Phone :</div>
											<div class='span5'>
										<input type='text' class='easyui-validatebox' required='true'  value='$c[mobile_phone]'  id='mobile_phone' name='mobile_phone' />
										</div>
										</div>
										<div class='row-form clearfix'>
										<div class='span3'>Home Phone :</div>
											<div class='span5'>
										<input type='text'   value='$c[home_phone]'  id='home_phone' name='home_phone' />
										</div>
										</div>
										<div class='row-form clearfix'>
										<div class='span3'>Email :</div>
											<div class='span5'>
										<input type='text' class='easyui-validatebox' required='true' value='$c[email]'   id='email' name='email' />
										</div>
										</div>
										<div class='row-form clearfix'>
											<div class='span5'>
										<input type='submit'   class='btn' value='Update' />
										<input type='button' class='btn' value='Cancel' onclick='history.back()'>
										</div>
										</div>
						</div></div></div>
					  </form>
					 ";
			break;
			case "add_extra_time";
						?>
						<script>
						
						
						$(function() 
							{
								$( "#datepicker3" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
							});
						
						

						function valid_date()
								{
									   var date_out = document.getElementById('date_out').value;
									   var extra = document.getElementById('datepicker3').value;
									   var price =  document.getElementById('price').value;
									   
									   var dt1 = new Date(date_out);
									   var dt2 = new Date(extra);
									   var date_out_regex =  dt1.getTime();
									   var extra_regex =  dt2.getTime();
									   
									   
									    var diff = extra_regex - date_out_regex ;
										var days = diff/(1000 * 60 * 60 * 24);
										<?php $query = mysql_query("select * from room_kategori");
												$r = mysql_fetch_array($query);?>
										var total = <?php echo $r['harga'];?> * days;
										
									   if ( extra_regex < date_out_regex)
										{
											alert('Kesalahan Data Extra Time')
											document.getElementById('error1').innerHTML = "";
											document.getElementById('datepicker3').value='';
											
										}
										else
										{
												// alert('Ok')
												document.getElementById('error1').innerHTML = "You Add " +days+" Days Rp." +total;
												document.getElementById('new_price').value= total;
										
										}
									   return false;
								}
					</script>						
						<?php
						$id_reservasi = $_GET['id_reservasi'];
						$reservation = mysql_query("select * from reservasi where id_reservasi = '$id_reservasi' ");
						$rs = mysql_fetch_array($reservation);
						echo "
						<form method='post' style=' padding:20px 20px;' action='$aksi?page=reservation_checkin&act=add_extra_time'  name='form_reservation_detail' id='form_reservation_detail'  class='form_customer'>
						<div class='workplace'>
						<div class='row-fluid'>
							<div class='span6'>
							  <div class='block-fluid'>                        
								<div class='head clearfix'>
									<div class='isw-favorite'></div>
										<h1>Add Extra Time</h1>
								</div>    
									<input type='hidden' name='id_reservasi' value='$id_reservasi' />
										<input type='hidden' id='price' name='price' value='$rs[price]' />
										<input type='hidden' id='new_price' name='new_price'  />
								<div class='row-form clearfix'>
								<div class='span3'>Date :</div>
								<div class='span5'>
										<input type='text' class='text' style='display:inline; width:80px;' id='date_in' name='date_in' class='easyui-validatebox' required='true'  
											value='$rs[date_in]' style='width:100px;' disabled >
										s/d
										<input type='text' class='text' style='display:inline; width:80px;' id='date_out' name='date_out' class='easyui-validatebox' required='true'  
											value='$rs[date_out]' style='width:100px;' disabled >
								</div></div>
								<div class='row-form clearfix'>
								<div class='span3'>Extra Time :</div>
								<div class='span5'>
										<input type='text' class='text' id='datepicker3' name='extra_time' class='easyui-validatebox' onchange='valid_date()'  required='true' style='width:100px;'>
										<div name='error' id='error' ><p name='error1' id='error1' style='left: 200px; color:blue; font-size: 1em; display:inline; font-weight:bold; padding:5px 5px;'></div>	
								</div>
								</div>
								<div class='row-form clearfix'>
								<div class='span5'>
								<input type='submit'   class='btn' value='Update' />
								<input type='button' class='btn' value='Cancel' onclick='history.back()'>
							</div></div>
							</div>
							</div>
							</div>
							</div>
					  </form>
					 ";
			break;
			
			case "change_room";
						$id_reservasi = $_GET['id_reservasi'];
						$id_room = $_GET['id_room'];
						$room = mysql_query("select * from reservasi
											CROSS JOIN detail_reservasi_room on reservasi.id_reservasi = detail_reservasi_room.id_reservasi
											CROSS JOIN room on  detail_reservasi_room.id_room =room.id_room
											where room.id_room = '$id_room' AND reservasi.id_reservasi = '$id_reservasi'");
						$r= mysql_fetch_array($room);
						echo "
						<div class='workplace'>
						<div class='row-fluid'>
							<div class='span6'>
							  <div class='block-fluid'>                        
								<div class='head clearfix'>
									<div class='isw-favorite'></div>
										<h1>Change Room</h1>
								</div>    
						<div class='row-form clearfix'>
								<div class='span3'>From :</div>
								<div class='span5'> $r[nmr_room]
								</div>
						</div>
						<form method='post' action='$aksi?page=reservation_checkin&act=change_room'   name='form_reservation_detail' id='form_reservation_detail'  class='form_customer'>
								
								<div class='row-form clearfix'>
								<div class='span3'>To :</div>
								<div class='span5'>";
								$room_lama = mysql_fetch_array(mysql_query("select * from room where id_room = '$id_room' "));
									$sql_room = mysql_query("select * from room where id_room != $id_room AND id_room_kategori = '$room_lama[id_room_kategori]' and status = 'Y'  ");
											echo "
											<label> To : </label>
											<div style='width:300px; height:150px; border:1px solid #ddd; padding:30px 30px;'>";
												//<select style='width:180px; margin-top: -1px;' name='new_room' class='easyui-validatebox' required='true'>" ;
														while($y=mysql_fetch_array($sql_room))		
																{
																	// echo "<option value='$y[nmr_room]'>$y[nmr_room]</option>";
																	echo "<input type=radio name='new_room' id='new_room' value='$y[id_room]' $key /> $y[nmr_room]
																			&nbsp &nbsp &nbsp";
																}
														echo"</div>";
														// echo"</select>";			
									echo"</div></div>
									<div class='row-form clearfix'>
								<div class='span3'></div>
								<div class='span5'>
								<input type='hidden' name='id_reservasi' value='$id_reservasi' />
								<input type='hidden' name='room_before' value='$r[id_room]' />
								<input type='submit' class='btn'  value='Update' />
								<input type='button' class='btn' value='Cancel' onclick='history.back()'>
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>
					  </form>";
					
			break;
		}
		

?>

</body>
</html>