<?php
	 include "config/connect.php";
	 function anti_injection($data){
		  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
		  return $filter;
		}

	 $username = anti_injection($_POST["username"]);
	 $pass = anti_injection(md5($_POST["password"]));
	 
	 $login = mysql_query("SELECT * FROM admin WHERE username='$username' and password = '$pass' ");
	 
	 $find=mysql_num_rows($login);
	 $r=mysql_fetch_array($login);
	 
	 //VALID
	if ($find > 0) 
			{
				session_start();
				
				//session ke server
				$_SESSION['namauser'];
				$_SESSION['passuser'];
				
				
				//isi dari variabel
				$_SESSION["namauser"]= $r["username"];
				$_SESSION["passuser"]= $r["password"];
				$_SESSION["status"]= $r["status"];
			
				  $_SESSION['KCFINDER']=array();

				  $_SESSION['KCFINDER']['disabled'] = false;

				  $_SESSION['KCFINDER']['uploadURL'] = "../kcfinder/upload/";

				  $_SESSION['KCFINDER']['uploadDir'] = "";


				header('location:media.php?page=admin');
			}
		
		else
			{

			?>
<html>
<head>
	<title>Login Failure</title>
	
	<style>
	body {
	
	font: normal 14px auto Trebuchet MS, Verdana, Arial, Helvetica, sans-serif;
	color: #4f6b72;
	background: #f8f8f8 url(img/bg.jpg) repeat top left;
		}
	#pasang {
				text-align:center;
				margin-top:500px;
				margin-left: -150px;
			}
	#callout{
				background : transparent url(img/callout.png) 30px 2px  no-repeat;
				padding-top: 70px;
				padding-left: -90px;
				width:400px;
				height: 500px;
				margin-left:620px;
				margin-top: -350px;
			}
	</style>
</head>
<body>
<div id="pasang"><?php
				echo "<div id=callout>Login Gagal... <br> Maaf Username Atau Password Anda Salah <br>";
				echo "<a href='index.php'> Silahkan Ulangi Lagi</a></div>";
			
?></div>
</body>
</html>
<?php } ?>