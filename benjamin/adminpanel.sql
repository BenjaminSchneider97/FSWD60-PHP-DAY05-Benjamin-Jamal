-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Mrz 2019 um 15:51
-- Server-Version: 10.1.38-MariaDB
-- PHP-Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `adminpanel`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `itemName` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `items`
--

INSERT INTO `items` (`item_id`, `itemName`) VALUES
(2, 'Jamals Macbook'),
(3, 'Jamals Orangejuice'),
(4, 'Jamals Phone'),
(5, 'Jamals Backpack'),
(6, 'Jamals Snacks'),
(7, 'Jamals Glass of Water'),
(9, 'Jamals Code'),
(11, 'Jamals Teddybear'),
(12, 'Jamals Fruits'),
(13, 'Jamals Pets'),
(14, 'Jamals Avocados');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `userdata`
--

CREATE TABLE `userdata` (
  `userdata_id` int(11) NOT NULL,
  `userFirstName` varchar(55) DEFAULT NULL,
  `userLastName` varchar(55) DEFAULT NULL,
  `userEmail` varchar(55) DEFAULT NULL,
  `userPassword` varchar(255) DEFAULT NULL,
  `adminrole` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `userdata`
--

INSERT INTO `userdata` (`userdata_id`, `userFirstName`, `userLastName`, `userEmail`, `userPassword`, `adminrole`) VALUES
(1, 'Benjamin', 'Schneider', 'benjamin@domain.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Y'),
(2, 'Jamal', 'Ahmed', 'jamal@domain.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'N'),
(3, 'Benjamin', 'Schneider', 'benjamin2@domain.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'N');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indizes für die Tabelle `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`userdata_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `userdata`
--
ALTER TABLE `userdata`
  MODIFY `userdata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
