<?php 
					$id_menu = $_GET['id'];
						$sql = mysql_query("select * from menu where id_menu = '$id_menu' ");
						$x = mysql_fetch_array($sql);
					echo"<div class='tabGroupmenu'>
											<input type='radio' name='tabGroup1' id='tab_edit' class='tab_edit' checked='checked'/>
											<label for='tab_edit'>Edit Menu</label>
											<input type='radio' name='tabGroup1' id='tab_article' class='tab_article'/>
											<label for='tab_article'>Pilih Article</label>
									<div  class='tab_edit' >
									<form method='post' style='padding:45px 10px' action='$aksi?page=tree_menu&act=update_menu'   name='form_page' id='form_page' >
										<a href='$aksi?page=tree_menu&gen=delete_sm4&id=$id_menu' class='tip2' ";?>onClick="return confirm('Anda yakin akan menghapus data ini?');"><?php echo"<img src='images/delete.png' style='width:14px; height:14px;'><span>Delete this Menu</span></a>
										<input type='hidden' name='id_menu' id='id_menu' value='$x[id_menu]'>
										<label2>Edit Menu $x[menu_name]</label2><br><br>
										<label>Name (indonesian):</label>
										<input type='text' id='menu_name' name='menu_name' value='$x[menu_name]' class='easyui-validatebox' required='true'/>
										<label>Name (English):</label>
										<input type='text' id='menu_name_english' name='menu_name_english' value='$x[menu_name_english]' class='easyui-validatebox' required='true'/>
										<label>Icon</label><small> *kosongkan bila tidak perlu</small>
											<select name='icon'>
												<option value='$x[icon]'> $x[icon] </option>
												<option value='home'>home</option>
												<option value='bars'>bars</option>
												<option value='user'>user</option>
												<option value='university'>university</option>
												<option value='institution'>institution</option>
												<option value='envelope'>envelope</option>
												<option value='photo'>photo</option>
												<option value='suitcase'>suitcase</option>
												<option value='tags'>tags</option>
												<option value='lightbulb'>lightbulb</option>
												<option value='gears'>gears</option>
												<option value='gift'>gift</option>
												<option value='glass'>glass</option>
												<option value='plane'>plane</option>
												<option value='star'>star</option>
											</select>
										<label>Urutan</label>
										<input type='text' name='urutan' value='$x[list_number]' id='urutan' style='width:40px;' /><br>
										<input type='submit'   value='UPDATE' /><input type='button' value= 'CANCel' onclick='history.back()'>
										</form>
										<label>Article</label>
										
											<table id='table1'>
												<tr><th style='text-align:center; width:10px;'>No</th>
													<th style='text-align:center;'>Judul Article</th>
													<th style='text-align:center;'>Remove</th>
												</tr>";
												$article = mysql_query("select * from article WHERE menu_stats='sm4' AND id_menu='$x[id_menu]' ");
												$no = 1;
												while($y = mysql_fetch_array($article))
												{
													echo "
														<tr class='record_delete'>
														<td align='center' style='width:20px;'>$no</td>
														<td style='padding-left:10px;'>".(implode(" ", array_slice(explode(" ", $y['title']), 0, 3))); echo"..</td>
														<td>
															<a href='#' id=$y[id_article] class='delbutton'>
																<img src='images/remove.png' />
															</a>
														</td>
														</tr>";						
													$no++;
												}
											echo"</table>
										 </div>
										  <div class='tab_article' >
						<form  method='post' id='select_album_video' action='modul/mod_treemenu/aksi_tree_menu.php?page=tree_menu&act=update_sm4'>
											<input type='hidden' name='id_menu' id='id_menu' value='$x[id_menu]'>
											<label> Pilih Article</label>
											
											<table id='table1'>
												<tr ><th style='text-align:center;'>No</th>
													<th style='text-align:center;'>Judul_Article</th>
													<th style='text-align:center;'>Pilih</th>
												</tr>";?>
												
												
												<?php
												$article = mysql_query("select * from article WHERE menu_stats ='' and status = 'Y' ");
												$no = 1;
												while($x = mysql_fetch_array($article))
												{
													echo "
														<tr><td align='center'>$no</td>
														<td>$x[title]</td>
														<td align='center'>
															<input type='checkbox'  value='$x[id_article]' name='id_article[]' $key /> 
														</td>
														</tr>";						
													$no++;
													echo "";
												}
											echo"</table>
											<input type='submit' name='ok' value='Add'>
											</form>
										 </div>
										</div>";
?>