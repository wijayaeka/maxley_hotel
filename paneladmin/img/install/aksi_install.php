<?php 

$host = $_POST['host'];
$username = $_POST['username'];
$password = $_POST['password'];
$database = $_POST['database'];

$aksi = $_GET['act'];

if( $aksi == 'server_conf'){
	$myfile = fopen("connect.php", "w") or die("Unable to open file!");
	$host = '<?php
	$server = "'.$host.'";
	$username = "'.$username.'";
	$password = "'.$password.'";
	mysql_connect($server,$username,$password) or die("Koneksi gagal");
	?>';

	fwrite($myfile, $host);
	fclose($myfile);
	
}
else if($aksi == 'create_db'){
	 include "connect.php";
	 mysql_query("CREATE DATABASE $database");
	 
	$myfile2 = fopen("db.php", "w") or die("Unable to open file!");
	$host2 = '<?php
	mysql_select_db("'.$database.'");
	?>';
	fwrite($myfile2, $host2);
	if(fclose($myfile2)){
		include "import.php";
	}
}

else if($aksi == 'create_hotel'){
	 include "connect.php";
	 include "db.php";
	function StyleId(){ 
			$create = md5(uniqid(rand(),true)); 
			$style = substr($create,0,8);
			return $style;
		}
	$id = $_POST['id'];
	$nama_hotel = $_POST['nama_hotel'];
	$alamat = $_POST['alamat'];
	$deskripsi = $_POST['deskripsi'];
	$no_telp = $_POST['no_telp'];
	$email = $_POST['email'];

	$unik = StyleId();
	$inisial = strtoupper (substr($nama_hotel,0,3));
	$id_hotel = $inisial."_".$unik;
	mysql_query("insert into hotel (id_hotel, nama_hotel, alamat, deskripsi, no_telp, email) values ('$id_hotel', '$nama_hotel', '$alamat', '$deskripsi', '$no_telp', '$email') ");

}
	

else if($aksi == 'create_user'){
	 include "connect.php";
	 include "db.php";
	$nama_lengkap = $_POST["nama_lengkap"];
			$username = $_POST["username"];
			$password = md5($_POST["password"]);
			$status = $_POST['status'];
			$sql = " INSERT INTO admin (nama_lengkap, username, password, status) values ('$nama_lengkap', '$username' ,'$password', '$status')";
			$kueri = mysql_query($sql);
			
}
	

?>