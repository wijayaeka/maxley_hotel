<html>
<head>
<style>
.x-news_float{
		position:fixed;
		bottom:0px;
		width:100%; 
		left:0px;
		}
#x-hide, #x-show{
			border:1px solid #ddd;
			padding:10px 10px;
			background:yellow;
			width:30px;
			text-align:center;
			background:#ddd;
			height:20px;
		}
	
#panel{ 
			width:100%; 
            height:30px; 
            background:#fff;
			border:1px solid #ddd;
						
        }

#flip {
		background: url('images/arrow-down.png') no-repeat ;
		background-position:center; 
		width:30px;
		height:30px;
		border: 1px solid #ddd;
	}

.x-social-buttons {
    position: fixed;
    top: 150px;
    width: 160px;
    height: auto;
	min-height:330px;
	left:0px;
	background:white;
	border-radius: 10px 10px;
	padding: 1px 10px;
    z-index: 9999;
	 border: 2px solid #cccccc;
		  *border: 0;
		  border-color: #e6e6e6 #e6e6e6 #bfbfbf;
		  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
		  border-bottom-color: #b3b3b3;
		  -webkit-border-radius: 4px;
			 -moz-border-radius: 4px;
				  border-radius: 4px;
		  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffe6e6e6', GradientType=0);
		  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
		  *zoom: 1;
		  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
			 -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
				  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
}
.x-button-left {
    left: 0;
}
.x-button-right {
    right: 0;
}

#x-counter{
	font: normal 12px auto Trebuchet MS, Verdana, Arial, Helvetica, sans-serif;
	-moz-transition: background-color 0.4s ease-in 0s;
    -webkit-transition: background-color 0.4s ease-in 0s;
    display: block;
    float: left;
	text-align:left;
    margin-bottom: 2px;
	width: 180px;
    height: 160px;
	padding: 1px 2px;
}
#x-counter p{
	color:black;
	text-decoration:none;
}
.x-inline {display:inline;
float:left;
}
.x-inline img{
		padding-right:1px;
	}
.x-inline p {
font: normal 12px auto Trebuchet MS, Verdana, Arial, Helvetica, sans-serif;
	text-decoration:none;
	margin-left:-20px;
	padding:20px 20px;
	height:1px;
}

#panel a:link {
		color:#ffffff;
		text-decoration: none;
		font: 15px Century Gothic;
		} 
</style>

<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("fast");
  });
});
</script>
   <script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$(function() {
    $('marquee').mouseover(function() {
        $(this).attr('scrollamount',0);
    }).mouseout(function() {
         $(this).attr('scrollamount',5);
    });

});
});//]]>  

</script>
</head>
<body>
<div class='x-social-buttons'>
<div class="x-inline">
<p>Share :</p>
	<a href="https://www.facebook.com/korstranas.ppk" target="_blank"><img src='images/facebook-logo.png'></a>
	<a href="https://twitter.com/cegahkorupsi" target="_blank" ><img src='images/twitter_logo.png'></a>
</div>
<div class='x-itemsocial'>
	<?php 
	
// Statistik user
		
		  echo "
		 <div id='x-counter'>";
		include "config/connect.php";
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

		  echo "
				<p>Visitor :</p>
				<p align=left>$tothitsgbr </p><br>
			  <img src=counter/hariini.png> Pengunjung hari ini : $pengunjung <br>
			  <img src=counter/total.png> Total pengunjung    : $totalpengunjung <br><br>
			  <img src=counter/hariini.png> Hits hari ini    : $hits[hitstoday] <br>
			  <img src=counter/total.png> Total Hits       : $totalhits <br><br>
			  <img src=counter/online.png> Pengunjung Online: $pengunjungonline<br><br>
			  
		</div>";

	?>
</div>


</div>
<div class='x-news_float'>
   <div id="flip"> </div>
	
	   <div id="panel">
	   <marquee scrollamount="5">
			<?php 
				$query_float = mysql_query("select * from article where running_news = 'Y' order by id_article desc limit 20");
				$nomer = 0;
				while($x1 = mysql_fetch_array($query_float))
				{
					$nomer ++;
						echo "<div style='display:inline; color:red; '>
									<a href='$x1[url_article].html' style='color:red; '>$x1[title]</a> &nbsp &nbsp  &nbsp &nbsp 
							</div>";
				}
			
			?>
			</marquee>
	   </div>
</div>
</body>
</html>