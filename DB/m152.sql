-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 25 mars 2021 à 14:42
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `m152`
--

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `idMedia` int(5) NOT NULL,
  `typeMedia` varchar(20) NOT NULL,
  `nomMedia` varchar(200) NOT NULL,
  `creationDate` timestamp(6) NOT NULL,
  `modificationDate` timestamp(6) NOT NULL,
  `idPost` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`idMedia`, `typeMedia`, `nomMedia`, `creationDate`, `modificationDate`, `idPost`) VALUES
(7, 'png', '6037a940d5f8e.png', '2021-02-24 23:00:00.000000', '2021-02-24 23:00:00.000000', 5),
(8, 'png', '6037b89f51bb0.png', '2021-02-24 23:00:00.000000', '2021-02-24 23:00:00.000000', 9),
(9, 'gif', '6037b8ca953c7.gif', '2021-02-24 23:00:00.000000', '2021-02-24 23:00:00.000000', 10),
(10, 'jpg', '60599d0196dd5.jpg', '2021-03-22 23:00:00.000000', '2021-03-22 23:00:00.000000', 11),
(11, 'png', '60599d0e4ae3e.png', '2021-03-22 23:00:00.000000', '2021-03-22 23:00:00.000000', 12),
(12, 'mp4', '6059a26ecdfda.mp4', '2021-03-22 23:00:00.000000', '2021-03-22 23:00:00.000000', 13),
(13, 'mp3', '6059a76060c9e.mp3', '2021-03-22 23:00:00.000000', '2021-03-22 23:00:00.000000', 14),
(14, 'png', '605c859f4d468.png', '2021-03-24 23:00:00.000000', '2021-03-24 23:00:00.000000', 16),
(15, 'png', '605c866e0fb1a.png', '2021-03-24 23:00:00.000000', '2021-03-24 23:00:00.000000', 18),
(16, 'png', '605c866e13631.png', '2021-03-24 23:00:00.000000', '2021-03-24 23:00:00.000000', 18),
(17, 'png', '605c866e1749d.png', '2021-03-24 23:00:00.000000', '2021-03-24 23:00:00.000000', 18),
(18, 'png', '605c866e1b496.png', '2021-03-24 23:00:00.000000', '2021-03-24 23:00:00.000000', 18),
(19, 'png', '605c866e1f2e5.png', '2021-03-24 23:00:00.000000', '2021-03-24 23:00:00.000000', 18),
(20, 'png', '605c866e22e7d.png', '2021-03-24 23:00:00.000000', '2021-03-24 23:00:00.000000', 18),
(21, 'png', '605c866e268af.png', '2021-03-24 23:00:00.000000', '2021-03-24 23:00:00.000000', 18),
(22, 'mp4', '605c866e2a939.mp4', '2021-03-24 23:00:00.000000', '2021-03-24 23:00:00.000000', 18),
(23, 'mp3', '605c9adf1c28b.mp3', '2021-03-24 23:00:00.000000', '2021-03-24 23:00:00.000000', 19),
(24, 'png', '605c9bb484ced.png', '2021-03-24 23:00:00.000000', '2021-03-24 23:00:00.000000', 20),
(25, 'png', '605c9bb48826e.png', '2021-03-24 23:00:00.000000', '2021-03-24 23:00:00.000000', 20),
(26, 'png', '605c9bb48bf0d.png', '2021-03-24 23:00:00.000000', '2021-03-24 23:00:00.000000', 20);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `idPost` int(5) NOT NULL,
  `commentaire` varchar(100) NOT NULL,
  `creationDate` timestamp(6) NOT NULL,
  `modificationDate` timestamp(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`idPost`, `commentaire`, `creationDate`, `modificationDate`) VALUES
(11, 'dsfsdf', '2021-03-22 23:00:00.000000', '2021-03-22 23:00:00.000000'),
(13, 'afafafaf', '2021-03-22 23:00:00.000000', '2021-03-22 23:00:00.000000'),
(14, 'La musique', '2021-03-22 23:00:00.000000', '2021-03-22 23:00:00.000000'),
(19, 'DACCORD', '2021-03-24 23:00:00.000000', '2021-03-24 23:00:00.000000');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`idMedia`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `idMedia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
