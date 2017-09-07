<?php 
include "connect.php";
include "db.php";
$query1 = "
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `status` enum('admin','superadmin') NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ; ";

mysql_query($query1);
$query2 ="
CREATE TABLE IF NOT EXISTS `album_photo` (
  `id_album_photo` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `gen_code_photo` varchar(200) NOT NULL,
  `nama_album_photo` text NOT NULL,
  PRIMARY KEY (`id_album_photo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;";

mysql_query($query2);


$query3 ="
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `title_eng` varchar(200) NOT NULL,
  `url_article` varchar(100) NOT NULL,
  `headline` enum('Y','N') NOT NULL DEFAULT 'N',
  `running_news` enum('Y','N') NOT NULL DEFAULT 'N',
  `isi_article` longtext NOT NULL,
  `isi_article_eng` longtext NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `video` varchar(100) NOT NULL,
  `poster_video` varchar(100) NOT NULL,
  `embbed_video` varchar(500) NOT NULL,
  `video_active` enum('U','E','D') NOT NULL DEFAULT 'D',
  `gen_code_article` varchar(200) NOT NULL,
  `gen_code_photo` varchar(200) NOT NULL,
  `gen_code_video` varchar(200) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `dibaca` int(5) NOT NULL,
  `id_menu` int(100) NOT NULL,
  `id_sidemenu` int(11) NOT NULL,
  `menu_stats` varchar(100) NOT NULL,
  `sidemenu_stats` varchar(50) NOT NULL,
  `document` varchar(500) NOT NULL,
  `komentar_status` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;";

mysql_query($query3);

$query3 ="
CREATE TABLE IF NOT EXISTS `customer` (
  `id_customer` int(10) NOT NULL AUTO_INCREMENT,
  `id_reservasi` varchar(500) NOT NULL,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `mobile_phone` varchar(20) NOT NULL,
  `home_phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` enum('R','B','Y','C') NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;";

mysql_query($query4);
$query5 ="
CREATE TABLE IF NOT EXISTS `detail_reservasi_room` (
  `id_detail_reservasi_room` int(10) NOT NULL AUTO_INCREMENT,
  `id_reservasi` varchar(500) NOT NULL,
  `id_room` int(10) NOT NULL,
  PRIMARY KEY (`id_detail_reservasi_room`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;";

mysql_query($query5);

$query5 ="
CREATE TABLE IF NOT EXISTS `detail_reservasi_service` (
  `id_detail_reservasi_service` int(10) NOT NULL AUTO_INCREMENT,
  `id_service` int(10) NOT NULL,
  `id_reservasi` varchar(500) NOT NULL,
  PRIMARY KEY (`id_detail_reservasi_service`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;";

mysql_query($query5);


$query6 ="
CREATE TABLE IF NOT EXISTS `email_penerima_reservasi` (
  `id_email` int(10) NOT NULL AUTO_INCREMENT,
  `nama_email` varchar(200) NOT NULL,
  `alamat_email` varchar(200) NOT NULL,
  PRIMARY KEY (`id_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";

mysql_query($query6);
$query7 ="
CREATE TABLE IF NOT EXISTS `gallery_photo` (
  `id_gallery_photo` int(11) NOT NULL AUTO_INCREMENT,
  `gen_code_photo` varchar(200) NOT NULL,
  `photo` text NOT NULL,
  `keterangan` longtext NOT NULL,
  `keterangan_eng` longtext NOT NULL,
  PRIMARY KEY (`id_gallery_photo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;";

mysql_query($query7);
$query8 ="
CREATE TABLE IF NOT EXISTS `halaman_statis` (
  `id_hal_statis` int(11) NOT NULL AUTO_INCREMENT,
  `nama_hal_statis` varchar(2000) NOT NULL,
  `link_hal_statis` text NOT NULL,
  `isi_hal_statis` text NOT NULL,
  `gambar` varchar(300) NOT NULL,
  PRIMARY KEY (`id_hal_statis`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;";

mysql_query($query8);
$query9 ="
CREATE TABLE IF NOT EXISTS `hotel` (
  `id_hotel` varchar(100) NOT NULL,
  `nama_hotel` varchar(100) NOT NULL,
  `alamat` longtext NOT NULL,
  `deskripsi` longtext NOT NULL,
  `no_telp` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_hotel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

mysql_query($query9);
$query10 ="
CREATE TABLE IF NOT EXISTS `kategori_page` (
  `id_kategori_page` int(10) NOT NULL AUTO_INCREMENT,
  `jenis_page` varchar(100) NOT NULL,
  `inisial` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kategori_page`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;";

mysql_query($query10);

$query11 ="
CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `isi_komentar` text NOT NULL,
  `hari` varchar(200) NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `status_komentar` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;";

mysql_query($query11);

$query12 ="
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(200) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(500) NOT NULL,
  `menu_name_english` varchar(300) NOT NULL,
  `link` varchar(500) NOT NULL,
  `id_parent` int(200) NOT NULL,
  `menu_stats` varchar(200) NOT NULL,
  `list_number` int(100) NOT NULL,
  `id_parent1` int(11) NOT NULL,
  `id_parent2` int(11) NOT NULL,
  `id_parent3` int(11) NOT NULL,
  `id_parent4` int(11) NOT NULL,
  `id_parent5` int(11) NOT NULL,
  `menu_status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `icon` varchar(50) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;";

mysql_query($query12);
$query13 ="
CREATE TABLE IF NOT EXISTS `page` (
  `id_page` int(10) NOT NULL AUTO_INCREMENT,
  `id_kategori_page` int(10) NOT NULL,
  `nama_page` varchar(50) NOT NULL,
  `link` varchar(200) NOT NULL,
  `urutan` int(11) NOT NULL,
  `status_page` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;";

mysql_query($query13);

$query14 ="
CREATE TABLE IF NOT EXISTS `reservasi` (
  `id_reservasi` varchar(500) NOT NULL,
  `id_room_kategori` int(10) NOT NULL,
  `room_amount` int(10) NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `price` int(100) NOT NULL,
  `status` enum('Y','N','B','O','C') NOT NULL DEFAULT 'N',
  `id_req` int(11) NOT NULL,
  `id_app` int(11) NOT NULL,
  `id_checkin` int(11) NOT NULL,
  `id_checkout` int(11) NOT NULL,
  PRIMARY KEY (`id_reservasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

mysql_query($query14);
$query15 ="
CREATE TABLE IF NOT EXISTS `room` (
  `id_room` int(10) NOT NULL AUTO_INCREMENT,
  `id_room_kategori` int(10) NOT NULL,
  `nmr_room` int(10) NOT NULL,
  `status` enum('Y','N','B') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_room`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;";

mysql_query($query14);
$query15 ="
CREATE TABLE IF NOT EXISTS `room_kategori` (
  `id_room_kategori` int(10) NOT NULL AUTO_INCREMENT,
  `nama_room_kategori` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  PRIMARY KEY (`id_room_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;";

mysql_query($query15);

$query16 ="
CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(10) NOT NULL AUTO_INCREMENT,
  `nama_service` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(10) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_service`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;";

mysql_query($query16);
$query17 ="
CREATE TABLE IF NOT EXISTS `side_menu` (
  `id_sidemenu` int(200) NOT NULL AUTO_INCREMENT,
  `sidemenu_name` varchar(500) NOT NULL,
  `sidemenu_name_english` varchar(300) NOT NULL,
  `sidemenu_link` varchar(500) NOT NULL,
  `id_sidemenu_parent` int(200) NOT NULL,
  `sidemenu_stats` varchar(200) NOT NULL,
  `sidemenu_list_number` int(100) NOT NULL,
  `id_sidemenu_parent1` int(11) NOT NULL,
  `id_sidemenu_parent2` int(11) NOT NULL,
  `id_sidemenu_parent3` int(11) NOT NULL,
  `id_sidemenu_parent4` int(11) NOT NULL,
  `id_sidemenu_parent5` int(11) NOT NULL,
  `sidemenu_status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_sidemenu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;";

mysql_query($query17);

$query18 ="
CREATE TABLE IF NOT EXISTS `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

mysql_query($query18);
$query19 ="
CREATE TABLE IF NOT EXISTS `sub_page` (
  `id_subpage` int(10) NOT NULL AUTO_INCREMENT,
  `id_page` int(10) NOT NULL,
  `nama_subpage` varchar(100) NOT NULL,
  `link_subpage` varchar(100) NOT NULL,
  `urutan` int(11) NOT NULL,
  `status_subpage` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_subpage`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;
";
for ($i=1;  $i<20; $i++){
		mysql_query($query);
}

?>