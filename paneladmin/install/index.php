<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Installation Management</title>
<link rel="stylesheet" href="../css_login/style.default.css" type="text/css" />
<link rel="stylesheet" href="../css/style.shinyblue.css" type="text/css" />

<script type="text/javascript" src="../js_login/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../js_login/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="../js_login/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="../js_login/modernizr.min.js"></script>
<script type="text/javascript" src="../js_login/bootstrap.min.js"></script>
<script type="text/javascript" src="../js_login/jquery.cookie.js"></script>
<script type="text/javascript" src="../js_login/custom.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#login').submit(function(){
            var u = jQuery('#username').val();
            var p = jQuery('#password').val();
            if(u == '' && p == '') {
                jQuery('.login-alert').fadeIn();
                return false;
            }
        });
    });
</script>
<style>
.panel{
	background:transparent;
	padding:10px 10px;
	border-radius: 5px 5px;
	margin-top: -150px;
}

/*######## Smart Green ########*/
.smart-green {
    margin-left:auto;
    margin-right:auto;
    max-width: 800px;
    background: #F8F8F8;
    padding: 30px 30px 20px 30px;
    font: 12px Arial, Helvetica, sans-serif;
    color: #666;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
}
.smart-green h1 {
    font: 24px "Trebuchet MS", Arial, Helvetica, sans-serif;
    padding: 20px 0px 20px 40px;
    display: block;
    margin: -30px -30px 10px -30px;
    color: #FFF;
    background: #9DC45F;
    text-shadow: 1px 1px 1px #949494;
    border-radius: 5px 5px 0px 0px;
    -webkit-border-radius: 5px 5px 0px 0px;
    -moz-border-radius: 5px 5px 0px 0px;
    border-bottom:1px solid #89AF4C;

}
.smart-green2 h1 {
    font: 24px "Trebuchet MS", Arial, Helvetica, sans-serif;
    padding: 20px 0px 20px 40px;
    display: block;
    margin: -30px -30px 10px -30px;
    color: #FFF;
    background: #FFB900;
    text-shadow: 1px 1px 1px #949494;
    border-radius: 5px 5px 0px 0px;
    -webkit-border-radius: 5px 5px 0px 0px;
    -moz-border-radius: 5px 5px 0px 0px;
    border-bottom:1px solid #89AF4C;

}
.red h1 {
    font: 24px "Trebuchet MS", Arial, Helvetica, sans-serif;
    padding: 20px 0px 20px 40px;
    display: block;
    margin: -30px -30px 10px -30px;
    color: #FFF;
    background: red;
    text-shadow: 1px 1px 1px #949494;
    border-radius: 5px 5px 0px 0px;
    -webkit-border-radius: 5px 5px 0px 0px;
    -moz-border-radius: 5px 5px 0px 0px;
    border-bottom:1px solid #89AF4C;

}

.smart-green h1>span {
    display: block;
    font-size: 11px;
    color: #FFF;
}

.smart-green label {
    display: block;
    margin: 0px 0px 5px;
}
.smart-green label>span {
    float: left;
    margin-top: 10px;
    color: #5E5E5E;
}
.smart-green input[type="text"], .smart-green input[type="email"], .smart-green textarea, .smart-green select {
    color: #555;
    height: 30px;
    line-height:15px;
    width: 100%;
    padding: 0px 0px 0px 10px;
    margin-top: 2px;
    border: 1px solid #E5E5E5;
    background: #FBFBFB;
    outline: 0;
    -webkit-box-shadow: inset 1px 1px 2px rgba(238, 238, 238, 0.2);
    box-shadow: inset 1px 1px 2px rgba(238, 238, 238, 0.2);
    font: normal 14px/14px Arial, Helvetica, sans-serif;
}
.smart-green textarea{
    height:100px;
    padding-top: 10px;
}
.smart-green select {
    background: url('down-arrow.png') no-repeat right, -moz-linear-gradient(top, #FBFBFB 0%, #E9E9E9 100%);
    background: url('down-arrow.png') no-repeat right, -webkit-gradient(linear, left top, left bottom, color-stop(0%,#FBFBFB), color-stop(100%,#E9E9E9));
   appearance:none;
    -webkit-appearance:none;
   -moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: '';
    width:100%;
    height:30px;
}
.smart-green .button {
    background-color: #9DC45F;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-border-radius: 5px;
    border: none;
    padding: 10px 25px 10px 25px;
    color: #FFF;
    text-shadow: 1px 1px 1px #949494;
}

.smart-green2 .button {
    background-color: #FFB900;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-border-radius: 5px;
    border: none;
    padding: 10px 25px 10px 25px;
    color: #FFF;
    text-shadow: 1px 1px 1px #949494;
}
.red .button {
    background-color: red;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-border-radius: 5px;
    border: none;
    padding: 10px 25px 10px 25px;
    color: #FFF;
    text-shadow: 1px 1px 1px #949494;
}

.smart-green .button:hover {
    background-color:#80A24A;
}

#splash{
}
#splash .loaded{
    display:none;
}
#splash_loading{
	 display:none;
    background:url(key.gif) no-repeat;
	z-index:999;
	margin: 0 auto;	
	cursor:wait;
    height:100px;
    width:250px;
}
.left{
	float:right;
	position:relative;
}
.center{
	text-align:center;
	font-weight:bold;
	font-transform:uppercase;
}
</style>

