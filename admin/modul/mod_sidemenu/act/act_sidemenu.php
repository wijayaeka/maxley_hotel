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
	$initial1 = strtolower($_POST['sidemenu_name']);
	$initial = str_replace(' ','-',$initial1);

mysql_query("INSERT INTO side_menu(
							sidemenu_name,
							sidemenu_name_english,
							sidemenu_link,
							sidemenu_list_number,
							sidemenu_stats) 
					VALUES(
							'$_POST[sidemenu_name]',
							'$_POST[sidemenu_name_english]',
							'$initial',
							'$_POST[sidemenu_list_number]',
							'sd')");
  header('Location: ' . $_SERVER['HTTP_REFERER']);
 }

?>