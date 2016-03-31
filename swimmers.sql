-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2016 at 09:17 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.6.19-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `swimmers`
--

-- --------------------------------------------------------

--
-- Table structure for table `swimmers`
--

CREATE TABLE IF NOT EXISTS `swimmers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` longtext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `lastName` longtext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` longtext NOT NULL,
  `address` longtext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `age` int(4) NOT NULL,
  `isProfessional` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `swimmers`
--

INSERT INTO `swimmers` (`id`, `firstName`, `lastName`, `email`, `address`, `age`, `isProfessional`) VALUES
(3, 'Jan', 'Kowalski', 'jankowalski@poczta.pl', 'PoznaÅ„, Marcina 23', 46, 0),
(5, 'Marek', 'Mikusek', 'mmikusek2211@gmail.com', 'PoznaÅ„, Polna 2', 45, 1),
(6, 'Zuza', 'Zuzowska', 'zuzaka@mail.pl', 'Zuzowo', 22, 0),
(7, 'JArek', 'Jarecki', 'jarek@email.pl', 'PoznaÅ„, Marcina 23', 34, 0),
(8, 'Darek', 'Darecki', 'darek@email.pl', 'PoznaÅ„, Polan 2', 45, 0),
(9, 'Arek', 'Arecki', 'arek@email.pl', 'PoznaÅ„, Marcina 23', 13, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
