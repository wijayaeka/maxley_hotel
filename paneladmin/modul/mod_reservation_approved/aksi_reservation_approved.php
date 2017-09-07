<?php
include "../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];
		
		if ($page == "reservation_approved" AND $act == "checkin")
			{
				
				if( $_POST['save'])
					{
						$id_reservasi = $_POST['id_reservasi'];
						$id_checkin = $_POST['id_checkin'];
						$detail_reservasi_room  = mysql_query("select * from detail_reservasi_room where id_reservasi = '$id_reservasi' ");
	
							while ( $r = mysql_fetch_array($detail_reservasi_room))
								{
									mysql_query("UPDATE room  SET status = 'N' where id_room = '$r[id_room]'");
											
								}
								mysql_query("UPDATE reservasi SET status = 'Y' , id_checkin = '$id_checkin' where id_reservasi = '$id_reservasi'");
								mysql_query("UPDATE customer SET status = 'Y' where id_reservasi = '$id_reservasi'");
								
								header('location:../../media.php?page='.$page);
					}
					
				else if ($_POST["cancel"])
					{
						$id_reservasi = $_POST['id_reservasi'];
						$id_checkin = $_POST['id_checkin'];
						$detail_reservasi_room  = mysql_query("select * from detail_reservasi_room where id_reservasi = '$id_reservasi' ");
	
							while ( $r = mysql_fetch_array($detail_reservasi_room))
								{
									mysql_query("UPDATE room  SET status = 'Y' where id_room = '$r[id_room]'");
											
								}
								mysql_query("UPDATE reservasi SET status = 'C' where id_reservasi = '$id_reservasi'");
								mysql_query("DELETE FROM  detail_reservasi_room  where id_reservasi = '$id_reservasi'");
								mysql_query("DELETE FROM  detail_reservasi_service  where id_reservasi = '$id_reservasi'");
								mysql_query("UPDATE customer SET status = 'C' where id_reservasi = '$id_reservasi'");
								
								header('location:../../media.php?page='.$page);
					}
				
						
			}
		
				
		else if ($page == "reservation_approved" AND $act == "input_service")
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
										header("location:../../media.php?page=".$page."&act=detail_reservasi_approved&id_reservasi=$id_reservasi");
			}
			
		else if ($page =="reservation_approved" AND $act =="delete_service")
			{
						
					$id_detail_reservasi_service=$_GET['id_detail_reservasi_service'];
					mysql_query("DELETE FROM detail_reservasi_service where id_detail_reservasi_service = '$id_detail_reservasi_service'");
					header('Location: ' . $_SERVER['HTTP_REFERER']);
					
					
			}
			
		
		
?>