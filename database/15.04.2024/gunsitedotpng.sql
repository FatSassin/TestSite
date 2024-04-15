-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Kwi 2024, 11:40
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `gunsitedotpng`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bron`
--

CREATE TABLE `bron` (
  `gun_id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `caliber` int(11) DEFAULT NULL,
  `producent_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `bron`
--

INSERT INTO `bron` (`gun_id`, `name`, `caliber`, `producent_id`, `type_id`) VALUES
(1, 'S&W 29', 2, 3, 2),
(2, 'Remington 700', 3, 10, 5),
(3, 'AK-47', 4, 12, 6),
(4, 'M16', 1, 11, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `caliber`
--

CREATE TABLE `caliber` (
  `cal_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `caliber`
--

INSERT INTO `caliber` (`cal_id`, `name`) VALUES
(1, '5.56 × 45 mm'),
(2, '.44 Remington Magnum'),
(3, '.308 Winchester'),
(4, '7.62 x 39 mm');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `countries`
--

INSERT INTO `countries` (`country_id`, `name`) VALUES
(1, 'Poland'),
(2, 'Germany'),
(3, 'United States of America'),
(4, 'Switzerland'),
(5, 'Austria'),
(6, 'Czech Republic'),
(7, 'Russia'),
(8, 'Soviet Union'),
(9, 'France'),
(10, 'South Korea'),
(13, 'People\'s Republic of China'),
(15, 'Albania'),
(16, 'Israel'),
(17, 'Brasil');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producenci`
--

CREATE TABLE `producenci` (
  `producent_id` int(11) NOT NULL,
  `producentName` varchar(50) DEFAULT NULL,
  `country` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `producenci`
--

INSERT INTO `producenci` (`producent_id`, `producentName`, `country`) VALUES
(1, 'Fabryka Broni Łucznik Radom', 1),
(2, 'Heckler & Koch', 2),
(3, 'Smith & Wesson', 3),
(4, 'SIG Sauer', 4),
(5, 'STEYR ARMS GmbH', 5),
(6, ' Česká zbrojovka', 6),
(7, 'Tula Arms Plant', 7),
(8, 'Soviet Union', 8),
(9, 'PGM Précision', 9),
(10, 'Remington Arms', 3),
(11, 'Colt’s Manufacturing Company', 3),
(12, 'Kalashnikov Concern', 7),
(13, 'Glock GmbH', 5),
(14, 'Taurus Armas', 17);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `recenzje`
--

CREATE TABLE `recenzje` (
  `user_id` int(11) DEFAULT NULL,
  `gun_id` int(11) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `ocena` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `recenzje`
--

INSERT INTO `recenzje` (`user_id`, `gun_id`, `text`, `ocena`) VALUES
(1, 2, 'Fajme', 7),
(4, 4, 'COOL ', 8),
(3, 1, 'Mnim', 9);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `typbron`
--

CREATE TABLE `typbron` (
  `type_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `typbron`
--

INSERT INTO `typbron` (`type_id`, `name`) VALUES
(1, 'Semi-Automatic Handgun'),
(2, 'Double-Action Revolver'),
(3, 'Single-Action Handgun'),
(4, 'Single-Action Revolver'),
(5, 'Bolt-Action Rifle'),
(6, 'Automatic Carbine'),
(7, 'Semi-Automatic Rifle'),
(8, 'Blacakpowder Handgun'),
(9, 'Blacakpowder Revolver');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `user_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `country` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`user_id`, `name`, `password`, `country`) VALUES
(1, 'Hubert', '123', 1),
(2, 'Michal', '123', 6),
(3, 'Steve', '123', 3),
(4, 'Bobie', '123', 2),
(5, 'Emil', 'Kendzior', 1),
(6, 'Max', 'Nejnbinr', 16),
(7, 'Pudzian', 'Stefanowski', 15),
(8, 'Mickail', 'Debil', 7),
(9, 'Mikołaj', 'Baran', 9);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `bron`
--
ALTER TABLE `bron`
  ADD PRIMARY KEY (`gun_id`),
  ADD KEY `producent_id` (`producent_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `caliber` (`caliber`);

--
-- Indeksy dla tabeli `caliber`
--
ALTER TABLE `caliber`
  ADD PRIMARY KEY (`cal_id`);

--
-- Indeksy dla tabeli `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indeksy dla tabeli `producenci`
--
ALTER TABLE `producenci`
  ADD PRIMARY KEY (`producent_id`),
  ADD KEY `country` (`country`);

--
-- Indeksy dla tabeli `recenzje`
--
ALTER TABLE `recenzje`
  ADD KEY `gun_id` (`gun_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `typbron`
--
ALTER TABLE `typbron`
  ADD PRIMARY KEY (`type_id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `country` (`country`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `bron`
--
ALTER TABLE `bron`
  MODIFY `gun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `caliber`
--
ALTER TABLE `caliber`
  MODIFY `cal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `producenci`
--
ALTER TABLE `producenci`
  MODIFY `producent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `typbron`
--
ALTER TABLE `typbron`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `bron`
--
ALTER TABLE `bron`
  ADD CONSTRAINT `bron_ibfk_1` FOREIGN KEY (`producent_id`) REFERENCES `producenci` (`producent_id`),
  ADD CONSTRAINT `bron_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `typbron` (`type_id`),
  ADD CONSTRAINT `bron_ibfk_3` FOREIGN KEY (`caliber`) REFERENCES `caliber` (`cal_id`);

--
-- Ograniczenia dla tabeli `producenci`
--
ALTER TABLE `producenci`
  ADD CONSTRAINT `producenci_ibfk_1` FOREIGN KEY (`country`) REFERENCES `countries` (`country_id`);

--
-- Ograniczenia dla tabeli `recenzje`
--
ALTER TABLE `recenzje`
  ADD CONSTRAINT `recenzje_ibfk_1` FOREIGN KEY (`gun_id`) REFERENCES `bron` (`gun_id`),
  ADD CONSTRAINT `recenzje_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `uzytkownicy` (`user_id`);

--
-- Ograniczenia dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD CONSTRAINT `uzytkownicy_ibfk_1` FOREIGN KEY (`country`) REFERENCES `countries` (`country_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
