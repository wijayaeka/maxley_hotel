<?php 
	
	$aksi="modul/mod_page/aksi_page.php";
	switch($_GET[act]){	
		default:
		
echo "
	   <div class='workplace'>
		  <p align='right'><a href='?page=page&act=tambah' role='button' class='btn'>Input Menu Baru</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Menu Halaman Admin</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th width='1%'><input type='checkbox' name='checkbox'/></th>
                                     <th width='15%'>NAMA MENU</th>
                                    <th width='15%'>JENIS MENU</th>
                                    <th width='4%'>AKTIF</th>
                                    <th width='5%' style='text-align:center;'>AKSI</th>                                  
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM page CROSS JOIN kategori_page on kategori_page.id_kategori_page = page.id_kategori_page 
							order by id_page ASC');
							while($r=mysql_fetch_array($tp)){
							
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[nama_page]</td>
                                    <td>$r[jenis_page]</td>
									<td>";
									   if ($r['status_page'] == 'Y' )
										{
												echo"
												 <section id='stage'>
													<div class='slider-frame'>
														<a href=$aksi?page=page&act=unpublish_page&id_page=$r[id_page]><span class='slider-button on'>ON</span></a>
													</div>
												</section>
												";
										
										}
										
										if ( $r['status_page'] == 'N' )
										{
												echo"<section id='stage'>
													<div class='slider-frame'>
														<a href=$aksi?page=page&act=publish_page&id_page=$r[id_page]><span class='slider-button off'>OFF</span></a>
													</div>
												</section>";
										
										}
										echo "	</td> 
										<td style='text-align:center;'>
											<a href='?page=page&act=edit&id=$r[id_page]' class='icon-edit'></a>|";?>
									   <a href="<?php echo"$aksi?page=page&act=delete_page&id=$r[id_page]"; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?');"class='icon-remove'></a>
										</td>
                                </tr><?php
							}
                               
                                        
                        echo"</tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>";    

		break;
		
		case "tambah":
						echo "<form method='post' style='margin-top:-50px;' action='$aksi?page=page&act=input_page'   name='form_page' id='form_page' >
								<div class='workplace form'>
								<div class='row-fluid'>
									<div class='span6'>
									  <div class='block-fluid'>                        
										<div class='head clearfix'>
											<div class='isw-bookmark'></div>
												<h1>Input Menu Halaman Admin</h1>
										</div>";
									$kategori_page = mysql_query("select * from kategori_page");
									echo"<div class='row-form clearfix'>
											<div class='span3'>Kategori Menu :</div>
											<div class='span5'>
									<select name='id_kategori_page' class='easyui-validatebox' id='s2_1' required='true' style='width: 100%;'>
										<option value=''> - select category -</option>";
										while( $r = mysql_fetch_array($kategori_page))
											{
												echo "<option value='$r[id_kategori_page]'> $r[jenis_page]</option>";		
											}
											echo"</select>
										</div>	
									</div>";
									echo"
										<div class='row-form clearfix'>
											<div class='span3'>Nama Menu:</div>
											<div class='span5'>
												<input type='text' id='nama_page' name='nama_page' class='easyui-validatebox' required='true'/>
											</div>
										</div>
										<div class='row-form clearfix'>
											<div class='span3'>Link :</div>
											<div class='span5'>
												<input type='text' id='link' name='link' class='easyui-validatebox' required='true' placeholder='?page=example' />
											</div>
										</div>
										<div class='row-form clearfix'>
											<div class='span3'>Urutan :</div>
											<div class='span5'>
												<input type='text' id='urutan' name='urutan' class='easyui-validatebox' required='true' />
											</div>
										</div>
										<div class='row-form clearfix'>
											<div class='span3'>Status :</div>
											<div class='span5'>
												<input type='radio' id='status_page' name='status_page' value='Y'/> <small>Active</small> <br>
												<input type='radio' id='status_page' name='status_page' value='N' /> <small> Non Active </small>
											</div>
										</div>
										<div class='row-form clearfix'>
											<input type='submit'   class='btn' value='Simpan' />
											<input type='button' value= 'Cancel'  class='btn' onclick='history.back()'>
										</div> 
							</div></div></div></div>
					  </form>";
		break;
		
		case "edit":
			$id_page = $_GET['id'];
					$q = mysql_fetch_array(mysql_query("SELECT * from page 
														CROSS JOIN kategori_page on kategori_page.id_kategori_page = page.id_kategori_page
														where page.id_page = '$id_page' "));
				echo "<form method='post' style='margin-top:-50px;' action='$aksi?page=page&act=update_page' name='form_page' id='form_page' >
								<div class='workplace form'>
								<div class='row-fluid'>
									<div class='span6'>
									  <div class='block-fluid'>                        
										<div class='head clearfix'>
											<div class='isw-bookmark'></div>
												<h1>Update Menu Halaman Admin</h1>
										</div>
								<input type='hidden' name='id_page' value='$q[id_page]' class='easyui-validatebox' required='true'/>";
								$sql_kategori_page= mysql_query("select * from kategori_page where id_kategori_page != '$q[id_kategori_page]' ");
								echo "<div class='row-form clearfix'>
											<div class='span3'>Kategori Menu :</div>
											<div class='span5'>
										<select name='id_kategori_page'  id='s2_1' style='width: 100%;' class='easyui-validatebox' required='true'>
											<option value='$q[id_kategori_page]' selected > $q[jenis_page]</option>";
											while($r = mysql_fetch_array($sql_kategori_page))
												{
												echo"<option value='$r[id_kategori_page]'> $r[jenis_page]</option>";
												
												}
									echo "</select></div></div>";
								echo"<div class='row-form clearfix'>
											<div class='span3'>Nama Menu :</div>
											<div class='span5'>
												<input type='text' id='nama_page' name='nama_page' value='$q[nama_page]' class='easyui-validatebox' required='true'/>
											</div>
									</div>
								<div class='row-form clearfix'>
											<div class='span3'>Link :</div>
											<div class='span5'>
												<input type='text' id='link' name='link' class='required' value='$q[link]' class='easyui-validatebox' required='true'/>
											</div>
								</div>
								<div class='row-form clearfix'>
											<div class='span3'>Urutan :</div>
											<div class='span5'>
												<input type='text' id='urutan' name='urutan' value='$q[urutan]' class='easyui-validatebox' required='true' />
										</div>
								</div>
								<div class='row-form clearfix'>
											<div class='span3'>Status :</div>
											<div class='span5'>";
									if ( $q['status_page'] == 'Y')
									{
											echo" <input type='radio' id='status_page' name='status_page' value='Y' class='required' checked/> Y<br>
											<input type='radio' id='status_page' name='status_page' value='N' class='required'/> N";
									
									}
									
									else {
											echo" <input type='radio' id='status_page' name='status_page' value='Y' class='required'/> Y <br>
													<input type='radio' id='status_page' name='status_page' value='N' class='required' checked/> N";
										}
										echo"</div>
								</div>";
								echo"
								<div class='row-form clearfix'>
								<input type='submit' class='btn' name='update'  value='Update' />
								<input type='button' class='btn' value= 'Cancel' onclick='history.back()'>
								</div>
						</div></div></div>
					</form>";
		
		}
			  

?>