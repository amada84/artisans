-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Mer 26 Mars 2014 à 07:32
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `artisans`
--

-- --------------------------------------------------------

--
-- Structure de la table `art_market_articles`
--

CREATE TABLE IF NOT EXISTS `art_market_articles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `resume` text NOT NULL,
  `content` text NOT NULL,
  `media_id` bigint(20) NOT NULL,
  `price` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `featured` tinyint(2) NOT NULL DEFAULT '0',
  `featured_expires` datetime NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '0',
  `is_editable` tinyint(2) NOT NULL DEFAULT '1',
  `is_draft` tinyint(2) NOT NULL DEFAULT '1',
  `ip_address` varchar(255) NOT NULL,
  `validated_date` datetime NOT NULL,
  `closing_date` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `art_market_categories`
--

CREATE TABLE IF NOT EXISTS `art_market_categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) DEFAULT NULL,
  `foreign_key` bigint(20) NOT NULL,
  `model` varchar(255) NOT NULL,
  `record_count` int(11) NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `ads_published` int(11) NOT NULL DEFAULT '0',
  `ads_unpublished` int(11) NOT NULL DEFAULT '0',
  `category_thumb` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`foreign_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Contenu de la table `art_market_categories`
--

INSERT INTO `art_market_categories` (`id`, `category_id`, `foreign_key`, `model`, `record_count`, `lft`, `rght`, `name`, `slug`, `description`, `meta_description`, `meta_keywords`, `ads_published`, `ads_unpublished`, `category_thumb`, `created`, `modified`, `deleted`, `deleted_date`) VALUES
(36, NULL, 0, 'Ad', 0, 1, 8, 'Auto', 'auto', 'Description de la categorie auto', 'Description de la categorie auto', '', 0, 0, '/img/categories/2014/03/Think_Psitively.jpg', '2014-03-09 00:05:08', '2014-03-09 00:05:08', 0, '0000-00-00 00:00:00'),
(37, NULL, 0, 'Ad', 0, 9, 16, 'Multimedia', 'multimedia', 'Description de la categorie multimedia', 'Description de la categorie multimedia', '', 0, 0, '/img/categories/2014/03/Think_Psitively-1.jpg', '2014-03-09 00:06:01', '2014-03-09 00:06:01', 0, '0000-00-00 00:00:00'),
(38, NULL, 0, 'Ad', 0, 17, 22, 'Immobilier', 'immobilier', 'Description de la catégorie immobilier', 'Description de la catégorie immobilier', '', 0, 0, '/img/categories/2014/03/Think_Psitively-2.jpg', '2014-03-09 00:07:12', '2014-03-09 00:07:12', 0, '0000-00-00 00:00:00'),
(39, 36, 0, 'Ad', 0, 2, 3, 'Location de voitures', 'location-de-voitures', 'Description de la catégorie location de voitures', 'Description de la catégorie location de voitures', '', 0, 0, '/img/categories/2014/03/Think_Psitively-3.jpg', '2014-03-09 00:08:23', '2014-03-09 00:08:23', 0, '0000-00-00 00:00:00'),
(40, 36, 0, 'Ad', 0, 4, 5, 'Pièces Détachées', 'pièces-détachées', 'Description de la catégorie Pièces détachèes', 'Description de la catégorie Pièces détachèes', '', 0, 0, '/img/categories/2014/03/Think_Psitively-4.jpg', '2014-03-09 00:09:18', '2014-03-09 00:09:18', 0, '0000-00-00 00:00:00'),
(41, 36, 0, 'Ad', 0, 6, 7, 'Scooters-Motos', 'scooters-motos', 'Description de la catégorie scooters et motos', 'Description de la catégorie scooters et motos', '', 0, 0, '/img/categories/2014/03/Think_Psitively-5.jpg', '2014-03-09 00:10:02', '2014-03-09 00:10:02', 0, '0000-00-00 00:00:00'),
(42, 37, 0, 'Ad', 0, 10, 11, 'Informatique', 'informatique', 'Description de la catégorie Informatique', 'Description de la catégorie Informatique', '', 0, 0, '/img/categories/2014/03/Think_Psitively-6.jpg', '2014-03-09 00:10:40', '2014-03-09 00:10:40', 0, '0000-00-00 00:00:00'),
(43, 37, 0, 'Ad', 0, 12, 13, 'Image et son', 'image-et-son', 'Description de la catégorie image et son', 'Description de la catégorie image et son', '', 0, 0, '/img/categories/2014/03/Think_Psitively-7.jpg', '2014-03-09 00:11:17', '2014-03-09 00:11:17', 0, '0000-00-00 00:00:00'),
(44, 37, 0, 'Ad', 0, 14, 15, 'Téléphonie', 'téléphonie', 'Description de la catégorie téléphonie', 'Description de la catégorie téléphonie', '', 0, 0, '/img/categories/2014/03/Think_Psitively-8.jpg', '2014-03-09 00:12:00', '2014-03-09 00:12:00', 0, '0000-00-00 00:00:00'),
(45, 38, 0, 'Ad', 0, 18, 19, 'Appartement meublé', 'appartement-meublé', 'Description de la catégorie appartement meublé', 'Description de la catégorie appartement meublé', '', 0, 0, '/img/categories/2014/03/Think_Psitively-9.jpg', '2014-03-09 00:12:51', '2014-03-09 00:12:51', 0, '0000-00-00 00:00:00'),
(46, 38, 0, 'Ad', 0, 20, 21, 'Maison de vacances', 'maison-de-vacances', 'Description de la catégorie maisons de vacances', 'Description de la catégorie maisons de vacances', '', 0, 0, '/img/categories/2014/03/Think_Psitively-10.jpg', '2014-03-09 00:14:18', '2014-03-09 00:14:18', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `art_market_medias`
--

CREATE TABLE IF NOT EXISTS `art_market_medias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ref` varchar(255) NOT NULL,
  `ref_id` bigint(20) NOT NULL,
  `file` varchar(255) NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_id` (`ref_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `art_market_packs`
--

CREATE TABLE IF NOT EXISTS `art_market_packs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `defaut_units` bigint(20) NOT NULL DEFAULT '0',
  `suscribed_users` bigint(20) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `art_market_packs`
--

INSERT INTO `art_market_packs` (`id`, `name`, `defaut_units`, `suscribed_users`, `created`, `modified`) VALUES
(1, 'test', 12, 0, '2014-03-11 20:59:51', '2014-03-11 20:59:51'),
(2, 'Test 2', 23, 1, '2014-03-11 21:03:20', '2014-03-11 21:03:20'),
(3, 'Test 4', 32, 0, '2014-03-11 21:03:45', '2014-03-11 21:03:45'),
(4, '', 0, 0, '2014-03-15 17:32:52', '2014-03-15 17:32:52'),
(5, '', 0, 0, '2014-03-15 17:35:29', '2014-03-15 17:35:29');

-- --------------------------------------------------------

--
-- Structure de la table `art_market_packs_users`
--

CREATE TABLE IF NOT EXISTS `art_market_packs_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `pack_id` bigint(20) NOT NULL,
  `units` bigint(20) NOT NULL DEFAULT '0',
  `active` tinyint(2) NOT NULL DEFAULT '0',
  `pack_expires` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `art_market_packs_users`
--

INSERT INTO `art_market_packs_users` (`id`, `user_id`, `pack_id`, `units`, `active`, `pack_expires`, `created`, `modified`) VALUES
(1, 12, 11, 4, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 3, 2, 23, 0, '2014-03-22 17:40:39', '2014-03-15 17:40:39', '2014-03-15 17:40:39');

-- --------------------------------------------------------

--
-- Structure de la table `art_market_shops`
--

CREATE TABLE IF NOT EXISTS `art_market_shops` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `adress` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `shop_thumb` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '0',
  `shop_expires` datetime NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `art_market_users`
--

CREATE TABLE IF NOT EXISTS `art_market_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `has_shop` tinyint(2) NOT NULL DEFAULT '0',
  `shop_id` bigint(20) NOT NULL,
  `enable_slug` tinyint(1) NOT NULL DEFAULT '0',
  `enable_features` tinyint(2) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `password_token` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified` int(11) NOT NULL,
  `email_token` varchar(128) NOT NULL,
  `email_token_expires` datetime NOT NULL,
  `tos` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `user_status` tinyint(2) NOT NULL DEFAULT '1',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `show_my_phone` tinyint(1) NOT NULL DEFAULT '1',
  `adress` varchar(255) NOT NULL,
  `black_list` tinyint(1) NOT NULL DEFAULT '0',
  `user_can_add_post` tinyint(1) NOT NULL DEFAULT '1',
  `articles_published` int(11) NOT NULL DEFAULT '0',
  `articles_unpublished` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `art_market_users`
--

INSERT INTO `art_market_users` (`id`, `type`, `username`, `slug`, `has_shop`, `shop_id`, `enable_slug`, `enable_features`, `password`, `password_token`, `email`, `email_verified`, `email_token`, `email_token_expires`, `tos`, `active`, `last_login`, `user_status`, `is_admin`, `role`, `phone`, `show_my_phone`, `adress`, `black_list`, `user_can_add_post`, `articles_published`, `articles_unpublished`, `created`, `modified`) VALUES
(2, 'pro', 'palmclodys', 'palmclodys', 0, 0, 0, 0, '0025f21024f6b57fa37824d603b2598096aa8d98', '0', 'assane@gmail.com', 1, '1', '2014-03-12 00:40:09', 1, 1, '2014-03-23 16:03:20', 1, 1, 'admin', '774335317', 1, 'Adresse', 0, 1, 0, 0, '2014-03-11 00:40:10', '2014-03-23 16:03:20'),
(3, 'pro', 'assane', 'assane', 0, 0, 0, 0, '85ae9aa134d47c78823e8033bd12965473fddccc', '', 'assane.siepalm@gmail.com', 1, 'v68ojuz0xi', '2014-03-12 00:45:49', 1, 1, NULL, 1, 0, 'user_registered', '774335317', 1, 'Adresse', 0, 1, 0, 0, '2014-03-11 00:45:51', '2014-03-11 00:45:51'),
(31, '', 'samba', 'samba', 0, 0, 0, 0, 'b25b301bb53a05eb08546d6252ae615b126e2151', '', 'ousmane@edcom.sn', 1, '', '0000-00-00 00:00:00', 1, 1, NULL, 1, 1, 'admin', '', 1, '', 0, 1, 0, 0, '2014-03-21 00:06:48', '2014-03-21 00:06:48'),
(32, 'par', 'benoit', 'benoit', 0, 0, 0, 0, 'af3aa6fc9e2c45832ece5b88394e0633a661f71e', '', 'benoit@gmail.com', 0, 'o34jls78yu', '2014-03-22 00:31:09', 1, 1, NULL, 1, 0, 'user_registered', '77433514', 1, 'Adresse', 0, 1, 0, 0, '2014-03-21 00:31:10', '2014-03-21 00:31:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
