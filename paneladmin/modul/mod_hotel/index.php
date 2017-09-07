<?php 
	include "../config/connect.php";
	
	
	
	$aksi="modul/mod_hotel/aksi_hotel.php";
	$q = mysql_fetch_array(mysql_query("SELECT * from hotel "));
				
	echo "<form method='post' style='margin-top:-50px;' action='$aksi'   name='form_admin' id='form_admin'  class='form_admin'>	
				
				<div class='workplace form'>
					<div class='row-fluid'>
						<div class='span6'>
						  <div class='block-fluid'>                        
							<div class='head clearfix'>
								<div class='isw-favorite'></div>
									<h1>Hotel</h1>
							</div>    
							<div class='row-form clearfix'>
							<input type='text' name='id' value='$q[id]' />
								<div class='span3'>Nama Hotel :</div>
								<div class='span5'>
									<input type='text' id='nama_hotel' value='$q[nama_hotel]' name='nama_hotel' class='easyui-validatebox' required='true'/>
								</div>	
							</div>	
							<div class='row-form clearfix'>
								<div class='span3'>Alamat :</div>
								<div class='span5'>
									<textarea name='alamat'>$q[alamat]</textarea>
								</div>	
							</div>
							<div class='row-form clearfix'>
								<div class='span3'>Deskripsi :</div>
								<div class='span5'>
									<textarea name='deskripsi'>$q[deskripsi]</textarea>
								</div>	
							</div>
							
							<div class='row-form clearfix'>
								<div class='span3'>No Telp :</div>
								<div class='span5'>
									<input type='text' value='$q[no_telp]' name='no_telp'  />
								</div>	
							</div>	
							<div class='row-form clearfix'>
								<div class='span3'>Email :</div>
								<div class='span5'>
									<input type='text' value='$q[email]' name='email'  />
								</div>	
							</div>	
							
							<div class='row-form clearfix'>
								<input type='submit'   class='btn' value='Update' />
								<input type='button' value= 'Cancel'  class='btn' onclick='history.back()'>
							</div> 
					  </div> 
					
			</div> 
	</form>";
?>
		<div class="span6">
                    <div class="head clearfix">
                        <div class="isw-favorite"></div>
                        <h1>Data Hotel</h1>
                        <ul class="buttons">        
                            <li class="toggle"><a href="#"></a></li>
                        </ul> 
                    </div>
                    <div class="block news scrollBox">
                        <div class="scroll" style="height: 270px;">
                          <?php 
						  $tampil_request=mysql_query("select * from hotel");
						  while($request=mysql_fetch_array($tampil_request))
						  { 
						echo"<div class='item'>
                                <a href='#'></a>
								<h3>$request[nama_hotel]</br>
									$request[address] $request[state] 
								</h3><p>Tlp.$request[mobile_phone] </br>$request[deskripsi]  
								</p>
                                <p>".$request['alamat']."</p> - 
                                <p>".$request['no_telp']."</p></br>
                                <p>".$request['email']."</p>
                            </div>";
						  }
						  ?>
                        </div>
                    </div>
                </div>   
				</div> 
				</div> 