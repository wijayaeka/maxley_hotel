<html>
	<head>
		<title>Welcome Admin</title>
		
		
		<style>
			*table { background:transparent;}
			#tableview td
			{
			 padding:20px 20px;
			 background:transparent;
			 }
		</style>
	<script language="javascript">
// Popup window code
function Popup1(url) {
 popupWindow = window.open(
  url,'popUpWindow','height=500,width=1000,left=60,top=10,resizable=yes,scrollbars=yes,toolbar=no, navigation=yes, menubar=no,location=no,directories=no,status=yes')
}

function Popup2(url) {
 popupWindow = window.open(
  url,'popUpWindow','height=1300,width=1200,left=60,top=10,resizable=yes,scrollbars=yes,toolbar=no, navigation=yes, menubar=no,location=no,directories=no,status=yes')
}

</script>
		<link rel="stylesheet" type="text/css" href="../config/css/styles.css">
	</head>
	<?php 
		include "../config/connect.php";
			$sql = mysql_query("select * from admin where username = '$_SESSION[namauser]'");
			$pecah = mysql_fetch_array($sql);
		
	?>
	
<body>
			
</body>
</html>
