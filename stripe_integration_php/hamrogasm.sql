-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2020 at 04:23 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamrogasm`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('normal_user','admin','super_admin','guest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal_user',
  `secret_key` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `postby_id` int(6) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_verified` tinyint(1) DEFAULT '0',
  `verifiedby_id` int(6) DEFAULT '1',
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_boy`
--

INSERT INTO `delivery_boy` (`id`, `name`, `username`, `email`, `password`, `user_type`, `secret_key`, `remarks`, `postby_id`, `created_at`, `is_verified`, `verifiedby_id`, `updated_at`, `status`) VALUES
(3, 'zenish prajapati', 'izenish', 'zenish77@gmail.com', 'Nepal123', 'super_admin', NULL, NULL, 1, '2020-03-14 14:01:15', 0, 1, NULL, 1),
(14, '', 'aman', 'test@yahoo.com', '202cb962ac59075b964b07152d234b70', 'normal_user', NULL, NULL, 1, '2019-07-28 14:13:58', 1, 1, '2020-03-14 19:35:02', 1),
(18, '', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', NULL, 1, '2019-07-30 16:25:01', 1, 1, '2019-07-30 22:11:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gas_cylinders`
--

CREATE TABLE `gas_cylinders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `price` smallint(6) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gas_cylinders`
--

INSERT INTO `gas_cylinders` (`id`, `title`, `content`, `author`, `featured_image`, `price`, `stock`) VALUES
(1, 'HP Gas', ' 15L of HP domestic gas. Not for Commercial Use', '', 'product1.jpg', 0, 0),
(2, 'Nepal Gas', '15L of Nepal Gas domestic gas. Not for Commercial Use', '', 'product3.jpg', 0, 50),
(3, 'Subhidha gas', 'Here for you whenever you need!', '', 'blue10.jpg', 0, 5),
(4, 'Sugam Gas', 'Sugam Gas Hamro Sugam Gas', '', 'product2.jpg', 0, 50),
(17, 'Test', 'Test', '', 'product6.jpeg', 1350, 3);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `gas_name` varchar(30) NOT NULL,
  `purpose` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `gas_name`, `purpose`, `type`) VALUES
