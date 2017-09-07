
<script>$(function() {
$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
$( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
});
</script>

<?php 
	include "../config/connect.php";
	$aksi="modul/mod_article/aksi_article.php";
function StyleId() { 
					$create = strtoupper(md5(uniqid(rand(),true))); 
					$style = 
						substr($create,0,8);
					return $style;
				}
				$gen_code = StyleId();
function getExtension($str) 
								{

										 $i = strrpos($str,".");
										 if (!$i) { return ""; } 
										 $l = strlen($str) - $i;
										 $ext = substr($str,$i+1,$l);
										 return $ext;
								 }					
	$aksi="modul/mod_article/aksi_article.php";
	switch($_GET[act]){	
		default:
echo "<div class='workplace'>
		  <p align='right'><a href='?page=article&act=tambah' role='button' class='btn'>Create New</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Content Article</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th width='1%'><input type='checkbox' name='checkbox'/></th>
                                     <th width='15%'>NAMA MENU</th>
                                    <th width='10%' style='text-align:center;'>TANGGAL POSTING</th>
                                    <th width='4%' style='text-align:center;'>AKTIF</th>
                                    <th width='5%' style='text-align:center;'>AKSI</th>                                  
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM article	order by id_article ASC');
								
							while($r=mysql_fetch_array($tp)){
							$tgl = tgl_indo($r['tanggal']);
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[title]</td>
                                    <td style='text-align:center;'>$r[hari], $tgl</td>
									<td style='text-align:center;'>";
									   if ($r['status'] == 'Y' )
										{
												echo"
												 <section id='stage'>
													<div class='slider-frame'>
														<a href=$aksi?page=article&act=unpublish_article&id_article=$r[id_article]><span class='slider-button on'>ON</span></a>
													</div>
												</section>
												";
										
										}
										
										if ( $r['status'] == 'N' )
										{
												echo"<section id='stage'>
													<div class='slider-frame'>
														<a href=$aksi?page=article&act=publish_article&id_article=$r[id_article]><span class='slider-button off'>OFF</span></a>
													</div>
												</section>";
										
										}
										echo "	</td> 
										<td style='text-align:center;'>
											<a href='?page=article&act=edit&id=$r[id_article]' class='icon-edit'></a>|";?>
									   <a href="<?php echo"$aksi?page=article&act=delete_article&id=$r[id_article]"; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?');"class='icon-remove'></a>
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
	echo "<form method='POST' name='form_berita' id='form_berita'  action='$aksi?page=article&act=input_article' style='margin-top: -50px;' enctype='multipart/form-data'>
			<div class='workplace form'>
				<div class='row-fluid'>
				<div class='span10'>
				<div class='block-fluid'>                        
				<div class='head clearfix'>
				<div class='isw-bookmark'></div>
					<h1>Input Menu Halaman Admin</h1>
				</div>
							<input type='hidden' name='gen_code_article' id='gen_code_article' value='$gen_code' />
							<input type='hidden' name='username' id='username' value='$_SESSION[namauser]' />
							<input type='text' name='id_menu' id='result' style='display:block;'>
						<div class='row-form clearfix'>
							<div class='span3'>Menu Posisi:</div>
							<div class='span5'>";
									include "modul/mod_article/menu_tools/index.php";
							echo"
							</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span3'>Judul:</div>
							<div class='span5'>
										<div class='tabbable' id='tabs-a'>
											<ul class='nav nav-tabs'>
												<li  class='active'>
													<a href='#panel-a1' data-toggle='tab'>Bahasa Indonesia</a>
												</li>
												<li>
													<a href='#panel-a2' data-toggle='tab'>English</a>
												</li>
											</ul>
											<div class='tab-content'>
												<div class='tab-pane active' id='panel-a1'>
													<input type='text' placeholder='bahasa' id='title' name='title' required='true'/>
												</div>
												<div class='tab-pane ' id='panel-a2'>
													<input type='text' placeholder='english'  id='title_eng'  name='title_eng' />
												</div>
											</div>
										</div>
							</div>
						</div>
							
						<div class='row-form clearfix'>
							<div class='span3'>Running News:</div>
							<div class='span5'>
								<div style='display:inline;'><input type='radio' name='running_news' value='Y'> Y  
											&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp 
								<input type='radio' name='running_news' value='N' checked> N
								</div>
							</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span3'>Tanggal:</div>
							<div class='span5'>
								<input type='text' class='text' id='datepicker' name='tanggal' class='easyui-validatebox' required='true' style='width:100px;'>
							</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span3'>Isi Artikel:</div>
							<div class='span9'>
										<div class='tabbable' id='tabs-b'>
											<ul class='nav nav-tabs'>
												<li  class='active'>
													<a href='#panel-b1' data-toggle='tab'>Bahasa Indonesia</a>
												</li>
												<li>
													<a href='#panel-b2' data-toggle='tab'>English</a>
												</li>
											</ul>
											<div class='tab-content'>
												<div class='tab-pane active' id='panel-b1'>
													 <textarea name='isi_article' id='isi_article' style='height:350px;' ></textarea>
												</div>
												<div class='tab-pane ' id='panel-b2'>
													<textarea name='isi_article_eng' id='isi_article_eng' style='height:350px;' ></textarea>
												</div>
											</div>
										</div>
							</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span3'>Gambar:</div>
							<div class='span5'>
									<small> *Format must .jpg/.jpeg/.png/.gif </small><br>
									<input type='file' id='gambar' name='gambar'/>
							</div>
						</div>
						<div class='row-form clearfix' style='display:none;'>
							<div class='span3'>
									<input type='radio' name='video_active' onchange='disable_video()' value='D'  class='easyui-validatebox' required='true' checked/> Disable Video Active 
									</br>
									<input type='radio' name='video_active' onChange='upload_video()' value='U'  class='easyui-validatebox' required='true'/> Upload Video Active 
									<br>
									<input type='radio' name='video_active' onChange='embed_video()' value='E'  class='easyui-validatebox' required='true'/> Embbed Video Active 
									
							</div>
							<div class='col-md-5 col-md-offset-5' >
									<div id='upload' style='display:none' class='hide'>
										<div class='row-form clearfix'>
										<div class='span3'>Upload Video:
											<input type='file' id='video' name='video'/>
											</div>
											<small> *Format must .mp4/.flv/.mpeg4 </small>
										</div>
									</div>
									<div id='embed' style='display:none' class='hide'>
										<div class='row-form clearfix'>
											<div class='span3'>Embed Video:
											<input type='text' name='embbed_video' id='embbed_video' placeholder='http://youtube.com/...'/>
											</div>
										</div>
									</div>
							</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span3'>File Document:</div>
							<div class='span5'>
								<small> *Format must .doc/.xls/.pdf/.ppt </small><br>
								<input type='file' name='document' id='document'/>
							</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span3'>Komentari</div>
							<div class='span5'>
											<input type='checkbox' name='komentar_status' id='komentar_status' value='Y' />
											<small> *Check untuk artikel dapat dikomentari</small>
							</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span5'>
										<input type='submit'   class='btn' value='Simpan' />
											<input type='button' value= 'Cancel'  class='btn' onclick='history.back()'>
									</div>
						</div>
								</form>
							
						</div></div></div></div>";
			break;
			
case "edit":
	$id_article = $_GET['id'];
	$sql_article = mysql_query("select * from article where id_article = '$id_article' ");
	$r = mysql_fetch_array($sql_article);
		echo "<form method='POST' name='form_berita' id='form_berita'  action='modul/mod_article/aksi_article.php?page=article&act=update_article' style='margin-top: -50px;' enctype='multipart/form-data'>
			<div class='workplace form'>
				<div class='row-fluid'>
				<div class='span12'>
				<div class='block-fluid'>                        
				<div class='head clearfix'>
				<div class='isw-bookmark'></div>
					<h1>Input Artikel</h1>
				</div>
							<input type='hidden' name='id_article' id='id_article' value='$r[id_article]' />
							<input type='hidden' name='gen_code' value='$r[gen_code_article]' />
							<input type='hidden' name='username' id='username' value='$_SESSION[namauser]' />
							<input type='hidden' name='id_menu' id='result' style='display:block;' value='$r[id_menu]'>
						<div class='row-form clearfix'>
							<div class='span3'>Menu Posisi:</div>
							<div class='span5'>";
									include "modul/mod_article/menu_tools/index.php";
							echo"
							</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span3'>Judul:</div>
							<div class='span5'>
										<div class='tabbable' id='tabs-a'>
											<ul class='nav nav-tabs'>
												<li  class='active'>
													<a href='#panel-a1' data-toggle='tab'>Bahasa Indonesia</a>
												</li>
												<li>
													<a href='#panel-a2' data-toggle='tab'>English</a>
												</li>
											</ul>
											<div class='tab-content'>
												<div class='tab-pane active' id='panel-a1'>
													<input type='text' value='$r[title]'  id='title' name='title' required='true'/>
												</div>
												<div class='tab-pane ' id='panel-a2'>
													<input type='text' value='$r[title_eng]'   id='title_eng'  name='title_eng' />
												</div>
											</div>
										</div>
							</div>
						</div>
							
						<div class='row-form clearfix'>
							<div class='span3'>Running News:</div>
							<div class='span5'>
								<div style='display:inline;'>
									";
									if ($r['headline'] == 'Y' )
												{
												echo "<input type='radio' name='headline' value='Y' checked> Y  
														&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp 
														<input type='radio' name='headline' value='N'> N";
												
												}
											else
												{
													echo "<input type='radio' name='headline' value='Y' > Y  
														&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp 
														<input type='radio' name='headline' value='N' checked> N";
												}
							echo"</div>
							</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span3'>Tanggal:</div>
							<div class='span5'>
								<input type='text' class='text' id='datepicker' value='$r[tanggal]'  name='tanggal' class='easyui-validatebox' required='true' style='width:100px;'>
							</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span3'>Isi Artikel:</div>
							<div class='span9'>
										<div class='tabbable' id='tabs-b'>
											<ul class='nav nav-tabs'>
												<li  class='active'>
													<a href='#panel-b1' data-toggle='tab'>Bahasa Indonesia</a>
												</li>
												<li>
													<a href='#panel-b2' data-toggle='tab'>English</a>
												</li>
											</ul>
											<div class='tab-content'>
												<div class='tab-pane active' id='panel-b1'>
													 <textarea name='isi_article' id='isi_article' style='height:350px;' >$r[isi_article]</textarea>
												</div>
												<div class='tab-pane ' id='panel-b2'>
													<textarea name='isi_article_eng' id='isi_article_eng' style='height:350px;' >$r[isi_article_eng]</textarea>
												</div>
											</div>
										</div>
							</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span3'>Gambar:</div>
							<div class='span5'><small>* kosongkan bila gambar tidak diganti</small><br><br>";
										if ($r['gambar'] != 0)
											{
												echo"<div class='record' >
														<img src='../upload/file_article/gambar_article/$r[gambar]' /> 
														
															<a href='#' id='$r[id_article]' class='delete' ></a>	
													</div>";
											}
									echo"
									<input type='file' id='gambar' name='gambar'/>
							</div>
						</div>
						<div class='row-form clearfix'>
							";
										$query = mysql_query("select * from article where id_article = '$id_article' ");
										$fetch = mysql_fetch_array($query);
										
										if( $fetch['video_active'] == 'U')
											{
												echo "
													<div class='row-form clearfix'>
													<div class='span3'>
															<input type='radio' name='video_active' onchange='disable_video()' value='D'  class='easyui-validatebox' required='true' /> Disable Video Active 
															</br>
															<input type='radio' name='video_active' onChange='upload_video()' value='U'  class='easyui-validatebox' required='true' checked/> Upload Video Active 
															<br>
															<input type='radio' name='video_active' onChange='embed_video()' value='E'  class='easyui-validatebox' required='true'/> Embbed Video Active 
															
													</div>
													<div class='col-md-5 col-md-offset-5' >
															<div id='upload' style='display:none' class='hide'>
																<div class='row-form clearfix'>
																<div class='span3'>Upload Video:
																<div class='flowplayer is-closeable -is-splash' data-debug='true' data-ratio='.417'>
																		  <video controls id='thumb_video' poster='file_articel/poster_video/$q[poster_video]'>
																			 <source type='video/mp4' src='file_articel/video/$q[video]'  />
																		  </video>
																</div>
																	<input type='file' id='video' name='video'/>
																	</div>
																	<small> *Format must .mp4/.flv/.mpeg4 </small>
																</div>
															</div>
															<div id='embed' style='display:none' class='hide'>
																<div class='row-form clearfix'>
																	<div class='span3'>Embed Video:
																	<input type='text' name='embbed_video' id='embbed_video' placeholder='http://youtube.com/...'/>
																	</div>
																</div>
															</div>
													</div>
												</div>";
											}
										else if ( $fetch['video_active'] == 'E' )
											{
													echo "
														<div class='row-form clearfix'>
													<div class='span3'>
															<input type='radio' name='video_active' onchange='disable_video()' value='D'  class='easyui-validatebox' required='true' /> Disable Video Active 
															</br>
															<input type='radio' name='video_active' onChange='upload_video()' value='U'  class='easyui-validatebox' required='true' /> Upload Video Active 
															<br>
															<input type='radio' name='video_active' onChange='embed_video()' value='E'  class='easyui-validatebox' required='true' checked /> Embbed Video Active 
															
													</div>
													<div class='col-md-5 col-md-offset-5' >
															<div id='upload' style='display:none' class='hide'>
																<div class='row-form clearfix'>
																<div class='span3'>Upload Video:
																<div class='flowplayer is-closeable -is-splash' data-debug='true' data-ratio='.417'>
																		  <video controls id='thumb_video' poster='file_articel/poster_video/$q[poster_video]'>
																			 <source type='video/mp4' src='file_articel/video/$q[video]'  />
																		  </video>
																</div>
																	<input type='file' id='video' name='video'/>
																	</div>
																	<small> *Format must .mp4/.flv/.mpeg4 </small>
																</div>
															</div>
															<div id='embed' style='display:none' class='hide'>
																<div class='row-form clearfix'>
																	<div class='span3'>Embed Video:
																	<input type='text' name='embbed_video' id='embbed_video' placeholder='http://youtube.com/...'/>
																	</div>
																</div>
															</div>
													</div>
												</div>";
											}
											else if ( $fetch['video_active'] == 'D' )
											{
													echo "<div class='row-form clearfix'>
													<div class='span3'>
															<input type='radio' name='video_active' onchange='disable_video()' value='D'  class='easyui-validatebox' required='true' checked/> Disable Video Active 
															</br>
															<input type='radio' name='video_active' onChange='upload_video()' value='U'  class='easyui-validatebox' required='true' /> Upload Video Active 
															<br>
															<input type='radio' name='video_active' onChange='embed_video()' value='E'  class='easyui-validatebox' required='true'  /> Embbed Video Active 
															
													</div>
													<div class='col-md-5 col-md-offset-5' >
															<div id='upload' style='display:none' class='hide'>
																<div class='row-form clearfix'>
																<div class='span3'>Upload Video:
																<div class='flowplayer is-closeable -is-splash' data-debug='true' data-ratio='.417'>
																		  <video controls id='thumb_video' poster='file_articel/poster_video/$q[poster_video]'>
																			 <source type='video/mp4' src='file_articel/video/$q[video]'  />
																		  </video>
																</div>
																	<input type='file' id='video' name='video'/>
																	</div>
																	<small> *Format must .mp4/.flv/.mpeg4 </small>
																</div>
															</div>
															<div id='embed' style='display:none' class='hide'>
																<div class='row-form clearfix'>
																	<div class='span3'>Embed Video:
																	<input type='text' name='embbed_video' id='embbed_video' placeholder='http://youtube.com/...'/>
																	</div>
																</div>
															</div>
													</div>
												</div>";
											}	
								echo"
						</div>
						<div class='row-form clearfix'>
							<div class='span3'>File Document:</div>
							<div class='span5'>";
												if(!empty ($r['document']))
													{
														$ext_document = getExtension($r['document']);
														if($ext_document == 'doc'|| $ext_document == 'docx'  )
															{
																echo"<img src='images/word.png'><br>
																	".(implode(" ", array_slice(explode(" ", $r['document']), 1, 3))); echo"..";
															}
														if($ext_document == 'xls' || $ext_document == 'xlsx')
															{
																echo"<img src='images/excel.png'><br>
																		<label>$r[document]</label>";
															
															}
														if($ext_document == 'ppt' || $ext_document == 'pptx')
															{
																echo"<img src='images/ppt.png'><br>
																		<label>$r[document]</label>";
															
															}
														if($ext_document == 'pdf')
															{
																echo"<img src='images/pdf.png'><br>
																		<label>$r[document]</label>";
															
															}	
													}
						echo"</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span3'>Komentari</div>
							<div class='span5'>";
									
										if($r['komentar_status'] == 'Y' )
											{
												echo "<input type='checkbox' name='komentar_status' id='komentar_status' value='Y' checked/>
														<small> *Check untuk artikel dapat dikomentari</small>";
											}
										else
											{
												echo"<input type='checkbox' name='komentar_status' id='komentar_status' value='Y' />
													 <small> *Check untuk artikel dapat dikomentari</small>";
											}
							echo"</div>
						</div>
						<div class='row-form clearfix'>
							<div class='span5'>
										<input type='submit'   class='btn' value='Simpan' />
											<input type='button' value= 'Cancel'  class='btn' onclick='history.back()'>
									</div>
						</div>
								</form>
							
						</div></div></div></div>"; 
							
			break;
	}	
?>