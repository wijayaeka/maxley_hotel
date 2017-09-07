<?php
session_start();
include "config/paging_class.php";
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']))
	{
		header('location:index.php');
	}
else{ 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
        <meta charset="utf-8">
		<meta http-equiv="cache-control" content="no-cache">
        <title>Administrator</title>
		<link rel="shortcut icon" href="../favicon.ico">   
		<link rel="stylesheet" href="css/style.css">
		<script src="../tinymcpuk/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>	
        <script type="text/javascript" src="../tinymcpuk/jscripts/tiny_mce/jquery.min.js"></script>
		<script>
		/* Tiny MCE */
			  jQuery(document).ready(function ($) {
				"use strict";
				$('#Default').perfectScrollbar();
			  });

				tinyMCE.init({
							mode : "exact",
							elements: "isi_article,isi_article_eng,isi_hal_statis,isi_article_eng,ta3",
							theme : "advanced",
							plugins : "youtubeIframe,advcode,syntaxhl,pagebreak,style,layer,table,save,advhr,advimage,advlink,insertdatetime,preview,searchreplace,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave,print,media",
							theme_advanced_buttons1 : "save,|,newdocument,|,bold,|,italic,|,underline,|,strikethrough,|,blockquote,|,justifyleft,|,justifycenter,|,justifyright,|,justifyfull,|,bullist,|,numlist,|,link,|,unlink,|,image,|,inserttime,|,media,|,ltr,|,rtl",
							theme_advanced_buttons2 : "tablecontrols,|,charmap,|,hr,|,undo,|,redo,|,preview,|,sub,|,sup,|,pagebreak,|,nonbreaking,|,fullscreen",
							theme_advanced_buttons3 : "forecolor,|,backcolor,fontselect,fontsizeselect,styleselect,|,search,|,replace,|,cut,|,copy,|,paste,|,youtubeIframe,|,advcode,|,syntaxhl",
							theme_advanced_toolbar_location : "top",
							theme_advanced_toolbar_align : "left",
							theme_advanced_statusbar_location : "bottom",
							file_browser_callback : 'openKCFinder',
							theme_advanced_resizing : true
						});
		
		/* KC FINDER */
		function openKCFinder(field_name, url, type, win) {
			tinyMCE.activeEditor.windowManager.open({
				file: '../kcfinder/browse.php?opener=tinymce&type=' + type,
				title: 'KCFinder',
				width: 700,
				height: 500,
				resizable: "yes",
				inline: true,
				close_previous: "no",
				popup_css: false
			}, {
				window: win,
				input: field_name
			});
			return false;
		}
		
		</script>	
</head>
<body>
        <!-- MAIN CONTENT -->
                <div class="page-full-width cf">
                <div id="head">
						<img src="images/logo2.png" style=" position:absolute;" >
				<div id='go_toweb'>
				<a href="../" target="_blank">Go To Website</a>
				</div>
				</div>
                        <!-- SIDE MENU -->
                        <?php include "menu.php"; ?>
               
                        <div class="side-content fr">
                        <?php include "content.php"; ?>
                        <div id="footer">

						<p>&copy; Copyright 2014 All Rights Reserved.</p>
						<p>Code and Design by <strong>MMP Group </strong> </p>
                
						</div> 
                        </div>
                </div>
</body>
</html>

<?php
}
?>