(1, 'sagar', 'domestic', 'old'),
(2, 'nepal', 'comercial', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `cr_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `message`, `status`, `cr_date`) VALUES
(1, 'sani', 'sani@hotmail.com', 'well done', 0, '2020-04-16 09:13:54'),
(33, 'aman', 'masmas@gmail.com', 'alsfkjsk', 1, '2020-03-14 12:52:30'),
(34, 'Manisha', 'gora@yahoo.com', 'Great efforts!', 1, '2020-03-14 02:39:39'),
(35, 'Jenish Prajapati', 'zenish77@gmail.com', 'Wow!!!', 1, '2020-03-14 02:39:59'),
(36, 'Manish', 'manees@ymail.com', '(y) (y)', 1, '2020-03-14 02:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `card_number` bigint(20) NOT NULL,
  `card_exp_month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `card_exp_year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_price_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `card_number`, `card_exp_month`, `card_exp_year`, `item_name`, `item_number`, `item_price`, `item_price_currency`, `paid_amount`, `paid_amount_currency`, `txn_id`, `payment_status`, `created`, `modified`) VALUES
(1, 'manisha', 'manishaa_gora@hotmail.com', 4242424242424242, '02', '2022', 'GAS', '2', 137500.00, 'NPR', '137500', 'npr', 'txn_1Gc8ICDSTWXJ032VI1u4GHFd', 'succeeded', '2020-04-26 16:49:59', '2020-04-26 16:49:59'),
(2, 'manishmna', 'manishoa_gora@hotmail.com', 4242424242424242, '09', '2021', 'GAS', '2', 137500.00, 'NPR', '137500', 'npr', 'txn_1GhRiTDSTWXJ032VPLn0ngr3', 'succeeded', '2020-05-11 08:35:01', '2020-05-11 08:35:01'),
(3, 'sd', 'sas@gmail.com', 4242424242424242, '02', '2021', 'GAS', '2', 137500.00, 'NPR', '137500', 'npr', 'txn_1Gu9NgDSTWXJ032VRUqiiQn6', 'succeeded', '2020-06-15 09:37:48', '2020-06-15 09:37:48'),
(4, 'jojer', 'joker@gmail.com', 4242424242424242, '03', '2021', 'GAS', '2', 137500.00, 'NPR', '137500', 'npr', 'txn_1Gzw1pDSTWXJ032Vwtsk7kql', 'succeeded', '2020-07-01 08:35:02', '2020-07-01 08:35:02'),
(5, 'fr', 'ora52@gmail.com', 4242424242424242, '02', '2022', 'GAS', '2', 275000.00, 'NPR', '275000', 'npr', 'txn_1H2cLEDSTWXJ032VpDOI4dr4', 'succeeded', '2020-07-08 18:10:05', '2020-07-08 18:10:05'),
(6, 'mani', 'agora52@gmail.com', 4242424242424242, '02', '2022', 'GAS', '2', 137500.00, 'NPR', '137500', 'npr', 'txn_1H5mHLDSTWXJ032VDgpfwrbG', 'succeeded', '2020-07-17 11:23:02', '2020-07-17 11:23:02'),
(7, 'yui', 'agora52@gmail.com', 4242424242424242, '09', '2022', 'GAS', '2', 550000.00, 'NPR', '550000', 'npr', 'txn_1H5pUuDSTWXJ032VA1IEeOwP', 'succeeded', '2020-07-17 14:49:16', '2020-07-17 14:49:16'),
(8, 'jungie', 'j@gmail.com', 4242424242424242, '1', '2021', 'GAS', '2', 550000.00, 'NPR', '550000', 'npr', 'txn_1H6ALRDSTWXJ032V5AnjeodR', 'succeeded', '2020-07-18 13:04:52', '2020-07-18 13:04:52'),
(9, 'ddde', 'sas@gmail.com', 4242424242424242, '2', '2022', 'GAS', '2', 550000.00, 'NPR', '550000', 'npr', 'txn_1H6APuDSTWXJ032V6Bxx1ARq', 'succeeded', '2020-07-18 13:09:29', '2020-07-18 13:09:29'),
(10, 'htf', 'abhiesdddhdddddagora52@gmail.com', 4242424242424242, '2', '2022', 'GAS', '2', 412500.00, 'NPR', '412500', 'npr', 'txn_1H6AYGDSTWXJ032VtaBT16aS', 'succeeded', '2020-07-18 13:18:06', '2020-07-18 13:18:06'),
(11, 'h', 'hdddddagora52@gmail.com', 4242424242424242, '1', '2021', 'GAS', '2', 412500.00, 'NPR', '412500', 'npr', 'txn_1H6AbODSTWXJ032VwukusbJA', 'succeeded', '2020-07-18 13:21:21', '2020-07-18 13:21:21'),
(12, 'tae hyung', 'mat@gmail.com', 4242424242424242, '02', '2022', 'GAS', '2', 412500.00, 'NPR', '412500', 'npr', 'txn_1HFE0dDSTWXJ032VQI6zlWwC', 'succeeded', '2020-08-12 12:48:32', '2020-08-12 12:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) UNSIGNED NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postby_id` int(6) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_verified` tinyint(1) DEFAULT '0',
  `verifiedby_id` int(6) DEFAULT '1',
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int(10) NOT NULL,
  `item` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(3) NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` mediumint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `postby_id`, `created_at`, `is_verified`, `verifiedby_id`, `updated_at`, `status`, `first_name`, `last_name`, `address`, `phone_number`, `item`, `payment`, `purpose`, `quantity`, `profile`, `citizenship_card`, `code`) VALUES
