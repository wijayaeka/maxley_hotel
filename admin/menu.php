<?php 
include '../config/connect.php';
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){

  header('location:index.php');
}
else{ 

?>
<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
<head>
   <link rel="stylesheet" type="text/css" href="css/menu.css" />
   <script type="text/javascript" src="js/menu/jquery.min.js"></script>
  <script src="js/menu/main.js" type="text/javascript"></script>  
</head>
<div id='cssmenu'>
<?php    if( $_SESSION['status'] == 'superadmin')		{$sql = mysql_query("select * from page cross join kategori_page on page.id_kategori_page = kategori_page.id_kategori_page 											where page.status_page = 'Y'  and kategori_page.inisial = 'admin-menu'											order by page.urutan asc");
						$sql = mysql_query("select * from page cross join kategori_page on page.id_kategori_page = kategori_page.id_kategori_page 
											where page.status_page = 'Y'  and kategori_page.inisial = 'admin-menu'
											order by page.urutan asc");
						echo"<ul>
						<h3>System Menu</h3>";
						while($r = mysql_fetch_array($sql))
							{
								echo"<li><a href='$r[link]' ><span>$r[nama_page]</span></a>";
								
										$sub = mysql_query("SELECT * FROM sub_page
															CROSS JOIN page on sub_page.id_page = page.id_page 
															WHERE sub_page.id_page =  '$r[id_page]' and sub_page.status_subpage = 'Y'");
										$jml = mysql_num_rows($sub);
										if($jml > 0) {
												echo "<ul>";
														while($w=mysql_fetch_array($sub))
															{
																echo "<li>
																		<a href='$w[link_subpage]'><span>$w[nama_subpage]</span></a>
																	</li>";
															}           
												echo "</ul>";
									
													} 
								echo "</li>";
										
										
							}
						echo"</ul>";
									}
						
						$sql = mysql_query("select * from page cross join kategori_page on page.id_kategori_page = kategori_page.id_kategori_page 
											where page.status_page = 'Y'  and kategori_page.inisial = 'website-menu' order by page.urutan asc");
						
						echo"<ul><h3>Website Management</h3>";
						while($r = mysql_fetch_array($sql))
							{
								echo"<li><a href='$r[link]' ><span>$r[nama_page]</span></a>";
								
										$sub = mysql_query("SELECT * FROM sub_page
															CROSS JOIN page on sub_page.id_page = page.id_page 
															WHERE sub_page.id_page =  '$r[id_page]' and sub_page.status_subpage = 'Y'");
										$jml = mysql_num_rows($sub);
										if($jml > 0) {
												echo "<ul>";
														while($w=mysql_fetch_array($sub))
															{
																echo "<li>
																		<a href='$w[link_subpage]'><span>$w[nama_subpage]</span></a>
																	</li>";
															}           
												echo "</ul>";
									
													} 
								echo "</li>";
							}
						echo"</ul>";
				
	  
?>
</div> 
</html>
<?php 
}
?>