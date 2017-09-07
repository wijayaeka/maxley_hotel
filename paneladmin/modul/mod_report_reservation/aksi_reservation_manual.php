<?php 

include "../../config/connect.php";
$page=$_GET['page'];
$act=$_GET['act'];

	

if ($page=='reservation_manual' AND $act=='add_reservation'){	
	
	$id_reservasi = $_POST['id_reservasi'];
	$id_req = $_POST['id_req'];

	$date_in = $_POST['date_in'];
	$date_out = $_POST['date_out'];
	$id_room_kategori = $_POST['id_room_kategori'];
	$room_amount = $_POST['room_amount'];
	$harga_room = mysql_fetch_array(mysql_query("select * from room_kategori where id_room_kategori = '$id_room_kategori' "));
	
	$price = $harga_room['harga']*$room_amount;
	
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
	$jk = mysql_fetch_array(mysql_query("select * from room_kategori where id_room_kategori = '$id_room_kategori'"));
	$jenis_kamar = $jk['nama_room_kategori'];
	
	
		$sql1 = mysql_query("insert into customer (id_reservasi, title, first_name, last_name, address, city, state, postal_code, country, mobile_phone, home_phone, email) 
				VALUES ('$id_reservasi', '$title','$first_name','$last_name','$address','$city','$state','$postal_code','$country','$mobile_phone','$home_phone','$email' )");
				
		$sql2 = mysql_query("insert into reservasi (id_reservasi, date_in, date_out, id_room_kategori, room_amount, price, id_req)
				VALUES ('$id_reservasi', '$date_in', '$date_out', '$id_room_kategori','$room_amount', '$price', '$id_req' )");
				
					require_once('../../phpmailer/class.phpmailer.php');
					require_once("../../phpmailer/class.smtp.php");
						
	
	
				$mail = new PHPMailer();
				$mail->IsSMTP(); // send via SMTP
				$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
				$mail->Host = "smtp.gmail.com"; // SMTP servers
				$mail->Port = 465;  // set the SMTP port
				$mail->SMTPAuth = true; // turn on SMTP authentication
				$mail->Username = "maxleyweb@gmail.com"; // SMTP username
				$mail->Password = "maxley2013"; // SMTP password
				$mail->IsHTML(true); // send as HTML
				$mail->Subject = "Maxleyhotel";
				$mail->From = "maxleyweb@gmail.com";
				$mail->FromName = "Maxleyhotel";
				$mail->Body = "
								<h2>Data Reservation Request</h2><br>
								<table >
								<tr>
									<td>First Name</td>
									<td> : ".$first_name."</td>
								</tr>
								<tr>
									<td>Last Name</td>
									<td> : ".$last_name."</td>
								</tr>
								<tr>
									<td>Address</td>
									<td> : ".$address."</td>
								</tr>
								<tr>
									<td>City</td>
									<td> : ".$city."</td>
								</tr>
								<tr>
									<td>State</td>
									<td> : ".$state."</td>
								</tr>
								<tr>
									<td>Postal Code</td>
									<td> : ".$postal_code."</td>
								</tr>
								<tr>
									<td>Country</td>
									<td> : ".$country."</td>
								</tr>
								<tr>
									<td>Mobile Phone</td>
									<td> : ".$mobile_phone."</td>
								</tr>
								<tr>
									<td>Home Phone</td>
									<td> : ".$home_phone."</td>
								</tr>
								<tr>
									<td>Email Address</td>
									<td> : ".$email."</td>
								</tr>
								
								<tr>
									<td>Check In</td>
									<td> : ".$date_in."</td>
								</tr>
								<tr>
									<td>Check Out</td>
									<td> : ".$date_out."</td>
								</tr>
								<tr>
									<td>Jenis Kamar</td>
									<td> : ".$jenis_kamar."</td>
								</tr>
								<tr>
									<td>Person</td>
									<td> : ".$guests."</td>
								</tr>
								<tr>
									<td>Total Price</td>
									<td> :  Rp.".$price."</td>
								</tr>
								
								
								</table>

				<h3> <a href='http://maxleyhotel.com/maxley_admin/media.php?page=reservation_request' /> Confirm Reservation Click Here </a></h3>";
				
				$query_email = mysql_query("select * from email_penerima_reservasi");
				while( $a = mysql_fetch_array($query_email) )
					{
							$kontak = "$a[alamat_email]" ;
							$mail->AddAddress("$kontak");
					}
					$mail->Send();
	
				header('location:../../media.php?page=reservation_request');
	}
?>
