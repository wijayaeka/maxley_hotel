<?php
include('dbcon.php');
	$id3 	= $_REQUEST['parent2_id'];
	$query3 = mysql_query("select * from menu where id_parent2 = ".$id3." order by list_number asc");
	$results3 = mysql_num_rows($query3);
?>

<script type="text/javascript">
$(document).ready(function() {
	$('#search_category_id3').change(function(){
	
			var x = $('#search_category_id3').val();
		$('#result').val(x);
		
		return false;
	});
});
</script>
<?php
if(!empty($results3))
{
		echo $results3['menu_name'];
	?>
<form action="#" name="form" id="form_menu" >
	<select name="search_category_id3"  id="search_category_id3" >
			<option value="" selected="selected"> </option>
			<?php
			while ($rows3 = mysql_fetch_array($query3))
			{?>
				<option value="<?php echo $rows3['id_menu'];?>"  ID="<?php echo $rows3['id_menu'];?>"> <?php echo $rows3['menu_name'];?></option>
			<?php
			}?>
			</select>
</form>
<?php	
}
?>