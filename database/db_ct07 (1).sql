-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2024 at 01:58 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ct07`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cartitem`
--

CREATE TABLE `cartitem` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `cart_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Món Nước'),
(2, 'Món Khô'),
(3, 'Thức Uống'),
(4, 'Tráng Miệng');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int DEFAULT NULL,
  `price` float NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `price`, `image`, `description`) VALUES
(1, 'Phở Gà', 1, 50000, 'phoga.jpg', 'Phở gà Việt Nam'),
(2, 'Bún Riêu Cua', 1, 65000, 'bunrieucua.jpg', 'Bún riêu cua đầy đủ hải sản'),
(3, 'Hủ Tiếu Mì', 1, 46000, 'hutieumi.jpg', 'Hủ tiếu mì sườn non'),
(4, 'Mì Quảng Ếch', 1, 55000, 'miquangech.jpg', 'Mì Quảng Ếch thơm ngon'),
(5, 'Bún Bò Huế', 1, 45000, 'bunbohue.jpg', 'Bún bò Huế thơm ngon'),
(6, 'Miến Gà', 1, 50000, 'miengaga.jpg', 'Miến gà nấu hầm'),
(7, 'Canh Chua Cá Lóc', 1, 45000, 'canhchuacaloc.jpg', 'Canh chua cá lóc ngon miệng'),
(8, 'Súp Măng Cua', 1, 45000, 'supmangcua.jpg', 'Súp măng cua hấp dẫn'),
(9, 'Bún Mọc', 1, 50000, 'bunmoc.jpg', 'Bún mọc đầy đủ nguyên liệu'),
(10, 'Phở Cuốn', 1, 50000, 'phocuon.jpg', 'Phở cuốn hấp dẫn'),
(11, 'Bánh Mì Chảo', 2, 35000, 'banhmichao.jpg', 'Bánh mì chảo thơm ngon'),
(12, 'Gỏi Bò Bóp Thấu', 2, 35000, 'goibobopthau.jpg', 'Gỏi bò bóp thấu ngon lạ'),
(13, 'Bánh Tráng Trộn', 2, 30000, 'banhtrangtron.jpg', 'Bánh tráng trộn sả cá'),
(14, 'Khoai Lang Chiên', 2, 25000, 'khoailangchien.jpg', 'Khoai lang chiên giòn'),
(15, 'Chả Cá Lã Vọng', 2, 56000, 'chacalavong.jpg', 'Chả cá Lã Vọng thơm ngon'),
(16, 'Bánh Bèo Nhân Tôm', 2, 31000, 'banhbeonhantom.jpg', 'Bánh bèo nhân tôm ngon'),
(17, 'Bò Khô Bơ', 2, 56000, 'bokhobo.jpg', 'Bò khô bơ đậm đà'),
(18, 'Cơm Cháy Chà Bông', 2, 45000, 'comchaychabong.jpg', 'Cơm cháy chà bông thơm lừng'),
(19, 'Gà Rán KFC', 2, 46000, 'garankfc.jpg', 'Gà rán phong cách KFC'),
(20, 'Xôi Gấc', 2, 30000, 'xoigac.jpg', 'Xôi gấc đỏ rực'),
(21, 'Trà Sữa', 3, 30000, 'trasua.jpg', 'Trà sữa thạch trái cây'),
(22, 'Nước Dừa Lọc', 3, 25000, 'nuocdualoc.jpg', 'Nước dừa tươi ngon'),
(23, 'Sinh Tố Bơ', 3, 30000, 'sinhtobo.jpg', 'Sinh tố bơ thơm ngon'),
(24, 'Cafe Đen', 3, 30000, 'cafedentuoi.jpg', 'Cafe đen sạch'),
(25, 'Soda Chanh', 3, 20000, 'sodachanh.jpg', 'Soda chanh mát lạnh'),
(26, 'Nước Lọc Lavie', 3, 10000, 'nuocloc.jpg', 'Nước lọc Lavie'),
(27, 'Bạc Xỉu', 3, 30000, 'bacxiu.jpg', 'Bạc xỉu pha phê'),
(28, 'Nước Cam Tươi', 3, 25000, 'nuoccamtuoi.jpg', 'Nước cam tươi ngon'),
(29, 'Trà Oolong', 3, 26000, 'traoolong.jpg', 'Trà oolong thơm ngon'),
(30, 'Nước Mía', 3, 10000, 'nuocmia.jpg', 'Nước mía tươi ngon'),
(31, 'Chè Thái', 4, 35000, 'chethai.jpg', 'Chè Thái ngon lạ miệng'),
(32, 'Kem Dừa', 4, 35000, 'kemdua.jpg', 'Kem dừa tươi mát'),
(33, 'Bánh Flan Caramel', 4, 35000, 'banhflan.jpg', 'Bánh flan caramel mềm mịn'),
(34, 'Kem Chuối', 4, 25000, 'kemchuoi.jpg', 'Kem chuối thơm ngon'),
(35, 'Bánh Gato Chocolate', 4, 55000, 'banhgatochocolate.jpg', 'Bánh gato chocolate ngon đậm đà'),
(36, 'Chè Sâm Bổ Lượng', 4, 45000, 'chesam.jpg', 'Chè sâm bổ lượng dưỡng sinh'),
(37, 'Bánh Tart Trái Cây', 4, 35000, 'banhtarttraicay.jpg', 'Bánh tart trái cây tươi mát'),
(38, 'Kem Cà Phê', 4, 45000, 'kemcaphe.jpg', 'Kem cà phê thơm ngon'),
(39, 'Bánh Dẻo Lá Dứa', 4, 35000, 'banhdeoladua.jpg', 'Bánh dẻo lá dứa ngon'),
(40, 'Chè Bưởi', 4, 35000, 'chebuoi.jpg', 'Chè bưởi thơm ngon');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `role_id`) VALUES
(1, 'AdminUser', 'adminpassword', 'admin@example.com', 1),
(2, 'RegularUser', 'userpassword', 'user@example.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cartitem`
--
ALTER TABLE `cartitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartitem`
--
ALTER TABLE `cartitem`
  ADD CONSTRAINT `cartitem_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `fk_foreign_key_cartid` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `fk_foreign_key_productid` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
