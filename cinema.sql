-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 11 Juillet 2014 à 10:13
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'action'),
(2, 'science-fiction'),
(3, 'animation'),
(4, 'drama'),
(5, 'comedie'),
(6, 'horeur');

-- --------------------------------------------------------

--
-- Structure de la table `liaison`
--

CREATE TABLE IF NOT EXISTS `liaison` (
  `user_id` int(11) NOT NULL,
  `movies_id` int(11) NOT NULL,
  `liked` int(11) NOT NULL,
  `watched` int(11) NOT NULL,
  `watchlist` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `liaison`
--

INSERT INTO `liaison` (`user_id`, `movies_id`, `liked`, `watched`, `watchlist`) VALUES
(5, 3, 1, 1, NULL),
(7, 4, 1, 0, NULL),
(8, 5, 0, 0, NULL),
(9, 7, 0, 1, NULL),
(11, 8, 1, 0, NULL),
(5, 4, 1, 1, NULL),
(12, 7, 1, 1, NULL),
(12, 8, 1, 1, NULL),
(13, 3, 1, 1, NULL),
(13, 3, 1, 1, NULL),
(13, 3, 1, 1, NULL),
(13, 3, 0, 1, NULL),
(5, 8, 0, 1, NULL),
(5, 5, 0, 1, 1),
(5, 6, 0, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `cover` text NOT NULL,
  `genre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `cover`, `genre`) VALUES
(3, 'Fight Club', 'Dat cover', 3),
(4, 'Le Prestige', 'Dat cover', 4),
(5, 'Memento', 'Dat cover', 5),
(7, 'Star wars', 'No cover', 7),
(8, 'Dragons 2', 'No cover', 25);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`) VALUES
(5, 'Axel'),
(7, 'Jean-baptou Fragile'),
(8, 'Julien'),
(9, 'Quentin'),
(11, 'Patrik'),
(12, 'baptiste'),
(13, 'Karine'),
(14, 'PascalLaDalle'),
(15, 'RomainTuCraint'),
(16, 'Romai'),
(17, 'Gaston'),
(18, 'Gaston'),
(19, 'Gaston'),
(20, 'Gaston');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