<script src="../js/jquery.min.js"></script>
<script>
$(document).ready(function(){

	$('#form_hotel').submit(function(){
		$.ajax({
				type:'POST',
				url:$(this).attr('action'),
				data:$(this).serialize(),
				success: function(){
						$('#form_hotel').fadeOut(3000);
						
					setTimeout(function(){window.location.replace('index.php?act=data_user');}, 4000);
				}
		})
		return false;
	});
	
	
	$('#server_form').submit(function(){
		$.ajax({
				type:'POST',
				url:$(this).attr('action'),
				data:$(this).serialize(),
				success: function(){
						
						$('#server_form').hide();
						$('#splash_loading').fadeIn(3000);
						$('#splash_loading').fadeOut('fast');
						window.location.replace('index.php?act=create_database');
				}
		})
		return false;
	});
	
	
	
	$('#database_form').submit(function(){
		$.ajax({
				type:'POST',
				url:$(this).attr('action'),
				data:$(this).serialize(),
				success: function(){
						
						$('#server_form').hide();
						$('#splash_loading').fadeIn(3000);
						$('#splash_loading').fadeOut('fast');
						// 
						$('.progress .bar').each(function() {
						var me = $(this);
						var perc = me.attr("data-percentage");

						var current_perc = 0;

						var progress = setInterval(function() {
							if (current_perc>=perc) {
								clearInterval(progress);
							} else {
								current_perc +=1;
								me.css('width', (current_perc)+'%');
							}

							me.text((current_perc)+'%');

						}, 50);
						
					});
					setTimeout(function(){window.location.replace('index.php?act=data_hotel');}, 9000);
					}
						})
						return false;
					});
	
	$('#form_admin').submit(function(){
		$.ajax({
				type:'POST',
				url:$(this).attr('action'),
				data:$(this).serialize(),
				success: function(){
						
						$('#form_admin').fadeOut('slow');
						setTimeout(function(){window.location.replace('index.php?act=sukses');}, 4000);
					}
						})
						return false;
					});
	
	
})


</script>
</head>

<body class="loginpage" style="background:url(../img/bg.png)">
<div class="loginpanel ">
    <div class="loginpanelinner panel">
