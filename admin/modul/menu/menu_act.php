
<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/connect.php";

$modules=$_GET[modules];
$gen=$_GET[gen];

// INSERT
if ($modules=='menu' AND $gen=='insert'){
	$q=mysql_query("SELECT title FROM article WHERE id_article = '$_POST[id_article]'");
	$w=mysql_fetch_array($q);
	$e=$w[title];
		mysql_query("INSERT INTO menu (id_article,
											menu_name,
											list)
									VALUES
										('$_POST[id_article]',
										'$e',
										'$_POST[list]')");
										
		mysql_query("UPDATE article SET menu_stats 	= 'mm'
									WHERE id_article= '$_POST[id_article]'");
	
	header('location:../../media.php?modules='.$modules);
}

// Update menu main
elseif ($modules=='menu' AND $gen=='update'){									
	$id_article=$_POST['id_article'];
	$ide=$_POST['id'];
	if($id_article==''){
		mysql_query("UPDATE article SET menu_stats 	= 'main_menu',
										id_menu		= '$_POST[id]'
									WHERE id_article= '$id_article'");
									
		mysql_query("UPDATE menu SET 	menu_name	='$_POST[menu_name]',
										list_number	='$_POST[list_number]'
								WHERE 
										id_menu	 	='$_POST[id]'");
	}else{
		while (list($key,$val)= each($id_article)){
		mysql_query("UPDATE article SET menu_stats 	= 'main_menu',
										id_menu		= '$_POST[id]'
									WHERE id_article= '$val'");
									
		mysql_query("UPDATE menu SET 	menu_name	='$_POST[menu_name]',
										list_number	='$_POST[list_number]'
								WHERE 
										id_menu	 	='$_POST[id]'");
		}	
	}
					
	header('location:../../media.php?modules='.$modules.'&gen=edit_menu&id='.$ide);
}

// Update menu sm1
elseif ($modules=='menu' AND $gen=='update_sm1'){
	$ide=$_POST['id'];
	$id_article=$_POST['id_article'];
	if($id_article==''){
		mysql_query("UPDATE article SET menu_stats 	= 'sm1',
										id_menu		= '$_POST[id]'
									WHERE id_article= '$id_article'");
		
		mysql_query("UPDATE menu SET 	menu_name	='$_POST[menu_name]',
										list_number	='$_POST[list_number]'
								WHERE 
										id_menu	 	='$_POST[id]'");
		
	}else{
		while (list($key,$val)= each($id_article)){
		mysql_query("UPDATE article SET menu_stats 	= 'sm1',
										id_menu		= '$_POST[id]'
									WHERE id_article= '$val'");
									
		mysql_query("UPDATE menu SET 	menu_name	='$_POST[menu_name]',
										list_number	='$_POST[list_number]'
								WHERE 
										id_menu	 	='$_POST[id]'");
		}
	}
	
	header('location:../../media.php?modules='.$modules.'&gen=edit_menu_sm1&id='.$ide);
}


// Update menu sm2
elseif ($modules=='menu' AND $gen=='update_sm2'){
	$ide=$_POST['id'];
	$id_article=$_POST['id_article'];
	if($id_article==''){
		mysql_query("UPDATE article SET menu_stats 	= 'sm2',
										id_menu		= '$_POST[id]'
									WHERE id_article= '$id_article'");
		
		mysql_query("UPDATE menu SET 	menu_name	='$_POST[menu_name]',
										list_number	='$_POST[list_number]'
								WHERE 
										id_menu	 	='$_POST[id]'");
		
	}else{
		while (list($key,$val)= each($id_article)){
		mysql_query("UPDATE article SET menu_stats 	= 'sm2',
										id_menu		= '$_POST[id]'
									WHERE id_article= '$val'");
									
		mysql_query("UPDATE menu SET 	menu_name	='$_POST[menu_name]',
										list_number	='$_POST[list_number]'
								WHERE 
										id_menu	 	='$_POST[id]'");
		}
	}
	header('location:../../media.php?modules='.$modules.'&gen=edit_menu_sm2&id='.$ide);
}


// Update menu sm3
elseif ($modules=='menu' AND $gen=='update_sm3'){
	$ide=$_POST['id'];
	$id_article=$_POST['id_article'];
	if($id_article==''){
		mysql_query("UPDATE article SET menu_stats 	= 'sm3',
										id_menu		= '$_POST[id]'
									WHERE id_article= '$id_article'");
		
		mysql_query("UPDATE menu SET 	menu_name	='$_POST[menu_name]',
										list_number	='$_POST[list_number]'
								WHERE 
										id_menu	 	='$_POST[id]'");
		
	}else{
		while (list($key,$val)= each($id_article)){
		mysql_query("UPDATE article SET menu_stats 	= 'sm3',
										id_menu		= '$_POST[id]'
									WHERE id_article= '$val'");
									
		mysql_query("UPDATE menu SET 	menu_name	='$_POST[menu_name]',
										list_number	='$_POST[list_number]'
								WHERE 
										id_menu	 	='$_POST[id]'");
		}
	}
	header('location:../../media.php?modules='.$modules.'&gen=edit_menu_sm3&id='.$ide);
}


// Update menu sm4
elseif ($modules=='menu' AND $gen=='update_sm4'){
	$ide=$_POST['id'];
	$id_article=$_POST['id_article'];
	if($id_article==''){
		mysql_query("UPDATE article SET menu_stats 	= 'sm4',
										id_menu		= '$_POST[id]'
									WHERE id_article= '$id_article'");
		
		mysql_query("UPDATE menu SET 	menu_name	='$_POST[menu_name]',
										list_number	='$_POST[list_number]'
								WHERE 
										id_menu	 	='$_POST[id]'");
		
	}else{
		while (list($key,$val)= each($id_article)){
		mysql_query("UPDATE article SET menu_stats 	= 'sm4',
										id_menu		= '$_POST[id]'
									WHERE id_article= '$val'");
									
		mysql_query("UPDATE menu SET 	menu_name	='$_POST[menu_name]',
										list_number	='$_POST[list_number]'
								WHERE 
										id_menu	 	='$_POST[id]'");
		}
	}
	header('location:../../media.php?modules='.$modules.'&gen=edit_menu_sm4&id='.$ide);
}


// Update menu sm5
elseif ($modules=='menu' AND $gen=='update_sm5'){
	$ide=$_POST['id'];
	$id_article=$_POST['id_article'];
	if($id_article==''){
		mysql_query("UPDATE article SET menu_stats 	= 'sm5',
										id_menu		= '$_POST[id]'
									WHERE id_article= '$id_article'");
		
		mysql_query("UPDATE menu SET 	menu_name	='$_POST[menu_name]',
										list_number	='$_POST[list_number]'
								WHERE 
										id_menu	 	='$_POST[id]'");
		
	}else{
		while (list($key,$val)= each($id_article)){
		mysql_query("UPDATE article SET menu_stats 	= 'sm5',
										id_menu		= '$_POST[id]'
									WHERE id_article= '$val'");
									
		mysql_query("UPDATE menu SET 	menu_name	='$_POST[menu_name]',
										list_number	='$_POST[list_number]'
								WHERE 
										id_menu	 	='$_POST[id]'");
		}
	}
	header('location:../../media.php?modules='.$modules.'&gen=edit_menu_sm5&id='.$ide);
}


//****************************************DELETE MENU******************************************//

//DELETE MAIN MENU
elseif($modules=='menu' AND $gen=='delete_main_menu'){
	$id_mn=$_GET[id];
	$id_mnu=mysql_query("SELECT * FROM article");
	mysql_query("UPDATE article SET menu_stats 		= '',
										id_menu		= '0'
								WHERE 
										id_menu		='$_GET[id]'");
										
	$b=$_GET[id];
	$id_mnu1=mysql_query("SELECT * FROM menu WHERE id_parent1 = '$b'");
	
		while($id_mn2=mysql_fetch_array($id_mnu1)){
			$c = $id_mn2[id_menu];
			$id_mnu2=mysql_query("SELECT * FROM menu WHERE id_parent1 = '$c'");
			mysql_query("UPDATE article SET menu_stats	= '',
										id_menu			= '0'
									WHERE 
											id_menu 	='$c' 
										OR id_menu 		='$b'");
			
			while($id_mn3=mysql_fetch_array($id_mnu2)){
				$d = $id_mn3[id_menu];
				mysql_query("UPDATE article SET menu_stats	= '',
											id_menu			= '0'
										WHERE 
												id_menu 	='$d' 
											OR id_menu 		='$c'");
											
			}
			
		}

	mysql_query("DELETE FROM menu WHERE id_menu = '$_GET[id]' OR id_parent1 = '$_GET[id]'");
	
	header('location:../../media.php?modules='.$modules);
}

//DELETE SM1
elseif($modules=='menu' AND $gen=='delete_sm1'){

	$b=$_GET[id];
	$id_mnu1=mysql_query("SELECT * FROM menu WHERE id_parent2 = '$b'");
	
		while($id_mn2=mysql_fetch_array($id_mnu1)){
			$c = $id_mn2[id_menu];
			$id_mnu2=mysql_query("SELECT * FROM menu WHERE id_parent2 = '$c'");
			mysql_query("UPDATE article SET menu_stats	= '',
										id_menu			= '0'
									WHERE 
											id_menu 	='$c' 
										OR id_menu 		='$b'");
			
			while($id_mn3=mysql_fetch_array($id_mnu2)){
				$d = $id_mn3[id_menu];
				$id_mnu3=mysql_query("SELECT * FROM menu WHERE id_parent1 = '$d'");
				mysql_query("UPDATE article SET menu_stats	= '',
											id_menu			= '0'
										WHERE 
												id_menu 	='$d' 
											OR id_menu 		='$c'");
											
				while($id_mn4=mysql_fetch_array($id_mnu3)){
					$e = $id_mn4[id_menu];
					mysql_query("UPDATE article SET menu_stats	= '',
												id_menu			= '0'
											WHERE 
													id_menu 	='$e' 
												OR id_menu 		='$d'");
				}	
				
			}
			
		}
    
	
									

	mysql_query("DELETE FROM menu WHERE id_menu = '$_GET[id]' OR id_parent2 = '$_GET[id]'");
	
	header('location:../../media.php?modules='.$modules);
}


//DELETE SM2
elseif($modules=='menu' AND $gen=='delete_sm2'){

	$a=$_GET[id];
	$id_mn=mysql_query("SELECT * FROM menu WHERE id_parent3 = '$a'");
	
	while($id_mn1=mysql_fetch_array($id_mn)){
		$b = $id_mn1[id_menu];
		$id_mnu1=mysql_query("SELECT * FROM menu WHERE id_parent3 = '$b'");
		mysql_query("UPDATE article SET menu_stats		= '',
										id_menu			= '0'
									WHERE 
											id_menu 	='$b' 
										OR id_menu 		='$a'");
										
		while($id_mn2=mysql_fetch_array($id_mnu1)){
			$c = $id_mn2[id_menu];
			$id_mnu2=mysql_query("SELECT * FROM menu WHERE id_parent2 = '$c'");
			mysql_query("UPDATE article SET menu_stats	= '',
										id_menu			= '0'
									WHERE 
											id_menu 	='$c' 
										OR id_menu 		='$b'");
			
			while($id_mn3=mysql_fetch_array($id_mnu2)){
			$d = $id_mn3[id_menu];
			mysql_query("UPDATE article SET menu_stats	= '',
										id_menu			= '0'
									WHERE 
											id_menu 	='$d' 
										OR id_menu 		='$c'");
			}
			
		}
    
	}

	mysql_query("DELETE FROM menu WHERE id_menu = '$_GET[id]' OR id_parent3 = '$_GET[id]'");
	
	header('location:../../media.php?modules='.$modules);
}


//DELETE SM3
elseif($modules=='menu' AND $gen=='delete_sm3'){

	$a=$_GET[id];
	$id_mn=mysql_query("SELECT * FROM menu WHERE id_parent4 = '$a'");
	
	while($id_mn1=mysql_fetch_array($id_mn)){
		$b = $id_mn1[id_menu];
		$id_mnu1=mysql_query("SELECT * FROM menu WHERE id_parent4 = '$b'");
		mysql_query("UPDATE article SET menu_stats		= '',
										id_menu			= '0'
									WHERE 
											id_menu 	='$b' 
										OR id_menu 		='$a'");
										
		while($id_mn2=mysql_fetch_array($id_mnu1)){
			$c = $id_mn2[id_menu];
			mysql_query("UPDATE article SET menu_stats	= '',
										id_menu			= '0'
									WHERE 
											id_menu 	='$c' 
										OR id_menu 		='$b'");
		}
    
	}
	
	
	mysql_query("DELETE FROM menu WHERE id_menu = '$_GET[id]' OR id_parent4 = '$_GET[id]'");
	
	header('location:../../media.php?modules='.$modules);
}

//DELETE SM4
elseif($modules=='menu' AND $gen=='delete_sm4'){
	$id_mnu=$_GET[id];
	$id_mn=mysql_query("SELECT * FROM menu WHERE id_parent5 = '$id_mnu'");
	
	while($id_mn1=mysql_fetch_array($id_mn)){
            $b = $id_mn1[id_menu];
           mysql_query("UPDATE article SET menu_stats 		= '',
									id_menu			= '0'
								WHERE 
										id_menu ='$b' 
									OR id_menu ='$id_mnu'");
    }
	

	mysql_query("DELETE FROM menu WHERE id_menu = '$_GET[id]' OR id_parent5 = '$_GET[id]'");
	
	header('location:../../media.php?modules='.$modules);
}

//DELETE SM5
elseif($modules=='menu' AND $gen=='delete_sm5'){
	mysql_query("UPDATE article SET menu_stats 		= '',
									id_menu			= '0'
								WHERE 
										id_menu		='$_GET[id]'");

	mysql_query("DELETE FROM menu WHERE id_menu = '$_GET[id]'");
	
	header('location:../../media.php?modules='.$modules);
}


}
?>
