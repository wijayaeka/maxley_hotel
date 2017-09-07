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
		$.post("modul/mod_article/menu_tools/get_chid_categories.php", {
			parent_id: $('#search_category_id').val(),
		}, function(response){
			
			setTimeout("finishAjax('show_sub_categories', '"+escape(response)+"')", 400);
		});
		
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
<style>
.choose_menu{
				border:0px solid;
				max-width:300px;
				 font-family: 'PT Sans', 'Segoe UI', 'Open Sans', sans-serif;
				font-size: 13px;
			}
		#form_menu{
				border:0px solid;
				max-height:40px;
		}
		#form menu label{
					height:10px;
				}
</style>	
</head>
<?php
		include('dbcon.php');?>
<div class=''>
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
	
		<div id="show_sub_categories" >
			<img src="modul/mod_article/menu_tools/loader.gif" style="margin-top:8px; float:left" id="loader" alt="" />
		</div>
</div>
</html>