(98, 'juk@gmail.com', 1, '2020-07-18 04:00:39', 0, 1, NULL, 1, 'jun', 'kookie', 'kkorea', 1234567900, 'sagar', 'COD', 'comercial', 1, 'cc3.jpg', 'cc1.jpg', 320219),
(99, 'judk@gmail.com', 1, '2020-07-18 04:03:45', 0, 1, NULL, 1, 'jun', 'kookie', 'kkorea', 1234567900, 'sagar', 'Pay Online', 'domestic', 2, 'cc3.jpg', 'cc1.jpg', 931247),
(100, 'jufdk@gmail.com', 1, '2020-07-18 04:08:20', 0, 1, NULL, 1, 'jun', 'kookie', 'kkorea', 1234567900, 'sagar', 'Pay Online', 'domestic', 2, 'cc3.jpg', 'cc1.jpg', 372260),
(101, 'jrfdk@gmail.com', 1, '2020-07-18 04:10:29', 0, 1, NULL, 1, 'jun', 'kookie', 'kkorea', 1234567900, 'sagar', 'Pay Online', 'domestic', 2, 'cc3.jpg', 'cc1.jpg', 247120),
(102, 'jrfddk@gmail.com', 1, '2020-07-18 04:41:57', 0, 1, NULL, 1, 'jun', 'kookie', 'kkorea', 1234567900, 'sagar', 'Pay Online', 'comercial', 2, 'cc3.jpg', 'cross.jpg', 194295),
(103, 'jrfdsdk@gmail.com', 1, '2020-07-18 04:44:02', 0, 1, NULL, 1, 'jun', 'kookie', 'kkorea', 1234567900, 'sagar', 'Pay Online', 'domestic', 2, 'pic1.png', 'pic2.png', 246925),
(104, 'jrcfdsdk@gmail.com', 1, '2020-07-18 04:49:38', 0, 1, NULL, 1, 'jun', 'kookie', 'kkorea', 1234567900, 'sagar', 'Pay Online', 'domestic', 2, 'pic1.png', 'pic2.png', 222258),
(105, 'jrcfdqsdk@gmail.com', 1, '2020-07-18 04:51:20', 0, 1, NULL, 1, 'jun', 'kookie', 'kkorea', 1234567900, 'sagar', 'COD', 'comercial', 4, 'bb1.jpg', 'cross.jpg', 274491),
(107, 'jrcfdqsdsdk@gmail.com', 1, '2020-07-18 04:52:39', 0, 1, NULL, 1, 'jun', 'kookie', 'kkorea', 1234567900, 'sagar', 'COD', 'domestic', 1, 'cc3.jpg', 'cc1.jpg', 276471),
(108, 'tae@gmail.com', 1, '2020-07-18 05:53:33', 0, 1, NULL, 1, 'tae', 'kook', '1234567890', 2147483647, 'sagar', 'COD', 'comercial', 1, 'cc3.jpg', 'citi.png', 882891),
(109, 'jun@gmail.com', 1, '2020-07-18 06:48:02', 0, 1, NULL, 1, 'junggg', 'kokkeee', 's korea', 1234654321, 'sagar', 'Pay Online', 'comercial', 3, 'cc3.jpg', 'pic1.png', 205969),
(110, 'a@gmail.com', 1, '2020-07-18 07:19:12', 0, 1, NULL, 1, 'jungie', 'kookie', '233', 1234455432, 'sagar', 'Pay Online', 'comercial', 4, 'bb1.jpg', 'tick.png', 602212),
(111, 'Iora52@gmail.com', 1, '2020-07-18 07:28:49', 0, 1, NULL, 1, 'uik', 'ii', '1', 1234455432, 'sagar', 'Pay Online', 'comercial', 3, 'cc1.jpg', 'cc3.jpg', 771086),
(112, 'taeefg@gmail.com', 1, '2020-08-12 06:58:39', 0, 1, NULL, 1, 'tae', 'tae', '12', 1234567899, 'sagar', 'COD', 'domestic', 2, 'Screenshot (428).png', 'Screenshot (429).png', 572857),
(113, 'taeefdg@gmail.com', 1, '2020-08-12 06:58:58', 0, 1, NULL, 1, 'tae', 'tae', '12', 1234567899, 'sagar', 'COD', 'comercial', 1, 'Screenshot (428).png', 'Screenshot (429).png', 859692),
(114, 'taeeffdg@gmail.com', 1, '2020-08-12 06:59:57', 0, 1, NULL, 1, 'tae', 'tae', '12', 1234567899, 'sagar', 'COD', 'domestic', 1, 'Screenshot (428).png', 'Screenshot (429).png', 546057),
(117, 'taehyung@gmail.com', 1, '2020-08-12 07:02:22', 0, 1, NULL, 1, 'tae', 'hyung', 'dawe', 1234567699, 'sagar', 'Pay Online', 'comercial', 3, 'Screenshot (433).png', 'Screenshot (434).png', 763144);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `gas_cylinders`
--
ALTER TABLE `gas_cylinders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `verifiedby_id` (`verifiedby_id`),
  ADD KEY `postby_id` (`postby_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `gas_cylinders`
--
ALTER TABLE `gas_cylinders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
