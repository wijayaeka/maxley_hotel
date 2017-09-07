<?php 
	$aksi="modul/mod_admin_subpage/aksi_subpage.php";
	switch($_GET[act]){	
		default:
		echo "
			 <div class='workplace'>
			 <div class='workplace'>
		  <p align='right'><a href='?page=subpage&act=tambah' role='button' class='btn'>Input Submenu Baru</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Sub Menu Halaman Admin</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>";		
			echo"
		<table  cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
			<thead>
                <tr>
                <th width='1%'><input type='checkbox' name='checkbox'/></th>
                <th width='15%'>NAMA SUBMENU</th>
                <th width='15%'>PARENT</th>
                <th width='4%' style='text-align:center;'>AKTIF</th>
                <th width='5%' style='text-align:center;'>AKSI</th>                                  
                </tr>
            </thead>
			<tbody>";
				$tp=mysql_query("select * from sub_page 
							CROSS JOIN page on page.id_page = sub_page.id_page
							order by sub_page.id_subpage  asc");
				while($r=mysql_fetch_array($tp)){
					
					echo "<tr><td><input type='checkbox' name='checkbox'/></td>";
					echo "<td> $r[nama_subpage]</td>";
					echo "<td> $r[nama_page]</td>";
					echo "<td style='text-align:center;'>";
						  if ($r['status_subpage'] == 'Y' )
								{
								echo"
								    <section id='stage'>
									<div class='slider-frame'>
										<a href=$aksi?page=subpage&act=unpublish_subpage&id_subpage=$r[id_subpage]><span class='slider-button on'>ON</span></a>
									</div>
									</section>";
								}
							if ( $r['status_subpage'] == 'N' )
								{
								echo"
									<section id='stage'>
							 		<div class='slider-frame'>
										<a href=$aksi?page=subpage&act=publish_subpage&id_subpage=$r[id_subpage]><span class='slider-button off'>OFF</span></a>
									</div>
									</section>";
								}
					echo "</td> ";
					echo "<td style='text-align:center;' >
						<a href='?page=subpage&act=edit&id=$r[id_subpage]' class='icon-edit'></a>|";?>
									   <a href="<?php echo"$aksi?page=subpage&act=delete_subpage&id=$r[id_subpage]"; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?');"class='icon-remove'></a>
										</td>
                                </tr><?php
					}
			echo "</table>";
		break;
		case "tambah":
						echo "<form method='post' style='margin-top:-50px;' action='$aksi?page=subpage&act=input_subpage'   name='form_page' id='form_page' >
									<div class='workplace form'>
								<div class='row-fluid'>
									<div class='span6'>
									  <div class='block-fluid'>                        
										<div class='head clearfix'>
											<div class='isw-bookmark'></div>
												<h1>Input Submenu Halaman Admin</h1>
										</div>";
									$page = mysql_query("select * from page");
									echo"<div class='row-form clearfix'>
											<div class='span3'>Parent Menu :</div>
											<div class='span5'>
												<select name='id_page' id='s2_1' required='true' style='width: 100%;'>
												<option value=''> - Parent Menu -</option>";
												while( $r = mysql_fetch_array($page))
													{
														echo "<option value='$r[id_page]'> $r[nama_page]</option>";		
													}
													echo"</select>
											</div></div>";
									echo"<div class='row-form clearfix'>
											<div class='span3'>Nama Sub Menu :</div>
											<div class='span5'>
												<input type='text' id='nama_subpage' name='nama_subpage' class='easyui-validatebox' required='true'/>
											</div>
										</div>
										<div class='row-form clearfix'>
											<div class='span3'>Link :</div>
											<div class='span5'>
												<input type='text' id='link_subpage' name='link_subpage' class='easyui-validatebox' required='true' placeholder='?page=example' />
											</div>
										</div>
										<div class='row-form clearfix'>
											<div class='span3'>Status :</div>
											<div class='span5'>
												<input type='radio' id='status_subpage' name='status_subpage' value='Y'/> <small>Active</small> <br>
												<input type='radio' id='status_subpage' name='status_subpage' value='N' /> <small> Non Active </small>
											</div>
										</div>
										<div class='row-form clearfix'>
											<div class='span3'>Urutan :</div>
											<div class='span5'>
												<input type='text' id='urutan' name='urutan' style='width:50px;'/> 
										</div></div>
										<div class='row-form clearfix'>
											<input type='submit'   class='btn' value='Simpan' />
											<input type='button' value= 'Cancel'  class='btn' onclick='history.back()'>
										</div> 
					</div></div>
					</form>";
		break;
		
		case "edit":
			$id_subpage = $_GET['id'];
					$q = mysql_fetch_array(mysql_query("SELECT * from sub_page 
														CROSS JOIN page on page.id_page = sub_page.id_page
														where sub_page.id_subpage = '$id_subpage' "));
				echo "<form method='post' style='margin-top:-50px;' action='$aksi?page=subpage&act=update_subpage' name='form_page' id='form_page' >
								<div class='workplace form'>
								<div class='row-fluid'>
									<div class='span6'>
									  <div class='block-fluid'>                        
										<div class='head clearfix'>
											<div class='isw-bookmark'></div>
												<h1>Update Menu Halaman Admin</h1>
										</div>
								<input type='hidden' name='id_subpage' value='$q[id_subpage]' class='easyui-validatebox' required='true'/>";
								$sql_page= mysql_query("select * from page where id_page != '$q[id_page]' ");
								echo "<div class='row-form clearfix'>
											<div class='span3'>Parent :</div>
											<div class='span5'>
										<select name='id_page' id='s2_1' style='width: 100%;' class='easyui-validatebox' required='true'>
											<option value='$q[id_page]'> $q[nama_page]</option>";
									while($r = mysql_fetch_array($sql_page))
										{
										echo"<option value='$r[id_page]'> $r[nama_page]</option>";
										}
									echo "</select>
									</div></div>";
								echo"<div class='row-form clearfix'>
											<div class='span3'>Nama Submenu :</div>
											<div class='span5'>
											<input type='text' id='nama_subpage' name='nama_subpage' value='$q[nama_subpage]' class='easyui-validatebox' required='true'/>
											</div>
									</div>
									<div class='row-form clearfix'>
											<div class='span3'>Nama Menu :</div>
											<div class='span5'>
											<input type='text' id='link_subpage' name='link_subpage' class='required' value='$q[link_subpage]' class='easyui-validatebox' required='true'/>
											</div>
									</div>
								<div class='row-form clearfix'>
											<div class='span3'>Status :</div>
											<div class='span5'>";
									if ( $q['status_subpage'] == 'Y')
										{
												echo" <input type='radio' id='status_subpage' name='status_subpage' value='Y' class='required' checked/> Y <br>
												<input type='radio' id='status_subpage' name='status_subpage' value='N' class='required'/> N";
										
										}
									
									else {
											echo" <input type='radio' id='status_subpage' name='status_subpage' value='Y' class='required'/> Y <br><br>
													<input type='radio' id='status_subpage' name='status_subpage' value='N' class='required' checked/> N <br><br>";
										}
								echo"</div>
								</div>";
								echo"<div class='row-form clearfix'>
											<div class='span3'>Urutan :</div>
											<div class='span5'>
												<input type='text' id='urutan' name='urutan' value='$q[urutan]' style='width:50px;'/> 
										</div></div>
										<div class='row-form clearfix'>
								<input type='submit' class='btn' name='update'  value='Update' />
								<input type='button' class='btn' value= 'Cancel' onclick='history.back()'>
								</div>
						</div></div></div>
					</form>";
		}
			  

?>