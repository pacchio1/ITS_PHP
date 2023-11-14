-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Nov 14, 2023 alle 12:21
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
  `tabella` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`tabella`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `giocatori`
--

INSERT INTO `giocatori` (`ID_giocatore`, `nickname`, `tabella`) VALUES
(1, 'Mark2pac', '[[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"]]'),
(9, 'Giorgio', '[[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"]]'),
(10, 'Ciaone', '[[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"]]'),
(11, 'PazzoSgravato', '[[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"],[\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\",\"O\"]]');

-- --------------------------------------------------------

--
-- Struttura della tabella `partita`
--

CREATE TABLE `partita` (
  `nicknameHost` text NOT NULL,
  `nicknameSfidante` text NOT NULL,
  `ID_Partita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  MODIFY `ID_giocatore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
