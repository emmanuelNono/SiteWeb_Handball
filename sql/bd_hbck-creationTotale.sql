-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 17 déc. 2019 à 08:13
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_hbck`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `art_id` int(11) NOT NULL,
  `art_titre` varchar(255) NOT NULL,
  `art_contenu` longtext NOT NULL,
  `art_auteur_id` int(11) NOT NULL,
  `art_photo_id` int(11) DEFAULT NULL,
  `art_actif` int(1) NOT NULL,
  `art_created_at` datetime NOT NULL,
  `art_updated_at` datetime DEFAULT NULL,
  `art_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`art_id`, `art_titre`, `art_contenu`, `art_auteur_id`, `art_photo_id`, `art_actif`, `art_created_at`, `art_updated_at`, `art_deleted_at`) VALUES
(1, 'Bienvenue', 'Ceci est ma première news', 1, 1, 1, '2019-12-13 19:22:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `dde_accompagnant`
--

CREATE TABLE `dde_accompagnant` (
  `dda_id` int(11) NOT NULL,
  `dda_lib` text NOT NULL,
  `dda_actif` int(1) NOT NULL DEFAULT '0',
  `dda_created_at` datetime NOT NULL,
  `dda_updated_at` datetime DEFAULT NULL,
  `dda_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dde_accompagnant`
--

INSERT INTO `dde_accompagnant` (`dda_id`, `dda_lib`, `dda_actif`, `dda_created_at`, `dda_updated_at`, `dda_deleted_at`) VALUES
(1, 'On demande un accompagnant pour la rencontre du 25/01/2019', 1, '2019-12-13 19:22:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `equ_id` int(11) NOT NULL,
  `equ_libelle` varchar(255) NOT NULL,
  `equ_widget_id` varchar(255) NOT NULL,
  `equ_categorie` varchar(255) NOT NULL,
  `equ_division` varchar(255) NOT NULL,
  `equ_created_at` datetime NOT NULL,
  `equ_updated_at` datetime DEFAULT NULL,
  `equ_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`equ_id`, `equ_libelle`, `equ_widget_id`, `equ_categorie`, `equ_division`, `equ_created_at`, `equ_updated_at`, `equ_deleted_at`) VALUES
(1, 'SENIOR F1', '5df36c4051f99732b8cb73d2', 'Senior', 'National', '2019-12-13 19:22:57', NULL, NULL),
(2, 'SENIOR F2', '5df36c6751f99732b8cb73d3', 'Senior', 'Departemantal', '2019-12-13 19:22:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE `fonction` (
  `fon_id` int(11) NOT NULL,
  `fon_libelle` varchar(255) NOT NULL,
  `fon_created_at` datetime NOT NULL,
  `fon_updated_at` datetime DEFAULT NULL,
  `fon_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fonction`
--

INSERT INTO `fonction` (`fon_id`, `fon_libelle`, `fon_created_at`, `fon_updated_at`, `fon_deleted_at`) VALUES
(1, 'Président', '2019-12-13 19:22:57', NULL, NULL),
(2, 'Secrétaire', '2019-12-13 19:22:57', NULL, NULL),
(3, 'Trésorier', '2019-12-13 19:22:57', NULL, NULL),
(4, 'Entraîneur', '2019-12-13 19:22:57', NULL, NULL),
(5, 'Entraîneur adjoint', '2019-12-13 19:22:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lien_per_fon_equ`
--

CREATE TABLE `lien_per_fon_equ` (
  `lpfe_id` int(11) NOT NULL,
  `lpfe_per_id` int(11) NOT NULL,
  `lpfe_fon_id` int(11) NOT NULL,
  `lpfe_equ_id` int(11) DEFAULT NULL,
  `lpfe_created_at` datetime NOT NULL,
  `lpfe_updated_at` datetime DEFAULT NULL,
  `lpfe_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lien_per_fon_equ`
--

INSERT INTO `lien_per_fon_equ` (`lpfe_id`, `lpfe_per_id`, `lpfe_fon_id`, `lpfe_equ_id`, `lpfe_created_at`, `lpfe_updated_at`, `lpfe_deleted_at`) VALUES
(1, 1, 2, NULL, '2019-12-13 19:22:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `per_id` int(11) NOT NULL,
  `per_nom` varchar(255) NOT NULL,
  `per_prenom` varchar(255) DEFAULT NULL,
  `per_date_nais` date DEFAULT NULL,
  `per_lieu_nais` varchar(255) DEFAULT NULL,
  `per_sexe` varchar(50) NOT NULL,
  `per_mail` varchar(255) NOT NULL,
  `per_mdp` varchar(50) NOT NULL,
  `per_admin` int(1) NOT NULL DEFAULT '0',
  `per_redac` int(1) NOT NULL DEFAULT '0',
  `per_contact_ext` int(1) NOT NULL DEFAULT '0',
  `per_created_at` datetime NOT NULL,
  `per_updated_at` datetime DEFAULT NULL,
  `per_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`per_id`, `per_nom`, `per_prenom`, `per_date_nais`, `per_lieu_nais`, `per_sexe`, `per_mail`, `per_mdp`, `per_admin`, `per_redac`, `per_contact_ext`, `per_created_at`, `per_updated_at`, `per_deleted_at`) VALUES
(1, 'GENETAY', 'Alain', '1965-05-23', 'Truchtersheim', 'Masculin', 'alaingenetay.hbck@gmail.com', 'tito', 0, 1, 1, '2019-12-13 19:22:56', NULL, NULL),
(2, 'GALLIOZ', 'Cécile', '1975-05-23', 'Paris', 'Féminin', 'cecile@gallioz.fr', 'tito', 1, 0, 0, '2019-12-13 19:22:56', NULL, NULL),
(3, 'NONO', 'Emmanuel', '1982-05-23', 'Paris', 'Masculin', 'manuelnono@hotmail.fr', 'tito', 0, 0, 0, '2019-12-13 19:22:56', NULL, NULL),
(4, 'KOSCHIG', 'Raphaël', '1982-04-26', 'Strasbourg', 'Masculin', 'raphael.koschig@gmail.com', 'tito', 1, 0, 0, '2019-12-13 19:22:57', NULL, NULL),
(5, 'SAUVIGNON', 'Dominique', '1976-03-26', 'Truchtersheim', 'Masculin', 'dominique21000@gmail.com', 'tito', 1, 1, 0, '2019-12-13 19:22:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `pho_id` int(11) NOT NULL,
  `pho_nom` varchar(255) NOT NULL,
  `pho_album` varchar(255) NOT NULL,
  `pho_created_at` datetime NOT NULL,
  `pho_updated_at` datetime DEFAULT NULL,
  `pho_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`pho_id`, `pho_nom`, `pho_album`, `pho_created_at`, `pho_updated_at`, `pho_deleted_at`) VALUES
(1, 'toto.jpg', 'Equipe1', '2019-12-13 19:22:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `rencontre`
--

CREATE TABLE `rencontre` (
  `ren_id` int(11) NOT NULL,
  `ren_equipe_id` int(11) NOT NULL,
  `ren_equipe_adverse` varchar(255) NOT NULL,
  `ren_ville` varchar(255) NOT NULL,
  `ren_nom_stade` varchar(255) NOT NULL,
  `ren_date` datetime DEFAULT NULL,
  `ren_notre_score` int(3) DEFAULT NULL,
  `ren_score_adverse` int(3) DEFAULT NULL,
  `ren_domicile` int(1) DEFAULT NULL,
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
  ADD PRIMARY KEY (`art_id`),
  ADD KEY `fk_per_art` (`art_auteur_id`),
  ADD KEY `fk_photo_id` (`art_photo_id`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`equ_id`);

--
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
  ADD PRIMARY KEY (`fon_id`);

--
-- Index pour la table `lien_per_fon_equ`
--
ALTER TABLE `lien_per_fon_equ`
  ADD PRIMARY KEY (`lpfe_id`),
  ADD KEY `fk_lpfe_per` (`lpfe_per_id`),
  ADD KEY `fk_lpfe_fon` (`lpfe_fon_id`),
  ADD KEY `fk_lpfe_equ` (`lpfe_equ_id`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`per_id`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`pho_id`);

--
-- Index pour la table `rencontre`
--
ALTER TABLE `rencontre`
  ADD PRIMARY KEY (`ren_id`),
  ADD KEY `fk_ren_equ` (`ren_equipe_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `equ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `fonction`
--
ALTER TABLE `fonction`
  MODIFY `fon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `lien_per_fon_equ`
--
ALTER TABLE `lien_per_fon_equ`
  MODIFY `lpfe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `pho_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `rencontre`
--
ALTER TABLE `rencontre`
  MODIFY `ren_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_per_art` FOREIGN KEY (`art_auteur_id`) REFERENCES `personne` (`per_id`);

--
-- Contraintes pour la table `lien_per_fon_equ`
--
ALTER TABLE `lien_per_fon_equ`
  ADD CONSTRAINT `fk_lpfe_equ` FOREIGN KEY (`lpfe_equ_id`) REFERENCES `equipe` (`equ_id`),
  ADD CONSTRAINT `fk_lpfe_fon` FOREIGN KEY (`lpfe_fon_id`) REFERENCES `fonction` (`fon_id`),
  ADD CONSTRAINT `fk_lpfe_per` FOREIGN KEY (`lpfe_per_id`) REFERENCES `personne` (`per_id`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `FK_Photo_id` FOREIGN KEY (`pho_id`) REFERENCES `article` (`art_id`);

--
-- Contraintes pour la table `rencontre`
--
ALTER TABLE `rencontre`
  ADD CONSTRAINT `fk_ren_equ` FOREIGN KEY (`ren_equipe_id`) REFERENCES `equipe` (`equ_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
