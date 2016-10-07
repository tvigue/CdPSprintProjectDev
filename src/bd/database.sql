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
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet_cdp2016_acv`
--

/* La ligne suivante est à décommenter seulement et seulement si la bdd "projet_cdp2016_acv" n'existe pas encore sur votre serveur car le script pourra ainsi la créer. */
-- CREATE DATABASE `projet_cdp2016_acv`;
USE `projet_cdp2016_acv`;

-- --------------------------------------------------------

--
-- Structure de la table `ateliers`
--

CREATE TABLE `Ateliers` (
  `id_atelier` int(11) NOT NULL,
  `nom_atelier` varchar(100) DEFAULT NULL,
  `theme_atelier` varchar(100) DEFAULT NULL,
  `type_atelier` varchar(100) DEFAULT NULL,
  `id_laboratoire` int(11) NOT NULL,
  `lieu_atelier` varchar(100) DEFAULT NULL,
  `duree_atelier` time DEFAULT NULL,
  `date_atelier` date DEFAULT NULL,
  `horaire_atelier` time DEFAULT NULL,
  `capacite_atelier` int(11) DEFAULT NULL,
  `inscription_atelier` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `ateliers`
--

TRUNCATE TABLE `Ateliers`;

--
-- Contenu de la table `ateliers`
--

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ateliers`
--
ALTER TABLE `Ateliers`
  ADD PRIMARY KEY (`id_atelier`);

--
-- AUTO_INCREMENT pour la table `ateliers`
--
ALTER TABLE `Ateliers`
  MODIFY `id_atelier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
