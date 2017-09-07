<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
       <title>Login Page</title>
	   <link rel="shortcut icon" href="../img/favicon.ico" />
        <style>
        /*	--------------------------------------------------
	Reveal Modals
	-------------------------------------------------- */
		


p{
	padding:5px 0px;
}
.wrapper{
	width:100%;
	margin-top: 120px;
	

}
.box{
	width:49%;
}
.left{
	float:left;
}
.right{
	float:right;
}
.clear{
	clear:both;
}
a.back{
	color:#777;
	position:fixed;
	top:5px;
	right:10px;
	text-decoration:none;
}
/* Pagination */
.pagination{padding: 10px 0;font-size: 11px; 	border-top:2px solid #4D4D4D;  }
.pagination a {padding: 4px 5px; color: #333; margin: 0 1px; background:#efefef; border:1px solid #ddd; text-decoration: none;}
.pagination a:hover {background:#666; color: #fff; border:1px solid #333;}
.pagination strong {font-weight:bold;padding: 4px 5px; margin: 0 1px; border:1px solid #888888;}
.pagination-info{font-size:11px; padding: 6px 0 0 0;}
/* Form Style */

.form_wrapper{
	margin:0 auto;
	position:relative;
	padding-top:70px;
	background:#fff;
	border:1px solid #ddd;
	width:350px;
	font-size:16px;
	-moz-box-shadow:1px 1px 7px #ccc;
	-webkit-box-shadow:1px 1px 7px #ccc;
	box-shadow:1px 1px 7px #ccc;
}
#format p {
			font: 12px Century Gothic;

		}
.form_wrapper h3{
	margin-top:-50px;
	padding-top:0px;
	background-color:#444;
	color:#fff;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
	font-family: 'Economica', Arial, sans-serif;
	font-size:25px;
	border-bottom:1px solid #ddd;
	
}
.form_wrapper form{
	display:none;
	background:#fff;
}
.form_wrapper .column{
	width:47%;
	float:left;
}
form.active{
	display:block;
}
form.login{
	width:350px;
}
form.register{
	width:550px;
}
form.forgot_password{
	width:300px;
}
.form_wrapper a{
	text-decoration:none;
	color:#777;
	font-size:12px;
}
.form_wrapper a:hover{
	color:#000;
}
.form_wrapper label{
	display:block;
	padding:10px 30px 0px 30px;
	margin:10px 0px 0px 0px;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
	font-family: 'Economica', Arial, sans-serif;
}
.form_wrapper input[type="text"],
.form_wrapper input[type="password"]{
	border: solid 1px #E5E5E5;
	background: #FFFFFF;
	margin: 5px 30px 0px 30px;
	padding: 9px;
	display:block;
	font-size:16px;
	width:76%;
	background: 
		-webkit-gradient(
			linear,
			left top,
			left 25,
			from(#FFFFFF),
			color-stop(4%, #EEEEEE),
			to(#FFFFFF)
		);
	background: 
		-moz-linear-gradient(
			top,
			#FFFFFF,
			#EEEEEE 1px,
			#FFFFFF 25px
			);
	-moz-box-shadow: 0px 0px 8px #f0f0f0;
	-webkit-box-shadow: 0px 0px 8px #f0f0f0;
	box-shadow: 0px 0px 8px #f0f0f0;
}
.form_wrapper input[type="text"]:focus,
.form_wrapper input[type="password"]:focus{
	background:#feffef;
}
.form_wrapper .bottom{
	background-color:#444;
	border-top:1px solid #ddd;
	margin-top:20px;
	clear:both;
	color:#fff;
	text-shadow:1px 1px 1px #000;
}
.form_wrapper .bottom a{
	display:block;
	clear:both;
	padding:10px 30px;
	text-align:right;
	color:#ffa800;
	text-shadow:1px 1px 1px #000;
}
.form_wrapper a.forgot{
	float:right;
	font-style:italic;
	line-height:24px;
	color:#ffa800;
	text-shadow:1px 1px 1px #fff;
}
.form_wrapper a.forgot:hover{
	color:#000;
}
.form_wrapper div.remember{
	float:left;
	width:140px;
	margin:20px 0px 20px 30px;
	font-size:11px;
}
.form_wrapper div.remember input{
	float:left;
	margin:2px 5px 0px 0px;
}
.form_wrapper span.error{
	visibility:hidden;
	color:red;
	font-size:11px;
	font-style:italic;
	display:block;
	margin:4px 30px;
}
.form_wrapper input[type="submit"] {
	background: #e3e3e3;
	border: 1px solid #ccc;
	color: #333;
	font-family: "Trebuchet MS", "Myriad Pro", sans-serif;
	font-size: 14px;
	font-weight: bold;
	padding: 8px 0 9px;
	text-align: center;
	width: 150px;
	cursor:pointer;
	float:right;
	margin:15px 20px 10px 10px;
	text-shadow: 0px 1px 0px #fff;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	-moz-box-shadow: 0px 0px 2px #fff inset;
	-webkit-box-shadow: 0px 0px 2px #fff inset;
	box-shadow: 0px 0px 2px #fff inset;
}
.form_wrapper input[type="submit"]:hover {
	background: #d9d9d9;
	-moz-box-shadow: 0px 0px 2px #eaeaea inset;
	-webkit-box-shadow: 0px 0px 2px #eaeaea inset;
	box-shadow: 0px 0px 2px #eaeaea inset;
	color: #222;
}
.content{	
		position:relative;
		margin:0 auto;
		}
		</style>
		 <script type="text/javascript">
					function validasi(form){
					if (form.username.value == ""){
					alert("Anda belum mengisi Username");
					form.username.focus();
					return (false);
					}
						 
					if (form.password.value == ""){
					alert("Anda belum mengisi Password");
					form.password.focus();
					return (false);
					}
					return (true);
					}
		</script>
		
    </head>
    <body>
		<div class="wrapper">
				
			<div class="content">
				<div  class="form_wrapper">
					
					<form class="login active" method="POST" action="cek_login.php" onSubmit="return validasi(this)">
						<h3></h3>
						<div>
							<label>Username:</label>
							<input type="text" name="username" id="username"/>
							
						</div>
						<div>
							<label>Password: </label>
							<input type="password" name="password" id="password"/>
							
						</div>
						<div class="bottom">
							
						<input type="submit" value="Login" id="submit"></input>
							
							<div class="clear"></div>
						</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>
		
		</div>
		

		<!-- The JavaScript -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		
    </body>
</html>
</body>
</html>