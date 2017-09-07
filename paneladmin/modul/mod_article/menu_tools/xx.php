<?php
include('dbcon.php');
$sql = mysql_query("select * from article where id_menu != 0 ");
	while ($x = mysql_fetch_array($sql)){
		$a = $x['id_menu'];
			// echo "$a";
	}	
$sql2 = mysql_query("select * from menu where id_menu != '$a' ");
while ($z = mysql_fetch_array($sql2)){
		$b = $z['id_menu'];
			// echo "$b";
	}
$sql3 = mysql_query("select * from menu where id_menu = '$b' ");
while ($y = mysql_fetch_array($sql3)){
		$b = $y['menu_name'];
			echo "$b";
	}
	
	

	?>