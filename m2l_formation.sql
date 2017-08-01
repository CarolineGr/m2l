-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 01 Août 2017 à 13:03
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `m2l_formation`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `idAdmin` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `mdp` text CHARACTER SET utf8 COLLATE utf8_bin,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `administrateur`
--


-- --------------------------------------------------------

--
-- Structure de la table `association`
--

CREATE TABLE `association` (
  `idAssociation` int(11) NOT NULL,
  `nom` text,
  `adresse` text,
  `codePostal` text,
  `tel` text,
  `email` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `association`
--

INSERT INTO `association` (`idAssociation`, `nom`, `adresse`, `codePostal`, `tel`, `email`) VALUES
(1, 'Association Sportive du 54', '2, allée des aviateurs \r\n', '54000', '0322456789', 'as54@gmail.com'),
(2, 'Cercle Hippique de Nancy', 'domaine de Pixérécourt', '54220', '0389765435', 'chnp@gmail.com'),
(3, 'Ecole d\'équitation du Parc de Haye', '2, allée des aviateurs \r\n', '54000', '0322456789', 'eeph@gmail.com'),
(4, 'Poney Club les P\'tit Loups ', 'chemin du réservoir ', '54113', '0389765435', 'pclpl@gmail.com'),
(5, 'Ecole Française de Parachutisme de Moselle', 'aérodrome Doncourt ', '54800', '0345678904', 'efpm@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `idFormation` int(11) NOT NULL,
  `titre` text,
  `descriptif` text,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`idFormation`, `titre`, `descriptif`, `image`) VALUES
(1, 'Traumatologie du Sport', 'Le genou : Rupture des ligaments ', '6.jpg'),
(2, 'Entrainement des futures élites', 'Comment détecter les futures élites dans les clubs et associations. Comment les prendre en charge efficacement. ', '5.jpg'),
(3, 'Président d\'association : les droits et devoirs ', 'Comment gérer son association, questions de législation, obligations, etc. ', '7.jpg'),
(4, 'Psychologue Sportif et préparateur mental ', 'Vous êtes un professionnel en relation avec les sportifs, developpez vos compétences en psychologie du sport et de préparateur mental avec notre formation.', '8.jpg'),
(5, 'Préparateur Physique', 'Il est en charge du développement des qualités physiques, de l\'endurance, ...', '9.jpg'),
(6, 'Alimentation du sportif', 'Notions de base - Régimes adaptés à la compétition : Préparation, période d\'effort, récupération.', '10.jpg'),
(7, 'Conduites addictives (Les dépendances)', 'Quelles conduites à tenir auprès du pratiquant sportif.', '11.jpg'),
(8, 'Éducateur sportif des métiers de la forme', 'Comment devenir un éducateur sportif des métiers de la forme ?', '12.jpg'),
(9, 'Organisateur d\'évènements sportifs', 'Comment coordonner, planifier, budgétiser et contrôler...', '13.jpg'),
(10, 'Les sponsors, comment ça marche ?', 'Comment ? Qui ? Intérêt ? etc...', 'default.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `idPersonne` int(11) NOT NULL,
  `idSession` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- Structure de la table `intervenant`
--

CREATE TABLE `intervenant` (
  `idIntervenant` int(11) NOT NULL,
  `nom` text,
  `prenom` text,
  `titre` text,
  `adresse` text,
  `codePostal` text,
  `email` text,
  `tel` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `intervenant`
--

INSERT INTO `intervenant` (`idIntervenant`, `nom`, `prenom`, `titre`, `adresse`, `codePostal`, `email`, `tel`) VALUES
(1, 'TORIN ', 'Pierre', 'BE1', '2, allée Emile Zola ', '54000', 'pierre.morin@gmail.com', '0678905432'),
(2, 'LELANDAIS ', 'Carine ', 'Medecin du Sport', '4, rue des aviateurs ', '54800', 'carine.lelandais@gmail.com', '0678456324'),
(3, 'MARTINEZ', 'Véronique ', 'BE1', '78, allée des roses', '54660', 'veronique.martinez@gmail.com', '0678905432'),
(4, 'DUPUIS ', 'Robert', 'Medecin du Sport', 'impasse du grand hêtre', '54100', 'robert.dupuis@gmail.com', '0678456324'),
(5, 'POISSON', 'Jeanne', 'Marquise', 'Avenue du Chateau', '67000', 'pompadour@hotmail.fr', '0987654321'),
(6, 'DUBOIS', 'Jean', 'Maître', '45 chemin des Lilas', '54800', 'jean@hotmail.fr', '0987654321'),
(7, 'DUBATON', 'Brigitte', 'MME', '78 rue du Mouvement', '54500', 'brig@gmail.com', '0987654321'),
(8, 'DUJARDIN', 'Yvette', 'MME', '1 impasse du Passage', '67450', 'vyvy@aol.com', '09898989898'),
(9, 'TUDOR', 'Henri', 'M', '1 rue du Chateau', '54100', 'roi@aol.uk', '0897867564'),
(11, 'DUPRE', 'Hubert', 'M', '78 rue du Silence', '54500', 'brig@gmail.com', '0987654321'),
(15, 'NGO', 'Timothée', 'sir', 'impasse du Fort', '34200', 'hgy@hyu.com', '08976543215');

-- --------------------------------------------------------

--
-- Structure de la table `personnelassociatif`
--

CREATE TABLE `personnelassociatif` (
  `idPersonne` int(11) NOT NULL,
  `login` text,
  `mdp` text,
  `adresse` text,
  `email` text,
  `nom` text,
  `prenom` text,
  `tel` text,
  `codePostal` text,
  `fonction` enum('président','trésorier','secrétaire','encadrant','comptable','autre') DEFAULT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '1',
  `idAssociation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personnelassociatif`
--


-- --------------------------------------------------------

--
-- Structure de la table `sessionformation`
--

CREATE TABLE `sessionformation` (
  `idSession` int(11) NOT NULL,
  `idFormation` int(11) DEFAULT NULL,
  `idIntervenant` int(11) DEFAULT NULL,
  `dateLimiteInsc` datetime DEFAULT NULL,
  `dateDebut` datetime NOT NULL,
  `dateFin` datetime NOT NULL,
  `salle` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sessionformation`
--

INSERT INTO `sessionformation` (`idSession`, `idFormation`, `idIntervenant`, `dateLimiteInsc`, `dateDebut`, `dateFin`, `salle`) VALUES
(1, 1, 1, '2018-09-18 23:59:59', '2018-10-02 21:00:00', '2018-10-02 23:00:00', 'Majorelle'),
(2, 1, 1, '2018-04-02 23:59:59', '2018-04-12 09:00:00', '2018-04-12 12:30:00', 'Lamour'),
(3, 2, 2, '2018-06-09 23:59:59', '2018-06-23 20:00:00', '2018-06-23 22:30:00', 'Longwy'),
(4, 2, 2, '2018-05-02 23:59:59', '2018-05-13 10:00:00', '2018-05-14 16:00:00', 'Longwy'),
(5, 3, 3, '2018-05-30 23:59:59', '2018-06-05 20:00:00', '2018-06-05 22:00:00', 'Corbin'),
(6, 3, 2, '2018-04-10 23:59:59', '2018-04-24 09:00:00', '2018-04-25 17:00:00', 'Corbin'),
(7, 4, 3, '2018-05-18 23:59:59', '2018-05-25 09:00:00', '2018-05-25 18:00:00', 'Gallé'),
(8, 4, 3, '2018-02-25 23:59:59', '2018-02-06 14:00:00', '2018-02-06 17:00:00', 'Daun'),
(9, 5, 4, '2018-02-02 23:59:59', '2018-02-16 09:00:00', '2018-02-16 18:00:00', 'Grüber '),
(10, 5, 4, '2018-06-12 23:59:59', '2018-06-26 09:00:00', '2018-06-26 18:00:00', 'Baccarat'),
(11, 6, 3, '2018-03-28 23:59:59', '2018-04-04 19:00:00', '2018-04-04 21:00:00', 'Longwy'),
(12, 6, 3, '2018-06-07 23:59:59', '2018-06-14 21:00:00', '2018-06-14 23:00:00', 'Longwy'),
(13, 7, 1, '2018-04-07 23:59:59', '2018-04-14 10:00:00', '2018-04-15 15:00:00', 'Grüber'),
(14, 7, 1, '2018-06-17 23:59:59', '2018-06-24 10:00:00', '2018-06-25 15:00:00', 'Grüber'),
(15, 8, 4, '2018-07-05 23:59:59', '2018-07-10 09:00:00', '2018-07-10 17:00:00', 'Gallé'),
(16, 8, 4, '2018-01-31 23:59:59', '2018-02-07 10:00:00', '2018-02-07 17:00:00', 'Daun'),
(17, 9, 1, '2018-07-12 23:59:59', '2018-07-18 20:30:00', '2018-07-18 22:30:00', 'Daun'),
(18, 9, 1, '2018-01-01 23:59:59', '2018-01-08 20:00:00', '2018-01-08 22:00:00', 'Lamour'),
(19, 2, 8, '2018-04-07 23:59:59', '2018-04-15 15:15:00', '2018-04-15 16:15:00', 'Baccarat'),
(20, 5, 6, '2018-04-26 23:59:59', '2018-05-02 20:30:00', '2018-05-02 23:00:00', 'Corbin'),
(21, 5, 9, '2018-05-01 23:59:59', '2018-05-06 20:00:00', '2018-05-06 22:00:00', 'Gallé'),
(22, 7, 7, '2018-05-15 23:59:59', '2018-05-22 18:00:00', '2018-05-22 20:00:00', 'Gallé');

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `idTag` int(11) NOT NULL,
  `libelle` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `idTag` int(11) NOT NULL,
  `idFormation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Index pour la table `association`
--
ALTER TABLE `association`
  ADD PRIMARY KEY (`idAssociation`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`idFormation`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`idPersonne`,`idSession`),
  ADD KEY `idSession` (`idSession`);

--
-- Index pour la table `intervenant`
--
ALTER TABLE `intervenant`
  ADD PRIMARY KEY (`idIntervenant`);

--
-- Index pour la table `personnelassociatif`
--
ALTER TABLE `personnelassociatif`
  ADD PRIMARY KEY (`idPersonne`),
  ADD KEY `idAssociation` (`idAssociation`);

--
-- Index pour la table `sessionformation`
--
ALTER TABLE `sessionformation`
  ADD PRIMARY KEY (`idSession`),
  ADD KEY `idFormation` (`idFormation`),
  ADD KEY `idIntervenant` (`idIntervenant`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`idTag`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`idTag`,`idFormation`),
  ADD KEY `idFormation` (`idFormation`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `association`
--
ALTER TABLE `association`
  MODIFY `idAssociation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `idFormation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `intervenant`
--
ALTER TABLE `intervenant`
  MODIFY `idIntervenant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `personnelassociatif`
--
ALTER TABLE `personnelassociatif`
  MODIFY `idPersonne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `sessionformation`
--
ALTER TABLE `sessionformation`
  MODIFY `idSession` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `idTag` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `Inscription_ibfk_1` FOREIGN KEY (`idPersonne`) REFERENCES `personnelassociatif` (`idPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Inscription_ibfk_2` FOREIGN KEY (`idSession`) REFERENCES `sessionformation` (`idSession`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `personnelassociatif`
--
ALTER TABLE `personnelassociatif`
  ADD CONSTRAINT `PersonnelAssociatif_ibfk_1` FOREIGN KEY (`idAssociation`) REFERENCES `association` (`idAssociation`);

--
-- Contraintes pour la table `sessionformation`
--
ALTER TABLE `sessionformation`
  ADD CONSTRAINT `SessionFormation_ibfk_1` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`idFormation`),
  ADD CONSTRAINT `SessionFormation_ibfk_2` FOREIGN KEY (`idIntervenant`) REFERENCES `intervenant` (`idIntervenant`);

--
-- Contraintes pour la table `theme`
--
ALTER TABLE `theme`
  ADD CONSTRAINT `Theme_ibfk_1` FOREIGN KEY (`idTag`) REFERENCES `tag` (`idTag`),
  ADD CONSTRAINT `Theme_ibfk_2` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`idFormation`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
