<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript">
$(document).ready(function() {
	$('#loader').hide();
	$('#show_heading').hide();
	$('#search_category_id').change(function(){
		$('#loader').show();
		var x = $('#search_category_id').val();
		$('#result').val(x);
		$('#show_sub_categories').fadeOut();
		$.post("modul/mod_article_by_menu/get_chid_categories.php", {
			parent_id: $('#search_category_id').val(),
		}, function(response){
			
			setTimeout("finishAjax('show_sub_categories', '"+escape(response)+"')", 400);
		});
		cari(x);
		return false;
		
	});
});
function finishAjax(id, response){
  $('#loader').hide();
  $('#show_heading').show();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
} 

function alert_id()
{
	if($('#sub_category_id').val() == '')
	alert('Please select a sub category.');
	else
	alert($('#sub_category_id').val());
	return false;
}
</script>
<script>

var xmlhttp = false;

try {
	xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}

if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
	xmlhttp = new XMLHttpRequest();
}
function cari(key){
	// alert (key)
	var obj=document.getElementById("pencarian");
	// var x=document.getElementById("search_category_id").value;
	var url='modul/mod_article_by_menu/cari_article.php?key='+key;
	xmlhttp.open("GET", url);
	
	xmlhttp.onreadystatechange = function() {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			obj.innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.send(null);
}
</script>
<style>
		
		select { float:left; 
	
				}
		
.clearBoth { clear:both; }
</style>	
</head>
<body>
<?php
		include('dbcon.php');?>
<div class="inline">
<form action="#" name="form" id="form_menu" method="post" onsubmit="return alert_id();" enctype="multipart/form-data">
		
		<select name="search_category"  id="search_category_id" >
		<option value="" selected="selected"> </option>
		<?php
		$query = "select * from menu where id_parent = 0";
		$results = mysql_query($query);
		
		while ($rows = mysql_fetch_assoc(@$results))
		{?>
			<option value="<?php echo $rows['id_menu'];?>"> <?php echo $rows['menu_name'];?></option>
		<?php
		}?>
		</select>	
</form>
	
		<div id="show_sub_categories" >
			<img src="modul/mod_article/menu_tools/loader.gif" style="margin-top:8px; float:left" id="loader" alt="" />
		</div>
</div>

<br class="clearBoth" />
 <div id='pencarian' ></div>
 </body>
</html>