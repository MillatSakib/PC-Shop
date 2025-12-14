-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: shop_db
-- Generation Time: Dec 14, 2025 at 04:57 PM
-- Server version: 5.7.44
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

DROP DATABASE IF EXISTS `shop_db`;

CREATE DATABASE `shop_db` CHARACTER
SET
  utf8mb4 COLLATE utf8mb4_general_ci;

USE `shop_db`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(72, 41, 30, 'Beetroot', 120, 1, 'Beetroot.jpg'),
(82, 45, 53, 'lime', 100, 1, 'lime.jpg'),
(86, 47, 30, 'Beetroot', 120, 9, 'Beetroot.jpg'),
(87, 47, 29, 'Carrot', 268, 1, 'carrot.png'),
(88, 45, 29, 'Carrot', 268, 1, 'carrot.png'),
(122, 2, 29, 'MacBook Pro', 110000, 1, 'apple-mac-pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(21, 2, 'Prithu', 'prithu@gmail.com', '01587154541', 'Your shop is very well orgarized.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(24, 2, 'Claire Vance', '361', 'ginuw@mailinator.com', 'credit card', 'flat no. Magna voluptatem et  Autem delectus aut  Pariatur Autem repu Enim ab ab dolor ad  Est sapiente tempore - ', ', iPhone 14 ( 1 )', 81000, '03-Dec-2025', 'completed'),
(25, 2, 'Leslie Hester', '828', 'puqusagyd@mailinator.com', 'cash on delivery', 'flat no. Aut facilis eu non q Perferendis omnis ob Assumenda et vitae s Vero et veniam quo  Provident soluta qu - ', ', Samsung Odyssey   G7 ( 5 )', 374995, '03-Dec-2025', 'completed'),
(26, 2, 'Kaitlin Chapman', '897', 'qanaqibu@mailinator.com', 'cash on delivery', 'flat no. Saepe culpa et volu Pariatur Repudianda Quia tempora culpa  Modi est ab soluta  Autem occaecat dolor - ', ', MacBook Pro ( 4 )', 440000, '03-Dec-2025', 'completed'),
(33, 59, 'Trevor Brewer', '688', 'wuhacana@mailinator.com', 'credit card', 'flat no. Soluta quas est asp Est qui impedit au Est cumque occaecat  Error omnis molestia Cupiditate facere de - ', ', Dell Inspiron ( 1 )', 98000, '11-Dec-2025', 'pending'),
(34, 1, 'Hasad Brown', '314', 'tekujac@mailinator.com', 'cash on delivery', 'flat no. Velit consequat Id Voluptatem natus ut  Sed tempore volupta Culpa magnam anim pa Laborum Vero rerum  - ', ', Dell Inspiron ( 1 )', 98000, '11-Dec-2025', 'pending'),
(35, 1, 'Regina Burns', '507', 'nygo@mailinator.com', 'credit card', 'flat no. Ipsum dolor saepe be Et aut eos consectet Soluta lorem dolore  Nesciunt ipsum est Incidunt unde deser - ', ', Dell Inspiron ( 1 )', 98000, '11-Dec-2025', 'pending'),
(36, 3, 'abc', '02836729394', 'prithu@gmail.com', 'cash on delivery', 'flat no. 20 xyz dhaka dhaka bangladesh - ', ', iPhone 15 ( 1 )', 93000, '14-Dec-2025', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `details`, `price`, `image`) VALUES
(29, 'MacBook Pro', 'Laptop', 'Apple MacBook Pro 14-inch, M1 Pro Chip, 16GB RAM, 512GB SSD.', 110000, 'apple-mac-pro.jpg'),
(30, 'Dell Inspiron', 'Laptop', 'Dell Inspiron 15, Intel Core i7, 16GB RAM, 512GB SSD. Very powerfull laptop.', 98000, 'Dell Inspiron 15 3501 Core i5 11th-400x400.jpg'),
(31, 'HP Pavilion', 'Laptop', 'HP Pavilion 15, Intel Core i5, 8GB RAM, 256GB SSD.', 82000, 'c06912414.png'),
(32, 'Asus ROG', 'Laptop', 'Asus ROG Strix, AMD Ryzen 9, 16GB RAM, 1TB SSD.', 144000, 'asus_rog.jpg'),
(33, 'Samsung Galaxy S21', 'Mobile', 'Samsung Galaxy S21, 128GB.', 66000, 's21_galaxy.jpg'),
(34, 'iPhone 14', 'Mobile', 'Apple iPhone 14, 128GB, Blue.', 81000, 'images.jfif'),
(35, 'OnePlus 9', 'Mobile', 'OnePlus 9, 128GB, Winter Mist.', 36000, 's21_galaxy.jpg'),
(36, 'Google Pixel 6', 'Mobile', 'Google Pixel 6, 128GB, Black.', 43500, 'pixel_6.jpg'),
(37, 'Dell XPS 8940', 'PC', 'Dell XPS 8940 Desktop, Intel Core i7, 16GB RAM, 1TB HDD + 512GB SSD.', 11700, 'dell_xps.jpg'),
(38, 'HP Omen 30L', 'PC', 'HP Omen 30L, AMD Ryzen 7, 16GB RAM, 1TB SSD.', 77000, 'hp_omen.jpg'),
(39, 'Acer Predator Orion 3000', 'PC', 'Acer Predator Orion 3000, Intel Core i7, 16GB RAM, 512GB SSD.', 135900, 'Acer_Predator_Orion.jfif'),
(40, 'Corsair Vengeance i7200', 'PC', 'Corsair Vengeance i7200, Intel Core i9, 32GB RAM, 1TB SSD.', 7000, 'corsair.jpg'),
(41, 'Samsung Odyssey   G7', 'Monitor', 'Samsung Odyssey G7, 32-inch, 1440p, 240Hz.', 74999, 'Samsung Odyssey G7.jpg'),
(42, 'LG UltraGear 27GN950', 'Monitor', 'LG UltraGear 27GN950, 27-inch, 4K, 144Hz.', 107250, 'LG UltraGear 27GN950.jpg'),
(43, 'Asus TUF Gaming VG27AQ', 'Monitor', 'Asus TUF Gaming VG27AQ, 27-inch, 1440p, 165Hz.', 58000, 'Asus TUF Gaming VG27AQ.jfif'),
(44, 'Dell UltraSharp U2720Q', 'Monitor', 'Dell UltraSharp U2720Q, 27-inch, 4K, 60Hz.', 72000, 'Dell UltraSharp U2720Q.jpg'),
(71, 'Lenovo IdeaPad 1', 'Laptop', 'AMD Ryzen 5, 8GB DDR5 RAM 256GB SSD', 57000, 'Screenshot 2024-05-27 231038.png'),
(72, 'iPhone 15', 'Mobile', 'Apple iPhone 15, 256GB 6GB RAM, Pink.', 93000, 'iPhone-15-Plus-(4)-7443.jpg'),
(73, 'Acer Predator Helios 18', 'Laptop', 'Intel Core i9, NVIDIA RTX 4060, 165Hz Gaming Laptop', 215000, 'Acer-Predator-Helios-18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `reviews` varchar(300) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `reviews`, `userid`) VALUES
(11, 'Fatema Akter Prithu ', 'Good product selection and user-friendly site, but shipping was slightly delayed.', 3),
(12, 'Md. Sohan Millat Sakib', 'Product quality are average. But I satisfied with PC Shop. Because they are very helpful.', 2),
(13, 'Ayshi Sarker', 'Good Products. I am totally satisfied with their service.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `image`) VALUES
(1, 'Feroza Naznin Lia', 'feroza@cse.green.edu.bd', '429d63689a0813ea87fa77c3931bf263', 'admin', 'feroza.jpg'),
(2, 'Md. Sohan Millat Sakib', 'millatsakib01@gmail.com', '429d63689a0813ea87fa77c3931bf263', 'admin', 'sohan-millat-sakib.png'),
(3, 'Fatema Jahan Prithu', 'prithu@gmail.com', '429d63689a0813ea87fa77c3931bf263', 'user', 'prithu.png'),
(4, 'Ekra Islam Ohi', 'ohi@gmail.com', '429d63689a0813ea87fa77c3931bf263', 'user', 'ohi.jpg'),
(5, 'Ayshi Sarker', 'ayshi@gmail.com', '429d63689a0813ea87fa77c3931bf263', 'user', 'ayshi.jpg'),
(6, 'Green University', 'green@gmail.com', '429d63689a0813ea87fa77c3931bf263', 'admin', 'GUBLogo.png');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(1, 3, 72, 'iPhone 15', 93000, 'iPhone-15-Plus-(4)-7443.jpg'),
(2, 3, 30, 'Dell Inspiron', 98000, 'Dell Inspiron 15 3501 Core i5 11th-400x400.jpg'),
(3, 3, 31, 'HP Pavilion', 82000, 'c06912414.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
