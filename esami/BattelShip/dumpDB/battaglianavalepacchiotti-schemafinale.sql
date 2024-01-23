-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 04, 2023 alle 09:08
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `battaglianavalepacchiotti`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `giocatori`
--

CREATE TABLE `giocatori` (
  `ID_giocatore` int(11) NOT NULL,
  `nickname` text NOT NULL,
  `tabella` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `giocatori`
--

INSERT INTO `giocatori` (`ID_giocatore`, `nickname`, `tabella`) VALUES
(38, 'Green', '[[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"]]'),
(39, 'Purple', '[[\"X\",\"X\",\"X\",\"X\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"X\",\"X\",\"X\",\"X\",\"O\",\"X\",\"X\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"X\",\"X\",\"X\",\"X\",\"X\",\"X\",\"O\",\"O\",\"O\",\"O\"]]'),
(40, 'Gray', '[[\"M\",\"H\",\"H\",\"H\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"H\",\"H\",\"H\",\"H\",\"M\",\"H\",\"H\",\"O\",\"M\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"H\",\"H\",\"H\",\"H\",\"H\",\"H\",\"O\",\"O\",\"O\",\"O\"]]'),
(41, 'Brown', '[[\"M\",\"M\",\"H\",\"H\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"M\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"H\",\"H\",\"H\",\"H\",\"M\",\"H\",\"X\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"M\",\"O\",\"O\",\"O\",\"O\"],[\"M\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"H\",\"H\",\"H\",\"H\",\"H\",\"X\",\"O\",\"O\",\"O\",\"O\"]]'),
(46, 'Yellow', '[[\"X\",\"H\",\"H\",\"X\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"M\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"X\",\"X\",\"X\",\"X\",\"O\",\"X\",\"X\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"M\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"H\",\"X\",\"X\",\"X\",\"X\",\"X\",\"O\",\"O\",\"O\",\"O\"]]'),
(47, 'Black', '[[\"M\",\"H\",\"H\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"M\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"]]'),
(48, 'Red', '[[\"H\",\"X\",\"H\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"M\",\"O\",\"M\",\"O\"]]'),
(49, 'Blu', '[[\"O\",\"M\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"H\",\"H\",\"H\"]]');

-- --------------------------------------------------------

--
-- Struttura della tabella `partita`
--

CREATE TABLE `partita` (
  `nicknameHost` text NOT NULL,
  `nicknameSfidante` text DEFAULT NULL,
  `ID_Partita` varchar(15) NOT NULL,
  `turno` int(15) NOT NULL,
  `vincitore` text DEFAULT NULL,
  `whoisplaying` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `partita`
--

INSERT INTO `partita` (`nicknameHost`, `nicknameSfidante`, `ID_Partita`, `turno`, `vincitore`, `whoisplaying`) VALUES
('Yellow', 'Black', '656a4c3d3ac79', 10, 'Yellow', 'Black'),
('Red', 'Blu', '656a518a7fe44', 9, 'Red', 'Blu');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `giocatori`
--
ALTER TABLE `giocatori`
  ADD PRIMARY KEY (`ID_giocatore`);

--
-- Indici per le tabelle `partita`
--
ALTER TABLE `partita`
  ADD PRIMARY KEY (`ID_Partita`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `giocatori`
--
ALTER TABLE `giocatori`
  MODIFY `ID_giocatore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
