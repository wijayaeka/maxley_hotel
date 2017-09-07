<?php

include('dbcon.php');
	$id2 	= $_REQUEST['parent_id'];
	$query2 = mysql_query("select * from menu where id_parent = ".$id2." order by list_number asc");
	$results2 = mysql_fetch_array($query2);
if(!empty($results2))
{
	?>	
<script type="text/javascript">
$(document).ready(function() {
	$('#loader2').hide();
	$('#show_heading2').hide();
	$('#search_category_id2').change(function(){
		$('#show_sub_categories2').fadeOut();
		$('#loader2').show();
			var x = $('#search_category_id2').val();
		$('#result').val(x);
		$.post("modul/mod_article/menu_tools/get_chid_categories2.php", {
			parent2_id: $('#search_category_id2').val(),
		}, function(response2){
			setTimeout("finishAjax2('show_sub_categories2', '"+escape(response2)+"')", 400);
		});
		return false;
	});
});

function finishAjax2(id,response2){
  $('#loader2').hide();
  $('#show_heading2').show();
  $('#'+id).html(unescape(response2));
  $('#'+id).fadeIn();
} 
</script>

			<select name="search_category_id2"  id="search_category_id2" >
			<option value="" selected="selected"> </option>
			<?php
			while ($rows2 = mysql_fetch_assoc(@$query2))
			{?>
				<option value="<?php echo $rows2['id_menu'];?>"  ID="<?php echo $rows2['id_menu'];?>"> <?php echo $rows2['menu_name'];?></option>
			<?php
			}?>
			</select>	
	<div id="show_sub_categories2" >
					<img src="modul/mod_article/menu_tools/loader.gif" style="margin-top:8px; float:left" id="loader2" alt="" />
				</div>
<?php	
}
?>