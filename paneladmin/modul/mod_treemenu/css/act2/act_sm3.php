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

	$id_p_3=mysql_query("SELECT id_parent2 FROM menu WHERE id_menu ='$_POST[id_3]' ");
	$f2=mysql_fetch_array($id_p_3);
	$f_id_p_3=$f2[id_parent2];
	
	$id_p_2=mysql_query("SELECT id_parent1 FROM menu WHERE id_menu ='$f_id_p_3' ");
	$f=mysql_fetch_array($id_p_2);
	$f_id_p_2=$f[id_parent1];
mysql_query("INSERT INTO menu(menu_name,
							menu_stats,
							link,
							list_number,
							id_parent3,
							id_parent2,
							id_parent1,
							id_parent) 
						VALUES
						   ('$_POST[menu_name]',
							'sm3',
							'$initial',
							'$_POST[list_number]',
							'$_POST[id_3]',
							'$f_id_p_3',
							'$f_id_p_2',
							'$_POST[id_3]')");
  header('Location: ' . $_SERVER['HTTP_REFERER']);
 }

?>