-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  ven. 13 déc. 2019 à 11:02
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.19

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_hbck`
--
CREATE DATABASE
IF NOT EXISTS `bd_hbck` DEFAULT CHARACTER
SET utf8
COLLATE utf8_general_ci;
USE `bd_hbck`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article`
(
  `art_id` int
(11) NOT NULL,
  `art_titre` varchar
(255) NOT NULL,
  `art_contenu` longtext NOT NULL,
  `art_auteur_id` int
(11) NOT NULL,
  `art_photo_id` int
(11) DEFAULT NULL,
  `art_actif` int
(1) NOT NULL,
  `art_created_at` datetime NOT NULL,
  `art_updated_at` datetime DEFAULT NULL,
  `art_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe`
(
  `equ_id` int
(11) NOT NULL,
  `equ_libelle` varchar
(255) NOT NULL,
  `equ_widget_id` varchar
(255) NOT NULL,
  `equ_categorie` varchar
(255) NOT NULL,
  `equ_division` varchar
(255) NOT NULL,
  `equ_created_at` datetime NOT NULL,
  `equ_updated_at` datetime DEFAULT NULL,
  `equ_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE `fonction`
(
  `fon_id` int
(11) NOT NULL,
  `fon_libelle` varchar
(255) NOT NULL,
  `fon_created_at` datetime NOT NULL,
  `fon_updated_at` datetime DEFAULT NULL,
  `fon_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lien_per_fon_equ`
--

CREATE TABLE `lien_per_fon_equ`
(
  `lpfe_id` int
(11) NOT NULL,
  `lpfe_per_id` int
(11) NOT NULL,
  `lpfe_fon_id` int
(11) NOT NULL,
  `lpfe_equ_id` int
(11) NOT NULL,
  `lpfe_created_at` datetime NOT NULL,
  `lpfe_updated_at` datetime DEFAULT NULL,
  `lpfe_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne`
(
  `per_id` int
(11) NOT NULL,
  `per_nom` varchar
(255) NOT NULL,
  `per_prenom` varchar
(255) DEFAULT NULL,
  `per_date_nais` date DEFAULT NULL,
  `per_lieu_nais` varchar
(255) DEFAULT NULL,
  `per_sexe` varchar
(50) NOT NULL,
  `per_mail` varchar
(255) NOT NULL,
  `per_mdp` varchar
(50) NOT NULL,
  `per_admin` int
(1) NOT NULL DEFAULT '0',
  `per_redac` int
(1) NOT NULL DEFAULT '0',
  `per_contact_ext` int
(1) NOT NULL DEFAULT '0',
  `per_created_at` datetime NOT NULL,
  `per_updated_at` datetime DEFAULT NULL,
  `per_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo`
(
  `pho_id` int
(11) NOT NULL,
  `pho_link` varchar
(255) NOT NULL,
  `pho_libelle` varchar
(255) NOT NULL,
  `pho_created_at` datetime NOT NULL,
  `pho_updated_at` datetime DEFAULT NULL,
  `pho_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rencontre`
--

CREATE TABLE `rencontre`
(
  `ren_id` int
(11) NOT NULL,
  `ren_equipe_id` int
(11) NOT NULL,
  `ren_equipe_adverse` varchar
(255) NOT NULL,
  `ren_ville` varchar
(255) NOT NULL,
  `ren_nom_stade` varchar
(255) NOT NULL,
  `ren_date` datetime DEFAULT NULL,
  `ren_notre_score` int
(3) DEFAULT NULL,
  `ren_score_adverse` int
(3) DEFAULT NULL,
  `ren_domicile` int
(1) DEFAULT NULL,
  `ren_created_at` datetime NOT NULL,
  `fon_updated_at` datetime DEFAULT NULL,
  `fon_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
ADD PRIMARY KEY
(`art_id`),
ADD KEY `fk_per_art`
(`art_auteur_id`),
ADD KEY `fk_photo_id`
(`art_photo_id`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
ADD PRIMARY KEY
(`equ_id`);

--
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
ADD PRIMARY KEY
(`fon_id`);

--
-- Index pour la table `lien_per_fon_equ`
--
ALTER TABLE `lien_per_fon_equ`
ADD PRIMARY KEY
(`lpfe_id`),
ADD KEY `fk_lpfe_per`
(`lpfe_per_id`),
ADD KEY `fk_lpfe_fon`
(`lpfe_fon_id`),
ADD KEY `fk_lpfe_equ`
(`lpfe_equ_id`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
ADD PRIMARY KEY
(`per_id`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
ADD PRIMARY KEY
(`pho_id`);

--
-- Index pour la table `rencontre`
--
ALTER TABLE `rencontre`
ADD PRIMARY KEY
(`ren_id`),
ADD KEY `fk_ren_equ`
(`ren_equipe_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `art_id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `equ_id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fonction`
--
ALTER TABLE `fonction`
  MODIFY `fon_id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lien_per_fon_equ`
--
ALTER TABLE `lien_per_fon_equ`
  MODIFY `lpfe_id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `per_id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `pho_id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rencontre`
--
ALTER TABLE `rencontre`
  MODIFY `ren_id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
ADD CONSTRAINT `fk_per_art` FOREIGN KEY
(`art_auteur_id`) REFERENCES `personne`
(`per_id`);

--
-- Contraintes pour la table `lien_per_fon_equ`
--
ALTER TABLE `lien_per_fon_equ`
ADD CONSTRAINT `fk_lpfe_equ` FOREIGN KEY
(`lpfe_equ_id`) REFERENCES `equipe`
(`equ_id`),
ADD CONSTRAINT `fk_lpfe_fon` FOREIGN KEY
(`lpfe_fon_id`) REFERENCES `fonction`
(`fon_id`),
ADD CONSTRAINT `fk_lpfe_per` FOREIGN KEY
(`lpfe_per_id`) REFERENCES `personne`
(`per_id`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
ADD CONSTRAINT `FK_Photo_id` FOREIGN KEY
(`pho_id`) REFERENCES `article`
(`art_id`);

--
-- Contraintes pour la table `rencontre`
--
ALTER TABLE `rencontre`
ADD CONSTRAINT `fk_ren_equ` FOREIGN KEY
(`ren_equipe_id`) REFERENCES `equipe`
(`equ_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
