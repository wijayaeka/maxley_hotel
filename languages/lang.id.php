<?php

include "config/connect.php";

/* 
------------------
Language: Indonesia
------------------
*/

$lang = array();

$data=mysql_query("select * from menu ORDER BY list_number");
	$no = 1;
while ($x = mysql_fetch_array($data))

	{
		$z = $x['menu_name'];
		$lang[$z] = $x['menu_name'];
	}
$article_query=mysql_query("select * from article ");
	$no = 1;
while ($y = mysql_fetch_array($article_query))
	{
		$z = $y['title'];
		$tit[$z] = $y['title'];
		
		$w = $y['isi_article'];
		$bhs[$w] = $y['isi_article'];
		
		
	}

?>