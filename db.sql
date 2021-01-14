-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 15 oct. 2020 à 19:03
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbsitemvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `main_user`
--

DROP TABLE IF EXISTS `main_user`;
CREATE TABLE IF NOT EXISTS `main_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `tel` tinytext NOT NULL,
  `nbrUsers` int(11) NOT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `rank` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `main_user`
--

INSERT INTO `main_user` (`id`, `username`, `password`, `email`, `tel`, `nbrUsers`, `questionnaire_id`, `rank`) VALUES
(13, 'eee', 'eee', '', '', 15, 2, ''),
(12, 'a.moreau', 'amoreau', '', '', 18, 4, ''),
(11, 's.auberger', 'sauberger', '', '', 5, 3, 't2'),
(14, 'y.geny', 'ygeny', '', '', 30, 2, 't1');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` tinytext NOT NULL,
  `questionnaire_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

DROP TABLE IF EXISTS `questionnaire`;
CREATE TABLE IF NOT EXISTS `questionnaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` tinytext NOT NULL,
  `rattachements` text NOT NULL,
  `nombreQuestion` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `nom`, `rattachements`, `nombreQuestion`) VALUES
(1, 'Les patÃ© au patates', '', 0),
(2, 'Les patÃ© au patates', '', 0),
(3, 'aaaa', '', 0),
(4, 'Les potimarons du verger', '', 0),
(7, 'Les bulbes de Francis', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinytext NOT NULL,
  `response` text NOT NULL,
  `positivity` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `second_user`
--

DROP TABLE IF EXISTS `second_user`;
CREATE TABLE IF NOT EXISTS `second_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `main_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `second_user`
--

INSERT INTO `second_user` (`id`, `username`, `password`, `main_user_id`) VALUES
(45, 'vhIFH5JAa1', 'k8fpWmFlhL', 12),
(44, 'idlpZNAsDR', '4OSPmuest0', 12),
(43, 'Bt0izbS8XT', '0Qt9LfXMDz', 12),
(42, 'wzj2cB5M4o', 'A7O6jQNfoH', 12),
(41, 'v4elKJ13y7', '25JehdDbFA', 12),
(40, 'BN1KLvIiR8', 'mvLUY2KN01', 12),
(38, 'yPokH8hnxd', 'R6BXugCIfz', 12),
(39, 'hpFzMmWvwd', '9fMOQ6yAh1', 12),
(36, 'VRasCoeH8B', 'MwH5p9qBeN', 11),
(37, 'Em6eqwNPH8', 'z97fkNwUR5', 12),
(34, 'OHRwdFBsLS', 'NxmAv5hDnO', 11),
(35, 'Uyz7GZnsmb', 'hkEG102J6t', 11),
(32, 'pU96Jdnx2L', 'Kj8ASMvTsJ', 11),
(33, 'C0LI5RsQm6', '7IL4GfR25i', 11),
(30, 'yED40Csckf', 'YCHXzSpPaL', 10),
(31, 'RqxBGwaFYO', 'Kf3lq69R7F', 10),
(28, 'XAeRmuoqPK', 'DfURYAMdVy', 10),
(29, 'p9atlkQD3W', 'm8YnMZV90z', 10),
(26, 'vaeyP9gql8', 'ARljyQ3iov', 10),
(27, 'fRaHi0Ozp5', '4T1m7j8IsF', 10),
(25, '4vH95ZVJi3', 'pHbL5wmkIe', 10),
(46, 'z0GXbhBO7K', 'BDCtdpksaX', 12),
(47, 'EKOSDhZ5oq', 'mPWnA03xG4', 12),
(48, 'KXxHIp5Foa', '2MHUB5XaEA', 12),
(49, 'OBNkGj9p5A', 'ZBAwK9ea7W', 12),
(50, 'f0oKTBV7M3', 'Zml0SajOG2', 12),
(51, 'sPuIHeJq2R', 'w6zqaNtJfb', 12),
(52, 'ltgZKjomic', '2R3HXw4JVt', 12),
(53, 'kDyJlR2Eed', 'ig1XWIVoGT', 12),
(54, 'GnSTt5j4la', 'yADUjlrd0m', 12),
(55, 'qMTDWrZI3V', 'rP62aKWusD', 13),
(56, '2fHGqJgk5m', 'EkZK4mNHxM', 13),
(57, 'pQIterOVkj', 'Dj8kXzPCVt', 13),
(58, 'Huyh6bvm4X', 'HA2srCezUP', 13),
(59, '381cVfTlUn', 'YA0cKHvdxE', 13),
(60, '4h3pD6R1JQ', '16BVzisUIn', 13),
(61, '284Bc9TI6R', 'k8CFJxDsrS', 13),
(62, 'gmnzkqLoVa', 'u8bN2PJXnZ', 13),
(63, 'v0ZsplJTAd', 'Mjt1f3AZYF', 13),
(64, 'LNdkmwACE2', 'OuATUt6CrI', 13),
(65, 'JQpkRqDnZ2', '0xfoQtL6Mn', 13),
(66, 'GbktPxZsTC', 'p8LjS6ZlJT', 13),
(67, 'G0HXnjIdtF', 'XNcY1EGgCB', 13),
(68, 'n2lcofYeE5', '8JupOQVKl4', 13),
(69, '06pW9X3Mwc', 'MC4vpi0nyT', 13),
(70, 'toBdbu5O7k', 'ret2f3nIEQ', 14),
(71, '4Dz16GM5wJ', '5eMirApFsh', 14),
(72, 'uSm5cJwV0T', 'oCgj5YxThW', 14),
(73, '0wHkVIyfgl', 'sHVEoSuKBa', 14),
(74, 'yO5cLVFSY8', 'wyjtRqJPFd', 14),
(75, 'RrcwXeS9aQ', 'JBhLf5ASqU', 14),
(76, 'Pu9e4A5pUb', '1cjEFyOhUZ', 14),
(77, 'zoHvOiBmJw', 'u4xeFqrCop', 14),
(78, 'hvAtT1Lwil', 'dteDJBa42Z', 14),
(79, 'cBqJnFdVjX', '5vkFeR0MoP', 14),
(80, 'hI8ESCGt0M', '0ftLzsl2id', 14),
(81, '4aAeSWZbG7', 'QPxbYa82EJ', 14),
(82, 'reV5UYD6OQ', 'aFZsoG0PbN', 14),
(83, '0DNenWjmlb', 'OUbTaqli9d', 14),
(84, '34pP2yEeJQ', 'IZaQ4zjldi', 14),
(85, 'LuSmN0UTM2', 'JF4I2b5D1E', 14),
(86, 'JqT5oOHZxh', 'PGqcMUdzES', 14),
(87, 'MAzHxRoLhS', 'etWqKMgpzV', 14),
(88, 'iMH9ektgdA', 'muj9y25k6O', 14),
(89, 'fIXMKejtH6', '5CSXnuxK3V', 14),
(90, 'dMzlTXfcg7', 'Z0Q23tUGud', 14),
(91, 'Ewn5fXaR38', 'v3j2qA5eVY', 14),
(92, 'PS3JiVLhvj', 'IUXPeSuc7Y', 14),
(93, 'vBz0PdC7x8', 'X6M4sbSip7', 14),
(94, '7THpy5JtGu', 'Jhiom8EBPr', 14),
(95, 'wJ28pcKam4', '6P0EUwh2Sl', 14),
(96, 'E1tToUIvW2', '8eyM5fgUZ3', 14),
(97, 'wIY1U3T5ER', 'ElNtoes0VJ', 14),
(98, 'Ui6FvwpBrs', 'ovx7846yPY', 14),
(99, 'IDQbWHt3je', 'a2hzVbLKXf', 14);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
