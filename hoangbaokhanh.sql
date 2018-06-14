-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 06 Mai 2018 à 06:03
-- Version du serveur :  5.6.20
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `hoangbaokhanh`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_account`
--

CREATE TABLE suctre.tbl_account (
`id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` int(5) NOT NULL,
  `country` int(5) NOT NULL,
  `favorite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat` int(11) NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(4) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_config`
--

CREATE TABLE suctre.tbl_config (
`id` int(11) NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Contenu de la table `tbl_config`
--

INSERT INTO suctre.tbl_config (`id`, `code`, `content`) VALUES
(1, 'page_title', 'Bao Khanh Land'),
(2, 'meta_description', ''),
(3, 'meta_keywords', ''),
(7, 'social_facebook', 'http://fb.com/'),
(8, 'social_instagram', 'http://instagram.com'),
(9, 'social_twitter', 'http://t.co/'),
(10, 'social_googleplus', 'http://plus.google.com'),
(11, 'social_youtube', 'http://youtube.com/c/'),
(12, 'social_linkedin', 'http://linkedin.com'),
(13, 'social_pinterest', 'http://pinterest.com'),
(14, 'email', 'dangtungson12i4@gmail.com'),
(15, 'phone', 'Mr. Hoàng: 0969.680.011 - 0511.3550.345'),
(16, 'location', '16.071400, 108.236734'),
(17, 'skype', '');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_contact`
--

CREATE TABLE suctre.tbl_contact (
`id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(2) NOT NULL,
  `created` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tbl_contact`
--

INSERT INTO suctre.tbl_contact (`id`, `email`, `name`, `phone`, `address`, `content`, `display`, `created`, `deleted`) VALUES
(1, 'gg@gmail.com', 'Tùng Sơn', '09999999999', 'Đà Nẵng', 'hhhhhhhh', 1, 1484988898, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_email`
--

CREATE TABLE suctre.tbl_email (
`id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `display` tinyint(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tbl_email`
--

INSERT INTO suctre.tbl_email (`id`, `email`, `created`, `deleted`, `display`) VALUES
(1, 'gg@gmail.com', 1482762727, 1482764188, 0),
(2, 'ggg@gmail.com', 1482763867, 1482764185, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_gallery`
--

CREATE TABLE suctre.tbl_gallery (
`id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `display` tinyint(1) NOT NULL,
  `visibility` tinyint(4) NOT NULL DEFAULT '1',
  `time` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Contenu de la table `tbl_gallery`
--

INSERT INTO suctre.tbl_gallery (`id`, `cat`, `name`, `name_en`, `info`, `info_en`, `content`, `content_en`, `thumbnail`, `sort`, `display`, `visibility`, `time`) VALUES
(1, 2, 'doi tac 1', '', '', '', '', '', '1484829757.png', 0, 1, 1, 1484829757),
(2, 2, 'doi tac2', '', '', '', '', '', '1484829770.png', 0, 1, 1, 1484829770),
(3, 2, 'doi tac 3', '', '', '', '', '', '1484829784.png', 0, 1, 1, 1484829784),
(4, 2, 'doi tac 4', '', '', '', '', '', '1484829794.png', 0, 1, 1, 1484829794),
(5, 2, 'doi tac 5', '', '', '', '', '', '1484829804.png', 0, 1, 1, 1484829804),
(6, 1, 'THĂNG LONG SKY VILLAGE', '', '', '', '&lt;p&gt;\r\n	Đỉnh cao cuộc sống&lt;/p&gt;', '', '1484832573.png', 0, 1, 1, 1485145816),
(7, 1, 'THĂNG LONG SKY VILLAGE', '', '', '', '&lt;p&gt;\r\n	Đỉnh cao cuộc sống thượng&lt;/p&gt;', '', '1484832584.png', 0, 1, 1, 1485145823),
(8, 1, 'THĂNG LONG SKY VILLAGE', '', '', '', '&lt;p&gt;\r\n	Đỉnh cao cuộc sống thượng lưu&lt;/p&gt;', '', '1484832594.png', 0, 1, 1, 1484833384),
(9, 4, 'bn du an', '', '', '', '', '', '1484893655.png', 0, 1, 1, 1484893655),
(10, 7, 'bn1', '', '', '', '', '', '1485062929.png', 0, 1, 1, 1485062929),
(11, 8, 'ws1', '', '', '', '', '', '1485062962.png', 0, 1, 1, 1485062962),
(12, 9, 'DỰ ÁN THĂNG LONG SKY VILLAGE', '', '', '', '', '', '1486436620.jpg', 0, 1, 1, 1486436620),
(13, 9, 'DỰ ÁN THĂNG LONG SKY VILLAGE', '', '', '', '', '', '1486436627.jpg', 0, 1, 1, 1486436627),
(14, 9, 'DỰ ÁN THĂNG LONG SKY VILLAGE', '', '', '', '', '', '1486436635.jpg', 0, 1, 1, 1486436635),
(15, 9, 'DỰ ÁN THĂNG LONG SKY VILLAGE', '', '', '', '', '', '1486436641.jpg', 0, 1, 1, 1486436641);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_gallery_album`
--

CREATE TABLE suctre.tbl_gallery_album (
`id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `sort` int(11) NOT NULL,
  `display` tinyint(1) NOT NULL,
  `visibility` tinyint(4) NOT NULL DEFAULT '1',
  `time` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tbl_gallery_album`
--

INSERT INTO suctre.tbl_gallery_album (`id`, `cat`, `code`, `name`, `info`, `content`, `thumbnail`, `sort`, `display`, `visibility`, `time`) VALUES
(1, 12, '', 'anh 1', '', '', '1486456362.jpg', 0, 1, 1, 1486456362),
(2, 12, '', 'anh 4', '', '', '1486456640.jpg', 0, 1, 0, 1486456750),
(3, 12, '', 'anh 2', '', '', '1486457872.jpg', 0, 1, 1, 1486457872),
(4, 12, '', 'anh 3', '', '', '1486457883.jpg', 0, 1, 1, 1486457883);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_gallery_cat`
--

CREATE TABLE suctre.tbl_gallery_cat (
`id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `display` int(11) NOT NULL,
  `visibility` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `tbl_gallery_cat`
--

INSERT INTO suctre.tbl_gallery_cat (`id`, `cat`, `name`, `name_en`, `info`, `info_en`, `sort`, `display`, `visibility`) VALUES
(1, 0, 'Slider trang chủ', '', '', '', 0, 1, 1),
(2, 0, 'Slider đối tác', '', '', '', 0, 1, 1),
(3, 0, 'Banner trang giới thiệu', '', '', '', 0, 1, 1),
(4, 0, 'Banner trang dự án', '', '', '', 0, 1, 1),
(5, 0, 'Banner trang tin tức', '', '', '', 0, 1, 1),
(6, 0, 'Banner trang tuyển dụng', '', '', '', 0, 1, 1),
(7, 0, 'Banner trang hỗ trợ khách hàng', '', '', '', 0, 1, 1),
(8, 0, 'Banner trang sơ đồ website', '', '', '', 0, 1, 1),
(9, 0, 'Thư viện ảnh', '', '', '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_page`
--

CREATE TABLE suctre.tbl_page (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_description_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_keywords_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `tbl_page`
--

INSERT INTO suctre.tbl_page (`id`, `name`, `name_en`, `code`, `info`, `info_en`, `content`, `content_en`, `seo_title`, `seo_description`, `seo_keywords`, `seo_title_en`, `seo_description_en`, `seo_keywords_en`) VALUES
(1, 'Bản quyền (Chân trang)', '', 'ban_quyen', '', '', '&lt;p&gt;\r\n	Copyright &amp;copy; 2017 BAO KHANH LAND&lt;/p&gt;', '', '', '', '', '', '', ''),
(2, 'Liên hệ (Chân trang)', '', 'lien_he_chan_trang', '', '', '&lt;p&gt;\r\n	HO&amp;Agrave;NG BẢO KH&amp;Aacute;NH&lt;/p&gt;\r\n&lt;p&gt;\r\n	Địa chỉ: L&amp;ocirc; 06 L&amp;yacute; Th&amp;aacute;nh T&amp;ocirc;ng,P. An Hải Bắc,Q. Sơn Tr&amp;agrave;,TP. Đ&amp;agrave; Nẵng&lt;/p&gt;\r\n&lt;p&gt;\r\n	Li&amp;ecirc;n hệ: Mr. Ho&amp;agrave;ng - 0969 680 011 - 0511 3550 345&lt;/p&gt;\r\n&lt;p&gt;\r\n	Email: hoangduy.land.dn@gmail.com&lt;/p&gt;', '', '', '', '', '', '', ''),
(3, 'Liên hệ', '', 'lien_he', '', '', '', '', '', '', '', '', '', ''),
(4, 'Hỗ trợ khách hàng', '', 'ho_tro', '', '', '&lt;p&gt;\r\n	&lt;strong&gt;C&amp;ocirc;ng ty Cổ phần Đất Xanh Miền Trung&lt;/strong&gt; l&amp;agrave; th&amp;agrave;nh vi&amp;ecirc;n của tập đo&amp;agrave;n bất động sản h&amp;agrave;ng đầu Việt Nam - Tập đo&amp;agrave;n Đất Xanh, ra đời từ th&amp;aacute;ng 04 năm 2011. Qua c&amp;aacute;c năm trưởng th&amp;agrave;nh v&amp;agrave; ph&amp;aacute;t triển, nhận được sự tin y&amp;ecirc;u v&amp;agrave; những phản hồi t&amp;iacute;ch cực từ kh&amp;aacute;ch h&amp;agrave;ng, Đất Xanh Miền Trung ng&amp;agrave;y c&amp;agrave;ng khẳng định được vị thế v&amp;agrave; uy t&amp;iacute;n của m&amp;igrave;nh, tự h&amp;agrave;o l&amp;agrave; nh&amp;agrave; ph&amp;aacute;t triển dự &amp;aacute;n.&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;strong&gt;C&amp;ocirc;ng ty Cổ phần Đất Xanh Miền Trung&lt;/strong&gt; - 0932 43 63 83 hỗ trợ th&amp;ocirc;ng tin nhanh, ch&amp;iacute;nh x&amp;aacute;c, hiệu quả với phong c&amp;aacute;ch phục vụ tận t&amp;igrave;nh, chuy&amp;ecirc;n nghiệp, hiện đại.&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;strong&gt;Phục vụ 24h/ng&amp;agrave;y v&amp;agrave; 7 ng&amp;agrave;y/tuần, kể cả ng&amp;agrave;y Lễ, Tết&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Cung cấp c&amp;aacute;c tiện &amp;iacute;ch: Hướng dẫn thủ tục, hỗ trợ kh&amp;aacute;ch h&amp;agrave;ng dễ d&amp;agrave;ng t&amp;igrave;m kiếm th&amp;ocirc;ng tin, tự do lựa chọn sản phẩm dịch vụ theo nhu cầu;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Cung cấp th&amp;ocirc;ng tin sản phẩm, dịch vụ, ch&amp;iacute;nh s&amp;aacute;ch ưu đ&amp;atilde;i mới nhất.&lt;/p&gt;', '', '', '', '', '', '', ''),
(5, 'Sơ đồ website', '', 'so_do', '', '', '', '', '', '', '', '', '', ''),
(6, 'hot line 1', '', 'hot_line1', '0937 550 345', '', '', '', '', '', '', '', '', ''),
(7, 'hot line 2', '', 'hot_line2', '0511 3 550 345', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_post`
--

CREATE TABLE suctre.tbl_post (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `seo_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_description_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_keywords_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `display` tinyint(4) NOT NULL,
  `visibility` tinyint(4) DEFAULT '1',
  `time` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Contenu de la table `tbl_post`
--

INSERT INTO suctre.tbl_post (`id`, `name`, `name_en`, `info`, `info_en`, `cat`, `content`, `content_en`, `thumbnail`, `seo_title`, `seo_description`, `seo_keywords`, `seo_title_en`, `seo_description_en`, `seo_keywords_en`, `sort`, `display`, `visibility`, `time`) VALUES
(1, 'Bất động sản Đà Nẵng: Phân khúc văn phòng cho thuê nhiều tiềm năng', '', 'Sau một giai đoạn chìm lắng, thời gian gần đây thị trường bất động sản cho thuê tại Đà Nẵng đang nóng trở lại do nhà đầu tư đến với Đà Nẵng ngày càng nhiều, kéo theo nhu cầu thuê văn phòng cũng tăng lên với giá cao nhất có thể đạt 20 USD/m2/tháng.', '', 9, '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Số liệu thống k&amp;ecirc; của Sở kế hoạch v&amp;agrave; Đầu tư Đ&amp;agrave; Nẵng, ri&amp;ecirc;ng trong năm 2016 th&amp;agrave;nh phố tiếp nhận mới v&amp;agrave; cấp giấy chứng nhận đầu tư cho khoảng 4.000 doanh nghiệp, chi nh&amp;aacute;nh v&amp;agrave; văn ph&amp;ograve;ng đại diện, đa phần c&amp;aacute;c chi nh&amp;aacute;nh v&amp;agrave; văn ph&amp;ograve;ng đại diện c&amp;oacute; xu hướng thu&amp;ecirc; văn ph&amp;ograve;ng để l&amp;agrave;m trụ sở l&amp;agrave;m việc.&lt;/p&gt;\r\n&lt;h2 style=&quot;text-align: justify;&quot;&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;Thị trường đang ph&amp;aacute;t triển&lt;/span&gt;&lt;/h2&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Chị Nguyệt Nga c&amp;oacute; căn nh&amp;agrave; 5 tầng tại đường Pasteur &amp;ndash; quận Hải Ch&amp;acirc;u đang sử dụng l&amp;agrave;m văn ph&amp;ograve;ng cho thu&amp;ecirc; cho biết: &amp;ldquo;Tầng 1 c&amp;oacute; diện t&amp;iacute;ch 165 m2 bao gồm cả cầu thang t&amp;ocirc;i đang cho thu&amp;ecirc; với gi&amp;aacute; 40 triệu đồng/th&amp;aacute;ng, ở c&amp;aacute;c tầng tr&amp;ecirc;n c&amp;oacute; mức thu&amp;ecirc; thấp hơn khoảng từ 15 &amp;ndash; 20 triệu đồng/th&amp;aacute;ng. Gi&amp;aacute; cho thu&amp;ecirc; cũng t&amp;ugrave;y thuộc v&amp;agrave;o vị tr&amp;iacute; của mặt bằng cho thu&amp;ecirc;, nếu mặt bằng 2 mặt tiền gi&amp;aacute; thu&amp;ecirc; sẽ cao hơn khoảng 0,5 lần so với một mặt tiền&amp;rdquo;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	&lt;br /&gt;\r\n	&lt;img alt=&quot;&quot; src=&quot;/uploads/image/images/Diem%20sang%20o%20phan%20khuc%20cho%20thue%20tai%20Da%20Nang.jpg&quot; style=&quot;width: 80%;&quot; /&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	&lt;span style=&quot;font-size:12px;&quot;&gt;Thị trường cho thu&amp;ecirc; tại Đ&amp;agrave; Nẵng đạt nhiều kết quả t&amp;iacute;ch cực trong năm 2016.&lt;/span&gt;&lt;br /&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Thị trường cho thu&amp;ecirc; tại Đ&amp;agrave; Nẵng trong năm qua tiếp tục nhận được nhiều kết quả t&amp;iacute;ch cực. Trong thống k&amp;ecirc; hoạt động kinh doanh, c&amp;aacute;c dịch vụ bất động sản cho thu&amp;ecirc; c&amp;oacute; chuyển biến t&amp;iacute;ch cực, nổi bật l&amp;agrave; ph&amp;acirc;n kh&amp;uacute;c văn ph&amp;ograve;ng cho thu&amp;ecirc; đang trở th&amp;agrave;nh điểm s&amp;aacute;ng trong thị trường cho thu&amp;ecirc; tại Đ&amp;agrave; Nẵng, cả nguồn cung cho thu&amp;ecirc; v&amp;agrave; nhu cầu thu&amp;ecirc; đều tăng mạnh trong năm 2016. Nhu cầu mở rộng đầu tư của c&amp;aacute;c doanh nghiệp v&amp;agrave;o Đ&amp;agrave; Nẵng l&amp;agrave; một trong những nguy&amp;ecirc;n nh&amp;acirc;n khiến cho thị trường cho thu&amp;ecirc; trở n&amp;ecirc;n s&amp;ocirc;i động; v&amp;agrave; nguồn cung văn ph&amp;ograve;ng cho thu&amp;ecirc; tăng cũng đ&amp;atilde; c&amp;oacute; t&amp;aacute;c động t&amp;iacute;ch cực đến việc khuyến kh&amp;iacute;ch c&amp;aacute;c hoạt động đầu tư.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Theo đ&amp;aacute;nh gi&amp;aacute;, thị trường cho thu&amp;ecirc; tại Đ&amp;agrave; Nẵng đang tập trung nhiều v&amp;agrave;o nguồn cung mặt bằng cho thu&amp;ecirc; độc lập, sức &amp;eacute;p cạnh tranh cho thu&amp;ecirc; giữa c&amp;aacute;c cao ốc văn ph&amp;ograve;ng kh&amp;ocirc;ng lớn. L&amp;yacute; giải về điều n&amp;agrave;y, &amp;ocirc;ng Phạm Quang Thức &amp;ndash; Nguy&amp;ecirc;n Ph&amp;oacute; Trưởng ban Quản l&amp;yacute; c&amp;aacute;c dự &amp;aacute;n Đ&amp;ocirc; thị Đ&amp;agrave; Nẵng cho biết: &amp;ldquo;Xu hướng của kh&amp;aacute;ch h&amp;agrave;ng khi đến Đ&amp;agrave; Nẵng l&amp;agrave; lựa chọn thu&amp;ecirc; những căn nh&amp;agrave; độc lập, c&amp;oacute; diện t&amp;iacute;ch vừa phải để đặt văn ph&amp;ograve;ng. Việc thu&amp;ecirc; mặt bằng n&amp;agrave;y n&amp;oacute; ph&amp;ugrave; hợp với quy m&amp;ocirc; của chi nh&amp;aacute;nh, văn ph&amp;ograve;ng đại diện v&amp;agrave; quan trọng hơn l&amp;agrave; gi&amp;aacute; thu&amp;ecirc; ph&amp;ugrave; hợp với quy m&amp;ocirc; hoạt động của c&amp;aacute;c chi nh&amp;aacute;nh, văn ph&amp;ograve;ng. Ngo&amp;agrave;i ra thu&amp;ecirc; ở những mặt n&amp;agrave;y sẽ c&amp;oacute; một kh&amp;ocirc;ng gian độc lập để l&amp;agrave;m việc&amp;rdquo;&lt;br /&gt;\r\n	Thống k&amp;ecirc; của C&amp;ocirc;ng ty nghi&amp;ecirc;n cứu thị trường Savills, trong năm 2016 tại Đ&amp;agrave; Nẵng, ri&amp;ecirc;ng đối với c&amp;aacute;c t&amp;ograve;a nh&amp;agrave; c&amp;oacute; văn ph&amp;ograve;ng cho thu&amp;ecirc; đ&amp;atilde; cung cấp cho thị trường th&amp;ecirc;m 86,5 ngh&amp;igrave;n m2 mặt s&amp;agrave;n; tổng diện t&amp;iacute;ch mặt s&amp;agrave;n văn ph&amp;ograve;ng cho thu&amp;ecirc; trong năm khoảng 106,9 ngh&amp;igrave;n m2 tăng 11% so với năm 2015. Trong đ&amp;oacute; quận Hải Ch&amp;acirc;u l&amp;agrave; khu vực tập trung nhiều nguồn cung nhất chiếm 73% thị phần của to&amp;agrave;n th&amp;agrave;nh phố Đ&amp;agrave; Nẵng. C&amp;ocirc;ng suất cho thu&amp;ecirc; theo hạng A, B, C tăng từ 2 &amp;ndash; 15% so với năm 2015, trong đ&amp;oacute; hạng C thuộc ph&amp;acirc;n kh&amp;uacute;c trung b&amp;igrave;nh tăng 15% cao nhất về c&amp;ocirc;ng suất cho thu&amp;ecirc;.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Gi&amp;aacute; cho thu&amp;ecirc; văn ph&amp;ograve;ng tại mặt bằng độc lập v&amp;agrave; cao ốc văn ph&amp;ograve;ng kh&amp;ocirc;ng c&amp;oacute; sự ch&amp;ecirc;nh lệch nhiều. &amp;Ocirc;ng Trần Kiều Việt Kỳ - Ph&amp;oacute; TGĐ Dự &amp;aacute;n Cao ốc F.Home (quận Hải Ch&amp;acirc;u) cho biết: &amp;ldquo;Hiện c&amp;ocirc;ng ty đ&amp;atilde; đưa v&amp;agrave;o khai th&amp;aacute;c dịch vụ cho thu&amp;ecirc; văn ph&amp;ograve;ng tại cao ốc F.Home với gi&amp;aacute; cho thu&amp;ecirc; thấp nhất l&amp;agrave; 10USD/m2/th&amp;aacute;ng kh&amp;ocirc;ng t&amp;iacute;nh nội thất, nếu kh&amp;aacute;ch h&amp;agrave;ng y&amp;ecirc;u cầu th&amp;ecirc;m phần nội thất th&amp;igrave; c&amp;ocirc;ng ty sẽ phục vụ theo hợp đồng, tuy nhi&amp;ecirc;n gi&amp;aacute; thu&amp;ecirc; sẽ tăng l&amp;ecirc;n t&amp;ugrave;y theo tiện &amp;iacute;ch của nội thất&amp;rdquo;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Đại diện C&amp;ocirc;ng ty Cồ phần Tr&amp;agrave;ng Tiền (Sơn Tr&amp;agrave; &amp;ndash; Đ&amp;agrave; Nẵng) cho biết: &amp;ldquo;C&amp;ocirc;ng ty cũng đang tập trung v&amp;agrave;o c&amp;aacute;c mặt bằng độc lập để x&amp;acirc;y văn ph&amp;ograve;ng cho thu&amp;ecirc;, gi&amp;aacute; cho thu&amp;ecirc; văn ph&amp;ograve;ng tại tầng Trệt (tầng 1) với diện t&amp;iacute;ch 100 m2 l&amp;agrave; 500USD/th&amp;aacute;ng, nghĩa l&amp;agrave; rơi v&amp;agrave;o khoảng tr&amp;ecirc;n 5USD/m2/th&amp;aacute;ng.&lt;/p&gt;\r\n&lt;h2 style=&quot;text-align: justify;&quot;&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;Nhiều doanh nghiệp quan t&amp;acirc;m&lt;/span&gt;&lt;/h2&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Theo nhận định của c&amp;aacute;c chuy&amp;ecirc;n gia, năm 2017 thị trường văn ph&amp;ograve;ng cho thu&amp;ecirc; tại Đ&amp;agrave; Nẵng sẽ tiếp tục ph&amp;aacute;t triển mạnh mẽ. Dự kiến sẽ c&amp;oacute; th&amp;ecirc;m khoảng 132 ngh&amp;igrave;n m2 diện t&amp;iacute;ch mặt s&amp;agrave;n gia nhập thị trường, c&amp;ocirc;ng suất v&amp;agrave; gi&amp;aacute; thu&amp;ecirc; mặt bằng cũng sẽ tiếp tục tăng, cụ thể theo c&amp;aacute;c chỉ số dự b&amp;aacute;o: Gi&amp;aacute; cho thu&amp;ecirc; trung b&amp;igrave;nh tăng 11,5% theo năm; C&amp;ocirc;ng suất cho thu&amp;ecirc; tăng b&amp;igrave;nh qu&amp;acirc;n 1,9% theo qu&amp;yacute; v&amp;agrave; 0,9% theo năm.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	B&amp;agrave; Đo&amp;agrave;n Thị Cẩm Hồng &amp;ndash; Gi&amp;aacute;m đốc C&amp;ocirc;ng ty Địa ốc Ho&amp;agrave;ng Bảo &amp;Acirc;n (quận Hải Ch&amp;acirc;u), đơn vị chuy&amp;ecirc;n cung ứng chuỗi nh&amp;agrave; phố Blue House Living cho biết: &amp;ldquo;Nhận thấy được những tiềm năng của thị trường cho thu&amp;ecirc;, trong năm 2017 ngo&amp;agrave;i việc tiếp tục đầu tư mạnh v&amp;agrave;o ph&amp;acirc;n kh&amp;uacute;c nh&amp;agrave; phố, Ho&amp;agrave;ng Bảo &amp;Acirc;n sẽ gia nhập thị trường cho thu&amp;ecirc;. Đầu th&amp;aacute;ng 2 C&amp;ocirc;ng ty sẽ khởi c&amp;ocirc;ng dự &amp;aacute;n biệt thự cao cấp b&amp;ecirc;n cầu Thuận Phước thuộc quận Sơn Tr&amp;agrave; v&amp;agrave; kế tiếp đ&amp;oacute; sẽ đầu tư c&amp;aacute;c dự &amp;aacute;n x&amp;acirc;y văn ph&amp;ograve;ng cho thu&amp;ecirc; tại địa b&amp;agrave;n quận Hải Ch&amp;acirc;u&amp;rdquo;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Năm 2016 tại Đ&amp;agrave; Nẵng đ&amp;atilde; xuất hiện h&amp;agrave;ng loạt c&amp;aacute;c dự &amp;aacute;n Bất động sản lớn v&amp;agrave; h&amp;agrave;ng loạt c&amp;aacute;c đơn vị ph&amp;acirc;n phối lớn tr&amp;ecirc;n cả nước cũng đ&amp;atilde; xuất hiện, chứng tỏ thị trường Bất động sản Đ&amp;agrave; Nẵng đang được nh&amp;agrave; đầu tư đặc biệt quan t&amp;acirc;m, tiềm năng của thị trường đang rất lớn.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	&amp;Ocirc;ng Phạm Quang Thức &amp;ndash; Nguy&amp;ecirc;n Ph&amp;oacute; Trưởng Ban quản l&amp;yacute; c&amp;aacute;c Dự &amp;aacute;n Đ&amp;ocirc; thị Đ&amp;agrave; Nẵng cho biết th&amp;ecirc;m: &amp;ldquo;Hiện nay c&amp;aacute;c nh&amp;agrave; đầu tư Bất động sản đến Đ&amp;agrave; Nẵng ng&amp;agrave;y c&amp;agrave;ng nhiều chứng tỏ nhu cầu về c&amp;aacute;c dịch vụ bất động sản Đ&amp;agrave; Nẵng đang tăng cao. Doanh nghiệp, nh&amp;agrave; đầu tư v&amp;agrave;o c&amp;aacute;c lĩnh vực sẽ đến Đ&amp;agrave; Nẵng nhiều hơn, v&amp;igrave; vậy xu hướng c&amp;aacute;c doanh nghiệp bất động sản Đ&amp;agrave; Nẵng đầu tư v&amp;agrave;o ph&amp;acirc;n kh&amp;uacute;c cho thu&amp;ecirc; l&amp;agrave; tất yếu, nh&amp;agrave; đầu tư sẽ được hưởng lợi nhuận l&amp;acirc;u d&amp;agrave;i từ những sản phẩm cho thu&amp;ecirc;&amp;rdquo;.&lt;/p&gt;', '', '1484809350.jpg', '', '', '', '', '', '', 0, 1, 1, 1484672400),
(2, 'Thị trường bất động sản: Xóa điểm nghẽn để phát triển bền vững', '', '', '', 9, '', '', '1484809360.jpg', '', '', '', '', '', '', 0, 1, 1, 1484672400),
(3, 'Giá đất tại Đà Nẵng có nơi tăng đến 4 lần ggg hhhh gggg', '', 'Quyết định quy định bảng giá các loại đất trên địa bàn Tp.Đà Nẵng, áp dụng từ ngày 1/1/2017 UBND thành phố ban hành. So với đơn giá cũ, bảng giá đất năm 2017 tăng mạnh, nhất là ở 2 quận Sơn Trà và Ngũ Hành Sơn. Thậm chí, có khu vực đất ven biển tăng đến 4', '', 9, '', '', '1484809373.jpg', '', '', '', '', '', '', 0, 1, 1, 1484672400),
(4, 'Thư ngỏ', '', '', '', 15, '&lt;p&gt;\r\n	fsfdsfsfsfsfs&lt;/p&gt;', '', 'no', '', '', '', '', '', '', 0, 1, 1, 1484672400),
(5, 'Tầm nhìn tổng quan', '', '', '', 15, '', '', 'no', '', '', '', '', '', '', 0, 1, 1, 1484719003),
(6, 'Tầm nhìn - sứ mệnh', '', '', '', 15, '', '', 'no', '', '', '', '', '', '', 0, 1, 1, 1484719024),
(7, 'Lịch sử hình thành &amp; phát triển', '', '', '', 15, '', '', 'no', '', '', '', '', '', '', 0, 1, 1, 1484719045),
(8, 'Sơ đồ tổ chức', '', '', '', 15, '', '', 'no', '', '', '', '', '', '', 0, 1, 1, 1484719065),
(9, 'Chính sách nhân sự', '', '', '', 2, '', '', 'no', '', '', '', '', '', '', 0, 1, 1, 1484719991),
(10, 'Định hướng nghề nghiệp', '', '', '', 2, '', '', 'no', '', '', '', '', '', '', 0, 1, 1, 1484720006),
(11, 'Đón sóng APEC, bất động sản Đà Nẵng bùng nổ hhhhh hhhhhh ggggg ggggg gggggg gggggg gggggg ggggg gggggg hhhhh', '', 'Để chuẩn bị cho hội nghị APEC 2017, hàng nghìn tỷ đồng đã được chính quyền Đà Nẵng đổ vào các công trình trọng điểm. Kéo theo đó là dòng tiền đầu tư rất lớn chảy vào thị trường bất động sản.', '', 9, '&lt;h2 style=&quot;text-align: justify;&quot;&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;Bất động sản Đ&amp;agrave; Nẵng cất c&amp;aacute;nh c&amp;ugrave;ng APEC 2017&lt;/span&gt;&lt;/h2&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Hiện nay, để chuẩn bị phục vụ cho hội nghị APEC 2017, h&amp;agrave;ng loạt dự &amp;aacute;n lớn tr&amp;ecirc;n địa b&amp;agrave;n th&amp;agrave;nh phố Đ&amp;agrave; Nẵng đang bước v&amp;agrave;o cuộc đua nước r&amp;uacute;t, đẩy nhanh tiến độ ho&amp;agrave;n thiện để phục vụ cho sự kiện n&amp;agrave;y.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Cụ thể, ch&amp;iacute;nh quyền địa phương dự chi gần 300 tỷ đồng để cải tạo, n&amp;acirc;ng cấp nhiều dự &amp;aacute;n hạ tầng giao th&amp;ocirc;ng. Theo đ&amp;oacute;, c&amp;aacute;c tuyến đường tr&amp;ecirc;n địa b&amp;agrave;n th&amp;agrave;nh phố như Nguyễn Văn Linh, V&amp;otilde; Văn Kiệt, Ng&amp;ocirc; Quyền, L&amp;ecirc; Văn Hiến, L&amp;ecirc; Duẩn, Nguyễn Ch&amp;iacute; Thanh, Nguyễn Thị Minh Khai, Đống Đa; Ho&amp;agrave;ng Sa - V&amp;otilde; Nguy&amp;ecirc;n Gi&amp;aacute;p - Trường Sa sẽ được đầu tư chỉnh trang nhằm mang lại diện mạo mới cho Đ&amp;agrave; Nẵng.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	&lt;img alt=&quot;&quot; src=&quot;/uploads/image/images/tt.jpg&quot; style=&quot;width: 80%;&quot; /&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	Đ&amp;oacute;n s&amp;oacute;ng APEC 2017, địa ốc Đ&amp;agrave; Nẵng n&amp;oacute;ng l&amp;ecirc;n từng ng&amp;agrave;y&lt;br /&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Ngo&amp;agrave;i ra, h&amp;agrave;ng loạt c&amp;ocirc;ng tr&amp;igrave;nh kh&amp;aacute;c cũng được gấp r&amp;uacute;t triển khai: n&amp;acirc;ng cấp Trung t&amp;acirc;m Hội nghị Triển l&amp;atilde;m; x&amp;acirc;y dựng Nh&amp;agrave; ga quốc tế, Cảng H&amp;agrave;ng kh&amp;ocirc;ng Quốc tế Đ&amp;agrave; Nẵng; cải tạo Cung thể thao Ti&amp;ecirc;n Sơn; x&amp;acirc;y dựng Hầm chui s&amp;ocirc;ng H&amp;agrave;n&amp;hellip;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	C&amp;oacute; thể thấy, APEC 2017 kh&amp;ocirc;ng chỉ g&amp;oacute;p phần quảng b&amp;aacute; t&amp;ecirc;n tuổi của Đ&amp;agrave; Nẵng tr&amp;ecirc;n bản đồ du lịch quốc tế, gi&amp;uacute;p địa phương n&amp;agrave;y thu h&amp;uacute;t h&amp;agrave;ng triệu kh&amp;aacute;ch du lịch m&amp;agrave; c&amp;ograve;n đ&amp;oacute;n đầu d&amp;ograve;ng tiền đầu tư khổng lồ, k&amp;iacute;ch cầu hạ tầng phố biển.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Lan tỏa theo s&amp;oacute;ng APEC, trong năm 2016, thị trường bất động sản Đ&amp;agrave; Nẵng ghi nhận những bước ph&amp;aacute;t triển đột ph&amp;aacute; với h&amp;agrave;ng loạt dự &amp;aacute;n bung h&amp;agrave;ng; c&amp;ugrave;ng với đ&amp;oacute; l&amp;agrave; cơn sốt tăng gi&amp;aacute; chưa từng c&amp;oacute;.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Đặc biệt, tr&amp;ecirc;n tuyến đường du lịch &amp;ldquo;5 sao&amp;rdquo; Ho&amp;agrave;ng Sa - V&amp;otilde; Nguy&amp;ecirc;n Gi&amp;aacute;p &amp;ndash; Trường Sa, nhiều khu nghỉ dưỡng đẳng cấp lần lượt được c&amp;ocirc;ng bố v&amp;agrave; gấp r&amp;uacute;t triển khai để đ&amp;oacute;n lượng kh&amp;aacute;ch du lịch rất lớn sẽ đổ về Đ&amp;agrave; Nẵng trong dịp APEC.&lt;/p&gt;\r\n&lt;h2 style=&quot;text-align: justify;&quot;&gt;\r\n	&lt;span style=&quot;font-size:16px;&quot;&gt;Hạ tầng ho&amp;agrave;n thiện, h&amp;agrave;ng loạt si&amp;ecirc;u dự &amp;aacute;n đổ bộ&lt;/span&gt;&lt;/h2&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Năm 2016, Đ&amp;agrave; Nẵng đ&amp;oacute;n nhận nhiều dự &amp;aacute;n bất động sản nghỉ dưỡng nổi tiếng như The Sunrise Bay, Furuma, Premier Village Đ&amp;agrave; Nẵng Resort&amp;hellip;&lt;br /&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	&lt;img alt=&quot;&quot; src=&quot;/uploads/image/images/tt1.jpg&quot; style=&quot;width: 80%;&quot; /&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	C&amp;aacute;c đại gia địa ốc tranh thủ sức n&amp;oacute;ng của APEC để bung h&amp;agrave;ng&lt;/p&gt;', '', '1484809386.jpg', '', '', '', '', '', '', 0, 1, 1, 1484672400),
(12, 'Năm 2018, Đà Nẵng khởi công xây hầm vượt sông Hàn gggg ggg', '', 'Mới đây, UBND TP. Đà Nẵng đã có văn bản chỉ đạo các Sở ban ngành thành phố này khẩn trương thực hiện công tác chuẩn bị để Dự án xây dựng hầm chui qua sông Hàn được khởi công vào năm 2018.', '', 9, '&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	&lt;img alt=&quot;&quot; src=&quot;/uploads/image/images/ham-chui-song-han.jpg&quot; style=&quot;width: 80%;&quot; /&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	Hầm vượt s&amp;ocirc;ng H&amp;agrave;n sẽ được x&amp;acirc;y dựng theo phương &amp;aacute;n tuyến hầm thẳng với tổng kinh ph&amp;iacute; dự kiến khoảng 4.700 tỷ&lt;br /&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Văn bản chỉ đạo nhằm triển khai nội dung Th&amp;ocirc;ng b&amp;aacute;o của Th&amp;agrave;nh ủy Đ&amp;agrave; Nẵng về Kết luận của Ban Thường vụ Th&amp;agrave;nh ủy tại cuộc h&amp;agrave;y 27/12/2016 li&amp;ecirc;n quan đến chủ trương đầu tư x&amp;acirc;y dựng c&amp;ocirc;ng tr&amp;igrave;nh hầm vượt s&amp;ocirc;ng H&amp;agrave;n theo phương &amp;aacute;n tuyến hầm thằng.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Cụ thể, UBND TP. Đ&amp;agrave; Nẵng y&amp;ecirc;u cầu Sở Giao th&amp;ocirc;ng Vận tải (GTVT) chỉ đạo c&amp;aacute;c đơn vị tư vấn triển khai thiết kế c&amp;ocirc;ng tr&amp;igrave;nh theo phương &amp;aacute;n tuyến n&amp;ecirc;u tr&amp;ecirc;n; Nghi&amp;ecirc;n cứu giải tỏa mở rộng vệt khai th&amp;aacute;c quỹ đất hai b&amp;ecirc;n c&amp;aacute;c tuyến đường trong phạm vi dự &amp;aacute;n, kết hợp chỉnh trang cảnh quan, kiến tr&amp;uacute;c đ&amp;ocirc; thị;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Đồng thời, phối hợp Ban quản l&amp;yacute; dự &amp;aacute;n đầu tư x&amp;acirc;y dựng c&amp;aacute;c c&amp;ocirc;ng tr&amp;igrave;nh giao th&amp;ocirc;ng khẩn trương triển khai c&amp;aacute;c thủ tục chuẩn bị đầu tư c&amp;ocirc;ng tr&amp;igrave;nh đảm bảo đ&amp;uacute;ng tr&amp;igrave;nh tự, thủ tục của dự &amp;aacute;n nh&amp;oacute;m A tr&amp;igrave;nh cấp c&amp;oacute; thẩm quyền thẩm định, ph&amp;ecirc; duyệt để khởi c&amp;ocirc;ng trong năm 2018.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	TP. Đ&amp;agrave; Nẵng giao cho Sở Kế hoạch v&amp;agrave; Đầu tư phối hợp với Sở T&amp;agrave;i ch&amp;iacute;nh, Sở GTVT c&amp;acirc;n đối kinh ph&amp;iacute; đầu tư từ nguồn vốn ng&amp;acirc;n s&amp;aacute;ch của th&amp;agrave;nh phố; x&amp;acirc;y dựng phương &amp;aacute;n ph&amp;acirc;n bổ kinh ph&amp;iacute; đầu tư ph&amp;ugrave; hợp theo từng giai đoạn v&amp;agrave; hạn chế thấp nhất nguồn vốn vay đối với dự &amp;aacute;n.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Được biết, c&amp;ocirc;ng tr&amp;igrave;nh hầm vượt s&amp;ocirc;ng H&amp;agrave;n sẽ được x&amp;acirc;y dựng theo phương &amp;aacute;n tuyến hầm thẳng với tổng kinh ph&amp;iacute; dự kiến khoảng 4.700 tỷ đồng.&lt;/p&gt;', '', '1484809397.jpg', '', '', '', '', '', '', 0, 1, 1, 1484672400),
(13, 'Giá trị bất động sản có thể đóng băng vì hạ tầng ggggg ggggg gggggg', '', 'Bất động sản (BĐS) và hạ tầng là 2 yếu tố có mối liên hệ mật thiết với nhau. Giá trị BĐS có thể tăng mạnh nhờ hạ tầng, nhưng cũng có thể bị &quot;đóng băng&quot; vì hạ tầng.', '', 9, '&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	&lt;img alt=&quot;&quot; src=&quot;/uploads/image/images/bat-dong-san-mat-gia-tri-vi-co-so-ha-tang.jpg&quot; style=&quot;width: 80%;&quot; /&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	Bất động sản c&amp;oacute; thể mất gi&amp;aacute; v&amp;igrave; hạ tầng giao th&amp;ocirc;ng kh&amp;ocirc;ng c&amp;oacute;&lt;br /&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Theo b&amp;aacute;o c&amp;aacute;o ph&amp;acirc;n t&amp;iacute;ch mới nhất của Bộ phận nghi&amp;ecirc;n cứu, C&amp;ocirc;ng ty tư vấn Savills Việt Nam, H&amp;agrave; Nội v&amp;agrave; Tp.HCM c&amp;oacute; tỷ lệ diện t&amp;iacute;ch đất d&amp;agrave;nh cho giao th&amp;ocirc;ng chỉ ở mức tương đương c&amp;aacute;c th&amp;agrave;nh phố đang ph&amp;aacute;t triển v&amp;agrave; thấp hơn nhiều c&amp;aacute;c đ&amp;ocirc; thị hiện đại trong khu vực.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	&amp;Aacute;p lực l&amp;ecirc;n hạ tầng giao th&amp;ocirc;ng đang tăng l&amp;ecirc;n khi thu nhập b&amp;igrave;nh qu&amp;acirc;n đầu người bước v&amp;agrave;o ngưỡng 3.000-10.000 USD/người/năm, v&amp;igrave; theo quy luật ph&amp;aacute;t triển đ&amp;acirc;y l&amp;agrave; giai đoạn c&amp;oacute; tỷ lệ gia tăng nhanh ch&amp;oacute;ng về tỷ lệ sở hữu &amp;ocirc;t&amp;ocirc; c&amp;aacute; nh&amp;acirc;n.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Doanh số b&amp;aacute;n xe &amp;ocirc; t&amp;ocirc; du lịch tăng trung b&amp;igrave;nh 35%/năm trong 5 năm gần đ&amp;acirc;y. Theo dự b&amp;aacute;o, v&amp;agrave;o năm 2025, số lượng sẽ gấp 3 lần tại H&amp;agrave; Nội v&amp;agrave; Tp.HCM. C&amp;ugrave;ng với sự tăng l&amp;ecirc;n của c&amp;aacute;c phương tiện giao th&amp;ocirc;ng v&amp;agrave; khả năng hạn chế trong việc mở rộng hệ thống đường s&amp;aacute; tại khu vực trung t&amp;acirc;m, nguy cơ tắc nghẽn giao th&amp;ocirc;ng đang trở n&amp;ecirc;n ng&amp;agrave;y c&amp;agrave;ng hiện hữu.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Ngo&amp;agrave;i ra, việc gia tăng số lượng xe &amp;ocirc;t&amp;ocirc; c&amp;aacute; nh&amp;acirc;n sẽ tạo &amp;aacute;p lực về chỗ đỗ xe tại chỗ l&amp;agrave;m việc. Mức ph&amp;iacute; đỗ xe khu vực trung t&amp;acirc;m H&amp;agrave; Nội v&amp;agrave; Tp.HCM đang ở mức cao hơn nhiều so với c&amp;aacute;c th&amp;agrave;nh phố khu vực như Manila, Bangkok hay Jakarta. D&amp;ugrave; vậy, nhu cầu chỗ đỗ xe vẫn kh&amp;oacute; được đ&amp;aacute;p ứng bởi tỷ suất sinh lợi của b&amp;atilde;i đỗ xe đang thấp hơn nhiều so với c&amp;aacute;c hạng mục ph&amp;aacute;t triển kh&amp;aacute;c, chẳng hạn như văn ph&amp;ograve;ng cho thu&amp;ecirc;.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Việc di chuyển bằng phương tiện c&amp;aacute; nh&amp;acirc;n ng&amp;agrave;y c&amp;agrave;ng trở n&amp;ecirc;n kh&amp;oacute; khăn khiến phương tiện giao th&amp;ocirc;ng c&amp;ocirc;ng cộng trở th&amp;agrave;nh sự lựa chọn trong tương lai. Nhưng hiện H&amp;agrave; Nội v&amp;agrave; Tp.HCM đang c&amp;oacute; tỷ lệ sử dụng giao th&amp;ocirc;ng c&amp;ocirc;ng cộng thấp nhất trong khu vực, mức độ &amp;ocirc; nhiễm kh&amp;ocirc;ng kh&amp;iacute; cao.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Theo Savills Việt Nam, Bangkok được xem l&amp;agrave; một m&amp;ocirc; h&amp;igrave;nh kh&amp;aacute; th&amp;agrave;nh c&amp;ocirc;ng để Việt Nam c&amp;oacute; thể học hỏi trong việc huy động nguồn vốn x&amp;atilde; hội h&amp;oacute;a để đầu tư hệ thống giao th&amp;ocirc;ng c&amp;ocirc;ng cộng, nhằm giải quyết c&amp;aacute;c vấn về giao th&amp;ocirc;ng đ&amp;ocirc; thị v&amp;agrave; &amp;ocirc; nhiễm kh&amp;ocirc;ng kh&amp;iacute;.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Việc ph&amp;aacute;t triển hệ thống giao th&amp;ocirc;ng c&amp;ocirc;ng cộng, nhất l&amp;agrave; đường sắt đ&amp;ocirc; thị c&amp;oacute; thể t&amp;aacute;c động mạnh đến sự ph&amp;aacute;t triển của thị trường địa ốc. M&amp;ocirc; h&amp;igrave;nh ph&amp;aacute;t triển quanh điểm trung chuyển (TOD) c&amp;oacute; thể l&amp;agrave; một hướng đi mới, chủ đạo trong tương lai với c&amp;aacute;c hạng mục như nh&amp;agrave; ở, b&amp;aacute;n lẻ, văn ph&amp;ograve;ng, bến đỗ xe ph&amp;aacute;t triển ở khu vực l&amp;acirc;n cận c&amp;aacute;c trạm trung chuyển.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	M&amp;ocirc; h&amp;igrave;nh n&amp;agrave;y đ&amp;atilde; diễn ra tại c&amp;aacute;c nước trong khu vực v&amp;agrave; tạo ra sự gia tăng đ&amp;aacute;ng kể về gi&amp;aacute; trị BĐS khu vực l&amp;acirc;n cận c&amp;aacute;c trạm trung chuyển, chẳng hạn, Hồng K&amp;ocirc;ng (32%), Trung Quốc (10%), Th&amp;aacute;i Lan (10%).&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Xu hướng n&amp;agrave;y được kỳ vọng sẽ sớm diễn ra ở H&amp;agrave; Nội v&amp;agrave; Tp.HCM với c&amp;aacute;c tuyến đường sắt đ&amp;ocirc; thị đầu ti&amp;ecirc;n được đưa v&amp;agrave;o vận h&amp;agrave;nh trước 2020.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Được biết năm 2016, tăng trưởng kinh tế đạt 6,2%, trong đ&amp;oacute; hoạt động kinh doanh BĐS tăng trưởng 4%, cao nhất trong v&amp;ograve;ng 5 năm.&lt;/p&gt;', '', '1484809407.jpg', '', '', '', '', '', '', 0, 1, 1, 1484672400),
(14, 'Bất động sản Đà Nẵng: Phân khúc văn phòng cho thuê nhiều tiềm năng', '', 'Sau một giai đoạn chìm lắng, thời gian gần đây thị trường bất động sản cho thuê tại Đà Nẵng đang nóng trở lại do nhà đầu tư đến với Đà Nẵng ngày càng nhiều, kéo theo nhu cầu thuê văn phòng cũng tăng lên với giá cao nhất có thể đạt 20 USD/m2/tháng.', '', 8, '', '', '1487905863.jpg', '', '', '', '', '', '', 0, 1, 1, 1487869200),
(15, 'Bất động sản Đà Nẵng: Phân khúc văn phòng cho thuê nhiều tiềm năng', '', 'Sau một giai đoạn chìm lắng, thời gian gần đây thị trường bất động sản cho thuê tại Đà Nẵng đang nóng trở lại do nhà đầu tư đến với Đà Nẵng ngày càng nhiều, kéo theo nhu cầu thuê văn phòng cũng tăng lên với giá cao nhất có thể đạt 20 USD/m2/tháng.', '', 8, '', '', 'no', '', '', '', '', '', '', 0, 1, 0, 1487905775),
(16, 'Bất động sản Đà Nẵng: Phân khúc văn phòng cho thuê nhiều tiềm năng', '', 'Sau một giai đoạn chìm lắng, thời gian gần đây thị trường bất động sản cho thuê tại Đà Nẵng đang nóng trở lại do nhà đầu tư đến với Đà Nẵng ngày càng nhiều, kéo theo nhu cầu thuê văn phòng cũng tăng lên với giá cao nhất có thể đạt 20 USD/m2/tháng.', '', 8, '', '', 'no', '', '', '', '', '', '', 0, 1, 0, 1487905778),
(17, 'Bất động sản Đà Nẵng: Phân khúc văn phòng cho thuê nhiều tiềm năng', '', 'Sau một giai đoạn chìm lắng, thời gian gần đây thị trường bất động sản cho thuê tại Đà Nẵng đang nóng trở lại do nhà đầu tư đến với Đà Nẵng ngày càng nhiều, kéo theo nhu cầu thuê văn phòng cũng tăng lên với giá cao nhất có thể đạt 20 USD/m2/tháng.', '', 8, '', '', 'no', '', '', '', '', '', '', 0, 1, 0, 1487905780),
(18, 'Bất động sản Đà Nẵng: Phân khúc văn phòng cho thuê nhiều tiềm năng', '', 'Sau một giai đoạn chìm lắng, thời gian gần đây thị trường bất động sản cho thuê tại Đà Nẵng đang nóng trở lại do nhà đầu tư đến với Đà Nẵng ngày càng nhiều, kéo theo nhu cầu thuê văn phòng cũng tăng lên với giá cao nhất có thể đạt 20 USD/m2/tháng.', '', 8, '', '', '1487905863.jpg', '', '', '', '', '', '', 0, 1, 1, 1487905875),
(19, 'Bất động sản Đà Nẵng: Phân khúc văn phòng cho thuê nhiều tiềm năng', '', 'Sau một giai đoạn chìm lắng, thời gian gần đây thị trường bất động sản cho thuê tại Đà Nẵng đang nóng trở lại do nhà đầu tư đến với Đà Nẵng ngày càng nhiều, kéo theo nhu cầu thuê văn phòng cũng tăng lên với giá cao nhất có thể đạt 20 USD/m2/tháng.', '', 8, '', '', '1487905863.jpg', '', '', '', '', '', '', 0, 1, 1, 1487905877),
(20, 'Bất động sản Đà Nẵng: Phân khúc văn phòng cho thuê nhiều tiềm năng', '', 'Sau một giai đoạn chìm lắng, thời gian gần đây thị trường bất động sản cho thuê tại Đà Nẵng đang nóng trở lại do nhà đầu tư đến với Đà Nẵng ngày càng nhiều, kéo theo nhu cầu thuê văn phòng cũng tăng lên với giá cao nhất có thể đạt 20 USD/m2/tháng.', '', 8, '', '', '1487905863.jpg', '', '', '', '', '', '', 0, 1, 1, 1487905879);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_post_cat`
--

CREATE TABLE suctre.tbl_post_cat (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat` int(11) NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_description_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_keywords_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `display` tinyint(4) NOT NULL,
  `visibility` tinyint(4) NOT NULL DEFAULT '1',
  `time` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Contenu de la table `tbl_post_cat`
--

INSERT INTO suctre.tbl_post_cat (`id`, `name`, `name_en`, `info`, `info_en`, `cat`, `thumbnail`, `seo_title`, `seo_description`, `seo_keywords`, `seo_title_en`, `seo_description_en`, `seo_keywords_en`, `sort`, `display`, `visibility`, `time`) VALUES
(1, 'Tin tức', 'Information', '', '', 0, 'no', '1', '5', '6', '4', '5', '6', 0, 1, 1, 0),
(2, 'Tuyển dụng', '', '', '', 0, 'no', '', '', '', '', '', '', 0, 1, 1, 0),
(4, 'Dịch vụ điêu khắc', 'Sculpturing Service', '', '', 0, 'no', '', '', '', '', '', '', 0, 1, 0, 0),
(6, 'Dự án điêu khắc chính', 'Major sculpturing projects', '', '', 0, 'no', '', '', '', '', '', '', 0, 1, 0, 0),
(7, 'Chứng thực', 'Testimonials', '', '', 0, 'no', '', '', '', '', '', '', 0, 1, 0, 0),
(8, 'Tin tức Bảo Khánh Land', '', '', '', 1, '', '', '', '', '', '', '', 0, 1, 1, 0),
(9, 'Tin thị trường', '', '', '', 1, '', '', '', '', '', '', '', 0, 1, 1, 0),
(10, 'Văn hóa công ty', '', '', '', 1, '', '', '', '', '', '', '', 0, 1, 1, 0),
(11, 'Tin tuyển dụng', '', '', '', 2, '', '', '', '', '', '', '', 0, 1, 1, 0),
(12, 'Chính sách nhân sự', '', '', '', 2, '', '', '', '', '', '', '', 0, 1, 0, 0),
(13, 'Định hướng nghề nghiệp', '', '', '', 2, '', '', '', '', '', '', '', 0, 1, 0, 0),
(14, 'Thông tin liên hệ', '', '', '', 2, '', '', '', '', '', '', '', 0, 0, 0, 0),
(15, 'Giới thiệu', '', '', '', 0, '', '', '', '', '', '', '', 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_product`
--

CREATE TABLE suctre.tbl_product (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` text COLLATE utf8_unicode_ci NOT NULL,
  `info_en` text COLLATE utf8_unicode_ci NOT NULL,
  `cat` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `link_y` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tien_ich` text COLLATE utf8_unicode_ci NOT NULL,
  `vi_tri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioi_thieu` text COLLATE utf8_unicode_ci NOT NULL,
  `tong_quan` text COLLATE utf8_unicode_ci NOT NULL,
  `tien_do` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `seo_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_description_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_keywords_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `hot_item` tinyint(4) NOT NULL,
  `new_item` tinyint(4) NOT NULL,
  `display` tinyint(4) NOT NULL,
  `visibility` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `tbl_product`
--

INSERT INTO suctre.tbl_product (`id`, `name`, `info`, `info_en`, `cat`, `content`, `link_y`, `tien_ich`, `vi_tri`, `gioi_thieu`, `tong_quan`, `tien_do`, `thumbnail`, `seo_title`, `seo_description`, `seo_keywords`, `seo_title_en`, `seo_description_en`, `seo_keywords_en`, `sort`, `time`, `hot_item`, `new_item`, `display`, `visibility`) VALUES
(1, 'gggg', '', '', 1, '', '', '&lt;p&gt;\r\n	5&lt;/p&gt;', '3', '&lt;p&gt;\r\n	1&lt;/p&gt;', '&lt;p&gt;\r\n	2&lt;/p&gt;', '&lt;p&gt;\r\n	4&lt;/p&gt;', 'no', '', '', '', '', '', '', 0, 1484709341, 1, 0, 1, 0),
(2, 'DỰ ÁN THĂNG LONG SKY VILLAGE', 'ff', '', 1, '', 'https://www.youtube.com/watch?v=uDD0052ulaQ', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	&lt;strong&gt;&amp;bull; L&amp;ocirc; số 1( l&amp;ocirc; g&amp;oacute;c 2 mặt tiền giữa Trần Đăng Ninh v&amp;agrave; Nguyễn Sơn) :&lt;/strong&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	- Đất nền x&amp;acirc;y biệt thự, nh&amp;agrave; phố&lt;br /&gt;\r\n	- DT đất: 11m*24,73m = 272,03m2&lt;br /&gt;\r\n	- Hướng Đ&amp;ocirc;ng,Đ&amp;ocirc;ng Bắc&lt;br /&gt;\r\n	- Đường : 15.5m&amp;nbsp;&amp;nbsp; Lề : 7.5m&lt;br /&gt;\r\n	- Đất đ&amp;atilde; c&amp;oacute; sổ đỏ ch&amp;iacute;nh chủ&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	&lt;strong&gt;&amp;bull; L&amp;ocirc; số 2,3,4,5(l&amp;ocirc; ống):&lt;/strong&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	- Đất nền x&amp;acirc;y biệt thự, nh&amp;agrave; phố&lt;br /&gt;\r\n	- DT đất: 11m*24,71m = 271,81m2&lt;br /&gt;\r\n	- Hướng Đ&amp;ocirc;ng,Đ&amp;ocirc;ng Bắc&lt;br /&gt;\r\n	- Đất đ&amp;atilde; c&amp;oacute; sổ đỏ ch&amp;iacute;nh chủ&lt;br /&gt;\r\n	- Đường : 15.5m&amp;nbsp;&amp;nbsp; Lề : 7.5m&lt;/p&gt;', '16.030400, 108.229420', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Dự &amp;aacute;n Thăng Long Sky Village nằm ngay vị tr&amp;iacute; khu đ&amp;ocirc; thị mới nhiều tiềm năng ph&amp;aacute;t triển. Đ&amp;acirc;y được mệnh danh l&amp;agrave; khu đất v&amp;agrave;ng của Q. Hải Ch&amp;acirc;u.&amp;nbsp;&lt;/p&gt;', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	- Nằm ngay tr&amp;ecirc;n Đường Trần Đăng Ninh, tuyến đường sẽ được nối d&amp;agrave;i qua Lotte Mart. Vị tr&amp;iacute; qu&amp;aacute; đẹp v&amp;agrave; đi lại rất thuận tiện.&lt;br /&gt;\r\n	- Nằm ngay vị tr&amp;iacute; hướng Nam&amp;nbsp; trung t&amp;acirc;m th&amp;agrave;nh phố Đ&amp;agrave; Nẵng. L&amp;agrave; nơi đang c&amp;oacute; rất nhiều dự &amp;aacute;n khu đ&amp;ocirc; thị, trung t&amp;acirc;m thương mại Th&amp;agrave;nh Phố Đ&amp;agrave; Nẵng đầu tư x&amp;acirc;y dựng.&lt;br /&gt;\r\n	- Vị tr&amp;iacute; khu đất nằm đối diện Trường Quốc Tế Skyline l&amp;agrave; trường Quốc Tế lớn nhất miền trung ng&amp;ocirc;i trường với nền gi&amp;aacute;o dục rất tốt.&lt;br /&gt;\r\n	- Khu đất biệt thự c&amp;aacute;ch ven s&amp;ocirc;ng Cẩm Lệ 50m&lt;br /&gt;\r\n	- C&amp;aacute;ch b&amp;atilde;i biển Mỹ Kh&amp;ecirc; 2km, c&amp;aacute;ch s&amp;acirc;n bay 2km&lt;br /&gt;\r\n	- C&amp;aacute;ch cầu Rồng 1km, Asia Park 500m, đối diện si&amp;ecirc;u thị LOTTE mart, c&amp;aacute;ch si&amp;ecirc;u thị Metro 500m&lt;br /&gt;\r\n	- Dự &amp;aacute;n Thăng Long Sky Village rất th&amp;iacute;ch hợp cho những nh&amp;agrave; đầu tư , x&amp;acirc;y dựng biệt thự để nghỉ dưỡng.&lt;/p&gt;', '', '1484713078.jpg', '', '2', '4', '', '', '', 0, 1485051818, 1, 0, 1, 1),
(3, 'DỰ ÁN THĂNG LONG SKY VILLAGE', '', '', 1, '', '', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	&lt;strong&gt;&amp;bull; L&amp;ocirc; số 1( l&amp;ocirc; g&amp;oacute;c 2 mặt tiền giữa Trần Đăng Ninh v&amp;agrave; Nguyễn Sơn) :&lt;/strong&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	- Đất nền x&amp;acirc;y biệt thự, nh&amp;agrave; phố&lt;br /&gt;\r\n	- DT đất: 11m*24,73m = 272,03m2&lt;br /&gt;\r\n	- Hướng Đ&amp;ocirc;ng,Đ&amp;ocirc;ng Bắc&lt;br /&gt;\r\n	- Đường : 15.5m&amp;nbsp;&amp;nbsp; Lề : 7.5m&lt;br /&gt;\r\n	- Đất đ&amp;atilde; c&amp;oacute; sổ đỏ ch&amp;iacute;nh chủ&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	&lt;strong&gt;&amp;bull; L&amp;ocirc; số 2,3,4,5(l&amp;ocirc; ống):&lt;/strong&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	- Đất nền x&amp;acirc;y biệt thự, nh&amp;agrave; phố&lt;br /&gt;\r\n	- DT đất: 11m*24,71m = 271,81m2&lt;br /&gt;\r\n	- Hướng Đ&amp;ocirc;ng,Đ&amp;ocirc;ng Bắc&lt;br /&gt;\r\n	- Đất đ&amp;atilde; c&amp;oacute; sổ đỏ ch&amp;iacute;nh chủ&lt;br /&gt;\r\n	- Đường : 15.5m&amp;nbsp;&amp;nbsp; Lề : 7.5m&lt;/p&gt;', '16.030400, 108.229420', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Dự &amp;aacute;n Thăng Long Sky Village nằm ngay vị tr&amp;iacute; khu đ&amp;ocirc; thị mới nhiều tiềm năng ph&amp;aacute;t triển. Đ&amp;acirc;y được mệnh danh l&amp;agrave; khu đất v&amp;agrave;ng của Q. Hải Ch&amp;acirc;u.&amp;nbsp;&lt;/p&gt;', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	- Nằm ngay tr&amp;ecirc;n Đường Trần Đăng Ninh, tuyến đường sẽ được nối d&amp;agrave;i qua Lotte Mart. Vị tr&amp;iacute; qu&amp;aacute; đẹp v&amp;agrave; đi lại rất thuận tiện.&lt;br /&gt;\r\n	- Nằm ngay vị tr&amp;iacute; hướng Nam&amp;nbsp; trung t&amp;acirc;m th&amp;agrave;nh phố Đ&amp;agrave; Nẵng. L&amp;agrave; nơi đang c&amp;oacute; rất nhiều dự &amp;aacute;n khu đ&amp;ocirc; thị, trung t&amp;acirc;m thương mại Th&amp;agrave;nh Phố Đ&amp;agrave; Nẵng đầu tư x&amp;acirc;y dựng.&lt;br /&gt;\r\n	- Vị tr&amp;iacute; khu đất nằm đối diện Trường Quốc Tế Skyline l&amp;agrave; trường Quốc Tế lớn nhất miền trung ng&amp;ocirc;i trường với nền gi&amp;aacute;o dục rất tốt.&lt;br /&gt;\r\n	- Khu đất biệt thự c&amp;aacute;ch ven s&amp;ocirc;ng Cẩm Lệ 50m&lt;br /&gt;\r\n	- C&amp;aacute;ch b&amp;atilde;i biển Mỹ Kh&amp;ecirc; 2km, c&amp;aacute;ch s&amp;acirc;n bay 2km&lt;br /&gt;\r\n	- C&amp;aacute;ch cầu Rồng 1km, Asia Park 500m, đối diện si&amp;ecirc;u thị LOTTE mart, c&amp;aacute;ch si&amp;ecirc;u thị Metro 500m&lt;br /&gt;\r\n	- Dự &amp;aacute;n Thăng Long Sky Village rất th&amp;iacute;ch hợp cho những nh&amp;agrave; đầu tư , x&amp;acirc;y dựng biệt thự để nghỉ dưỡng.&lt;/p&gt;', '', '1484713078.jpg', '', '', '', '', '', '', 0, 1485052254, 1, 0, 1, 1),
(4, 'DỰ ÁN THĂNG LONG SKY VILLAGE', '', '', 1, '', '', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	&lt;strong&gt;&amp;bull; L&amp;ocirc; số 1( l&amp;ocirc; g&amp;oacute;c 2 mặt tiền giữa Trần Đăng Ninh v&amp;agrave; Nguyễn Sơn) :&lt;/strong&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	- Đất nền x&amp;acirc;y biệt thự, nh&amp;agrave; phố&lt;br /&gt;\r\n	- DT đất: 11m*24,73m = 272,03m2&lt;br /&gt;\r\n	- Hướng Đ&amp;ocirc;ng,Đ&amp;ocirc;ng Bắc&lt;br /&gt;\r\n	- Đường : 15.5m&amp;nbsp;&amp;nbsp; Lề : 7.5m&lt;br /&gt;\r\n	- Đất đ&amp;atilde; c&amp;oacute; sổ đỏ ch&amp;iacute;nh chủ&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	&lt;strong&gt;&amp;bull; L&amp;ocirc; số 2,3,4,5(l&amp;ocirc; ống):&lt;/strong&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	- Đất nền x&amp;acirc;y biệt thự, nh&amp;agrave; phố&lt;br /&gt;\r\n	- DT đất: 11m*24,71m = 271,81m2&lt;br /&gt;\r\n	- Hướng Đ&amp;ocirc;ng,Đ&amp;ocirc;ng Bắc&lt;br /&gt;\r\n	- Đất đ&amp;atilde; c&amp;oacute; sổ đỏ ch&amp;iacute;nh chủ&lt;br /&gt;\r\n	- Đường : 15.5m&amp;nbsp;&amp;nbsp; Lề : 7.5m&lt;/p&gt;', '16.030400, 108.229420', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Dự &amp;aacute;n Thăng Long Sky Village nằm ngay vị tr&amp;iacute; khu đ&amp;ocirc; thị mới nhiều tiềm năng ph&amp;aacute;t triển. Đ&amp;acirc;y được mệnh danh l&amp;agrave; khu đất v&amp;agrave;ng của Q. Hải Ch&amp;acirc;u.&amp;nbsp;&lt;/p&gt;', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	- Nằm ngay tr&amp;ecirc;n Đường Trần Đăng Ninh, tuyến đường sẽ được nối d&amp;agrave;i qua Lotte Mart. Vị tr&amp;iacute; qu&amp;aacute; đẹp v&amp;agrave; đi lại rất thuận tiện.&lt;br /&gt;\r\n	- Nằm ngay vị tr&amp;iacute; hướng Nam&amp;nbsp; trung t&amp;acirc;m th&amp;agrave;nh phố Đ&amp;agrave; Nẵng. L&amp;agrave; nơi đang c&amp;oacute; rất nhiều dự &amp;aacute;n khu đ&amp;ocirc; thị, trung t&amp;acirc;m thương mại Th&amp;agrave;nh Phố Đ&amp;agrave; Nẵng đầu tư x&amp;acirc;y dựng.&lt;br /&gt;\r\n	- Vị tr&amp;iacute; khu đất nằm đối diện Trường Quốc Tế Skyline l&amp;agrave; trường Quốc Tế lớn nhất miền trung ng&amp;ocirc;i trường với nền gi&amp;aacute;o dục rất tốt.&lt;br /&gt;\r\n	- Khu đất biệt thự c&amp;aacute;ch ven s&amp;ocirc;ng Cẩm Lệ 50m&lt;br /&gt;\r\n	- C&amp;aacute;ch b&amp;atilde;i biển Mỹ Kh&amp;ecirc; 2km, c&amp;aacute;ch s&amp;acirc;n bay 2km&lt;br /&gt;\r\n	- C&amp;aacute;ch cầu Rồng 1km, Asia Park 500m, đối diện si&amp;ecirc;u thị LOTTE mart, c&amp;aacute;ch si&amp;ecirc;u thị Metro 500m&lt;br /&gt;\r\n	- Dự &amp;aacute;n Thăng Long Sky Village rất th&amp;iacute;ch hợp cho những nh&amp;agrave; đầu tư , x&amp;acirc;y dựng biệt thự để nghỉ dưỡng.&lt;/p&gt;', '', '1484713078.jpg', '', '', '', '', '', '', 0, 1485052268, 1, 0, 1, 1),
(5, 'DỰ ÁN THĂNG LONG SKY VILLAGE', '', '', 1, '', '', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	&lt;strong&gt;&amp;bull; L&amp;ocirc; số 1( l&amp;ocirc; g&amp;oacute;c 2 mặt tiền giữa Trần Đăng Ninh v&amp;agrave; Nguyễn Sơn) :&lt;/strong&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	- Đất nền x&amp;acirc;y biệt thự, nh&amp;agrave; phố&lt;br /&gt;\r\n	- DT đất: 11m*24,73m = 272,03m2&lt;br /&gt;\r\n	- Hướng Đ&amp;ocirc;ng,Đ&amp;ocirc;ng Bắc&lt;br /&gt;\r\n	- Đường : 15.5m&amp;nbsp;&amp;nbsp; Lề : 7.5m&lt;br /&gt;\r\n	- Đất đ&amp;atilde; c&amp;oacute; sổ đỏ ch&amp;iacute;nh chủ&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	&lt;strong&gt;&amp;bull; L&amp;ocirc; số 2,3,4,5(l&amp;ocirc; ống):&lt;/strong&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	- Đất nền x&amp;acirc;y biệt thự, nh&amp;agrave; phố&lt;br /&gt;\r\n	- DT đất: 11m*24,71m = 271,81m2&lt;br /&gt;\r\n	- Hướng Đ&amp;ocirc;ng,Đ&amp;ocirc;ng Bắc&lt;br /&gt;\r\n	- Đất đ&amp;atilde; c&amp;oacute; sổ đỏ ch&amp;iacute;nh chủ&lt;br /&gt;\r\n	- Đường : 15.5m&amp;nbsp;&amp;nbsp; Lề : 7.5m&lt;/p&gt;', '16.030400, 108.229420', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Dự &amp;aacute;n Thăng Long Sky Village nằm ngay vị tr&amp;iacute; khu đ&amp;ocirc; thị mới nhiều tiềm năng ph&amp;aacute;t triển. Đ&amp;acirc;y được mệnh danh l&amp;agrave; khu đất v&amp;agrave;ng của Q. Hải Ch&amp;acirc;u.&amp;nbsp;&lt;/p&gt;', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	- Nằm ngay tr&amp;ecirc;n Đường Trần Đăng Ninh, tuyến đường sẽ được nối d&amp;agrave;i qua Lotte Mart. Vị tr&amp;iacute; qu&amp;aacute; đẹp v&amp;agrave; đi lại rất thuận tiện.&lt;br /&gt;\r\n	- Nằm ngay vị tr&amp;iacute; hướng Nam&amp;nbsp; trung t&amp;acirc;m th&amp;agrave;nh phố Đ&amp;agrave; Nẵng. L&amp;agrave; nơi đang c&amp;oacute; rất nhiều dự &amp;aacute;n khu đ&amp;ocirc; thị, trung t&amp;acirc;m thương mại Th&amp;agrave;nh Phố Đ&amp;agrave; Nẵng đầu tư x&amp;acirc;y dựng.&lt;br /&gt;\r\n	- Vị tr&amp;iacute; khu đất nằm đối diện Trường Quốc Tế Skyline l&amp;agrave; trường Quốc Tế lớn nhất miền trung ng&amp;ocirc;i trường với nền gi&amp;aacute;o dục rất tốt.&lt;br /&gt;\r\n	- Khu đất biệt thự c&amp;aacute;ch ven s&amp;ocirc;ng Cẩm Lệ 50m&lt;br /&gt;\r\n	- C&amp;aacute;ch b&amp;atilde;i biển Mỹ Kh&amp;ecirc; 2km, c&amp;aacute;ch s&amp;acirc;n bay 2km&lt;br /&gt;\r\n	- C&amp;aacute;ch cầu Rồng 1km, Asia Park 500m, đối diện si&amp;ecirc;u thị LOTTE mart, c&amp;aacute;ch si&amp;ecirc;u thị Metro 500m&lt;br /&gt;\r\n	- Dự &amp;aacute;n Thăng Long Sky Village rất th&amp;iacute;ch hợp cho những nh&amp;agrave; đầu tư , x&amp;acirc;y dựng biệt thự để nghỉ dưỡng.&lt;/p&gt;', '', '1484713078.jpg', '', '', '', '', '', '', 0, 1485052283, 1, 0, 1, 1),
(6, 'DỰ ÁN THĂNG LONG SKY VILLAGE', '', '', 1, '', '', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	&lt;strong&gt;&amp;bull; L&amp;ocirc; số 1( l&amp;ocirc; g&amp;oacute;c 2 mặt tiền giữa Trần Đăng Ninh v&amp;agrave; Nguyễn Sơn) :&lt;/strong&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	- Đất nền x&amp;acirc;y biệt thự, nh&amp;agrave; phố&lt;br /&gt;\r\n	- DT đất: 11m*24,73m = 272,03m2&lt;br /&gt;\r\n	- Hướng Đ&amp;ocirc;ng,Đ&amp;ocirc;ng Bắc&lt;br /&gt;\r\n	- Đường : 15.5m&amp;nbsp;&amp;nbsp; Lề : 7.5m&lt;br /&gt;\r\n	- Đất đ&amp;atilde; c&amp;oacute; sổ đỏ ch&amp;iacute;nh chủ&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	&lt;strong&gt;&amp;bull; L&amp;ocirc; số 2,3,4,5(l&amp;ocirc; ống):&lt;/strong&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	- Đất nền x&amp;acirc;y biệt thự, nh&amp;agrave; phố&lt;br /&gt;\r\n	- DT đất: 11m*24,71m = 271,81m2&lt;br /&gt;\r\n	- Hướng Đ&amp;ocirc;ng,Đ&amp;ocirc;ng Bắc&lt;br /&gt;\r\n	- Đất đ&amp;atilde; c&amp;oacute; sổ đỏ ch&amp;iacute;nh chủ&lt;br /&gt;\r\n	- Đường : 15.5m&amp;nbsp;&amp;nbsp; Lề : 7.5m&lt;/p&gt;', '16.030400, 108.229420', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Dự &amp;aacute;n Thăng Long Sky Village nằm ngay vị tr&amp;iacute; khu đ&amp;ocirc; thị mới nhiều tiềm năng ph&amp;aacute;t triển. Đ&amp;acirc;y được mệnh danh l&amp;agrave; khu đất v&amp;agrave;ng của Q. Hải Ch&amp;acirc;u.&amp;nbsp;&lt;/p&gt;', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	- Nằm ngay tr&amp;ecirc;n Đường Trần Đăng Ninh, tuyến đường sẽ được nối d&amp;agrave;i qua Lotte Mart. Vị tr&amp;iacute; qu&amp;aacute; đẹp v&amp;agrave; đi lại rất thuận tiện.&lt;br /&gt;\r\n	- Nằm ngay vị tr&amp;iacute; hướng Nam&amp;nbsp; trung t&amp;acirc;m th&amp;agrave;nh phố Đ&amp;agrave; Nẵng. L&amp;agrave; nơi đang c&amp;oacute; rất nhiều dự &amp;aacute;n khu đ&amp;ocirc; thị, trung t&amp;acirc;m thương mại Th&amp;agrave;nh Phố Đ&amp;agrave; Nẵng đầu tư x&amp;acirc;y dựng.&lt;br /&gt;\r\n	- Vị tr&amp;iacute; khu đất nằm đối diện Trường Quốc Tế Skyline l&amp;agrave; trường Quốc Tế lớn nhất miền trung ng&amp;ocirc;i trường với nền gi&amp;aacute;o dục rất tốt.&lt;br /&gt;\r\n	- Khu đất biệt thự c&amp;aacute;ch ven s&amp;ocirc;ng Cẩm Lệ 50m&lt;br /&gt;\r\n	- C&amp;aacute;ch b&amp;atilde;i biển Mỹ Kh&amp;ecirc; 2km, c&amp;aacute;ch s&amp;acirc;n bay 2km&lt;br /&gt;\r\n	- C&amp;aacute;ch cầu Rồng 1km, Asia Park 500m, đối diện si&amp;ecirc;u thị LOTTE mart, c&amp;aacute;ch si&amp;ecirc;u thị Metro 500m&lt;br /&gt;\r\n	- Dự &amp;aacute;n Thăng Long Sky Village rất th&amp;iacute;ch hợp cho những nh&amp;agrave; đầu tư , x&amp;acirc;y dựng biệt thự để nghỉ dưỡng.&lt;/p&gt;', '', '1484713078.jpg', '', '', '', '', '', '', 0, 1485052312, 1, 0, 1, 1),
(7, 'DỰ ÁN THĂNG LONG SKY VILLAGE', 'ff', '', 1, '', 'https://www.youtube.com/watch?v=uDD0052ulaQ', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	&lt;strong&gt;&amp;bull; L&amp;ocirc; số 1( l&amp;ocirc; g&amp;oacute;c 2 mặt tiền giữa Trần Đăng Ninh v&amp;agrave; Nguyễn Sơn) :&lt;/strong&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	- Đất nền x&amp;acirc;y biệt thự, nh&amp;agrave; phố&lt;br /&gt;\r\n	- DT đất: 11m*24,73m = 272,03m2&lt;br /&gt;\r\n	- Hướng Đ&amp;ocirc;ng,Đ&amp;ocirc;ng Bắc&lt;br /&gt;\r\n	- Đường : 15.5m&amp;nbsp;&amp;nbsp; Lề : 7.5m&lt;br /&gt;\r\n	- Đất đ&amp;atilde; c&amp;oacute; sổ đỏ ch&amp;iacute;nh chủ&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	&lt;strong&gt;&amp;bull; L&amp;ocirc; số 2,3,4,5(l&amp;ocirc; ống):&lt;/strong&gt;&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	- Đất nền x&amp;acirc;y biệt thự, nh&amp;agrave; phố&lt;br /&gt;\r\n	- DT đất: 11m*24,71m = 271,81m2&lt;br /&gt;\r\n	- Hướng Đ&amp;ocirc;ng,Đ&amp;ocirc;ng Bắc&lt;br /&gt;\r\n	- Đất đ&amp;atilde; c&amp;oacute; sổ đỏ ch&amp;iacute;nh chủ&lt;br /&gt;\r\n	- Đường : 15.5m&amp;nbsp;&amp;nbsp; Lề : 7.5m&lt;/p&gt;', '16.030400, 108.229420', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	Dự &amp;aacute;n Thăng Long Sky Village nằm ngay vị tr&amp;iacute; khu đ&amp;ocirc; thị mới nhiều tiềm năng ph&amp;aacute;t triển. Đ&amp;acirc;y được mệnh danh l&amp;agrave; khu đất v&amp;agrave;ng của Q. Hải Ch&amp;acirc;u.&amp;nbsp;&lt;/p&gt;', '&lt;p style=&quot;text-align: justify;&quot;&gt;\r\n	- Nằm ngay tr&amp;ecirc;n Đường Trần Đăng Ninh, tuyến đường sẽ được nối d&amp;agrave;i qua Lotte Mart. Vị tr&amp;iacute; qu&amp;aacute; đẹp v&amp;agrave; đi lại rất thuận tiện.&lt;br /&gt;\r\n	- Nằm ngay vị tr&amp;iacute; hướng Nam&amp;nbsp; trung t&amp;acirc;m th&amp;agrave;nh phố Đ&amp;agrave; Nẵng. L&amp;agrave; nơi đang c&amp;oacute; rất nhiều dự &amp;aacute;n khu đ&amp;ocirc; thị, trung t&amp;acirc;m thương mại Th&amp;agrave;nh Phố Đ&amp;agrave; Nẵng đầu tư x&amp;acirc;y dựng.&lt;br /&gt;\r\n	- Vị tr&amp;iacute; khu đất nằm đối diện Trường Quốc Tế Skyline l&amp;agrave; trường Quốc Tế lớn nhất miền trung ng&amp;ocirc;i trường với nền gi&amp;aacute;o dục rất tốt.&lt;br /&gt;\r\n	- Khu đất biệt thự c&amp;aacute;ch ven s&amp;ocirc;ng Cẩm Lệ 50m&lt;br /&gt;\r\n	- C&amp;aacute;ch b&amp;atilde;i biển Mỹ Kh&amp;ecirc; 2km, c&amp;aacute;ch s&amp;acirc;n bay 2km&lt;br /&gt;\r\n	- C&amp;aacute;ch cầu Rồng 1km, Asia Park 500m, đối diện si&amp;ecirc;u thị LOTTE mart, c&amp;aacute;ch si&amp;ecirc;u thị Metro 500m&lt;br /&gt;\r\n	- Dự &amp;aacute;n Thăng Long Sky Village rất th&amp;iacute;ch hợp cho những nh&amp;agrave; đầu tư , x&amp;acirc;y dựng biệt thự để nghỉ dưỡng.&lt;/p&gt;', '', '1484713078.jpg', '', '2', '4', '', '', '', 0, 1485052441, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_product_album`
--

CREATE TABLE suctre.tbl_product_album (
`id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `sort` int(11) NOT NULL,
  `display` tinyint(1) NOT NULL,
  `visibility` tinyint(4) NOT NULL DEFAULT '1',
  `time` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Contenu de la table `tbl_product_album`
--

INSERT INTO suctre.tbl_product_album (`id`, `cat`, `code`, `name`, `name_en`, `info`, `info_en`, `content`, `content_en`, `thumbnail`, `sort`, `display`, `visibility`, `time`) VALUES
(1, 1, '', 'anh 1', 'anh 1', '', '', '', '', '1483512642.jpg', 0, 0, 1, 1483512642),
(2, 1, '', 'anh 2', 'anh 2', '', '', '', '', '1483536882.jpg', 0, 0, 1, 1483536882),
(3, 1, '', 'anh 3', 'anh 3', '', '', '', '', '1483581380.jpg', 0, 0, 1, 1483581380),
(4, 1, '', 'anh 4', 'anh 4', '', '', '', '', '1483581393.jpg', 0, 0, 1, 1483581393),
(5, 1, '', 'anh 5', 'anh 5', '', '', '', '', '1483581405.jpg', 0, 0, 1, 1483581405),
(6, 1, '', 'anh 6', 'anh 6', '', '', '', '', '1483581436.jpg', 0, 0, 1, 1483581436),
(7, 1, '', 'anh 7', 'anh 7', '', '', '', '', '1483581447.jpg', 0, 0, 1, 1483581447),
(8, 1, '', 'anh 8', 'anh 8', '', '', '', '', '1483581457.jpg', 0, 0, 1, 1483581457),
(9, 2, '', '2hhh', '', '1', '', '', '', 'no', 0, 1, 0, 1484710562),
(10, 2, '', '1', '', '', '', '', '', '1484713109.jpg', 0, 1, 1, 1484713109),
(11, 2, '', '2', '', '', '', '', '', '1484713119.jpg', 0, 1, 1, 1484713119),
(12, 2, '', '3', '', '', '', '', '', '1484713126.jpg', 0, 1, 1, 1484713126),
(13, 2, '', '4', '', '', '', '', '', '1484714215.jpg', 0, 1, 1, 1484714215),
(14, 2, '', '5', '', '', '', '', '', '1484714222.jpg', 0, 1, 1, 1484714222),
(15, 2, '', '6', '', '', '', '', '', '1484714225.jpg', 0, 1, 1, 1484714225),
(16, 2, '', '7', '', '', '', '', '', '1484714229.jpg', 0, 1, 1, 1484714229),
(17, 2, '', '8', '', '', '', '', '', '1484714235.jpg', 0, 1, 1, 1484714235),
(18, 2, '', '9', '', '', '', '', '', '1484714240.jpg', 0, 1, 1, 1484714240),
(19, 2, '', '10', '', '', '', '', '', '1484714247.jpg', 0, 1, 1, 1484714247),
(20, 2, '', '11', '', '', '', '', '', '1484714252.jpg', 0, 1, 1, 1484714252),
(21, 2, '', '12', '', '', '', '', '', '1484714261.jpg', 0, 1, 1, 1484714261),
(22, 2, '', '13', '', '', '', '', '', '1484714268.jpg', 0, 1, 1, 1484714268),
(23, 2, '', '14', '', '', '', '', '', '1484714284.jpg', 0, 1, 1, 1484714284);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_product_cat`
--

CREATE TABLE suctre.tbl_product_cat (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` text COLLATE utf8_unicode_ci NOT NULL,
  `info_en` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `cat` int(11) NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `seo_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_description_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_keywords_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `display` tinyint(4) NOT NULL,
  `visibility` tinyint(4) NOT NULL DEFAULT '1',
  `time` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `tbl_product_cat`
--

INSERT INTO suctre.tbl_product_cat (`id`, `name`, `name_en`, `info`, `info_en`, `content`, `content_en`, `cat`, `thumbnail`, `seo_title`, `seo_description`, `seo_keywords`, `seo_title_en`, `seo_description_en`, `seo_keywords_en`, `sort`, `display`, `visibility`, `time`) VALUES
(1, 'Dự án đầu tư', '', '', '', '', '', 0, 'no', '', '', '', '', '', '', 0, 1, 1, 1484705661),
(2, 'Dự án hợp tác đầu tư', '', '', '', '', '', 0, 'no', '', '', '', '', '', '', 0, 1, 1, 1484705678),
(3, 'Dự án phân phối', '', '', '', '', '', 0, 'no', '', '', '', '', '', '', 0, 1, 1, 1484705691);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_user`
--

CREATE TABLE suctre.tbl_user (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` tinyint(4) NOT NULL DEFAULT '2',
  `display` tinyint(4) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tbl_user`
--

INSERT INTO suctre.tbl_user (`id`, `username`, `password`, `name`, `email`, `phone`, `address`, `user_level`, `display`, `time`) VALUES
(1, 'coder', '0ea4a0db010efd4ed3ca4ebee723b65c', '', '', '', '', 1, 1, 0),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', '', '', 2, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_video`
--

CREATE TABLE suctre.tbl_video (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT '1',
  `time` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tbl_video`
--

INSERT INTO suctre.tbl_video (`id`, `name`, `link`, `display`, `time`) VALUES
(4, 'Video 1', 'https://www.youtube.com/watch?v=_oq_oJlv068', 1, 1487846243);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tbl_account`
--
ALTER TABLE suctre.tbl_account
 ADD PRIMARY KEY (`id`), ADD KEY `email` (`email`);

--
-- Index pour la table `tbl_config`
--
ALTER TABLE suctre.tbl_config
 ADD PRIMARY KEY (`id`), ADD KEY `code` (`code`);

--
-- Index pour la table `tbl_contact`
--
ALTER TABLE suctre.tbl_contact
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_email`
--
ALTER TABLE suctre.tbl_email
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_gallery`
--
ALTER TABLE suctre.tbl_gallery
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_gallery_album`
--
ALTER TABLE suctre.tbl_gallery_album
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_gallery_cat`
--
ALTER TABLE suctre.tbl_gallery_cat
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_page`
--
ALTER TABLE suctre.tbl_page
 ADD PRIMARY KEY (`id`), ADD KEY `code` (`code`);

--
-- Index pour la table `tbl_post`
--
ALTER TABLE suctre.tbl_post
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_post_cat`
--
ALTER TABLE suctre.tbl_post_cat
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_product`
--
ALTER TABLE suctre.tbl_product
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_product_album`
--
ALTER TABLE suctre.tbl_product_album
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_product_cat`
--
ALTER TABLE suctre.tbl_product_cat
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_user`
--
ALTER TABLE suctre.tbl_user
 ADD PRIMARY KEY (`id`), ADD KEY `username` (`username`);

--
-- Index pour la table `tbl_video`
--
ALTER TABLE suctre.tbl_video
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `tbl_account`
--
ALTER TABLE suctre.tbl_account
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tbl_config`
--
ALTER TABLE suctre.tbl_config
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `tbl_contact`
--
ALTER TABLE suctre.tbl_contact
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `tbl_email`
--
ALTER TABLE suctre.tbl_email
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `tbl_gallery`
--
ALTER TABLE suctre.tbl_gallery
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `tbl_gallery_album`
--
ALTER TABLE suctre.tbl_gallery_album
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `tbl_gallery_cat`
--
ALTER TABLE suctre.tbl_gallery_cat
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `tbl_page`
--
ALTER TABLE suctre.tbl_page
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `tbl_post`
--
ALTER TABLE suctre.tbl_post
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `tbl_post_cat`
--
ALTER TABLE suctre.tbl_post_cat
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `tbl_product`
--
ALTER TABLE suctre.tbl_product
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `tbl_product_album`
--
ALTER TABLE suctre.tbl_product_album
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `tbl_product_cat`
--
ALTER TABLE suctre.tbl_product_cat
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `tbl_user`
--
ALTER TABLE suctre.tbl_user
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `tbl_video`
--
ALTER TABLE suctre.tbl_video
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
