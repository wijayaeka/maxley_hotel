<?php
	echo "<div id='login-box1' class='login-popup'>
        <a href='#' class='close'><img src='images/close.png' class='btn_close' title='Close Window' alt='Close' /></a>
          <form method='post' class='signin' action='modul/mod_sidemenu/act/act_sd1.php'>
		  <input type='hidden' name=id_1 id='id_loginmodal'>
                <fieldset class='textbox'>
            	<label class='sidemenu_name'>
                <label>Menu Name (Indonesian)</label>
                <input id='sidemenu_name' name='sidemenu_name' value='' type='text' autocomplete='on' required='true' placeholder='Indonesian'>
                <label>Menu Name (english)</label>
                <input id='sidemenu_name_english' name='sidemenu_name_english' value='' type='text' autocomplete='on' required='true' placeholder='English'>
				</label>
				<label class='sidemenu_list_number'>
                <span>List Number</span>
				<input id='sidemenu_list_number' name='sidemenu_list_number' value='' type='number' autocomplete='on' required='true' placeholder='List Number (1, 2, ...)'>
                </label>
                <button class='submit button' type='submit' onClick='javascript:window.close(); window.opener.location.reload();' >Add Menu</button>
			</fieldset>
          </form>
		</div>";
		
?>