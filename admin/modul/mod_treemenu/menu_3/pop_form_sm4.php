<?php
	echo "<div id='login-box4' class='login-popup'>
        <a href='#' class='close'><img src='images/close_pop.png' class='btn_close' title='Close Window' alt='Close' /></a>
          <form method='post' class='signin' action='modul/mod_treemenu/act/act_sm4.php'>
		  <input type='hidden' name=id_4 id='id_loginmodal4'>
                <fieldset class='textbox'>
            	<label class='menu_name'>
                <label>Menu Name (Indonesian)</label>
                <input id='menu_name' name='menu_name' value='' type='text' autocomplete='on' required='true' placeholder='Indonesian'>
                <label>Menu Name (english)</label>
                <input id='menu_name_english' name='menu_name_english' value='' type='text' autocomplete='on' required='true' placeholder='English'>
				</label>
				<label>Icon</label><small> *kosongkan bila tidak perlu</small>
											<select name='icon'>
												<option value=''> - select icon - </option>
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
				<label class='list_number'>
                <span>List Number</span>
				<input id='list_number' name='list_number' value='' type='number' autocomplete='on' required='true' placeholder='List Number (1, 2, ...)'>
                </label>
                <button class='submit button' type='submit' onClick='javascript:window.close(); window.opener.location.reload();' >Add Menu</button>
			</fieldset>
          </form>
		</div>";
		
?>