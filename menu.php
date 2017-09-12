<nav class="navbar header" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
		 <div class="">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="glyphicon glyphicon-list"></span>
                </button>
				<a class="navbar-brand" href="home.html"><img src="./images/logo.png" class="logo"  alt=""></a>
				 <div class="collapse navbar-collapse" id="navbar-collapse-1">
				  <ul id="nav" class="nav navbar-nav navbar-right">
				<?php 
					$cek_menu = mysql_query("select * from  menu WHERE menu_stats='mm' ORDER BY list_number asc");
					while($menu=mysql_fetch_array($cek_menu))
							{	
							echo "<li>";
								$cek_child = mysql_query("select * from menu where menu_stats='sm1'  AND id_parent = '$menu[id_menu]' ");
								$jml_child = mysql_num_rows($cek_child);
								$child = mysql_fetch_array($cek_child);
								$cek_article_child = mysql_query("select * from article where id_menu = '$menu[id_menu]' ");
								$cek_article_child2 = mysql_query("select * from article where id_menu = '$child[id_menu]'");
								$jml_article_child = mysql_num_rows($cek_article_child);
								$jml_article_child2 = mysql_num_rows($cek_article_child2);
								$article_child = mysql_fetch_array($cek_article_child);
								if($jml_child >= 1 AND  $jml_article_child2 >= 1 )
									{
										echo"<a href='single-$menu[link].html' data-reveal-id='myModal' data-animation='fade' >$menu[menu_name] </a>";
									}
								else if($jml_child >= 0 AND  $jml_article_child >= 1)
									{
										echo"<a href='page-$article_child[url_article].html' class='big-link' data-reveal-id='myModal' data-animation='fade' >$menu[menu_name] </a>";
									}
								
								else if($jml_child >= 1 AND  $jml_article_child >= 1 )
									{
										echo"<a href='blog-$menu[link].html' data-reveal-id='myModal' data-animation='fade' >$menu[menu_name] </a>";
									}
				/*=======================================================================================*/
								// SUB MENU 1
									$cek_submenu1=mysql_query("SELECT * FROM menu WHERE menu_stats='sm1' AND id_parent= '$menu[id_menu]' ORDER BY list_number asc");
									$cek_banyaknya_submenu1=mysql_num_rows($cek_submenu1);	
										if($cek_banyaknya_submenu1 > 0)
											{
											echo"<ul>";
												while($sub_menu1=mysql_fetch_array($cek_submenu1))
														{
														echo"<li>";
															$cek_child_sub1 = mysql_query("select * from menu where menu_stats='sm2'  AND id_parent = '$sub_menu1[id_menu]' ");
															$jml_child_sub1 = mysql_num_rows($cek_child_sub1);
															$child_sub1 = mysql_fetch_array($cek_child_sub1);
															$cek_article_child_sub1 = mysql_query("select * from article where id_menu = '$child_sub1[id_menu]' OR id_menu = '$sub_menu1[id_menu]' ");
															$jml_article_child_sub1 = mysql_num_rows($cek_article_child_sub1);
															$article_child_sub1 = mysql_fetch_array($cek_article_child_sub1);
															if($jml_child_sub1 > 1 AND  $jml_article_child_sub1 <= 1 )
																{
																	echo"<a href='single-$sub_menu1[link].html' data-reveal-id='myModal' data-animation='fade' >$sub_menu1[menu_name] </a>";
																}
															else if($jml_child_sub1 >= 0 AND  $jml_article_child_sub1 == 1)
																{
																	echo"<a href='page-$article_child_sub1[url_article].html' class='big-link' data-reveal-id='myModal' data-animation='fade' >$sub_menu1[menu_name] </a>";
																}
															else if($jml_child_sub1 >= 1 AND  $jml_article_child_sub1 >= 1 )
																{
																	echo"<a href='blog-$sub_menu1[link].html' data-reveal-id='myModal' data-animation='fade' >$sub_menu1[menu_name] </a>";
																}
											/*=======================================================================================*/
																	// SUB MENU 2
																	$cek_submenu2=mysql_query("SELECT * FROM menu WHERE menu_stats='sm2' AND id_parent2=$sub_menu1[id_menu] ORDER BY list_number asc");
																	$cek_banyaknya_submenu2=mysql_num_rows($cek_submenu2);	
															if($cek_banyaknya_submenu2 > 0)
																{
																/*echo"<ul>";
																	while($sub_menu2=mysql_fetch_array($cek_submenu2))
																			{
																			echo"<li>";
																				$cek_article_sub2 = mysql_query("select * from article where id_menu = '$sub_menu2[id_menu]' ");
																				$cek_child_sub2 = mysql_query("select * from menu where menu_stats='sm2'  AND id_parent2 = '$sub_menu2[id_menu]' ");
																				$article_sub2 = mysql_fetch_array($cek_article_sub2);
																				$jml_child_sub2 = mysql_num_rows($cek_child_sub2);
																				$jml_article_sub2 = mysql_num_rows($cek_article_sub2);
																				// Bila artikel hanya satu
																				if($jml_child_sub2 == 0 AND $jml_article_sub2 == 1)
																					{
																						echo"<a href='page-$article_sub2[url_article].html' data-reveal-id='myModal' data-animation='fade' >$sub_menu2[menu_name] </a>";
																					}
																				// Bila artikel kosong 
																				else if($jml_child_sub2 == 0  AND $jml_article_sub2 == 0)
																					{
																						echo"<a href='$sub_menu2[link].html'data-reveal-id='myModal' data-animation='fade' >$sub_menu2[menu_name] </a>";
																					}
																				 // lebih dari satu
																				else if( $jml_child_sub2 > 1 )
																					{
																						echo"<a href='blog-$sub_menu2[link].html' data-reveal-id='myModal' data-animation='fade' >$sub_menu2[menu_name] </a>";
																					}
																					
																					echo"</li>";
																					}
																			echo"</ul>"; */
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
</nav>