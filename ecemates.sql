-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 03 mai 2018 à 19:54
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
  `Année_fonction` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acteur`
--

INSERT INTO `acteur` (`Pseudo_ac`, `email`, `Nom`, `Prenom`, `pdp`, `Année_fonction`) VALUES
('Batman', 'luc.branco@edu.ece.fr', 'Branco', 'Luc', 'logo.png', '3 ème'),
('aliceValet', 'alice.valet@edu.ece.fr', 'Valet', 'Alice', 'pdp.png', '3 ème');

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
-- Structure de la table `amis`
--

DROP TABLE IF EXISTS `amis`;
CREATE TABLE IF NOT EXISTS `amis` (
  `PseudoAmis` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photoProfil` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `imageFond` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL,
  `contenu` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `pseudo`, `commentaire`, `id_article`) VALUES
(1, 'ok', 'ok', 1),
(2, 'alice', 'je vais bien', 1);

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `e-mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`e-mail`, `password`) VALUES
('luc.branco@edu.ece.fr', 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `contactpro`
--

DROP TABLE IF EXISTS `contactpro`;
CREATE TABLE IF NOT EXISTS `contactpro` (
  `PseudoContactPro` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photoProfil` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `ImageFond` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `emplois`
--

DROP TABLE IF EXISTS `emplois`;
CREATE TABLE IF NOT EXISTS `emplois` (
  `idEmplois` int(11) NOT NULL AUTO_INCREMENT,
  `nomEntreprise` varchar(255) NOT NULL,
  `NomPoste` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`idEmplois`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `idEvent` int(11) NOT NULL AUTO_INCREMENT,
  `PhotoVideo` varchar(255) NOT NULL,
  `CV` varchar(255) NOT NULL,
  `sentiment` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`idEvent`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `Date` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `Visualisation` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `imaged` varchar(255) NOT NULL,
  PRIMARY KEY (`imaged`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`imaged`) VALUES
('C:\\Users\\cfran\\Documents/image1.jpg');

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
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photos_videos`
--

INSERT INTO `photos_videos` (`Date`, `id_photo`, `Lieu`, `Heure`, `Album`, `ParmètreConfidentialité`, `image`) VALUES
('2018-05-09', 1, 'Paris', 23, 'Vacances', 'Public', '');

-- --------------------------------------------------------

--
-- Structure de la table `reseau`
--

DROP TABLE IF EXISTS `reseau`;
CREATE TABLE IF NOT EXISTS `reseau` (
  `pseudoAmis` varchar(255) NOT NULL,
  `pseudoContactPro` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
