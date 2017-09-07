		
<?php 
	
		$query = mysql_query("select * from halaman_statis order by id_hal_statis asc limit 3");
		while ($r = mysql_fetch_array($query))
			{
				echo"
						<div class='col-sm-3 '>
								</br><h4><strong>$r[nama_hal_statis]</strong></h4>
								<hr class='hr3'>
								<img class='img-small' src='upload/static/$r[gambar]' />
								<p> 
										".(implode(" ", array_slice(explode(" ", $r['isi_hal_statis']), 0, 20))); echo"..
								</p>
								<p>
									<a href='stat-$r[link_hal_statis].html' class='small'>View details</a>
								</p>
						</div>";
			
			}
echo"
		<div class='col-sm-3 '>
		</br><h4><strong>Advertising</strong></h4>
		<hr class='hr3'>
				<div class='box-small'>
					<img class='img-ads' src='images/cimb.gif' /><br>
				</div>
				
				<div class='box-small'>
					<img class='img-ads' src='images/ads.jpg' /><br>
				</div>
				
		</div>";
			?>		
		
		