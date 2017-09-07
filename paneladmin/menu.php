<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
 <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
                <?php echo "Hallo,$_SESSION[namalengkap]"; ?>
            </div>
        </div>
        
        <div class="admin">
            <div class="image">
                <img src="img/users/olga.jpg" class="img-polaroid"/>                
            </div>
            <ul class="control"> 
                <li><span class="icon-user"></span> <?php echo "Hallo, $_SESSION[namalengkap]"; ?></li>               
                <li><span class="icon-share-alt"></span> <a href="logout.php">Logout</a></li>
            </ul>
        </div>
      <?php 
					include "../config/connect.php";
					
			function active($link){
				$query =  mysql_query("select * from page left join sub_page on sub_page.id_page = page.id_page where sub_page.link_subpage = '$link'");
				while($data = mysql_fetch_array($query)){
					return $data['id_page'];
				}
			}
			if( $_SESSION['status'] == 'superadmin'){$sql = mysql_query("select * from page cross join kategori_page on page.id_kategori_page = kategori_page.id_kategori_page 											where page.status_page = 'Y'  and kategori_page.inisial = 'admin-menu'											order by page.urutan asc");
						$sql = mysql_query("select * from page cross join kategori_page on page.id_kategori_page = kategori_page.id_kategori_page 
											where page.status_page = 'Y'  and kategori_page.inisial = 'admin-menu'
											order by page.urutan asc");
						echo" <ul class='control'> 
								<li style='padding:5px 5px;'><span class='icon-cog'></span><span class='text'>WEBSITE CONTENT MENU</span></li>               
							  </ul>
						<ul class='navigation'>
						";
						while($r = mysql_fetch_array($sql))
							{
								
								$par = "?page=".$_GET['page']."";
								if( $r['id_page'] == active($par)){
										$active = "active";
									}else{
										$active = "x";
								}
								echo"<li>";
								$sub = mysql_query("SELECT * FROM sub_page
															CROSS JOIN page on sub_page.id_page = page.id_page 
															WHERE sub_page.id_page =  '$r[id_page]' and sub_page.status_subpage = 'Y'");
										$jml = mysql_num_rows($sub);
								if($jml > 0){
										echo "<li class='openable $active'>
												<a href='$r[link]'>
													<span class='isw-list'></span><span class='text'>$r[nama_page] </span>
												</a>";
								}
								else
									{
										echo "<li ><a href='$r[link]' >
														<span class='isw-grid'></span><span class='text'>$r[nama_page]</span>
													</a>";
									}
										if($jml > 0) {
												echo "<ul>";
														while($w=mysql_fetch_array($sub))
															{
																echo "<li>
																		<a href='$w[link_subpage]'>
																			<span class='icon-th'></span><span class='text'>$w[nama_subpage]</span>
																		</a>
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
					echo"  <ul class='control'> 
								<li style='padding:5px 5px;'><span class='icon-glass'></span><span class='text'>HOTEL SYSTEM MENU</span></li>               
							  </ul>
					<ul class='navigation'>";
						while($r = mysql_fetch_array($sql)){
								$sub = mysql_query("SELECT * FROM sub_page
															CROSS JOIN page on sub_page.id_page = page.id_page 
															WHERE sub_page.id_page =  '$r[id_page]' and sub_page.status_subpage = 'Y'");
										$jml = mysql_num_rows($sub);
										$par2 = "?page=".$_GET['page']."";
								if( $r['id_page'] == active($par2)){
										$active = "active";
									}else{
										$active = "x";
								}
								if($jml > 0){
										echo "<li class='openable $active'>
												<a href='$r[link]'>
													<span class='isw-list'></span><span class='text'>$r[nama_page]</span>
												</a>";
								}
								else
									{
										echo "<li ><a href='$r[link]' >
														<span class='isw-grid'></span><span class='text'>$r[nama_page]</span>
													</a>";
									}
										if($jml > 0) {
												echo "<ul>";
														while($w=mysql_fetch_array($sub))
															{
																echo "<li>
																		<a href='$w[link_subpage]'>
																			<span class='icon-th'></span><span class='text'>$w[nama_subpage]</span>
																		</a>
																	</li>";
															}           
												echo "</ul>";
									
													} 
								echo "</li>";
						}
					echo"</ul>";
	  ?>  
        
</body>
</html>