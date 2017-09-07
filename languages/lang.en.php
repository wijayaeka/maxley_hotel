<?php

include "config/connect.php";

/* 
------------------
Language: English
------------------
*/

$lang = array();
$cont = array();
$data=mysql_query("select * from menu ORDER BY list_number");
	$no = 1;
while ($x = mysql_fetch_array($data))

	{
		$z = $x['menu_name'];
		$lang[$z] = $x['menu_name_english'];
	}
	
$article_query=mysql_query("select * from article ");
	$no = 1;
while ($y = mysql_fetch_array($article_query))
	{
		$zx = $y['isi_article'];
		$zy = $y['title'];
		$tit[$zy] = $y['title_eng'];
		$bhs[$zx] = $y['isi_article_eng'];
	}

?>