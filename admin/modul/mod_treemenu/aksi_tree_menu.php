<?php 

include "../../../config/connect.php";
$page = $_GET['page'];
$act = $_GET['act'];
$gen = $_GET['gen'];

$id_menu = $_POST['id_menu'];
$urutan = $_POST['urutan'];
$menu_name_english = $_POST['menu_name_english'];
$menu_name = $_POST['menu_name'];
$icon = $_POST['icon'];
$menu_name_english = $_POST['menu_name_english'];
$initial = strtolower($menu_name_english);
$link = str_replace(' ','-',$initial);
if($page == 'tree_menu' AND $act == 'update_menu' )
	{
		mysql_query(" update menu set menu_name='$menu_name', link='$link', icon='$icon',  menu_name_english='$menu_name_english', list_number = '$urutan' where id_menu = '$id_menu' ");
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

else if($page == 'tree_menu' AND $act == 'update_main_menu' )
	{
			$id_menu=$_POST['id_menu'];
			$id_article=$_POST['id_article'];
			if($id_article==''){
				mysql_query("UPDATE article SET menu_stats 	= 'main_menu',
												id_menu		= '$id_menu'
											WHERE id_article= '$id_article'");
				
			}else{
				while (list($key,$val)= each($id_article)){
				mysql_query("UPDATE article SET menu_stats 	= 'main_menu',
												id_menu		= '$id_menu'
											WHERE id_article= '$val'");
				}
			}
	
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

else if($page == 'tree_menu' AND $act == 'update_sm1' )
	{
			$id_menu=$_POST['id_menu'];
			$id_article=$_POST['id_article'];
			if($id_article==''){
				mysql_query("UPDATE article SET menu_stats 	= 'sm1',
												id_menu		= '$id_menu'
											WHERE id_article= '$id_article'");
				
			}else{
				while (list($key,$val)= each($id_article)){
				mysql_query("UPDATE article SET menu_stats 	= 'sm1',
												id_menu		= '$id_menu'
											WHERE id_article= '$val'");
				}
			}
	
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

else if($page == 'tree_menu' AND $act == 'update_sm2' )
	{
			$id_menu=$_POST['id_menu'];
			$id_article=$_POST['id_article'];
			if($id_article==''){
				mysql_query("UPDATE article SET menu_stats 	= 'sm2',
												id_menu		= '$id_menu'
											WHERE id_article= '$id_article'");
				
			}else{
				while (list($key,$val)= each($id_article)){
				mysql_query("UPDATE article SET menu_stats 	= 'sm2',
												id_menu		= '$id_menu'
											WHERE id_article= '$val'");
				}
			}
	
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
else if($page == 'tree_menu' AND $act == 'update_sm3' )
	{
			$id_menu=$_POST['id_menu'];
			$id_article=$_POST['id_article'];
			if($id_article==''){
				mysql_query("UPDATE article SET menu_stats 	= 'sm3',
												id_menu		= '$id_menu'
											WHERE id_article= '$id_article'");
				
			}else{
				while (list($key,$val)= each($id_article)){
				mysql_query("UPDATE article SET menu_stats 	= 'sm3',
												id_menu		= '$id_menu'
											WHERE id_article= '$val'");
				}
			}
	
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

else if($page == 'tree_menu' AND $act == 'update_sm4' )
	{
			$id_menu=$_POST['id_menu'];
			$id_article=$_POST['id_article'];
			if($id_article==''){
				mysql_query("UPDATE article SET menu_stats 	= 'sm4',
												id_menu		= '$id_menu'
											WHERE id_article= '$id_article'");
				
			}else{
				while (list($key,$val)= each($id_article)){
				mysql_query("UPDATE article SET menu_stats 	= 'sm4',
												id_menu		= '$id_menu'
											WHERE id_article= '$val'");
				}
			}
	
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

else if($page == 'tree_menu' AND $act == 'update_sm5' )
	{
			$id_menu=$_POST['id_menu'];
			$id_article=$_POST['id_article'];
			if($id_article==''){
				mysql_query("UPDATE article SET menu_stats 	= 'sm5',
												id_menu		= '$id_menu'
											WHERE id_article= '$id_article'");
				
			}else{
				while (list($key,$val)= each($id_article)){
				mysql_query("UPDATE article SET menu_stats 	= 'sm5',
												id_menu		= '$id_menu'
											WHERE id_article= '$val'");
				}
			}
	
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
// =================================== DELETE MENU ==========================================



//DELETE MAIN MENU
else if($page =='tree_menu' AND $gen=='delete_main_menu'){
		// echo "test";
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
	
	header('location:../../media.php?page='.$page);
}

//DELETE SM1
else if($page=='tree_menu' AND $gen=='delete_sm1'){
	$id_mn=$_GET[id];
	$id_mnu=mysql_query("SELECT * FROM article");
	mysql_query("UPDATE article SET menu_stats 		= '',
										id_menu		= '0'
								WHERE 
										id_menu		='$_GET[id]'");
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
	
	header('location:../../media.php?page='.$page);
}


//DELETE SM2
elseif($page=='tree_menu' AND $gen=='delete_sm2'){
	$id_mn=$_GET[id];
	$id_mnu=mysql_query("SELECT * FROM article");
	mysql_query("UPDATE article SET menu_stats 		= '',
										id_menu		= '0'
								WHERE 
										id_menu		='$_GET[id]'");
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
	
	header('location:../../media.php?page='.$page);
}


//DELETE SM3
elseif($page=='tree_menu' AND $gen=='delete_sm3'){
	$id_mn=$_GET[id];
	$id_mnu=mysql_query("SELECT * FROM article");
	mysql_query("UPDATE article SET menu_stats 		= '',
										id_menu		= '0'
								WHERE 
										id_menu		='$_GET[id]'");
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
	
	header('location:../../media.php?page='.$page);
}

//DELETE SM4
elseif($page=='tree_menu' AND $gen=='delete_sm4'){
$id_mn=$_GET[id];
	$id_mnu=mysql_query("SELECT * FROM article");
	mysql_query("UPDATE article SET menu_stats 		= '',
										id_menu		= '0'
								WHERE 
										id_menu		='$_GET[id]'");
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
	
	header('location:../../media.php?page='.$page);
}

//DELETE SM5
elseif($page=='tree_menu' AND $gen=='delete_sm5'){
$id_mn=$_GET[id];
	$id_mnu=mysql_query("SELECT * FROM article");
	mysql_query("UPDATE article SET menu_stats 		= '',
										id_menu		= '0'
								WHERE 
										id_menu		='$_GET[id]'");
	mysql_query("UPDATE article SET menu_stats 		= '',
									id_menu			= '0'
								WHERE 
										id_menu		='$_GET[id]'");

	mysql_query("DELETE FROM menu WHERE id_menu = '$_GET[id]'");
	
	header('location:../../media.php?page='.$page);
}
	
	
	
?>