-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2020 at 09:10 AM
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
-- Database: `gas`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `gas_name` varchar(30) NOT NULL,
  `purpose` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `gas_name`, `purpose`) VALUES
(1, 'sagar', 'domestic'),
(2, 'nepal', 'comercial');

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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `postby_id`, `created_at`, `is_verified`, `verifiedby_id`, `updated_at`, `status`, `first_name`, `last_name`, `address`, `phone_number`, `item`, `payment`, `purpose`, `quantity`, `title`) VALUES
(1, '', 1, '2020-03-13 08:58:22', 0, 1, NULL, 1, '', '', '', 0, '', '', '', 0, ''),
(2, 'manisha_gora@hotmail.com', 1, '2020-03-13 09:21:17', 0, 1, NULL, 1, 'mani', 'we', '', 234, 'sagar gas', '', 'Domestic Purpose', 3, ''),
(8, 'monikagora52@gmail.com', 1, '2020-03-13 09:52:16', 0, 1, NULL, 1, 'ertt', 'erqr3', 'seeeee', 1234, 'sagar gas', '', 'Domestic Purpose', 5, ''),
(9, 'abhieshagora52@gmail.com', 1, '2020-03-13 09:57:08', 0, 1, NULL, 1, 'weee', 'erqr3we', 'seeeee', 1234, 'sagar gas', '', 'Domestic Purpose', 5, 'MIS.jpg'),
(13, 'khadksaishika1@gmail.com', 1, '2020-03-14 05:21:04', 0, 1, NULL, 1, 'sdas', 'asdass', 'bht', 1234567890, 'nepal', '', 'comercial', 3, 'bg.jpg'),
(14, 'khadksssssssssaishika1@gmail.com', 1, '2020-03-14 05:22:29', 0, 1, NULL, 1, 'what', 'asdaswjhattts', 'bhtttt', 1234567899, 'sagar', '', 'domestic', 3, 'bg.jpg'),
(15, 'khadksssssssssaishwika1@gmail.com', 1, '2020-03-14 05:24:33', 0, 1, NULL, 1, 'whate', 'asdaswjhatttsw', 'bhttttw', 1234567699, 'nepal', '', 'comercial', 3, 'slide1.jpg'),
(17, 'monika1gora52@gmail.com', 1, '2020-03-14 05:28:40', 0, 1, NULL, 1, 'aniiiiiiii', 'we', 'weddwq', 1232567899, 'nepal', '', 'comercial', 5, 'logoDark.JPG'),
(22, 'manishea_gora@hotmail.com', 1, '2020-03-14 07:42:40', 0, 1, NULL, 1, 'egerg', 'rgrr', 'qeq2e', 1234567890, 'nepal', 'COD', 'comercial', 4, 'banner2.jpg'),
(23, 'maanisha_gora@hotmail.com', 1, '2020-03-14 07:52:23', 0, 1, NULL, 1, 'asd', 'sdsd', 'bkt', 1234567890, 'sagar', 'COD', 'domestic', 1, 'bg.jpg'),
(25, 'abhieasdshagora52@gmail.com', 1, '2020-03-14 07:54:08', 0, 1, NULL, 1, 'asd', 'sdsd', 'qw', 1232567899, 'sagar', 'COD', 'comercial', 1, 'bg.jpg'),
(26, 'abhieasdsdsdshagora52@gmail.com', 1, '2020-03-14 07:54:39', 0, 1, NULL, 1, 'asd', 'sdsd', 'qw', 1232567899, 'sagar', 'COD', 'comercial', 1, 'bg.jpg'),
(27, 'abherieasdsdsdshagora52@gmail.com', 1, '2020-03-14 07:56:28', 0, 1, NULL, 1, 'asd', 'sdsd', 'qw', 1232567899, 'sagar', 'COD', 'comercial', 1, 'bg.jpg'),
(28, 'abherieaersdsdsdshagora52@gmail.com', 1, '2020-03-14 07:56:39', 0, 1, NULL, 1, 'asd', 'sdsd', 'qw', 1232567899, 'sagar', 'Pay Online', 'comercial', 1, 'bg.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
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
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
