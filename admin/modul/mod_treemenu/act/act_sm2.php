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
	$initial1 = strtolower($_POST['menu_name_english']);
	$initial = str_replace(' ','-',$initial1);
	
	$id_p_2=mysql_query("SELECT id_parent1 FROM menu WHERE id_menu ='$_POST[id_2]' ");
	$f=mysql_fetch_array($id_p_2);
	$f_id_p_2=$f[id_parent1];
	
mysql_query("INSERT INTO menu(
							menu_name,
							menu_name_english,
							menu_stats,
							link,
							list_number,
							icon,
							id_parent2,
							id_parent,
							id_parent1) 
						VALUES
						   (
							'$_POST[menu_name]',
							'$_POST[menu_name_english]',
							'sm2',
							'$initial',
							'$_POST[list_number]',
							'$_POST[icon]',
							'$_POST[id_2]',
							'$_POST[id_2]',
							'$f_id_p_2')");
  header('Location: ' . $_SERVER['HTTP_REFERER']);
 }

?>