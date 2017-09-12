<!DOCTYPE html>

<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->

<html class="not-ie" lang="en">
<!--<![endif]-->
    
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<title>Maxley Website</title>
<head>
<link rel="shortcut icon" href="favicon.ico">    
<!-- style sheets-->
<link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" media="all" href="css/font-awesome.min.css">
<link rel="stylesheet" media="screen" href="css/bootstrap.min.css" type="text/css"/>
<link rel="stylesheet" media="screen" href="css/custom.css" type="text/css"/>
<!-- main jquery libraries / others are at the bottom -->


        <script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script src="js/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/reveal.css">	

<script type='text/javascript'>//<![CDATA[ 

window.onload = function(){
    document.getElementById('close').onclick = function(){
        this.parentNode.parentNode.parentNode
        .removeChild(this.parentNode.parentNode);
        return false;
    };
};
//]]>  

</script>

<script type="text/javascript">
$(function(){
  $('#sidemenu a').on('click', function(e){
    e.preventDefault();

    if($(this).hasClass('open')) {
      // do nothing because the link is already open
    } else {
      var oldcontent = $('#sidemenu a.open').attr('href');
      var newcontent = $(this).attr('href');
      
      $(oldcontent).fadeOut('fast', function(){
        $(newcontent).fadeIn().removeClass('hidden');
        $(oldcontent).addClass('hidden');
      });  
      $('#sidemenu a').removeClass('open');
      $(this).addClass('open');
    }
  });
});
</script>
    <script>
      jQuery(document).ready(function ($) {
        "use strict";
        $('#Default').perfectScrollbar();
        $('#LongThumb').perfectScrollbar({minScrollbarLength:100});
        $('#LongThumb1').perfectScrollbar({minScrollbarLength:100});
        $('#LongThumb2').perfectScrollbar({minScrollbarLength:100});
        $('#LongThumb3').perfectScrollbar({minScrollbarLength:100});
        $('#LongThumb4').perfectScrollbar({minScrollbarLength:100});
        $('#LongThumb5').perfectScrollbar({minScrollbarLength:100});
      });
	  
    </script>
	<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("fast");
	 $("#arrow").toggleClass("toggle");
  });
});
		function clickButton()
		  {
			$("#flip").trigger('click');
			}

</script>
<link href="js/perfect-scrollbar.css" rel="stylesheet">
        <script src="js/jquery.mousewheel.js"></script>
        <script src="js/perfect-scrollbar.js"></script>

   
<script type="text/javascript" src="js/fancybox_gallery.js"></script>

	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
</head>
<body onload="clickButton()">
<!-- Menu -->
<?php include "config/common.php";?>
<?php include "config/fungsi_indotgl.php";?>
<?php include "menu.php";?>
<!-- end Menu -->
<!-- Content-->

<?php include "content.php";?>
<!-- Footer -->
<div class='x-news_float'>
   <div id="flip">PROMO & EVENT <div id="arrow"></div></div>
	   <div id="panel">
		<ul>
			<?php $query_float = mysql_query("select * from halaman_statis");
			$nomer = 1;
					while($x1 = mysql_fetch_array($query_float))
						{
							
								echo "<li><a href='promo-$x1[link_hal_statis].html' style='color:red; '>$x1[nama_hal_statis]</a></li>";
						}
			
			?>
		</ul>
		</div>
</div>
<!-- end Footer -->
    
<!-- Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/bootstrap.min.js"></script>
    
<!-- Scripts -->  
<script src="js/scripts.js"></script>

</body>
</html>