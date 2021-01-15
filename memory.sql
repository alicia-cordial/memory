-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 jan. 2021 à 15:36
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `memory`
--

-- --------------------------------------------------------

--
-- Structure de la table `cards`
--

DROP TABLE IF EXISTS `cards`;
CREATE TABLE IF NOT EXISTS `cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cards`
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
-- Structure de la table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  `nb_coup` int(11) NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `score`
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
(32, 20, 12, 70, '00:01:30'),
(33, 18, 9, 54, '00:01:11'),
(34, 18, 3, 8, '00:00:08');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(16, 'may', '$2y$10$ZwDxs20idGnYJu3bYnVike29l5jmb7dmKl0TfXQ0PuXJbFlmkMHwG'),
(17, 'bat', '$2y$10$AAC9LUyYd4ka.84jEWj9.OgS4dJV9aL/16mcaJ3e3cR6dwvo44S/.'),
(18, 'leo1', '$2y$10$Emar5Rs8Pgl.lA0fXbFu6O00gxSsf4EFQG6ve49GG8O5DXj8cBmca'),
(19, 'leratfuryo', '$2y$10$KB5wsrxX.U1Lnci9Y/D9N.fX/slPUcwOZNC0bKQcjSYVf1WNVb6Iu'),
(20, 'Alicia1802', '$2y$10$O6s3dYRKnYFJHWbpUG/gPe6pLnQ6wDth1.K85bljnJba.IrQijfxW');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
