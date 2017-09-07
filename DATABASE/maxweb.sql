/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : maxweb

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-09-08 01:44:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `status` enum('admin','superadmin') NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'gerrardforest@gmail.com', '087449', 'superadmin');
INSERT INTO `admin` VALUES ('7', 'dodo', '721c6ff80a6d3e4ad4ffa52a04c60085', 'Dodo Wijaya', '', '', 'superadmin');

-- ----------------------------
-- Table structure for album_photo
-- ----------------------------
DROP TABLE IF EXISTS `album_photo`;
CREATE TABLE `album_photo` (
  `id_album_photo` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `gen_code_photo` varchar(200) NOT NULL,
  `nama_album_photo` text NOT NULL,
  PRIMARY KEY (`id_album_photo`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of album_photo
-- ----------------------------
INSERT INTO `album_photo` VALUES ('20', '135', 'FB9D84BA', 'Album Maxley Tour');
INSERT INTO `album_photo` VALUES ('18', '140', '3436259B', 'Album Corporate');
INSERT INTO `album_photo` VALUES ('19', '127', 'CDE63438', 'Album In The Kost');

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', '', 'Overview', '', 'overview', '', 'N', '<h4>GROW WITH OUR VALUES</h4>\r\n<p><img style=\"float: left; margin-left: 10px; margin-right: 10px;\" src=\"../tinymcpuk/gambar/image/images.jpg\" alt=\"\" width=\"211\" height=\"239\" /></p>\r\n<p>As a hospitality and property industry, PT Patra Jasa has entered the modern era by developing its business in hotels, residential and office tower as demands.</p>\r\n<p>Our success is driven by our people and their consistent focus on delivering result the right way by using our corporate values to give the stake holder the best&nbsp;services.</p>\r\n<p>We are executing with satisfaction and maximizing profit, applying innovation and learning continuously by capturing new opportunities for sustainable growth.</p>\r\n<p>As a company and individual, we take great pride in contributing to the communities where we live and work. We also care about the environmental and social responsibilities and are proud of the many ways in which our employees work to safeguard it. To meet the new challenge in global hospitality and industrial market, PT Patra Jasa is responding through a Transformation Program to all units and assets, and from management to employees as we pursue a long term vision and mission to become a company chosen by customers in hospitality and property industry. In the future, we would like to do IPO (Initial Public Offering) for PT Patra Jasa business growth. We realize that the world needs to put a smile on its face. That is why we are doing our best to present the best way for you to SMILE in your essential activities.</p>', '', 'Kamis', '2014-07-10', '13:49:32', '', '', '', '', 'D', 'ED78D305', '', '', 'Y', '0', '98', '0', 'sm1', '', '', '');
INSERT INTO `article` VALUES ('2', '', 'Board Of Director', '', 'board-of-director', 'N', 'N', '<p><strong><span style=\"font-family: oswald; font-size: 12px; font-weight: 300;\"><img style=\"float: left; margin-left: 10px; margin-right: 10px;\" src=\"../tinymcpuk/gambar/image/images.jpg\" alt=\"\" width=\"131\" height=\"149\" /></span></strong></p>\r\n<p><strong><span style=\"font-family: oswald; font-size: 12px; font-weight: 300;\">President Director</span></strong></p>\r\n<p align=\"left\">Born in Tegal at 1962 In 1987, graduated from the Faculty of Fisheries, Bogor Agricultural Institute, and in 1997, earned a Masters of Business Administration from the University of Dallas-USA. After serving as a Junior Lecturer for almost three years, he was starting his career as a Computer Programmer at PT Pertamina (Persero) in 1990 and was assigned to the Directorate of General Affairs until 1998 with various positions. Later became Assistant to Director of General Affairs (1998-2001), Change Management Team Leader &ndash; ERP Implementation Project (2001-2006), Business Process Support Manager (2006-2008), VP of Business System &amp; IT (2008-2010), VP IT-Solution (2010-2012) and SVP Corporate Shared Service (2012-2013). From 2008 he also served as a Commisioner of PT Patrakom.&nbsp; Since August 2013 served as the President Director of PT Patra Jasa.</p>\r\n<p align=\"left\">&nbsp;</p>\r\n<p align=\"left\">&nbsp;</p>\r\n<p align=\"left\">&nbsp;</p>\r\n<p><strong><span style=\"font-family: oswald; font-size: 12px; font-weight: 300;\"><img style=\"float: left; margin-left: 10px; margin-right: 10px;\" src=\"../tinymcpuk/gambar/image/19098386272099204233.jpg\" alt=\"\" width=\"114\" height=\"135\" /></span></strong></p>\r\n<p align=\"left\"><strong><span style=\"font-family: oswald; font-size: 12px; font-weight: 300;\">President Director</span></strong></p>\r\n<p align=\"left\">Born in Tegal at 1962 In 1987, graduated from the Faculty of Fisheries, Bogor Agricultural Institute, and in 1997, earned a Masters of Business Administration from the University of Dallas-USA. After serving as a Junior Lecturer for almost three years, he was starting his career as a Computer Programmer at PT Pertamina (Persero) in 1990 and was assigned to the Directorate of General Affairs until 1998 with various positions. Later became Assistant to Director of General Affairs (1998-2001), Change Management Team Leader &ndash; ERP Implementation Project (2001-2006), Business Process Support Manager (2006-2008), VP of Business System &amp; IT (2008-2010), VP IT-Solution (2010-2012) and SVP Corporate Shared Service (2012-2013). From 2008 he also served as a Commisioner of PT Patrakom.&nbsp; Since August 2013 served as the President Director of PT Patra Jasa.</p>', '', 'Kamis', '2014-07-10', '16:37:02', '', '', '', '', 'D', 'C7E9284F', '', '', 'Y', '0', '100', '0', 'sm1', '', '', '');
INSERT INTO `article` VALUES ('20', '', 'sdfsdf', 'sdvfv', 'sdfsdf', 'N', 'N', '<p>svsmdfjvbf</p>', '', 'Selasa', '2014-08-07', '14:50:06', '', '', '', '', 'D', 'F35F1C77', '', '', 'Y', '0', '92', '92', 'main_menu', '', '', 'N');
INSERT INTO `article` VALUES ('3', '', 'Structure', '', 'structure', '', 'N', '<h4>GROW WITH OUR VALUES</h4>\r\n<p><img style=\"margin-left: 10px; margin-right: 10px;\" src=\"../tinymcpuk/gambar/image/orgstructures_WendelFranks_226x150.jpg\" alt=\"\" width=\"226\" height=\"150\" /></p>\r\n<p>As a hospitality and property industry, PT Patra Jasa has entered the modern era by developing its business in hotels, residential and office tower as demands.</p>\r\n<p>Our success is driven by our people and their consistent focus on delivering result the right way by using our corporate values to give the stake holder the best&nbsp;services.</p>\r\n<p>We are executing with satisfaction and maximizing profit, applying innovation and learning continuously by capturing new opportunities for sustainable growth.</p>\r\n<p>As a company and individual, we take great pride in contributing to the communities where we live and work. We also care about the environmental and social responsibilities and are proud of the many ways in which our employees work to safeguard it. To meet the new challenge in global hospitality and industrial market, PT Patra Jasa is responding through a Transformation Program to all units and assets, and from management to employees as we pursue a long term vision and mission to become a company chosen by customers in hospitality and property industry. In the future, we would like to do IPO (Initial Public Offering) for PT Patra Jasa business growth. We realize that the world needs to put a smile on its face. That is why we are doing our best to present the best way for you to SMILE in your essential activities.</p>', '', 'Kamis', '2014-07-10', '13:55:32', '', '', '', '', 'D', '402A4A9D', '', '', 'Y', '0', '101', '0', 'sm1', '', '', '');
INSERT INTO `article` VALUES ('4', '', 'Corporate Values', '', 'corporate-values', '', 'N', '<h4>GROW WITH OUR VALUES</h4>\r\n<p>As a hospitality and property industry, PT Patra Jasa has entered the modern era by developing its business in hotels, residential and office tower as demands.</p>\r\n<p>Our success is driven by our people and their consistent focus on delivering result the right way by using our corporate values to give the stake holder the best&nbsp;services.</p>\r\n<p><img style=\"vertical-align: middle;\" src=\"../tinymcpuk/gambar/image/Corporate.jpg\" alt=\"\" width=\"504\" height=\"367\" /></p>\r\n<p>We are executing with satisfaction and maximizing profit, applying innovation and learning continuously by capturing new opportunities for sustainable growth.</p>\r\n<p>As a company and individual, we take great pride in contributing to the communities where we live and work. We also care about the environmental and social responsibilities and are proud of the many ways in which our employees work to safeguard it. To meet the new challenge in global hospitality and industrial market, PT Patra Jasa is responding through a Transformation Program to all units and assets, and from management to employees as we pursue a long term vision and mission to become a company chosen by customers in hospitality and property industry. In the future, we would like to do IPO (Initial Public Offering) for PT Patra Jasa business growth. We realize that the world needs to put a smile on its face. That is why we are doing our best to present the best way for you to SMILE in your essential activities.</p>', '', 'Kamis', '2014-07-10', '13:56:44', '', '', '', '', 'D', 'EE225C9E', '', '', 'Y', '0', '102', '0', 'sm1', '', '', '');
INSERT INTO `article` VALUES ('5', '', 'Maxley Residential', '', 'maxley-residential', '', 'N', '<h4>GROW WITH OUR VALUES</h4>\r\n<p>As a hospitality and property industry, PT Patra Jasa has entered the modern era by developing its business in hotels, residential and office tower as demands.</p>\r\n<p><img style=\"vertical-align: middle;\" src=\"../tinymcpuk/gambar/image/441169454_04_81219523_rumah-dijual-roemah-bawang-residence-banyumanik-semarang-jawa-tengah_618.jpeg\" alt=\"\" width=\"618\" height=\"412\" /></p>\r\n<p>Our success is driven by our people and their consistent focus on delivering result the right way by using our corporate values to give the stake holder the best&nbsp;services.</p>\r\n<p>We are executing with satisfaction and maximizing profit, applying innovation and learning continuously by capturing new opportunities for sustainable growth.</p>\r\n<p>As a company and individual, we take great pride in contributing to the communities where we live and work. We also care about the environmental and social responsibilities and are proud of the many ways in which our employees work to safeguard it. To meet the new challenge in global hospitality and industrial market, PT Patra Jasa is responding through a Transformation Program to all units and assets, and from management to employees as we pursue a long term vision and mission to become a company chosen by customers in hospitality and property industry. In the future, we would like to do IPO (Initial Public Offering) for PT Patra Jasa business growth. We realize that the world needs to put a smile on its face. That is why we are doing our best to present the best way for you to SMILE in your essential activities.</p>', '', 'Kamis', '2014-07-10', '13:57:54', '', '', '', '', 'D', 'F98ACE20', '', '', 'Y', '0', '103', '0', 'sm1', '', '', '');
INSERT INTO `article` VALUES ('6', '', 'About Us', '', 'about-us', '', 'N', '<h4>GROW WITH OUR VALUES</h4>\r\n<p>&nbsp;</p>\r\n<p>As a hospitality and property industry, PT Patra Jasa has entered the modern era by developing its business in hotels, residential and office tower as demands.</p>\r\n<p>Our success is driven by our people and their consistent focus on delivering result the right way by using our corporate values to give the stake holder the best&nbsp;services.</p>\r\n<p>We are executing with satisfaction and maximizing profit, applying innovation and learning continuously by capturing new opportunities for sustainable growth.</p>\r\n<p>As a company and individual, we take great pride in contributing to the communities where we live and work. We also care about the environmental and social responsibilities and are proud of the many ways in which our employees work to safeguard it. To meet the new challenge in global hospitality and industrial market, PT Patra Jasa is responding through a Transformation Program to all units and assets, and from management to employees as we pursue a long term vision and mission to become a company chosen by customers in hospitality and property industry. In the future, we would like to do IPO (Initial Public Offering) for PT Patra Jasa business growth. We realize that the world needs to put a smile on its face. That is why we are doing our best to present the best way for you to SMILE in your essential activities.</p>', '', 'Kamis', '2014-07-10', '14:02:18', '1404975738.jpg', '', '', '', 'D', 'DA809420', '', '', 'Y', '0', '136', '0', 'sm1', '', '', '');
INSERT INTO `article` VALUES ('7', '', 'House', '', 'house', '', 'N', '<h4>GROW WITH OUR VALUES</h4>\r\n<p>As a hospitality and property industry, PT Patra Jasa has entered the modern era by developing its business in hotels, residential and office tower as demands.</p>\r\n<p><img style=\"vertical-align: middle;\" src=\"../tinymcpuk/gambar/image/camry_B_D.jpg\" alt=\"\" width=\"540\" height=\"370\" /></p>\r\n<p>Our success is driven by our people and their consistent focus on delivering result the right way by using our corporate values to give the stake holder the best&nbsp;services.</p>\r\n<p>We are executing with satisfaction and maximizing profit, applying innovation and learning continuously by capturing new opportunities for sustainable growth.</p>\r\n<p>As a company and individual, we take great pride in contributing to the communities where we live and work. We also care about the environmental and social responsibilities and are proud of the many ways in which our employees work to safeguard it. To meet the new challenge in global hospitality and industrial market, PT Patra Jasa is responding through a Transformation Program to all units and assets, and from management to employees as we pursue a long term vision and mission to become a company chosen by customers in hospitality and property industry. In the future, we would like to do IPO (Initial Public Offering) for PT Patra Jasa business growth. We realize that the world needs to put a smile on its face. That is why we are doing our best to present the best way for you to SMILE in your essential activities.</p>', '', 'Kamis', '2014-07-10', '14:03:52', '', '', '', '', 'D', '228BE06D', '', '', 'Y', '0', '137', '0', 'sm1', '', '', '');
INSERT INTO `article` VALUES ('8', '', 'Location', '', 'location', 'N', 'N', '<h4>Location</h4>\r\n<p><img style=\"vertical-align: middle;\" src=\"../tinymcpuk/gambar/image/1386842957.jpg\" alt=\"\" width=\"500\" height=\"231\" /></p>\r\n<p>&nbsp;</p>\r\n<p>As a hospitality and property industry, PT Patra Jasa has entered the modern era by developing its business in hotels, residential and office tower as demands.</p>\r\n<p>Our success is driven by our people and their consistent focus on delivering result the right way by using our corporate values to give the stake holder the best&nbsp;services.</p>\r\n<p>We are executing with satisfaction and maximizing profit, applying innovation and learning continuously by capturing new opportunities for sustainable growth.</p>\r\n<p>As a company and individual, we take great pride in contributing to the communities where we live and work. We also care about the environmental and social responsibilities and are proud of the many ways in which our employees work to safeguard it. To meet the new challenge in global hospitality and industrial market, PT Patra Jasa is responding through a Transformation Program to all units and assets, and from management to employees as we pursue a long term vision and mission to become a company chosen by customers in hospitality and property industry. In the future, we would like to do IPO (Initial Public Offering) for PT Patra Jasa business growth. We realize that the world needs to put a smile on its face. That is why we are doing our best to present the best way for you to SMILE in your essential activities.</p>', '', 'Kamis', '2014-07-10', '14:05:37', '', '', '', '', 'D', '7BB5B595', '', '', 'Y', '0', '139', '0', 'sm1', '', '', '');
INSERT INTO `article` VALUES ('9', '', 'Town House', '', 'town-house', 'N', 'N', '<h4>GROW WITH OUR VALUES</h4>\r\n<p>As a hospitality and property industry, PT Patra Jasa has entered the modern era by developing its business in hotels, residential and office tower as demands.</p>\r\n<p><img style=\"float: right; margin-left: 10px; margin-right: 10px;\" src=\"../tinymcpuk/gambar/image/margonda-riverside-residence_f-97562-161112.jpg\" alt=\"\" width=\"600\" height=\"450\" /></p>\r\n<p>Our success is driven by our people and their consistent focus on delivering result the right way by using our corporate values to give the stake holder the best&nbsp;services.</p>\r\n<p>We are executing with satisfaction and maximizing profit, applying innovation and learning continuously by capturing new opportunities for sustainable growth.</p>\r\n<p>As a company and individual, we take great pride in contributing to the communities where we live and work. We also care about the environmental and social responsibilities and are proud of the many ways in which our employees work to safeguard it. To meet the new challenge in global hospitality and industrial market, PT Patra Jasa is responding through a Transformation Program to all units and assets, and from management to employees as we pursue a long term vision and mission to become a company chosen by customers in hospitality and property industry. In the future, we would like to do IPO (Initial Public Offering) for PT Patra Jasa business growth. We realize that the world needs to put a smile on its face. That is why we are doing our best to present the best way for you to SMILE in your essential activities.</p>', '', 'Kamis', '2014-07-10', '14:07:15', '', '', '', '', 'D', 'E3C4E2D6', '', '', 'Y', '0', '138', '0', 'sm1', '', '', '');
INSERT INTO `article` VALUES ('10', '', 'Maxley In The Kost', '', 'maxley-in-the-kost', '', 'N', '<h4>GROW WITH OUR VALUES</h4>\r\n<p>&nbsp;</p>\r\n<p>As a hospitality and property industry, PT Patra Jasa has entered the modern era by developing its business in hotels, residential and office tower as demands.</p>\r\n<p>Our success is driven by our people and their consistent focus on delivering result the right way by using our corporate values to give the stake holder the best&nbsp;services.</p>\r\n<p>We are executing with satisfaction and maximizing profit, applying innovation and learning continuously by capturing new opportunities for sustainable growth.</p>\r\n<p>As a company and individual, we take great pride in contributing to the communities where we live and work. We also care about the environmental and social responsibilities and are proud of the many ways in which our employees work to safeguard it. To meet the new challenge in global hospitality and industrial market, PT Patra Jasa is responding through a Transformation Program to all units and assets, and from management to employees as we pursue a long term vision and mission to become a company chosen by customers in hospitality and property industry. In the future, we would like to do IPO (Initial Public Offering) for PT Patra Jasa business growth. We realize that the world needs to put a smile on its face. That is why we are doing our best to present the best way for you to SMILE in your essential activities.</p>', '', 'Kamis', '2014-07-10', '14:08:05', '1404976085.jpg', '', '', '', 'D', '7029C91D', '', '', 'Y', '0', '104', '0', 'sm1', '', '', '');
INSERT INTO `article` VALUES ('11', '', 'About Kost', '', 'about-kost', '', 'N', '<h4>GROW WITH OUR VALUES</h4>\r\n<p>As a hospitality and property industry, PT Patra Jasa has entered the modern era by developing its business in hotels, residential and office tower as demands.</p>\r\n<p><img style=\"margin-left: 10px; margin-right: 10px; float: left;\" src=\"../tinymcpuk/gambar/image/492bca03-ed1b-4aa0-9ef9-e37ca0e34e60_503x329.jpg\" alt=\"\" width=\"400\" height=\"262\" /></p>\r\n<p>Our success is driven by our people and their consistent focus on delivering result the right way by using our corporate values to give the stake holder the best&nbsp;services.</p>\r\n<p>We are executing with satisfaction and maximizing profit, applying innovation and learning continuously by capturing new opportunities for sustainable growth.</p>\r\n<p>As a company and individual, we take great pride in contributing to the communities where we live and work. We also care about the environmental and social responsibilities and are proud of the many ways in which our employees work to safeguard it. To meet the new challenge in global hospitality and industrial market, PT Patra Jasa is responding through a Transformation Program to all units and assets, and from management to employees as we pursue a long term vision and mission to become a company chosen by customers in hospitality and property industry. In the future, we would like to do IPO (Initial Public Offering) for PT Patra Jasa business growth. We realize that the world needs to put a smile on its face. That is why we are doing our best to present the best way for you to SMILE in your essential activities.</p>', '', 'Kamis', '2014-07-10', '14:11:13', '', '', '', '', 'D', 'F392C7E6', '', '', 'Y', '0', '123', '0', 'sm2', '', '', '');
INSERT INTO `article` VALUES ('12', '', 'Room', '', 'room', '', 'N', '<h4>GROW WITH OUR VALUES</h4>\r\n<p>As a hospitality and property industry, PT Patra Jasa has entered the modern era by developing its business in hotels, residential and office tower as demands.</p>\r\n<p>Our success is driven by our people and their consistent focus on delivering result the right way by using our corporate values to give the stake holder the best&nbsp;services.</p>\r\n<p><img style=\"vertical-align: middle; margin-left: 10px; margin-right: 10px;\" src=\"../tinymcpuk/gambar/image/5361354_20130513093257.jpg\" alt=\"\" width=\"503\" height=\"329\" /></p>\r\n<p>We are executing with satisfaction and maximizing profit, applying innovation and learning continuously by capturing new opportunities for sustainable growth.</p>\r\n<p>As a company and individual, we take great pride in contributing to the communities where we live and work. We also care about the environmental and social responsibilities and are proud of the many ways in which our employees work to safeguard it. To meet the new challenge in global hospitality and industrial market, PT Patra Jasa is responding through a Transformation Program to all units and assets, and from management to employees as we pursue a long term vision and mission to become a company chosen by customers in hospitality and property industry. In the future, we would like to do IPO (Initial Public Offering) for PT Patra Jasa business growth. We realize that the world needs to put a smile on its face. That is why we are doing our best to present the best way for you to SMILE in your essential activities.</p>', '', 'Kamis', '2014-07-10', '14:12:02', '', '', '', '', 'D', 'C9044A56', '', '', 'Y', '0', '124', '0', 'sm2', '', '', '');
INSERT INTO `article` VALUES ('13', '', 'Price', '', 'price', '', 'N', '<h4>GROW WITH OUR VALUES</h4>\r\n<p>As a hospitality and property industry, PT Patra Jasa has entered the modern era by developing its business in hotels, residential and office tower as demands.</p>\r\n<p>Our success is driven by our people and their consistent focus on delivering result the right way by using our corporate values to give the stake holder the best&nbsp;services.</p>\r\n<p>We are executing with satisfaction and maximizing profit, applying innovation and learning continuously by capturing new opportunities for sustainable growth.</p>\r\n<p>As a company and individual, we take great pride in contributing to the communities where we live and work. We also care about the environmental and social responsibilities and are proud of the many ways in which our employees work to safeguard it. To meet the new challenge in global hospitality and industrial market, PT Patra Jasa is responding through a Transformation Program to all units and assets, and from management to employees as we pursue a long term vision and mission to become a company chosen by customers in hospitality and property industry. In the future, we would like to do IPO (Initial Public Offering) for PT Patra Jasa business growth. We realize that the world needs to put a smile on its face. That is why we are doing our best to present the best way for you to SMILE in your essential activities.</p>', '', 'Kamis', '2014-07-10', '14:12:28', '', '', '', '', 'D', 'E7A589C2', '', '', 'Y', '0', '126', '0', 'sm2', '', '', '');
INSERT INTO `article` VALUES ('14', '', 'Maxley Tour And Travel', '', 'maxley-tour-and-travel', 'N', 'N', '<h4>Tour</h4>\r\n<p><img style=\"float: left; margin-left: 10px; margin-right: 10px;\" src=\"../tinymcpuk/gambar/image/opt-01.jpg\" alt=\"\" width=\"500\" height=\"220\" /></p>\r\n<p>As a hospitality and property industry, PT Patra Jasa has entered the modern era by developing its business in hotels, residential and office tower as demands.</p>\r\n<p>Our success is driven by our people and their consistent focus on delivering result the right way by using our corporate values to give the stake holder the best&nbsp;services.</p>\r\n<p>We are executing with satisfaction and maximizing profit, applying innovation and learning continuously by capturing new opportunities for sustainable growth.</p>\r\n<p>&nbsp;</p>\r\n<p>As a company and individual, we take great pride in contributing to the communities where we live and work. We also care about the environmental and social responsibilities and are proud of the many ways in which our employees work to safeguard it. To meet the new challenge in global hospitality and industrial market, PT Patra Jasa is responding through a Transformation Program to all units and assets, and from management to employees as we pursue a long term vision and mission to become a company chosen by customers in hospitality and property industry. In the future, we would like to do IPO (Initial Public Offering) for PT Patra Jasa business growth. We realize that the world needs to put a smile on its face. That is why we are doing our best to present the best way for you to SMILE in your essential activities.</p>', '', 'Kamis', '2014-07-10', '14:14:57', '1404976456.jpg', '', '', '', 'D', '11E4447D', '', '', 'Y', '0', '119', '0', 'sm1', '', '', '');
INSERT INTO `article` VALUES ('15', '', 'Location', '', 'location', '', 'N', '<h4>GROW WITH OUR VALUES</h4>\r\n<p>As a hospitality and property industry, PT Patra Jasa has entered the modern era by developing its business in hotels, residential and office tower as demands.</p>\r\n<p>Our success is driven by our people and their consistent focus on delivering result the right way by using our corporate values to give the stake holder the best&nbsp;services.</p>\r\n<p><img style=\"vertical-align: middle;\" src=\"../tinymcpuk/gambar/image/1386842957.jpg\" alt=\"\" width=\"600\" height=\"277\" /></p>\r\n<p>We are executing with satisfaction and maximizing profit, applying innovation and learning continuously by capturing new opportunities for sustainable growth.</p>\r\n<p>As a company and individual, we take great pride in contributing to the communities where we live and work. We also care about the environmental and social responsibilities and are proud of the many ways in which our employees work to safeguard it. To meet the new challenge in global hospitality and industrial market, PT Patra Jasa is responding through a Transformation Program to all units and assets, and from management to employees as we pursue a long term vision and mission to become a company chosen by customers in hospitality and property industry. In the future, we would like to do IPO (Initial Public Offering) for PT Patra Jasa business growth. We realize that the world needs to put a smile on its face. That is why we are doing our best to present the best way for you to SMILE in your essential activities.</p>', '', 'Kamis', '2014-07-10', '14:18:01', '', '', '', '', 'D', '4F1DC8D1', '', '', 'Y', '0', '125', '0', 'sm2', '', '', '');
INSERT INTO `article` VALUES ('16', '', 'Information', '', 'information', '', 'N', '<h4>GROW WITH OUR VALUES</h4>\r\n<p>As a hospitality and property industry, PT Patra Jasa has entered the modern era by developing its business in hotels, residential and office tower as demands.</p>\r\n<p><img style=\"float: left; margin-left: 10px; margin-right: 10px;\" src=\"../tinymcpuk/gambar/image/29.jpg\" alt=\"\" width=\"350\" height=\"298\" /></p>\r\n<p>Our success is driven by our people and their consistent focus on delivering result the right way by using our corporate values to give the stake holder the best&nbsp;services.</p>\r\n<p>We are executing with satisfaction and maximizing profit, applying innovation and learning continuously by capturing new opportunities for sustainable growth.</p>\r\n<p>As a company and individual, we take great pride in contributing to the communities where we live and work. We also care about the environmental and social responsibilities and are proud of the many ways in which our employees work to safeguard it. To meet the new challenge in global hospitality and industrial market, PT Patra Jasa is responding through a Transformation Program to all units and assets, and from management to employees as we pursue a long term vision and mission to become a company chosen by customers in hospitality and property industry. In the future, we would like to do IPO (Initial Public Offering) for PT Patra Jasa business growth. We realize that the world needs to put a smile on its face. That is why we are doing our best to present the best way for you to SMILE in your essential activities.</p>', '', 'Kamis', '2014-07-10', '14:21:47', '', '', '', '', 'D', '72F6A7FC', '', '', 'Y', '0', '96', '0', 'mm', '', '', '');
INSERT INTO `article` VALUES ('17', '', 'Contact', '', 'contact', '', 'N', '<h4>GROW WITH OUR VALUES</h4>\r\n<p><img style=\"float: left; margin-left: 10px; margin-right: 10px;\" src=\"../tinymcpuk/gambar/image/1388660288.jpg\" alt=\"\" width=\"200\" height=\"329\" />As a hospitality and property industry, PT Patra Jasa has entered the modern era by developing its business in hotels, residential and office tower as demands.</p>\r\n<p>Our success is driven by our people and their consistent focus on delivering result the right way by using our corporate values to give the stake holder the best&nbsp;services.</p>\r\n<p>We are executing with satisfaction and maximizing profit, applying innovation and learning continuously by capturing new opportunities for sustainable growth.</p>\r\n<p>As a company and individual, we take great pride in contributing to the communities where we live and work. We also care about the environmental and social responsibilities and are proud of the many ways in which our employees work to safeguard it. To meet the new challenge in global hospitality and industrial market, PT Patra Jasa is responding through a Transformation Program to all units and assets, and from management to employees as we pursue a long term vision and mission to become a company chosen by customers in hospitality and property industry. In the future, we would like to do IPO (Initial Public Offering) for PT Patra Jasa business growth. We realize that the world needs to put a smile on its face. That is why we are doing our best to present the best way for you to SMILE in your essential activities.</p>', '', 'Kamis', '2014-07-10', '14:23:17', '', '', '', '', 'D', 'AF36B412', '', '', 'Y', '0', '97', '0', 'mm', '', '', '');
INSERT INTO `article` VALUES ('21', '', 'zzzzzz', 'sdvfv', 'zzzzzz', 'N', '', '<p>svsmdfjvbf</p>', '', 'Rabu', '2014-08-07', '13:12:41', '1407910361.png', '', '', '', 'D', '', '', '', 'Y', '0', '97', '0', 'main_menu', '', '', '');
INSERT INTO `article` VALUES ('23', '', 'Tes', '', 'tes', '', 'N', '<p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum&nbsp;</p>', '', 'Selasa', '2014-09-10', '15:54:43', '1409648083.jpg', '', '', '', 'D', 'CDC0F2C8', '', '', 'Y', '0', '92', '0', 'mm', '', '', '');
INSERT INTO `article` VALUES ('24', '', 'contact sub', 'ss', 'contact-sub', 'N', '', '<p><strong style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 14px; orphans: auto; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">Lorem Ipsum</strong><span style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: auto; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\"><span class=\"Apple-converted-space\">&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '', 'Senin', '2014-09-17', '14:05:49', '', '', '', '', 'D', '6655AF71', '', '', 'Y', '0', '132', '0', 'sm1', '', '', '');
INSERT INTO `article` VALUES ('25', '', 'Karir Maxley', 'Karir Maxley', 'karir-maxley', '', 'N', '<p>Server proxy menolak sambungan<br /><br />Firefox telah diatur menggunakan server proxy yang menolak sambungan.<br /><br />&nbsp;&nbsp;&nbsp; Periksa pengaturan proxy, pastikan sudah benar.<br />&nbsp;&nbsp;&nbsp; Hubungi administrator jaringan Anda untuk memastikan server proxy sudah berjalan.</p>\r\n<p>Server proxy menolak sambungan<br /><br />Firefox telah diatur menggunakan server proxy yang menolak sambungan.<br /><br />&nbsp;&nbsp;&nbsp; Periksa pengaturan proxy, pastikan sudah benar.<br />&nbsp;&nbsp;&nbsp; Hubungi administrator jaringan Anda untuk memastikan server proxy sudah berjalan.</p>\r\n<p>Server proxy menolak sambungan<br /><br />Firefox telah diatur menggunakan server proxy yang menolak sambungan.<br /><br />&nbsp;&nbsp;&nbsp; Periksa pengaturan proxy, pastikan sudah benar.<br />&nbsp;&nbsp;&nbsp; Hubungi administrator jaringan Anda untuk memastikan server proxy sudah berjalan.</p>', '', 'Selasa', '2014-09-10', '09:46:55', '', '', '', '', 'D', '70BC7773', '', '', 'Y', '0', '133', '0', 'mm', '', '', '');
INSERT INTO `article` VALUES ('26', '', 'About Travel', '', 'about-travel', '', 'N', '<p>As a hospitality and property industry, PT Patra Jasa has entered the modern era by developing its business in hotels, residential and office tower as demands.</p>\r\n<p>Our success is driven by our people and their consistent focus on delivering result the right way by using our corporate values to give the stake holder the best&nbsp;services.</p>\r\n<p>We are executing with satisfaction and maximizing profit, applying innovation and learning continuously by capturing new opportunities for sustainable growth.</p>\r\n<p>&nbsp;</p>\r\n<p>As a company and individual, we take great pride in contributing to the communities where we live and work. We also care about the environmental and social responsibilities and are proud of the many ways in which our employees work to safeguard it. To meet the new challenge in global hospitality and industrial market, PT Patra Jasa is responding through a Transformation Program to all units and assets, and from management to employees as we pursue a long term vision and mission to become a company chosen by customers in hospitality and property industry. In the future, we would like to do IPO (Initial Public Offering) for PT Patra Jasa business growth. We realize that the world needs to put a smile on its face. That is why we are doing our best to present the best way for you to SMILE in your essential activities.</p>', '', 'Selasa', '2014-09-11', '11:13:10', '', '', '', '', 'D', '17E314C7', '', '', 'Y', '0', '134', '0', 'sm2', '', '', '');

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
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
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('3', '2D0FD64B', 'mr', 'Dodo', 'Wijaya', 'Depok ', 'Depok', 'Jawa Barat', '16512', 'Indonesia', '6283872557399', '6283872557399', 'purnamaeka2014@gmail.com', 'Y');
INSERT INTO `customer` VALUES ('35', 'B6DBA9C8', 'mr', 'fff', 'sdc', 'sdfsd', 'sd ', 'sd ', '4564', 'dfgdf', '567', '567', 'zacky_s2e@yahoo.com', 'Y');
INSERT INTO `customer` VALUES ('34', '3BFA28EE', 'mr', 'sd', 'sd', 'sdv', 'sdvc', 'sadv', '0978', 'sdf', '087', '089', 'ekawijaya2013@gmail.com', 'Y');
INSERT INTO `customer` VALUES ('33', '2E89C77F', 'mr', 'aaa', 'aaa', 'sdcd', 'sdfvsd', 'sdfv', '6456', 'fhfg', '5678', '678', 'ekawijaya2013@gmail.com', 'Y');
INSERT INTO `customer` VALUES ('36', '', '', '', '', '', '', '', '', '', '', '', '', 'R');
INSERT INTO `customer` VALUES ('42', 'C037926B', 'mr', 'hendra', 'adiguna', 'cibulan 4', 'jakarta', 'jakarta selatan', '1234', 'indonesia', '12345678910', '', 'hendraadiguna1@gmail.com', 'Y');
INSERT INTO `customer` VALUES ('39', '9FD0AB3F', 'mr', 'surya', 'wijaya', 'pantai indah kapuk', 'jakarta utara', 'jakarta', '11111', 'indonesia', '0819123567', '021-565956930', 'indra.sakti@hotmail.com', 'Y');
INSERT INTO `customer` VALUES ('43', '7BFE7EB3', 'mr', 'hendra', 'adiguna', 'cibulan 4', 'jakarta', 'jakarta selatan', '1234', 'indonesia', '123456789', '', 'hendraadiguna@mmpgrup.co.id', 'R');
INSERT INTO `customer` VALUES ('41', '98F782E8', 'mr', 'Dewa', 'Asmara', 'klender', 'jakarta', 'jakarta', '12345', 'indonesia', '081288526831', '', 'ijfx2013@gmail.com', 'Y');

-- ----------------------------
-- Table structure for detail_reservasi_room
-- ----------------------------
DROP TABLE IF EXISTS `detail_reservasi_room`;
CREATE TABLE `detail_reservasi_room` (
  `id_detail_reservasi_room` int(10) NOT NULL AUTO_INCREMENT,
  `id_reservasi` varchar(500) NOT NULL,
  `id_room` int(10) NOT NULL,
  PRIMARY KEY (`id_detail_reservasi_room`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_reservasi_room
-- ----------------------------
INSERT INTO `detail_reservasi_room` VALUES ('2', '2D0FD64B', '11');
INSERT INTO `detail_reservasi_room` VALUES ('3', '3BFA28EE', '12');
INSERT INTO `detail_reservasi_room` VALUES ('4', '3BFA28EE', '13');
INSERT INTO `detail_reservasi_room` VALUES ('5', 'B6DBA9C8', '5');
INSERT INTO `detail_reservasi_room` VALUES ('6', '9FD0AB3F', '7');
INSERT INTO `detail_reservasi_room` VALUES ('7', '9FD0AB3F', '9');
INSERT INTO `detail_reservasi_room` VALUES ('8', '9FD0AB3F', '10');
INSERT INTO `detail_reservasi_room` VALUES ('9', '98F782E8', '2');
INSERT INTO `detail_reservasi_room` VALUES ('10', 'C037926B', '11');

-- ----------------------------
-- Table structure for detail_reservasi_service
-- ----------------------------
DROP TABLE IF EXISTS `detail_reservasi_service`;
CREATE TABLE `detail_reservasi_service` (
  `id_detail_reservasi_service` int(10) NOT NULL AUTO_INCREMENT,
  `id_service` int(10) NOT NULL,
  `id_reservasi` varchar(500) NOT NULL,
  PRIMARY KEY (`id_detail_reservasi_service`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_reservasi_service
-- ----------------------------
INSERT INTO `detail_reservasi_service` VALUES ('2', '1', '2D0FD64B');
INSERT INTO `detail_reservasi_service` VALUES ('5', '1', '2D0FD64B');

-- ----------------------------
-- Table structure for email_penerima_reservasi
-- ----------------------------
DROP TABLE IF EXISTS `email_penerima_reservasi`;
CREATE TABLE `email_penerima_reservasi` (
  `id_email` int(10) NOT NULL AUTO_INCREMENT,
  `nama_email` varchar(200) NOT NULL,
  `alamat_email` varchar(200) NOT NULL,
  PRIMARY KEY (`id_email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of email_penerima_reservasi
-- ----------------------------
INSERT INTO `email_penerima_reservasi` VALUES ('1', 'Eka2', 'ekawijaya2013@gmail.com');

-- ----------------------------
-- Table structure for gallery_photo
-- ----------------------------
DROP TABLE IF EXISTS `gallery_photo`;
CREATE TABLE `gallery_photo` (
  `id_gallery_photo` int(11) NOT NULL AUTO_INCREMENT,
  `gen_code_photo` varchar(200) NOT NULL,
  `photo` text NOT NULL,
  `keterangan` longtext NOT NULL,
  `keterangan_eng` longtext NOT NULL,
  PRIMARY KEY (`id_gallery_photo`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gallery_photo
-- ----------------------------
INSERT INTO `gallery_photo` VALUES ('60', 'FB9D84BA', '1412051411.jpg', 'sdf', 'sdfsd');
INSERT INTO `gallery_photo` VALUES ('61', 'FB9D84BA', '1412051488.jpg', 'sdfsdf', '');
INSERT INTO `gallery_photo` VALUES ('62', 'FB9D84BA', '1412051547.jpg', 'asd', '');
INSERT INTO `gallery_photo` VALUES ('63', 'FB9D84BA', '1412051895.jpg', 'sdf', '');
INSERT INTO `gallery_photo` VALUES ('64', 'FB9D84BA', '1412051915.jpg', 'sdf', '');
INSERT INTO `gallery_photo` VALUES ('65', 'FB9D84BA', '1412052003.jpg', '', '');
INSERT INTO `gallery_photo` VALUES ('66', 'FB9D84BA', '1412052104.jpg', '', '');
INSERT INTO `gallery_photo` VALUES ('52', 'CDE63438', '1404972853.jpg', 'leading to Jakarta through Gatot Subroto and HR Rasuna Said, which is a Central Business District and offices that loaded with bustle and activity of the citizens of Jakarta. Patra Residential manages a housing district that has its own uniqueness. Not only located in central business district, shopping centers, entertainment, and hospitals, but it also delights everyone who wants to enjoy a comfortable stay in Patra Residential.\r\n ', '');
INSERT INTO `gallery_photo` VALUES ('47', '3436259B', '1404968495.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry', '');
INSERT INTO `gallery_photo` VALUES ('48', '3436259B', '1404968522.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry', '');
INSERT INTO `gallery_photo` VALUES ('46', '3436259B', '1404967122.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '');
INSERT INTO `gallery_photo` VALUES ('43', '3436259B', '1404966962.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '');
INSERT INTO `gallery_photo` VALUES ('59', 'FB9D84BA', '1412051212.jpg', 'Lorem Ipsum', '');
INSERT INTO `gallery_photo` VALUES ('44', '3436259B', '1404966980.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '');
INSERT INTO `gallery_photo` VALUES ('45', '3436259B', '1404967110.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '');
INSERT INTO `gallery_photo` VALUES ('53', 'CDE63438', '1404972876.jpg', 'leading to Jakarta through Gatot Subroto and HR Rasuna Said, which is a Central Business District and offices that loaded with bustle and activity of the citizens of Jakarta. Patra Residential manages a housing district that has its own uniqueness. Not only located in central business district, shopping centers, entertainment, and hospitals, but it also delights everyone who wants to enjoy a comfortable stay in Patra Residential.\r\n ', '');
INSERT INTO `gallery_photo` VALUES ('54', 'CDE63438', '1404972887.jpg', 'leading to Jakarta through Gatot Subroto and HR Rasuna Said, which is a Central Business District and offices that loaded with bustle and activity of the citizens of Jakarta. Patra Residential manages a housing district that has its own uniqueness. Not only located in central business district, shopping centers, entertainment, and hospitals, but it also delights everyone who wants to enjoy a comfortable stay in Patra Residential.\r\n ', '');
INSERT INTO `gallery_photo` VALUES ('55', 'CDE63438', '1404972901.jpg', 'leading to Jakarta through Gatot Subroto and HR Rasuna Said, which is a Central Business District and offices that loaded with bustle and activity of the citizens of Jakarta. Patra Residential manages a housing district that has its own uniqueness. Not only located in central business district, shopping centers, entertainment, and hospitals, but it also delights everyone who wants to enjoy a comfortable stay in Patra Residential.\r\n ', '');

-- ----------------------------
-- Table structure for halaman_statis
-- ----------------------------
DROP TABLE IF EXISTS `halaman_statis`;
CREATE TABLE `halaman_statis` (
  `id_hal_statis` int(11) NOT NULL AUTO_INCREMENT,
  `nama_hal_statis` varchar(2000) NOT NULL,
  `link_hal_statis` text NOT NULL,
  `isi_hal_statis` text NOT NULL,
  `gambar` varchar(300) NOT NULL,
  PRIMARY KEY (`id_hal_statis`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of halaman_statis
-- ----------------------------
INSERT INTO `halaman_statis` VALUES ('10', 'Discount Akhir Tahun', 'discount-akhir-tahun', '<p><span style=\"font-size: x-small;\"><strong>CALL CENTER MAXLEY</strong></span></p>\r\n<p><span style=\"font-size: x-small;\">(021) 669 1696, (021) 6695 565, (O21) 5595 6930</span></p>\r\n<p><span style=\"font-size: x-small;\">Jl. Pluit Selatan 1 No. 49, Jakarta Utara - Indonesia</span></p>\r\n<p><span style=\"font-size: x-small;\">e-mail&nbsp;&nbsp; : stay@maxleyhotel.co.id</span></p>\r\n<p><span style=\"font-size: x-small;\">website : www.maxleyhotel.co.id&nbsp;</span></p>\r\n<p><span style=\"font-size: x-small;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; www.maxleyhotel.com</span></p>', '1403679468.jpg');
INSERT INTO `halaman_statis` VALUES ('11', 'Gratis Member', 'gratis-member', '<p><span>Today&rsquo;s development environments require high-performance version management solutions that scale to the needs of fast-growing, globally distributed teams. They need an extensible versioning platform that integrates with a wide variety of third-party technologies and tools. Perforce partners are in a unique position to help organizations address these requirements.Today&rsquo;s development environment</span></p>', '1403679816.jpg');

-- ----------------------------
-- Table structure for hotel
-- ----------------------------
DROP TABLE IF EXISTS `hotel`;
CREATE TABLE `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_hotel` varchar(200) NOT NULL,
  `nama_hotel` varchar(100) NOT NULL,
  `alamat` longtext NOT NULL,
  `deskripsi` longtext NOT NULL,
  `no_telp` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_hotel` (`id_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=9285 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hotel
-- ----------------------------
INSERT INTO `hotel` VALUES ('1', 'MAX_d615acdb', 'Max1', 'Jl. Pluit Jakarta Utara', 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ', '9876', '');

-- ----------------------------
-- Table structure for kategori_page
-- ----------------------------
DROP TABLE IF EXISTS `kategori_page`;
CREATE TABLE `kategori_page` (
  `id_kategori_page` int(10) NOT NULL AUTO_INCREMENT,
  `jenis_page` varchar(100) NOT NULL,
  `inisial` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kategori_page`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kategori_page
-- ----------------------------
INSERT INTO `kategori_page` VALUES ('1', 'Admin Menu', 'admin-menu');
INSERT INTO `kategori_page` VALUES ('2', 'Website Menu', 'website-menu');

-- ----------------------------
-- Table structure for komentar
-- ----------------------------
DROP TABLE IF EXISTS `komentar`;
CREATE TABLE `komentar` (
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of komentar
-- ----------------------------

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
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
) ENGINE=MyISAM AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('102', 'Corporate Values', 'Corporate Values', 'corporate-values', '92', 'sm1', '5', '92', '0', '0', '0', '0', 'Y', 'tags');
INSERT INTO `menu` VALUES ('118', 'Gallery', 'Gallery', 'gallery', '92', 'sm1', '5', '92', '0', '0', '0', '0', 'Y', 'star');
INSERT INTO `menu` VALUES ('119', 'Maxley Tour And Travel', 'Maxley Tour And Travel', 'maxley-tour-and-travel', '93', 'sm1', '3', '93', '0', '0', '0', '0', 'Y', 'plane');
INSERT INTO `menu` VALUES ('100', 'Board Of Director', 'Board Of Director', 'board-of-director', '92', 'sm1', '3', '92', '0', '0', '0', '0', 'Y', 'tags');
INSERT INTO `menu` VALUES ('98', 'Overview', 'Overview', 'overview', '92', 'sm1', '1', '92', '0', '0', '0', '0', 'Y', 'tags');
INSERT INTO `menu` VALUES ('97', 'Contact', 'Contact', 'contact', '0', 'mm', '6', '0', '0', '0', '0', '0', 'Y', 'envelope');
INSERT INTO `menu` VALUES ('96', 'Information', 'Information', 'information', '0', 'mm', '5', '0', '0', '0', '0', '0', 'Y', 'user');
INSERT INTO `menu` VALUES ('95', 'Business', 'Business', 'business', '0', 'mm', '4', '0', '0', '0', '0', '0', 'Y', 'suitcase');
INSERT INTO `menu` VALUES ('94', 'Hotels', 'Hotels', 'hotels', '0', 'mm', '3', '0', '0', '0', '0', '0', 'Y', 'glass');
INSERT INTO `menu` VALUES ('93', 'Property', 'Property', 'property', '0', 'mm', '2', '0', '0', '0', '0', '0', 'Y', 'home');
INSERT INTO `menu` VALUES ('92', 'Profil Perusahaan', 'Company Profile', 'company-profile', '0', 'mm', '1', '0', '0', '0', '0', '0', 'Y', 'institution');
INSERT INTO `menu` VALUES ('101', 'Structure Organization', 'Structure Organization', 'structure-organization', '92', 'sm1', '4', '92', '0', '0', '0', '0', 'Y', 'tags');
INSERT INTO `menu` VALUES ('103', 'Maxley Residentials', 'Maxley Residentials', 'maxley-residentials', '93', 'sm1', '1', '93', '0', '0', '0', '0', 'Y', 'home');
INSERT INTO `menu` VALUES ('104', 'Maxley In The Kost', 'Maxley In The Kost', 'maxley-in-the-kost', '93', 'sm1', '2', '93', '0', '0', '0', '0', 'Y', 'lightbulb');
INSERT INTO `menu` VALUES ('126', 'Price', 'Price', 'price', '104', 'sm2', '4', '93', '104', '0', '0', '0', 'Y', 'star');
INSERT INTO `menu` VALUES ('123', 'About', 'About', 'about', '104', 'sm2', '1', '93', '104', '0', '0', '0', 'Y', 'home');
INSERT INTO `menu` VALUES ('124', 'Room', 'Room', 'room', '104', 'sm2', '2', '93', '104', '0', '0', '0', 'Y', 'suitcase');
INSERT INTO `menu` VALUES ('125', 'Location', 'Location', 'location', '104', 'sm2', '3', '93', '104', '0', '0', '0', 'Y', 'lightbulb');
INSERT INTO `menu` VALUES ('136', 'About Us', 'About Us', 'about-us', '94', 'sm1', '1', '94', '0', '0', '0', '0', 'Y', 'tags');
INSERT INTO `menu` VALUES ('127', 'Gallery', 'Gallery', 'gallery', '104', 'sm2', '5', '93', '104', '0', '0', '0', 'Y', 'plane');
INSERT INTO `menu` VALUES ('133', 'Career', 'Career', 'career', '0', 'mm', '8', '0', '0', '0', '0', '0', 'Y', 'home');
INSERT INTO `menu` VALUES ('132', 'Sub Contact', 'sub contact', 'sub-contact', '97', 'sm1', '1', '97', '0', '0', '0', '0', 'Y', 'home');
INSERT INTO `menu` VALUES ('134', 'About Travel', 'About Travel', 'about-travel', '119', 'sm2', '1', '93', '119', '0', '0', '0', 'Y', 'home');
INSERT INTO `menu` VALUES ('135', 'Gallery', 'gallery', 'gallery', '119', 'sm2', '10', '93', '119', '0', '0', '0', 'Y', 'home');
INSERT INTO `menu` VALUES ('137', 'House', 'House', 'house', '94', 'sm1', '2', '94', '0', '0', '0', '0', 'Y', 'home');
INSERT INTO `menu` VALUES ('138', 'Town House', 'Town House', 'town-house', '94', 'sm1', '3', '94', '0', '0', '0', '0', 'Y', 'home');
INSERT INTO `menu` VALUES ('139', 'Location', 'Location', 'location', '94', 'sm1', '4', '94', '0', '0', '0', '0', 'Y', 'home');
INSERT INTO `menu` VALUES ('140', 'Gallery', 'Gallery', 'gallery', '94', 'sm1', '5', '94', '0', '0', '0', '0', 'Y', 'home');

-- ----------------------------
-- Table structure for page
-- ----------------------------
DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id_page` int(10) NOT NULL AUTO_INCREMENT,
  `id_kategori_page` int(10) NOT NULL,
  `nama_page` varchar(50) NOT NULL,
  `link` varchar(200) NOT NULL,
  `urutan` int(11) NOT NULL,
  `status_page` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of page
-- ----------------------------
INSERT INTO `page` VALUES ('1', '1', 'Menu Halaman Admin', '?page=page', '3', 'N');
INSERT INTO `page` VALUES ('24', '1', 'Website Menu', '#', '3', 'Y');
INSERT INTO `page` VALUES ('23', '1', 'Content Setting', '#', '3', 'Y');
INSERT INTO `page` VALUES ('40', '1', 'Hotel', '?page=hotel', '2', 'Y');
INSERT INTO `page` VALUES ('16', '2', 'Contact Us', '?page=contact_us', '5', 'N');
INSERT INTO `page` VALUES ('22', '1', 'Website Setting', '#', '2', 'Y');
INSERT INTO `page` VALUES ('18', '1', 'Home', '?page=home', '1', 'Y');
INSERT INTO `page` VALUES ('27', '1', 'Albums', '#', '4', 'Y');
INSERT INTO `page` VALUES ('29', '2', 'Mitra Kerja', '?page=mitra_kerja', '6', 'N');
INSERT INTO `page` VALUES ('30', '2', 'Logout', '?page=logout', '200', 'Y');
INSERT INTO `page` VALUES ('31', '2', 'Combo Ajax', '?page=comboajax', '3', 'N');
INSERT INTO `page` VALUES ('34', '2', 'Rooms', '?page=rooms', '1', 'Y');
INSERT INTO `page` VALUES ('35', '2', 'Email Reservation', '?page=reservation_email', '2', 'Y');
INSERT INTO `page` VALUES ('36', '2', 'Reservation', '?page=reservasi', '3', 'Y');
INSERT INTO `page` VALUES ('37', '2', 'Customer', '?page=customer', '4', 'N');
INSERT INTO `page` VALUES ('38', '2', 'Service', '?page=service', '5', 'Y');
INSERT INTO `page` VALUES ('39', '2', 'Reservation Report', '?page=report', '5', 'Y');

-- ----------------------------
-- Table structure for reservasi
-- ----------------------------
DROP TABLE IF EXISTS `reservasi`;
CREATE TABLE `reservasi` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reservasi
-- ----------------------------
INSERT INTO `reservasi` VALUES ('2D0FD64B', '1', '10', '2014-08-31', '2014-09-01', '330000', 'N', '0', '1', '1', '0');
INSERT INTO `reservasi` VALUES ('B6DBA9C8', '3', '1', '2014-03-20', '2014-03-21', '330000', 'O', '1', '1', '1', '0');
INSERT INTO `reservasi` VALUES ('3BFA28EE', '1', '2', '2014-03-01', '2014-03-03', '660000', 'O', '1', '1', '1', '0');
INSERT INTO `reservasi` VALUES ('2E89C77F', '3', '1', '2014-03-15', '2014-03-16', '330000', 'O', '1', '1', '1', '0');
INSERT INTO `reservasi` VALUES ('7BFE7EB3', '1', '3', '2014-06-03', '2014-06-05', '990000', 'N', '0', '0', '0', '0');
INSERT INTO `reservasi` VALUES ('C037926B', '1', '1', '2014-06-03', '2014-06-04', '330000', 'O', '0', '1', '1', '0');
INSERT INTO `reservasi` VALUES ('9FD0AB3F', '1', '3', '2014-05-22', '2014-05-23', '990000', 'Y', '0', '1', '1', '0');
INSERT INTO `reservasi` VALUES ('98F782E8', '3', '1', '2014-05-23', '2014-05-24', '350000', 'Y', '0', '1', '1', '0');

-- ----------------------------
-- Table structure for room
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `id_room` int(10) NOT NULL AUTO_INCREMENT,
  `id_room_kategori` int(10) NOT NULL,
  `nmr_room` int(10) NOT NULL,
  `status` enum('Y','N','B') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_room`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of room
-- ----------------------------
INSERT INTO `room` VALUES ('4', '3', '102', 'Y');
INSERT INTO `room` VALUES ('2', '3', '101', 'Y');
INSERT INTO `room` VALUES ('5', '3', '103', 'Y');
INSERT INTO `room` VALUES ('6', '3', '105', 'Y');
INSERT INTO `room` VALUES ('7', '1', '201', 'N');
INSERT INTO `room` VALUES ('8', '1', '202', 'N');
INSERT INTO `room` VALUES ('9', '1', '203', 'N');
INSERT INTO `room` VALUES ('10', '1', '205', 'N');
INSERT INTO `room` VALUES ('11', '1', '301', 'Y');
INSERT INTO `room` VALUES ('12', '1', '302', 'Y');
INSERT INTO `room` VALUES ('13', '1', '303', 'Y');
INSERT INTO `room` VALUES ('14', '1', '305', 'Y');
INSERT INTO `room` VALUES ('15', '1', '1', 'Y');

-- ----------------------------
-- Table structure for room_kategori
-- ----------------------------
DROP TABLE IF EXISTS `room_kategori`;
CREATE TABLE `room_kategori` (
  `id_room_kategori` int(10) NOT NULL AUTO_INCREMENT,
  `nama_room_kategori` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  PRIMARY KEY (`id_room_kategori`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of room_kategori
-- ----------------------------
INSERT INTO `room_kategori` VALUES ('1', 'Executive Room', '330000');
INSERT INTO `room_kategori` VALUES ('3', 'Superior Room', '350000');

-- ----------------------------
-- Table structure for service
-- ----------------------------
DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `id_service` int(10) NOT NULL AUTO_INCREMENT,
  `nama_service` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(10) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_service`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of service
-- ----------------------------
INSERT INTO `service` VALUES ('1', 'Double Bed', '120000', '1', 'Y');
INSERT INTO `service` VALUES ('2', 'Breakfast', '150000', '0', 'Y');

-- ----------------------------
-- Table structure for side_menu
-- ----------------------------
DROP TABLE IF EXISTS `side_menu`;
CREATE TABLE `side_menu` (
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of side_menu
-- ----------------------------
INSERT INTO `side_menu` VALUES ('1', 'Maxley Hotel', 'Maxley Hotel', 'maxley-hotel', '0', 'sd', '1', '0', '0', '0', '0', '0', 'Y');
INSERT INTO `side_menu` VALUES ('2', 'Maxley Property', 'Maxley Property', 'maxley-property', '0', 'sd', '2', '0', '0', '0', '0', '0', 'Y');
INSERT INTO `side_menu` VALUES ('3', 'Maxley In The Kost', 'Maxley In The Kost', 'maxley-in-the-kost', '0', 'sd', '3', '0', '0', '0', '0', '0', 'Y');
INSERT INTO `side_menu` VALUES ('4', 'Maxley Tour And Travel', 'Maxley Tour And Travel', 'maxley-tour-and-travel', '0', 'sd', '4', '0', '0', '0', '0', '0', 'Y');

-- ----------------------------
-- Table structure for statistik
-- ----------------------------
DROP TABLE IF EXISTS `statistik`;
CREATE TABLE `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of statistik
-- ----------------------------
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-23', '406', '1295797934');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-22', '199', '1295712739');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-20', '18', '1295484485');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-19', '10', '1295452438');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-25', '2', '1295961873');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-26', '4', '1296050267');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-27', '7', '1296110326');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-28', '7', '1296233314');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-29', '574', '1296320383');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-30', '290', '1296393287');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-31', '133', '1296493024');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-02-01', '79', '1296521132');
INSERT INTO `statistik` VALUES ('110.138.43.143', '2011-02-01', '31', '1296540211');
INSERT INTO `statistik` VALUES ('66.249.71.118', '2011-02-01', '1', '1296528448');
INSERT INTO `statistik` VALUES ('67.195.115.24', '2011-02-01', '6', '1296538036');
INSERT INTO `statistik` VALUES ('125.161.211.231', '2011-02-01', '1', '1296529398');
INSERT INTO `statistik` VALUES ('222.124.98.187', '2011-02-01', '3', '1296531520');
INSERT INTO `statistik` VALUES ('66.249.71.77', '2011-02-01', '1', '1296532249');
INSERT INTO `statistik` VALUES ('66.249.71.20', '2011-02-01', '1', '1296534199');
INSERT INTO `statistik` VALUES ('117.20.62.233', '2011-02-01', '13', '1296537677');
INSERT INTO `statistik` VALUES ('110.137.200.121', '2011-02-01', '24', '1296540049');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-02-16', '179', '1297875502');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-02-17', '301', '1297961988');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-02-18', '54', '1297990124');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-02-22', '118', '1298393910');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-02-23', '77', '1298479971');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-02-24', '1', '1298510525');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-13', '225', '1300027455');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-14', '44', '1300115678');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-15', '121', '1300195187');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-16', '116', '1300292361');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-17', '4', '1300331607');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-18', '52', '1300422211');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-27', '75', '1301234016');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-28', '16', '1301307056');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-29', '77', '1301409884');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-08', '1', '1407507123');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-09', '1', '1407556847');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-10', '5', '1407659152');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-11', '259', '1407776399');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-12', '233', '1407859246');
INSERT INTO `statistik` VALUES ('192.168.1.9', '2014-08-12', '20', '1407832263');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-13', '127', '1407944036');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-14', '202', '1408023015');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-15', '220', '1408096046');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-16', '559', '1408193789');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-17', '413', '1408271491');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-18', '12', '1408336208');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-21', '142', '1408640383');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-22', '301', '1408708729');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-25', '227', '1408957368');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-26', '264', '1409038335');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-27', '508', '1409141444');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-28', '25', '1409215043');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-08-29', '121', '1409301821');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-09-02', '27', '1409643621');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-09-03', '5', '1409718829');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-09-29', '90', '1411981024');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2014-09-30', '96', '1412053701');
INSERT INTO `statistik` VALUES ('::1', '2017-09-07', '39', '1504803597');
INSERT INTO `statistik` VALUES ('::1', '2017-09-08', '131', '1504809754');

