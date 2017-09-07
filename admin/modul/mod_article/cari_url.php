<html>
<head>
<link rel="stylesheet" type="text/css" href="../config/css/styles.css">
<style>
tr:hover td {background:#ddd ;}

}
		
</style>
</head>
<body>

<?php
include "../../config/connect.php";

$key=$_GET['key2'];
if ($key == "")
	{
		// echo "<label>FORM PENCARIAN BELUM DI ISI...!</label> <a href='#' onclick='window.location.reload();'>Reload</a>";
		$sql = mysql_query("select * from article  ");
		$get_pages=mysql_num_rows($sql);
 if ($get_pages) {
	?>
		<TABLE  id='' >
		<th>No</th>
		<th>Judul</th>
		<th>URL </th>
	<?php $no=0;
	while ($row=mysql_fetch_array($sql))
		{
		$title=$row['title'];
		$url=$row['url_article'];
		?>
		<tr>
			
			<td><?php echo $no=$no+1;?></TD>
			<td ><?php echo $title;?></TD>
			<td ><?php echo $url.".html";?></TD>
			
				
		<?php
		}
	}
else{
	echo "<td><br><br>&nbsp &nbsp &nbsp <font style='font-family: 11 Verdana, Arial, Helvetica, sans-serif ;'>'  TIDAK ADA DATA YANG COCOK! '</font>";
	
	
	?></tr></TABLE>
		<?php
}
	}
else {
						$sql = mysql_query("select * from article  
											where title LIKE '%$key%'");
$get_pages=mysql_num_rows($sql);
 if ($get_pages) {
	?>
		<TABLE  id='' >
		<th>No</th>
		<th>Judul</th>
		<th>URL </th>
	<?php $no=0;
	while ($row=mysql_fetch_array($sql))
		{
		$title=$row['title'];
		$url=$row['url_article'];
		?>
		<tr>
			
			<td><?php echo $no=$no+1;?></TD>
			<td ><?php echo $title.".html";?></TD>
			<td ><?php echo $url.".html";?></TD>
			
				
		<?php
		}
	}
else{
	echo "<td><br><br>&nbsp &nbsp &nbsp <font style='font-family: 11 Verdana, Arial, Helvetica, sans-serif ;'>'  TIDAK ADA DATA YANG COCOK! '</font>";
	
	
	?></tr></TABLE>
		<?php
}
}
?>
	
</body>
</html>