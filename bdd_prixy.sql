-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 28 jan. 2022 à 09:31
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_prixy`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `IDCLient` int(11) NOT NULL AUTO_INCREMENT,
  `CLIRaisonSociale` int(40) NOT NULL,
  `CLIAdresseComplete` varchar(100) NOT NULL,
  `CLICodePostale` int(6) NOT NULL,
  `CLITelFixe` int(10) DEFAULT NULL,
  `CLITelMobile` int(10) DEFAULT NULL,
  `CLIEmail` varchar(60) NOT NULL,
  `CLIVille` varchar(50) NOT NULL,
  PRIMARY KEY (`IDCLient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

DROP TABLE IF EXISTS `formateur`;
CREATE TABLE IF NOT EXISTS `formateur` (
  `IDFormateur` int(11) NOT NULL AUTO_INCREMENT,
  `NOMFormateur` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `EMAILFormateur` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`IDFormateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `NUMReservation` int(11) NOT NULL AUTO_INCREMENT,
  `RESERVDate` date NOT NULL,
  `HeureDebut` time NOT NULL,
  `HeureFIN` time NOT NULL,
  `Description` text CHARACTER SET utf8 COLLATE utf8_bin,
  `Intitule` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `NBparticipant` int(2) NOT NULL,
  `IDSalle` int(11) NOT NULL,
  `UTILNomUtilisateur` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`NUMReservation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation_externe`
--

DROP TABLE IF EXISTS `reservation_externe`;
CREATE TABLE IF NOT EXISTS `reservation_externe` (
  `RESERVExtID` int(11) NOT NULL AUTO_INCREMENT,
  `IDClient` int(11) NOT NULL,
  `NUMRESERVATION` int(11) NOT NULL,
  PRIMARY KEY (`RESERVExtID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation_interne`
--

DROP TABLE IF EXISTS `reservation_interne`;
CREATE TABLE IF NOT EXISTS `reservation_interne` (
  `RESERVIntID` int(11) NOT NULL AUTO_INCREMENT,
  `RESERVNomResponsable` varchar(35) NOT NULL,
  `NUMReservation` int(11) NOT NULL,
  PRIMARY KEY (`RESERVIntID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `IDSalle` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroSalle` int(11) NOT NULL,
  `BatimentLibelle` varchar(50) NOT NULL,
  PRIMARY KEY (`IDSalle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `session_formation`
--

DROP TABLE IF EXISTS `session_formation`;
CREATE TABLE IF NOT EXISTS `session_formation` (
  `FORMATIONID` int(11) NOT NULL AUTO_INCREMENT,
  `NUMReservation` int(11) NOT NULL,
  `IDFormateur` int(11) NOT NULL,
  PRIMARY KEY (`FORMATIONID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `UTILNomUtilisateur` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `UTILMotDePasse` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`UTILNomUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