-- ----------------------------
-- Table structure for sub_page
-- ----------------------------
DROP TABLE IF EXISTS `sub_page`;
CREATE TABLE `sub_page` (
  `id_subpage` int(10) NOT NULL AUTO_INCREMENT,
  `id_page` int(10) NOT NULL,
  `nama_subpage` varchar(100) NOT NULL,
  `link_subpage` varchar(100) NOT NULL,
  `urutan` int(11) NOT NULL,
  `status_subpage` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_subpage`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sub_page
-- ----------------------------
INSERT INTO `sub_page` VALUES ('1', '22', 'Admin Website', '?page=admin', '2', 'Y');
INSERT INTO `sub_page` VALUES ('2', '22', 'Template Website', '?page=template_website', '2', 'N');
INSERT INTO `sub_page` VALUES ('3', '22', 'Admin Menu', '?page=page', '3', 'Y');
INSERT INTO `sub_page` VALUES ('4', '22', 'Admin Submenu', '?page=subpage', '3', 'Y');
INSERT INTO `sub_page` VALUES ('13', '27', 'Video Album', '?page=album_video', '2', 'N');
INSERT INTO `sub_page` VALUES ('12', '27', 'Photo Albums', '?page=album_photo', '1', 'Y');
INSERT INTO `sub_page` VALUES ('10', '24', 'Top Menu', '?page=tree_menu', '1', 'Y');
INSERT INTO `sub_page` VALUES ('11', '23', 'Content', '?page=article', '1', 'Y');
INSERT INTO `sub_page` VALUES ('14', '23', 'Promo', '?page=halaman_statis', '1', 'N');
INSERT INTO `sub_page` VALUES ('15', '24', 'Side Menu', '?page=side_menu', '2', 'N');
INSERT INTO `sub_page` VALUES ('16', '23', 'Article By Menu', '?page=article_by_menu', '3', 'N');
INSERT INTO `sub_page` VALUES ('19', '34', 'Room Category', '?page=room_category', '1', 'Y');
INSERT INTO `sub_page` VALUES ('20', '34', 'Room List', '?page=room', '2', 'Y');
INSERT INTO `sub_page` VALUES ('21', '36', 'Manual Reservaiton', '?page=reservasi_manual', '1', 'Y');
INSERT INTO `sub_page` VALUES ('22', '36', 'Reservation Request', '?page=reservation_request', '2', 'Y');
INSERT INTO `sub_page` VALUES ('23', '36', 'Reservation Approved', '?page=reservation_approved', '3', 'N');
INSERT INTO `sub_page` VALUES ('24', '36', 'Reservation Check In', '?page=reservation_checkin', '4', 'Y');
INSERT INTO `sub_page` VALUES ('25', '36', 'Reservation Check Out', '?page=reservation_checkout', '5', 'Y');
