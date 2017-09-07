<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="">
        
        <div class="workplace">
                                    
            <div class="row-fluid">
                <div class="span12">
                    
                    <div class='widgetButtons'>
                       <?php
					   $jmlprod=mysql_num_rows(mysql_query("select * from reservasi where status = 'N' "));
					   ?>                       
                        <div class='bb'>
                            <a href='media.php?page=reservation_request' class='tipb' title='Reservation Request'><span class='ibw-archive'></span></a>
                            <div class='caption red'><?php echo "$jmlprod"; ?></div>
                        </div>
                        
                       <?php
					   $jmlorder=mysql_num_rows(mysql_query("select * from reservasi where status = 'B'"));
					   ?> 
                        <div class='bb gray'>
                            <a href='media.php?page=reservation_approved' class='tipb' title='Reservation Approved'><span class='ibw-calc'></span></a>
                            <div class='caption'><?php echo "$jmlorder"; ?></div>
                        </div>
                        
                       <?php
					   $jmlcus=mysql_num_rows(mysql_query("select * from customer"));
					   ?> 
                        <div class='bb yellow'>
                            <a href='#' class='tipb' title='Total Customer'><span class='ibw-user'></span></a>
                            <div class='caption green'><?php echo "$jmlcus"; ?></div>
                        </div>
                        
                       <?php
					   $jmlkomen=mysql_num_rows(mysql_query("select * from komentar"));
					   ?> 
                        <div class='bb red'>
                            <a href='#' class='tipb' title='Total Member'><span class='ibw-chats'></span></a>
                            <div class='caption blue'><?php echo "$jmlkomen"; ?></div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="row-fluid">

                <div class="span4">                    

                    <div class="wBlock red clearfix">                        
                        <div class="dSpace">
                        <?php
						$sorder=mysql_query("select * from reservasi");
						$torder=mysql_num_rows($sorder);
						
						$sorder1=mysql_query("select * from reservasi where status ='Y'");
						$torder1=mysql_num_rows($sorder1);
						
						$booking=mysql_num_rows(mysql_query("select * from reservasi where status = 'B'"));
						?>
                            <h3>Statistik Reservasi</h3>
                            <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--130,190,260,230,290,400,340,360,390--></span>
                            <span class="number"><?php echo"$torder"; ?></span>                    
                        </div>
                        
                        <div class="rSpace">
                            <span><?php echo"$torder"; ?> <b>Total Reservasi</b></span>
                            <span><?php echo"$torder1"; ?> <b>Check in</b></span>
                            <span><?php echo"$booking"; ?> <b>Booking</b></span>
                        </div>                          
                    </div>                     
                    
                </div>                
                
                <div class="span4">                    
                 <?php
				 $cus=mysql_query("select distinct id_customer from customer")or die(mysql_error());
				 $jcus=mysql_num_rows($cus);
				 
				 $tcus=mysql_query("select * from customer");
				 $tjcus=mysql_num_rows($tcus);
				 
				 $pasif=mysql_num_rows(mysql_query("select * from customer where status = 'C'"));
				 ?>
                    <div class="wBlock green clearfix">                        
                        <div class="dSpace">
                            <h3>Customer</h3>
                            <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--5,10,15,20,23,21,25,20,15,10,25,20,10--></span>
                            <span class="number"><?php echo" $tjcus"; ?> </span>                    
                        </div>
                        <div class="rSpace">
                            <span><?php echo"$tjcus"; ?> <b>Total Customer</b></span>
                            <span><?php echo"$jcus"; ?> <b> Customer Aktif</b></span>
                            <span><?php echo"$pasif"; ?> <b>Customer Pasif</b></span>
                        </div>                          
                    </div>                                                            
                    
                </div>

                <div class="span4">                    
                 <?php
				  // Statistik user
					  // Statistik user
					$qstatistik=mysql_num_rows(mysql_query("select * from statistik "));
					// Apabila modul Statistik diaktifkan Publish=Y, maka tampilkan modul Statistik
					//if ($qstatistik > 0){
					//  echo "<hr color=#e0cb91 noshade=noshade /><br />
					//        <img src='$f[folder]/images/statistik.jpg' /><br />";
					
					  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
					  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
					  $waktu   = time(); // 
					
					  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
					  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
					  // Kalau belum ada, simpan data user tersebut ke database
					  if(mysql_num_rows($s) == 0){
						mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
					  } 
					  else{
						mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
					  }
					
					  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
					  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
					  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
					  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
					  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
					  $bataswaktu       = time() - 300;
					  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));
					
					  $path = "counter/";
					  $ext = ".png";
					
					  $tothitsgbr = sprintf("%06d", $tothitsgbr);
					  for ( $i = 0; $i <= 9; $i++ ){
						   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
					  }
				 ?>				 
                    <div class="wBlock blue clearfix">
                        <div class="dSpace">
                            <h3>Total Hits</h3>
                            <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--240,234,150,290,310,240,210,400,320,198,250,222,111,240,221,340,250,190--></span>
                            <span class="number"><?php echo"$totalpengunjung ";?></span>
                        </div>
                        <div class="rSpace">                                                                           
                            <span><?php echo"$pengunjung ";?><b>Pengunjung Hari ini</b></span>
                            <span><?php echo"$totalpengunjung";?> <b> TotalPengunjung</b></span>
                            <span><?php echo"$pengunjungonline";?> <b>Pengunjung Online</b></span>                                                        
                        </div>
                    </div>                      
                    
                </div>                
            </div>            
            
            <div class="dr"><span></span></div> 
            
            <div class="row-fluid">
                
                <div class="span4">
                    <div class="head clearfix">
                        <div class="isw-archive"></div>
                        <h1>Reservation </h1>
                        <ul class="buttons">        
                            <li class="toggle"><a href="#"></a></li>
                        </ul> 
                    </div>
                    <div class="block-fluid accordion">
              		<h3>Check In</h3>
                        <div>
                            <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                                <thead>
                                    <tr>
                                        <th>Tgl Masuk</th><th>Tgl Keluar</th><th>Total</th><th>Atas Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
								$reservasi_checkin=mysql_query("select * from reservasi  CROSS JOIN customer on reservasi.id_reservasi = customer.id_reservasi
																where reservasi.status = 'Y' limit 3");
                                while($check_in=mysql_fetch_array($reservasi_checkin))
								{
									$date_out= $check_in['date_out'];				
									$date_in =$check_in['date_in'];
									$hari = dateDiff("-",$date_out,$date_in);
								echo"<tr>
                                        <td><span class='date'>".tgl_indo($check_in['date_in'])."</span></td>
                                        <td><span class='date'>".tgl_indo($check_in['date_out'])."</span></td>
										<td><span class='time'>$hari Hari</span></td>
                                        <td><a href='#'>$check_in[first_name] $check_in[last_name] </a></td>
                                    </tr>";
								}
								?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" align="right"><button class="btn btn-small">More...</button></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>                        

                        <h3>Sevices</h3>
                        <div>
                            <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                                <thead>
                                    <tr>
                                        <th width="60">No</th><th>Nama Service</th><th width="60">Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $tampil_service=mysql_query("select * from service order by id_service ASC limit 6");
								$no = 1;
                                while($service=mysql_fetch_array($tampil_service))
								{
                              echo "<tr>
                                        <td><span class='date'>$no</span></td>
										<td><span class='date'>$service[nama_service]</span></td>
										<td><span class='time'>$service[stok]</span></td>";
									
							  echo"</tr>";
							  $no ++;
								}
								?>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" align="right"><button class="btn btn-small">More...</button></td>
                                    </tr>
                                </tfoot>                                
                            </table>                           
                        </div>
                      </div>
                </div>
                <div class="span4">
                    <div class="head clearfix">
                        <div class="isw-time"></div>
                        <h1>Reservation Request</h1>
                        <ul class="buttons">        
                            <li class="toggle"><a href="#"></a></li>
                        </ul> 
                    </div>
                    <div class="block news scrollBox">
                        <div class="scroll-y" style="height: 270px;">
                          <?php 
						  $tampil_request=mysql_query("select * from reservasi CROSS JOIN customer on customer.id_reservasi = reservasi.id_reservasi  where reservasi.status = 'N'");
						  while($request=mysql_fetch_array($tampil_request))
						  { 
							$date_out= $request['date_out'];				
							$date_in =$request['date_in'];
							$hari = dateDiff("-",$date_out,$date_in);
                       echo"<div class='item'>
                                <a href='#'></a>
                                <span class='icon-user'></span><p>$request[first_name] $request[last_name]</br>
									$request[address] $request[state] 
									Tlp.$request[mobile_phone] </br>$request[email]  
								</p>
                                <span class='date'>".tgl_indo($request['date_in'])."</span> - 
                                <span class='date'>".tgl_indo($request['date_in'])."</span></br>
                                <span class='date'>($hari Hari)</span>
                                <div class='controls'>                                   
                                    <a href='#' class='icon-eye-open tip' title='Detail'></a>
                                </div>
                            </div>";
						  }
						  ?>
                        </div>
                    </div>
                </div>                               

                <div class="span4">
                    <div class="head clearfix">
                        <div class="isw-cloud"></div>
                        <h1>Customer</h1>
                        <ul class="buttons">        
                            <li class="toggle"><a href="#"></a></li>
                        </ul> 
                    </div>
                    <div class="block users scrollBox">
                        
                        <div class="scroll" style="height: 270px;">
                     <div class="block messaging"> 
                      <?php
				   $tampilcustomer=mysql_query("select * from customer");
				   while ($customer=mysql_fetch_array($tampilcustomer))
				   {
                   echo"<div class='itemIn'>
                            <a href='#' class='image'><img src='img/users/olga.jpg' class='img-polaroid'/></a>
                            <div class='text'>
                                <div class='info clearfix'>
                                    <span class='name'>$customer[first_name] $customer[last_name] </span>
                                    <span class='date'>$customer[status]</span>
                                </div>  
                               $customer[address] $customer[state] </br>
							   $customer[email]<br>
							   $customer[mobile_phone]
                            </div>
                        </div>";
				    }
                        ?>
						
                    </div>
                        </div>
                        
                    </div>
                </div>                
                
                
            </div>

            <div class="dr"><span></span></div>            

            
            <div class="row-fluid">
                
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-chats"></div>
                        <h1>Room Activity</h1>
                        <ul class="buttons">        
                            <li class="toggle"><a href="#"></a></li>
                        </ul> 
                    </div>
					<div class="scroll" style="height: 400px;">
                    <div class="block messaging">
                      <?php
				   $tampilroom=mysql_query("select * from room, room_kategori where room.id_room_kategori = room_kategori.id_room_kategori");
				   while ($room=mysql_fetch_array($tampilroom))
				   {
                   echo"<div class='itemIn'>
                            <a href='#' class='image'><img src='img/users/key.jpg' class='img-polaroid'/></a>
                            <div class='text'>
                                <div class='info clearfix'>
                                    <span class='name'>$room[nmr_room]</span>
                                    <span class='date'>$room[nama_room_kategori]</span>
                                </div>  
                               $room[status]
                            </div>
                        </div>";
				    }
                        ?>
						
                    </div>
                </div>                
                </div> 
                
        <div class="widget-fluid">
            <div id="menuDatepicker"></div>
        </div>
      </div>            
   <div class="dr"><span></span></div>
        </div>
        
    </div>
</body>
</html>