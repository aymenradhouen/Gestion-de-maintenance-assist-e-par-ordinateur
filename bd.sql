-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 15 mai 2018 à 00:01
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `consommables`
--

CREATE TABLE `consommables` (
  `id` int(22) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `type` varchar(40) NOT NULL,
  `fabriquant` varchar(40) NOT NULL,
  `lieu` text NOT NULL,
  `affectation` text NOT NULL,
  `date_achat` datetime NOT NULL,
  `commentaires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `consommables`
--

INSERT INTO `consommables` (`id`, `nom`, `type`, `fabriquant`, `lieu`, `affectation`, `date_achat`, `commentaires`) VALUES
(7, 'EPSON SX125', 'CARTOUCHE JET ENCRE JAUNE', 'Epson', 'Borj louzir', 'bureau 5', '2018-04-05 00:00:00', ''),
(8, 'EPSON T1282', 'Cartouche JET ENCRE CYAN', 'Epson', 'Passage', 'bureau 1', '2018-04-09 00:00:00', ''),
(9, 'BROTHER LC1240 ', 'BOUTEILLE ENCRE MAGENTA', 'Brother', 'Passage', 'bureau 7', '2018-04-09 00:00:00', ''),
(10, 'BROTHER LC1240', 'BOUTEILLE ENCRE NOIR', 'Brother', 'Passage', 'bureau 1', '2018-04-02 00:00:00', ''),
(11, 'BROTHER LC985', 'BOUTEILLE ENCRE 500ML - JAUNE', 'Brother', 'Passage', 'bureau 1', '2018-04-09 00:00:00', ''),
(12, 'Rame Papier PASTEL Jaune', 'Rame Papier A4 500 feuilles', 'Selecta', 'Passage', 'bureau 5', '2018-03-30 00:00:00', ''),
(13, 'Rame Papier PASTEL Bleu', 'Rame Papier A4 500 feuilles', 'Selecta', 'Passage', 'bureau 5', '2018-03-30 00:00:00', ''),
(14, 'HP 920XL', 'Cartouche jet encre magenta', 'HP', 'Borj louzir', 'bureau 7', '2018-03-30 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

CREATE TABLE `demandes` (
  `id` int(23) NOT NULL,
  `equipement` text NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `urgence` text NOT NULL,
  `etat` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandes`
--

INSERT INTO `demandes` (`id`, `equipement`, `description`, `date`, `urgence`, `etat`) VALUES
(16, 'HP DeskJet 3720', 'Probleme a l\'impression', '2018-05-05 13:39:51', 'Urgent', 0),
(19, 'ASUS Gaming 24 FULL HD (VG245H)', 'Fissure a l\'ecran', '2018-05-05 13:40:22', 'tres_Urgent', 0),
(20, 'LENOVO V520', 'Probleme', '2018-05-08 16:39:52', 'Urgent', 2);

-- --------------------------------------------------------

--
-- Structure de la table `fabriquant_consommables`
--

CREATE TABLE `fabriquant_consommables` (
  `id` int(22) NOT NULL,
  `fabriquant` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fabriquant_consommables`
--

INSERT INTO `fabriquant_consommables` (`id`, `fabriquant`) VALUES
(1, 'Brother'),
(2, 'Canon'),
(3, 'Dell'),
(4, 'Epson'),
(5, 'HP'),
(6, 'Kyocera'),
(7, 'exmark'),
(8, 'Olivetti'),
(9, 'Philips'),
(10, 'Samsung'),
(11, 'Sharp'),
(12, 'Selecta');

-- --------------------------------------------------------

--
-- Structure de la table `fabriquant_imprimantes`
--

CREATE TABLE `fabriquant_imprimantes` (
  `id` int(22) NOT NULL,
  `fabriquant` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fabriquant_imprimantes`
--

INSERT INTO `fabriquant_imprimantes` (`id`, `fabriquant`) VALUES
(2, 'Lexmark'),
(4, 'Hewlett-Packard (HP)'),
(5, 'Agfa'),
(6, 'Brother'),
(7, 'Canon'),
(8, 'Dell'),
(9, 'Epson'),
(10, 'Kodak'),
(11, 'Kyocera'),
(12, 'Minolta'),
(13, 'OKI'),
(14, 'Olivetti'),
(15, 'Olympus'),
(16, 'Panasonic'),
(17, 'Ricoh'),
(18, 'Sagem'),
(19, 'Samsung'),
(20, 'Sony'),
(21, 'Xerox');

-- --------------------------------------------------------

--
-- Structure de la table `fabriquant_materielres`
--

CREATE TABLE `fabriquant_materielres` (
  `id` int(22) NOT NULL,
  `fabriquant` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fabriquant_materielres`
--

INSERT INTO `fabriquant_materielres` (`id`, `fabriquant`) VALUES
(4, 'Allied Telesis'),
(5, '3Com'),
(6, 'AB Soft'),
(7, 'Adaptec'),
(8, 'Aopen'),
(9, 'Arista Networks'),
(10, 'Belkin'),
(11, 'Bewan'),
(12, 'Billion'),
(13, 'Cisco'),
(14, 'Connectland'),
(15, 'Creative Technology'),
(16, 'D-Link'),
(17, 'Dell'),
(18, 'Dicota'),
(19, 'Dexlan'),
(20, 'Draytek'),
(21, 'Edimax'),
(22, 'Heden'),
(23, 'Hewlett-Packard'),
(24, 'Hitachi'),
(25, 'Kensington'),
(26, 'Linksys'),
(27, 'Motorola'),
(28, 'Olitec'),
(29, 'Netgear'),
(30, 'Peabird'),
(31, 'Sagem'),
(32, 'SMC Networks'),
(33, 'TRENDnet'),
(34, 'Trust'),
(35, 'US Robotics'),
(36, 'Zyxel'),
(37, 'TP-Link'),
(38, 'Thecus'),
(39, 'ONV');

-- --------------------------------------------------------

--
-- Structure de la table `fabriquant_moniteurs`
--

CREATE TABLE `fabriquant_moniteurs` (
  `id` int(22) NOT NULL,
  `fabriquant` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fabriquant_moniteurs`
--

INSERT INTO `fabriquant_moniteurs` (`id`, `fabriquant`) VALUES
(4, '3M'),
(5, 'Apple'),
(6, 'Acer'),
(7, 'Apple'),
(8, 'Acer'),
(9, 'AG Neovo'),
(10, 'AOC'),
(11, 'ASUS'),
(12, 'Belinea'),
(13, 'BenQ'),
(14, 'BOE Hydis'),
(15, 'Chi Mei'),
(16, 'Cibox'),
(17, 'Compaq'),
(18, 'CTX Technology'),
(19, 'Dell'),
(20, 'Eizo'),
(21, 'Elyxio'),
(22, 'Formac'),
(23, 'Fujitsu - Siemens'),
(24, 'Hanns-g'),
(25, 'Hewlett Packard'),
(26, 'Hyundai Image Quest'),
(27, 'IBM'),
(28, 'IIsonic'),
(29, 'iiyama'),
(30, 'iPure'),
(31, 'LaCie'),
(32, 'LG Electronics'),
(33, 'Mirai'),
(34, 'NEC Display Solutions'),
(35, 'NFren'),
(36, 'Neovo'),
(37, 'Packard Bell'),
(38, 'Philips'),
(39, 'Samsung'),
(40, 'Shuttle'),
(41, 'Sony'),
(42, 'VideoSeven'),
(43, 'ViewSonic'),
(44, 'Yuraku');

-- --------------------------------------------------------

--
-- Structure de la table `fabriquant_ordinateurs`
--

CREATE TABLE `fabriquant_ordinateurs` (
  `id` int(22) NOT NULL,
  `fabriquant` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fabriquant_ordinateurs`
--

INSERT INTO `fabriquant_ordinateurs` (`id`, `fabriquant`) VALUES
(2, 'Clevo'),
(3, 'Ekimia'),
(4, 'Gigabyte'),
(5, 'LDLC'),
(6, 'PCLF'),
(7, 'Keynux'),
(8, 'Asus'),
(9, 'Fujitsu'),
(10, 'Acer'),
(11, 'Packard Bell'),
(12, 'MSI'),
(13, 'Toshiba'),
(14, 'Apple'),
(15, 'Dell'),
(16, 'Hewlett Packard (HP)'),
(17, 'Lenovo'),
(18, 'Medion'),
(19, 'Sony'),
(20, 'NUC');

-- --------------------------------------------------------

--
-- Structure de la table `fabriquant_peripheriques`
--

CREATE TABLE `fabriquant_peripheriques` (
  `id` int(22) NOT NULL,
  `fabriquant` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fabriquant_peripheriques`
--

INSERT INTO `fabriquant_peripheriques` (`id`, `fabriquant`) VALUES
(3, 'Agfa - scanner'),
(4, 'Canon - scanner'),
(5, 'Lexmark - scanner'),
(6, 'Epson - scanner'),
(7, 'Fujitsu - scanner'),
(8, 'Hewlett-Packard (HP) - scanner'),
(9, 'Kodak - scanner'),
(10, 'Minolta - scanner'),
(11, 'Microtek - scanner'),
(12, 'Mustek - scanner'),
(13, 'Nikon - scanner'),
(14, 'OKI - scanner'),
(15, 'Ricoh - scanner'),
(16, 'Umax - scanner'),
(17, 'Micronic - LCB'),
(18, 'Easy-Laser - LCB'),
(19, 'Erimac - LCB'),
(20, 'CTC Analytics - LCB'),
(21, 'C.P.bourg - LCB'),
(22, 'VERIFONE - lecteur carte'),
(23, 'HID Global - lecteur carte'),
(24, 'STID - lecteur carte'),
(25, 'IT BUSINESS SOURCE - lecteur carte'),
(26, 'UNIVERS GRAPHIQUE - lecteur carte'),
(27, '3M - video projecteur'),
(28, 'ACER - video projecteur'),
(29, 'BENQ - video projecteur'),
(30, 'CANON - video projecteur'),
(31, 'EPSON - video projecteur'),
(32, 'HITACHI - video projecteur'),
(33, 'BROTHER - scanner'),
(34, 'HONEYWELL - LCB'),
(35, 'Zebra Technologies- LCB');

-- --------------------------------------------------------

--
-- Structure de la table `imprimantes`
--

CREATE TABLE `imprimantes` (
  `id` int(22) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fabriquant` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `lieu` text NOT NULL,
  `affectation` varchar(30) NOT NULL,
  `num_serie` varchar(50) NOT NULL,
  `code_inv` varchar(50) NOT NULL,
  `caracteristiques` text NOT NULL,
  `date_achat` date NOT NULL,
  `commentaires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `imprimantes`
--

INSERT INTO `imprimantes` (`id`, `nom`, `type`, `fabriquant`, `modele`, `lieu`, `affectation`, `num_serie`, `code_inv`, `caracteristiques`, `date_achat`, `commentaires`) VALUES
(4, 'HP DeskJet', ' imprimante Ã  jet encre', 'Hewlett-Packard (HP)', 'HP DeskJet 3720', 'Passage', 'EPSON SX125,CARTOUCHE JET ENCR', 'x4201501109', 'A300', 'serie,parallele,wifi', '2018-05-08', ''),
(5, 'HP Officejet Pro', ' imprimante Ã  jet encre', 'Hewlett-Packard (HP)', 'HP Officejet Pro 8100', 'Passage', 'EPSON T1282,Cartouche JET ENCR', 'a471547414', 'B420', 'ethernet,usb', '2018-05-08', ''),
(6, 'CANON PIXMA', ' imprimante Ã  jet encre', 'Canon', 'CANON PIXMA IP 2840', 'Passage', 'BROTHER LC1240 ,BOUTEILLE ENCR', '548jyh486512', 'F487', 'serie,wifi,ethernet', '2018-05-08', ''),
(7, 'CANON PIXMA', 'Imprimante Multifonction 3 en 1', 'Canon', 'CANON PIXMA E414 ', 'Passage', 'BROTHER LC1240,BOUTEILLE ENCRE', '547ty4rt15e', 'F471', 'parallele,wifi,ethernet', '2018-05-08', ''),
(8, 'KYOCERA', ' imprimante Ã  jet encre', 'Kyocera', 'KYOCERA FS-1060DN Monochrome ', 'Passage', 'BROTHER LC1240,BOUTEILLE ENCRE', '55g4hg84g', 'G4522', 'parallele,wifi,ethernet', '2018-05-08', ''),
(9, 'KYOCERA', ' imprimante Ã  jet encre', 'Kyocera', 'KYOCERA FS-1020MFP Monochrome', 'Passage', 'HP 920XL,Cartouche jet encre m', '65j54yjyj5y', 'R475', 'parallele,wifi,ethernet', '2018-05-08', ''),
(10, 'LEXMARK', 'imprimante laser', 'Lexmark', 'LEXMARK MS317dn Monochrome', 'Borj louzir', 'BROTHER LC1240 ,BOUTEILLE ENCR', '484giya3211', 'R471', 'parallele,wifi,ethernet', '2018-05-08', ''),
(11, 'SAMSUNG', ' imprimante Ã  jet encre', 'Samsung', 'SAMSUNG SL-M2020W Monochrome ', 'Passage', 'BROTHER LC1240 ,BOUTEILLE ENCR', 'giya31546256', 'T417', 'serie,wifi,ethernet', '2018-05-08', ''),
(12, 'EPSON', ' imprimante Ã  jet encre', 'Epson', 'EPSON L120 (C11CD76411)', 'Borj louzir', 'EPSON T1282,Cartouche JET ENCR', '544giya34154', 'T475', 'serie,wifi,ethernet', '2018-05-08', ''),
(13, 'BROTHER', 'Imprimante Multifonction 3 en 1', 'Brother', 'BROTHER MFC-1910W Monochrome', 'Borj louzir', 'EPSON T1282,Cartouche JET ENCR', '2564giyz154', 'T450', 'parallele,wifi,usb', '2018-05-08', '');

-- --------------------------------------------------------

--
-- Structure de la table `interventions`
--

CREATE TABLE `interventions` (
  `id` int(22) NOT NULL,
  `nom` text NOT NULL,
  `type_maintenance` text NOT NULL,
  `description` text NOT NULL,
  `type_intervention` varchar(22) NOT NULL,
  `decision` smallint(2) NOT NULL,
  `prix` float NOT NULL,
  `date_intervention` date NOT NULL,
  `technicien` text NOT NULL,
  `observations` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `interventions`
--

INSERT INTO `interventions` (`id`, `nom`, `type_maintenance`, `description`, `type_intervention`, `decision`, `prix`, `date_intervention`, `technicien`, `observations`) VALUES
(20, 'LENOVO V520', 'corrective', 'Probleme', 'interne', 1, 10, '2018-05-08', 'admin', ''),
(20, 'LENOVO V520', 'corrective', 'Probleme reparÃ©', 'interne', 2, 100, '2018-05-08', 'admin', '');

-- --------------------------------------------------------

--
-- Structure de la table `lieu_aff`
--

CREATE TABLE `lieu_aff` (
  `id` int(22) NOT NULL,
  `lieu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lieu_aff`
--

INSERT INTO `lieu_aff` (`id`, `lieu`) VALUES
(2, 'Passage'),
(3, 'Montplaisir'),
(4, 'Chargia'),
(5, 'Bir al kasaa'),
(6, 'Beb saadoun'),
(7, 'Zahrouni'),
(8, 'Sijoumi'),
(9, 'Tborba'),
(10, 'Ben arous'),
(11, 'TGM'),
(12, 'Ariana'),
(13, 'Bokri');

-- --------------------------------------------------------

--
-- Structure de la table `materiel_reseaux`
--

CREATE TABLE `materiel_reseaux` (
  `id` int(22) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fabriquant` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `lieu` text NOT NULL,
  `affectation` varchar(30) NOT NULL,
  `date_affectation` datetime NOT NULL,
  `num_serie` varchar(50) NOT NULL,
  `code_inv` varchar(50) NOT NULL,
  `adresse_mac` varchar(20) NOT NULL,
  `date_achat` date NOT NULL,
  `commentaires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `materiel_reseaux`
--

INSERT INTO `materiel_reseaux` (`id`, `nom`, `type`, `fabriquant`, `modele`, `lieu`, `affectation`, `date_affectation`, `num_serie`, `code_inv`, `adresse_mac`, `date_achat`, `commentaires`) VALUES
(3, 'EDIMAX EDES', 'switch', 'Edimax', 'EDIMAX EDES-3305P', 'Passage', 'bureau 7', '2018-04-10 04:32:52', '45dz4154g5', 'F478', '42-E9-C4-E4-C8-03', '2018-03-29', ''),
(4, 'D-LINK', 'switch', 'D-Link', 'D-LINK DES-1005A/E', 'Borj louzir', 'bureau 2', '2018-04-10 04:35:59', 'cRsGFV33', 'Y784', '57-DB-66-5B-57-34', '2018-03-28', ''),
(5, 'D-LINK', 'switch', 'D-Link', 'TP-LINK 10/100 Mbps 5 ports', 'Passage', 'bureau 44', '2018-04-10 04:37:31', 'arE3CkZ8', 'T450', 'F7-4D-0F-B9-6E-F5', '2018-03-29', ''),
(6, 'D-LINK', 'routeur sans fils wifi', 'D-Link', 'D-LINK 3G WIFI 150N DWR-111', 'Passage', 'bureau 1', '2018-04-10 04:38:59', 'tyuRdhCH', 'T450', 'B1-F3-3C-70-3B-84', '2018-03-29', ''),
(7, 'TP-LINK', 'routeur sans fils wifi', 'TP-Link', 'TP-LINK 3G/4G WiFi N', 'Borj louzir', 'bureau 1', '2018-04-10 04:40:52', 'BLjZgYRt', 'T450', 'A7-F0-C7-98-B4-77', '2018-03-28', ''),
(8, 'EDIMAX', 'routeur simple', 'Edimax', 'EDIMAX BR-6428nS V4 Wifi - N300', 'Borj louzir', 'bureau 3', '2018-04-10 04:42:39', 'etEPCwS7', 'T417', '0F-4B-A9-6E-90-62', '2018-03-26', ''),
(9, 'CISCO', 'Commutateur reseau', 'Cisco', 'CISCO SG300-28P 28 ports 10/100/1000 Mbps PoE', 'Passage', 'bureau 1', '2018-04-10 04:44:25', '6tvn8Sa6', 'R471', 'E1-DE-C8-96-F4-8D', '2018-04-09', ''),
(10, 'THECUS', 'Serveur reseau', 'Thecus', 'EDIMAX EDES-3305P', 'Borj louzir', 'bureau 57', '2018-04-10 04:49:16', 'KrkgKXSQ', 'Z475', '12-88-E0-60-E0-FA', '2018-03-31', ''),
(11, 'THECUS', 'Serveur reseau', 'Thecus', 'THECUS W8900 8Go - 8 Baies', 'Passage', 'bureau 57', '2018-04-10 04:50:12', 'xcNjTSkJ', 'F478', 'E0-BF-D2-4A-3F-CE', '2018-04-04', ''),
(12, 'ONV', 'switch', 'ONV', 'ONV POE31008PS 8-Ports POE', 'Passage', 'bureau 1', '2018-04-10 04:51:36', 'pAtLQDM2', 'G478', '2A-EE-05-F3-33-7F', '2018-03-27', '');

-- --------------------------------------------------------

--
-- Structure de la table `modele_imprimantes`
--

CREATE TABLE `modele_imprimantes` (
  `id` int(22) NOT NULL,
  `modele` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `modele_imprimantes`
--

INSERT INTO `modele_imprimantes` (`id`, `modele`) VALUES
(3, 'HP DeskJet 3720'),
(4, 'HP Officejet Pro 8100'),
(5, 'CANON PIXMA IP 2840'),
(6, 'CANON PIXMA E414 '),
(7, 'KYOCERA FS-1060DN Monochrome '),
(8, 'KYOCERA FS-1020MFP Monochrome'),
(9, 'LEXMARK MS317dn Monochrome'),
(10, 'SAMSUNG SL-M2020W Monochrome '),
(11, 'EPSON L120 (C11CD76411)'),
(12, 'BROTHER MFC-1910W Monochrome');

-- --------------------------------------------------------

--
-- Structure de la table `modele_materielres`
--

CREATE TABLE `modele_materielres` (
  `id` int(22) NOT NULL,
  `modele` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `modele_materielres`
--

INSERT INTO `modele_materielres` (`id`, `modele`) VALUES
(3, 'EDIMAX EDES-3305P'),
(4, 'D-LINK DES-1005A/E'),
(5, 'TP-LINK 10/100 Mbps 5 ports'),
(6, 'D-LINK 3G WIFI 150N DWR-111'),
(7, 'TP-LINK 3G/4G WiFi N'),
(8, 'EDIMAX BR-6428nS V4 Wifi - N300'),
(9, 'CISCO SG300-28P 28 ports 10/100/1000 Mbps PoE'),
(10, 'THECUS N2810 2Go - 2 Baies'),
(11, 'THECUS W8900 8Go - 8 Baies'),
(12, 'ONV POE31008PS 8-Ports POE');

-- --------------------------------------------------------

--
-- Structure de la table `modele_moniteurs`
--

CREATE TABLE `modele_moniteurs` (
  `id` int(22) NOT NULL,
  `modele` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `modele_moniteurs`
--

INSERT INTO `modele_moniteurs` (`id`, `modele`) VALUES
(2, 'ASUS 19.5\" LED ( VE198S)'),
(3, 'ASUS Gaming 24\" FULL HD (VG245H)'),
(4, 'AOC 27\" LED Full HD (E2770SH)'),
(5, 'SAMSUNG 19\" LED HD (S19F355HN)'),
(6, 'SAMSUNG 22\" FULL HD (S22F350)'),
(7, 'SAMSUNG 24\" LED FULL HD (S24F350FHM)'),
(8, 'IIYAMA ProLite 21.5\" LED FULL HD (E2283HS-B1)'),
(9, 'IIYAMA G-MASTER Black Hawk 24.5\" Full HD (2530HSU-B1)'),
(10, 'IIYAMA G-MASTER 24\" LED FULL HD (GB2488HSU-B3)'),
(11, 'DELL 20\" LCD LED (E2016HV)');

-- --------------------------------------------------------

--
-- Structure de la table `modele_ordinateurs`
--

CREATE TABLE `modele_ordinateurs` (
  `id` int(22) NOT NULL,
  `modele` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `modele_ordinateurs`
--

INSERT INTO `modele_ordinateurs` (`id`, `modele`) VALUES
(2, 'LENOVO V520'),
(3, 'LENOVO S200Z'),
(4, 'DELL VOSTRO 3667'),
(5, 'MicroTour HP 290 G1'),
(6, 'NUC INTEL NUC5I5RYH'),
(7, 'HP ProDesk 400 G4 SFF'),
(8, 'ASUS V221CUK'),
(9, 'HP Pavilion 570-p002nk'),
(10, 'MSI Trident 3 VR7RC');

-- --------------------------------------------------------

--
-- Structure de la table `modele_peripheriques`
--

CREATE TABLE `modele_peripheriques` (
  `id` int(22) NOT NULL,
  `modele` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `modele_peripheriques`
--

INSERT INTO `modele_peripheriques` (`id`, `modele`) VALUES
(2, 'Canon CanoScan LiDE 120'),
(3, 'EPSON perfection V19'),
(4, 'EPSON Perfection V370 Photo'),
(5, 'BROTHER DS-720D'),
(6, 'HONEYWELL LECTEUR CODE BARRE LASER'),
(7, 'LECTEUR CODE BARRE DS9208'),
(8, 'LECTEUR CODE BARRE DS9808');

-- --------------------------------------------------------

--
-- Structure de la table `moniteurs`
--

CREATE TABLE `moniteurs` (
  `id` int(22) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fabriquant` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `lieu` text NOT NULL,
  `affectation` varchar(30) NOT NULL,
  `num_serie` varchar(50) NOT NULL,
  `code_inv` varchar(50) NOT NULL,
  `caracteristiques` text NOT NULL,
  `taille` text NOT NULL,
  `date_achat` date NOT NULL,
  `commentaires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `moniteurs`
--

INSERT INTO `moniteurs` (`id`, `nom`, `type`, `fabriquant`, `modele`, `lieu`, `affectation`, `num_serie`, `code_inv`, `caracteristiques`, `taille`, `date_achat`, `commentaires`) VALUES
(4, 'ASUS', 'LED', 'ASUS', 'ASUS 19.5 LED ( VE198S)', 'Passage', 'bureau 1', 'HstRzFNc', 'F489', 'microphone,hdmi,bnc', '1440 x 900 pixels', '2018-03-27', ''),
(5, 'ASUS', 'LED', 'ASUS', 'ASUS Gaming 24 FULL HD (VG245H)', 'Borj louzir', 'bureau 5', 'QdNfztnY', 'T450', 'dvi,bnc,pivot', '1920 x 1080 pixels', '2018-03-27', ''),
(6, 'AOC', 'LED', 'AOC', 'AOC 27 LED Full HD (E2770SH)', 'Passage', 'bureau 1', 'nncy5yAb', 'F479', 'microphone,dvi,hdmi,enceinte,pivot', '1920 x 1080', '2018-03-26', ''),
(7, 'SAMSUNG ', 'LED', 'Samsung', 'SAMSUNG 19 LED HD (S19F355HN)', 'Borj louzir', 'bureau 1', 'QBV43sak', 'T782', 'subd,dvi,hdmi', '1366 x 768 pixels', '2018-03-30', ''),
(8, 'SAMSUNG', 'LED', 'Samsung', 'SAMSUNG 22 FULL HD (S22F350)', 'Passage', 'bureau 5', 'dG2poc2Y', 'B483', 'microphone,hdmi,enceinte,pivot', '1920 x 1080', '2018-03-27', ''),
(9, 'SAMSUNG', 'LED', 'Samsung', 'SAMSUNG 24 LED FULL HD (S24F350FHM)', 'Borj louzir', 'bureau 7', 'HstRzFNc', 'A479', 'subd,hdmi,pivot', '1920 x 1080', '2018-03-29', ''),
(10, 'IIYAMA', 'LED', 'iiyama', 'IIYAMA ProLite 21.5 LED FULL HD (E2283HS-B1)', 'Passage', 'bureau 7', 'KVaiBgtW', 'T417', 'subd,dvi,hdmi', '1920 x 1080', '2018-03-28', ''),
(11, 'IIYAMA', 'LED', 'Samsung', 'IIYAMA G-MASTER Black Hawk 24.5 Full HD (2530HSU-', 'Borj louzir', 'bureau 57', 'LeonUkUF', 'G4522', 'microphone,subd,hdmi,enceinte', '1920 x 1080 px', '2018-03-27', ''),
(12, 'IIYAMA', 'LED', 'iiyama', 'IIYAMA G-MASTER 24 LED FULL HD (GB2488HSU-B3)', 'Borj louzir', 'bureau 1', 'emxyFRpj', 'F479', 'subd,dvi,hdmi,pivot', '1920 x 1080 pixels', '2018-03-27', ''),
(13, 'DELL', 'LED', 'Dell', 'DELL 20 LCD LED (E2016HV)', 'Borj louzir', 'bureau 7', 'H3xbr6SE', 'B478', 'subd,dvi,pivot', '1600 x 900 pixels', '2018-04-03', '');

-- --------------------------------------------------------

--
-- Structure de la table `ordinateurs`
--

CREATE TABLE `ordinateurs` (
  `id` int(22) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fabriquant` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `sys_exp` text NOT NULL,
  `processeur` text NOT NULL,
  `carte_graphique` text NOT NULL,
  `ram` int(22) NOT NULL,
  `memoire_dur` int(40) NOT NULL,
  `lieu` text NOT NULL,
  `affectation` varchar(30) NOT NULL,
  `num_serie` varchar(50) NOT NULL,
  `code_inv` varchar(50) NOT NULL,
  `date_achat` date NOT NULL,
  `commentaires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ordinateurs`
--

INSERT INTO `ordinateurs` (`id`, `nom`, `type`, `fabriquant`, `modele`, `sys_exp`, `processeur`, `carte_graphique`, `ram`, `memoire_dur`, `lieu`, `affectation`, `num_serie`, `code_inv`, `date_achat`, `commentaires`) VALUES
(2, 'LENOVO', 'Ordinateur de bureau', 'Lenovo', 'LENOVO V520', '', '', '', 0, 0, 'Passage', 'bureau 7', 'LEpLAMcW', 'T417', '2018-03-28', ''),
(3, 'LENOVO', 'Ordinateur portable', 'Lenovo', 'LENOVO S200Z', '', '', '', 0, 0, 'Passage', 'bureau 2', 'fgvBGckZ', 'R475', '2018-03-31', ''),
(4, 'DELL', 'Ordinateur de bureau', 'Dell', 'DELL VOSTRO 3667', '', '', '', 0, 0, 'Passage', 'bureau 5', 'UQXkeVpL', 'T475', '2018-03-26', ''),
(5, 'HP', 'Ordinateur de bureau', 'Hewlett Packard (HP)', 'MicroTour HP 290 G1', '', '', '', 0, 0, 'Borj louzir', 'bureau 7', 'aqdCeDJ3', 'R475', '2018-03-28', ''),
(6, 'NUC', 'Mini PC', 'NUC', 'NUC INTEL NUC5I5RYH', '', '', '', 0, 0, 'Borj louzir', 'bureau 5', 'qsbjrp2C', 'R471', '2018-03-28', ''),
(7, 'HP', 'Ordinateur de bureau', 'Hewlett Packard (HP)', 'HP ProDesk 400 G4 SFF', '', '', '', 0, 0, 'Borj louzir', 'bureau 57', 'qBC4epGC', 'R471', '2018-03-26', ''),
(8, 'ASUS', 'Ordinateur de bureau', 'Asus', 'ASUS V221CUK', '', '', '', 0, 0, 'Passage', 'bureau 2', 'zjfrBnJJ', 'Y784', '2018-03-28', ''),
(9, 'HP', 'Ordinateur de bureau', 'Hewlett Packard (HP)', 'HP Pavilion 570-p002nk', '', '', '', 0, 0, 'Borj louzir', 'bureau 5', 'vsiDgq5x', 'Z475', '2018-04-05', ''),
(10, 'MSI', 'Ordinateur de bureau', 'MSI', 'MSI Trident 3 VR7RC', 'windows 7', 'i3', 'gtx', 8, 500, 'Borj louzir', 'bureau 7', 'VJq2CCPt', 'M541', '2018-04-06', '');

-- --------------------------------------------------------

--
-- Structure de la table `peripheriques`
--

CREATE TABLE `peripheriques` (
  `id` int(22) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fabriquant` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `lieu` text NOT NULL,
  `affectation` varchar(30) NOT NULL,
  `num_serie` varchar(50) NOT NULL,
  `code_inv` varchar(50) NOT NULL,
  `date_achat` date NOT NULL,
  `commentaires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `peripheriques`
--

INSERT INTO `peripheriques` (`id`, `nom`, `type`, `fabriquant`, `modele`, `lieu`, `affectation`, `num_serie`, `code_inv`, `date_achat`, `commentaires`) VALUES
(2, 'Canon', 'scanner', 'Canon - scanner', 'Canon CanoScan LiDE 120', 'Passage', 'bureau 7', 'KKZwkEW3', 'T417', '2018-03-27', ''),
(3, 'EPSON', 'scanner', 'Epson - scanner', 'EPSON perfection V19', 'Passage', 'bureau 57', 'aqdCeDJ3', 'Y784', '2018-04-03', ''),
(4, 'EPSON', 'scanner', 'Epson - scanner', 'EPSON Perfection V370 Photo', 'Borj louzir', 'bureau 57', 'eJ2D4nSX', 'T450', '2018-03-28', ''),
(5, 'BROTHER', 'scanner', 'BROTHER - scanner', 'BROTHER DS-720D', 'Passage', 'bureau 2', '4gwSZKQk', 'T475', '2018-03-30', ''),
(6, 'HONEYWELL', 'Lecteur de code-barres', 'HONEYWELL - LCB', 'HONEYWELL LECTEUR CODE BARRE LASER', 'Passage', 'bureau 2', 'fgvBGckZ', 'T782', '2018-03-28', ''),
(7, 'Zebra', 'Lecteur de code-barres', 'Zebra Technologies- LCB', 'LECTEUR CODE BARRE DS9208', 'Borj louzir', 'bureau 3', 'wed7r5KW', 'R475', '2018-03-29', ''),
(8, 'Zebra', 'Lecteur de code-barres', 'Zebra Technologies- LCB', 'LECTEUR CODE BARRE DS9808', 'Passage', 'bureau 2', 'DnXnFRNj', 'Y784', '2018-04-03', '');

-- --------------------------------------------------------

--
-- Structure de la table `type_consommables`
--

CREATE TABLE `type_consommables` (
  `id` int(22) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_consommables`
--

INSERT INTO `type_consommables` (`id`, `type`) VALUES
(5, 'Rame Papier A4 500 feuilles'),
(6, 'Rame Papier A3 500 feuilles'),
(16, 'Bouteille encre 500 ml - noir'),
(17, 'Bouteille encre 500 ml - cyan'),
(18, 'Bouteille encre 500 ml - jaune'),
(19, 'Bouteille encre 500 ml - magenta'),
(20, 'Cartouche jet encre jaune'),
(21, 'Cartouche jet encre cyan'),
(22, 'Cartouche jet encre magenta'),
(23, 'Cartouche jet encre noir');

-- --------------------------------------------------------

--
-- Structure de la table `type_imprimantes`
--

CREATE TABLE `type_imprimantes` (
  `id` int(22) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_imprimantes`
--

INSERT INTO `type_imprimantes` (`id`, `type`) VALUES
(2, ' imprimante Ã  jet encre'),
(3, 'imprimante laser'),
(4, 'Imprimante photocopieuse'),
(5, 'Imprimante Multifonction 3 en 1');

-- --------------------------------------------------------

--
-- Structure de la table `type_materielres`
--

CREATE TABLE `type_materielres` (
  `id` int(22) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_materielres`
--

INSERT INTO `type_materielres` (`id`, `type`) VALUES
(3, 'Commutateur reseau'),
(4, 'Commutateur empilable'),
(5, 'Repeteur'),
(6, 'Modem'),
(7, 'routeur sans fils wifi'),
(8, 'routeur simple'),
(9, 'routeur firewall integre'),
(10, 'modem routeur ADSL'),
(11, 'Serveur reseau'),
(12, 'UPS'),
(13, 'switch manageable'),
(14, 'fire wall - VPN'),
(15, 'switch');

-- --------------------------------------------------------

--
-- Structure de la table `type_moniteurs`
--

CREATE TABLE `type_moniteurs` (
  `id` int(22) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_moniteurs`
--

INSERT INTO `type_moniteurs` (`id`, `type`) VALUES
(2, 'LCD'),
(3, 'CRT'),
(4, 'LED');

-- --------------------------------------------------------

--
-- Structure de la table `type_ordinateurs`
--

CREATE TABLE `type_ordinateurs` (
  `id` int(22) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_ordinateurs`
--

INSERT INTO `type_ordinateurs` (`id`, `type`) VALUES
(4, 'Ordinateur de bureau'),
(5, 'Ordinateur portable'),
(6, 'Mini PC'),
(7, 'Netbook'),
(8, 'Tablette PC');

-- --------------------------------------------------------

--
-- Structure de la table `type_peripheriques`
--

CREATE TABLE `type_peripheriques` (
  `id` int(22) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_peripheriques`
--

INSERT INTO `type_peripheriques` (`id`, `type`) VALUES
(2, 'scanner'),
(3, 'Lecteur de code-barres'),
(4, 'Lecteur de carte'),
(6, 'Video projecteur');

-- --------------------------------------------------------

--
-- Structure de la table `type_users`
--

CREATE TABLE `type_users` (
  `id` int(22) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_users`
--

INSERT INTO `type_users` (`id`, `type`) VALUES
(1, 'Administrateur'),
(2, 'Technicien'),
(3, 'Administrateur du parc');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(10) NOT NULL,
  `passwd` varchar(10) NOT NULL,
  `email` text NOT NULL,
  `type` enum('Administrateur du parc','Administrateur','Technicien') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `passwd`, `email`, `type`) VALUES
(6, 'admin', 'admin', 'admin@gmail.com', 'Administrateur'),
(7, 'malek', 'malek', 'kabsimalek@gmail.com', 'Technicien'),
(8, 'aymen', 'aymen', 'aymennradhouenn@gmail.com', 'Administrateur du parc');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `consommables`
--
ALTER TABLE `consommables`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fabriquant_consommables`
--
ALTER TABLE `fabriquant_consommables`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fabriquant_imprimantes`
--
ALTER TABLE `fabriquant_imprimantes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fabriquant_materielres`
--
ALTER TABLE `fabriquant_materielres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fabriquant_moniteurs`
--
ALTER TABLE `fabriquant_moniteurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fabriquant_ordinateurs`
--
ALTER TABLE `fabriquant_ordinateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fabriquant_peripheriques`
--
ALTER TABLE `fabriquant_peripheriques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `imprimantes`
--
ALTER TABLE `imprimantes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lieu_aff`
--
ALTER TABLE `lieu_aff`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `materiel_reseaux`
--
ALTER TABLE `materiel_reseaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modele_imprimantes`
--
ALTER TABLE `modele_imprimantes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modele_materielres`
--
ALTER TABLE `modele_materielres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modele_moniteurs`
--
ALTER TABLE `modele_moniteurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modele_ordinateurs`
--
ALTER TABLE `modele_ordinateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modele_peripheriques`
--
ALTER TABLE `modele_peripheriques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `moniteurs`
--
ALTER TABLE `moniteurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ordinateurs`
--
ALTER TABLE `ordinateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `peripheriques`
--
ALTER TABLE `peripheriques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_consommables`
--
ALTER TABLE `type_consommables`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_imprimantes`
--
ALTER TABLE `type_imprimantes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_materielres`
--
ALTER TABLE `type_materielres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_moniteurs`
--
ALTER TABLE `type_moniteurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_ordinateurs`
--
ALTER TABLE `type_ordinateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_peripheriques`
--
ALTER TABLE `type_peripheriques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_users`
--
ALTER TABLE `type_users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `consommables`
--
ALTER TABLE `consommables`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `id` int(23) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `fabriquant_consommables`
--
ALTER TABLE `fabriquant_consommables`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `fabriquant_imprimantes`
--
ALTER TABLE `fabriquant_imprimantes`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `fabriquant_materielres`
--
ALTER TABLE `fabriquant_materielres`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `fabriquant_moniteurs`
--
ALTER TABLE `fabriquant_moniteurs`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `fabriquant_ordinateurs`
--
ALTER TABLE `fabriquant_ordinateurs`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `fabriquant_peripheriques`
--
ALTER TABLE `fabriquant_peripheriques`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `imprimantes`
--
ALTER TABLE `imprimantes`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `lieu_aff`
--
ALTER TABLE `lieu_aff`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `materiel_reseaux`
--
ALTER TABLE `materiel_reseaux`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `modele_imprimantes`
--
ALTER TABLE `modele_imprimantes`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `modele_materielres`
--
ALTER TABLE `modele_materielres`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `modele_moniteurs`
--
ALTER TABLE `modele_moniteurs`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `modele_ordinateurs`
--
ALTER TABLE `modele_ordinateurs`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `modele_peripheriques`
--
ALTER TABLE `modele_peripheriques`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `moniteurs`
--
ALTER TABLE `moniteurs`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `ordinateurs`
--
ALTER TABLE `ordinateurs`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `peripheriques`
--
ALTER TABLE `peripheriques`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `type_consommables`
--
ALTER TABLE `type_consommables`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `type_imprimantes`
--
ALTER TABLE `type_imprimantes`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `type_materielres`
--
ALTER TABLE `type_materielres`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `type_moniteurs`
--
ALTER TABLE `type_moniteurs`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `type_ordinateurs`
--
ALTER TABLE `type_ordinateurs`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `type_peripheriques`
--
ALTER TABLE `type_peripheriques`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `type_users`
--
ALTER TABLE `type_users`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
