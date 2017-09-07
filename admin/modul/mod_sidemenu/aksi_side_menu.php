<?php 

include "../../../config/connect.php";
$page = $_GET['page'];
$act = $_GET['act'];
$gen = $_GET['gen'];

$id_sidemenu = $_POST['id_sidemenu'];
$urutan = $_POST['urutan'];
$sidemenu_name_english = $_POST['sidemenu_name_english'];
$sidemenu_name = $_POST['sidemenu_name'];
$sidemenu_name_english = $_POST['sidemenu_name_english'];
$initial = strtolower($sidemenu_name_english);
$link = str_replace(' ','-',$initial);
if($page == 'side_menu' AND $act == 'update_sidemenu' )
	{
			$id_sidemenu=$_POST['id_sidemenu'];
			$id_article=$_POST['id_article'];
			mysql_query(" update side_menu set sidemenu_name='$sidemenu_name', sidemenu_link='$link',  sidemenu_name_english='$sidemenu_name_english', sidemenu_list_number = '$urutan' where id_sidemenu = '$id_sidemenu' ");
			if($id_article==''){
				mysql_query("UPDATE article SET sidemenu_stats 	= 'sd',
												id_sidemenu		= '$id_sidemenu'
											WHERE id_article= '$id_article'");
				
			}else{
				while (list($key,$val)= each($id_article)){
				mysql_query("UPDATE article SET sidemenu_stats 	= 'sd',
												id_sidemenu		= '$id_sidemenu'
											WHERE id_article= '$val'");
				}
			}
	
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

else if($page == 'side_menu' AND $act == 'update_sd' )
	{
			$id_sidemenu=$_POST['id_sidemenu'];
			$id_article=$_POST['id_article'];
			if($id_article==''){
				mysql_query("UPDATE article SET sidemenu_stats 	= 'sd',
												id_sidemenu		= '$id_sidemenu'
											WHERE id_article= '$id_article'");
				
			}else{
				while (list($key,$val)= each($id_article)){
				mysql_query("UPDATE article SET sidemenu_stats 	= 'sd',
												id_sidemenu		= '$id_sidemenu'
											WHERE id_article= '$val'");
				}
			}
	
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

else if($page == 'side_menu' AND $act == 'update_sd1' )
	{
			$id_sidemenu=$_POST['id_sidemenu'];
			$id_article=$_POST['id_article'];
			if($id_article==''){
				mysql_query("UPDATE article SET sidemenu_stats 	= 'sd1',
												id_sidemenu		= '$id_sidemenu'
											WHERE id_article= '$id_article'");
				
			}else{
				while (list($key,$val)= each($id_article)){
				mysql_query("UPDATE article SET sidemenu_stats 	= 'sd1',
												id_sidemenu		= '$id_sidemenu'
											WHERE id_article= '$val'");
				}
			}
	
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

else if($page == 'side_menu' AND $act == 'update_sd2' )
	{
			$id_menu=$_POST['id_menu'];
			$id_article=$_POST['id_article'];
			if($id_article==''){
				mysql_query("UPDATE article SET sidemenu_stats 	= 'sd2',
												id_sidemenu	= '$id_sidemenu'
											WHERE id_article= '$id_article'");
				
			}else{
				while (list($key,$val)= each($id_article)){
				mysql_query("UPDATE article SET sidemenu_stats 	= 'sd2',
												id_sidemenu		= '$id_sidemenu'
											WHERE id_article= '$val'");
				}
			}
	
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
else if($page == 'side_menu' AND $act == 'update_sd3' )
	{
			$id_sidemenu=$_POST['id_sidemenu'];
			$id_article=$_POST['id_article'];
			if($id_article==''){
				mysql_query("UPDATE article SET sidemenu_stats 	= 'sd3',
												id_sidemenu		= '$id_sidemenu'
											WHERE id_article= '$id_article'");
				
			}else{
				while (list($key,$val)= each($id_article)){
				mysql_query("UPDATE article SET sidemenu_stats 	= 'sd3',
												id_sidemenu		= '$id_sidemenu'
											WHERE id_article= '$val'");
				}
			}
	
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

else if($page == 'side_menu' AND $act == 'update_sd4' )
	{
			$id_menu=$_POST['id_menu'];
			$id_article=$_POST['id_article'];
			if($id_article==''){
				mysql_query("UPDATE article SET sidemenu_stats 	= 'sd4',
												id_sidemenu		= '$id_sidemenu'
											WHERE id_article= '$id_article'");
				
			}else{
				while (list($key,$val)= each($id_article)){
				mysql_query("UPDATE article SET sidemenu_stats 	= 'sd4',
												id_sidemenu	= '$id_sidemenu'
											WHERE id_article= '$val'");
				}
			}
	
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

else if($page == 'side_menu' AND $act == 'update_sd5' )
	{
			$id_sidemenu=$_POST['id_sidemenu'];
			$id_article=$_POST['id_article'];
			if($id_article==''){
				mysql_query("UPDATE article SET sidemenu_stats 	= 'sd5',
												id_sidemenu	= '$id_sidemenu'
											WHERE id_article= '$id_article'");
				
			}else{
				while (list($key,$val)= each($id_article)){
				mysql_query("UPDATE article SET menu_stats 	= 'sd5',
												id_sidemenu		= '$id_sidemenu'
											WHERE id_article= '$val'");
				}
			}
	
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
// =================================== DELETE MENU ==========================================



//DELETE MAIN MENU
else if($page =='side_menu' AND $gen=='delete_side_menu'){
	mysql_query("UPDATE article SET sidemenu_stats 		= '',
										id_sidemenu	= '0'
								WHERE 
										id_sidemenu		='$_GET[id]'");
										
	$b=$_GET[id];
	$id_mnu1=mysql_query("SELECT * FROM side_menu WHERE id_sidemenu_parent1 = '$b'");
	
		while($id_mn2=mysql_fetch_array($id_mnu1)){
			$c = $id_mn2[id_menu];
			$id_mnu2=mysql_query("SELECT * FROM side_menu WHERE id_sidemenu_parent1 = '$c'");
			mysql_query("UPDATE article SET sidemenu_stats	= '',
										id_menu			= '0'
									WHERE 
											id_menu 	='$c' 
										OR id_menu 		='$b'");
			
			while($id_mn3=mysql_fetch_array($id_mnu2)){
				$d = $id_mn3[id_menu];
				mysql_query("UPDATE article SET sidemenu_stats	= '',
											id_menu			= '0'
										WHERE 
												id_menu 	='$d' 
											OR id_menu 		='$c'");
											
			}
			
		}

	mysql_query("DELETE FROM side_menu WHERE id_sidemenu = '$_GET[id]' OR id_sidemenu_parent1 = '$_GET[id]'");
	
	header('location:../../media.php?page='.$page);
}

//DELETE SM1
else if($page=='side_menu' AND $gen=='delete_sd1'){
	mysql_query("UPDATE article SET sidemenu_stats 		= '',
										id_sidemenu		= '0'
								WHERE 
										id_sidemenu		='$_GET[id]'");
	$b=$_GET[id];
	$id_mnu1=mysql_query("SELECT * FROM side_menu WHERE id_sidemenu_parent2 = '$b'");
	
		while($id_mn2=mysql_fetch_array($id_mnu1)){
			$c = $id_mn2[id_menu];
			$id_mnu2=mysql_query("SELECT * FROM side_menu WHERE id_sidemenu_parent2 = '$c'");
			mysql_query("UPDATE article SET sidemenu_stats	= '',
										id_sidemenu		= '0'
									WHERE 
											id_sidemenu	='$c' 
										OR id_sidemenu 		='$b'");
			
			while($id_mn3=mysql_fetch_array($id_mnu2)){
				$d = $id_mn3[id_sidemenu];
				$id_mnu3=mysql_query("SELECT * FROM side_menu WHERE id_sidemenu_parent1 = '$d'");
				mysql_query("UPDATE article SET sidemenu_stats	= '',
											id_sidemenu		= '0'
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
    
	
									

	mysql_query("DELETE FROM menu WHERE id_sidemenu = '$_GET[id]' OR id_sidemenu_parent2 = '$_GET[id]'");
	
	header('location:../../media.php?page='.$page);
}


//DELETE SM2
elseif($page=='side_menu' AND $gen=='delete_sd2'){
	$id_mn=$_GET[id];
	$id_mnu=mysql_query("SELECT * FROM article");
	mysql_query("UPDATE article SET sidemenu_stats 		= '',
										id_sidemenu		= '0'
								WHERE 
										id_sidemenu		='$_GET[id]'");
	$a=$_GET[id];
	$id_mn=mysql_query("SELECT * FROM side_menu WHERE id_sidemenu_parent3 = '$a'");
	
	while($id_mn1=mysql_fetch_array($id_mn)){
		$b = $id_mn1[id_menu];
		$id_mnu1=mysql_query("SELECT * FROM menu WHERE id_sidemenu_parent3 = '$b'");
		mysql_query("UPDATE article SET sidemenu_stats		= '',
										id_menu			= '0'
									WHERE 
											id_sidemenu 	='$b' 
										OR id_sidemenu 		='$a'");
										
		while($id_mn2=mysql_fetch_array($id_mnu1)){
			$c = $id_mn2[id_menu];
			$id_mnu2=mysql_query("SELECT * FROM side_menu WHERE id_sidemenu_parent2 = '$c'");
			mysql_query("UPDATE article SET menu_stats	= '',
										id_sidemenu			= '0'
									WHERE 
											id_sidemenu 	='$c' 
										OR id_sidemenu		='$b'");
			
			while($id_mn3=mysql_fetch_array($id_mnu2)){
			$d = $id_mn3[id_menu];
			mysql_query("UPDATE article SET sidemenu_stats	= '',
										id_menu			= '0'
									WHERE 
											id_sidemenu	='$d' 
										OR id_sidemenu 		='$c'");
			}
			
		}
    
	}

	mysql_query("DELETE FROM side_menu WHERE id_sidemenu = '$_GET[id]' OR id_parent3 = '$_GET[id]'");
	
	header('location:../../media.php?page='.$page);
}


//DELETE SM3
elseif($page=='side_menu' AND $gen=='delete_sd3'){
	$id_mn=$_GET[id];
	$id_mnu=mysql_query("SELECT * FROM article");
	mysql_query("UPDATE article SET sidemenu_stats 		= '',
										id_sidemenu	= '0'
								WHERE 
										id_sidemenu		='$_GET[id]'");
	$a=$_GET[id];
	$id_mn=mysql_query("SELECT * FROM side_menu WHERE id_sidemenu_parent4 = '$a'");
	
	while($id_mn1=mysql_fetch_array($id_mn)){
		$b = $id_mn1[id_sidemenu];
		$id_mnu1=mysql_query("SELECT * FROM side_menu WHERE id_sidemenu_parent4 = '$b'");
		mysql_query("UPDATE article SET menu_stats		= '',
										id_sidemenu			= '0'
									WHERE 
											id_sidemenu 	='$b' 
										OR id_sidemenu 		='$a'");
										
		while($id_mn2=mysql_fetch_array($id_mnu1)){
			$c = $id_mn2[id_sidemenu];
			mysql_query("UPDATE article SET sidemenu_stats	= '',
										id_sidemenu			= '0'
									WHERE 
											id_sidemenu 	='$c' 
										OR id_sidemenu		='$b'");
		}
    
	}
	
	
	mysql_query("DELETE FROM menu WHERE id_sidemenu = '$_GET[id]' OR id_sidemenu_parent4 = '$_GET[id]'");
	
	header('location:../../media.php?page='.$page);
}

//DELETE SM4
elseif($page=='side_menu' AND $gen=='delete_sd4'){
$id_mn=$_GET[id];
	$id_mnu=mysql_query("SELECT * FROM article");
	mysql_query("UPDATE article SET sidemenu_stats 		= '',
										id_sidemenu		= '0'
								WHERE 
										id_sidemenu		='$_GET[id]'");
	$id_mnu=$_GET[id];
	$id_mn=mysql_query("SELECT * FROM side_menu WHERE id_sidemenu_parent5 = '$id_mnu'");
	
	while($id_mn1=mysql_fetch_array($id_mn)){
            $b = $id_mn1[id_sidemenu];
           mysql_query("UPDATE article SET menu_stats 		= '',
									id_sidemenu		= '0'
								WHERE 
										id_sidemenu ='$b' 
									OR id_sidemenu ='$id_mnu'");
    }
	

	mysql_query("DELETE FROM side_menu WHERE id_sidemenu = '$_GET[id]' OR id_sidemenu_parent5 = '$_GET[id]'");
	
	header('location:../../media.php?page='.$page);
}

//DELETE SM5
elseif($page=='side_menu' AND $gen=='delete_sd5'){
$id_mn=$_GET[id];
	$id_mnu=mysql_query("SELECT * FROM article");
	mysql_query("UPDATE article SET sidemenu_stats 		= '',
										id_sidemenu		= '0'
								WHERE 
										id_sidemenu	='$_GET[id]'");
	mysql_query("UPDATE article SET sidemenu_stats 		= '',
									id_sidemenu			= '0'
								WHERE 
										id_sidemenu		='$_GET[id]'");

	mysql_query("DELETE FROM side_menu WHERE id_sidemenu = '$_GET[id]'");
	
	header('location:../../media.php?page='.$page);
}
	
	
	
?>