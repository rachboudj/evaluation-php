-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 15 août 2022 à 14:15
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog-eval`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_article` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(45) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `titre`, `description`, `auteur`, `created_at`, `modified_at`, `status`) VALUES
(1, 'Un blog', 'un blog', 'Rachid', '2022-08-02 16:11:49', '2022-08-02 16:11:49', 'privé'),
(2, 'yoooo', 'yoooooooooooooooo', 'yoyo', '2022-08-04 13:09:05', '2022-08-04 13:09:05', 'publish'),
(3, 'yoooo', 'yoooooooooooooooo', 'yoyo', '2022-08-04 13:09:09', '2022-08-04 13:09:09', 'publish'),
(4, 'roro', 'roooooooooooooooooooo', 'roro', '2022-08-04 13:52:09', '2022-08-04 13:52:09', 'publish'),
(5, 'toto', 'tooooooooooooooooooo', 'toto', '2022-08-04 13:54:37', '2022-08-04 13:54:37', 'publish'),
(6, 'zoooooooo', 'zoooooooooooooo', 'zozo', '2022-08-04 13:57:26', '2022-08-04 13:57:26', 'draft'),
(7, 'gogo', 'gooooooooooooooo', 'gogo', '2022-08-04 13:59:45', '2022-08-04 13:59:45', 'publish'),
(8, 'gogo', 'gooooooooooooooo', 'Rachid2', '2022-08-04 14:01:00', '2022-08-04 14:01:00', 'publish');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaire` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `commentaires_id_commentaire` int(11) DEFAULT NULL,
  `id_article` int(11) NOT NULL,
  `user_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id_commentaire`, `description`, `auteur`, `created_at`, `modified_at`, `status`, `commentaires_id_commentaire`, `id_article`, `user_rating`) VALUES
(4, 'le commentaire de toto', 'Toto', '2022-08-05 12:33:02', '2022-08-05 12:33:02', 'new', NULL, 0, NULL),
(5, 'Zizou', 'Zidane', '2022-08-05 12:45:48', '2022-08-05 12:45:48', 'Nouveau', NULL, 0, NULL),
(7, 'yooooooooo', 'yoyo', '2022-08-04 22:55:29', '2022-08-04 22:55:29', 'draft', NULL, 0, NULL),
(8, 'ouaiiiiiiis', 'Rach', '2022-08-05 11:37:46', '2022-08-05 11:37:46', 'new', NULL, 0, NULL),
(9, 'ouaiiiiiiis', 'Rach', '2022-08-05 11:39:19', '2022-08-05 11:39:19', 'new', NULL, 0, NULL),
(10, 'lets\' goooooo', 'yoyo', '2022-08-05 15:00:40', '2022-08-05 15:00:40', 'new', NULL, 4, NULL),
(11, 'lets\' goooooo', 'yoyo', '2022-08-05 15:00:43', '2022-08-05 15:00:43', 'new', NULL, 4, NULL),
(12, 'looooooooooo', 'Lolo', '2022-08-05 15:01:59', '2022-08-05 15:01:59', 'new', NULL, 5, NULL),
(13, 'looooooooooo', 'Lolo', '2022-08-05 15:02:04', '2022-08-05 15:02:04', 'new', NULL, 5, NULL),
(14, 'looooooooooo', 'Lolo', '2022-08-05 15:02:15', '2022-08-05 15:02:15', 'new', NULL, 5, NULL),
(15, 'yeyooooooo', 'Yeyo', '2022-08-05 15:14:25', '2022-08-05 15:14:25', 'new', NULL, 3, NULL),
(16, 'yooooooooo', 'yooooooo', '2022-08-05 15:15:14', '2022-08-05 15:15:14', 'new', NULL, 3, NULL),
(17, 'Marceeeeeel', 'Marcel', '2022-08-05 15:16:12', '2022-08-05 15:16:12', 'new', NULL, 3, NULL),
(21, 'Neymaaaaar', 'Neymaaaaar', '2022-08-05 15:20:16', '2022-08-05 15:20:16', 'new', NULL, 5, NULL),
(22, 'Neymaaaaar', 'Neymaaaaar', '2022-08-05 15:20:19', '2022-08-05 15:20:19', 'new', NULL, 5, NULL),
(26, 'Raaaaaachiiiiiiiid', 'Raaaaach', '2022-08-05 15:22:03', '2022-08-06 02:55:26', 'new', NULL, 8, NULL),
(28, 'OOOOOOOOOOOOH', 'Helloooooooo', '2022-08-05 16:06:43', '2022-08-05 16:06:43', 'new', NULL, 5, NULL),
(29, 'okkkkkkkkkkkkkkk', 'yoyo ouaiiiiis', '2022-08-05 22:33:08', '2022-08-05 23:21:18', 'new', NULL, 8, NULL),
(33, 'ouiiiiiiiii', 'woaaaaaaw', '2022-08-06 02:50:55', '2022-08-06 02:50:55', 'new', NULL, 7, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `telephone` varchar(12) DEFAULT NULL,
  `UUID` varchar(45) DEFAULT NULL,
  `pseudo` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT 'Utilisateur inscrit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `email`, `mdp`, `telephone`, `UUID`, `pseudo`, `role`) VALUES
(3, 'zozo', 'zozo', 'zozo@gmail.com', '$2y$10$5qwZTRMr9ZOmnJEW8gv5hecMqaToN5f487TMDsUiE3f4KyoVzzEai', NULL, NULL, NULL, 'utilisateurInscrit'),
(4, 'titi', 'titi', 'titi@gmail.com', '$2y$10$969Nb9aBMHWVHx6Kmz87UeWVUyz5oNRzrDWnlo08e7nUYRKiealzW', NULL, NULL, NULL, 'redacteur'),
(5, 'yoyo', 'yoyooooooooo', 'yoyo@gmail.com', '$2y$10$YE7hX29LlHy4HcIwYieIPeEgfzEM085lB3/CkD7gKgMjCgwQ94xZ6', NULL, NULL, NULL, 'admin'),
(6, 'zizou', 'zizou', 'zizou@gmail.com', '$2y$10$bOi9mW1BjlxQT8BRf9BU4uHVLnibO7al9xicArIch9FdaJxrZLcim', NULL, NULL, NULL, 'moderateur'),
(7, 'modo', 'modo', 'modo@gmail.com', '$2y$10$fjkXNQPX/iF36ABCFogbpuA/x43fwI5z1pcoRbqUlalnZl016kWBC', NULL, NULL, NULL, 'Utilisateur inscrit'),
(8, 'redac', 'redac', 'redac@gmail.com', '$2y$10$QB13o2LAAwnW3XSq.MMZTeAYuwsRCLnGIa1Tb/wWjM21VUwyNLGMS', NULL, NULL, NULL, 'Utilisateur inscrit'),
(9, 'admin', 'admin', 'admin@gmail.com', '$2y$10$vZRlZURTLdeArFnhalNTFOpc26CnlDOvRUcvb3Du5xSdUnssyOSwa', NULL, NULL, NULL, 'Utilisateur inscrit'),
(10, 'user', 'user', 'user@gmail.com', '$2y$10$.sGPBg4Lrg4j4DtP1jzFPuLs3vZXVmpQgAhbZ4AOBR.LxdXlUeWmW', NULL, NULL, NULL, 'Utilisateur inscrit');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs_has_articles`
--

