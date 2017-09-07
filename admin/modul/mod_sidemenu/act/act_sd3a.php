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
	
	$id_p_4=mysql_query("SELECT id_sidemenu_parent3 FROM side_menu WHERE idsidemenu ='$_POST[id_3a]' ");
	$f3=mysql_fetch_array($id_p_4);
	$f_id_p_4=$f3[id_sidemenu_parent3];
	
	$id_p_3=mysql_query("SELECT id_sidemenu_parent2 FROM side_menu WHERE id_sidemenu ='$f_id_p_4' ");
	$f2=mysql_fetch_array($id_p_3);
	$f_id_p_3=$f2[id_sidemenu_parent2];
	
	$id_p_2=mysql_query("SELECT id_sidemenu_parent1 FROM side_menu WHERE id_sidemenu ='$f_id_p_3' ");
	$f=mysql_fetch_array($id_p_2);
	$f_id_p_2=$f[id_sidemenu_parent1];
	

mysql_query("INSERT INTO side_menu(
							sidemenu_name,
							sidemenu_name_english,
							sidemenu_stats,
							sidemenu_link,
							sidemenu_list_number,
							id_sidemenu_parent4,
							id_sidemenu_parent3,
							id_sidemenu_parent2,
							id_sidemenu_parent1,
							id_sidemenu_parent) 
						VALUES
						   ('$_POST[sidemenu_name]',
						   '$_POST[sidemenu_name_english]',
							'sd3a',
							'$initial',
							'$_POST[sidemenu_list_number]',
							'$_POST[id_3a]',
							'$f_id_p_4',
							'$f_id_p_3',
							'$f_id_p_2',						
							'$_POST[id_3a]')");
  header('Location: ' . $_SERVER['HTTP_REFERER']);
 }

?>