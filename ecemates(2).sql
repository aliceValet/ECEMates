-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 05 mai 2018 à 12:22
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecemates`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

DROP TABLE IF EXISTS `acteur`;
CREATE TABLE IF NOT EXISTS `acteur` (
  `Pseudo_ac` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `pdp` varchar(255) NOT NULL,
  `Année_fonction` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acteur`
--

INSERT INTO `acteur` (`Pseudo_ac`, `email`, `Nom`, `Prenom`, `pdp`, `Année_fonction`, `id`) VALUES
('Batman', 'luc.branco@edu.ece.fr', 'Branco', 'Luc', 'logo.png', '3 ème', 1),
('aliceValet', 'alice.valet@edu.ece.fr', 'Valet', 'Alice', 'pdp.png', '3 ème', 2);

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `Pseudo_ad` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `E-mail` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`Pseudo_ad`, `Nom`, `Prenom`, `E-mail`) VALUES
('Admin', 'Segado', 'JP', 'jeanpierre.segado@edu.ece.fr'),
('Admin1', 'Hina', 'Manolo', 'manolo.hina@edu.ece.fr');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaires` text NOT NULL,
  `id_evenement` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `commentaires`, `id_evenement`) VALUES
(1, 'super', 1);

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`id`, `contenu`) VALUES
(1, 'Un crash de fusée'),
(2, 'Real en final'),
(3, 'Une marmotte qui se reveille');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mail`, `motdepasse`, `avatar`) VALUES
(1, 'pm', 'mail@hotmail.fr', 'poipo', ''),
(2, 'luc', 'mail1@hotmail.fr', 'a00191c823794a7fbb694b85131353f26b509f98', ''),
(3, 'luc1', 'mailpo@hotmail.fr', '58061aa544398a798e33181a443b15b7746fab16', ''),
(4, 'Clara', 'clara@hotmail.fr', 'ef781432b4a064adc112a5ff28aea85959e17e3a', ''),
(5, 'oula', 'oula@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', ''),
(6, 'delphine', 'manolo@gmail.com', '7b52009b64fd0a2a49e6d8a939753077792b0554', '6.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `photos_videos`
--

DROP TABLE IF EXISTS `photos_videos`;
CREATE TABLE IF NOT EXISTS `photos_videos` (
  `Date` date NOT NULL,
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `Lieu` varchar(255) NOT NULL,
  `Heure` int(11) NOT NULL,
  `Album` varchar(255) NOT NULL,
  `ParmètreConfidentialité` varchar(255) NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photos_videos`
--

INSERT INTO `photos_videos` (`Date`, `id_photo`, `Lieu`, `Heure`, `Album`, `ParmètreConfidentialité`) VALUES
('2018-05-09', 1, 'Paris', 23, 'Vacances', 'Public');

-- --------------------------------------------------------

--
-- Structure de la table `reseau`
--

DROP TABLE IF EXISTS `reseau`;
CREATE TABLE IF NOT EXISTS `reseau` (
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Contact_pro` tinyint(1) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `ID_reseau` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_reseau`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reseau`
--

INSERT INTO `reseau` (`Nom`, `Prenom`, `Contact_pro`, `mail`, `ID_reseau`) VALUES
('carol', 'aheds', 1, 'mail@hdk.fr', 1),
('Franco', 'cloé', 0, 'pomioer@hotmail.fr', 2),
('pool', 'pauline', 1, 'pom@hotmail.fr', 3),
('Clhoeee', 'ljejf', 1, 'pompom@hotmail.fr', 4),
('Manolo', 'Luki', 1, 'luki@hotmal.fr', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
