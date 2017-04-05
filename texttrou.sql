-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Mer 05 Avril 2017 à 09:23
-- Version du serveur :  5.5.49-log
-- Version de PHP :  7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `texttrou`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(6) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `exo` text NOT NULL,
  `reponse01` text NOT NULL,
  `reponse2` text NOT NULL,
  `reponse3` text NOT NULL,
  `reponse` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `titre`, `exo`, `reponse01`, `reponse2`, `reponse3`, `reponse`) VALUES
(1, 'Ceci est l''exercice 1', 'Exercice 1', 'La reponse 1', 'La reponse 2', 'La repose 3', 'reponse2'),
(2, 'Ceci est l''exercice 2', 'Exercice 2', 'La reponse 1', 'La reponse 2', 'La repose 3', 'reponse01');

-- --------------------------------------------------------

--
-- Structure de la table `choix`
--

CREATE TABLE IF NOT EXISTS `choix` (
  `id` int(11) NOT NULL,
  `id_scrollBarr` int(11) NOT NULL,
  `choix` varchar(255) NOT NULL,
  `id_ex` int(11) NOT NULL,
  `answer` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `choix`
--

INSERT INTO `choix` (`id`, `id_scrollBarr`, `choix`, `id_ex`, `answer`) VALUES
(1, 1, 'Choix 1 SB 1 Ex1', 1, 'true'),
(2, 1, 'Choix 2 SB 1 Ex1', 1, 'false'),
(3, 2, 'Choix 1 SB 1 Ex2', 2, 'false'),
(4, 2, 'Choix 2 SB 1 Ex2', 2, 'false'),
(5, 2, 'Choix 3 SB 1 Ex2', 2, 'true'),
(6, 3, 'Choix 1 SB 2 Ex2', 2, 'false'),
(7, 3, 'Choix 2 SB 2 Ex 2', 2, 'true'),
(8, 3, 'Choix 3 SB 2 Ex 2', 2, 'false');

-- --------------------------------------------------------

--
-- Structure de la table `exercice`
--

CREATE TABLE IF NOT EXISTS `exercice` (
  `id` int(11) NOT NULL,
  `titreEx` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `exercice`
--

INSERT INTO `exercice` (`id`, `titreEx`) VALUES
(1, 'Exercice 1'),
(2, 'Exercice 2');

-- --------------------------------------------------------

--
-- Structure de la table `indice`
--

CREATE TABLE IF NOT EXISTS `indice` (
  `id` int(11) NOT NULL,
  `id_exercice` int(11) NOT NULL,
  `indice` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `indice`
--

INSERT INTO `indice` (`id`, `id_exercice`, `indice`) VALUES
(1, 1, 'Indice 1 Exercice 1'),
(2, 1, 'Indice 2 Exercice 1'),
(3, 2, 'Indice 1 Exercice 2'),
(4, 2, 'Indice 2 Exercice 2'),
(5, 2, 'Indice 3 Exercice 2');

-- --------------------------------------------------------

--
-- Structure de la table `scrollbarr`
--

CREATE TABLE IF NOT EXISTS `scrollbarr` (
  `id` int(11) NOT NULL,
  `id_exercic` int(11) NOT NULL,
  `titreScroll` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `scrollbarr`
--

INSERT INTO `scrollbarr` (`id`, `id_exercic`, `titreScroll`) VALUES
(1, 1, 'Scroll Barr 1 Exercice 1'),
(2, 2, 'Scroll Barr 1 Exercice 2'),
(3, 2, 'Scroll Barr 2 Exercice 2');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `choix`
--
ALTER TABLE `choix`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_scrollBarr` (`id_scrollBarr`),
  ADD KEY `fk_ex` (`id_ex`);

--
-- Index pour la table `exercice`
--
ALTER TABLE `exercice`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `indice`
--
ALTER TABLE `indice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_exercice` (`id_exercice`);

--
-- Index pour la table `scrollbarr`
--
ALTER TABLE `scrollbarr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_exercic` (`id_exercic`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `choix`
--
ALTER TABLE `choix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `exercice`
--
ALTER TABLE `exercice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `indice`
--
ALTER TABLE `indice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `scrollbarr`
--
ALTER TABLE `scrollbarr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `choix`
--
ALTER TABLE `choix`
  ADD CONSTRAINT `fk_ex` FOREIGN KEY (`id_ex`) REFERENCES `exercice` (`id`),
  ADD CONSTRAINT `fk_scrollBarr` FOREIGN KEY (`id_scrollBarr`) REFERENCES `scrollbarr` (`id`);

--
-- Contraintes pour la table `indice`
--
ALTER TABLE `indice`
  ADD CONSTRAINT `fk_exercice` FOREIGN KEY (`id_exercice`) REFERENCES `exercice` (`id`);

--
-- Contraintes pour la table `scrollbarr`
--
ALTER TABLE `scrollbarr`
  ADD CONSTRAINT `fk_exercic` FOREIGN KEY (`id_exercic`) REFERENCES `exercice` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