CREATE TABLE `utilisateurs_has_articles` (
  `utilisateurs_id_utilisateur` int(11) NOT NULL,
  `articles_id_article` int(11) NOT NULL,
  `commentaires_id_commentaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `fk_commentaires_commentaires1_idx` (`commentaires_id_commentaire`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `utilisateurs_has_articles`
--
ALTER TABLE `utilisateurs_has_articles`
  ADD PRIMARY KEY (`utilisateurs_id_utilisateur`,`articles_id_article`),
  ADD KEY `fk_utilisateurs_has_articles_articles1_idx` (`articles_id_article`),
  ADD KEY `fk_utilisateurs_has_articles_utilisateurs1_idx` (`utilisateurs_id_utilisateur`),
  ADD KEY `fk_utilisateurs_has_articles_commentaires1_idx` (`commentaires_id_commentaire`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `fk_commentaires_commentaires1` FOREIGN KEY (`commentaires_id_commentaire`) REFERENCES `mydb`.`commentaires` (`id_commentaire`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateurs_has_articles`
--
ALTER TABLE `utilisateurs_has_articles`
  ADD CONSTRAINT `fk_utilisateurs_has_articles_articles1` FOREIGN KEY (`articles_id_article`) REFERENCES `mydb`.`articles` (`id_article`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateurs_has_articles_commentaires1` FOREIGN KEY (`commentaires_id_commentaire`) REFERENCES `mydb`.`commentaires` (`id_commentaire`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateurs_has_articles_utilisateurs1` FOREIGN KEY (`utilisateurs_id_utilisateur`) REFERENCES `mydb`.`utilisateurs` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
