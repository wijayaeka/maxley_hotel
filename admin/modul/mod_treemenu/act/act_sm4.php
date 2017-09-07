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
	
	$id_p_5=mysql_query("SELECT id_parent4 FROM menu WHERE id_menu ='$_POST[id_4]' ");
	$f4=mysql_fetch_array($id_p_5);
	$f_id_p_5=$f4[id_parent4];
	
	$id_p_4=mysql_query("SELECT id_parent3 FROM menu WHERE id_menu ='$f_id_p_5' ");
	$f3=mysql_fetch_array($id_p_4);
	$f_id_p_4=$f3[id_parent3];
	
	$id_p_3=mysql_query("SELECT id_parent2 FROM menu WHERE id_menu ='$f_id_p_4' ");
	$f2=mysql_fetch_array($id_p_3);
	$f_id_p_3=$f2[id_parent2];
	
	$id_p_2=mysql_query("SELECT id_parent1 FROM menu WHERE id_menu ='$f_id_p_3' ");
	$f=mysql_fetch_array($id_p_2);
	$f_id_p_2=$f[id_parent1];

mysql_query("INSERT INTO menu(
							menu_name,
							menu_name_english,
							menu_stats,
							link,
							list_number,
							icon,
							id_parent5,
							id_parent4,
							id_parent3,
							id_parent2,
							id_parent1,
							id_parent) 
						VALUES
						   (
							'$_POST[menu_name]',
							'$_POST[menu_name_english]',
							'sm4',
							'$initial',
							'$_POST[list_number]',
							'$_POST[icon]',
							'$_POST[id_4]',
							'$f_id_p_5',
							'$f_id_p_4',
							'$f_id_p_3',
							'$f_id_p_2',
							'$_POST[id_4]')");
  header('Location: ' . $_SERVER['HTTP_REFERER']);
 }

?>