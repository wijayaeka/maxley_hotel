<?php 


		switch($_GET[act]){	
		default:
		$no = 1;
			$p = new Paging;
			//Tentukan Limit
			$batas = 10;
			//Cek posisi halaman
			$posisi = $p->cariPosisi($batas);
			$no = $posisi+1;
			$sql = mysql_query("select * from customer  
							cross join reservasi 
							on reservasi.id_reservasi = customer.id_reservasi where reservasi.status = 'Y'
							order by customer.id_customer DESC limit $posisi, $batas");
			$tampil2 = mysql_query("select * from customer");
			$jmldata=mysql_num_rows($tampil2);
			//Dapatkan Jumlah Halaman
			$jmlhalaman = $p->jumlahHalaman($jmldata,$batas);
			//Cetak Link Navigasi
			$linkHalaman = $p->navHalaman($_GET[halaman],$jmlhalaman);
		echo "
		<h2>Customer</h2>
						<div id='stripe-separator'></div>
		<table id='table1'>
			<tr><th>No</th><th> Nama Customer </th><th>Status</th><th>Detail</th><th>Action</th><tr>
			";
					while($z = mysql_fetch_array($sql))
					{
						echo "<tr><td width=5px> $no</td>";
						echo "<td> $z[nama_customer]</td>";
						
						echo "<td align=center>";
							if ($z['status'] == 'Y')
							{
								
								echo"<div id='check_in'> Check In </div>";
							
							}
							else
							{
							
							
								echo"<div id='waiting'> Waiting </div>";
							
							
							}
						echo"</td>";
							echo "<td align=center>
								<div id='detail'>
									<a href='?page=customer&act=customer_detail&id_reservasi=$z[id_reservasi]' class='tip2' > 
									<img src='images/detail.png' /> <span> Click for detail</span>
								</a></div> 
							  </td>";
						echo "<td align=center > ";?>
						<div id='icon'><a href="<?php echo"delete.php?aksi=delete_customer&id_customer=$z[id_customer]" ?>" onClick="return confirm('Anda yakin akan menghapus data ini?');"><img src='images/delete.png'/></a></div> 
					<?php echo"</tr>";
					$no++;
					}
			
			echo "</table>
			<div class='button'>
									$linkHalaman
							  </div><br><br>";
				break;
				case "customer_detail";
					$id_reservasi = $_GET['id_reservasi'];
		
			$sql = mysql_query("select * from reservasi
								cross join customer on customer.id_reservasi = reservasi.id_reservasi 
								cross join room_kategori on room_kategori.id_room_kategori = reservasi.id_room_kategori 
								where reservasi.id_reservasi = '$id_reservasi'");
			$no = 1;
			$z = mysql_fetch_array($sql);
			echo "
			<h2>Detail Customer</h2>
						<div id='stripe-separator'></div>
				<table id='tabel_customer' ><th colspan=3 style='text-align:left; padding-left: 10px;'> Personal Detail</th>
						
						<tr>
								<td rowspan=0 valign=top><img src='images/image_nothing.png' width=150px height=140px/></td>
								<td>Nama </td>
								<td>: $z[nama_customer]</td>
						</tr>
						<tr>
								<td>Alamat </td>
								<td>: $z[alamat]</td>
						</tr>
						<tr>
								<td>No Telp </td>
								<td>: $z[no_telp]</td>
						</tr>
						<tr>
								<td>Email </td>
								<td>: $z[email]</td>
						</tr>
						<tr>
								<td>Room Type </td>
								<td>: $z[nama_room_kategori]</td>
						</tr>
						<tr>
								<td>Date In </td>
								<td>: $z[date_in]</td>
						</tr>
						<tr>
								<td>Date Out </td>
								<td>; $z[date_out]</td>
						</tr>
						<tr>
								<td>Guests </td>
								<td>: $z[guests]</td>
						</tr>
						<tr>
								<td>Total Pay </td>
								<td>: $z[price]</td>
						</tr>
						
				</table>";
				
				
				break;
		
		}

?>