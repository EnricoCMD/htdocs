-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Mai 2024 um 18:47
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `webshop_emenra`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `ID_B` int(11) NOT NULL,
  `B_Name` varchar(100) NOT NULL,
  `B_Vorname` varchar(100) NOT NULL,
  `B_Geburtstag` int(11) NOT NULL,
  `B_Adresse` varchar(100) NOT NULL,
  `B_Telefonnummer` int(11) NOT NULL,
  `B_Mail` varchar(100) NOT NULL,
  `B_Passwort` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellungen`
--

CREATE TABLE `bestellungen` (
  `O_ID` int(11) NOT NULL,
  `O_Datum` int(11) NOT NULL,
  `B_ID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL,
  `O_Endsumme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bildzuordnung`
--

CREATE TABLE `bildzuordnung` (
  `id` int(11) NOT NULL,
  `produkt_id` int(11) NOT NULL,
  `bild_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `bildzuordnung`
--

INSERT INTO `bildzuordnung` (`id`, `produkt_id`, `bild_id`) VALUES
(1, 5, 1),
(2, 5, 2),
(3, 5, 3),
(4, 7, 4),
(5, 7, 5),
(6, 7, 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produktbilder`
--

CREATE TABLE `produktbilder` (
  `id` int(11) NOT NULL,
  `pfad` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `produktbilder`
--

INSERT INTO `produktbilder` (`id`, `pfad`) VALUES
(1, 'Produkt_Fotos/BlumePullover/pulloverblumehinten.png'),
(2, 'Produkt_Fotos/BlumePullover/pulloverblumenah.png'),
(3, 'Produkt_Fotos/BlumePullover/pulloverblumevorne.png'),
(4, 'Produkt_Fotos/HamptonsPullover/PulloverVorne1.png'),
(5, 'Produkt_Fotos/HamptonsPullover/PulloverHinten1.png'),
(6, 'Produkt_Fotos/HamptonsPullover/PulloverNah1.png'),
(7, 'Produkt_Fotos/hosedame1/hosenahweiss.png');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produkte`
--

CREATE TABLE `produkte` (
  `P_ID` int(11) NOT NULL,
  `P_Name` varchar(50) NOT NULL,
  `P_Beschreibung` varchar(500) NOT NULL,
  `P_Kategorie` varchar(50) NOT NULL,
  `P_Anzahl` text NOT NULL,
  `P_Preis` double NOT NULL,
  `P_Bewertung` double NOT NULL,
  `P_Größe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Daten für Tabelle `produkte`
--

INSERT INTO `produkte` (`P_ID`, `P_Name`, `P_Beschreibung`, `P_Kategorie`, `P_Anzahl`, `P_Preis`, `P_Bewertung`, `P_Größe`) VALUES
(1, 'Jeans Blau', 'Alltagshose, bequemer Schnitt, 100% Baumwolle\r\n', 'veraltet', 'Verfügbar', 39.99, 4.3, 'S,M,L,XL'),
(2, 'T-Shirt Schwarz', 'Basic T-Shirt, für jeden Style, 100% Baumwolle', 'veraltet', 'Verfügbar', 10.99, 4.5, 'S,M,L,XL'),
(3, 'Grauer Pullover', 'Schöner grauer Pullover, bequemer Schnitt, 100% Baumwolle', 'veraltet', 'Verfügbar', 40.99, 4.6, 'S,M,L,XL'),
(4, 'Weißes T-Shirt', 'Basic T-Shirt, für jeden Style, 100% Baumwolle', 'veraltet', 'Verfügbar', 10.99, 4.2, 'S,M,L,XL'),
(5, 'Pullover mit Blumen Muster', 'Schicker Pullover mit Blumen, <br>Gute Passform <br> 90% Baumwolle, 10% Polyester', '', 'Verfügbar', 35.99, 4.2, 'S,M,L,XL'),
(6, 'Gerade geschnittene Jogginghose in Schwarz', 'Seitenstreifen\r\nTaillenbund mit Kordelzug\r\nSeitentaschen\r\nGerader Schnitt\r\n100% Baumwolle', 'Hose', 'Vefügbar', 45.99, 5, 'S,M,L,XL'),
(7, 'Oversize-Sweatshirt in Weiß mit „Hamptons“-Schrift', 'Kapuzenpullover & Sweatshirts von Miss Selfridge \r\n    Rundhalsausschnitt\r\n    Langärmlig\r\n    Stickereien\r\n    Normale Passform\r\n\r\n', 'Pullover', 'Verfügbar', 60.99, 4.4, 'S,M,L,XL'),
(8, 'Miss Selfridge – Kurzärmliges Fußball-Oberteil aus', ' Wandert direkt in den Einkaufswagen<br>    V-Ausschnitt<br>Überschnittene Schultern<br>„85“-Print auf der Brust<br>Lockere Passform<br>', 'Tshirt', 'Verfügbar', 45.99, 4.4, 'S,M,L,XL'),
(9, 'Bershka – San Francisco – Oversize-T-Shirt in Weiß', 'Zurück zu den Basics<br>grafisches Druckmuster<br>Rundhalsausschnitt<br>Kurzärmlig<br>Oversize-Passform', 'Tshirt', 'Verfügbar', 17.99, 4.3, 'S,M,L,XL');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produktvideos`
--

CREATE TABLE `produktvideos` (
  `id` int(11) NOT NULL,
  `pfad` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `produktvideos`
--

INSERT INTO `produktvideos` (`id`, `pfad`) VALUES
(1, 'Produkt_Fotos/HamptonsPullover/ProduktVideoHamptons.mp4');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `videozuordnung`
--

CREATE TABLE `videozuordnung` (
  `id` int(11) NOT NULL,
  `produkt_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `videozuordnung`
--

INSERT INTO `videozuordnung` (`id`, `produkt_id`, `video_id`) VALUES
(1, 7, 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`ID_B`);

--
-- Indizes für die Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  ADD PRIMARY KEY (`O_ID`),
  ADD KEY `B_ID` (`B_ID`),
  ADD KEY `P_ID` (`P_ID`);

--
-- Indizes für die Tabelle `bildzuordnung`
--
ALTER TABLE `bildzuordnung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produkt_id` (`produkt_id`),
  ADD KEY `bild_id` (`bild_id`);

--
-- Indizes für die Tabelle `produktbilder`
--
ALTER TABLE `produktbilder`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `produkte`
--
ALTER TABLE `produkte`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indizes für die Tabelle `produktvideos`
--
ALTER TABLE `produktvideos`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `videozuordnung`
--
ALTER TABLE `videozuordnung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_id` (`video_id`),
  ADD KEY `produkt_id` (`produkt_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `ID_B` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  MODIFY `O_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `bildzuordnung`
--
ALTER TABLE `bildzuordnung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `produktbilder`
--
ALTER TABLE `produktbilder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `produkte`
--
ALTER TABLE `produkte`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `produktvideos`
--
ALTER TABLE `produktvideos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `videozuordnung`
--
ALTER TABLE `videozuordnung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  ADD CONSTRAINT `bestellungen_ibfk_1` FOREIGN KEY (`P_ID`) REFERENCES `produkte` (`P_ID`),
  ADD CONSTRAINT `bestellungen_ibfk_2` FOREIGN KEY (`B_ID`) REFERENCES `benutzer` (`ID_B`);

--
-- Constraints der Tabelle `bildzuordnung`
--
ALTER TABLE `bildzuordnung`
  ADD CONSTRAINT `bildzuordnung_ibfk_1` FOREIGN KEY (`bild_id`) REFERENCES `produktbilder` (`id`),
  ADD CONSTRAINT `bildzuordnung_ibfk_2` FOREIGN KEY (`produkt_id`) REFERENCES `produkte` (`P_ID`);

--
-- Constraints der Tabelle `videozuordnung`
--
ALTER TABLE `videozuordnung`
  ADD CONSTRAINT `videozuordnung_ibfk_1` FOREIGN KEY (`produkt_id`) REFERENCES `produkte` (`P_ID`),
  ADD CONSTRAINT `videozuordnung_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `produktvideos` (`id`),
  ADD CONSTRAINT `videozuordnung_ibfk_3` FOREIGN KEY (`produkt_id`) REFERENCES `produkte` (`P_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
