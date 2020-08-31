-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 10:07 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notify`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` bigint(20) NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `postby_id` int(6) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_verified` tinyint(1) DEFAULT '0',
  `verifiedby_id` int(6) DEFAULT '1',
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `title`, `name`, `username`, `email`, `password`, `address`, `contact`, `city`, `zip`, `remarks`, `postby_id`, `created_at`, `is_verified`, `verifiedby_id`, `updated_at`, `status`) VALUES
(71, '1585573172-ed.jpg', 'Amanmool', 'amanmool10', 'amanmool03@gmail.com', '202cb962ac59075b964b07152d234b70', 'Golmadi', 9860916619, 'Bhaktapur', 10001, NULL, 1, '2020-03-27 09:22:50', 1, 1, '2020-03-30 18:44:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `id` int(6) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` bigint(20) NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
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

INSERT INTO `delivery_boy` (`id`, `title`, `name`, `username`, `email`, `password`, `address`, `contact`, `city`, `zip`, `remarks`, `postby_id`, `created_at`, `is_verified`, `verifiedby_id`, `updated_at`, `status`) VALUES
(69, '1585298137-ed.jpg', 'Ed sherran', 'Edy', 'amanmool384@gmail.com', '202cb962ac59075b964b07152d234b70', 'Golmadi', 9860916619, 'Bhaktapur', 10001, NULL, 1, '2020-03-26 12:14:42', 0, 1, '2020-03-27 15:10:44', 1),
(71, '1585300970-aman.png', 'Amanmool', 'amanmool10', 'amanmool03@gmail.com', '202cb962ac59075b964b07152d234b70', 'Golmadi', 9860916619, 'Bhaktapur', 10001, NULL, 1, '2020-03-27 09:22:50', 0, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`location`) VALUES
('<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.5294059481016!2d85.42990101505737!3d27.670027933737895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1aae9c06cdc7%3A0xf12112babca2e0d5!2sBhaktapur%20No.7%20Ward%20Office%2C%20Golmadhi!5e0!3m2!1sen!2snp!4v1585470344859!5m2!1sen!2snp\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>');

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
(35, 'aman', 'amanmool384@gmail.com', 'This is the message for completion of dashboard..', 1, '2020-03-17 11:35:28'),
(37, 'Zenish', 'zenish12@gmail.com', 'This website is great i love it..', 0, '2020-03-27 08:14:24'),
(38, 'duster', 'duster@dust.com', 'This is duster...', 0, '2020-03-27 08:22:45'),
(39, 'aman', 'amanmool384@gmail.com', 'This is the message for completion of dashboard..', 1, '2020-03-17 11:35:28'),
(40, 'Zenish', 'zenish12@gmail.com', 'This website is great i love it..', 0, '2020-03-27 08:14:24'),
(41, 'duster', 'duster@dust.com', 'This is duster...', 0, '2020-03-27 08:22:45'),
(42, 'aman', 'amanmool384@gmail.com', 'This is the message for completion of dashboard..', 1, '2020-03-17 11:35:28'),
(43, 'Zenish', 'zenish12@gmail.com', 'This website is great i love it..', 0, '2020-03-27 08:14:24'),
(44, 'duster', 'duster@dust.com', 'This is duster...', 0, '2020-03-27 08:22:45'),
(45, 'aman', 'amanmool384@gmail.com', 'This is the message for completion of dashboard..', 1, '2020-03-17 11:35:28'),
(46, 'Zenish', 'zenish12@gmail.com', 'This website is great i love it..', 0, '2020-03-27 08:14:24'),
(47, 'duster', 'duster@dust.com', 'This is duster...', 0, '2020-03-27 08:22:45'),
(48, 'Raju', 'raju@gmail.com', 'whats up.....', 0, '2020-03-29 01:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `view_stats`
--

CREATE TABLE `view_stats` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `page_views` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `view_stats`
--

INSERT INTO `view_stats` (`id`, `date`, `page_views`) VALUES
(1, '2020-03-19', 8),
(2, '2020-03-20', 5),
(3, '2020-03-21', 2),
(4, '2020-03-22', 8),
(5, '2020-03-23', 15),
(6, '2020-03-24', 1),
(7, '2020-03-25', 1),
(9, '2020-03-26', 2),
(10, '2020-03-27', 3),
(11, '2020-03-29', 12),
(12, '2020-04-10', 1),
(13, '2020-04-16', 2),
(14, '2020-07-16', 6),
(15, '2020-07-26', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `verifiedby_id` (`verifiedby_id`),
  ADD KEY `postby_id` (`postby_id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `verifiedby_id` (`verifiedby_id`),
  ADD KEY `postby_id` (`postby_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `view_stats`
--
ALTER TABLE `view_stats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `view_stats`
--
ALTER TABLE `view_stats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
