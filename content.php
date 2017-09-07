<div class="row">
<div class="wrap">
<div class="container">

<?php 
	if ($_GET['page'] == 'home')
	{
	
?>
<!-- Content -->

<!-- end Content -->
   <div id="CanScrollWithXAxis" class="contentHolder">
      <div class="content-y">
      </div>
    </div>

<?php
 } 

if ($_GET['page'] == 'single')
	{
		$link = $_GET['id'];
		$query_menu = mysql_query("select * from menu where link = '$link' ");
		$x = mysql_fetch_array($query_menu);
		$id_menu = $x['id_menu'];
	?>
<div class="row fragment">  
    <div class="col-sm-12">
        <div id="w" class="clearfix">
			<div class="col-sm-1 back-fragment">
		    <ul id="sidemenu">
				<?php 
					$query_sidemenu1 = mysql_query("SELECT * from menu 
												CROSS JOIN article on menu.id_menu = article.id_menu
												where menu.id_parent = $id_menu 
												and menu.list_number = 1 
												order by menu.list_number asc ");
					while($r1= mysql_fetch_array($query_sidemenu1))
						{
							echo"<li><a href='#$r1[id_article]'  class='open'><i class='icon-$r1[icon] icon-large'></i><strong>$r1[menu_name]</strong></a></li>";
						}
				
				$query_sidemenu2 = mysql_query("SELECT * from menu 
												CROSS JOIN article on menu.id_menu = article.id_menu where menu.id_parent = $id_menu  and menu.list_number > 1 order by menu.list_number asc ");
					while($r2= mysql_fetch_array($query_sidemenu2))
						{
							echo"<li><a href='#$r2[id_article]'><i class='icon-$r2[icon] icon-large'></i><strong>$r2[menu_name]</strong></a></li>";
						}
					
				$query_sidemenu3 = mysql_query("SELECT * from menu 
												CROSS JOIN album_photo on menu.id_menu = album_photo.id_menu
												CROSS JOIN gallery_photo on album_photo.gen_code_photo = gallery_photo.gen_code_photo												
												where menu.id_parent = $id_menu limit 1");
					while($r3= mysql_fetch_array($query_sidemenu3))
						{
							echo"<li><a href='#$r3[id_album_photo]'><i class='icon-$r3[icon] icon-large'></i><strong>$r3[menu_name]</strong></a></li>";
						}
				?>
			</ul>
			</div>
			
			<div class="col-sm-11" id="content">
					<?php 
					$query_content1 = mysql_query("SELECT * from menu 
												CROSS JOIN article on menu.id_menu = article.id_menu where menu.id_parent = $id_menu  and menu.list_number = 1 order by menu.list_number asc ");
					
					while($c1= mysql_fetch_array($query_content1))
						{
							echo"
								<div id='$c1[id_article]' class='contentblock'>
								 <div class='col-sm-2' id='content'>
									<img src='./images/logo.png' class='logo'  alt=''>
									<hr class='hr1'>";
										echo"<div class='judul'>$c1[menu_name]</div>";
										$query_side_menu = mysql_query("SELECT * from menu 
										cross join article on menu.id_menu = article.id_menu where menu.id_parent = $c1[id_menu] order by menu.list_number asc  ");
										$cek_side_menu = mysql_num_rows($query_side_menu);
										if(!empty($cek_side_menu))
										{
									echo"
											<div class='navbox'>
											<ul class='side_menu'>";
											while($x = mysql_fetch_array($query_side_menu))
												{
													echo"<li><a href='blog-$c1[link].html'>$x[menu_name]</a></li>";
												}
									echo"</ul>
											</div>";
										}
										
										echo" <div style='bottom:10px; position:absolute; padding-left:10px;'>
										 <div class='dropdown'>
										  <select name='one' class='dropdown-select'>
											<option value=''>Hotels & Resort</option>
											<option value='1'>Option #1</option>
											<option value='2'>Option #2</option>
											<option value='3'>Option #3</option>
										  </select>
										</div>
										</div>
								</div>
								<div class='col-sm-10' >
										<div id='Default' class='contentHolder'>
										<div class='content-y'>
										<div class='box-text'>											
								<h2>$c1[title]</h2><hr class='hr2'/>";
									if (!empty($c1['gambar']))
											{
												echo"<img class='img-thumbnail '  src='upload/file_article/gambar_article/$c1[gambar]' />";
											}
										
									$artikel= str_replace('../','',$c1['isi_article']);
									echo"	
									  <p>$artikel</p>";
									  $art_gallery = mysql_query("SELECT * from menu 
												CROSS JOIN album_photo on menu.id_menu = album_photo.id_menu 
												CROSS JOIN gallery_photo on album_photo.gen_code_photo = gallery_photo.gen_code_photo
												where menu.id_menu = $c1[id_menu] ");
										$cek_gallery = mysql_num_rows($art_gallery);
										if (!empty($cek_gallery))
										{
										echo"<div style='width:100%'> <h4>Gallery</h4>";
										while($ag= mysql_fetch_array($art_gallery))
											{
												echo"
													<div class='picture left' style='width:175px;'>
													<div class='gallery'>
															<a class='fancybox-buttons' data-fancybox-group='button' href='upload/album_photo/$ag[photo]' data-caption='$ag[keterangan]'>
																<img src='upload/album_photo/$ag[photo]' class='img-thumbnail img-det' />
															</a>
														</div>
														<div id='caption'>".(implode(" ", array_slice(explode(" ", $ag['keterangan']), 0, 3))); echo".. </div>
													</div>";
											}
										echo"</div>";
										}
									echo"
								</div>
								</div>
								</div>
								</div>
								</div>";
						}
					$query_content2 = mysql_query("SELECT * from menu 
												CROSS JOIN article on menu.id_menu = article.id_menu where menu.id_parent = $id_menu  and menu.list_number > 1 order by menu.list_number asc ");
					$longThumb = 1;
					while($c2= mysql_fetch_array($query_content2))
						{
							echo"
								<div id='$c2[id_article]' class='contentblock hidden'>
								 <div class='col-sm-3' id='content'>
									<img src='./images/logo.png' class='logo'  alt=''>
									<hr class='hr1'>
									<div class='judul'>$c2[menu_name]</div>
									";
									$query_side_menu = mysql_query("SELECT * from menu  where id_parent1 = $id_menu and id_parent = $c2[id_menu]  ");
									$cek_side_menu = mysql_num_rows($query_side_menu);
										if(!empty($cek_side_menu))
										{
									echo"
											<div class='navbox'>
											<ul class='side_menu'>";
											while($x = mysql_fetch_array($query_side_menu))
												{
													echo"<li><a href='blog-$c2[link].html'>$x[menu_name]</a></li>";
												}
									echo"</ul>
											</div>";
										}
									echo"<div style='bottom:10px; position:absolute; padding-left:10px;'>
										 <div class='dropdown'>
										  <select name='one' class='dropdown-select'>
											<option value=''>Hotels & Resort</option>
											<option value='1'>Option #1</option>
											<option value='2'>Option #2</option>
											<option value='3'>Option #3</option>
										  </select>
										</div>
										</div>
								</div>
						<div class='col-sm-9' >
										<div id='LongThumb$longThumb' class='contentHolder'>
										<div class='content-y'>
										<div class='box-text'>												
								<h2>$c2[title]</h2><hr class='hr2'/>";
									if (!empty($c2['gambar']))
											{
												echo"<img class='img-thumbnail '  src='upload/file_article/gambar_article/$c2[gambar]' />";
											}
											
									$artikel= str_replace('../','',$c2['isi_article']);
									echo"	
									  <p>$artikel</p>";
									  $art_gallery = mysql_query("SELECT * from menu 
												CROSS JOIN album_photo on menu.id_menu = album_photo.id_menu 
												CROSS JOIN gallery_photo on album_photo.gen_code_photo = gallery_photo.gen_code_photo
												where menu.id_menu = $c2[id_menu] ");
										$cek_gallery = mysql_num_rows($art_gallery);
										if (!empty($cek_gallery))
										{
										echo"<div style='width:600px'> <h4>Gallery</h4><hr class='hr1'/>";
										while($ag= mysql_fetch_array($art_gallery))
											{
												echo"
													<div class='picture left' style='width:175px;'>
													<div class='gallery'>
															<a class='fancybox-buttons' data-fancybox-group='button' href='upload/album_photo/$ag[photo]' data-caption='$ag[keterangan]'>
																<img src='upload/album_photo/$ag[photo]' class='img-thumbnail img-det' />
															</a>
														</div>
														<div id='caption'>".(implode(" ", array_slice(explode(" ", $ag['keterangan']), 0, 3))); echo".. </div>
													</div>";
											}
										echo"</div>";
										}
									echo"
								</div>
								</div>
								</div>
								</div>
								</div>";
								$longThumb ++;
						}
					$query_content3 = mysql_query("SELECT * from menu 
												CROSS JOIN album_photo on menu.id_menu = album_photo.id_menu 
												CROSS JOIN gallery_photo on album_photo.gen_code_photo = gallery_photo.gen_code_photo
												where menu.id_parent1 = $id_menu ");
					$menu = mysql_fetch_array(mysql_query("SELECT * from menu 
												CROSS JOIN album_photo on menu.id_menu = album_photo.id_menu 
												CROSS JOIN gallery_photo on album_photo.gen_code_photo = gallery_photo.gen_code_photo
												where menu.id_parent1 = $id_menu "));							
					echo"<div id='$menu[id_album_photo]' class='contentblock hidden'>
							<div style='width:100%; '>";
					while($c3= mysql_fetch_array($query_content3))
						{
							echo"
								<div class='picture left' style='width:175px;'>
								<div class='gallery'>
										<a class='fancybox-buttons' data-fancybox-group='button' href='upload/album_photo/$c3[photo]' data-caption='$c3[keterangan]'>
											<img src='upload/album_photo/$c3[photo]' class='img-thumbnail img-det' />
										</a>
									</div>
									<div id='caption'>".(implode(" ", array_slice(explode(" ", $c3['keterangan']), 0, 3))); echo".. </div>
								</div>";
						}
					echo"</div></div>";
					?>
        </div>
		</div>
    </div>
</div> 
        <?php
	}
	
	
if ($_GET['page'] == 'page')
	{
		$url_article = $_GET['id'];
		$query_menu = mysql_query("select * from article CROSS JOIN menu on article.id_menu = menu.id_menu where article.url_article = '$url_article' ");
		$x = mysql_fetch_array($query_menu);
		$id_menu = $x['id_menu'];
	?>
<div class="row fragment">  
    <div class="col-sm-12">
			<div class="col-sm-2 white" id="content" >
					<?php
					$link = $_GET['id'];
					$title =mysql_fetch_array(mysql_query("SELECT * from menu where link = '$link' "));
					echo"<div class='judul'>$title[menu_name]</div>
						<hr class='hr1'>";
										$query_side_menu = mysql_query("SELECT * from menu  
																	cross join article on menu.id_menu = article.id_menu where menu.id_parent1 = $x[id_parent1]  AND menu.id_parent1  != 0   AND  menu.menu_stats  != 'sm2'   order by menu.list_number asc ");
										$cek_side_menu = mysql_num_rows($query_side_menu);
										if(!empty($cek_side_menu))
										{
									echo"
											<div class='navbox'>
											<ul class='side_menu'>";
											while($y = mysql_fetch_array($query_side_menu))
												{
													echo"<li><a href='page-$y[url_article].html'>$y[menu_name]</a></li>";
												}
									echo"</ul>
											</div>";
										}
					?>
					 <div style='bottom:50px; position:absolute; padding-left:10px;'>
					 <div class="dropdown">
					  <select name="one" class="dropdown-select">
						<option value="">Hotels & Resort</option>
						<option value="1">Option #1</option>
						<option value="2">Option #2</option>
						<option value="3">Option #3</option>
					  </select>
					</div>
					</div>
			</div>
			<div class="col-sm-10" id="content">
			 <div id="LongThumb" class="contentHolder">
				<div class="content-y">
					<div class='box-text'>
					<?php 
					$query_content1 = mysql_query("SELECT * from  article where id_menu = '$id_menu' ");
					while($c1= mysql_fetch_array($query_content1))
						{
							echo"<h2>$c1[title]</h2><hr class='hr2'/>
								<div id='$c1[id_article]' class='contentblock'>";
									if (!empty($c1['gambar']))
											{
												echo"<img class='img-thumbnail '  src='upload/file_article/gambar_article/$c1[gambar]' />";
											}
									$artikel= str_replace('../','',$c1['isi_article']);
									echo"	
									
									
						
									  $artikel
								</div>";
						}
						$cek_album = mysql_query("select * from menu, album_photo where album_photo.id_menu = $id_menu");
						$c = mysql_num_rows($cek_album);
						$r = mysql_fetch_array($cek_album);
										if (!empty($c))
										{
						
									$art_gallery = mysql_query("SELECT * from album_photo
												CROSS JOIN menu on menu.id_menu = album_photo.id_menu
												CROSS JOIN gallery_photo on album_photo.gen_code_photo = gallery_photo.gen_code_photo
												where album_photo.id_album_photo = '$r[id_album_photo]' ");
						
											echo"<div style='width:100%'> <h4>Gallery</h4><hr class='hr1'/>";
											while($c3= mysql_fetch_array($art_gallery))
												{
													echo"
														<div class='picture left' style='width:175px;'>
														<div class='gallery'>
																<a class='fancybox-buttons' data-fancybox-group='button' href='upload/album_photo/$c3[photo]' data-caption='$c3[keterangan]'>
																	<img src='upload/album_photo/$c3[photo]' class='img-thumbnail img-det' />
																</a>
															</div>
															<div id='caption'>".(implode(" ", array_slice(explode(" ", $c3['keterangan']), 0, 3))); echo".. </div>
														</div>";
												}
											echo"</div>";
										}
					?>
					</div>
				</div>
			</div>
        </div>
    </div>
</div> 
        <?php

		
	
	}

if ($_GET['page'] == 'blog')
	{
		$link = $_GET['id'];
		
		$query_menu = mysql_query("select * from menu where link = '$link' ");
		$x = mysql_fetch_array($query_menu);
		$id_menu = $x['id_menu'];
	?>
<div class="row fragment">  
    <div class="col-sm-12">
        <div id="w" class="clearfix">
			<div class="col-sm-1 back-fragment">
		    <ul id="sidemenu">
				<?php 
					$query_sidemenu1 = mysql_query("SELECT * from menu 
												CROSS JOIN article on menu.id_menu = article.id_menu
												where menu.id_parent2 = $id_menu 
												and menu.list_number = 1 
												order by menu.list_number asc ");
					while($r1= mysql_fetch_array($query_sidemenu1))
						{
							echo"<li><a href='#$r1[id_article]'  class='open'><i class='icon-$r1[icon] icon-large'></i><strong>$r1[menu_name]</strong></a></li>";
						}
				
				$query_sidemenu2 = mysql_query("SELECT * from menu 
												CROSS JOIN article on menu.id_menu = article.id_menu where menu.id_parent2 = $id_menu  and menu.list_number > 1 order by menu.list_number asc ");
					while($r2= mysql_fetch_array($query_sidemenu2))
						{
							echo"<li><a href='#$r2[id_article]'><i class='icon-$r2[icon] icon-large'></i><strong>$r2[menu_name]</strong></a></li>";
						}
					
				$query_sidemenu3 = mysql_query("SELECT * from menu 
												CROSS JOIN album_photo on menu.id_menu = album_photo.id_menu
												CROSS JOIN gallery_photo on album_photo.gen_code_photo = gallery_photo.gen_code_photo												
												where menu.id_parent2 = $id_menu limit 1");
					while($r3= mysql_fetch_array($query_sidemenu3))
						{
							echo"<li><a href='#$r3[id_album_photo]'><i class='icon-$r3[icon] icon-large'></i><strong>$r3[menu_name]</strong></a></li>";
						}
				?>
			</ul>
			</div>
			<div class="col-md-2 white" id="content" >
				<img src="./images/logo.png" class="logo"  alt="">
				<hr class="hr1">
					<?php
					$link = $_GET['id'];
					$title =mysql_fetch_array(mysql_query("SELECT * from menu where link = '$link' "));
					echo"<div class='judul'>$title[menu_name]</div>";
					?>
					 <div style='bottom:50px; position:absolute; padding-left:10px;'>
					 <div class="dropdown">
					  <select name="one" class="dropdown-select">
						<option value="">Hotels & Resort</option>
						<option value="1">Option #1</option>
						<option value="2">Option #2</option>
						<option value="3">Option #3</option>
					  </select>
					</div>
					</div>
			</div>
			<div class="col-sm-9" id="content">
			 <div id="LongThumb" class="contentHolder">
				<div class="content-y">
					<div class='box-text'>
					<?php 
					$query_content1 = mysql_query("SELECT * from menu 
												CROSS JOIN article on menu.id_menu = article.id_menu where menu.id_parent2 = $id_menu  and menu.list_number = 1 order by menu.list_number asc ");
					while($c1= mysql_fetch_array($query_content1))
						{
							echo"
								<div id='$c1[id_article]' class='contentblock'>
								<h2>$c1[title]</h2><hr class='hr2'/>";
									if (!empty($c1['gambar']))
											{
												echo"<img class='img-thumbnail '  src='upload/file_article/gambar_article/$c1[gambar]' />";
											}
										
									$artikel= str_replace('../','',$c1['isi_article']);
									echo"	<p>$artikel</p>
								</div>
								";
						}
					$query_content2 = mysql_query("SELECT * from menu 
												CROSS JOIN article on menu.id_menu = article.id_menu where menu.id_parent2 = $id_menu  and menu.list_number > 1 order by menu.list_number asc ");
					while($c2= mysql_fetch_array($query_content2))
						{
							echo"
								<div id='$c2[id_article]' class='contentblock hidden'>
								<h2>$c2[title]</h2><hr class='hr2'/>";
									if (!empty($c2['gambar']))
											{
												echo"<img class='img-thumbnail '  src='upload/file_article/gambar_article/$c2[gambar]' />";
											}
										$artikel2= str_replace('../','',$c2['isi_article']);
									echo"	
									  $artikel2";
									  $art_gallery = mysql_query("SELECT * from menu 
												CROSS JOIN album_photo on menu.id_menu = album_photo.id_menu 
												CROSS JOIN gallery_photo on album_photo.gen_code_photo = gallery_photo.gen_code_photo
												where menu.id_menu = $c2[id_menu] ");
										$cek_gallery = mysql_num_rows($art_gallery);
										if (!empty($cek_gallery))
										{
										echo"<div style='width:600px'> <h4>Gallery</h4><hr class='hr1'/>";
										while($ag= mysql_fetch_array($art_gallery))
											{
												echo"
													<div class='picture left' style='width:175px;'>
													<div class='gallery'>
															<a class='fancybox-buttons' data-fancybox-group='button' href='upload/album_photo/$ag[photo]' data-caption='$ag[keterangan]'>
																<img src='upload/album_photo/$ag[photo]' class='img-thumbnail img-det' />
															</a>
														</div>
														<div id='caption'>".(implode(" ", array_slice(explode(" ", $ag['keterangan']), 0, 3))); echo".. </div>
													</div>";
											}
										echo"</div>";
										}
									echo"
								</div>
								";
						}
					
					$menu = mysql_fetch_array(mysql_query("SELECT * from menu 
												CROSS JOIN album_photo on menu.id_menu = album_photo.id_menu 
												CROSS JOIN gallery_photo on album_photo.gen_code_photo = gallery_photo.gen_code_photo
												where menu.id_parent2 = $id_menu "));	
					$query_content3 = mysql_query("SELECT * from album_photo
												CROSS JOIN gallery_photo on album_photo.gen_code_photo = gallery_photo.gen_code_photo
												where album_photo.id_album_photo = '$menu[id_album_photo]' ");
					echo"<div id='$menu[id_album_photo]' class='contentblock hidden'>
							<div style='width:800px'>";
					while($c3= mysql_fetch_array($query_content3))
						{
							echo"
								<div class='picture left' style='width:175px;'>
								<div class='gallery'>
										<a class='fancybox-buttons' data-fancybox-group='button' href='upload/album_photo/$c3[photo]' data-caption='$c3[keterangan]'>
											<img src='upload/album_photo/$c3[photo]' class='img-thumbnail img-det' />
										</a>
									</div>
									<div id='caption'>".(implode(" ", array_slice(explode(" ", $c3['keterangan']), 0, 3))); echo".. </div>
								</div>";
						}
					echo"</div></div>";
					?>
					</div>
				</div>
			</div>
        </div>
		</div>
    </div>
</div> 
        <?php

		
	}
	

if ($_GET['page'] == 'promo')
	{
		$link_hal_statis = $_GET['id'];
	?>
<div class="row fragment">  
    <div class="col-sm-12">
			<div class="col-sm-2 white" id="content" >
					<?php
					$link = $_GET['id'];
					$title =mysql_fetch_array(mysql_query("SELECT * from halaman_statis where link_hal_statis = '$link_hal_statis' "));
					echo"<div class='judul'>$title[nama_hal_statis]</div>
						<hr class='hr1'>";
					?>
					 <div style='bottom:50px; position:absolute; padding-left:10px;'>
					 <div class="dropdown">
					  <select name="one" class="dropdown-select">
						<option value="">Hotels & Resort</option>
						<option value="1">Option #1</option>
						<option value="2">Option #2</option>
						<option value="3">Option #3</option>
					  </select>
					</div>
					</div>
			</div>
			<div class="col-sm-10" id="content">
			 <div id="LongThumb" class="contentHolder">
				<div class="content-y">
					<div class='box-text'>
					<?php 
					$query_content1 = mysql_query("SELECT * from  halaman_statis where link_hal_statis = '$link_hal_statis' ");
					while($c1= mysql_fetch_array($query_content1))
						{
							echo"
								<div  class='contentblock'>
								<h2>$c1[nama_hal_statis]</h2>";
									if (!empty($c1['gambar']))
											{
												echo"<img class='img-circle '  src='upload/static/$c1[gambar]' />";
											}
									echo"<p>$c1[isi_hal_statis]</p>
								</div>";
						}
						
					?>
					</div>
				</div>
			</div>
        </div>
    </div>
</div> 
        <?php

		
	
	}

echo"
</div>     
</div>     
</div>";     