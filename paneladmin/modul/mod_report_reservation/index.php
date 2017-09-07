<script>$(function() {
$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
$( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
});
</script>	
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
<?php 

include "config/libchart/classes/libchart.php";
	
		function StyleId() { 
					$create = strtoupper(md5(uniqid(rand(),true))); 
					$style = 
						substr($create,0,8);
					return $style;
				}
				// End of function

				$id_reservasi = StyleId();
				
		include "../config/connect.php";
		$pdf_report="modul/mod_pdf_report/index.php";
	$aksi="modul/mod_reservation_manual/aksi_reservation_manual.php";
	switch($_GET[act]){	
		default:
						echo "<form method='post' style='margin-top:-50px;'   name='form_category' id='form_category'  class='form_category'>
								<div class='workplace form'>
								<div class='row-fluid'>
									<div class='span6'>
									  <div class='block-fluid'>                        
										<div class='head clearfix'>
											<div class='isw-favorite'></div>
												<h1>Report</h1>
										</div>    	
										<div class='row-form clearfix'>
										<div class='span1'>Date :</div>
											<div class='span5'>
										<input type='text' class='text'  id='datepicker' name='date1' class='easyui-validatebox' required='true' style='width:100px;' >
										<br>TO<br>
										<input type='text' class='text'  id='datepicker2' name='date2' class='easyui-validatebox' required='true' style='width:100px;'  >
										</div></div>
								<div class='row-form clearfix'>
								<div class='span5'>
										<input type='submit'   name='submit' value='Ok' class='btn' />
								</div>
								</div>
					  </form></div></div></div></div>";
		break;
		
		}
	
	IF (ISSET($_POST['submit']))
		{
			
			$admin_request = mysql_fetch_array(mysql_query("select * from reservasi CROSS JOIN admin on reservasi.id_req = admin.id_admin where reservasi.id_reservasi = '$id_reservasi' "));
			$admin_app = mysql_fetch_array(mysql_query("select * from reservasi CROSS JOIN admin on reservasi.id_app = admin.id_admin  where reservasi.id_reservasi = '$id_reservasi' "));
			$admin_checkin = mysql_fetch_array(mysql_query("select * from reservasi CROSS JOIN admin on reservasi.id_checkin = admin.id_admin  where reservasi.id_reservasi = '$id_reservasi' "));
			
			$tanggal_awal = $_POST['date1'];
			$tanggal_akhir = $_POST['date2'];
	
			$sql_room = mysql_query("select * from reservasi 
									cross join customer on customer.id_reservasi = reservasi.id_reservasi 
									WHERE reservasi.date_out between '$tanggal_awal' and '$tanggal_akhir' 
									AND reservasi.status = 'Y' ORDER BY reservasi.date_out desc ");
			$total_reservasi = mysql_fetch_array(mysql_query("select sum(price) as jumlah , room_amount FROM  reservasi 
																CROSS JOIN room_kategori on reservasi.id_room_kategori = room_kategori.id_room_kategori
																WHERE reservasi.date_out between '$tanggal_awal' and '$tanggal_akhir' AND reservasi.status = 'Y'  ORDER BY reservasi.date_out desc"));
			//echo $total_reservasi['jumlah'];
				echo "
				<div class='workplace form'>
					<div class='row-fluid'>
						<div class='span12'>
						  <div class='block-fluid'>                        
							<div class='head clearfix'>
									<div class='isw-favorite'></div>
									<h1>Report</h1>
							</div>    
					FROM : <br>
					$tanggal_awal &nbsp &nbsp TO &nbsp &nbsp $tanggal_akhir
					<div class='workplace'>
						<div class='row-fluid'>
							<div class='span12'>                    
								<div class='head clearfix'>
									<div class='isw-user'></div>
									<h1>Customer Detail</h1>                               
								</div>
								<div class='block-fluid table-sorting clearfix'>
									<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped'>
						<thead>
							<tr><th >No</th><th >Name </th><th> DATE IN </th><th >DATE OUT</th><th >ROOM AMOUNT</th><th >PRICE</th></tr>
						</thead>
						<tbody>";
						$no = 1;
						while ($rs = mysql_fetch_array($sql_room))
							{
								echo "<tr>
											<td align='center'>$no</td>
											<td style='width:200px;' align='left'>$rs[first_name] $rs[last_name]</td>
											<td align=center>$rs[date_in]</td>
											<td align=center>$rs[date_out]</td>
											<td align=center>$rs[room_amount]</td>
											<td align=center>"; echo' Rp. &nbsp'. number_format( $rs['price'], 0 , '' , '.' ).''; echo"</td>
											
									</tr>
								";
								$no++;
							}
							
					echo"<tr>
							<td colspan=5 style='background:#e87671; padding-right:150px; font-weight:bold; font-size:1.1em;' align=right>
									TOTAL :
							</td>
							<td align='center' style='background:#e87671; font-weight:bold; font-size:1.1em; text-align:center;' >"; 
									echo' Rp. &nbsp'. number_format( $total_reservasi['jumlah'], 0 , '' , '.' ).''; echo"
							</td>
						</tr>
					</tbody></table></div></div></div></div>";			
			/* ROOM Executive*/
						$room_executive = mysql_query("select * from room where id_room_kategori = '1'");
						$chart = new VerticalBarChart();
						$dataSet = new XYDataSet();
							while($r = mysql_fetch_array($room_executive))
								{
									$detail = mysql_query("select  count(id_room) as jumlah  from detail_reservasi_room 
															cross join reservasi on reservasi.id_reservasi = detail_reservasi_room.id_reservasi 
															where detail_reservasi_room.id_room = '$r[id_room]' AND date_out between '$tanggal_awal' and '$tanggal_akhir' 
															AND reservasi.status = 'Y' ORDER BY date_out desc ");
									$x = mysql_fetch_array($detail);
									$dataSet->addPoint(new Point("$r[nmr_room]", $x['jumlah']));
								}
					// $dataSet->addPoint(new Point("Jan 2005", 873));
					$chart->setDataSet($dataSet);

					$chart->setTitle("Room EXECUTIVE Used Record ");
					$chart->render("chart/chart_executive.png");
					?>
					<div class='row-form span7'>
					<div class='block-fluid'>  
					<div class='head clearfix'>
								<div class='isw-favorite'></div>
									<h1>Executive Room</h1>
					</div> 
					<img alt="Vertical bars chart" src="chart/chart_executive.png" style="border: 1px solid gray;"/>
					</div>
					</div>
			
	<?php
		/* ROOM Superior*/
				$room_superior = mysql_query("select * from room where id_room_kategori = '3'");
						$chart2 = new VerticalBarChart();
						$dataSet2 = new XYDataSet();
							while($s = mysql_fetch_array($room_superior))
								{
									$detail2 = mysql_query("select  count(id_room) as jumlah  from detail_reservasi_room 
															cross join reservasi on reservasi.id_reservasi = detail_reservasi_room.id_reservasi 
															where detail_reservasi_room.id_room = '$s[id_room]' AND date_out between '$tanggal_awal' and '$tanggal_akhir' ORDER BY date_out desc ");
									$p = mysql_fetch_array($detail2);
									$dataSet2->addPoint(new Point("$s[nmr_room]", $p['jumlah']));
								}
					// $dataSet->addPoint(new Point("Jan 2005", 873));
					$chart2->setDataSet($dataSet2);

					$chart2->setTitle("Room SUPERIOR Used Record ");
					$chart2->render("chart/chart_superior.png");
					?>
					<div class='row-form span7'>
					<div class='block-fluid'>  
					<div class='head clearfix'>
								<div class='isw-favorite'></div>
									<h1>Superior Room</h1>
					</div> 
					<img alt="Vertical bars chart" src="chart/chart_superior.png"/>	
					</div>
					</div>
					
					<?php
					
					
					
					
						$service = mysql_query("select * from detail_reservasi_service  
													CROSS JOIN service on detail_reservasi_service.id_service = service.id_service 
													CROSS JOIN reservasi on detail_reservasi_service.id_reservasi = reservasi.id_reservasi
													WHERE reservasi.date_out between '$tanggal_awal' and '$tanggal_akhir' 
													AND reservasi.status = 'Y' ORDER BY reservasi.date_out desc ");
					
						echo"
						<div class='workplace'>
							<div class='row-fluid'>
								<div class='span12'>                    
									<div class='head clearfix'> 
											<h1>Services</h1>	
									</div>
									<div class='block-fluid table-sorting clearfix'>
										<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' >
								<thead><tr><th style='text-align:center;'>No</th><th>Service Type</th><th>Price</th></tr></thead>
								<tbody>";
									$no2 = 1;
									while($sr = mysql_fetch_array($service))
										{
										echo"<tr>
										<td align=center>$no2</td>
										<td>$sr[nama_service]</td>
										<td>"; echo'Rp. '. number_format( $sr['harga'], 0 , '' , '.' ).''; echo"</td>";
									echo"</tr>";
										$no2++;
										}
											
								$total_service = mysql_query("select sum(harga) as jumlah FROM  service 
														CROSS JOIN detail_reservasi_service on detail_reservasi_service.id_service = service.id_service
														CROSS JOIN reservasi on detail_reservasi_service.id_reservasi = reservasi.id_reservasi
														WHERE reservasi.date_out between '$tanggal_awal' and '$tanggal_akhir' 
														AND reservasi.status = 'Y' ORDER BY reservasi.date_out desc ");
										$ts = mysql_fetch_array($total_service);
							echo"	<tr>
										<td colspan=2 style='background:#e87671; padding-right:150px; font-weight:bold; font-size:1.1em;' align=right>
											TOTAL :</td>
										<td style='background:#e87671; padding-right:150px; font-weight:bold; font-size:1.1em;' >"; 
											echo' Rp. &nbsp'. number_format( $ts['jumlah'], 0 , '' , '.' ).''; echo"
										</td>
									</tr>
						
								</tbody></table></div></div></div></div>";
					
					$customer_checkin = mysql_query("select * from customer  
													CROSS JOIN reservasi on customer.id_reservasi = reservasi.id_reservasi
													WHERE customer.status = 'Y' 
													AND reservasi.status = 'Y' AND reservasi.date_out between '$tanggal_awal' and '$tanggal_akhir' ORDER BY reservasi.date_out desc ");
					
						echo"<div class='workplace'>
								<div class='row-fluid'>
									<div class='span12'>                    
										<div class='head clearfix'>
											<div class='isw-user'></div>  
									<h1>Customer</h1>											
										</div>
										<div class='block-fluid table-sorting clearfix'>
											<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped'>
									<thead><tr><th style='text-align:center;'>No</th><th>Nama Customer</th><th>Mobile Phone</th><th>Home Phone</th><th>Email</th></tr></thead>
									<tbody>";
									$no2 = 1;
									while($sr = mysql_fetch_array($customer_checkin))
										{
										echo"<tr>
										<td align=center>$no2</td>
										<td>$sr[first_name] $sr[last_name]</td>
										<td>$sr[mobile_phone]</td>
										<td>$sr[home_phone]</td>
										<td> $sr[email]</td>
										
										</tr>";
										$no2++;
										}
								echo"</tbody></table></div></div></div></div>";
								
						$customer_cancel = mysql_query("select * from customer  
													CROSS JOIN reservasi on customer.id_reservasi = reservasi.id_reservasi
													WHERE customer.status = 'C' 
													AND reservasi.status = 'C' AND reservasi.date_out between '$tanggal_awal' and '$tanggal_akhir' ORDER BY reservasi.date_out desc ");
					
						echo"<div class='workplace'>
									<div class='row-fluid'>
										<div class='span12'>                    
											<div class='head clearfix'>
												<div class='isw-user'></div>
													<h1>Customer Cancel</h1>	                         
											</div>
											<div class='block-fluid table-sorting clearfix'>
									<table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped'>
									<thead>
									<tr><th style='text-align:center;'>No</th><th>Nama Customer</th><th>Mobile Phone</th><th>Home Phone</th><th>Email</th></tr>
									</thead>
									<tbody>";
									$no2 = 1;
									$total = $total_reservasi['jumlah'] + $ts['jumlah']; 
									while($cc = mysql_fetch_array($customer_cancel))
										{
										echo"<tr>
										<td align=center>$no2</td>
										<td>$cc[first_name] $cc[last_name]</td>
										<td>$cc[mobile_phone]</td>
										<td>$cc[home_phone]</td>
										<td> $cc[email]</td>
										
										</tr>";
										$no2++;
										}
								echo"</tbody></table> </div></div></div></div>";
							echo"<table id='table_checkin' class='table table-bordered' style='font-size: 1.6em;'>
					
							<tr>
								<tr>
									<td colspan='3' align=right style='font-weight:bold;'>Sub Total</td>
									<td colspan='2' align=right style='font-weight:bold; font-size: 1.4em;'>";echo' Rp. &nbsp'. number_format( $total, 0 , '' , '.' ).''; echo"</td>
								</tr>
								<tr>
									<td colspan='3'  align=right style='font-weight:bold;'>Tax (%)</td>
									<td colspan='2' align=right style='font-weight:bold; font-size: 1.4em;'> 0 %</td>
								</tr>
								<tr>
									<td colspan='3'  align=right style='font-weight:bold;'>Grand Total</td>
									<td colspan='2' align=right style='font-weight:bold; font-size: 1.4em;'> ";echo' Rp. &nbsp'. number_format( $total, 0 , '' , '.' ).''; echo"</td>
								</tr>
								
							</tr>
							
				</table>";
				?>
		<button class='btn' onClick="javascript:pdf_checkin('<?php echo "$pdf_report?tanggal_awal=$tanggal_awal&tanggal_akhir=$tanggal_akhir&";?>');"	>PDF</button>
		<?php 
				echo"</div></div></div></div>";
					
		}
		
		

?>