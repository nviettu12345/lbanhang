-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2019 at 02:20 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `attr_products`
--

DROP TABLE IF EXISTS `attr_products`;
CREATE TABLE IF NOT EXISTS `attr_products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `num` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attr_products_active_index` (`active`),
  KEY `attr_products_num_index` (`num`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attr_products`
--

INSERT INTO `attr_products` (`id`, `name`, `value`, `active`, `num`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, 1, 0, '2019-11-30 08:49:49', '2019-11-30 08:49:49'),
(2, 'size', 'X', 1, 1, '2019-11-30 08:50:02', '2019-11-30 08:50:02'),
(3, 'màu sắc', 'đen', 1, 0, '2019-11-30 08:51:21', '2019-11-30 08:51:21'),
(4, 'chiều dài', NULL, 1, 0, '2019-11-30 08:52:18', '2019-11-30 08:52:18'),
(5, 'nhà sx', '1', 1, 0, '2019-11-30 09:16:15', '2019-11-30 09:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `haschild` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '1',
  `ext_url` text COLLATE utf8mb4_unicode_ci,
  `rich_schema` text COLLATE utf8mb4_unicode_ci,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `seo_title` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `total_item` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  KEY `categories_slug_index` (`slug`),
  KEY `categories_type_index` (`type`),
  KEY `categories_num_index` (`num`),
  KEY `categories_haschild_index` (`haschild`),
  KEY `categories_active_index` (`active`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `img`, `pid`, `type`, `num`, `haschild`, `description`, `content`, `is_deleted`, `ext_url`, `rich_schema`, `seo_description`, `seo_title`, `active`, `total_item`, `created_at`, `updated_at`) VALUES
(23, 'Trang chủ', 'trang-chu', NULL, NULL, 0, 1, 0, NULL, 'Aquatank là công ty chuyên về các giải pháp cho hệ thống bồn chứa, hệ thống cấp thoát nước và mái che tiên tiến. Một sự kết hợp hoàn hảo giữa công nghệ bồn thép tiền chế và các hệ thống mái che.', '<p>Aquatank là công ty chuyên về các giải pháp cho hệ thống bồn chứa, hệ thống cấp thoát nước và mái che tiên tiến. Một sự kết hợp hoàn hảo giữa công nghệ bồn thép tiền chế và các hệ thống mái che.</p>', 1, NULL, NULL, 'Aquatank là công ty chuyên về các giải pháp cho hệ thống bồn chứa, hệ thống cấp thoát nước và mái che tiên tiến. Một sự kết hợp hoàn hảo giữa công nghệ bồn thép tiền chế và các hệ thống mái che.', 'Trang chủ', 1, 0, '2019-11-29 09:38:39', '2019-11-29 09:38:39'),
(24, 'Giới thiệu', 'gioi-thieu', NULL, NULL, 0, 2, 1, NULL, 'Sản xuất bồn chứa công nghiệp, cung cấp giải pháp lắp ghép bồn chứa công nghiệp, thiết bị xử lý nước', '<p style=\"margin: 0px 0px 10px; font-size: 15px; color: rgb(25, 26, 25); font-family: &quot;open sans&quot;; outline-style: none !important;\"><strong style=\"outline-style: none !important;\"><span style=\"outline-style: none !important; font-family: arial, helvetica, sans-serif;\"><span style=\"outline-style: none !important; font-size: 16px;\">THÔNG TIN CHUNG</span></span></strong></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; font-size: 15px; color: rgb(25, 26, 25); font-family: &quot;open sans&quot;; outline-style: none !important;\"><span style=\"outline-style: none !important; font-family: arial, helvetica, sans-serif;\"><span style=\"outline-style: none !important; font-size: 16px;\"><img alt=\"AQUATANK\" src=\"/kcfinder/upload/images/logo/LOGO%20aquantank.png\" style=\"max-width: 100%; vertical-align: middle; border: 0px; height: 277px; width: 300px; margin-left: 10px; margin-right: 10px; float: right; outline-style: none !important;\" />-&nbsp; Tên đầy đủ:&nbsp;<strong style=\"outline-style: none !important;\">CÔNG TY CỔ PHẦN AQUATANK</strong></span></span></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; font-size: 15px; color: rgb(25, 26, 25); font-family: &quot;open sans&quot;; outline-style: none !important;\"><span style=\"outline-style: none !important; font-family: arial, helvetica, sans-serif;\"><span style=\"outline-style: none !important; font-size: 16px;\">-&nbsp; Tên công ty bằng tiếng Anh:&nbsp;<strong style=\"outline-style: none !important;\">AQUATANK Joint Stock Company</strong></span></span></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; font-size: 15px; color: rgb(25, 26, 25); font-family: &quot;open sans&quot;; outline-style: none !important;\"><span style=\"outline-style: none !important; font-family: arial, helvetica, sans-serif;\"><span style=\"outline-style: none !important; font-size: 16px;\">-&nbsp; Tên giao dịch:&nbsp;</span></span><strong style=\"font-family: arial, helvetica, sans-serif; font-size: 16px; outline-style: none !important;\">AQUATANK&nbsp;</strong></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; font-size: 15px; color: rgb(25, 26, 25); font-family: &quot;open sans&quot;; outline-style: none !important;\"><span style=\"outline-style: none !important; font-family: arial, helvetica, sans-serif;\"><span style=\"outline-style: none !important; font-size: 16px;\">-&nbsp; Trụ sở : 21 ĐOÀN KẾT, P. TÂN SƠN NHÌ, Q. TÂN PHÚ,&nbsp; Tp. HCM&nbsp;<span style=\"outline-style: none !important; white-space: pre;\"> </span></span></span></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; font-size: 15px; color: rgb(25, 26, 25); font-family: &quot;open sans&quot;; outline-style: none !important;\"><span style=\"outline-style: none !important; font-family: arial, helvetica, sans-serif;\"><span style=\"outline-style: none !important; font-size: 16px;\">-&nbsp; Điện thoại :&nbsp; (028) 38.129050 -&nbsp; Fax :&nbsp; (028) 38.129.047&nbsp;&nbsp;<span style=\"outline-style: none !important; white-space: pre;\"> </span></span></span></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; font-size: 15px; color: rgb(25, 26, 25); font-family: &quot;open sans&quot;; outline-style: none !important;\"><span style=\"outline-style: none !important; font-size: 16px; font-family: arial, helvetica, sans-serif;\">- Website:&nbsp;</span><span style=\"outline-style: none !important; font-family: arial, helvetica, sans-serif; font-size: 16px;\">http://aquatank.vn.</span></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; font-size: 15px; color: rgb(25, 26, 25); font-family: &quot;open sans&quot;; outline-style: none !important;\"><span style=\"outline-style: none !important; font-family: arial, helvetica, sans-serif;\"><span style=\"outline-style: none !important; font-size: 16px;\">-&nbsp; E -mail : info@aquatank.vn.</span></span></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; font-size: 15px; color: rgb(25, 26, 25); font-family: &quot;open sans&quot;; outline-style: none !important;\"><strong style=\"font-size: 16px; font-family: arial, helvetica, sans-serif; outline-style: none !important;\">Aquatank</strong><span style=\"outline-style: none !important; font-size: 16px; font-family: arial, helvetica, sans-serif;\">&nbsp;là công ty chuyên về các giải pháp cho hệ thống bồn chứa, hệ thống cấp thoát nước và mái che tiên tiến. Một sự kết hợp hoàn hảo giữa công nghệ bồn thép tiền chế và các hệ thống mái che.</span></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; font-size: 15px; color: rgb(25, 26, 25); font-family: &quot;open sans&quot;; outline-style: none !important;\"><span style=\"outline-style: none !important; font-size: 16px; font-family: arial, helvetica, sans-serif;\">Chúng tôi cam kết cung cấp gói dịch vụ hoàn chỉnh về nhân lực, sản phẩm và kỹ thuật tiên tiến để đáp ứng trọn vẹn các nhu cầu của khách hàng.</span></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; font-size: 15px; color: rgb(25, 26, 25); font-family: &quot;open sans&quot;; outline-style: none !important;\"><span style=\"outline-style: none !important; font-size: 16px; font-family: arial, helvetica, sans-serif;\">Bạn hoàn toàn có thể tin tưởng Aquatank sẽ mang đến những giải pháp về hệ thống bồn chứa và mái che tối ưu nhất.</span></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; font-size: 15px; color: rgb(25, 26, 25); font-family: &quot;open sans&quot;; outline-style: none !important;\"><span style=\"outline-style: none !important; font-size: 16px; font-family: arial, helvetica, sans-serif;\"><strong style=\"outline-style: none !important;\">Aquatank</strong>&nbsp;sở hữu các sáng chế và là nhà sản xuất các loại bể chứa sau đây:</span></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; font-size: 15px; color: rgb(25, 26, 25); font-family: &quot;open sans&quot;; outline-style: none !important;\"><strong style=\"outline-style: none !important;\"><span style=\"outline-style: none !important; font-size: 16px; font-family: arial, helvetica, sans-serif;\">Bể chứa AquaTank: Bể chứa hình trụ tròn&nbsp; .</span></strong></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; font-size: 15px; color: rgb(25, 26, 25); font-family: &quot;open sans&quot;; outline-style: none !important;\"><strong style=\"outline-style: none !important;\"><span style=\"outline-style: none !important; font-size: 16px; font-family: arial, helvetica, sans-serif;\"><strong style=\"font-family: &quot;open sans&quot;; font-size: 15px; outline-style: none !important;\"><span style=\"font-size: 16px; font-family: arial, helvetica, sans-serif; outline-style: none !important;\">Bể chứa AquaTank: Bể chứa hình hộp chữ nhật&nbsp; &nbsp; &nbsp;</span></strong>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></strong></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; font-size: 15px; color: rgb(25, 26, 25); font-family: &quot;open sans&quot;; outline-style: none !important;\"><span style=\"outline-style: none !important; font-size: 16px; font-family: arial, helvetica, sans-serif;\">&nbsp; &nbsp; &nbsp;<strong style=\"outline-style: none !important;\">AquaTank</strong>&nbsp;là thương hiệu độc quyền của các dòng sản phẩm bể chứa được cung cấp bởi&nbsp;<strong style=\"outline-style: none !important;\">Aquatank</strong>, sản phẩm bể chứa này sử dụng công nghệ lắp ghép 2 lớp, với lớp vật liệu bên ngoài là thép&nbsp;<strong style=\"outline-style: none !important;\">cacbon</strong>&nbsp;có phủ sơn&nbsp;<strong style=\"outline-style: none !important;\">epoxy</strong>&nbsp;bảo vệ, lớp bên trong là thép không gỉ.</span></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; font-size: 15px; color: rgb(25, 26, 25); font-family: &quot;open sans&quot;; outline-style: none !important; text-align: center;\"><iframe allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"\" frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/4N_mzEc34CM\" width=\"560\"></iframe></p>', 1, NULL, NULL, 'Sản xuất bồn chứa công nghiệp, cung✅ cấp giải pháp lắp ghép bồn chứa công nghiệp, thiết bị xử lý nước', 'Giới thiệu', 1, 0, '2019-11-29 09:40:28', '2019-11-29 09:52:26'),
(25, 'sản phẩm', 'san-pham', NULL, 'LOGO aquantank.png', 0, 9, 2, NULL, 'DANH MỤC SẢN PHẨM', NULL, 1, NULL, NULL, 'DANH MỤC SẢN PHẨM', 'sản phẩm', 1, 0, '2019-11-29 09:41:38', '2019-11-29 09:52:27'),
(26, 'Bồn chứa công nghiệp hình trụ tròn', 'bon-chua-cong-nghiep-hinh-tru-tron', NULL, 'vom.jpg', 25, 6, 3, NULL, 'BỒN CHỨA CÔNG NGHIỆP HÌNH TRỤ TRÒN', NULL, 1, NULL, NULL, 'BỒN CHỨA CÔNG NGHIỆP HÌNH TRỤ TRÒN', 'Bồn chứa công nghiệp hình trụ tròn', 1, 0, '2019-11-29 09:43:28', '2019-11-29 09:52:34'),
(27, 'BỒN CHỨA CÔNG NGHIỆP HÌNH HỘP CHỮ NHẬT', 'bon-chua-cong-nghiep-hinh-hop-chu-nhat', NULL, 'bon-chua-cong-nghiep-lap-ghep-hinh-hop-chu-nhat-tang-3.jpg', 25, 6, 4, NULL, 'BỒN CHỨA CÔNG NGHIỆP HÌNH HỘP CHỮ NHẬT', NULL, 1, NULL, NULL, 'BỒN CHỨA CÔNG NGHIỆP HÌNH HỘP CHỮ NHẬT', 'BỒN CHỨA CÔNG NGHIỆP HÌNH HỘP CHỮ NHẬT', 1, 0, '2019-11-29 09:43:50', '2019-11-29 09:52:34'),
(28, 'Dự án', 'du-an', NULL, NULL, 0, 5, 5, NULL, 'Dự án', '<p>Dự án</p>', 1, NULL, NULL, 'Dự án', 'Dự án', 1, 0, '2019-11-29 09:44:20', '2019-11-30 05:26:57'),
(29, 'Tin tức và sự kiện', 'tin-tuc-va-su-kien', NULL, NULL, 0, 9, 6, NULL, 'Tin tức và sự kiện', '<p>Tin tức và sự kiện</p>', 1, NULL, NULL, 'Tin tức và sự kiện', 'Tin tức và sự kiện', 1, 0, '2019-11-29 09:44:51', '2019-11-29 09:52:36'),
(30, 'tin công ty', 'tin-cong-ty', NULL, NULL, 29, 5, 7, NULL, 'tin công ty', '<p>tin công ty</p>', 1, NULL, NULL, 'tin công ty', 'tin công ty', 1, 0, '2019-11-29 09:45:12', '2019-11-29 09:52:39'),
(31, 'tin sự kiện', 'tin-su-kien', NULL, NULL, 29, 5, 8, NULL, 'tin sự kiện', '<p>tin sự kiện</p>', 1, NULL, NULL, 'tin sự kiện', 'tin sự kiện', 1, 0, '2019-11-29 09:45:30', '2019-11-29 09:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `cattype`
--

DROP TABLE IF EXISTS `cattype`;
CREATE TABLE IF NOT EXISTS `cattype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cattype`
--

INSERT INTO `cattype` (`id`, `name`) VALUES
(1, 'Trang chủ'),
(2, 'Giới thiệu'),
(6, 'sản phẩm'),
(5, 'tin tức'),
(7, 'liên hệ'),
(8, 'video'),
(9, 'có menu con'),
(10, 'album ảnh'),
(11, 'page'),
(12, 'liên kết ngoài');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_25_092114_create_categories_table', 1),
(5, '2019_11_30_132223_create_products_table', 2),
(6, '2019_11_30_135232_create_attr_products_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL COMMENT 'mã sản phẩm',
  `price` int(11) NOT NULL DEFAULT '0',
  `hot` tinyint(4) NOT NULL DEFAULT '0',
  `sale` int(11) NOT NULL DEFAULT '0',
  `author_id` int(11) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_list` text COLLATE utf8mb4_unicode_ci,
  `attr` text COLLATE utf8mb4_unicode_ci COMMENT 'thuộc tính sản phẩm',
  `tag` text COLLATE utf8mb4_unicode_ci,
  `type` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `ext_url` text COLLATE utf8mb4_unicode_ci,
  `rich_schema` text COLLATE utf8mb4_unicode_ci,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `seo_title` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `pay` tinyint(4) NOT NULL DEFAULT '0',
  `number` tinyint(4) NOT NULL DEFAULT '0',
  `total_rating` int(11) NOT NULL DEFAULT '0' COMMENT 'tổng số đánh giá',
  `total_number` int(11) NOT NULL DEFAULT '0' COMMENT 'tổng số điểm đánh giá',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`),
  KEY `products_slug_index` (`slug`),
  KEY `products_cat_id_index` (`cat_id`),
  KEY `products_code_index` (`code`),
  KEY `products_author_id_index` (`author_id`),
  KEY `products_type_index` (`type`),
  KEY `products_active_index` (`active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_active_index` (`active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
