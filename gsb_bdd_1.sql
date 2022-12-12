-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 03 déc. 2022 à 15:15
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
-- Base de données : `gsb_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `fichefrais`
--

CREATE TABLE `fichefrais` (
  `ID_FicheFrais` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `poste` varchar(50) NOT NULL,
  `mois` date NOT NULL,
  `date` date NOT NULL,
  `hebergement` int(11) NOT NULL,
  `repas` int(11) NOT NULL,
  `transport` int(11) NOT NULL,
  `prix_total` int(11) NOT NULL,
  `autres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fichefrais`
--

INSERT INTO `fichefrais` (`ID_FicheFrais`, `nom`, `prenom`, `poste`, `mois`, `date`, `hebergement`, `repas`, `transport`, `prix_total`, `autres`) VALUES
(1, 'Bakhouche', 'Rayan', 'efef', '0000-00-00', '2022-06-10', 50, 20, 30, 100, 0),
(2, 'bakhouche', 'rayan', 'hvhcv', '0000-00-00', '2022-04-21', 40, 20, 20, 80, 0),
(3, 'bakhouche', 'rayan', 'gvdgz', '0000-00-00', '2022-06-15', 80, 20, 20, 120, 0);

-- --------------------------------------------------------

--
-- Structure de la table `justificatif`
--

CREATE TABLE `justificatif` (
  `id_justificatif` int(10) NOT NULL,
  `date` int(11) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID_User` int(11) NOT NULL,
  `Role` int(1) NOT NULL COMMENT 'Accès',
  `Prenom` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Mdp` varchar(255) NOT NULL,
  `Responsable` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_User`, `Role`, `Prenom`, `Nom`, `Mail`, `Mdp`, `Responsable`) VALUES
(1, 1, 'Martin', 'Billault', 'martinbillault9@gmail.com', '1234', 'moi'),
(2, 1, 'd', 'd', 'd@d', '$2y$10$.EnuITRRFENELdzMIIm7PuVwwT0oiKHpMruP/rVeEXmvoHrc2j64e', '1'),
(3, 0, 'Rayan', 'Bakhouche', 'yayan1@live.fr', '$2y$10$twEXco9JqDilNybB6X4pte8tUAFkZkfFvGB6gWdkCYo3/8KAI0tXG', 'zdz');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  ADD PRIMARY KEY (`ID_FicheFrais`);

--
-- Index pour la table `justificatif`
--
ALTER TABLE `justificatif`
  ADD PRIMARY KEY (`id_justificatif`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  MODIFY `ID_FicheFrais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `justificatif`
--
ALTER TABLE `justificatif`
  MODIFY `id_justificatif` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
