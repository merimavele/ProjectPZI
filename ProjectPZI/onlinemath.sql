-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 03:41 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinemath`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `lozinka` varchar(256) NOT NULL,
  `uloga` enum('Administrator','Nastavnik','Učenik','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`ID`, `ime`, `prezime`, `email`, `lozinka`, `uloga`) VALUES
(1, 'a', 'a', 'administrator@hotmail.com', '0cc175b9c0f1b6a831c399e269772661', 'Administrator'),
(2, 'merima', 'vele', 'merimaa.vele@sum.ba', '6f8f57715090da2632453988d9a1501b', 'Učenik'),
(64, 'Nastavnik', '1', 'nastavnik1@hotmail.com', 'c82561ec215a6e31807ceedf3b3bd25e', 'Nastavnik'),
(65, 'Nastavnik', '2', 'nastavnik2@hotmail.com', 'a6bbc91ae73dd21c0533f735470a9cd0', 'Nastavnik');

-- --------------------------------------------------------

--
-- Table structure for table `materijali`
--

CREATE TABLE `materijali` (
  `id` int(10) UNSIGNED NOT NULL,
  `ime` varchar(200) NOT NULL,
  `opis` varchar(255) DEFAULT NULL,
  `lekcija` varchar(255) DEFAULT NULL,
  `IDNastavnika` int(10) UNSIGNED NOT NULL,
  `Nazivrazreda` enum('Prvi','Drugi','Treći','Četvrti','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materijali`
--

INSERT INTO `materijali` (`id`, `ime`, `opis`, `lekcija`, `IDNastavnika`, `Nazivrazreda`) VALUES
(40, 'Skupovi ', 'Skupovi i operacije sa skupovima', '603ea6dd55e28.docx', 64, 'Prvi'),
(41, 'Logika', 'Osnovni pojmovi', '603ea700883b3.docx', 64, 'Prvi'),
(42, 'TRigonometrija', 'Trigonometrijski indetiteti', '603ea744757a1.pdf', 64, 'Drugi'),
(43, 'Homotetija', 'Homotetija', '603ea76085c58.docx', 64, 'Drugi'),
(44, 'TRigonometrija', 'Trigonometrijske jednačine', '603ea7b0e320a.pdf', 65, 'Prvi'),
(45, 'TRigonometrija', 'Trigonometrija-zadaci', '603ea7f1c3c81.docx', 65, 'Treći'),
(46, 'TRigonometrija', 'Trigonometrija-zadaci', '603ea82153015.docx', 65, 'Treći'),
(47, 'Aritmetički niz', 'Aritmetički niz', '603ea853a5d18.docx', 65, 'Četvrti'),
(48, 'Geometrijski niz', 'Geometrijski niz', '603ea87013cc5.docx', 65, 'Četvrti');

-- --------------------------------------------------------

--
-- Table structure for table `npp`
--

CREATE TABLE `npp` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Nazivoblasti` varchar(200) NOT NULL,
  `Nazivrazreda` enum('Prvi','Drugi','Treći','Četvrti','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `npp`
--

INSERT INTO `npp` (`ID`, `Nazivoblasti`, `Nazivrazreda`) VALUES
(70, 'Skupovi i operacije sa skupovima', 'Prvi'),
(71, 'Osnove logike', 'Prvi'),
(72, 'Skup realnih brojeva', 'Prvi'),
(73, 'Trigonometririja', 'Drugi'),
(74, 'Homotetija', 'Drugi'),
(75, 'Trigonometrijske jednačine i nejednačine', 'Treći'),
(76, 'Vektori', 'Treći'),
(77, 'Aritmetički i geometrijske niz', 'Četvrti'),
(78, 'Matematička indukcija', 'Četvrti');

-- --------------------------------------------------------

--
-- Table structure for table `razred`
--

CREATE TABLE `razred` (
  `ID` int(100) UNSIGNED NOT NULL,
  `Naziv` enum('Prvi','Drugi','Treći','Četvrti','') NOT NULL,
  `emailNastavnika` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `razred`
--

INSERT INTO `razred` (`ID`, `Naziv`, `emailNastavnika`) VALUES
(1, 'Prvi', 'nastavnik1@hotmail.com'),
(2, 'Drugi', 'nastavnik1@hotmail.com'),
(10, 'Treći', 'nastavnik2@hotmail.com'),
(34, 'Četvrti', 'nastavnik2@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `materijali`
--
ALTER TABLE `materijali`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDNastavnika` (`IDNastavnika`),
  ADD KEY `Naziv razreda` (`Nazivrazreda`);

--
-- Indexes for table `npp`
--
ALTER TABLE `npp`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Nazivrazreda` (`Nazivrazreda`);

--
-- Indexes for table `razred`
--
ALTER TABLE `razred`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Naziv` (`Naziv`),
  ADD KEY `razred_ibfk_1` (`emailNastavnika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `materijali`
--
ALTER TABLE `materijali`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `npp`
--
ALTER TABLE `npp`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `razred`
--
ALTER TABLE `razred`
  MODIFY `ID` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `materijali`
--
ALTER TABLE `materijali`
  ADD CONSTRAINT `materijali_ibfk_1` FOREIGN KEY (`IDNastavnika`) REFERENCES `korisnik` (`ID`),
  ADD CONSTRAINT `materijali_ibfk_3` FOREIGN KEY (`Nazivrazreda`) REFERENCES `razred` (`Naziv`);

--
-- Constraints for table `npp`
--
ALTER TABLE `npp`
  ADD CONSTRAINT `npp_ibfk_1` FOREIGN KEY (`Nazivrazreda`) REFERENCES `razred` (`Naziv`);

--
-- Constraints for table `razred`
--
ALTER TABLE `razred`
  ADD CONSTRAINT `razred_ibfk_1` FOREIGN KEY (`emailNastavnika`) REFERENCES `korisnik` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
