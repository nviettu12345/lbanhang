-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2019 at 09:54 AM
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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `hot` tinyint(4) NOT NULL DEFAULT '0',
  `author_id` int(11) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `ext_url` text COLLATE utf8mb4_unicode_ci,
  `rich_schema` text COLLATE utf8mb4_unicode_ci,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `seo_title` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `is_noindex` tinyint(4) NOT NULL DEFAULT '0',
  `publish_date` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `articles_name_unique` (`name`),
  KEY `articles_slug_index` (`slug`),
  KEY `articles_cat_id_index` (`cat_id`),
  KEY `articles_author_id_index` (`author_id`),
  KEY `articles_active_index` (`active`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `name`, `slug`, `cat_id`, `hot`, `author_id`, `view`, `img`, `tag`, `description`, `content`, `ext_url`, `rich_schema`, `seo_description`, `seo_title`, `active`, `is_noindex`, `publish_date`, `created_at`, `updated_at`) VALUES
(6, 'Bể lắng nghiêng tăng tốc độ kết bông', 'be-lang-nghieng-tang-toc-do-ket-bong', 30, 0, 0, 0, 'cong-ty-doi-tac-tham-quan-gian-hang - Copy.jpg', '[{\"name_tag\":\"B\\u1ec3 l\\u1eafng nghi\\u00eang t\\u0103ng t\\u1ed1c \\u0111\\u1ed9 k\\u1ebft b\\u00f4ng\",\"slug_tag\":\"be-lang-nghieng-tang-toc-do-ket-bong\"}]', 'Bể lắng nghiêng tăng tốc độ kết bông có cấu tạo gồm bồn chứa hình nón nhiều tầng dạng trượt và nhiều tấm ngăn bố trí trong buồng phản ứng trong.', '<p><a name=\"nguyenly\">Nhờ tính năng này</a>, nước và chất kết tụ dễ dàng bị trộn lẫn và phản ứng bởi trọng lực, sau đó nước phản ứng này chảy từ dưới lên trên (bể lắng kiểu dòng chảy lên) theo quá trình lắng.</p>\r\n\r\n<p>Các tấm nghiêng giúp nâng cao hiệu quả bồi lắng và đảm bảo chất lượng nước cao. Thêm vào đó, Bể lắng nghiêng chỉ cần không gian nhỏ hơn 1/4 ~ 1/6 lần so với bể lắng loại thông thường, do tốc độ lắng được tăng tốc nhờ các tấm nghiêng.</p>\r\n\r\n<p>Hơn nữa, cấu trúc đột phá kiểu mới này làm cho quá trình kết bông, bồi lắng và thậm chí là bùn cô đặc mà không cần bất kỳ nguồn cung cấp năng lượng nào.</p>\r\n\r\n<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>Bể lăng nghiêng tăng tốc độ kết bông</strong></p>\r\n\r\n			<p><a href=\"http://goodwater.vn/nuoc-lanh/tin-tuc/tin-tuc-su-kien/be-lang-nghieng-tang-toc-do-ket-bong.html#nguyenly\"><strong>Nguyên tắc và tóm tắc</strong></a></p>\r\n\r\n			<p><a href=\"http://goodwater.vn/nuoc-lanh/tin-tuc/tin-tuc-su-kien/be-lang-nghieng-tang-toc-do-ket-bong.html#motathietbi\"><strong>Mô tả thiết bị</strong></a></p>\r\n\r\n			<p><a href=\"http://goodwater.vn/nuoc-lanh/tin-tuc/tin-tuc-su-kien/be-lang-nghieng-tang-toc-do-ket-bong.html#thongsokythuat\"><strong>Thông số kỹ thuật</strong></a></p>\r\n\r\n			<p><a href=\"http://goodwater.vn/nuoc-lanh/tin-tuc/tin-tuc-su-kien/be-lang-nghieng-tang-toc-do-ket-bong.html#tomtat\"><strong>&nbsp; &nbsp; 1. tóm tắt</strong></a></p>\r\n\r\n			<p><a href=\"http://goodwater.vn/nuoc-lanh/tin-tuc/tin-tuc-su-kien/be-lang-nghieng-tang-toc-do-ket-bong.html#nguyenly\"><strong>&nbsp; &nbsp; 2. Nguyên lý</strong></a></p>\r\n\r\n			<p><strong>&nbsp; &nbsp;&nbsp;</strong><strong>3.&nbsp;<a href=\"http://goodwater.vn/nuoc-lanh/tin-tuc/tin-tuc-su-kien/be-lang-nghieng-tang-toc-do-ket-bong.html#mota\">Mô tả thiết bị</a></strong></p>\r\n\r\n			<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; a/&nbsp;<a href=\"http://goodwater.vn/nuoc-lanh/tin-tuc/tin-tuc-su-kien/be-lang-nghieng-tang-toc-do-ket-bong.html#buongphanung\">Buồng phản ứng</a></strong></p>\r\n\r\n			<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; b/&nbsp;<a href=\"http://goodwater.vn/nuoc-lanh/tin-tuc/tin-tuc-su-kien/be-lang-nghieng-tang-toc-do-ket-bong.html#khulamsach\">Khu làm sạch.</a></strong></p>\r\n\r\n			<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; c/&nbsp;<a href=\"http://goodwater.vn/nuoc-lanh/tin-tuc/tin-tuc-su-kien/be-lang-nghieng-tang-toc-do-ket-bong.html#khucodac\">Khu cô đặc.</a></strong></p>\r\n\r\n			<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; d/&nbsp;<a href=\"http://goodwater.vn/nuoc-lanh/tin-tuc/tin-tuc-su-kien/be-lang-nghieng-tang-toc-do-ket-bong.html#khuthoatnuoc\">Khu thoát nước.</a></strong></p>\r\n\r\n			<p><strong>&nbsp; &nbsp; 4.&nbsp;<a href=\"http://goodwater.vn/nuoc-lanh/tin-tuc/tin-tuc-su-kien/be-lang-nghieng-tang-toc-do-ket-bong.html#vatlieukythuat\">Vật liệu và đặc điểm kỹ thuật.</a></strong></p>\r\n\r\n			<p><strong>&nbsp; &nbsp; 5.&nbsp;<a href=\"http://goodwater.vn/nuoc-lanh/tin-tuc/tin-tuc-su-kien/be-lang-nghieng-tang-toc-do-ket-bong.html#tinhnang\">Tính năng và ưu điểm.</a></strong></p>\r\n\r\n			<p><strong>&nbsp; &nbsp; 6.&nbsp;<a href=\"http://goodwater.vn/nuoc-lanh/tin-tuc/tin-tuc-su-kien/be-lang-nghieng-tang-toc-do-ket-bong.html#ungdung\">Ứng dụng</a>.</strong></p>\r\n\r\n			<p><a href=\"http://goodwater.vn/nuoc-lanh/tin-tuc/tin-tuc-su-kien/be-lang-nghieng-tang-toc-do-ket-bong.html#quytrinh\"><strong>Quy trình xử lý</strong></a></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><a name=\"motathietbi\"><strong>MÔ TẢ THIẾT BỊ</strong></a></p>\r\n\r\n<p>Bể lắng nghiêng tăng tốc độ kết bông là bể lắng loại hình tròn, có chiều cao lớn hơn và đường kính nhỏ hơn so với các loại bể lắng thông thường. Cấu tạo chính gồm: Buồng phản ứng, khu vực làm sạch, khu vực cô đặc và khu vực nước thoát.</p>\r\n\r\n<p>Rảnh chữ V bổ sung để đo lưu lượng, ống xả bùn, ống nước thải, ống kiểm tra bùn và lối đi đều được trang bị trong một thiết kế trọn gói. Bạn cũng có thể gắn Bể trung hòa nếu cần tích hợp thêm quá trình trung hòa.</p>\r\n\r\n<p><img alt=\"Bể lắng nghiêng tăng tốc độ kết bông\" src=\"http://goodwater.vn/kcfinder/upload/images/Tin-tuc/Tin-tuc-su-kien/Tin-tuc/be-lang-nghieng-tang-toc-do-ket-bong.jpg\" /></p>\r\n\r\n<p>Bánh bùn khử nước độ ẩm dưới 40%, thu bằng máng chuyển</p>\r\n\r\n<p><strong>THÔNG SỐ KỸ THUẬT &amp; CÔNG SUẤT BỂ LẮNG NGHIÊNG</strong></p>\r\n\r\n<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Model</strong></td>\r\n			<td><strong>Kích thước</strong></td>\r\n			<td><strong>Công suất</strong></td>\r\n			<td><strong>Lưu ý</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>PA-20</td>\r\n			<td>2430Dx7200D</td>\r\n			<td>25m3/h</td>\r\n			<td rowspan=\"3\">\r\n			<p>1. Công suất có thể thay đổi theo chất lượng nước đầu vào</p>\r\n\r\n			<p>2. Tỷ lệ loại bỏ SS là hơn 90%</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>PA-30</td>\r\n			<td>2930Dx7500H</td>\r\n			<td>45m3/h</td>\r\n		</tr>\r\n		<tr>\r\n			<td>PA-50</td>\r\n			<td>3880Dx8100H</td>\r\n			<td>75m3/h</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>* Có thể thiết kế theo đơn đặt hàng.</p>\r\n\r\n<p>* Trong trường hợp cần thiết để cải thiện hiệu suất, các thông số kỹ thuật trên có thể được thay đổi mà không cần thông báo trươc.</p>\r\n\r\n<p><img alt=\"Bể lắng nghiêng tăng tốc độ kết bông\" src=\"http://goodwater.vn/kcfinder/upload/images/Tin-tuc/Tin-tuc-su-kien/Tin-tuc/he-thong-xu-ly-nuoc-thai.jpg\" /></p>\r\n\r\n<p>Đựng trong bao đựng nặng 1 tấn</p>\r\n\r\n<p><a name=\"thongsokythuat\"><strong>THÔNG SỐ KỸ THUẬT</strong></a></p>\r\n\r\n<p><strong>1.&nbsp;<a name=\"tomtat\">tóm tắt</a></strong></p>\r\n\r\n<p>Bể lắng nghiêng tăng tốc độ kết bông là bể lắng loại một thân, được thiết kế trong gói sản phẩm bao gồm bể kết bông và bể lắng. Đảm bảo hiệu quả lắng đọng cao và giảm diện tích đặt trang thiết bị nhờ thiết kế đặc biệt bố trí các tấm nghiêng trong bể lắng.</p>\r\n\r\n<p>Bể lắng đặt nghiêng đã được phát triển trên một số thiết bị. Tuy nhiên, tính đến thời điểm hiện tại chưa có bộ bể lắng một thân cỡ lớn nào được tích hợp thêm cả bể kết bông. Thêm vào đó. bể lắng nghiêng hoàn toàn không sử dụng động cơ hỗ trợ.</p>\r\n\r\n<p>Bể lắng chỉ cần không gian nhỏ hơn 1/6 ~ 1/4 lần so với những loại bể lắng thông thường. Nó có thể được chế tạo tại nhà máy và chỉ thực hiện lắp đặt tại công trình. Điều này giúp rút ngắn thời gian thi công&nbsp; tại công trường. Đồng thời có rất nhiều lợi thế kinh tế, như chi phí đầu tư ban đầu ít hơn, không tốn chi phí điện năng và không mất chi phí bảo trì cho các thiết bị điện.</p>\r\n\r\n<p>Có thể gia công bể lắng dưới dạng modun, do đó có rất nhiều ưu điểm chẳng hạn như có thể lắp đặt bổ sung dễ dàng trên kết cấu bê tông sẵn có hay di chuyển tới vị trí khác trong trường hợp cần thiết.</p>\r\n\r\n<p><strong>2.&nbsp;<a name=\"nguyenly\">Nguyên lý</a></strong></p>\r\n\r\n<p>Bể lắng đặt nghiêng cấu tạo gồm bồn chứa hình nón nhiều tầng dạng trượt và nhiều tấm ngăn bố trí trong buồng phản ứng trong. Nhờ tính năng này, nước và chất kết tụ dễ dàng bị trộn lẫn và phản ứng bởi trọng lực, sau đó nước phản ứng này chảy từ dưới lên trên (bể lắng kiểu dòng chảy lên) theo quá trình lắng.&nbsp;</p>\r\n\r\n<p>Trong khi nước phản ứng đi qua các tấ</p>', NULL, NULL, 'Bể lắng nghiêng tăng tốc độ kết bông có cấu tạo gồm bồn chứa hình nón nhiều tầng dạng trượt và nhiều tấm ngăn bố trí trong buồng phản ứng trong.', 'Bể lắng nghiêng tăng tốc độ kết bông', 0, 0, '2019-12-05 06:33:48', '2019-12-05 06:33:48', '2019-12-06 08:14:58'),
(7, 'Gia công cắt CNC Thép - Mẫu 03', 'gia-cong-cat-cnc-thep-mau-03', 31, 0, 0, 0, 'nguoi-nuoc-ngoai-tham-gia-gian-hang-goodwater.jpg', '[{\"name_tag\":\"Gia c\\u00f4ng c\\u1eaft CNC c\\u1eaft th\\u00e9p theo m\\u1eabu s\\u1ea3n ph\\u1ea9m 03\",\"slug_tag\":\"gia-cong-cat-cnc-cat-thep-theo-mau-san-pham-03\"}]', 'Gia công cắt CNC cắt thép theo mẫu sản phẩm 03', '<p>Gia công cắt CNC cắt thép theo mẫu sản phẩm 03</p>', NULL, NULL, 'Gia công cắt CNC cắt thép theo mẫu sản phẩm 03', 'Gia công cắt CNC Thép - Mẫu 03', 1, 0, '2019-12-05 06:34:42', '2019-12-05 06:34:42', '2019-12-05 06:40:31');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attr_products`
--

INSERT INTO `attr_products` (`id`, `name`, `value`, `active`, `num`, `created_at`, `updated_at`) VALUES
(1, 'màu sắc', NULL, 1, 0, '2019-12-02 07:49:52', '2019-12-02 07:49:52'),
(2, 'xuất xứ', NULL, 1, 0, '2019-12-02 07:49:58', '2019-12-02 07:49:58');

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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `img`, `pid`, `type`, `num`, `haschild`, `description`, `content`, `is_deleted`, `ext_url`, `rich_schema`, `seo_description`, `seo_title`, `active`, `total_item`, `created_at`, `updated_at`) VALUES
(25, 'sản phẩm', 'san-pham', NULL, 'LOGO aquantank.png', 0, 9, 2, NULL, 'DANH MỤC SẢN PHẨM', NULL, 1, NULL, NULL, 'DANH MỤC SẢN PHẨM', 'sản phẩm', 1, 0, '2019-11-29 09:41:38', '2019-11-29 09:52:27'),
(35, 'trang chủ', '/', NULL, NULL, 0, 1, 0, NULL, 'trang chủ', '<p>trang chủ</p>', 1, 'trang chủ', NULL, 'trang chủ', 'trang chủ', 1, 0, '2019-12-05 09:54:17', '2019-12-05 09:54:17'),
(36, 'Giới thiệu', 'gioi-thieu', NULL, NULL, 0, 2, 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'Giới thiệu', 1, 0, '2019-12-05 09:54:38', '2019-12-05 09:54:38'),
(29, 'Tin tức và sự kiện', 'tin-tuc-va-su-kien', NULL, NULL, 0, 9, 6, NULL, 'Tin tức và sự kiện', '<p>Tin tức và sự kiện</p>', 1, NULL, NULL, 'Tin tức và sự kiện', 'Tin tức và sự kiện', 1, 0, '2019-11-29 09:44:51', '2019-12-06 04:07:51'),
(30, 'tin công ty', 'tin-cong-ty', NULL, NULL, 29, 5, 7, NULL, 'tin công ty', '<p>tin công ty</p>', 1, NULL, NULL, 'tin công ty', 'tin công ty', 1, 0, '2019-11-29 09:45:12', '2019-11-29 09:52:39'),
(31, 'tin sự kiện', 'tin-su-kien', NULL, NULL, 29, 5, 8, NULL, 'tin sự kiện', '<p>tin sự kiện</p>', 1, NULL, NULL, 'tin sự kiện', 'tin sự kiện', 1, 0, '2019-11-29 09:45:30', '2019-11-29 09:52:40'),
(32, 'danh mục bài viết chưa phân loại', 'danh-muc-bai-viet-chua-phan-loai', NULL, NULL, 0, 5, 7, NULL, 'danh mục bài viết chưa phân loại', '<p>danh mục bài viết chưa phân loại</p>', 0, NULL, NULL, 'danh mục bài viết chưa phân loại', 'danh mục bài viết chưa phân loại', 0, 0, '2019-12-05 08:06:50', '2019-12-06 04:34:41'),
(33, 'danh mục sản phẩm chưa phân loại', 'danh-muc-san-pham-chua-phan-loai', NULL, NULL, 0, 6, 9, NULL, 'danh mục sản phẩm chưa phân loại', '<p>danh mục sản phẩm chưa phân loại</p>', 0, NULL, NULL, 'danh mục sản phẩm chưa phân loại', 'danh mục sản phẩm chưa phân loại', 0, 0, '2019-12-05 08:07:07', '2019-12-05 08:07:53');

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_25_092114_create_categories_table', 1),
(9, '2019_11_30_132223_create_products_table', 2),
(10, '2019_11_30_135232_create_attr_products_table', 2),
(12, '2019_12_03_145425_create_articles_table', 3),
(17, '2019_12_07_094438_create_slides_table', 4),
(18, '2019_12_07_114712_create_widgets_table', 4),
(19, '2019_12_07_143526_create_widgets_comp_table', 5),
(20, '2019_12_07_143608_create_widgets_option_table', 5);

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
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'mã sản phẩm',
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
  `is_noindex` tinyint(4) NOT NULL DEFAULT '0',
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `cat_id`, `code`, `price`, `hot`, `sale`, `author_id`, `view`, `img`, `img_list`, `attr`, `tag`, `type`, `description`, `content`, `ext_url`, `rich_schema`, `seo_description`, `seo_title`, `active`, `pay`, `number`, `is_noindex`, `total_rating`, `total_number`, `created_at`, `updated_at`) VALUES
(6, 'sa1 1', 'sa1', 33, NULL, 0, 0, 0, 0, 0, '0-gian-hang-vietwater-cong-ty-CP-nuoc-lanh - Copy.jpg', '[\"0-cong-ty-doi-tac-tham-quan-gian-hang - Copy.jpg\",\"cong-ty-doi-tac-tham-quan-gian-hang.jpg\"]', '[{\"name\":\"m\\u00e0u s\\u1eafc\",\"value\":null},{\"name\":\"xu\\u1ea5t x\\u1ee9\",\"value\":null}]', '[{\"name_tag\":\"\",\"slug_tag\":\"\"}]', NULL, NULL, NULL, NULL, NULL, NULL, 'sa1', 1, 0, 0, 0, 0, 0, '2019-12-03 03:39:00', '2019-12-05 09:32:37'),
(5, 'sa trí tuệ', 'sa-tri-tue', 33, 'a1', 10000000, 0, 0, 0, 0, '0-cong-ty-doi-tac-tham-quan-gian-hang.jpg', '', '[{\"name\":\"m\\u00e0u s\\u1eafc\",\"value\":\"2\"},{\"name\":\"xu\\u1ea5t x\\u1ee9\",\"value\":\"1\"}]', '[{\"name_tag\":\"\",\"slug_tag\":\"\"}]', NULL, 'da', '<p>da</p>', NULL, NULL, 'da', 'sa trí tuệ', 1, 0, 0, 0, 0, 0, '2019-12-03 03:03:50', '2019-12-05 09:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ext_url` text COLLATE utf8mb4_unicode_ci,
  `num` tinyint(4) NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slides_num_index` (`num`),
  KEY `slides_active_index` (`active`)
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

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

DROP TABLE IF EXISTS `widgets`;
CREATE TABLE IF NOT EXISTS `widgets` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `comp` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '1',
  `type` tinyint(4) NOT NULL COMMENT 'loại tin tức/bài viết: ngẫu nhiên, hot',
  `cattype` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'loại danh mục',
  `num` tinyint(4) NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `qlimit` tinyint(4) NOT NULL DEFAULT '8' COMMENT 'giới hạn bài viết/sản phẩm',
  `is_show_title` tinyint(4) NOT NULL DEFAULT '1',
  `column` tinyint(4) NOT NULL DEFAULT '4',
  `img_list` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `widgets_comp_index` (`comp`),
  KEY `widgets_pid_index` (`pid`),
  KEY `widgets_type_index` (`type`),
  KEY `widgets_num_index` (`num`),
  KEY `widgets_active_index` (`active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `widgets_comp`
--

DROP TABLE IF EXISTS `widgets_comp`;
CREATE TABLE IF NOT EXISTS `widgets_comp` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widgets_comp`
--

INSERT INTO `widgets_comp` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Danh mục sản phẩm', NULL, NULL),
(2, 'Danh mục tin tức', NULL, NULL),
(3, 'Sản phẩm', NULL, NULL),
(4, 'Tin tức', NULL, NULL),
(5, 'Khung soạn thảo', NULL, NULL),
(6, 'Fanpage facebook', NULL, NULL),
(7, 'Video', NULL, NULL),
(8, 'Thống kê truy cập', NULL, NULL),
(9, 'Hỗ trợ trực tuyến', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `widgets_option`
--

DROP TABLE IF EXISTS `widgets_option`;
CREATE TABLE IF NOT EXISTS `widgets_option` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widgets_option`
--

INSERT INTO `widgets_option` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'mới nhất', NULL, NULL),
(2, 'xem nhiều', NULL, NULL),
(3, 'ngẫu nhiên', NULL, NULL),
(4, 'hot', NULL, NULL),
(5, 'khuyến mãi', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