<?php 
switch ($_GET['act']){
default:
?>
        <div class="logo animate0 bounceIn"><img src="../img/logo.png" alt="" /></div>
      <form id="login" action="<?php echo"$_SERVER[PHP_SELF]?act=install"; ?>" method="post">
            <div class="inputwrapper animate1 bounceIn">
                Installation System Maxley Indonesia Client
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </div>
            <div class="inputwrapper animate3 bounceIn">
                <button name="submit">Install</button>
            </div>
        </form>

</div>
    
</div><!--loginpanelinner-->
</div><!--loginpanel-->
<?php 
break;
case "install":
?>
<div class='span6  animate0 bounceIn'>
						  <div class='block-fluid'>
	<form action="aksi_install.php?act=server_conf" id='server_form' class="smart-green ">
    <h1>Server Configuration</h1>
    <label>
        <span>Server Host :</span>
        <input class='span3' id="hostname" type="text" name="host" placeholder="Hostname" required="true"/>
    </label>
   
    <label>
        <span>Username:</span>
        <input id="username" type="text" name="username" placeholder="username" required="true" />
    </label>
   
    <label>
        <span>Password:</span>
        <input id="password" type="text" name="password" placeholder="password"  />
    </label>  	
     <label>
        <span>&nbsp;</span>
        <input type="submit" class="button" value="Save" />
    </label>    
</form>

</div>
</div>

<?php
break;
case "create_database":
?>
<div class='span6  animate2 bounceIn'>
	<div class='block-fluid'>
	<form action="aksi_install.php?act=create_db" id="database_form" method="post"  class="smart-green smart-green2">
    <h1>Create database
        <span>Please fill all the texts in the fields.</span>
    </h1>
    <label>
        <span>DB Name :</span>
        <input class='span3' id="database" type="text" name="database" placeholder="dbname" required="true"/>
    </label>
	<label>
        <span>&nbsp;</span>
        <input type="submit" class="button" value="Save" />
    </label>
</form><div class="progress progress-success">
<div class="bar" style="float: left; width: 0%; " data-percentage="100"></div>
</div>
</div>
</div>

<?php

break;

case "data_hotel";
?>
<div class='span6  animate3 bounceIn'>
						  <div class='block-fluid'>
	<form method='post'   name='form_admin' id='form_hotel' action="aksi_install.php?act=create_hotel"  class='smart-green red'>	
				<div class='workplace form'>
					<div class='row-fluid'>
						<div class='span12'>
									<h1>Maxley Hotel Reservation System<span>Please fill all the texts in the fields.</span></h1> 
							<div class="logo animate0 bounceIn"><img src="../img/logo.png" alt="" /></div>
							
							<div class='row-form clearfix'>
								<div class='span3'>Nama Hotel :</div>
								<div class='span7'>
									<input type='text' id='nama_hotel'  name='nama_hotel'  class='easyui-validatebox' required='true'/>
								</div>	
							</div>	
							<div class='row-form clearfix'>
								<div class='span3'>Alamat :</div>
								<div class='span7'>
									<textarea name='alamat'></textarea>
								</div>	
							</div>
							<div class='row-form clearfix'>
								<div class='span3'>Deskripsi :</div>
								<div class='span7'>
									<textarea name='deskripsi'></textarea>
								</div>	
							</div>
							
							<div class='row-form clearfix'>
								<div class='span3'>No Telp :</div>
								<div class='span7'>
									<input type='text'  name='no_telp'  />
								</div>	
							</div>	
							<div class='row-form clearfix'>
								<div class='span3'>Email :</div>
								<div class='span7'>
									<input type='text'  name='email'  />
								</div>	
							</div>	
							
							<div class='row-form clearfix'>
								<input type='submit'  class="button red"  value='Save' />
							</div> 
					  </div> 
					
			</div> 
	</form>
			<div id="splash_loading"></div>
</div>
</div>


<?php
break;


case "data_user";
?>
<div class='span6  animate3 bounceIn'>
						  <div class='block-fluid'>
	<form method='post'   name='form_admin' id='form_admin' action="aksi_install.php?act=create_user"  class='smart-green green'>	
				<div class='workplace form'>
					<div class='row-fluid'>
						<div class='span12'>
								<div class="logo animate0 bounceIn left"><img src="../img/users/olga.jpg" alt="" /></div>
									<h1>User Admin<span>Please fill all the texts in the fields.</span></h1>
								<div class='row-form clearfix'>
								<div class='span3'>Nama Lengkap:</div>
								<div class='span5'>
									<input type='text' id='nama_lengkap' name='nama_lengkap' class='easyui-validatebox' required='true'/>
								</div>	
							</div>	
							<div class='row-form clearfix'>
								<div class='span3'>Username :</div>
								<div class='span5'>
									<input type='text' id='username' name='username'   class='easyui-validatebox' required='true'/>
								</div>	
							</div>	
							<div class='row-form clearfix'>
								<div class='span3'>Password :</div>
								<div class='span5'>
									<input type='password' id='password' name='password' class='easyui-validatebox' required='true' />
								</div>	
							</div>	
							<div class='row-form clearfix'>
								<div class='span3'>Status :</div>
								<div class='span5'>
										<select name='status' class='easyui-validatebox' id='s2_1'required='true' style='width: 100%;'>
												<option> - Select Status -</option>
												<option value='superadmin'>Super Admin</option>
												<option value='admin'> Admin</option>
										</select>
								</div>	
								</div>
							<div class='row-form clearfix'>
								<input type='submit'  class="button red"  value='Save' />
							</div> 
					  </div> 
					
			</div> 
	</form>
		<div id="splash_loading"></div>
</div>
</div>


<?php
break;

 case "sukses";
 ?>
 
<div class='span6  animate0 bounceIn'>
						  <div class='block-fluid'>
	<form action="aksi_install.php?act=server_conf" id='server_form' class="smart-green ">
    <h1>Congratulation !</h1>
	<span>
	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
	</span></br>
	<h5 class='center'><a href="<?php echo"$_SERVER[PHP_SELF]?act=delete"; ?>"> Delete "Install" Directory </a></h5>
</form>

</div>
</div>

 
 <?php
 if($_GET[act] == 'delete')  {
	
$dir = "../install";
 ftp_rmdir($_SERVER['HTTP_HOST'], $dir);
// try to delete $dir
if ($a)
  {
	?><script>alert('Directory Install Success deleted')</script><?php
  }
else
  {
  echo "Problem deleting $dir";
  }
  
ftp_close($ftp_conn);
 }
 
 break;
 
}?>
</body>
</html>
