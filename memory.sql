-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2021 at 09:38 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `memory`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `img_url`) VALUES
(1, '../src/img1.png'),
(2, '../src/img2.png'),
(3, '../src/img3.png'),
(4, '../src/img4.png'),
(5, '../src/img5.png'),
(6, '../src/img6.png'),
(7, '../src/img7.png'),
(8, '../src/img8.png'),
(9, '../src/img9.png'),
(10, '../src/img10.png'),
(11, '../src/img11.png'),
(12, '../src/img12.png');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  `nb_coup` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `id_utilisateur`, `niveau`, `nb_coup`, `time`) VALUES
(1, 3, 9, 10, '00:00:05'),
(2, 5, 9, 12, '00:00:10'),
(3, 16, 3, 8, '00:00:07'),
(4, 16, 3, 10, '00:00:17'),
(5, 16, 4, 14, '00:00:26'),
(6, 16, 4, 16, '00:00:14'),
(7, 16, 5, 16, '00:01:11'),
(8, 16, 3, 18, '00:00:20'),
(9, 16, 3, 8, '00:00:07'),
(10, 16, 3, 8, '00:00:07'),
(11, 16, 4, 16, '00:00:13'),
(12, 16, 3, 16, '00:00:18'),
(13, 16, 3, 10, '00:00:09'),
(14, 16, 5, 22, '00:00:34'),
(15, 17, 4, 16, '00:00:16'),
(16, 17, 3, 6, '00:00:05'),
(17, 17, 3, 12, '00:00:10'),
(18, 17, 3, 8, '00:00:07'),
(19, 17, 3, 9, '00:00:57'),
(20, 18, 3, 10, '00:00:11'),
(21, 18, 3, 10, '00:00:08'),
(22, 19, 4, 10, '00:00:19'),
(23, 19, 4, 14, '00:00:15'),
(24, 19, 3, 8, '00:00:06'),
(25, 19, 5, 22, '00:00:31'),
(27, 19, 7, 26, '00:00:31'),
(28, 19, 12, 58, '00:01:09'),
(29, 19, 6, 20, '00:00:31'),
(30, 19, 8, 38, '00:01:05'),
(31, 20, 5, 20, '00:00:20'),
(32, 20, 12, 70, '00:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(16, 'may', '$2y$10$ZwDxs20idGnYJu3bYnVike29l5jmb7dmKl0TfXQ0PuXJbFlmkMHwG'),
(17, 'bat', '$2y$10$AAC9LUyYd4ka.84jEWj9.OgS4dJV9aL/16mcaJ3e3cR6dwvo44S/.'),
(18, 'leo1', '$2y$10$Emar5Rs8Pgl.lA0fXbFu6O00gxSsf4EFQG6ve49GG8O5DXj8cBmca'),
(19, 'leratfuryo', '$2y$10$KB5wsrxX.U1Lnci9Y/D9N.fX/slPUcwOZNC0bKQcjSYVf1WNVb6Iu'),
(20, 'Alicia1802', '$2y$10$O6s3dYRKnYFJHWbpUG/gPe6pLnQ6wDth1.K85bljnJba.IrQijfxW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
