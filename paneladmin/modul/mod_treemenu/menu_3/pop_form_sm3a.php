<?php
	echo "<div id='login-box3a' class='login-popup'>
         <a href='#' class='close'><img src='images/cross.png' class='btn_close' title='Close Window' alt='Close' /></a>
          <form method='post' class='signin' action='modul/mod_treemenu/act/act_sm3a.php'>
		  <input type='hidden' name=id_3a id='id_loginmodal3a'>
            <div class='workplace form'>
				<div class='row'>
					<div class='span6'>
					<div class='block-fluid'>                         
					<div class='head clearfix'>
					<div class='isw-bookmark'></div>
					<h1>Input Menu Halaman Admin</h1>
					</div>
                <div class='row-form clearfix'>
						<div class='span3'>Nama(Bahasa):</div>
						<div class='span5'>
						<input id='menu_name' name='menu_name' value='' type='text' autocomplete='on' required='true' placeholder='Indonesian'>
					</div>
				</div>
				 <div class='row-form clearfix'>
						<div class='span3'>Nama(english):</div>
						<div class='span5'>
						<input id='menu_name_english' name='menu_name_english' value='' type='text' autocomplete='on' required='true' placeholder='English'>
						</div>
				</div>
				<div class='row-form '>
						<div class='span3'>Icon:</div>
						<div class='span5'>
											<select name='icon' id='s2' style='width: 20%;'>
												<option value='home'>home</option>
												<option value='bars'>bars</option>
												<option value='user'>user</option>
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
						</div>
				</div>
				<div class='row-form clearfix'>
						<div class='span3'>Urutan:</div>
						<div class='span5'>
						<input type='text' id='list_number' name='list_number' style='width: 20%;' required='true' placeholder='List Number (1, 2, ...)'>
						</div>
                </div>
				<div class='row-form clearfix'>
					<input type='submit'   class='btn' value='Simpan' onClick='javascript:window.close(); window.opener.location.reload();'/>
				</div> 
				</div> 
				</div> 
				</div> 
				</div> 
          </form>
		</div>";
		
?>