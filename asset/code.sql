-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 11:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code`
--

-- --------------------------------------------------------

--
-- Table structure for table `dharura`
--

CREATE TABLE `dharura` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kontena`
--

CREATE TABLE `kontena` (
  `id` int(11) NOT NULL,
  `userid` varchar(11) NOT NULL DEFAULT 'mgeni',
  `name` varchar(255) NOT NULL,
  `idadi` int(10) NOT NULL,
  `fikia` varchar(25) NOT NULL,
  `simu1` varchar(15) DEFAULT NULL,
  `simu2` varchar(15) DEFAULT NULL,
  `dharura` varchar(50) DEFAULT NULL,
  `paid` int(4) DEFAULT 0,
  `jumla` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontena`
--

INSERT INTO `kontena` (`id`, `userid`, `name`, `idadi`, `fikia`, `simu1`, `simu2`, `dharura`, `paid`, `jumla`, `created_at`, `updated_at`) VALUES
(8, 'mgeni', 'Abou Yaziyd', 3, 'DAR', '+966596005795', '+255682057710', 'Abou Yaziyd', 170, '225', '2022-03-01 13:09:02', '2022-03-03 00:57:18'),
(9, 'mgeni', 'Abou Yaziyd', 3, 'DAR', '+966596005795', '+255682057710', 'Abou Yaziyd', 50, '225', '2022-03-02 16:42:27', '2022-03-03 00:57:07'),
(11, '1', 'Abou Yaziyd', 4, 'DAR', '+966596005795', '+255682057710', 'Abou Yaziyd', 100, '300', '2022-03-02 21:35:19', '2022-03-03 15:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `kulliyyah`
--

CREATE TABLE `kulliyyah` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kulliyyah`
--

INSERT INTO `kulliyyah` (`id`, `name`) VALUES
(1, 'MA\'AHAD LUGHA'),
(2, 'SHERIA'),
(3, 'QUR-AN'),
(4, 'LUGHA'),
(5, 'HADITHI'),
(6, 'CIVIL'),
(7, 'MECHANICAL'),
(8, 'ELECTRICAL'),
(9, 'COMPUTER'),
(10, 'U\'LUM'),
(11, 'TAH-DHIRI'),
(12, 'DA\'AWAH');

-- --------------------------------------------------------

--
-- Table structure for table `malipo`
--

CREATE TABLE `malipo` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `mchango` varchar(255) NOT NULL,
  `paid` int(10) NOT NULL,
  `type` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `receipt` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `malipo`
--

INSERT INTO `malipo` (`id`, `userid`, `mchango`, `paid`, `type`, `year`, `receipt`, `created_at`) VALUES
(1, 2, 'umoja', 10, 'malipo', 2022, 'TZM/02-22/0001', '2022-02-11 10:09:39'),
(2, 2, 'umoja', 5, 'malipo', 2022, 'TZM/02-22/0002', '2022-02-11 10:19:21'),
(3, 1, 'chakula', 34, 'malipo', 2022, 'TZM/02-22/0003', '2022-02-12 11:45:31'),
(4, 2, 'chakula', 2, 'malipo', 2022, 'TZM/02-22/0004', '2022-02-12 11:47:00'),
(5, 1, 'umoja', 2, 'malipo', 2022, 'TZM/02-22/0005', '2022-02-12 11:47:28'),
(6, 1, 'umoja', 2, 'malipo', 2022, 'TZM/02-22/0006', '2022-02-12 11:50:49'),
(7, 7, 'umoja', 1, 'malipo', 2022, 'TZM/02-22/0007', '2022-02-12 14:09:27'),
(8, 1, 'umoja', 1, 'malipo', 2022, 'TZM/02-22/0008', '2022-02-12 14:11:13'),
(9, 2, 'umoja', 1, 'malipo', 2022, 'TZM/02-22/0009', '2022-02-12 14:11:28'),
(10, 1, 'umoja', 1, 'malipo', 2022, 'TZM/02-22/0010', '2022-02-12 14:12:11'),
(11, 2, 'umoja', 1, 'malipo', 2022, 'TZM/02-22/0011', '2022-02-12 14:17:52'),
(12, 1, 'umoja', 1, 'malipo', 2022, 'TZM/02-22/0012', '2022-02-12 14:22:23'),
(13, 1, 'chakula', 3, 'malipo', 2022, 'TZM/02-22/0013', '2022-02-12 15:22:11'),
(14, 1, 'kxjvnkf', 3, 'malipo', 2022, 'TZM/02-22/0014', '2022-02-12 15:28:44'),
(15, 1, 'umoja', 10, 'malipo', 2022, 'TZM/02-22/0015', '2022-02-24 10:52:05'),
(16, 1, 'umoja', 3, 'malipo', 2022, 'TZM/02-22/0016', '2022-02-24 11:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `marhala`
--

CREATE TABLE `marhala` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `marhala`
--

INSERT INTO `marhala` (`id`, `name`) VALUES
(1, 'dukturaa'),
(2, 'majisteri'),
(3, 'baklirius'),
(4, 'diploma'),
(5, 'ma\'ahad');

-- --------------------------------------------------------

--
-- Table structure for table `michango`
--

CREATE TABLE `michango` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(12) NOT NULL,
  `idadi` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `michango`
--

INSERT INTO `michango` (`id`, `name`, `amount`, `idadi`, `created_at`, `updated_at`) VALUES
(5, 'UMOJA', 50, NULL, '2022-02-11 01:51:07', '2022-03-02 23:35:42'),
(8, 'chakula', 150, NULL, '2022-02-11 02:33:55', '2022-02-11 05:33:55'),
(12, 'kontena', 75, '420', '2022-03-03 08:39:28', '2022-03-03 11:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `mikoa`
--

CREATE TABLE `mikoa` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mikoa`
--

INSERT INTO `mikoa` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Arusha', '2022-02-07 16:27:26', '2022-02-07 19:27:26'),
(2, 'Dar es Salaam', '2022-02-07 16:27:26', '2022-02-07 19:27:26'),
(3, 'Dodoma', '2022-02-07 16:27:26', '2022-02-07 19:27:26'),
(4, 'Geita', '2022-02-07 16:27:26', '2022-02-07 19:27:26'),
(5, 'Iringa', '2022-02-07 16:27:26', '2022-02-07 19:27:26'),
(6, 'Kagera', '2022-02-07 16:27:26', '2022-02-07 19:27:26'),
(7, 'Katavi', '2022-02-07 16:27:26', '2022-02-07 19:27:26'),
(8, 'Kigoma', '2022-02-07 16:27:26', '2022-02-07 19:27:26'),
(9, 'Kilimanjaro', '2022-02-07 16:27:26', '2022-02-07 19:27:26'),
(10, 'Lindi', '2022-02-07 16:27:26', '2022-02-07 19:27:26'),
(11, 'Manyara', '2022-02-07 16:27:26', '2022-02-07 19:27:26'),
(12, 'Mara', '2022-02-07 16:27:26', '2022-02-07 19:27:26'),
(13, 'Mbeya', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(14, 'Morogoro', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(15, 'Mtwara', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(16, 'Mwanza', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(17, 'Njombe', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(18, 'Pemba Kaskazini', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(19, 'Pemba Kusini', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(20, 'Pwani', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(21, 'Rukwa', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(22, 'Ruvuma', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(23, 'Shinyanga', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(24, 'Simiyu', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(25, 'Singida', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(26, 'Songwe', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(27, 'Tabora', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(28, 'Tanga', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(29, 'Unguja Kaskazini', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(30, 'Unguja Mjini Magharibi', '2022-02-07 16:27:27', '2022-02-07 19:27:27'),
(31, 'Unguja Kusini', '2022-02-07 16:27:27', '2022-02-07 19:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `mustawa`
--

CREATE TABLE `mustawa` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mustawa`
--

INSERT INTO `mustawa` (`id`, `name`) VALUES
(1, 'KWANZA'),
(2, 'PILI'),
(3, 'TATU'),
(4, 'NNE'),
(5, 'TANO'),
(6, 'SITA'),
(7, 'SABA'),
(8, 'NANE');

-- --------------------------------------------------------

--
-- Table structure for table `tangazo`
--

CREATE TABLE `tangazo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` varchar(500) NOT NULL,
  `state` varchar(10) NOT NULL,
  `btn` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tuma`
--

CREATE TABLE `tuma` (
  `tumaId` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tangazo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `name1` varchar(255) DEFAULT NULL,
  `name2` varchar(255) DEFAULT NULL,
  `name3` varchar(255) DEFAULT NULL,
  `nameArabic` varchar(255) DEFAULT NULL,
  `iqama` varchar(10) DEFAULT NULL,
  `identity` varchar(12) DEFAULT NULL,
  `passport` varchar(10) DEFAULT NULL,
  `visa` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `marhala` varchar(255) DEFAULT NULL,
  `kulliyyah` varchar(255) DEFAULT NULL,
  `mustawa` varchar(255) DEFAULT NULL,
  `hali` varchar(255) NOT NULL DEFAULT 'muntadhim',
  `phone1` varchar(12) DEFAULT NULL,
  `phone2` varchar(12) DEFAULT NULL,
  `phone3` varchar(12) DEFAULT NULL,
  `wihda` varchar(255) DEFAULT NULL,
  `daur` varchar(255) DEFAULT NULL,
  `ghurfa` varchar(255) DEFAULT NULL,
  `mkoa` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `name1`, `name2`, `name3`, `nameArabic`, `iqama`, `identity`, `passport`, `visa`, `dob`, `marhala`, `kulliyyah`, `mustawa`, `hali`, `phone1`, `phone2`, `phone3`, `wihda`, `daur`, `ghurfa`, `mkoa`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Abou Yaziyd', 'gakibrush@gmail.com', 'admin', '$2y$10$ED9igyc0bBnipmIYuh9AcO7Md9.lWHuYPkocLfRhYGcfuEeO9dj.y', 'Abdulrahman', 'Kirosa', 'Mselem', 'عبدالرحمن كيروسا مسلم', '2463918066', '398333833', '', '', '1995-08-28', 'BAKLIRIUS', 'DA\'AWAH', 'PILI', 'muntadhim', '255682057710', '966596005795', '255682057710', '17', '5', '651', 'UNGUJA MJINI MAGHARIBI', '2022-01-30 10:25:47', '2022-03-04 01:16:42', NULL),
(2, 'Abdulrahman', 'abuuyaziyd@gmail.com', 'mhasibu', '$2y$10$ZaSK0dhWRnW3BXoUhsBSvuclVf.juJMz4Q4X4YrKm3hFA5KE6uyy.', 'Abdulrahman', 'Kirosa', 'Mselem', 'عبدالرحمن كيروسا مسلم', '2463918066', '398333833', ' TAE112674', '37656954', '1995-11-28', 'BAKLIRIUS', 'SHERIA', 'PILI', 'muntadhim', '255682057710', '966596005795', '255682057710', '17', '5', '651', 'UNGUJA MJINI MAGHARIBI', '2022-02-08 09:52:42', '2022-02-24 10:51:34', NULL),
(7, 'Dodoma', 'katibu@gmail.com', 'user', '$2y$10$iokKY/fCUzCnjyVoNYDEEenPLXyqVxqumE7fBGWB./hpDNXHifJzO', 'Ali', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'muntadhim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-08 12:09:27', '2022-02-22 03:07:52', NULL),
(8, 'Dodoma', 'user@gmail.com', 'user', '$2y$10$mvIsoUQGKlfIN8KeBK/mT.rUcwQDxyw4vpTcbWdoI6ZXCcMep1f/6', 'Jafari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'muntadhim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-08 12:12:35', '2022-02-17 12:43:15', '2022-02-17 12:43:15'),
(9, 'Dodoma', 'admin@gmail.com', 'katibu', '$2y$10$RFhirneQIaCSF1bc5kFw2OIpN.hrBk7Rf.dbpKFoS8U8p5sJnDcpa', 'Beka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mutakharrij', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-08 12:13:41', '2022-02-22 03:07:52', NULL),
(23, 'qwertyuiop', '12345@gmail.com', 'user', '$2y$10$v/LAwy24.XfZcvn6Sdvrmu558NOWKVL3VLKbedL1KrDjASzpm2ckS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'muntadhim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-22 12:11:18', '2022-02-22 12:11:18', NULL),
(24, 'zxcvbnm', '123@mail.com', 'user', '$2y$10$Kb8mjWhQVz/5oXrm2e3y4eZg0wZY6CHBnhoKZgENGGQMKv5ksnaUO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'muntadhim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-22 12:24:22', '2022-02-22 12:24:22', NULL),
(25, 'zxcvbnm67', '1236@mail.com', 'user', '$2y$10$fdow2CQu7g2b94uaGocQlOE8plp4vQ94bpz9M8gMjcdyi7wi7U336', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'muntadhim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-22 12:31:06', '2022-02-22 12:31:06', NULL),
(26, 'zxcvbnm67', '12368@mail.com', 'user', '$2y$10$uci2DzMXdrkICg2sbvsYMubrvdowEeizF7dhhHAREqGJqW7axUBfu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'muntadhim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-22 12:31:49', '2022-02-22 12:31:49', NULL),
(27, 'zxcvbnm67', '123608@mail.com', 'user', '$2y$10$XMAEilfB3th9SniFO.Mtm.DPedEDRRMqJI6NBLoip3mJsBtYS9n8.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'muntadhim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-22 12:32:40', '2022-02-22 12:32:40', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kontena`
--
ALTER TABLE `kontena`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kulliyyah`
--
ALTER TABLE `kulliyyah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `malipo`
--
ALTER TABLE `malipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_michango` (`userid`);

--
-- Indexes for table `marhala`
--
ALTER TABLE `marhala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `michango`
--
ALTER TABLE `michango`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mikoa`
--
ALTER TABLE `mikoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mustawa`
--
ALTER TABLE `mustawa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tangazo`
--
ALTER TABLE `tangazo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuma`
--
ALTER TABLE `tuma`
  ADD PRIMARY KEY (`tumaId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontena`
--
ALTER TABLE `kontena`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kulliyyah`
--
ALTER TABLE `kulliyyah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `malipo`
--
ALTER TABLE `malipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `marhala`
--
ALTER TABLE `marhala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `michango`
--
ALTER TABLE `michango`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mikoa`
--
ALTER TABLE `mikoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `mustawa`
--
ALTER TABLE `mustawa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tangazo`
--
ALTER TABLE `tangazo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tuma`
--
ALTER TABLE `tuma`
  MODIFY `tumaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `malipo`
--
ALTER TABLE `malipo`
  ADD CONSTRAINT `user_michango` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
