-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 11 feb 2025 om 10:10
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
-- Database: `bmw_cars`
--
CREATE DATABASE IF NOT EXISTS `bmw_cars` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bmw_cars`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bmws`
--

DROP TABLE IF EXISTS `bmws`;
CREATE TABLE `bmws` (
  `id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `range1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `bmws`
--

INSERT INTO `bmws` (`id`, `model`, `price`, `range1`) VALUES
(1, 'M5', 77777.00, 123213),
(2, 'M8', 12345.00, 12345),
(3, 'M12', 53530.00, 532525);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bmws`
--
ALTER TABLE `bmws`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bmws`
--
ALTER TABLE `bmws`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
