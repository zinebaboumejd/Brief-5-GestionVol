-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 24 fév. 2022 à 22:20
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `flight`
--

DROP TABLE IF EXISTS `flight`;
CREATE TABLE IF NOT EXISTS `flight` (
  `id` int NOT NULL AUTO_INCREMENT,
  `origin` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `destination` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dep_time` datetime NOT NULL,
  `return_time` datetime DEFAULT NULL,
  `seats` int NOT NULL,
  `flighttype` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `flight`
--

INSERT INTO `flight` (`id`, `origin`, `destination`, `dep_time`, `return_time`, `seats`, `flighttype`) VALUES
(7, 'casa', 'Rabat', '2022-02-27 23:14:00', '2022-03-05 23:14:00', 27, 'Round Trip'),
(8, 'marrakech', 'Tanga', '2022-03-13 23:15:00', '2022-03-24 01:20:00', 10, 'One Way'),
(4, 'safi', 'casa', '2022-02-14 11:38:00', '2022-03-05 11:38:00', 5, 'Round Trip');

-- --------------------------------------------------------

--
-- Structure de la table `passenger`
--

DROP TABLE IF EXISTS `passenger`;
CREATE TABLE IF NOT EXISTS `passenger` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `reservation_id` int NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `reservation_id` (`reservation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `passenger`
--

INSERT INTO `passenger` (`id`, `user_id`, `reservation_id`, `fullname`) VALUES
(18, 5, 54, 'souha');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `flight_id` int NOT NULL,
  `flight_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `origin` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `destination` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dep_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `flight_id` (`flight_id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `user_id`, `flight_id`, `flight_type`, `origin`, `destination`, `dep_time`) VALUES
(67, 5, 4, 'Round Trip', 'safi', 'casa', '2022-02-14 11:38:00'),
(69, 5, 8, 'One Way', 'marrakech', 'Tanga', '2022-03-13 23:15:00'),
(62, 11, 4, 'Round Trip', 'safi', 'casa', '2022-02-14 11:38:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `role_u` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `fname`, `username`, `password`, `role_u`) VALUES
(12, 'Admin', 'admin', '$2y$12$XjnZ6zeOpaYF8OdL9YeGxOratj5lRXtP1ydbgUawa/mWONV3bJ0xO', '1'),
(5, 'zineb', 'zineb', '$2y$12$3KK5p/SeVkxqM5iO4UVbiew/vCGwnIQlwwTUXOOdRwE0cnEINj28W', '0'),
(11, 'abou', 'abou', '$2y$12$fO4g4Q2aY3WiIj.9XnBV9..SHywqjkvVUmb0ORXMKgr9RST1SdLYe', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
