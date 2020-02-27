-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql_db:3306
-- Généré le :  mer. 07 août 2019 à 11:10
-- Version du serveur :  5.7.27
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
-- Base de données :  `proj_wp_real_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `pwr_db_posts`
--

CREATE TABLE `pwr_db_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `pwr_db_posts`
--

INSERT INTO `pwr_db_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(76, 1, '2019-08-06 16:20:09', '2019-08-06 14:20:09', 'Barquette de myrtilles Bio produites à la ferme et sélectionnées pour vous\r\n\r\n<strong>Barquette 250g</strong>\r\n\r\n<img class=\"alignnone size-medium wp-image-38\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/myrtilles-bio-300x300.jpg\" alt=\"\" width=\"300\" height=\"300\" />', 'Myrtilles 250g', 'Barquette de myrtilles Bio produites à la ferme et sélectionnées pour vous\r\n\r\n<img class=\"size-medium wp-image-38 alignright\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/myrtilles-bio-300x300.jpg\" alt=\"\" width=\"300\" height=\"300\" />barquette 250g', 'publish', 'open', 'closed', '', 'myrtilles-250g', '', '', '2019-08-06 16:24:31', '2019-08-06 14:24:31', '', 0, 'http://localhost:8080/projetwpreal/?post_type=product&#038;p=76', 0, 'product', '', 1),
(78, 1, '2019-08-06 16:28:35', '2019-08-06 14:28:35', 'Barquette de myrtilles Bio produites à la ferme et sélectionnées pour vous\r\n\r\n<strong>barquette 1kg</strong>\r\n\r\n<img class=\"alignnone size-medium wp-image-38\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/myrtilles-bio-300x300.jpg\" alt=\"\" width=\"300\" height=\"300\" />', 'Myrtilles 1kg', 'Barquette de myrtilles Bio produites à la ferme et sélectionnées pour vous\r\n\r\nbarquette 1kg\r\n\r\n<img class=\"alignnone size-medium wp-image-38\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/myrtilles-bio-300x300.jpg\" alt=\"\" width=\"300\" height=\"300\" />', 'publish', 'open', 'closed', '', 'myrtilles-1kg', '', '', '2019-08-07 13:03:21', '2019-08-07 11:03:21', '', 0, 'http://localhost:8080/projetwpreal/?post_type=product&#038;p=78', 0, 'product', '', 0),
(79, 1, '2019-08-06 16:35:44', '2019-08-06 14:35:44', 'Sirop de myrtilles Bio produits à la ferme avec des fruits sélectionnées pour vous\r\n\r\nsans trop d\'ajout de sucre\r\n\r\n<strong>sirop 1 litre</strong>\r\n\r\n<img class=\"alignnone size-medium wp-image-37\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/ob_d9d21f_sirop-de-myrtille-2-188x300.jpg\" alt=\"\" width=\"188\" height=\"300\" />', 'Sirop de myrtilles 1 litre', 'Sirop de myrtilles Bio produits à la ferme avec des fruits sélectionnées pour vous\r\n\r\n<strong>sirop 1 litre</strong>\r\n\r\n<img class=\"alignnone size-medium wp-image-37\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/ob_d9d21f_sirop-de-myrtille-2-188x300.jpg\" alt=\"\" width=\"188\" height=\"300\" />', 'publish', 'open', 'closed', '', 'sirop-de-myrtilles-1-litre', '', '', '2019-08-07 11:27:03', '2019-08-07 09:27:03', '', 0, 'http://localhost:8080/projetwpreal/?post_type=product&#038;p=79', 0, 'product', '', 0),
(80, 1, '2019-08-06 16:40:29', '2019-08-06 14:40:29', 'Sirop de myrtilles Bio produits à la ferme avec des fruits sélectionnées pour vous\r\n\r\nsans ajout de sucre\r\n\r\n<strong>sirop 50cl\r\n</strong>\r\n\r\n<img class=\"alignnone size-medium wp-image-43\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/393_DSC3257-200x300.jpg\" alt=\"\" width=\"200\" height=\"300\" />', 'Sirop de myrtilles 50cl', 'Sirop de myrtilles Bio produits à la ferme avec des fruits sélectionnées pour vous\r\n\r\n<strong>sirop 50cl\r\n</strong>\r\n\r\n<img class=\"alignnone size-medium wp-image-43\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/393_DSC3257-200x300.jpg\" alt=\"\" width=\"200\" height=\"300\" />', 'publish', 'open', 'closed', '', 'sirop-de-myrtilles-50cl', '', '', '2019-08-07 11:27:16', '2019-08-07 09:27:16', '', 0, 'http://localhost:8080/projetwpreal/?post_type=product&#038;p=80', 0, 'product', '', 1),
(81, 1, '2019-08-07 08:10:47', '2019-08-07 06:10:47', 'fruits récoltés à la main, production locale et biologique\r\n\r\n<strong>pot 120g</strong>\r\n\r\n<img class=\"alignnone size-medium wp-image-41\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/confiture-myrtille-1200-300x225.jpg\" alt=\"\" width=\"300\" height=\"225\" />', 'Confiture de myrtilles 120g', 'fruits récoltés à la main, production locale et biologique\r\n\r\n<strong>pot 120g</strong>\r\n\r\n<img class=\"alignnone size-medium wp-image-41\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/confiture-myrtille-1200-300x225.jpg\" alt=\"\" width=\"300\" height=\"225\" />', 'publish', 'open', 'closed', '', 'confiture-de-myrtilles-120g', '', '', '2019-08-07 09:42:46', '2019-08-07 07:42:46', '', 0, 'http://localhost:8080/projetwpreal/?post_type=product&#038;p=81', 0, 'product', '', 0),
(94, 1, '2019-08-07 09:38:57', '2019-08-07 07:38:57', 'production locale et BIO, récolte des fruits manuelle.\r\n\r\n<strong>250g</strong>\r\n\r\n<img class=\"alignnone size-medium wp-image-39\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/i25551-confiture-de-myrtilles-classique-300x240.jpg\" alt=\"\" width=\"300\" height=\"240\" />', 'confiture de myrtilles 250g', 'production locale et BIO, récolte des fruits manuelle.\r\n\r\n<strong>250g</strong><img class=\"alignnone size-medium wp-image-39\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/i25551-confiture-de-myrtilles-classique-300x240.jpg\" alt=\"\" width=\"300\" height=\"240\" />', 'publish', 'open', 'closed', '', 'confiture-de-myrtilles-250g', '', '', '2019-08-07 13:04:11', '2019-08-07 11:04:11', '', 0, 'http://localhost:8080/projetwpreal/?post_type=product&#038;p=94', 0, 'product', '', 0),
(101, 1, '2019-08-07 11:13:36', '2019-08-07 09:13:36', 'produits entièrement BIO poukr 4 personnes\r\n\r\npâte faite maison avec des oeufs frais de la ferme en élevage en plein air\r\n\r\n<img class=\"alignnone size-medium wp-image-42\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/bb_bbzg120815_0023b_x-300x252.jpg\" alt=\"\" width=\"300\" height=\"252\" />', 'tarte aux myrtilles', 'tarte faite maison pour 4 personnes\r\n\r\n<img class=\"alignnone size-medium wp-image-42\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/bb_bbzg120815_0023b_x-300x252.jpg\" alt=\"\" width=\"300\" height=\"252\" />', 'publish', 'open', 'closed', '', 'tarte-aux-myrtilles', '', '', '2019-08-07 11:13:37', '2019-08-07 09:13:37', '', 0, 'http://localhost:8080/projetwpreal/?post_type=product&#038;p=101', 0, 'product', '', 0),
(102, 1, '2019-08-07 11:18:26', '2019-08-07 09:18:26', 'Production Bio pour 6 personnes\r\n\r\ncake fait maison aux myrtille de la ferme\r\n\r\n<img class=\"alignnone size-medium wp-image-40\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/genoise-aux-myrtilles-avec-fondue-de-chocolat-300x200.jpg\" alt=\"\" width=\"300\" height=\"200\" />', 'Cake aux myrtilles', 'cake aux myrtilles de la ferme\r\n\r\n<img class=\"alignnone size-medium wp-image-40\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/genoise-aux-myrtilles-avec-fondue-de-chocolat-300x200.jpg\" alt=\"\" width=\"300\" height=\"200\" />', 'publish', 'open', 'closed', '', 'cake-aux-myrtilles', '', '', '2019-08-07 11:18:27', '2019-08-07 09:18:27', '', 0, 'http://localhost:8080/projetwpreal/?post_type=product&#038;p=102', 0, 'product', '', 0),
(103, 1, '2019-08-07 11:21:53', '2019-08-07 09:21:53', 'Production Bio\r\n\r\nmuffins fait maison aux myrtille de la ferme\r\n\r\n<img class=\"alignnone size-medium wp-image-36\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/R1251-300x168.jpg\" alt=\"\" width=\"300\" height=\"168\" />', 'Muffins aux myrtilles', 'muffins fait maison aux myrtille de la ferme\r\n\r\n<img class=\"alignnone size-medium wp-image-36\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/R1251-300x168.jpg\" alt=\"\" width=\"300\" height=\"168\" />', 'publish', 'open', 'closed', '', 'muffins-aux-myrtilles', '', '', '2019-08-07 13:04:47', '2019-08-07 11:04:47', '', 0, 'http://localhost:8080/projetwpreal/?post_type=product&#038;p=103', 0, 'product', '', 0),
(104, 1, '2019-08-07 11:26:11', '2019-08-07 09:26:11', 'tartelettes faites maison aux myrtille de la ferme\r\n\r\nproduction Bio lot de 2 pièces\r\n\r\n<img class=\"alignnone size-medium wp-image-35\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/patisserie-bio-tarte-myrtilles-01-200x300.jpg\" alt=\"\" width=\"200\" height=\"300\" />', 'Tartelette aux myrtilles', 'tartelettes faites maison aux myrtille de la ferme lot de 2 pièces\r\n\r\n<img class=\"alignnone size-medium wp-image-35\" src=\"http://localhost:8080/projetwpreal/wp-content/uploads/2019/08/patisserie-bio-tarte-myrtilles-01-200x300.jpg\" alt=\"\" width=\"200\" height=\"300\" />', 'publish', 'open', 'closed', '', 'tartelette-aux-myrtilles', '', '', '2019-08-07 11:30:28', '2019-08-07 09:30:28', '', 0, 'http://localhost:8080/projetwpreal/?post_type=product&#038;p=104', 0, 'product', '', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pwr_db_posts`
--
ALTER TABLE `pwr_db_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pwr_db_posts`
--
ALTER TABLE `pwr_db_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
