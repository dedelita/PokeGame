-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 23 Mai 2017 à 13:14
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pokegame`
--

-- --------------------------------------------------------

--
-- Structure de la table `dresseur`
--

DROP TABLE IF EXISTS `dresseur`;
CREATE TABLE IF NOT EXISTS `dresseur` (
  `id` int(11) NOT NULL,
  `nbPieces` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `dresseur`
--

INSERT INTO `dresseur` (`id`, `nbPieces`) VALUES
(3, 5000),
(2, 5000),
(1, 5000);

-- --------------------------------------------------------

--
-- Structure de la table `espece_pokemon`
--

DROP TABLE IF EXISTS `espece_pokemon`;
CREATE TABLE IF NOT EXISTS `espece_pokemon` (
  `id` int(3) NOT NULL,
  `nom` varchar(11) DEFAULT NULL,
  `courbe_XP` char(1) DEFAULT NULL,
  `evolution` varchar(1) DEFAULT NULL,
  `type1` varchar(8) DEFAULT NULL,
  `type2` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `espece_pokemon`
--

INSERT INTO `espece_pokemon` (`id`, `nom`, `courbe_XP`, `evolution`, `type1`, `type2`) VALUES
(1, 'Bulbizarre', 'P', 'n', 'PLANTE', 'POISON'),
(2, 'Herbizarre', 'P', 'o', 'PLANTE', 'POISON'),
(3, 'Florizarre', 'P', 'o', 'PLANTE', 'POISON'),
(4, 'Salamèche', 'P', 'n', 'FEU', ''),
(5, 'Reptincel', 'P', 'o', 'FEU', ''),
(6, 'Dracaufeu', 'P', 'o', 'FEU', 'VOL'),
(7, 'Carapuce', 'P', 'n', 'EAU', ''),
(8, 'Carabaffe', 'P', 'o', 'EAU', ''),
(9, 'Tortank', 'P', 'o', 'EAU', ''),
(10, 'Chenipan', 'M', 'n', 'INSECTE', ''),
(11, 'Chrysacier', 'M', 'o', 'INSECTE', ''),
(12, 'Papilusion', 'M', 'o', 'INSECTE', 'VOL'),
(13, 'Aspicot', 'M', 'n', 'INSECTE', 'POISON'),
(14, 'Coconfort', 'M', 'o', 'INSECTE', 'POISON'),
(15, 'Dardargnan', 'M', 'o', 'INSECTE', 'POISON'),
(16, 'Roucool', 'P', 'n', 'NORMAL', 'VOL'),
(17, 'Roucoups', 'P', 'o', 'NORMAL', 'VOL'),
(18, 'Roucarnage', 'P', 'o', 'NORMAL', 'VOL'),
(19, 'Rattata', 'M', 'n', 'NORMAL', ''),
(20, 'Rattatac', 'M', 'o', 'NORMAL', ''),
(21, 'Piafabec', 'M', 'n', 'NORMAL', 'VOL'),
(22, 'Rapasdepic', 'M', 'o', 'NORMAL', 'VOL'),
(23, 'Abo', 'M', 'n', 'POISON', ''),
(24, 'Arbok', 'M', 'o', 'POISON', ''),
(25, 'Pikachu', 'M', 'n', 'ELECTRIK', ''),
(26, 'Raichu', 'M', 'o', 'ELECTRIK', ''),
(27, 'Sabelette', 'M', 'n', 'SOL', ''),
(28, 'Sablaireau', 'M', 'o', 'SOL', ''),
(29, 'Nidoran_', 'P', 'n', 'POISON', ''),
(30, 'Nidorina', 'P', 'o', 'POISON', ''),
(31, 'Nidoqueen', 'P', 'o', 'POISON', 'SOL'),
(32, 'Nidoran_', 'P', 'n', 'POISON', ''),
(33, 'Nidorino', 'P', 'o', 'POISON', ''),
(34, 'Nidoking', 'P', 'o', 'POISON', 'SOL'),
(35, 'Mélofée', 'R', 'n', 'FEE', ''),
(36, 'Mélodelfe', 'R', 'o', 'FEE', ''),
(37, 'Goupix', 'M', 'n', 'FEU', ''),
(38, 'Feunard', 'M', 'o', 'FEU', ''),
(39, 'Rondoudou', 'R', 'n', 'NORMAL', 'FEE'),
(40, 'Grodoudou', 'R', 'o', 'NORMAL', 'FEE'),
(41, 'Nosferapti', 'M', 'n', 'POISON', 'VOL'),
(42, 'Nosferalto', 'M', 'o', 'POISON', 'VOL'),
(43, 'Mystherbe', 'P', 'n', 'PLANTE', 'POISON'),
(44, 'Ortide', 'P', 'o', 'PLANTE', 'POISON'),
(45, 'Rafflesia', 'P', 'o', 'PLANTE', 'POISON'),
(46, 'Paras', 'M', 'n', 'INSECTE', 'PLANTE'),
(47, 'Parasect', 'M', 'o', 'INSECTE', 'PLANTE'),
(48, 'Mimitoss', 'M', 'n', 'INSECTE', 'POISON'),
(49, 'Aéromite', 'M', 'o', 'INSECTE', 'POISON'),
(50, 'Taupiqueur', 'M', 'n', 'SOL', ''),
(51, 'Triopikeur', 'M', 'o', 'SOL', ''),
(52, 'Miaouss', 'M', 'n', 'NORMAL', ''),
(53, 'Persian', 'M', 'o', 'NORMAL', ''),
(54, 'Psykokwak', 'M', 'n', 'EAU', ''),
(55, 'Akwakwak', 'M', 'o', 'EAU', ''),
(56, 'Férosinge', 'M', 'n', 'COMBAT', ''),
(57, 'Colossinge', 'M', 'o', 'COMBAT', ''),
(58, 'Caninos', 'L', 'n', 'FEU', ''),
(59, 'Arcanin', 'L', 'o', 'FEU', ''),
(60, 'Ptitard', 'P', 'n', 'EAU', ''),
(61, 'Tétarte', 'P', 'o', 'EAU', ''),
(62, 'Tartard', 'P', 'o', 'EAU', 'COMBAT'),
(63, 'Abra', 'P', 'n', 'PSY', ''),
(64, 'Kadabra', 'P', 'o', 'PSY', ''),
(65, 'Alakazam', 'P', 'o', 'PSY', ''),
(66, 'Machoc', 'P', 'n', 'COMBAT', ''),
(67, 'Machopeur', 'P', 'o', 'COMBAT', ''),
(68, 'Mackogneur', 'P', 'o', 'COMBAT', ''),
(69, 'Chétiflor', 'P', 'n', 'PLANTE', 'POISON'),
(70, 'Boustiflor', 'P', 'o', 'PLANTE', 'POISON'),
(71, 'Empiflor', 'P', 'o', 'PLANTE', 'POISON'),
(72, 'Tentacool', 'L', 'n', 'EAU', 'POISON'),
(73, 'Tentacruel', 'L', 'o', 'EAU', 'POISON'),
(74, 'Racaillou', 'P', 'n', 'ROCHE', 'SOL'),
(75, 'Gravalanch', 'P', 'o', 'ROCHE', 'SOL'),
(76, 'Grolem', 'P', 'o', 'ROCHE', 'SOL'),
(77, 'Ponyta', 'M', 'n', 'FEU', ''),
(78, 'Galopa', 'M', 'o', 'FEU', ''),
(79, 'Ramoloss', 'M', 'n', 'EAU', 'PSY'),
(80, 'Flagadoss', 'M', 'o', 'EAU', 'PSY'),
(81, 'Magnéti', 'M', 'n', 'ELECTRIK', 'ACIER'),
(82, 'MagnÌ©ton', 'M', 'o', 'ELECTRIK', 'ACIER'),
(83, 'Canarticho', 'M', 'n', 'NORMAL', 'VOL'),
(84, 'Doduo', 'M', 'n', 'NORMAL', 'VOL'),
(85, 'Dodrio', 'M', 'o', 'NORMAL', 'VOL'),
(86, 'Otaria', 'M', 'n', 'EAU', ''),
(87, 'Lamantine', 'M', 'o', 'EAU', 'GLACE'),
(88, 'Tadmorv', 'M', 'n', 'POISON', ''),
(89, 'Grotadmorv', 'M', 'o', 'POISON', ''),
(90, 'Kokiyas', 'L', 'n', 'EAU', ''),
(91, 'Crustabri', 'L', 'o', 'EAU', 'GLACE'),
(92, 'Fantominus', 'P', 'n', 'SPECTRE', 'POISON'),
(93, 'Spectrum', 'P', 'o', 'SPECTRE', 'POISON'),
(94, 'Ectoplasma', 'P', 'o', 'SPECTRE', 'POISON'),
(95, 'Onix', 'M', 'n', 'ROCHE', 'SOL'),
(96, 'Soporifik', 'M', 'n', 'PSY', ''),
(97, 'Hypnomade', 'M', 'o', 'PSY', ''),
(98, 'Krabby', 'M', 'n', 'EAU', ''),
(99, 'Krabboss', 'M', 'o', 'EAU', ''),
(100, 'Voltorbe', 'M', 'n', 'ELECTRIK', ''),
(101, 'Electrode', 'M', 'o', 'ELECTRIK', ''),
(102, 'Noeunoeuf', 'L', 'n', 'PLANTE', 'PSY'),
(103, 'Noadkoko', 'L', 'o', 'PLANTE', 'PSY'),
(104, 'Osselait', 'M', 'n', 'SOL', ''),
(105, 'Ossatueur', 'M', 'o', 'SOL', ''),
(106, 'Kicklee', 'M', 'n', 'COMBAT', ''),
(107, 'Tygnon', 'M', 'n', 'COMBAT', ''),
(108, 'Excelangue', 'M', 'n', 'NORMAL', ''),
(109, 'Smogo', 'M', 'n', 'POISON', ''),
(110, 'Smogogo', 'M', 'o', 'POISON', ''),
(111, 'Rhinocorne', 'L', 'n', 'SOL', 'ROCHE'),
(112, 'Rhinoféros', 'L', 'o', 'SOL', 'ROCHE'),
(113, 'Leveinard', 'R', 'n', 'NORMAL', ''),
(114, 'Saquedeneu', 'M', 'n', 'PLANTE', ''),
(115, 'Kangourex', 'M', 'n', 'NORMAL', ''),
(116, 'Hypotrempe', 'M', 'n', 'EAU', ''),
(117, 'HypocÌ©an', 'M', 'o', 'EAU', ''),
(118, 'PoissirÌ¬ne', 'M', 'n', 'EAU', ''),
(119, 'Poissoroy', 'M', 'o', 'EAU', ''),
(120, 'Stari', 'L', 'n', 'EAU', ''),
(121, 'Staross', 'L', 'o', 'EAU', 'PSY'),
(122, 'M. Mime', 'M', 'n', 'PSY', 'FEE'),
(123, 'Insécateur', 'M', 'n', 'INSECTE', 'VOL'),
(124, 'Lippoutou', 'M', 'n', 'GLACE', 'PSY'),
(125, 'Elektek', 'M', 'n', 'ELECTRIK', ''),
(126, 'Magmar', 'M', 'n', 'FEU', ''),
(127, 'Scarabrute', 'L', 'n', 'INSECTE', ''),
(128, 'Tauros', 'L', 'n', 'NORMAL', ''),
(129, 'Magicarpe', 'L', 'n', 'EAU', ''),
(130, 'Léviator', 'L', 'o', 'EAU', 'VOL'),
(131, 'Lokhlass', 'L', 'n', 'EAU', 'GLACE'),
(132, 'Métamorph', 'M', 'n', 'NORMAL', ''),
(133, 'Evoli', 'M', 'n', 'NORMAL', ''),
(134, 'Aquali', 'M', 'o', 'EAU', ''),
(135, 'Voltali', 'M', 'o', 'ELECTRIK', ''),
(136, 'Pyroli', 'M', 'o', 'FEU', ''),
(137, 'Porygon', 'M', 'n', 'NORMAL', ''),
(138, 'Amonita', 'M', 'n', 'ROCHE', 'EAU'),
(139, 'Amonistar', 'M', 'o', 'ROCHE', 'EAU'),
(140, 'Kabuto', 'M', 'n', 'ROCHE', 'EAU'),
(141, 'Kabutops', 'M', 'o', 'ROCHE', 'EAU'),
(142, 'Ptéra', 'L', 'n', 'ROCHE', 'VOL'),
(143, 'Ronflex', 'L', 'n', 'NORMAL', ''),
(144, 'Artikodin', 'L', 'n', 'GLACE', 'VOL'),
(145, 'Electhor', 'L', 'n', 'ELECTRIK', 'VOL'),
(146, 'Sulfura', 'L', 'n', 'FEU', 'VOL'),
(147, 'Minidraco', 'L', 'n', 'DRAGON', ''),
(148, 'Draco', 'L', 'o', 'DRAGON', ''),
(149, 'Dracolosse', 'L', 'o', 'DRAGON', 'VOL'),
(150, 'Mewtwo', 'L', 'n', 'PSY', ''),
(151, 'Mew', 'P', 'n', 'PSY', '');

-- --------------------------------------------------------

--
-- Structure de la table `pokemon`
--

DROP TABLE IF EXISTS `pokemon`;
CREATE TABLE IF NOT EXISTS `pokemon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDresseur` int(11) NOT NULL,
  `idEspece` int(11) NOT NULL,
  `sexe` varchar(7) NOT NULL,
  `XP` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  `prixVente` int(11) DEFAULT NULL,
  `enVente` tinyint(1) NOT NULL,
  `dernierEntrainement` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pokemon`
--

INSERT INTO `pokemon` (`id`, `idDresseur`, `idEspece`, `sexe`, `XP`, `niveau`, `prixVente`, `enVente`, `dernierEntrainement`) VALUES
(6, 1, 4, 'Femelle', 450, 0, 99, 0, NULL),
(7, 2, 25, 'Femelle', 102, 0, NULL, 0, NULL),
(8, 3, 7, 'Femelle', 39, 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `password`) VALUES
(1, 'pop', 'pop@pop.fr', '4f197c99a78b8411f1cf48ab409a0a6d176b99b7'),
(2, 'toto', 'toto@toto.fr', '0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c'),
(3, 'moi', 'moi@moi.fr', '55cbe7fd00627a28668d1d7c9899bdb602dad69d');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
