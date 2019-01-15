-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 15 Janvier 2019 à 15:23
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `asi_police`
--

-- --------------------------------------------------------

--
-- Structure de la table `attestation`
--

CREATE TABLE `attestation` (
  `id` int(11) NOT NULL,
  `policier_id` int(11) NOT NULL,
  `conducteur_id` int(11) NOT NULL,
  `numeroAttestation` int(11) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `infractionConstater` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateRecuperePermis` date NOT NULL,
  `payer` enum('NON','OUI') COLLATE utf8_unicode_ci DEFAULT NULL,
  `etatPiece` enum('retirée','pas retirée') COLLATE utf8_unicode_ci DEFAULT NULL,
  `categorie` enum('4R&+','2R') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `attestation`
--

INSERT INTO `attestation` (`id`, `policier_id`, `conducteur_id`, `numeroAttestation`, `date`, `lieu`, `infractionConstater`, `dateRecuperePermis`, `payer`, `etatPiece`, `categorie`) VALUES
(1, 2, 1, 1, '2018-09-26', 'teste 2', 'teste 2', '2018-09-26', 'NON', 'pas retirée', NULL),
(2, 2, 2, 3, '2018-09-27', 'PR', 'Usage de téléphoner au volant', '2018-09-28', 'NON', 'pas retirée', NULL),
(3, 2, 3, 900, '2018-09-28', 'PRE', 'mal stationné', '2018-09-29', 'NON', 'pas retirée', NULL),
(4, 2, 4, 20181001, '2018-10-02', 'cpi', 'défaut de visite technique', '2018-10-16', 'OUI', 'pas retirée', NULL),
(5, 2, 5, 20181002, '2018-10-16', 'test7', 'test7', '2018-10-16', 'OUI', 'pas retirée', NULL),
(6, 2, 7, 20181003, '2018-10-16', 'teste11', 'teste11', '2018-10-16', 'OUI', 'pas retirée', NULL),
(7, 2, 8, 20181004, '2018-10-18', 'teste15', 'teste15', '2018-10-26', 'OUI', 'pas retirée', NULL),
(8, 2, 9, 20181005, '2018-10-19', 'teste16', 'teste16', '2018-10-19', 'NON', 'pas retirée', NULL),
(9, 2, 10, 20181006, '2018-10-22', 'teste17', 'teste17', '2019-01-15', 'OUI', 'pas retirée', NULL),
(10, 2, 11, 20181007, '2018-10-31', 'teste18', 'teste18', '2019-01-14', 'OUI', 'pas retirée', NULL),
(11, 2, 12, 20181201, '2018-12-13', 'test150', 'test150', '2018-12-14', 'OUI', 'pas retirée', NULL),
(12, 2, 13, 20181202, '2018-12-14', 'teste20', 'teste20', '2019-01-08', 'OUI', 'pas retirée', NULL),
(13, 2, 14, 20190101, '2019-01-07', 'iiii', 'hhhh', '2019-01-08', 'OUI', 'pas retirée', NULL),
(14, 2, 15, 20190102, '2019-01-07', 'oooo', 'ppppp', '2019-01-08', 'OUI', 'retirée', NULL),
(15, 2, 16, 20190103, '2019-01-08', 'iiii', 'ooooo', '2019-01-08', 'OUI', 'retirée', NULL),
(16, 2, 22, 20190104, '2019-01-14', 'oooo', 'ssss', '2019-01-14', 'NON', 'pas retirée', NULL),
(17, 2, 24, 20190105, '2019-01-14', 'thies', 'normal', '2019-01-14', 'NON', 'pas retirée', NULL),
(18, 2, 25, 20190106, '2019-01-14', 'pikine nour', 'Normal', '2019-01-15', 'OUI', 'retirée', '4R&+'),
(19, 2, 26, 20190107, '2019-01-14', 'marché Sam', 'Normal', '2019-01-15', 'OUI', 'pas retirée', '4R&+');

-- --------------------------------------------------------

--
-- Structure de la table `commissaire`
--

CREATE TABLE `commissaire` (
  `id` int(11) NOT NULL,
  `utilisateurs_id` int(11) NOT NULL,
  `nomCommissaire` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenomCommissaire` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `typeSuperviseur` enum('Superviseur','Superviseur General') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `commissaire`
--

INSERT INTO `commissaire` (`id`, `utilisateurs_id`, `nomCommissaire`, `prenomCommissaire`, `typeSuperviseur`) VALUES
(1, 2, 'ndour', 'Assane', 'Superviseur'),
(2, 3, 'sow', 'sophie', 'Superviseur'),
(3, 6, 'fall', 'commissaire', 'Superviseur'),
(4, 9, 'niveau', 'niveau', 'Superviseur General');

-- --------------------------------------------------------

--
-- Structure de la table `commissariat`
--

CREATE TABLE `commissariat` (
  `id` int(11) NOT NULL,
  `commissaire_id` int(11) NOT NULL,
  `numeroCommissariat` int(11) NOT NULL,
  `nomCommissariat` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `commissariat`
--

INSERT INTO `commissariat` (`id`, `commissaire_id`, `numeroCommissariat`, `nomCommissariat`) VALUES
(1, 1, 1, 'Pikine'),
(2, 2, 2, 'Guédiaway');

-- --------------------------------------------------------

--
-- Structure de la table `conducteur`
--

CREATE TABLE `conducteur` (
  `id` int(11) NOT NULL,
  `nomConducteur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenomConducteur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numeroTelephone` int(11) NOT NULL,
  `numeroPermis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ncni` int(11) NOT NULL,
  `numeroCarteGrise` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `conducteur`
--

INSERT INTO `conducteur` (`id`, `nomConducteur`, `prenomConducteur`, `numeroTelephone`, `numeroPermis`, `ncni`, `numeroCarteGrise`) VALUES
(1, 'teste 2', 'teste 2', 66666, 'teste 2', 0, 'teste 2'),
(2, 'Sall', 'Tapha', 1234567, 'HYTF54D', 0, '654RD9'),
(3, 'Sow', 'Sophie', 444444444, 'GHYTf5443', 0, 'JUHYG55Z'),
(4, 'matar', 'ndiaye', 77777, 'YHF6SF', 0, 'YHFRD7'),
(5, 'test7', 'test7', 20, 'test7', 0, 'test7'),
(7, 'teste11', 'teste11', 11, 'teste11', 0, 'teste11'),
(8, 'teste15', 'teste15', 6666, 'teste15', 0, 'teste15'),
(9, 'teste16', 'teste16', 888, 'teste16', 0, 'teste16'),
(10, 'teste17', 'teste17', 6666, 'teste17', 0, 'teste17'),
(11, 'teste18', 'teste18', 98877, 'teste18', 0, 'teste18'),
(12, 'test150', 'test150', 987654, '123467565', 0, '764test150'),
(13, 'teste20', 'teste20', 222, '45566', 0, '543D'),
(14, 'jjjj', 'jjjj', 10, 'jjj', 0, 'nnnnn'),
(15, 'pp', 'ppp', 11, 'ppp', 0, 'ppp'),
(16, 'ooooo', 'oooo', 1111111, 'ooooo', 1111111, 'OOOOO'),
(22, 'jjjj', 'jjjj', 9999999, '9999999', 9999999, '9999999'),
(24, 'ndiaye', 'Matar', 1234567, '1234567', 1234567, '1234567'),
(25, 'Matar', 'ndiaye', 12344555, '12344555', 12344555, '12344555'),
(26, 'Ndiay', 'Latyr', 965443, '0965443', 965443, '0965443');

-- --------------------------------------------------------

--
-- Structure de la table `infraction`
--

CREATE TABLE `infraction` (
  `id` int(11) NOT NULL,
  `nomInfraction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `typeInfraction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amende` int(11) NOT NULL,
  `attestation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `infraction`
--

INSERT INTO `infraction` (`id`, `nomInfraction`, `typeInfraction`, `amende`, `attestation_id`) VALUES
(10, 'test15', 'Pièce', 2500, 7),
(11, 'test16', 'Conduite', 3000, 8),
(12, 'test16A', 'Pièce', 10000, 8),
(13, 'test16B', 'Equipement', 5000, 8),
(14, 'test16B', 'Equipement', 5000, 8),
(15, 'test16B', 'Equipement', 5000, 8),
(16, 'test16B', 'Equipement', 5000, 8),
(17, 'Conduite d’un véhicule dépourvu de police d’assurance', 'Pièce', 2500, 1),
(18, 'Stationnement perturbateur', 'Pièce', 2500, 2),
(19, 'Encombrement de passage cloué', 'Conduite', 5000, 2),
(20, 'Défaut de boîte secours', 'Equipement', 2500, 4),
(21, 'Défaut de carte de transport', 'Pièce', 3000, 4),
(22, 'Surcharge de marchandises', 'Operation', 5000, 5),
(23, 'Défaut de feux stop ou feu freins', 'Vehicule', 2500, 6),
(24, 'Port de casque non homologué', 'Equipement', 3000, 9),
(25, 'Défaut de permis de conduire', 'Pièce', 3000, 10),
(26, 'Stationnement sans signalisation appropriée en cas de panne ou de détresse', 'Conduite', 5000, 10),
(27, 'Défaut de boîte secours', 'Equipement', 3000, 11),
(28, 'Gabarit non-conforme', 'Vehicule', 5000, 11),
(29, 'Défaut de présentation de carte grise', 'Pièce', 5000, 12),
(30, 'Défaut de présentation de carte grise', 'Equipement', 5000, 14),
(31, 'Défaut de présentation de carte grise', 'Equipement', 5000, 14),
(32, 'Défaut de carte de transport', 'Immatriculation', 30000, 15),
(33, 'Défaut de présentation de carte grise', 'Equipement', 5000, 15),
(34, 'Défaut de présentation de carte grise', 'Equipement', 5000, 15),
(51, 'Excès de vitesse', 'Conduite', 4000, 16),
(52, 'Défaut d’immatriculation', 'Immatriculation', 5000, 16),
(53, 'Défaut de présentation de carte grise', 'Pièce', 5000, 17),
(54, 'Excès de vitesse', 'Conduite', 4000, 17),
(55, 'Défaut de présentation de carte grise', 'Pièce', 5000, 18),
(56, 'Circulation à gauche', 'Conduite', 1000, 19);

-- --------------------------------------------------------

--
-- Structure de la table `policier`
--

CREATE TABLE `policier` (
  `id` int(11) NOT NULL,
  `commissariat_id` int(11) NOT NULL,
  `utilisateurs_id` int(11) NOT NULL,
  `nomPolicier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenomPolicier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matriculeDuPolicier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `typePolicier` enum('Agent de circulation','Agent remet piéce','Percepteur') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `policier`
--

INSERT INTO `policier` (`id`, `commissariat_id`, `utilisateurs_id`, `nomPolicier`, `prenomPolicier`, `matriculeDuPolicier`, `typePolicier`) VALUES
(1, 1, 4, 'henry', 'henry', '765MH', 'Agent de circulation'),
(2, 2, 5, 'yade', 'lamine', '769MH', 'Agent de circulation'),
(3, 1, 7, 'teste', 'teste', 'teste', 'Agent de circulation'),
(4, 1, 8, 'teste3', 'teste3', 'teste3', 'Percepteur'),
(5, 2, 10, 'policier_percepteur', 'policier_percepteur', '987MH', 'Percepteur'),
(6, 2, 11, 'gestion_piece', 'gestion_piece', '6754/GF', 'Agent remet piéce');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'matar', 'matar', 'matar@gmail.com', 'matar@gmail.com', 1, NULL, '$2y$13$8uHMm1U7BvmzikSnbHubT.Ip.af6yfAVejHXe2QOdSCxQWOJbMHA.', '2019-01-09 09:33:49', NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(2, 'Assane', 'assane', 'ndour@gmail.com', 'ndour@gmail.com', 1, NULL, '$2y$13$cy1ZZELw77mEJ6lVyx6l0OxVPI7Qeq3t3zg2v5twd4qo60zJ7qbPK', '2018-12-13 02:26:58', NULL, NULL, 'a:1:{i:0;s:16:"ROLE_COMMISSAIRE";}'),
(3, 'sophie', 'sophie', 'sow@gmail.com', 'sow@gmail.com', 1, NULL, '$2y$13$OcxzYhH05Tm7gCS9UyY1Lu0.YSCv/tgh9.0..4UZRCRRpd4igTm.2', '2019-01-15 13:19:14', NULL, NULL, 'a:1:{i:0;s:16:"ROLE_COMMISSAIRE";}'),
(4, 'henry', 'henry', 'henry@gmail.com', 'henry@gmail.com', 1, NULL, '$2y$13$kKsj3RlI/WWlFdUT5Eb8WOZNgG1OfVI6AWtejgd/HghtWFv9T0Zo2', '2018-10-30 10:15:35', NULL, NULL, 'a:1:{i:0;s:13:"ROLE_POLICIER";}'),
(5, 'lamine', 'lamine', 'yade@gmail.com', 'yade@gmail.com', 1, NULL, '$2y$13$ane6L/wl9roagQopXvzhiesNZp5L83r97tcrH73kOT9IEw8c3V5lu', '2019-01-14 15:15:57', NULL, NULL, 'a:1:{i:0;s:13:"ROLE_POLICIER";}'),
(6, 'commissaire', 'commissaire', 'fall@gmail.com', 'fall@gmail.com', 1, NULL, '$2y$13$2Cm00xJH2bRKXf.ApsRL9.waMLL9gy/vca2F8IZEYP6cmjWFLWdGe', NULL, NULL, NULL, 'a:1:{i:0;s:16:"ROLE_COMMISSAIRE";}'),
(7, 'teste', 'teste', 'teste@gmail.com', 'teste@gmail.com', 1, NULL, '$2y$13$/pomKRygCQbCx71FBo3a1u94nHITTbhnrerwr.B0fOOzWLLuPlPFq', NULL, NULL, NULL, 'a:1:{i:0;s:13:"ROLE_POLICIER";}'),
(8, 'teste3', 'teste3', 'teste3@gmail.com', 'teste3@gmail.com', 1, NULL, '$2y$13$WtAqGAe40YeCyMpqgH2I8eIZLkqDWrkYumm8pniYdSkbqufv5R2mO', '2018-10-15 15:51:04', NULL, NULL, 'a:1:{i:0;s:15:"ROLE_PERCEPTEUR";}'),
(9, 'niveau', 'niveau', 'niveau@gmail.com', 'niveau@gmail.com', 1, NULL, '$2y$13$49VIZ6tK.BcPm.zkmvae8Oc0UvRgvp/dI7IJwy0BtDEFYvbhBTmPm', '2019-01-15 13:27:24', NULL, NULL, 'a:1:{i:0;s:24:"ROLE_SUPERVISEUR_GENERAL";}'),
(10, 'policier_percepteur', 'policier_percepteur', 'policier_percepteur@gmail.com', 'policier_percepteur@gmail.com', 1, NULL, '$2y$13$GIbXHzhAo0NbQhSD9a6Gw.u9rcRWCT1OONUnNkL3Md3flztUQaDaS', '2019-01-15 10:20:29', NULL, NULL, 'a:1:{i:0;s:15:"ROLE_PERCEPTEUR";}'),
(11, 'gestion_piece', 'gestion_piece', 'gestion_piece@gmail.com', 'gestion_piece@gmail.com', 1, NULL, '$2y$13$HqHE0rdqvWS5HFJ65G5ffO0rt5VS/060sU8H7KT9Nozg22nymJcJK', '2019-01-15 12:05:33', NULL, NULL, 'a:1:{i:0;s:19:"ROLE_REMETTRE_PIECE";}');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `attestation`
--
ALTER TABLE `attestation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_326EC63F5CFBF120` (`policier_id`),
  ADD KEY `IDX_326EC63FF16F4AC6` (`conducteur_id`);

--
-- Index pour la table `commissaire`
--
ALTER TABLE `commissaire`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_AD38CF9D1E969C5` (`utilisateurs_id`);

--
-- Index pour la table `commissariat`
--
ALTER TABLE `commissariat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F87ED495F7EA9D21` (`commissaire_id`);

--
-- Index pour la table `conducteur`
--
ALTER TABLE `conducteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `infraction`
--
ALTER TABLE `infraction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C1A458F57EDC5B38` (`attestation_id`);

--
-- Index pour la table `policier`
--
ALTER TABLE `policier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_978C8F581E969C5` (`utilisateurs_id`),
  ADD KEY `IDX_978C8F58CF70E3F3` (`commissariat_id`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_497B315E92FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_497B315EA0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_497B315EC05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `attestation`
--
ALTER TABLE `attestation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `commissaire`
--
ALTER TABLE `commissaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `commissariat`
--
ALTER TABLE `commissariat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `conducteur`
--
ALTER TABLE `conducteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `infraction`
--
ALTER TABLE `infraction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT pour la table `policier`
--
ALTER TABLE `policier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `attestation`
--
ALTER TABLE `attestation`
  ADD CONSTRAINT `FK_326EC63F5CFBF120` FOREIGN KEY (`policier_id`) REFERENCES `policier` (`id`),
  ADD CONSTRAINT `FK_326EC63FF16F4AC6` FOREIGN KEY (`conducteur_id`) REFERENCES `conducteur` (`id`);

--
-- Contraintes pour la table `commissaire`
--
ALTER TABLE `commissaire`
  ADD CONSTRAINT `FK_AD38CF9D1E969C5` FOREIGN KEY (`utilisateurs_id`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `commissariat`
--
ALTER TABLE `commissariat`
  ADD CONSTRAINT `FK_F87ED495F7EA9D21` FOREIGN KEY (`commissaire_id`) REFERENCES `commissaire` (`id`);

--
-- Contraintes pour la table `infraction`
--
ALTER TABLE `infraction`
  ADD CONSTRAINT `FK_C1A458F57EDC5B38` FOREIGN KEY (`attestation_id`) REFERENCES `attestation` (`id`);

--
-- Contraintes pour la table `policier`
--
ALTER TABLE `policier`
  ADD CONSTRAINT `FK_978C8F581E969C5` FOREIGN KEY (`utilisateurs_id`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `FK_978C8F58CF70E3F3` FOREIGN KEY (`commissariat_id`) REFERENCES `commissariat` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
