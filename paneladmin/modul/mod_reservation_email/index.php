<?php 
	
	
	include "../config/connect.php";
	$aksi="modul/mod_reservation_email/aksi_reservation_email.php";
	switch($_GET[act]){	
		default:
			$sql = mysql_query("select * from email_penerima_reservasi ");
			echo "<div class='workplace'>
		<p align='right'>
		  <a href='?page=reservation_email&act=tambah' role='button' class='btn'>Tambah</a>
		</p>
		<div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-user'></div>
                        <h1>Email</h1>                               
                    </div>
					 <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%'class='table table-bordered table-striped' id='tSortable'>
                            <thead>
							<tr><th>No</th><th>Nama Pemilik</th><th>Alamat Email</th><th style='text-align:center;'>Aksi</th><th></th></tr>
							</thead>
							<tbody>";
							while($z = mysql_fetch_array($sql))
							{
								echo "<tr><td width=5px> $no</td>";
								echo "<td> $z[nama_email]</td>";
								echo "<td> $z[alamat_email]</td>";
								echo "  <td style='text-align:center;'><a href='?page=reservation_email&act=edit&id=$z[id_email]' class='icon-edit'></a>|";?>
									   <a href="<?php echo"$aksi?page=reservation_email&act=delete_email&id=$z[id_email]"; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?');"class='icon-remove'></td>
                                <td></td></tr>
								<?php
						}
				
				echo "</tbody></table></div></div></div></div>";
		break;
		
		case "tambah":
						echo "<form method='post' style='margin-top:-50px;' action='$aksi?page=reservation_email&act=input_email'   name='form_email' id='form_email'  class='form_admin'>
								<div class='workplace form'>
							<div class='row-fluid'>
								<div class='span6'>
								  <div class='block-fluid'>                        
									<div class='head clearfix'>
										<div class='isw-favorite'></div>
											<h1>Input Email</h1>
									</div>    
									<div class='row-form clearfix'>
								<div class='span3'>Nama Pemilik :</div>
								<div class='span5'>
										<input type='text' id='nama_email' name='nama_email' />
								</div>
								</div>
								<div class='row-form clearfix'>
								<div class='span3'>Alamat Email :</div>
								<div class='span5'>
										<input type='text' id='alamat_email' name='alamat_email'   />
								</div>
								</div>
								<div class='row-form clearfix'>
								<div class='span5'>
										<input type='submit'  class='btn' value='Simpan' />
										<input type='button' value= 'Cancel' class='btn' onclick='history.back()'>
								</div>
								</div></div></div></div>
					  </form>";
		break;
		
		case "edit":
				
				$id_email = $_GET['id'];
				$q = mysql_fetch_array(mysql_query("SELECT * from email_penerima_reservasi where id_email = '$id_email' "));
				
				echo "<form method='post' style='margin-top:-50px;' action='$aksi?page=reservation_email&act=update_email' name='form_email' id='form_email'  class='form_admin'>
						<div class='workplace form'>
					<div class='row-fluid'>
						<div class='span6'>
						  <div class='block-fluid'>                        
							<div class='head clearfix'>
								<div class='isw-favorite'></div>
									<h1>Update Email</h1>
							</div>    
								<input type='hidden' name='id_email' value='$q[id_email]' />
							<div class='row-form clearfix'>
								<div class='span3'>Nama Pemilik :</div>
								<div class='span5'>
								<input type='text' id='nama_email' name='nama_email' value='$q[nama_email]' class='required'/>
								</div>
							</div>
							<div class='row-form clearfix'>
								<div class='span3'>Alamat Email :</div>
								<div class='span5'>
										<input type='text' id='alamat_email' name='alamat_email' value='$q[alamat_email]' class='required'  />
								</div>
							</div>
							<div class='row-form clearfix'>
								<div class='span5'>
										<input type='submit' name='update' class='btn'  value='Update' />
										<input type='button' value= 'Cancel' class='btn' onclick='history.back()'>
								</div>
							</div>
							</div>
							</div>
							</div>
					</form>";
		break;
		}
		

?>