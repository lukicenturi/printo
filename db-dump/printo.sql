-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2019 at 09:44 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `printo`
--

-- --------------------------------------------------------

--
-- Table structure for table `method`
--

CREATE TABLE `method` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `atasnama` varchar(255) DEFAULT NULL,
  `rek` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `method`
--

INSERT INTO `method` (`id`, `name`, `picture`, `type`, `atasnama`, `rek`) VALUES
(1, 'Bank BCA', 'logo_bca.png', 'bank', 'PT. Go-Print Indonesia', '021351232'),
(2, 'Bank BNI', 'logo_bni.png', 'bank', 'PT. Go-Print Indonesia', '0128323'),
(3, 'Indomaret', 'logo_indomaret.png', 'not', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `id` int(11) NOT NULL,
  `size` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`id`, `size`) VALUES
(1, 'A4'),
(2, 'A3'),
(3, 'A2'),
(4, 'A5'),
(5, 'A1');

-- --------------------------------------------------------

--
-- Table structure for table `print`
--

CREATE TABLE `print` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `original` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `copies` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `deliver` varchar(255) DEFAULT NULL,
  `address` text,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `coin` int(11) DEFAULT NULL,
  `id_partner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `print`
--

INSERT INTO `print` (`id`, `date`, `kode`, `source`, `original`, `size`, `copies`, `status`, `deliver`, `address`, `city`, `province`, `postal_code`, `id_user`, `pages`, `coin`, `id_partner`) VALUES
(1, '2018-11-02', '201811026632651', '201811026632651.docx', '201809171456590210339151_contoh pengerjaan tugas.docx', 1, 1, '6', '1', 'ad', 'adsf', 'asdf', 'asdf', 1, 5, 5, 8),
(2, '2018-11-02', '201811023784811', '201811023784811.docx', '201809171456590210339151_contoh pengerjaan tugas.docx', 1, 3, '6', '1', 'asdf', 'adsf', 'asdf', 'asdf', 1, 5, 15, 8),
(3, '2018-11-02', '201811028088531', '201811028088531.docx', 'O192-ISYS6169-DH02-00.docx', 1, 2, '6', '0', '', '', '', '', 1, 5, 10, 8);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `coin` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id`, `label`, `coin`, `price`) VALUES
(1, 'Promo 1', 100, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE `topup` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_method` int(11) DEFAULT NULL,
  `coin` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `id_payment` int(16) DEFAULT NULL,
  `pay` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topup`
--

INSERT INTO `topup` (`id`, `date`, `id_user`, `id_method`, `coin`, `price`, `status`, `id_payment`, `pay`) VALUES
(1, '2018-11-02', 1, 3, 100, 50000, 3, NULL, 50000),
(2, '2018-11-02', 1, 3, 100, 50000, 3, NULL, 50000),
(3, '2018-11-02', 1, 2, 100, 50000, 3, NULL, 50002);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active',
  `coin` int(11) DEFAULT '0',
  `remember_token` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT 'default.png',
  `role` enum('USER','PARTNER') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `nohp`, `password`, `status`, `coin`, `remember_token`, `img`, `role`) VALUES
(1, 'lukicenturi@gmail.com', 'Luki Centuri', '085856680484', '$2y$10$INaor9ZiP0OFYyCv4a6BCuKC0dptmMmVigzv604hML6BxmuuJbV3C', 'active', 55, 'aZlNkubRcQfw7ktvrxT2pDC2yeRjbPJVpa7ARiEyyHFauUc7yF9ElAbGOnjd', 'default.png', 'USER'),
(3, 'jonathangobiel@gmail.com', 'Jonathan Gobiel', '08214123123', '$2y$10$AlhYh2rrG2fX1/FeMfllHeQC0N.d2R9rH5kjj1VJXi6hOtrqmiHYO', 'active', 180, 'DnQMCVLrE34HHh7cioFYeCw78xgqVmdyIw4yO4p8PAIxsE96Ul3XTQzvGvMe', 'default.png', 'USER'),
(8, 'kristihandayani@gmail.com', 'Kristi Handayani', '081421731232', '$2y$10$i2aTqAp5G.Gcg9S9XpWrHuyOam.PIg3FEelrYcKqxlQBVHe/u8mo6', 'active', 480, NULL, 'default.png', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `method`
--
ALTER TABLE `method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `print`
--
ALTER TABLE `print`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `method`
--
ALTER TABLE `method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `print`
--
ALTER TABLE `print`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topup`
--
ALTER TABLE `topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
