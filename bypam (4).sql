-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 20 avr. 2019 à 11:04
-- Version du serveur :  5.7.24
-- Version de PHP :  5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bypam`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `login` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`login`, `mdp`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_template` int(11) NOT NULL,
  `creer_par` varchar(100) NOT NULL,
  `nom` char(100) NOT NULL,
  `categorie` int(11) NOT NULL,
  `logo` text NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `application`
--

INSERT INTO `application` (`id`, `id_template`, `creer_par`, `nom`, `categorie`, `logo`, `date_creation`, `date_modification`) VALUES
(12, 1, 'drakula', 'cabinet medecin dentaire', 1, '29adfef696f5753c2a9b83e06ef59e08.png', '2019-03-29', '2019-04-02'),
(13, 1, 'drakula', 'NIKE', 1, 'ea5bf1b74e5af8fafddf3a2e2014e7e0.jpg', '2019-03-30', '2019-04-17'),
(11, 0, 'drakula', 'HA', 3, '5cc45630ef2a0e9e130a1a5c2d1bc6e2.png', '2019-03-30', '2019-03-30'),
(14, 2, 'drakula', 'Adidas', 1, 'a75821ed675a81631679c3d86310e9b2.jpg', '2019-03-30', '2019-04-17'),
(33, 0, 'drakula', 'dhiaa', 1, 'af851bb817c0f0116968028b466e0e5a.jpg', '2019-04-16', '2019-04-16'),
(35, 2, 'drakula', 'aslen', 3, '8cdd18df14fce8e82ba59cd530cbe42e.png', '2019-04-20', '2019-04-20'),
(36, 2, 'drakula', 'azer', 1, '41f8b4e133304500f31ea3a047116aef.png', '2019-04-20', '2019-04-20');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Santé'),
(2, 'Droit et Finance'),
(3, 'Commerce');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_application` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `lien` varchar(100) NOT NULL,
  `ordre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `id_application`, `libelle`, `lien`, `ordre`) VALUES
(1, 12, 'Ajouter patient', 'ajoutpatient', 2),
(2, 12, 'Liste patients', 'listepatient', 3),
(3, 12, 'Gérer RDV', 'gererrdv', 1),
(4, 13, 'Ajouter produit', 'ajoutproduit', 1),
(5, 13, 'Liste produits', 'listeproduit', 2),
(6, 14, 'Ajouter produit', 'ajoutproduit', 1),
(7, 14, 'Liste produits', 'listeproduit', 2),
(8, 14, 'Statistique', 'stat', 3);

-- --------------------------------------------------------

--
-- Structure de la table `template`
--

DROP TABLE IF EXISTS `template`;
CREATE TABLE IF NOT EXISTS `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `template`
--

INSERT INTO `template` (`id`, `id_categorie`, `libelle`, `photo`) VALUES
(1, 1, 'Admin', '11.jpg'),
(2, 1, 'Loggly', '12.png'),
(3, 3, 'Global Risk', '31.png'),
(4, 1, 'Preclinic', '13.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(300) CHARACTER SET utf8 NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `profession` text CHARACTER SET utf8 NOT NULL,
  `telephone` varchar(12) CHARACTER SET utf8 NOT NULL,
  `photo` longtext CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `pass`, `nom`, `prenom`, `email`, `profession`, `telephone`, `photo`) VALUES
(42, 'drakula', 'e4929432', 'aslen', 'guesmi', 'guesmiaslen0@gmail.com', 'Etudiant', '25469872', 'c26fd1bd4aa8e76c39b5d4843f7cb562.jpg'),
(36, 'azer', '9i1g281e', 'guesmi', 'aslen', 'aslen9@hotmail.fr', 'Etudiant', '25478963', 'a3d8f64f6e9804514c3732618b03fcaf.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
