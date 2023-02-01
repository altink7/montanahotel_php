-- Altin Kelmendi
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: altinpc.ddns.net
-- Erstellungszeit: Log: now()
-- Server-Version: 10.4.25-MariaDB
-- PHP-Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `montanadb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `bild` blob NOT NULL,
  `titel` varchar(50) NOT NULL,
  `beitrag` varchar(500) NOT NULL,
  `user_fk` int(11) NOT NULL,
  `zeit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rooms`
--

CREATE TABLE `rooms` (
  `rooms_id` int(11) NOT NULL,
  `anreisedatum` date NOT NULL,
  `abreisedatum` date NOT NULL,
  `zimmer` enum('Mountain Sweet','Ozean Sweet','Deluxe Villa','Ozean Villa') NOT NULL,
  `fruehstueck` tinyint(1) DEFAULT NULL,
  `parkplatz` tinyint(1) DEFAULT NULL,
  `haustier` tinyint(1) DEFAULT NULL,
  `anmerkung` varchar(200) DEFAULT NULL,
  `user_fk` int(11) NOT NULL,
  `zeit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `preis` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `useremail` varchar(150) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;