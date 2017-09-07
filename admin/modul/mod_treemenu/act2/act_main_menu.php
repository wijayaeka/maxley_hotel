<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Login First<br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
session_start();
include "../../../config/connect.php";
	$initial1 = strtolower($_POST['menu_name']);
	$initial = str_replace(' ','-',$initial1);

mysql_query("INSERT INTO menu(menu_name,
							link,
							list_number,
							menu_stats) 
					VALUES('$_POST[menu_name]',
							'$initial',
							'$_POST[list_number]',
							'mm')");
  header('Location: ' . $_SERVER['HTTP_REFERER']);
 }

?>