-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 10:20 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_informatica`
--

-- --------------------------------------------------------

--
-- Table structure for table `anunturi`
--

CREATE TABLE `anunturi` (
  `id` int(10) NOT NULL,
  `descriere` text NOT NULL,
  `categorie` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anunturi`
--

INSERT INTO `anunturi` (`id`, `descriere`, `categorie`) VALUES
(2, 'Syncro Soft, unul dintre jucÄƒtorii importanÈ›i ai industriei IT din Craiova, vÄƒ invitÄƒ sÄƒ vÄƒ Ã®nscrieÈ›i Ã®n programul de internship plÄƒtit â€“ Syncro Internship Program 2020!', 'Internship'),
(3, 'Pentru vara aceasta, compania NetRom vine cu oportunitÄƒÈ›i de Ã®nvÄƒÈ›are, suport È™i mentorship, experienÈ›e reale de lucru Ã®n echipÄƒ È™i o comunitate Ã®ntreagÄƒ de profesioniÈ™ti. Pe voi vÄƒ aÈ™teaptÄƒ cu entuziasm, talent È™i pasiune pentru programare.  AÈ™adar, suntem Ã®ncÃ¢ntaÈ›i sÄƒ anunÈ›Äƒm cÄƒ am dat startul la Ã®nscrieri pentru programele noastre de varÄƒ, NetRom{Summer}Camp (PracticÄƒ) È™i NetRom Internship. ÃŽnregistrarea online este disponibilÄƒ la adresa http://www.netromsoftware.ro/student-registration È™i rÄƒmÃ¢ne deschisÄƒ pÃ¢nÄƒ pe 26 aprilie.  Pentru ambele programe va fi susÈ›inut online un test preliminar Ã®n data de 29 aprilie È™i interviuri online Ã®ntre 4-17 mai. CunoÈ™tinÈ›ele de OOP, algoritmi È™i baze de date vor fi principalele criterii urmÄƒrite Ã®n procesul de selecÈ›ie.  CandidaÈ›ii admiÈ™i care ni se vor alÄƒtura Ã®ntre 22 Iunie â€“ 12 Iulie 2020 pentru NetRom {Summer} Camp (PracticÄƒ) È™i Ã®ntre 17 august â€“ 11 Septembrie 2020 pentru NetRom Internship, vor avea oportunitatea de a capÄƒta noi abilitÄƒÈ›i È™i noi perspective: experienÈ›Äƒ practicÄƒ Ã®n aria IT, lucrÃ¢nd cu experÈ›ii noÈ™tri din cadrul companiei, precum È™i condiÈ›ii de lucru deosebite Ã®n mijlocul unei echipe tinere È™i dinamice.  Mai multe detalii regÄƒsiÈ›i la: http://www.netromsoftware.ro/students-internship & http://www.netromsoftware.ro/students-summer-camp.  Ne auzim curÃ¢nd! PÃ¢nÄƒ atunci, take care & click IT: http://www.netromsoftware.ro/student-registration.', 'Practica');

-- --------------------------------------------------------

--
-- Table structure for table `cadre`
--

CREATE TABLE `cadre` (
  `id` int(10) NOT NULL,
  `nume` char(50) NOT NULL,
  `grad` char(5) NOT NULL,
  `titlu` char(3) NOT NULL,
  `pagina_web` char(50) NOT NULL,
  `telefon_serviciu` char(20) NOT NULL,
  `fax_serviciu` char(20) NOT NULL,
  `e_mail` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cadre`
--

INSERT INTO `cadre` (`id`, `nume`, `grad`, `titlu`, `pagina_web`, `telefon_serviciu`, `fax_serviciu`, `e_mail`) VALUES
(1, 'Iancu Ion', 'Prof.', 'Dr.', 'http://inf.ucv.ro/~iancu/', '+40.251.413728', '+40.251.412673', 'i_iancu@yahoo.com'),
(2, 'Gabroveanu Mihai', 'Lect.', 'Dr.', 'http://inf.ucv.ro/~mihaiug/', '+40.251.413728', '+40.251.412673', 'mihaiug@central.ucv.ro'),
(3, 'Constantinescu Nicolae', 'Conf.', 'Dr.', 'http://inf.ucv.ro/~nikyc/', '+40.251.413728', '+40-251-365476', 'nikyc@central.ucv.ro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anunturi`
--
ALTER TABLE `anunturi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cadre`
--
ALTER TABLE `cadre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anunturi`
--
ALTER TABLE `anunturi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cadre`
--
ALTER TABLE `cadre`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
