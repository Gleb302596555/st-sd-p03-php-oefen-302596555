-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 13 feb 2025 om 12:15
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dieren`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `dier`
--

CREATE TABLE `dier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `dier`
--

INSERT INTO `dier` (`id`, `name`, `img`, `info`) VALUES
(1, 'Giraf', '', 'Een giraf is een herkauwer, net als een koe. Een volwassen giraf kan wel vijf meter lang worden. Met z\'n lange nek en poten kan hij gemakkelijk bij de hoogste takken van een boom. Mannetjes giraffen gebruiken hun nek ook om te laten zien wie de sterkste i'),
(2, 'Hert', '', 'Vooral het mannetje is erg groot, hij kan wel 255 kilo wegen! Zijn gewei kan soms wel groter worden dan 90 centimeter. De vacht van edelherten is roodbruin en in de winter grijsbruin. Het edelhert eet hetzelfde als het damhert en leeft ook in roedels.'),
(3, 'Olifant', '', 'Olifanten kunnen wel 8 ton wegen. Ze hebben een enorm lichaam, lange oren en een lange slurf die ze gebruiken om dingen op de rapen, om andere dieren te waarschuwen en om water op te pakken om te drinken. Er zijn drie soorten olifanten: de Afrikaanse boso'),
(4, 'Kameel', '', 'Kamelen kunnen een lengte van 2.25 tot 3.45 meter bereiken en een schouderhoogte van 1.80 tot 2.30 meter. Ze worden veel gebruikt als rij- en lastdier door mensen die door de woestijn reizen. Ze worden dan ook wel het schip van de woestijn genoemd.'),
(5, 'Ijsbeer', '', 'IJsberen zijn zoogdieren die leven in de koude gebieden op en rond de Noordpool. Ze kunnen tussen de 2 en 3,5 meter lang en 1,5 meter hoog worden en daarmee zij ze de grootste op het land levende vleeseters. De mannetjes kunnen wel 700 kilogram wegen. IJs');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `dier`
--
ALTER TABLE `dier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `dier`
--
ALTER TABLE `dier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
