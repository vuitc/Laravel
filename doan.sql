-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2024 at 03:16 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doan`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_chinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `img_chinh`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Áo thun', 'ao-thun', 'aothun/aothun1.jpg', NULL, NULL, NULL),
(2, 'Áo sơ mi', 'ao-so-mi', 'aosomi/aosomi1.jpg', NULL, NULL, NULL),
(3, 'Áo kiểu', 'ao-kieu', 'aokieu/aokieu1.jpg', NULL, NULL, NULL),
(4, 'Quần', 'quan', 'quan/quan1.jpg', NULL, NULL, NULL),
(5, 'Chân váy', 'chan-vay', 'chanvay/chanvay1.jpg', NULL, NULL, NULL),
(6, 'Váy', 'vay', 'vay/vay1.jpg', NULL, NULL, NULL),
(7, 'Áo dài', 'ao-dai', 'aodai/aodai1.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Black', NULL, NULL, NULL),
(2, 'White', NULL, NULL, NULL),
(3, 'Red', NULL, NULL, NULL),
(4, 'Blue', NULL, NULL, NULL),
(5, 'Green', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ct_products`
--

CREATE TABLE `ct_products` (
  `idproduct` bigint UNSIGNED NOT NULL,
  `idcolor` bigint UNSIGNED NOT NULL,
  `idsize` bigint UNSIGNED NOT NULL,
  `price` int DEFAULT NULL,
  `soluongton` int DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giamgia` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ct_products`
--

INSERT INTO `ct_products` (`idproduct`, `idcolor`, `idsize`, `price`, `soluongton`, `image`, `giamgia`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1200000, 10, 'aodai/aodai1.jpg', 10, NULL, NULL),
(1, 1, 2, 1200000, 10, 'aodai/aodai1.jpg', 20, NULL, NULL),
(1, 1, 3, 1250000, 10, 'aodai/aodai1.jpg', 20, NULL, NULL),
(1, 1, 4, 1250000, 12, 'aodai/aodai1.jpg', 30, NULL, NULL),
(1, 1, 5, 1200000, 10, 'aodai/aodai1.jpg', 10, NULL, NULL),
(1, 4, 4, 1200000, 10, 'aodai/aodai1.jpg', 20, NULL, NULL),
(2, 1, 4, 2200000, 22, 'aodai/aodai2.jpg', 50, NULL, NULL),
(3, 1, 4, 780000, 10, 'aothun/aothun1.jpg', 0, NULL, NULL),
(4, 5, 3, 800000, 5, 'aosomi/aosomi1.jpg', 20, NULL, NULL),
(9, 4, 5, 980000, 4, 'aodai/aodai3.jpg', 10, NULL, NULL),
(10, 5, 5, 760000, 3, 'aodai/aodai4.jpg', 20, NULL, NULL),
(11, 3, 1, 1650000, 4, 'aodai/aodai10.jpg', 20, NULL, NULL),
(12, 2, 4, 800000, 5, 'aodai/aodai5.jpg', 30, NULL, NULL),
(13, 1, 2, 800000, 12, 'aodai/aodai6.jpg', 10, NULL, NULL),
(14, 5, 4, 2200000, 10, 'aodai/aodai7.jpg', 30, NULL, NULL),
(15, 3, 4, 2200000, 4, 'aodai/aodai8.jpg', 10, NULL, NULL),
(16, 5, 1, 3300000, 4, 'aodai/aodai9.jpg', 30, NULL, NULL),
(17, 5, 4, 580000, 12, 'aothun/aothun2.jpg', 20, NULL, NULL),
(18, 3, 3, 860000, 5, 'aothun/aothun3.jpg', 30, NULL, NULL),
(19, 2, 4, 980000, 12, 'aosomi/aosomi2.jpg', 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_05_183931_create_colors_table', 1),
(6, '2024_01_06_021838_create_sizes_table', 1),
(7, '2024_01_06_022534_create_categories_table', 1),
(8, '2024_01_06_040638_create_products_table', 1),
(9, '2024_01_06_080413_create_ct_products_table', 1),
(10, '2024_01_06_121849_create_sliders_table', 1),
(11, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(12, '2024_01_15_152336_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` bigint UNSIGNED NOT NULL,
  `dacbiet` tinyint(1) NOT NULL DEFAULT '0',
  `luotxem` int NOT NULL DEFAULT '0',
  `ngaylap` date NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chitiet` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `id_category`, `dacbiet`, `luotxem`, `ngaylap`, `mota`, `chitiet`, `created_at`, `updated_at`) VALUES
(1, 'Áo dài Ái Minh', 7, 1, 10, '2023-12-03', '\\r\\nÁo dài Ái Minh, một biểu tượng trang phục truyền thống của người Việt, nổi bật với vẻ đẹp thanh lịch và sự tinh tế trong từng đường may. Chiếc áo dài này thường có thiết kế ôm sát vóc dáng, tạo nên sự gọn gàng và quý phái. Được làm từ những chất liệu như lụa, gấm, hoặc voan, áo dài Ái Minh mang lại cảm giác mềm mại, thoải mái cho người mặc.', 'Mặt trước của áo dài thường được trang trí với những đường thêu hoa văn tinh xảo, tạo nên điểm nhấn nghệ thuật độc đáo. Những họa tiết truyền thống như hoa sen, đào, hay những chi tiết nhỏ như lưới ren cũng thường xuất hiện trên bề mặt áo, thể hiện sự kỹ thuật cao trong quá trình sản xuất.', NULL, NULL),
(2, 'Áo dài Viên Minh', 7, 0, 5, '2023-12-02', 'Áo dài Viên Minh, với tên gọi ấn tượng, không chỉ là một trang phục truyền thống mà còn là biểu tượng của sự thanh lịch và sang trọng trong trang phục Việt Nam. Chiếc áo dài này thường được thiết kế với những đường cắt tinh tế, tôn lên vẻ đẹp tự nhiên của người mặc.', 'Áo dài Viên Minh thường có kiểu cổ cao và tay dài, tạo nên sự đằm thắm và trang trí. Chất liệu vải thường là những loại cao cấp như lụa, satin, hoặc nhung, mang lại cảm giác mềm mại và sang trọng. Áo dài được may kỹ lưỡng, với những đường may chắc chắn và tinh tế, tạo nên sự hoàn hảo trong từng chi tiết.', NULL, NULL),
(3, 'Áo Thun Mula ', 1, 1, 3, '2023-12-06', 'Áo thun Mula không chỉ là một sản phẩm thời trang mà còn là biểu tượng của sự thoải mái và phong cách hiện đại. Với chất liệu vải cao cấp và kiểu dáng linh hoạt, áo thun Mula đã chinh phục người mặc bằng sự đơn giản và tinh tế.', 'Chất liệu vải thường là cotton, giúp áo thun Mula thoáng khí và thoải mái. Thiết kế áo thường rất đa dạng, từ áo cổ tròn cơ bản đến áo cổ polo hoặc áo có hình in và thông điệp thú vị. Mọi chi tiết đều được chú trọng để tạo nên một sản phẩm thời trang đẳng cấp và phản ánh cái nhìn đương đại về phong cách.', NULL, NULL),
(4, 'Áo Sơ Mi Yeolan', 2, 1, 2, '2023-12-04', 'Áo sơ mi Yeolan ngắn là một item thời trang đang rất được ưa chuộng trong thời gian gần đây. Với thiết kế đơn giản nhưng không kém phần tinh tế, áo sơ mi Yeolan ngắn mang đến vẻ ngoài trẻ trung, năng động cho người mặc.', 'Áo sơ mi Yeolan ngắn được may từ chất liệu cotton thoáng mát, thấm hút mồ hôi tốt, mang lại cảm giác thoải mái khi mặc. Áo có form dáng rộng rãi, thoải mái, không ôm sát cơ thể, phù hợp với nhiều dáng người khác nhau. Cổ áo sơ mi Yeolan ngắn là cổ bẻ truyền thống, được may tỉ mỉ, chắc chắn. Cúc áo sơ mi được làm từ chất liệu nhựa cao cấp, có độ bền cao.', NULL, NULL),
(5, 'Áo Kiểu Jae', 3, 1, 5, '2023-12-06', 'Áo kiểu Jae là một loại áo sơ mi có thiết kế đơn giản, thanh lịch, phù hợp với cả nam và nữ. Áo có phần cổ bẻ, tay dài, thường được may từ chất liệu cotton hoặc linen.\\r\\n\\r\\nÁo kiểu Jae có thiết kế đơn giản, không cầu kỳ, nhưng vẫn toát lên vẻ thanh lịch, tinh tế. Áo có phần cổ bẻ truyền thống, được may tỉ mỉ, chắc chắn. Tay áo dài, có thể xắn lên hoặc buông xuống tùy theo sở thích.', 'Chất liệu: Áo kiểu Jae thường được may từ chất liệu cotton hoặc linen.\\r\\nForm dáng: Áo có form dáng vừa vặn, không ôm sát cơ thể, phù hợp với nhiều dáng người khác nhau.\\r\\nCổ áo: Cổ áo sơ mi Jae là cổ bẻ truyền thống, được may tỉ mỉ, chắc chắn.\\r\\nTay áo: Tay áo dài, có thể xắn lên hoặc buông xuống tùy theo sở thích.\\r\\nMàu sắc: Áo kiểu Jae có nhiều màu sắc đa dạng để bạn lựa chọn, phù hợp với nhiều phong cách khác nhau.', NULL, NULL),
(6, 'Quần Short Arian', 4, 0, 1, '2023-12-04', 'Quần short Arian là một loại quần short được thiết kế đơn giản, năng động, phù hợp với cả nam và nữ. Quần có phần cạp cao, ống rộng, thường được may từ chất liệu cotton hoặc denim.\\r\\n\\r\\n', 'Chất liệu: Quần short Arian thường được may từ chất liệu cotton hoặc denim.\\r\\nForm dáng: Quần có form dáng rộng rãi, thoải mái, không ôm sát cơ thể, phù hợp với nhiều dáng người khác nhau.\\r\\nCạp quần: Cạp quần Arian là cạp cao, được may tỉ mỉ, chắc chắn.', NULL, NULL),
(7, 'Chân Váy Camela', 5, 0, 2, '2023-12-03', 'Chân váy Camela là một loại chân váy được thiết kế đơn giản, thanh lịch, phù hợp với mọi dáng người. Chân váy có phần cạp cao, xòe rộng, thường được may từ chất liệu cotton hoặc linen.\\r\\nChân váy Camela có thiết kế đơn giản, không cầu kỳ, nhưng vẫn toát lên vẻ thanh lịch, tinh tế. Chân váy có phần cạp cao, giúp tôn lên vòng eo thon gọn. Phần chân váy xòe rộng, mang đến vẻ ngoài nữ tính, dịu dàng.', 'Chất liệu: Chân váy Camela thường được may từ chất liệu cotton hoặc linen.\\r\\nForm dáng: Chân váy có form dáng xòe rộng, thoải mái, không ôm sát cơ thể, phù hợp với nhiều dáng người khác nhau.\\r\\nCạp váy: Cạp váy Camela là cạp cao, được may tỉ mỉ, chắc chắn.', NULL, NULL),
(8, 'Váy Kera', 6, 1, 1, '2023-12-04', 'Váy Kera là một loại váy được thiết kế đơn giản, thanh lịch, phù hợp với mọi dáng người. Váy có phần cổ chữ V, tay dài, thường được may từ chất liệu cotton hoặc linen.', 'Chất liệu: Váy Kera thường được may từ chất liệu cotton hoặc linen.\\r\\nForm dáng: Váy có form dáng suông rộng, thoải mái, không ôm sát cơ thể, phù hợp với nhiều dáng người khác nhau.\\r\\nCổ váy: Cổ váy Kera là cổ chữ V, được may tỉ mỉ, chắc chắn.', NULL, NULL),
(9, 'Áo dài Kim Minh', 7, 1, 110, '2023-12-01', 'Áo dài Kim Minh là thương hiệu áo dài nổi tiếng tại Việt Nam, được thành lập từ năm 2005. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng đa dạng.', 'Áo dài truyền thống của Kim Minh được thiết kế theo form dáng chuẩn mực, với phần thân trước và thân sau dài bằng nhau, phần tay dài có thể là tay lỡ hoặc tay dài. Cổ áo có thể là cổ thuyền, cổ tròn hoặc cổ cao, phù hợp với mọi vóc dáng.', NULL, NULL),
(10, 'Áo dài Uyển Minh', 7, 1, 15, '2023-12-02', 'Áo dài Uyển Minh là thương hiệu áo dài được thành lập từ năm 2019 bởi nhà thiết kế trẻ Lê Thị Uyển Minh. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng trẻ trung, thanh lịch.', 'Áo dài truyền thống của Uyển Minh được thiết kế theo form dáng chuẩn mực, với phần thân trước và thân sau dài bằng nhau, phần tay dài có thể là tay lỡ hoặc tay dài. Cổ áo có thể là cổ thuyền, cổ tròn hoặc cổ cao, phù hợp với mọi vóc dáng.', NULL, NULL),
(11, 'Áo dài Tuệ Minh', 7, 1, 0, '2023-12-03', 'Áo dài Tuệ Minh là thương hiệu áo dài được thành lập từ năm 2020 bởi nhà thiết kế trẻ Nguyễn Thị Tuệ Minh. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng đơn giản, thanh lịch.', 'Áo dài truyền thống của Tuệ Minh được thiết kế theo form dáng chuẩn mực, với phần thân trước và thân sau dài bằng nhau, phần tay dài có thể là tay lỡ hoặc tay dài. Cổ áo có thể là cổ thuyền, cổ tròn hoặc cổ cao, phù hợp với mọi vóc dáng.', NULL, NULL),
(12, 'Áo dài Ngư Minh', 7, 1, 0, '2023-12-06', 'Áo dài Ngư Minh là thương hiệu áo dài mới nổi, được thành lập từ năm 2023. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng độc đáo, mới lạ.', 'Áo dài truyền thống của Ngư Minh được thiết kế theo form dáng chuẩn mực, với phần thân trước và thân sau dài bằng nhau, phần tay dài có thể là tay lỡ hoặc tay dài. Cổ áo có thể là cổ thuyền, cổ tròn hoặc cổ cao, phù hợp với mọi vóc dáng.', NULL, NULL),
(13, 'Áo dài Nhã Minh', 7, 1, 15, '2023-12-04', 'Áo dài Nhã Minh là thương hiệu áo dài được thành lập từ năm 2022. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng trẻ trung, năng động.', 'Áo dài truyền thống của Nhã Minh được thiết kế theo form dáng chuẩn mực, với phần thân trước và thân sau dài bằng nhau, phần tay dài có thể là tay lỡ hoặc tay dài. Cổ áo có thể là cổ thuyền, cổ tròn hoặc cổ cao, phù hợp với mọi vóc dáng.', NULL, NULL),
(14, 'Áo Dài Ý Minh', 7, 1, 22, '2023-12-02', 'Áo Dài Ý Minh là thương hiệu áo dài được thành lập từ năm 2022. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng đơn giản, thanh lịch.', 'Với chất lượng vượt trội và kiểu dáng đơn giản, thanh lịch, áo dài Ý Minh là lựa chọn lý tưởng cho những cô nàng yêu thích áo dài truyền thống và cách tân, nhưng muốn thể hiện phong cách thanh lịch, trang nhã của mình.', NULL, NULL),
(15, 'Áo dài Diệp Minh', 7, 1, 11, '2023-12-02', 'Áo dài Diệp Minh là thương hiệu áo dài được thành lập từ năm 2023. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng trẻ trung, thanh lịch.', 'Áo dài Diệp Minh là thương hiệu áo dài được thành lập từ năm 2023. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng trẻ trung, thanh lịch.', NULL, NULL),
(16, 'Áo Dài Khánh Mỹ', 7, 1, 11, '2023-12-06', 'Áo Dài Khánh Mỹ là thương hiệu áo dài được thành lập từ năm 2022. Thương hiệu này chuyên thiết kế và sản xuất các mẫu áo dài truyền thống và cách tân, với chất liệu cao cấp và kiểu dáng đơn giản, thanh lịch.', 'Áo dài truyền thống của Khánh Mỹ được thiết kế theo form dáng chuẩn mực, với phần thân trước và thân sau dài bằng nhau, phần tay dài có thể là tay lỡ hoặc tay dài. Cổ áo có thể là cổ thuyền, cổ tròn hoặc cổ cao, phù hợp với mọi vóc dáng.', NULL, NULL),
(17, 'Áo Thun Redvelvet', 1, 1, 11, '2023-12-03', 'Áo thun Red Velvet là một trong những mẫu áo thun được yêu thích nhất hiện nay, đặc biệt là đối với những fan hâm mộ của nhóm nhạc nữ Kpop Red Velvet. Áo thun Red Velvet có nhiều mẫu mã đa dạng, với thiết kế đơn giản, trẻ trung, năng động, phù hợp với mọi lứa tuổi.', 'Chất liệu vải: Áo thun Red Velvet được làm từ chất liệu cotton 100%, mềm mại, thấm hút mồ hôi tốt, mang đến cảm giác thoải mái cho người mặc.\\r\\nGiá thành: Áo thun Red Velvet có giá thành dao động từ 150.000 đến 300.000 đồng, tùy thuộc vào chất liệu vải, mẫu mã và kích thước áo.', NULL, NULL),
(18, 'Áo Thun Chic', 1, 1, 6, '2023-12-06', 'Áo thun Red Velvet là một trong những mẫu áo thun được yêu thích nhất hiện nay, đặc biệt là đối với những fan hâm mộ của nhóm nhạc nữ Kpop Red Velvet. Áo thun Red Velvet có nhiều mẫu mã đa dạng, với thiết kế đơn giản, trẻ trung, năng động, phù hợp với mọi lứa tuổi.', 'Áo thun Red Velvet logo: Đây là mẫu áo thun đơn giản, với thiết kế logo của nhóm nhạc Red Velvet ở mặt trước áo. Áo thun Red Velvet logo mang đến vẻ đẹp trẻ trung, năng động cho người mặc.\\r\\nÁo thun Red Velvet hình ảnh: Đây là mẫu áo thun với thiết kế hình ảnh của các thành viên nhóm nhạc Red Velvet ở mặt trước áo. Áo thun Red Velvet hình ảnh mang đến vẻ đẹp đáng yêu, cá tính cho người mặc.', NULL, NULL),
(19, 'Sơ Mi Tarik', 2, 1, 4, '2023-12-01', 'Sơ Mi Tarik được đánh giá cao bởi chất lượng vượt trội, từ chất liệu vải đến kỹ thuật may đo. Vải sơ mi Tarik được nhập khẩu từ các thương hiệu nổi tiếng như Thái Tuấn, Bảo Lộc,... với độ bền cao, mềm mại và thấm hút mồ hôi tốt. Kỹ thuật may đo của sơ mi Tarik được thực hiện bởi những thợ may lành nghề, tỉ mỉ đến từng đường kim mũi chỉ.', 'Sơ mi trơn màu sắc đơn giản: Đây là mẫu sơ mi đơn giản, với thiết kế trơn màu sắc đơn giản. Sơ mi trơn màu sắc đơn giản mang đến vẻ đẹp trẻ trung, năng động cho người mặc.\\r\\nSơ mi họa tiết nổi bật: Đây là mẫu sơ mi với thiết kế họa tiết nổi bật, bắt mắt. Sơ mi họa tiết nổi bật mang đến vẻ đẹp cá tính, mạnh mẽ cho người mặc.', NULL, NULL),
(20, 'Áo Sơ Mi Cici', 2, 1, 4, '2023-12-04', 'Áo Sơ Mi Cici được đánh giá cao bởi chất lượng vượt trội, từ chất liệu vải đến kỹ thuật may đo. Vải sơ mi Cici được nhập khẩu từ các thương hiệu nổi tiếng như Thái Tuấn, Bảo Lộc,... với độ bền cao, mềm mại và thấm hút mồ hôi tốt. Kỹ thuật may đo của sơ mi Cici được thực hiện bởi những thợ may lành nghề, tỉ mỉ đến từng đường kim mũi chỉ.', 'Sơ mi trơn màu sắc đơn giản: Đây là mẫu sơ mi đơn giản, với thiết kế trơn màu sắc đơn giản. Sơ mi trơn màu sắc đơn giản mang đến vẻ đẹp thanh lịch, trang nhã cho người mặc.\\r\\nSơ mi họa tiết nhẹ nhàng: Đây là mẫu sơ mi với thiết kế họa tiết nhẹ nhàng, tinh tế. Sơ mi họa tiết nhẹ nhàng mang đến vẻ đẹp thanh lịch, trẻ trung cho người mặc.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('mcIi0eTBRqKq1b6goTFaoWbMSuIUykluRqhwvxsG', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYXdFMWRMektQcW4ySnRJWGRFVUZXY2pWMVdBV2FJYzRremVUSWJaZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3Byb2ZpbGUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFVMMHJCdXNEYUZJSEdNYU00dDVqZWVpb3RwdEJCbGw1M2JlbHVaa3R0dk1HMWJVbFVUcTRlIjt9', 1705336173);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `size` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'XS',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'XS', NULL, NULL, NULL),
(2, 'S', NULL, NULL, NULL),
(3, 'M', NULL, NULL, NULL),
(4, 'L', NULL, NULL, NULL),
(5, 'XL', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `truong` tinyint NOT NULL DEFAULT '1' COMMENT '1 ảnh carousel, 2 ảnh sale, 3 ảnh thương hiệu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `img`, `title1`, `title2`, `truong`, `created_at`, `updated_at`) VALUES
(1, 'carousel-1.jpg', '10% OFF YOUR FIRST ORDER', 'Fashionable Dress\\r\\n', 1, NULL, NULL),
(2, 'carousel-2.jpg', '10% OFF YOUR FIRST ORDER', 'Reasonable Price', 1, NULL, NULL),
(3, 'offer-1.png', '30% OFF BLACK FRIDAY', 'Spring Collection', 2, NULL, NULL),
(4, 'offer-2.png', '50% OFF BLACK FRIDAY', 'Winter Collection', 2, NULL, NULL),
(5, 'vendor-1.jpg', '', '', 3, NULL, NULL),
(6, 'vendor-2.jpg', '', '', 3, NULL, NULL),
(7, 'vendor-3.jpg', '', '', 3, NULL, NULL),
(8, 'vendor-4.jpg', '', '', 3, NULL, NULL),
(9, 'vendor-5.jpg', '', '', 3, NULL, NULL),
(10, 'vendor-6.jpg', '', '', 3, NULL, NULL),
(11, 'vendor-7.jpg', '', '', 3, NULL, NULL),
(12, 'vendor-8.jpg', '', '', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', NULL, '$2y$10$UL0rBusDaFIHGMaM4t5jeeiotptBBll53beluZkttvMG1bUlUTq4e', NULL, NULL, NULL, NULL, '2024-01-15 09:01:07', '2024-01-15 09:01:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ct_products`
--
ALTER TABLE `ct_products`
  ADD PRIMARY KEY (`idproduct`,`idcolor`,`idsize`),
  ADD KEY `ct_products_idcolor_foreign` (`idcolor`),
  ADD KEY `ct_products_idsize_foreign` (`idsize`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_category_foreign` (`id_category`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ct_products`
--
ALTER TABLE `ct_products`
  ADD CONSTRAINT `ct_products_idcolor_foreign` FOREIGN KEY (`idcolor`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `ct_products_idproduct_foreign` FOREIGN KEY (`idproduct`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `ct_products_idsize_foreign` FOREIGN KEY (`idsize`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
