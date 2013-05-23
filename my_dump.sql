-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2013 at 07:45 PM
-- Server version: 5.5.31
-- PHP Version: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jrestr76_reto1`
--
CREATE DATABASE `jrestr76_reto1` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `jrestr76_reto1`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_imagen`
--
-- Creation: May 23, 2013 at 12:19 AM
--

CREATE TABLE IF NOT EXISTS `tbl_imagen` (
  `cod_imagen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_imagen` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `date_imagen` int(11) NOT NULL,
  `type_imagen` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_imagen`),
  KEY `FK_tbl_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `tbl_imagen`
--

INSERT INTO `tbl_imagen` (`cod_imagen`, `id_user`, `name_imagen`, `date_imagen`, `type_imagen`) VALUES
(5, 4, 'img-1361414815', 1361414815, 'jpg'),
(9, 4, 'img-1361730119', 1361730119, 'jpg'),
(10, 4, 'img-1361730624', 1361730624, 'jpg'),
(11, 4, 'img-1361736263', 1361736263, 'jpg'),
(13, 1, 'img-1362747999', 1362747999, 'jpg'),
(14, 4, 'img-1362748036', 1362748036, 'jpg'),
(15, 4, 'img-1362748298', 1362748298, 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--
-- Creation: May 23, 2013 at 12:13 AM
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username_user` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `password_user` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `name_user` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `surname1_user` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `surname2_user` varchar(40) COLLATE latin1_spanish_ci DEFAULT NULL,
  `birthdate_user` int(10) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username_user`, `password_user`, `name_user`, `surname1_user`, `surname2_user`, `birthdate_user`) VALUES
(1, 'telematica', '7d8c9c8b116cdfe3fb091f4c1ac684de', 'profesor', 'telematica', NULL, 1361323497),
(4, 'jsrm', 'aa5312312089ffaaf1dd2c19bee60bcb', 'Javier Santiago', 'Restrepo', 'Moncada', 638344800);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_imagen`
--
ALTER TABLE `tbl_imagen`
  ADD CONSTRAINT `FK_tbl_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
