-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 19 Mars 2019 à 16:41
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `direct_prod`
--

-- --------------------------------------------------------

--
-- Structure de la table `advertisements`
--

CREATE TABLE IF NOT EXISTS `advertisements` (
  `idAdvertisement` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `organic` tinyint(1) NOT NULL,
  `valid` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idAdvertisement`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `advertisements`
--

INSERT INTO `advertisements` (`idAdvertisement`, `title`, `description`, `organic`, `valid`, `date`, `idUser`) VALUES
(1, 'Je vend mon canard', 'Godefroid mon canard a 3 ans, couleur blanc tirant sur le gris, bec jaune avec trou.', 1, 1, '2019-03-19 15:24:22', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `idPicture` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`idPicture`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `canton` varchar(50) NOT NULL,
  `postCode` varchar(20) NOT NULL,
  `streetAndNumber` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `salt` varchar(50) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `password`, `email`, `name`, `city`, `canton`, `postCode`, `streetAndNumber`, `admin`, `description`, `salt`) VALUES
(1, '1234', 'romain.prtt@eduge.ch', 'Rorobocop', 'Confignon', 'Genève', '1232', '14, Rue Joseph-Berthet', 0, 'J''aime faire du scratch parce que grâce à ce programme je me prends pour un vrai informaticien.', '1234');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `advertisements_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
