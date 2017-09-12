<?php

include "../../../config/connect.php";

if($_GET['id'])
{
$id=$_GET['id'];

$sql = "UPDATE article SET menu_stats 		= '',
								id_menu		= '1'
							WHERE 
								id_article	='$id'";
								echo $sql;
mysql_query( $sql);
}


?>