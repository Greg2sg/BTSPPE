-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 13 mars 2023 à 14:55
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
  `description` varchar(255) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fichefrais`
--

INSERT INTO `fichefrais` (`ID_FicheFrais`, `poste`, `mois`, `date`, `hebergement`, `repas`, `transport`, `prix_total`, `autres`, `ID_User`, `nom`, `prenom`, `description`, `etat`) VALUES
(3, 'devellopeur', 2, '2022-12-15', 80, 20, 5, 120, 0, 4, 0, 0, 'ok', 0),
(4, 'devellopeur', 2, '2022-12-21', 55, 20, 10, 95, 10, 4, 0, 0, 'affaire dans le sud de la france', 0),
(6, 'moi', 0, '2022-12-22', 10, 10, 20, 10, 0, 4, 0, 0, 'rendez vous chez un clients', 2),
(7, 'moi', 1, '2022-12-22', 12, 12, 12, 12, 0, 4, 0, 0, 'voyage entreprise', 0),
(24, 'moi', 10, '2022-12-07', 10, 10, 10, 0, 10, 4, 0, 0, 'deplacement professionel', 0),
(25, 'moi', 12, '2022-12-15', 10, 10, 10, 0, 10, 4, 0, 0, 'deplacement professionel', 0),
(26, 'moi', 12, '2022-12-13', 10, 10, 10, 0, 10, 4, 0, 0, 'deplacement professionel', 0),
(27, 'moi', 12, '2022-12-13', 15, 15, 15, 0, 15, 3, 0, 0, 'lance professesionel', 2),
(28, 'salarie', 12, '2022-12-13', 10, 10, 100, 0, 20, 3, 0, 0, 'frais', 1),
(29, 'OL', 12, '2022-12-12', 15, 30, 60, 0, 10, 3, 0, 0, 'Paye', 1),
(30, 'salarie', 6, '2022-06-10', 10, 35, 14, 0, 78, 3, 0, 0, 'frais', 0),
(32, 'test', 12, '2023-01-23', 10, 10, 10, 0, 10, 4, 0, 0, '', 0),
(33, 'salarie', 1, '2023-01-23', 10, 10, 10, 0, 10, 3, 0, 0, 'frais', 0),
(34, 'efef', 6, '2023-06-14', 50, 50, 50, 0, 20, 3, 0, 0, 'frais', 0);

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
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id_role` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id_role`, `role`) VALUES
(1, 'visiteur'),
(2, 'comptable'),
(3, 'admin');

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
  `Responsable` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_User`, `Poste`, `Prenom`, `Nom`, `Mail`, `Mdp`, `Responsable`, `id_role`, `adresse`) VALUES
(3, '0', 'rayan', 'Bakhouche', 'yayan1@live.fr', '$2y$10$twEXco9JqDilNybB6X4pte8tUAFkZkfFvGB6gWdkCYo3/8KAI0tXG', 'zdz', 3, '131 route de faramaz'),
(4, 'devellopeur', 'Martin', 'Billaul', 'martinbillault9@gmail.com', '$2y$10$kswuKfQYOtVo7ZFIO1dVQ.qRkBIsVsvNwmiFku7bbfcmwVsRV4ku2', 'martin', 1, '131 route de faramaz');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  ADD PRIMARY KEY (`ID_FicheFrais`),
  ADD KEY `fk_user` (`ID_User`);

--
-- Index pour la table `justificatif`
--
ALTER TABLE `justificatif`
  ADD PRIMARY KEY (`id_justificatif`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`),
  ADD KEY `fk_role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  MODIFY `ID_FicheFrais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `justificatif`
--
ALTER TABLE `justificatif`
  MODIFY `id_justificatif` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `profil` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
