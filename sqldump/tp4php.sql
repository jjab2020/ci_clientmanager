-- 

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `tp4php`
--
CREATE DATABASE IF NOT EXISTS `tp4php` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tp4php`;

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE IF NOT EXISTS `Categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `Categorie`
--

INSERT INTO `Categorie` (`idCategorie`, `nomCategorie`) VALUES
(1, 'Informatique'),
(2, 'Livres'),
(3, 'Logiciels');

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE IF NOT EXISTS `Client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(45) DEFAULT NULL,
  `prenomClient` varchar(45) DEFAULT NULL,
  `ageClient` varchar(45) DEFAULT NULL,
  `courrielClient` varchar(45) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `idVille` int(11) NOT NULL,
  PRIMARY KEY (`idClient`),
  KEY `fk_Client_Ville1_idx` (`idVille`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Client`
--

INSERT INTO `Client` (`idClient`, `nomClient`, `prenomClient`, `ageClient`, `courrielClient`, `adresse`, `idVille`) VALUES
(1, 'Rodriguez', 'Bender', '80', 'bender@mail.com', '123, rue Verte', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Facture`
--

CREATE TABLE IF NOT EXISTS `Facture` (
  `idFacture` int(11) NOT NULL AUTO_INCREMENT,
  `dateFacture` date DEFAULT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idFacture`),
  KEY `fk_Achat_Client1_idx` (`idClient`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Facture`
--

INSERT INTO `Facture` (`idFacture`, `dateFacture`, `idClient`) VALUES
(1, '2014-05-05', 1);

-- --------------------------------------------------------

--
-- Structure de la table `LigneFacture`
--

CREATE TABLE IF NOT EXISTS `LigneFacture` (
  `idLigneFacture` int(11) NOT NULL AUTO_INCREMENT,
  `idFacture` int(11) NOT NULL,
  `quantiteAchat` varchar(45) DEFAULT NULL,
  `codeArticle` varchar(5) NOT NULL,
  PRIMARY KEY (`idLigneFacture`,`idFacture`),
  KEY `fk_LigneFacture_Produit1_idx` (`codeArticle`),
  KEY `fk_LigneFacture_Facture1_idx` (`idFacture`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `LigneFacture`
--

INSERT INTO `LigneFacture` (`idLigneFacture`, `idFacture`, `quantiteAchat`, `codeArticle`) VALUES
(1, 1, '2', 'WIN81'),
(2, 1, '3', 'INW33');

-- --------------------------------------------------------

--
-- Structure de la table `Produit`
--

CREATE TABLE IF NOT EXISTS `Produit` (
  `codeArticle` varchar(5) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `quantite` varchar(45) DEFAULT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`codeArticle`),
  KEY `fk_Produit_Categorie1_idx` (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Produit`
--

INSERT INTO `Produit` (`codeArticle`, `description`, `prix`, `quantite`, `idCategorie`) VALUES
('IBM70', 'Ordinateur IBM-7000', 990, '11', 1),
('INW33', 'Installation Windows 8.1', 35, '23', 2),
('WIN81', 'Windows 8.1', 350, '15', 3);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE IF NOT EXISTS `Utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `motdepasse` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `nom`, `motdepasse`) VALUES
(1, 'François', '$2a$10$C9DnqTwh4zMYHAhgVlqJNuiuoJodiasxKWUQUPdw3Tt9sFh2T6CUe');

-- --------------------------------------------------------

--
-- Structure de la table `Ville`
--

CREATE TABLE IF NOT EXISTS `Ville` (
  `idVille` int(11) NOT NULL AUTO_INCREMENT,
  `nomVille` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idVille`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `Ville`
--

INSERT INTO `Ville` (`idVille`, `nomVille`) VALUES
(1, 'Québec'),
(2, 'Montreal'),
(3, 'Gatineau');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Client`
--
ALTER TABLE `Client`
  ADD CONSTRAINT `fk_Client_Ville1` FOREIGN KEY (`idVille`) REFERENCES `Ville` (`idVille`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Facture`
--
ALTER TABLE `Facture`
  ADD CONSTRAINT `fk_Achat_Client1` FOREIGN KEY (`idClient`) REFERENCES `Client` (`idClient`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `LigneFacture`
--
ALTER TABLE `LigneFacture`
  ADD CONSTRAINT `fk_LigneFacture_Facture1` FOREIGN KEY (`idFacture`) REFERENCES `Facture` (`idFacture`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_LigneFacture_Produit1` FOREIGN KEY (`codeArticle`) REFERENCES `Produit` (`codeArticle`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Produit`
--
ALTER TABLE `Produit`
  ADD CONSTRAINT `fk_Produit_Categorie1` FOREIGN KEY (`idCategorie`) REFERENCES `Categorie` (`idCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

