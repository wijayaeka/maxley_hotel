 <div class="sidebar-nav">
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="visible-xs navbar-brand">Sidebar menu</span>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
			<ul class="nav navbar-nav">
				<?php 
					$cek_menu = mysql_query("select * from  side_menu WHERE sidemenu_stats='sd' ORDER BY sidemenu_list_number asc");
					while($sidemenu=mysql_fetch_array($cek_menu))
							{	
							echo "<li class='dropdown'>";
								$cek_article = mysql_query("select * from article where id_sidemenu = '$sidemenu[id_sidemenu]' ");
								$cek_child = mysql_query("select * from side_menu where sidemenu_stats='sd1'  AND id_sidemenu_parent = '$sidemenu[id_sidemenu]' ");
								$article = mysql_fetch_array($cek_article);
								$jml_child = mysql_num_rows($cek_child);
								$jml_article = mysql_num_rows($cek_article);
								// Bila artikel hanya satu
								if($jml_child == 0 AND $jml_article == 1)
									{
										echo"<a href='page-$article[url_article].html' >$sidemenu[sidemenu_name] </a>";
									}
								// Bila artikel kosong 
								else if($jml_child == 0  AND $jml_article == 0)
									{
										echo"<a href='$sidemenu[sidemenu_link].html' >$sidemenu[sidemenu_name] </a>";
									}
								//  lebih dari satu
								else if( $jml_child > 1 )
									{
										echo"<a href='blog-$sidemenu[sidemenu_link].html' >$sidemenu[sidemenu_name] </a>";
									}
								
				/*=======================================================================================*/
											// SUB MENU 1
												$cek_subsidemenu1=mysql_query("SELECT * FROM side_menu WHERE sidemenu_stats='sd1' AND id_sidemenu_parent=$sidemenu[id_sidemenu] ORDER BY sidemenu_list_number asc");
												$cek_banyaknya_subsidemenu1=mysql_num_rows($cek_subsidemenu1);	
										if($cek_banyaknya_subsidemenu1 > 0)
											{
											echo"<ul class='dropdown-menu'>";
												while($sub_sidemenu1=mysql_fetch_array($cek_subsidemenu1))
														{
														echo"<li>";
															$cek_article_sub_sidemenu1 = mysql_query("select * from article where id_sidemenu = '$sub_sidemenu1[id_sidemenu]' ");
															$cek_child_sub_sidemenu1 = mysql_query("select * from side_menu where sidemenu_stats='sd1'  AND id_sidemenu_parent = '$sub_sidemenu1[id_menu]' ");
															$article_sub_sidemenu1 = mysql_fetch_array($cek_article_sub_sidemenu1);
															$jml_child_sub_sidemenu1 = mysql_num_rows($cek_child_sub_sidemenu1);
															$jml_article_sub_sidemenu1 = mysql_num_rows($cek_article_sub_sidemenu1);
															// Bila artikel hanya satu
															if($jml_child_sub_sidemenu1 == 0 AND $jml_article_sub_sidemenu1 == 1)
																{
																	echo"<a href='page-$article_sub1[url_article].html' >$sub_sidemenu1[sidemenu_name] </a>";
																}
															// Bila artikel kosong 
															else if($jml_child_sub_sidemenu1 == 0  AND $jml_article_sub_sidemenu1 == 0)
																{
																	echo"<a href='$sub_sidemenu1[sidemenu_link].html' >$sub_sidemenu1[sidemenu_name] </a>";
																}
															//  lebih dari satu
															else if( $jml_child_sub_sidemenu1 > 1 )
																{
																	echo"<a href='blog-$sub_sidemenu1[sidemenu_link].html' >$sub_sidemenu1[sidemenu_name] </a>";
																}
											/*=======================================================================================*/
																	// SUB MENU 2
																		$cek_subsidemenu2=mysql_query("SELECT * FROM side_menu WHERE sidemenu_stats='sd1' AND id_sidemenu_parent=$sub_sidemenu1[id_sidemenu] ORDER BY sidemenu_list_number asc");
																		$cek_banyaknya_subsidemenu2=mysql_num_rows($cek_submenu2);	
																	if($cek_banyaknya_submenu2 > 0)
																		{
																		echo"<ul>";
																			while($sub_sidemenumenu2=mysql_fetch_array($cek_subsidemenu2))
																					{
																					echo"<li>";
																						$cek_article_subsidemenu2 = mysql_query("select * from article where id_sidemenu = '$sub_sidemenu1[id_sidemenu]' ");
																						$article_subsidemenu2 = mysql_fetch_array($cek_article_subsidemenu2);
																						$jml_article_subsidemenu2 = mysql_num_rows($cek_article_subsidemenu2);
																						// Bila artikel hanya satu
																						if($jml_article_subsidemenu2 == 1)
																							{
																								echo"<a href='$sub_sidemenu2[sidemenu_link]-$article_subsidemenu2[url_article].html' >$sub_sidemenu2[sidemenu_name] </a>";
																							}
																						// Bila artikel kosong atau lebih dari satu
																						else if($jml_article_subsidemenu2 == 0 || $jml_article_subsidemenu2 > 1 )
																							{
																								echo"<a href='$sub_sidemenu2[sidemenu_link].html' >$sub_sidemenu2[sidemenu_name] </a>";
																							}
																					
																					echo"</li>";
																					}
																			echo"</ul>";
																		}
														echo"</li>";
														}
												echo"</ul>";
											}
							echo"</li>";
							}
				?>
			   
                </ul>
            </div><!-- end navbar-collapse -->
        </div>
</div>