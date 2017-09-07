<?php

include "../../../config/connect.php";

if($_GET['id'])
{
$id=$_GET['id'];

$sql = "UPDATE article SET sidemenu_stats 		= '',
								id_sidemenu		= '0'
							WHERE 
								id_article	='$id'";
mysql_query( $sql);
}


?>