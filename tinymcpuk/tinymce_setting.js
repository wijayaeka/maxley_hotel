/* Tiny MCE */
			  jQuery(document).ready(function ($) {
				"use strict";
				$('#Default').perfectScrollbar();
			  });

				tinyMCE.init({
							mode : "exact",
							elements: "ta1,ta3",
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