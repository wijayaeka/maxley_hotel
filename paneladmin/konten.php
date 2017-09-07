<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
//error_reporting(0);
if ($_GET['page']=='home')
{ 
include "home.php";
}
else
if ($_GET['page']=='hotel')
{ 
include "modul/mod_hotel/index.php";
}
else
if ($_GET['page']=='admin')
{ 
include "modul/mod_admin/index.php";
}
else

if ($_GET['page']=='page')
{ 
include "modul/mod_page/index.php";
}
else
if ($_GET['page']=='subpage')
{ 
include "modul/mod_admin_subpage/index.php";
}
else
if ($_GET['page']=='tree_menu')
{ 
include "modul/mod_treemenu/tree_menu.php";
}
else
if ($_GET['page']=='article')
{ 
include "modul/mod_article/index.php";
}
else

if ($_GET['page']=='room')
{ 
include "modul/mod_room/index.php";
}
else
if ($_GET['page']=='room_category')
{ 
include "modul/mod_room_kategori/index.php";
}
else

if ($_GET['page']=='album_photo')
{ 
include "modul/mod_album_photo(single)/index.php";
}
else
if ($_GET['page']=='reservation_request')
{ 
include "modul/mod_reservation_request/index.php";
}
else
if ($_GET['page']=='reservasi_manual')
{ 
include "modul/mod_reservation_manual/index.php";
}
else

if ($_GET['page']=='reservation_approved')
{ 
include "modul/mod_reservation_approved/index.php";
}
else

if ($_GET['page']=='reservation_checkin')
{ 
include "modul/mod_reservation_checkin/index.php";
}
else
if ($_GET['page']=='reservation_checkout')
{ 
include "modul/mod_reservation_checkout/index.php";
}
else

if ($_GET['page']=='report')
{ 
include "modul/mod_report_reservation/index.php";
}
else
if ($_GET['page']=='service')
{ 
include "modul/mod_service/index.php";
}
else
if ($_GET['page']=='reservation_email')
{ 
include "modul/mod_reservation_email/index.php";
}
else


{
include "not_found.php";	
}
?>
</body>
</html>