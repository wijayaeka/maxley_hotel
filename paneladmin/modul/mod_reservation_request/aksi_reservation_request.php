<?php
error_reporting(0);

include "../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];
$page2="reservation_approved";
	

if ($page == 'reservation_request' AND $act =='approve')
		{
		$id_reservasi = $_POST["id_reservasi"];
		
	
		if ($_POST["cancel"])
			{		
						
						$id_checkin = $_POST['id_checkin'];
						$detail_reservasi_room  = mysql_query("select * from detail_reservasi_room where id_reservasi = '$id_reservasi' ");
	
							while ( $r = mysql_fetch_array($detail_reservasi_room))
								{
									mysql_query("UPDATE room  SET status = 'Y' where id_room = '$r[id_room]'");
											
								}
								mysql_query("DELETE FROM reservasi where id_reservasi = '$id_reservasi'");
								mysql_query("DELETE FROM  detail_reservasi_room  where id_reservasi = '$id_reservasi'");
								mysql_query("DELETE FROM  customer  where id_reservasi = '$id_reservasi'");
								// mysql_query("UPDATE customer SET status = 'C' where id_reservasi = '$id_reservasi'");
								
								header('location:../../media.php?page='.$page2);
								
								echo $id_reservasi;
			}
		else if($_POST["save"])
			{
				$amount = $_POST['amount'];
				$box=$_POST['room'];
				$jumlah_cek = count($box);
				$id_app = $_POST["id_app"];
				if( $amount != $jumlah_cek)
					{
						?>
							<script> alert("Data Kamar Salah");   window.history.back();</script>
						<?php
					}
				
				else{
						
						while (list($key,$val)= each($box))
							{
								
							
								mysql_query("insert into detail_reservasi_room (id_reservasi, id_room)values('$id_reservasi','$val')");
								mysql_query("UPDATE room  SET status = 'B' where id_room = '$val'");
							}
						
								mysql_query("UPDATE reservasi SET status = 'B'  , id_app = '$id_app' where id_reservasi = '$id_reservasi'");
								mysql_query("UPDATE customer SET status = 'Y' where id_reservasi = '$id_reservasi'");
								header('location:../../media.php?page='.$page2."&act=detail_reservasi_approved&id_reservasi=$id_reservasi");
								
					
					}
			}
		}
else if ($page = "reservation_request" AND $act = "change_room_request")
	{
		$id_reservasi = $_POST['id_reservasi'];
		$id_room_kategori = $_POST['room_kategori'];
		$room_amount = $_POST['room_amount'];
		$date_in = $_POST['date_in'];
		$date_out = $_POST['date_out'];
		
		
		$sql_harga = mysql_fetch_array(mysql_query("select * from room_kategori where id_room_kategori = '$id_room_kategori' "));
		$harga = $sql_harga['harga'];
		$price =  $harga * $room_amount;
		
		// echo $price;
			if (empty($date_in) AND  empty($date_out) )
				{
				
					mysql_query(" UPDATE reservasi set room_amount = '$room_amount', price='$price', id_room_kategori = '$id_room_kategori' where id_reservasi = '$id_reservasi' ");
				
				}
				
			else if (empty($date_in))
				{
				
				
				mysql_query(" UPDATE reservasi set room_amount = '$room_amount',  date_out = '$date_out' ,id_room_kategori = '$id_room_kategori', price='$price' where id_reservasi = '$id_reservasi' ");
				
				}
			else if (empty($date_out))
				{
				
				
				mysql_query(" UPDATE reservasi set room_amount = '$room_amount',  date_in = '$date_in' ,id_room_kategori = '$id_room_kategori', price='$price' where id_reservasi = '$id_reservasi' ");
				
				}
			
			else {
			
					mysql_query(" UPDATE reservasi set room_amount = '$room_amount', date_in = '$date_in', date_out = '$date_out' ,id_room_kategori = '$id_room_kategori', price='$price' where id_reservasi = '$id_reservasi'");
			
			
				 }
				 header("location:../../media.php?page=reservation_request&act=detail_reservasi&id_reservasi=$id_reservasi");
	}
?>