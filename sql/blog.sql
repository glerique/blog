-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 04 mai 2020 à 12:14
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `creationDate` date NOT NULL,
  `validated` int(1) DEFAULT '1',
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_commentaire_post_idx` (`postId`),
  KEY `fk_commentaire_utilisateur_idx` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `content`, `creationDate`, `validated`, `postId`, `userId`) VALUES
(1, 'Super blog', '2020-04-02', 2, 7, 7),
(2, 'Merci ', '2020-04-02', 2, 7, 1),
(5, 'Top', '2020-04-02', 2, 11, 10),
(6, 'Vraiment Top  ', '2020-04-03', 2, 11, 12),
(7, 'yo c&#39;est cool ', '2020-04-03', 2, 11, 9),
(11, 'cool ', '2020-04-08', 2, 11, 1),
(27, 'Genial !&#13;&#10;', '2020-04-16', 2, 7, 9),
(28, 'Merci ', '2020-04-16', 2, 7, 1),
(32, 'bonjourno', '2020-04-28', 2, 7, 10),
(33, 'test comment', '2020-04-29', 2, 14, 1),
(34, 'Top', '2020-04-29', 2, 15, 10),
(35, 'Excellent logiciel ', '2020-04-30', 2, 15, 8),
(36, 'Hello les loulous', '2020-04-30', 2, 15, 1),
(37, 'Très beau texte', '2020-04-30', 2, 14, 8),
(39, 'Super blog', '2020-04-30', 1, 7, 7),
(40, 'Cool', '2020-04-30', 2, 10, 1),
(41, 'Génial cet article', '2020-05-03', 2, 15, 10),
(42, 'Bonjour Ernesto', '2020-05-04', 2, 7, 1),
(44, 'Bonjour', '2020-05-04', 1, 14, 10);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `standfirst` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `creationDate` date NOT NULL,
  `modificationDate` date DEFAULT NULL,
  `published` varchar(45) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_post_utilisateur_idx` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `standfirst`, `content`, `author`, `creationDate`, `modificationDate`, `published`, `userId`) VALUES
