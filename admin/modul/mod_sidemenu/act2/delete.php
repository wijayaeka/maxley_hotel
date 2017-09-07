<?php

include "../../../config/connect.php";

if($_GET['id'])
{
$id=$_GET['id'];

$sql = "UPDATE article SET menu_stats 		= '',
								id_menu		= '0'
							WHERE 
								id_article	='$id'";
mysql_query($sql);
}


?>