<?php
include "../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];

if ($page == 'reservation_checkin' AND $act =='checkout')
		{
		$id_reservasi = $_POST["id_reservasi"];
		$detail_reservasi_room  = mysql_query("select * from detail_reservasi_room where id_reservasi = '$id_reservasi' ");
	
		while ( $r = mysql_fetch_array($detail_reservasi_room))
			{
				mysql_query("UPDATE room  SET status = 'Y' where id_room = '$r[id_room]'");
						
			}
				mysql_query("UPDATE reservasi SET status = 'O' where id_reservasi = '$id_reservasi'");
				header('location:../../media.php?page='.$page);
		}
	else if ($page == "reservation_checkin" AND $act == "update_customer")
		{
		
			$id_reservasi = $_POST['id_reservasi'];
			$title = $_POST['title'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$postal_code = $_POST['postal_code'];
			$country = $_POST['country'];
			$mobile_phone = $_POST['mobile_phone'];
			$home_phone = $_POST['home_phone'];
			$email = $_POST['email'];
			
			mysql_query("update customer SET title ='$title', 
											first_name = '$first_name', 
											last_name = '$last_name', 
											address = '$address', 
											city = '$city', 
											state = '$state', 
											postal_code = '$postal_code', 
											country = '$country', 
											mobile_phone = '$mobile_phone', 
											home_phone = '$home_phone', 
											email = '$email' 
											where id_reservasi = '$id_reservasi' ");
			header("location:../../media.php?page=".$page."&act=detail_reservasi_checkin&id_reservasi=$id_reservasi");
		
		}
	else if ($page == "reservation_checkin" AND $act == "add_extra_time")
		{
		
			$id_reservasi = $_POST['id_reservasi'];
			$new_price = $_POST['new_price'];
			$extra_time = $_POST['extra_time'];
			
			
			$harga_lama = mysql_fetch_array(mysql_query("select  * from reservasi where id_reservasi = '$id_reservasi'"));
			$harga = $new_price + $harga_lama['price'];
			
			mysql_query("update reservasi SET date_out ='$extra_time' where id_reservasi = '$id_reservasi' ");
			header("location:../../media.php?page=".$page."&act=detail_checkin&id_reservasi=$id_reservasi");
		
		}
	
	else if ($page == "reservation_checkin" AND $act == "input_service")
			{
						
						$service=$_POST['service'];
						$id_reservasi = $_POST['id_reservasi'];
						$id_service = $_POST['id_service'];
								while (list($key,$val)= each($service))
									{
										mysql_query("insert into detail_reservasi_service (id_reservasi, id_service)values('$id_reservasi','$val')");
									}
								
										mysql_query("UPDATE service  SET stok - 1 where id_reservasi = '$id_reservasi'");
										$kueri = mysql_query($sql);
										header("location:../../media.php?page=".$page."&act=detail_checkin&id_reservasi=$id_reservasi");
			}
	else if ($page == "reservation_checkin" AND $act == "change_room")
			{
				$id_reservasi = $_POST['id_reservasi'];		
				$room_before = $_POST['room_before'];		
				$new_room = $_POST['new_room'];		
						
				mysql_query("UPDATE detail_reservasi_room  SET id_room = '$new_room' where id_room = '$room_before' AND id_reservasi = '$id_reservasi'");
				mysql_query("UPDATE room  SET status = 'Y' where id_room = '$room_before'");
				mysql_query("UPDATE room  SET status = 'N' where id_room = '$new_room'");
						
										header("location:../../media.php?page=".$page."&act=detail_checkin&id_reservasi=$id_reservasi");
			}
	else if ($page =="reservation_checkin" AND $act =="delete_service")
			{
					$id_detail_reservasi_service=$_GET['id_detail_reservasi_service'];
					mysql_query("DELETE FROM detail_reservasi_service where id_detail_reservasi_service = '$id_detail_reservasi_service'");
					header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
?>