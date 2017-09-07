<?php 
		include "../config/connect.php";
		
		
	$aksi="modul/mod_komentar/aksi_komentar.php";
	switch($_GET[act]){	
		default:
		$sql = mysql_query("select * from komentar 
							CROSS JOIN article on article.id_article = komentar.id_article");
		$no = 1;
		$p = new Paging;
							//Tentukan Limit
							$batas = 10;
							//Cek posisi halaman
							$posisi = $p->cariPosisi($batas);
		$no = $posisi+1;
		$tampil2 = mysql_query("select * from komentar order by id_komentar  DESC limit $posisi, $batas");
					$jmldata=mysql_num_rows($tampil2);
					
						//Dapatkan Jumlah Halaman
						$jmlhalaman = $p->jumlahHalaman($jmldata,$batas);
						//Cetak Link Navigasi
						$linkHalaman = $p->navHalaman($_GET[halaman],$jmlhalaman);
		echo "
			<h2>Komentar Berita</h2>
							  <div class='button'>
									$linkHalaman
							  </div>
							  <div id='stripe-separator'></div>";					
			echo"
			
		<table id='table1'>
			<tr><th>No</th><th>Email</th><th>Berita</th><th>Komentar</th><th>View</th><th>Status</th><tr>
			";
					while($z = mysql_fetch_array($sql))
					{
						echo "<tr><td width=5px> $no</td>";
						echo "<td> $z[email]</td>";
						echo "<td>".(implode(" ", array_slice(explode(" ", $z['title']), 0, 3))); echo"..</td>";
						echo "<td>".(implode(" ", array_slice(explode(" ", $z['isi_komentar']), 0, 7))); echo"..</td>";
						echo "<td> <div id='icon'>
							<a href='?page=komentar&act=detail_komentar&id_komentar=$z[id_komentar]' class='tip2' > 
										<img src='images/detail.png' /> <span> Click for detail</span></div></td>";
						echo "<td align='center'>";
						
						if ( $z['status_komentar'] == 'Y' )
						{
								echo"<div id='unpublish'>";?>
									<a href="<?php echo"$aksi?page=komentar&act=unpublish_komentar&id_komentar=$z[id_komentar]" ?>" class="tip2" onClick="return confirm('Nonaktifkan Komentar?');"> 
									Publish <span>Unpublish Komentar?</span>
									</a>
								
								<?php echo"
								</div>";
						
						}
						
						if ( $z['status_komentar'] == 'N' )
						{
								echo"<div id='publish'>";?>
									<a href="<?php echo"$aksi?page=komentar&act=publish_komentar&id_komentar=$z[id_komentar]" ?>" class="tip2" onClick="return confirm('Aktifkan Komentar?');"> 
									Unpublish <span>Publish Komentar?</span>
									</a>
								
								<?php echo"
								</div>";
						
						}
						echo "	</td>
						</tr>";
					$no++;
					}
			
			echo "</table>";
				
		break;
		
		case "detail_komentar";
				$id_komentar = $_GET['id_komentar'];
				$query = mysql_query("select * from komentar 
											CROSS JOIN article on komentar.id_article = article.id_article
											where id_komentar = '$id_komentar' ");
							$x = mysql_fetch_array($query);
				echo "
					<div class='tab_content' >
											<input type='radio' name='holder' id='tab_child_content' class='tab_child_content' checked='checked'/>
											<label for='tab_child_content' id='tab_child_content'>Create New Admin</label>
								<div  class='tab_child_content' >
										<h2>Detail Komentar</h2>
								<table id='table1' >
								<tr >
									<td style='width:60px; text-align:left; padding:20px 20px;'>
										<label>Email User</label>
										</td>
									<td style='padding:20px 20px;'>$x[email]</td>
								</tr>
								<tr>
									<td style='width:60px; text-align:left; padding:20px 20px;'>
										<label>Berita</label>
									</td>
									<td style='padding:20px 20px;'>$x[title]</td>
								</tr>
								<tr>
									<td style='width:60px; text-align:left; padding:20px 20px;'>
										<label>Komentar</label>
									</td>
									<td style='height:150px; text-align:left; padding:20px 20px;'>
										<div style='overflow:scroll; height:300px;'>$x[isi_komentar]
										</div></td>
								</tr>
								
								</table>
								<div id='unpublish' style='display:inline;'><a href='#' onclick='history.back()' >Back </a></div> &nbsp";
								if ( $x['status_komentar'] == 'Y' )
										{
												echo"<div id='unpublish' style='display:inline;'>";?>
													<a href="<?php echo"$aksi?page=komentar&act=unpublish_komentar&id_komentar=$x[id_komentar]" ?>" class="tip2" onClick="return confirm('Anda yakin akan nonaktifkan Kategori ini beserta Beritanya?');"> 
													Publish <span>Unpublish Komentar?</span>
													</a>
												
												<?php echo"
												</div>";
										
										}
										
										if ( $x['status_komentar'] == 'N' )
										{
												echo"<div id='publish' style='display:inline;'>";?>
													<a href="<?php echo"$aksi?page=komentar&act=publish_komentar&id_komentar=$x[id_komentar]" ?>" class="tip2" onClick="return confirm('Anda yakin akan Mengaktifkan Kategori ini beserta Beritanya?');"> 
													Unpublish <span>Publish Komentar?</span>
													</a>
												
												<?php echo"
												</div>";
										
										}
								
								echo"&nbsp <div id='publish' style='display:inline;'>";?>
										<a href="<?php echo"$aksi?page=komentar&act=delete_komentar&id_komentar=$x[id_komentar]";?>" class="" onClick="return confirm('Anda yakin akan menghapus data ini?');"> Hapus</a>
										
									<?php echo"</div></br></br></div>
					</div>
				
				";	
							
					
					
					
					
					
					
					
		break;
		}
			  

?>