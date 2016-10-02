-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 02 Octobre 2016 à 11:52
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `project`
--

-- --------------------------------------------------------

--
-- Structure de la table `ateliers`
--

CREATE TABLE `ateliers` (
  `id_atelier` int(11) NOT NULL,
  `name_atelier` varchar(100) DEFAULT NULL,
  `theme_atelier` varchar(100) DEFAULT NULL,
  `type_atelier` varchar(100) DEFAULT NULL,
  `id_laboratoire` int(11) NOT NULL,
  `lieu_atelier` varchar(100) DEFAULT NULL,
  `duree_atelier` time DEFAULT NULL,
  `date_atelier` date DEFAULT NULL,
  `horaire_atelier` time DEFAULT NULL,
  `capacite` int(11) DEFAULT NULL,
  `inscription` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ateliers`
--

INSERT INTO `ateliers` (`id_atelier`, `name_atelier`, `theme_atelier`, `type_atelier`, `id_laboratoire`, `lieu_atelier`, `duree_atelier`, `date_atelier`, `horaire_atelier`, `capacite`, `inscription`) VALUES
(0, 'azer', 'azert', 'Test', 1, 'Paris', '23:59:00', '2016-12-31', '23:59:00', 1, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ateliers`
--
ALTER TABLE `ateliers`
  ADD PRIMARY KEY (`id_atelier`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
