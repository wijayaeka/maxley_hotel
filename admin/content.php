<?php
$status = $_SESSION['status'];
include "../config/connect.php";

if ($_GET[page]== 'home')
	{
		include "modul/mod_home/index.php";
		
	}
if ($_GET[page]== 'admin')
	{
		include "modul/mod_admin/index.php";
	}
if ($_GET[page]== 'comboajax')
	{		
		include "modul/comboajax/index.php";	
	}		
if ($_GET[page]== 'kategori_page')
	{
		include "modul/mod_kategori_page/index.php";
	}

if ($_GET[page]== 'page')
	{
		include "modul/mod_page/index.php";
	}
if ($_GET[page]== 'subpage')
	{
		include "modul/mod_admin_subpage/index.php";
	}
if ($_GET[page]== 'kategori_berita')
	{
		include "modul/mod_kategori_berita/index.php";
	}

if ($_GET[page]== 'berita')
	{
		include "modul/mod_berita/index.php";
	}
if ($_GET[page]== 'article')
	{
		include "modul/mod_article/index.php";
	}

if ($_GET[page]== 'article_by_menu')
	{
		include "modul/mod_article_by_menu/index.php";
	}

if ($_GET[page]== 'komentar')
	{
		include "modul/mod_komentar/index.php";
	}
	
if ($_GET[page]== 'album_photo')
	{
		include "modul/mod_album_photo(single)/index.php";
	}
if ($_GET[page]== 'album_video')
	{
		include "modul/mod_album_video(single)/index.php";
	}
if ($_GET[page]== 'tree_menu')
	{
		include "modul/mod_treemenu/tree_menu.php";
	}
if ($_GET[page]== 'side_menu')
	{
		include "modul/mod_sidemenu/side_menu.php";
	}
	
	
if ($_GET[page]== 'main_menu')
	{
		include "modul/mod_main_menu/index.php";
	}

if ($_GET[page]== 'halaman_statis')
	{
		include "modul/mod_halaman_statis/index.php";
	}

	
if ($_GET[page]== 'logout')
	{
	
			include "logout.php";
	}

?>