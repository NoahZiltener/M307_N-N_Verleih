-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 07. Mai 2020 um 14:59
-- Server-Version: 10.1.44-MariaDB-0+deb9u1
-- PHP-Version: 7.0.33-27+0~20200419.34+debian9~1.gbpf45092

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kurseictbz_30715`
--
CREATE DATABASE IF NOT EXISTS `kurseictbz_30715` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kurseictbz_30715`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `loans`
--

DROP TABLE IF EXISTS `loans`;
CREATE TABLE `loans` (
  `loanid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `loandate` date NOT NULL,
  `returndate` date NOT NULL,
  `returned` tinyint(1) NOT NULL,
  `fk_movie` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `loans`
--

INSERT INTO `loans` (`loanid`, `firstname`, `lastname`, `phone`, `email`, `loandate`, `returndate`, `returned`, `fk_movie`) VALUES
(1, 'Noah', 'Ziltener', '0774861895', 'noahziltener@yahoo.com', '2020-05-07', '2020-07-16', 1, 4),
(2, 'Noah', 'Ziltener', '0774861895', 'noahziltener@yahoo.com', '2020-05-07', '2020-06-26', 1, 11),
(3, 'Noah', 'Ziltener', '123123', 'sad@dsa.ch', '2020-05-07', '2020-07-16', 1, 76),
(4, 'LELEK', 'LELEK', '-', 'sdjflksadjfllk@lskdjf.ch', '2020-05-07', '2020-06-26', 1, 21),
(5, 'Noah', 'Ziltener', '0774861895', 'noahziltener@yahoo.com', '2020-05-07', '2020-06-06', 1, 1),
(6, 'Noah', 'Ziltener', '0774861895', 'noahziltener@yahoo.com', '2020-05-07', '2020-06-26', 1, 1),
(7, '&lt;script&gt;alert(&quot;bitch&quot;)&lt;/script&', '&lt;script&gt;alert(&quot;bitch&quot;)&lt;/script&', '0785465465', 'slkdfjlk@ksjdf.ch', '2020-05-07', '2020-06-06', 1, 1),
(8, 'Nick', 'Ziltener', '0774861895', 'noahziltener@yahoo.com', '2020-05-07', '2020-06-26', 1, 1),
(9, 'Noah', 'Durrer', '0799268882', 'nick7@hotmail.ch', '2020-05-07', '2020-05-06', 1, 85),
(10, 'Noah', 'Ziltener', '0774861895', 'noahziltener@yahoo.com', '2020-05-07', '2020-06-16', 1, 1),
(11, 'Nick', 'Ziltener', '0774861895', 'noahziltener@yahoo.com', '2020-05-07', '2020-06-06', 0, 1),
(12, 'Noah', 'Durrer', '0799268882', 'nick7@hotmail.ch', '2020-05-07', '2020-07-16', 0, 79),
(13, 'Cedric', 'Gasser', '0768155655', 'cedigasser@gmail.com', '2020-05-07', '2020-06-26', 0, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `memberships`
--

DROP TABLE IF EXISTS `memberships`;
CREATE TABLE `memberships` (
  `membershipid` int(11) NOT NULL,
  `membership` varchar(50) NOT NULL,
  `loanperiod` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `memberships`
--

INSERT INTO `memberships` (`membershipid`, `membership`, `loanperiod`) VALUES
(1, 'no', 30),
(2, 'Bronze', 40),
(3, 'Silber', 50),
(4, 'Gold', 70);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `movieid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `movies`
--

INSERT INTO `movies` (`movieid`, `title`) VALUES
(1, 'Die Reise zum Mond'),
(2, 'Der große Eisenbahnraub'),
(3, 'Geburt einer Nation'),
(4, 'Die Vampire'),
(5, 'Intoleranz'),
(6, 'Gebrochene Blüten'),
(7, 'Das Cabinet des Dr. Caligari'),
(8, 'Weit im Osten'),
(9, 'Within Our Gates'),
(10, 'Der Fuhrmann des Todes'),
(11, 'Zwei Waisen im Sturm'),
(12, 'Dr. Mabuse, der Spieler - Ein Bild der Zeit'),
(13, 'Nosferatu, eine Symphonie des Grauens'),
(14, 'Nanuk, der Eskimo'),
(15, 'Das Lächeln der Madame Beudet'),
(16, 'Die Hexe'),
(17, 'Närrische Weiber'),
(18, 'Die verflixte Gastfreundschaft'),
(19, 'Das Rad'),
(20, 'Der Dieb von Bagdad'),
(21, 'Streik'),
(22, 'Gier'),
(23, 'Sherlock Jr.'),
(24, 'The Great White Silence'),
(25, 'Der letzte Mann'),
(26, 'Buster Keaton, der Mann mit den 1000 Bräuten'),
(27, 'Der Adler'),
(28, 'Das Phantom der Oper'),
(29, 'Panzerkreuzer Potemkin'),
(30, 'Goldrausch'),
(31, 'Die große Parade'),
(32, 'Die Abenteuer des Prinzen Achmed'),
(33, 'Metropolis'),
(34, 'Sonnenaufgang - Lied von zwei Menschen'),
(35, 'Der General'),
(36, 'Der Unbekannte'),
(37, 'Oktober'),
(38, 'Der Jazzsänger'),
(39, 'Napoleon'),
(40, 'Der kleine Bruder'),
(41, 'Ein Mensch der Masse'),
(42, 'Die Docks von New York'),
(43, 'Ein andalusischer Hund'),
(44, 'Die Passion der Jungfrau von Orléans'),
(45, 'Steamboat Bill, Jr. - Wasser hat keine Balken'),
(46, 'Sturm über Asien'),
(47, 'Erpressung'),
(48, 'A Throw of Dice - Schicksalswürfel'),
(49, 'Der Mann mit der Kamera'),
(50, 'Die Büchse der Pandora'),
(51, 'Der blaue Engel'),
(52, 'Das goldene Zeitalter'),
(53, 'Erde'),
(54, 'Der kleine Cäsar'),
(55, 'Im Westen nichts Neues'),
(56, 'Es lebe die Freiheit'),
(57, 'Die Million'),
(58, 'Tabu'),
(59, 'Dracula'),
(60, 'Frankenstein'),
(61, 'Lichter der Großstadt'),
(62, 'Limit'),
(63, 'Der öffentliche Feind'),
(64, 'M - Eine Stadt sucht einen Mörder'),
(65, 'Die Hündin'),
(66, 'Vampyr - Der Traum des Allan Grey'),
(67, 'Schönste, liebe mich'),
(68, 'Boudu - aus den Wassern gerettet'),
(69, 'Ich bin ein entflohener Kettensträfling'),
(70, 'Ärger im Paradies'),
(71, 'Narbengesicht'),
(72, 'Shanghai Express'),
(73, 'Freaks - Mißgestaltete'),
(74, 'Me and My Gal'),
(75, 'Betragen ungenügend'),
(76, 'Die 42. Straße'),
(77, 'Parade im Rampenlicht'),
(78, 'Goldgräber von 1933'),
(79, 'Sie tat ihm unrecht'),
(80, 'Die Marx Brothers im Krieg'),
(81, 'Königin Christine'),
(82, 'Erde ohne Brot'),
(83, 'King Kong und die weiße Frau'),
(84, 'Das Verhängnis des General Yen'),
(85, 'Die Wüstensöhne'),
(86, 'Das ist geschenkt'),
(87, 'Triumph des Willens'),
(88, 'Atalante'),
(89, 'Die schwarze Katze'),
(90, 'Judge Priest'),
(91, 'Es geschah in einer Nacht'),
(92, 'Die Göttliche'),
(93, 'Der dünne Mann'),
(94, 'Peter Ibbetson'),
(95, 'Unter Piratenflagge'),
(96, 'Meuterei auf der Bounty'),
(97, 'Die Marx Brothers in der Oper'),
(98, 'Die 39 Stufen'),
(99, 'Frankensteins Braut'),
(100, 'Ich tanz mich in dein Herz hinein');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`loanid`),
  ADD KEY `fk_movie` (`fk_movie`);

--
-- Indizes für die Tabelle `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`membershipid`);

--
-- Indizes für die Tabelle `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `loans`
--
ALTER TABLE `loans`
  MODIFY `loanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `memberships`
--
ALTER TABLE `memberships`
  MODIFY `membershipid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `movies`
--
ALTER TABLE `movies`
  MODIFY `movieid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
