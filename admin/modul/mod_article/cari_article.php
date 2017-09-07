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

$key=$_GET['key'];
if ($key == "")
	{
		
						$sql = mysql_query("select * from article");
$get_pages=mysql_num_rows($sql);
 if ($get_pages) {
	?>
		<TABLE  id='table1' >
		<th>No</th>
		<th>Judul</th>
		<th>Status</th>
		<th>Aksi</th>
		
	
	<?php $no=0;
	while ($row=mysql_fetch_array($sql))
		{
		$title=$row['title'];
		$status=$row['status'];
		$aksi="modul/mod_article/aksi_article.php";
		?>
		<tr>
			
			<td><?php echo $no=$no+1;?></TD>
			<td ><?php echo $title;?></TD>
			<?php echo"
			<td align='center'>";
										if ( $row['status'] == 'Y' )
										{
												echo"<div id='unpublish'>";?>
													<a href="<?php echo"$aksi?page=article&act=unpublish_article&id_article=$row[id_article]" ?>" class="tip2" onClick="return confirm('Anda yakin akan nonaktifkan artikel ini?');"> 
													Publish <span>Klik Untuk Menonaktifkan Article Ini</span>
												<?php echo"
												</div>";
										}
										if ( $row['status'] == 'N' )
										{
												echo"<div id='publish'>";?>
													<a href="<?php echo"$aksi?page=article&act=publish_article&id_article=$row[id_article]" ?>" class="tip2" onClick="return confirm('Anda yakin akan Mengaktifkan artikel ini?');">
													Unpublish <span>Klik Untuk Menonaktifkan Article Ini</span>
												<?php echo"
												</div>";
										}
										?>
			<td align='center' > 
				<div id='icon'>
					<a href='?page=article&act=edit_article&id_article=<?php echo $row['id_article']; ?>' class='tip2'> 
						<img src='images/edit.png' /><span>Edit Article</span></a>
					<a href="<?php echo"aksi_article.php?page=article&act=delete_article&id_article=$row[id_article]";?>" class="" onClick="return confirm('Anda yakin akan menghapus data ini?');"> <img src='images/delete.png' /></a>
			</td>
			
				
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
		<TABLE  id='table1' >
		<th>No</th>
		<th>Judul</th>
		<th>Status</th>
		<th>Aksi</th>
		
	
	<?php $no=0;
	while ($row=mysql_fetch_array($sql))
		{
		$title=$row['title'];
		$status=$row['status'];
		?>
		<tr>
			
			<td><?php echo $no=$no+1;?></TD>
			<td ><?php echo $title;?></TD>
			<?php echo"
			<td align='center'>";
										if ( $row['status'] == 'Y' )
										{
												echo"<div id='unpublish'>";?>
													<a href="<?php echo"$aksi?page=article&act=unpublish_article&id_article=$row[id_article]" ?>" class="tip2" onClick="return confirm('Anda yakin akan nonaktifkan artikel ini?');"> 
													Publish <span>Klik Untuk Menonaktifkan Article Ini</span>
												<?php echo"
												</div>";
										}
										if ( $row['status'] == 'N' )
										{
												echo"<div id='publish'>";?>
													<a href="<?php echo"$aksi?page=article&act=publish_article&id_article=$row[id_article]" ?>" class="tip2" onClick="return confirm('Anda yakin akan Mengaktifkan artikel ini?');">
													Unpublish <span>Klik Untuk Menonaktifkan Article Ini</span>
												<?php echo"
												</div>";
										}
										?>
			<td align='center' > 
				<div id='icon'>
					<a href='?page=article&act=edit_article&id_article=<?php echo $row['id_article']; ?>' class='tip2'> 
						<img src='images/edit.png' /><span>Edit Article</span></a>
					<a href="<?php echo"$aksi?page=article&act=delete_article&id_article=$row[id_article]";?>" class="" onClick="return confirm('Anda yakin akan menghapus data ini?');"> <img src='images/delete.png' /></a>
			</td>
			
				
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