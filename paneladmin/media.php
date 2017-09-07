<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
 include "403.html";
}
else{

include 'config/fungsi_date.php';
include "../config/connect.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";
include "../config/fungsi_rupiah.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    
    <title>..: Selamat Datang Di Ruang Admin :..</title>

    <link rel="icon" type="image/ico" href="favicon.ico"/>
    
    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />  
    <!--[if lt IE 8]>
        <link href="css/ie7.css" rel="stylesheet" type="text/css" />
    <![endif]-->            
    <link rel='stylesheet' type='text/css' href='css/fullcalendar.print.css' media='print' />
    
    <script type='text/javascript' src='js/jquery.min.js'></script>
    <script type='text/javascript' src='js/jquery-ui.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery.mousewheel.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/cookie/jquery.cookies.2.2.0.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/bootstrap.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/charts/excanvas.min.js'></script>
    <script type='text/javascript' src='js/plugins/charts/jquery.flot.js'></script>    
    <script type='text/javascript' src='js/plugins/charts/jquery.flot.stack.js'></script>    
    <script type='text/javascript' src='js/plugins/charts/jquery.flot.pie.js'></script>
    <script type='text/javascript' src='js/plugins/charts/jquery.flot.resize.js'></script>
    
    <script type='text/javascript' src='js/plugins/sparklines/jquery.sparkline.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/fullcalendar/fullcalendar.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/select2/select2.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/uniform/uniform.js'></script>
    
    <script type='text/javascript' src='js/plugins/maskedinput/jquery.maskedinput-1.3.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/validation/languages/jquery.validationEngine-en.js' charset='utf-8'></script>
    <script type='text/javascript' src='js/plugins/validation/jquery.validationEngine.js' charset='utf-8'></script>
    
    <script type='text/javascript' src='js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
    <script type='text/javascript' src='js/plugins/animatedprogressbar/animated_progressbar.js'></script>
    
    <script type='text/javascript' src='js/plugins/qtip/jquery.qtip-1.0.0-rc3.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/cleditor/jquery.cleditor.js'></script>
    
    <script type='text/javascript' src='js/plugins/dataTables/jquery.dataTables.min.js'></script>    
    
    <script type='text/javascript' src='js/plugins/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='js/cookies.js'></script>
    <script type='text/javascript' src='js/actions.js'></script>
    <script type='text/javascript' src='js/charts.js'></script>
    <script type='text/javascript' src='js/plugins.js'></script>
    <script src="../tinymcpuk/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>	
		<script>
		/* Tiny MCE */
			
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
		<script>
					$(function() 
							{
								$( "#datepicker4" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
								$( "#datepicker5" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
							});
					function valid_date()
								{
									
									var first = document.getElementById('datepicker4').value;
									var second = document.getElementById('datepicker5').value;
									
									if (second == "")
										{		
											document.getElementById('error1').innerHTML = '<em><\/em>';
										}
									else if (first > second)
										{
											alert('Kesalahan Data Extra Time')
											document.getElementById('datepicker4').value='';
											document.getElementById('datepicker5').value='';
											return true;
										}
									else {
									
									
											document.getElementById('error1').innerHTML = '<em><\/em>';
											
										}
								}
								
					</script>
		
</head>
<body>
    
    <div class="header">
        <a class="logo" href="media.php?p=home">
		<img src="img/logo.png"/>
		</a>
		<div class="pull-right"> <?php include "config/connection_status.php";?>
		
		</div>
		<div id="modal-container-upload"  class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
					 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h3 id="myModalLabel">
						Update Confirm
					</h3>
				</div>
				<div class="modal-body">
					<h3>
						Update Data To Server?
					</h3>
				</div>
				<div class="modal-footer">
					 <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button> <button class="btn btn-primary">Save changes</button>
				</div>
			</div>
			
    </div>
    
    <div class="menu">                
		<?php include "menu.php"; ?>        
        <div class="dr"><span></span></div>
        
        <div class="widget-fluid">
            <div id="menuDatepicker"></div>
        </div>
        
        <div class="dr"><span></span></div>
        
        <div class="widget">

            <div class="input-append">
                <input id="appendedInputButton" style="width: 118px;" type="text"><button class="btn" type="button">Search</button>
            </div>            
            
        </div>
        
        <div class="dr"><span></span></div>
        
        <div class="widget-fluid">
            
            <div class="wBlock clearfix">
            <?php
				  // Statistik user
					  // Statistik user
					$qstatistik=mysql_num_rows(mysql_query("select * from modul where nama_modul='Statistik User' and publish='Y'"));
					// Apabila modul Statistik diaktifkan Publish=Y, maka tampilkan modul Statistik
					//if ($qstatistik > 0){
					//  echo "<hr color=#e0cb91 noshade=noshade /><br />
					//        <img src='$f[folder]/images/statistik.jpg' /><br />";
					
					  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
					  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
					  $waktu   = time(); // 
					
					  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
					  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
					  // Kalau belum ada, simpan data user tersebut ke database
					  if(mysql_num_rows($s) == 0){
						mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
					  } 
					  else{
						mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
					  }
					
					  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
					  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
					  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
					  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
					  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
					  $bataswaktu       = time() - 300;
					  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));
					
					  $path = "counter/";
					  $ext = ".png";
					
					  $tothitsgbr = sprintf("%06d", $tothitsgbr);
					  for ( $i = 0; $i <= 9; $i++ ){
						   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
					  }
				 ?>				
                <div class="dSpace">
                    <h3>Last visits</h3>
                    <span class="number"><?php echo "$totalhits"; ?></span>                    
                    <span>Total Hits</b></span>
                </div>
                <div class="rSpace">
                    <h3>Today</h3>
                    <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--240,234,150,290,310,240,210,400,320,198,250,222,111,240,221,340,250,190--></span>                                                                                
                    <span>&nbsp;</span>
                    <span><?php echo "$pengunjung"; ?> <b>Visitor Hari Ini</b></span>
                    <span><?php echo "$pengunjungonline"; ?> <b>Visitor Online</b></span>
                </div>
            </div>
            
        </div>
        
    </div>
     
<div class="content">
                       
    <?php
    include "konten.php";
    ?>   
    
            </div>
            
</body>
</html>
<?php
}
?>