(7, 'Bienvenue sur mon blog', 'Bienvenue sur mon premier blog réalisé en php orienté objet', 'Dans le cadre de mon parcours de développeur d\'application PHP, j\'ai réalisé ce petit blog afin de montrer mes compétences en programmation.', 'admin', '2020-02-21', '2020-04-28', 'Publié', 1),
(10, 'Windows 10 et Linux', 'Windows 10 prendra bientôt en charge les fichiers Linux ', 'Ils le seront directement depuis l’Explorateur. La fonctionnalité est pour le moment accessible aux insiders. Microsoft vient de lancer la version 19603 de Windows 10  Preview. Celle-ci introduit une nouvelle entrée dans l’explorateur de fichiers Windows. Tout en bas du volet de navigation à gauche, vous apercevrez la fameuse icône Tux, le manchot qui sert de mascotte officielle à Linux. Source : Phonandroid.com', 'admin', '2020-03-31', '2020-04-30', 'Publié', 1),
(11, 'Openclassrooms', 'Aujourd’hui une petite présentation de ce site ', 'OpenClassrooms est un site web de formation en ligne qui propose à ses membres des cours certifiants et des parcours débouchant sur des métiers en croissance. Ses contenus sont réalisés en interne, par des écoles, des universités, des entreprises partenaires comme Microsoft ou IBM, ou historiquement par des bénévoles. Jusqu&#39;en 2018, n&#39;importe quel membre du site pouvait être auteur, via un outil nommé « interface de rédaction » puis « Course Lab ». De nombreux cours sont issus de la communauté, mais ne sont plus mis en avant. Initialement orientée autour de la programmation informatique, la plate-forme couvre depuis 2013 des thématiques plus larges tels que le marketing, l&#39;entrepreneuriat et les sciences.', 'admin', '2020-04-02', '2020-05-04', 'Publié', 1),
(14, 'Le Petit Prince', 'Voici un extrait de ce chef d&#39;oeuvre ', 'Les gens ont des étoiles qui ne sont pas les mêmes. Pour les uns, qui voyagent, ce sont des guides. Pour d’autres, elles ne sont rien que de petites lumières. Pour d’autres, qui sont savants, elles sont des problèmes.', 'Rédacteur', '2020-04-28', '2020-05-04', 'Publié', 1),
(15, 'Visual studio code', 'Microsoft a annoncé la sortie de Visual Studio Code 1.44, c&#39;est à dire la version de mars de cet outil.', 'La nouveauté la plus marquante est la sortie de la vue chronologie (Timeline view) de son statut de préversion. La vue chronologique est désormais activée par défaut.&#13;&#10;&#13;&#10;La vue chronolgique est une vue unifiée pour visualiser les événements de séries chronologiques (par exemple, les validations Git, les sauvegardes de fichiers, les exécutions de test, etc.) pour un fichier. La vue Chronologie est automatiquement mise à jour en affichant la chronologie de l&#39;éditeur actuellement actif, par défaut. A l&#39;instar d&#39;autres vues, la vue Chronologie prend en charge la recherche ou le filtrage lors de la frappe.&#13;&#10;&#13;&#10;Dans cette version, l&#39;extension Git intégrée fournit une source de chronologie qui fournit l&#39;historique de validation Git du fichier spécifié. La sélection d&#39;un commit ouvrira une vue diff des changements introduits par ce commit.&#13;&#10;&#13;&#10;Source : programmez.com', 'Rédacteur', '2020-04-29', '2020-05-04', 'Publié', 1),
(17, 'Le télétravail', 'Actuellement en période de télétravail, j&#39;ai décidé de rédiger un petit article', 'Le télétravail est une activité professionnelle effectuée en tout ou partie à distance du lieu où le résultat du travail est attendu. Il s&#39;oppose au travail sur site, à savoir le travail effectué dans les locaux de son employeur.&#13;&#10;Source : wikipedia.org', 'admin', '2020-05-04', NULL, 'En attente', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastName` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `nickname` varchar(45) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `userRole` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo_UNIQUE` (`nickname`),
  UNIQUE KEY `mail_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `lastName`, `firstName`, `email`, `nickname`, `pswd`, `userRole`) VALUES
(1, 'Lerique', 'gaël', 'admin@admin.com', 'admin', '$2y$10$EzhbA2YwiUo971rG.ebDiOZVNoe9/gUFqnod2fPsd7vOw/H55qcdq', 'Admin'),
(7, 'durand', 'maurice', 'durand.maurice@gmail.com', 'maurice', '$2y$10$EzhbA2YwiUo971rG.ebDiOZVNoe9/gUFqnod2fPsd7vOw/H55qcdq', 'Membre'),
(8, 'Natus', 'gilbert', 'gilbert.natus@free.fr', 'gilbert', '$2y$10$4uy8xam1eVh5LnvGQsCkYO1NU/QiNJBAHgpK/fVrilMje/cU63J0O', 'Membre'),
(9, 'Juve', 'paul', 'pjuve@gmail.com', 'Polo', '$2y$10$FAAtHhtpzC3C.BmVMQ82AuHYTULlglTCU53fkfa94iEVdPqWFh2BG', 'Membre'),
(10, 'Souza', 'Ernesto', 'user@user.com', 'Ernesto', '$2y$10$6nNRTf1hedJq1Ys3XBEJ4OlCO9w0.H.SiU/DyXfEEbY6yZQk3WYD2', 'Membre'),
(11, 'test', 'test', 'test@toto.test', 'test', '$2y$10$GPWr2iAm9HU4C7SM2wmYuO2PxFBDDtOUEbbLMUK09TZaNHCPrQu22', 'Membre'),
(12, 'Tatou', 'Colette', 'test@toto.toto', 'Colette', '$2y$10$kfDOdErsNWg3SE7EHv5O7epXCrgFuHE6WzZUareErexlfOsbkW3Qy', 'Membre'),
(13, 'Dupont', 'miguel', 'mdupont@test.fr', 'miguel', '$2y$10$4rk.vhHfRnwQiRwsxDdkmOdJ0Wbg9igf5oxCqBpZc5H1bAan1xDLq', 'Membre');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_commentaire_post` FOREIGN KEY (`postId`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commentaire_utilisateur` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_utilisateur` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
