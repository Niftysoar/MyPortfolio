-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 12 jan. 2026 à 15:55
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `my_portfolio_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `idprojects` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL,
  `github_link` varchar(255) NOT NULL,
  `project_link` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`idprojects`, `title`, `description`, `image`, `github_link`, `project_link`, `skills`) VALUES
(1, 'Esportify', 'Plateforme e-sport dédiée à la gestion et à la découverte d’événements gaming.', 'image/projects/esportify.png', 'https://github.com/Niftysoar/ECF-Esportify', 'https://ecf-esportify.onrender.com/', ''),
(2, 'Cuis\'Zen', 'Site de cuisine axé sur des recettes simples et une expérience utilisateur zen.', 'image/projects/cuiszen.jpg', 'https://github.com/Niftysoar/Cuis-Zen', 'nope', ''),
(3, 'GameStore', 'Plateforme permettant de créer et gérer sa collection de jeux vidéo.', 'image/projects/gamestore.png', 'https://github.com/Niftysoar/Gamestore-Back-end-Project', 'No-link', '');

-- --------------------------------------------------------

--
-- Structure de la table `projects_skills`
--

CREATE TABLE `projects_skills` (
  `idprojects` int(11) NOT NULL,
  `idskills` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projects_skills`
--

INSERT INTO `projects_skills` (`idprojects`, `idskills`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 2),
(3, 4),
(3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `idskills` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`idskills`, `name`, `logo`) VALUES
(1, 'HTML', 'image/skills/HTML.png'),
(2, 'CSS', 'image/skills/CSS.png'),
(3, 'JS', 'image/skills/JS.jpg'),
(4, 'PHP', 'image/skills/php.png'),
(5, 'Docker', 'image/skills/docker.webp');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `email`, `password`) VALUES
(1, 'berthomath@hotmail.com', '$2y$10$pErThjAodp4O07X32v1TD./ik0/aPtebnz.IRG/pkgNBxd.6EG.C2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`idprojects`);

--
-- Index pour la table `projects_skills`
--
ALTER TABLE `projects_skills`
  ADD PRIMARY KEY (`idprojects`,`idskills`),
  ADD KEY `FK_skills` (`idskills`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`idskills`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `idprojects` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `idskills` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `projects_skills`
--
ALTER TABLE `projects_skills`
  ADD CONSTRAINT `FK_projects` FOREIGN KEY (`idprojects`) REFERENCES `projects` (`idprojects`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_skills` FOREIGN KEY (`idskills`) REFERENCES `skills` (`idskills`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
