-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 05 déc. 2022 à 12:48
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

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
  `poste` varchar(50) NOT NULL,
  `mois` int(11) NOT NULL,
  `date` date NOT NULL,
  `hebergement` int(11) NOT NULL,
  `repas` int(11) NOT NULL,
  `transport` int(11) NOT NULL,
  `prix_total` int(11) NOT NULL,
  `autres` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `nom` int(255) NOT NULL,
  `prenom` int(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fichefrais`
--

INSERT INTO `fichefrais` (`ID_FicheFrais`, `poste`, `mois`, `date`, `hebergement`, `repas`, `transport`, `prix_total`, `autres`, `ID_User`, `nom`, `prenom`, `description`) VALUES
(3, 'devellopeur', 2, '2022-06-15', 80, 20, 20, 120, 0, 4, 0, 0, 'voyage entreprise'),
(4, 'devellopeur', 2, '2022-12-21', 55, 20, 10, 95, 10, 4, 0, 0, 'affaire dans le sud de la france'),
(6, 'moi', 0, '2022-12-22', 10, 10, 20, 10, 0, 4, 0, 0, 'rendez vous chez un clients'),
(7, 'moi', 1, '2022-12-22', 12, 12, 12, 12, 0, 4, 0, 0, 'voyage entreprise'),
(8, 'devellopeur', 1, '2022-12-06', 123, 12, 12, 0, 12, 0, 0, 0, 'deplacement pro'),
(9, 'moi', 1, '2022-12-14', 12, 54, 54, 0, 10, 0, 0, 0, 'deplacement pro'),
(10, 'dtxtxghjk', 1, '2022-12-15', 10, 54, 10, 0, 10, 0, 0, 0, 'deplacement pro');

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
  `Poste` varchar(255) NOT NULL COMMENT 'Accès',
  `Prenom` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Mdp` varchar(255) NOT NULL,
  `Responsable` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_User`, `Poste`, `Prenom`, `Nom`, `Mail`, `Mdp`, `Responsable`) VALUES
(3, '0', 'Rayan', 'Bakhouche', 'yayan1@live.fr', '$2y$10$twEXco9JqDilNybB6X4pte8tUAFkZkfFvGB6gWdkCYo3/8KAI0tXG', 'zdz'),
(4, 'devellopeur', 'Martin', 'Billault', 'martinbillault9@gmail.com', '$2y$10$kswuKfQYOtVo7ZFIO1dVQ.qRkBIsVsvNwmiFku7bbfcmwVsRV4ku2', 'martin');

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
  MODIFY `ID_FicheFrais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `justificatif`
--
ALTER TABLE `justificatif`
  MODIFY `id_justificatif` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`ID_User`) REFERENCES `fichefrais` (`ID_FicheFrais`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
