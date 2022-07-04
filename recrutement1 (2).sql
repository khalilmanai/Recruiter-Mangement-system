-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 29 avr. 2022 à 00:50
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `recrutement1`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE `candidat` (
  `id_candidat` int(11) NOT NULL,
  `nom_prenom` varchar(255) NOT NULL,
  `tel` int(10) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `niveau_etude` int(50) NOT NULL,
  `ecole` varchar(255) NOT NULL,
  `nb_exp` int(50) NOT NULL,
  `id_user` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`id_candidat`, `nom_prenom`, `tel`, `adresse`, `niveau_etude`, `ecole`, `nb_exp`, `id_user`) VALUES
(19, 'laila khouili', 24102587, 'bardo', 5, 'esen', 6, 27),
(20, 'ali chaabane', 23010478, 'ariana', 6, 'esen', 5, 28),
(22, 'Rihab Chaari', 21003587, 'Manouba', 3, 'esen', 2, 33);

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

CREATE TABLE `candidature` (
  `id_candidat` int(11) NOT NULL,
  `id_offre` int(11) NOT NULL,
  `date_candidature` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `candidature`
--

INSERT INTO `candidature` (`id_candidat`, `id_offre`, `date_candidature`) VALUES
(19, 16, '2022-04-28'),
(20, 15, '2022-04-28');

-- --------------------------------------------------------

--
-- Structure de la table `offreemploi`
--

CREATE TABLE `offreemploi` (
  `id_offre` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `date_exp` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_recruteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `offreemploi`
--

INSERT INTO `offreemploi` (`id_offre`, `date`, `date_exp`, `description`, `id_recruteur`) VALUES
(13, '2022-05-04', '2022-05-12', 'Ingénieur Affaires règlementaires H/F', 7),
(14, '2022-05-18', '2022-05-25', 'La société Manwork expert en recrutement et placement du personnel recrute pour l\'un de ses clients opérant dans le secteur de l’industrie \"Un(e) Comptable\" à Enfidha.', 8),
(15, '2022-05-07', '2022-05-16', ' La Direction des Systèmes d’Information du Groupe Tessi renforce son équipe interne, en recrutant un Analyste/Développeur BI', 9),
(16, '2022-05-25', '2022-05-31', 'En tant que développeur Odoo vous serez chargé de concevoir modules complémentaires pout la plateforme Odoo en s’adaptant aux besoins spécifiques de chaque client.', 9),
(17, '2022-05-01', '2022-05-12', 'Mise en place de la stratégie commerciale de l\'entreprise.\r\nPlanification et suivi des actions commerciales.\r\nGestion et suivi de l\'équipe commerciale et marketing.\r\nSuivi des clients grands comptes.', 10),
(18, '2022-05-05', '2022-05-11', 'Support hardware/software\r\nInstallation, configuration, maintenance des matériels informatiques\r\nGestion de parc informatique\r\nInventaires et suivis (hardware/software)', 7),
(19, '2022-04-17', '2022-05-07', 'Vous maîtrisez la langue française (niveau B2 – IMPERATIF) à l’oral ainsi qu’à l’écrit Vous maîtrisez le Pack Office (Excel, Word, Outlook)\r\nLa connaissance du logiciel CEGID - Quadra gestion commerciale, serait un plus, très apprécie.', 11);

-- --------------------------------------------------------

--
-- Structure de la table `recruteur`
--

CREATE TABLE `recruteur` (
  `id_recruteur` int(11) NOT NULL,
  `raison_social` varchar(255) NOT NULL,
  `tel` int(10) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `num_siret` int(50) NOT NULL,
  `nb_employe` int(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recruteur`
--

INSERT INTO `recruteur` (`id_recruteur`, `raison_social`, `tel`, `adresse`, `num_siret`, `nb_employe`, `id_user`) VALUES
(7, 'jumia', 2587456, 'manouba', 25487, 221, 26),
(8, 'Manwork', 24105866, 'Sousse', 123456, 250, 30),
(9, 'Tessi ', 27842002, 'La Chargui 1, Tunis، Tunisie', 7410258, 221, 31),
(10, 'orange', 29547200, 'manouba', 145986, 77, 32),
(11, 'telecom', 21474002, 'manouba', 21458795, 202, 34);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `is_recruteur` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `email`, `login`, `pwd`, `is_recruteur`) VALUES
(26, 'jumia.jumia@gmail.com', 'jumia', 'jumia', 1),
(27, 'laila.laila@gmail.com', 'laila', 'laila', 0),
(28, 'Ali.Chaabane@gmail.com', 'ali', 'ali', 0),
(30, 'manwork.manwork@gmail.com', 'manwork', 'manwork', 1),
(31, 'tessi.tessi@gmail.com', 'tessi', 'tessi', 1),
(32, 'orange.orange@gmail.com', 'orange', 'orange', 1),
(33, 'rrihab.chaari@gmail.com', 'rihab', 'rihab', 0),
(34, 'telecom.telecom@gmail.com', 'telecom', 'telecom', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`id_candidat`),
  ADD KEY `candidat_ibfk_1` (`id_user`);

--
-- Index pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD KEY `candidature_ibfk_1` (`id_candidat`),
  ADD KEY `candidature_ibfk_2` (`id_offre`) USING BTREE;

--
-- Index pour la table `offreemploi`
--
ALTER TABLE `offreemploi`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `offre_ibfk_1` (`id_recruteur`);

--
-- Index pour la table `recruteur`
--
ALTER TABLE `recruteur`
  ADD PRIMARY KEY (`id_recruteur`),
  ADD KEY `recruteur_ibfk_1` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidat`
--
ALTER TABLE `candidat`
  MODIFY `id_candidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `offreemploi`
--
ALTER TABLE `offreemploi`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `recruteur`
--
ALTER TABLE `recruteur`
  MODIFY `id_recruteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `candidat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `candidature_ibfk_1` FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`id_candidat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `candidature_ibfk_2` FOREIGN KEY (`id_offre`) REFERENCES `offreemploi` (`id_offre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `offreemploi`
--
ALTER TABLE `offreemploi`
  ADD CONSTRAINT `offre_ibfk_1` FOREIGN KEY (`id_recruteur`) REFERENCES `recruteur` (`id_recruteur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recruteur`
--
ALTER TABLE `recruteur`
  ADD CONSTRAINT `recruteur_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
