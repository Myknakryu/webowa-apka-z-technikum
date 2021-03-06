-- phpMyAdmin SQL Dump
-- version 4.9.1deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 06 Gru 2019, 11:53
-- Wersja serwera: 8.0.18-0ubuntu0.19.10.1
-- Wersja PHP: 7.3.11-0ubuntu0.19.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `inwentarz`
--

CREATE TABLE `inwentarz` (
  `idprzedmioty` int(11) NOT NULL,
  `kategoria_idkategoria` int(11) NOT NULL,
  `producent` varchar(45) NOT NULL,
  `nazwa` varchar(45) NOT NULL,
  `gwarancja` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `inwentarz`
--

INSERT INTO `inwentarz` (`idprzedmioty`, `kategoria_idkategoria`, `producent`, `nazwa`, `gwarancja`) VALUES
(1, 1, 'ikea', 'sven', 1),
(2, 13, 'Ikea', 'Jorgen', 1),
(4, 9, 'Dell', 'Vostro 666', 1),
(5, 10, 'LG', 'ViewMaster 420', 0),
(6, 16, 'ViewSonic', 'HD126', 1),
(7, 11, 'Lenobo', 'ThiccPad S420', 0),
(8, 16, 'ViewSonic', 'GoWin 21D', 1),
(16, 11, 'Asus', 'Zenbook', 0),
(17, 1, 'BRW', 'Pitta', 0),
(18, 21, 'Corsair', 'K55', 1),
(19, 11, 'K24', 'MSI', 1),
(20, 11, 'GIGABYTE', 'Aero 3', 1),
(21, 11, 'Acer', 'Swift 5', 0),
(22, 11, 'HP', 'G6 250 III', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `idkategoria` int(11) NOT NULL,
  `nazwa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`idkategoria`, `nazwa`) VALUES
(1, 'krzeslo'),
(9, 'komputer'),
(10, 'monitor'),
(11, 'laptop'),
(13, 'biurko'),
(16, 'projektor'),
(17, 'gablota'),
(21, 'klawiatura');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `operacje`
--

CREATE TABLE `operacje` (
  `id` int(11) NOT NULL,
  `pomieszczenie` int(11) NOT NULL,
  `operacja` enum('Dodanie','Zmiana','Usuniecie') CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `iloscPrzed` int(11) DEFAULT NULL,
  `iloscPo` int(11) DEFAULT NULL,
  `przedmiot` int(11) NOT NULL,
  `uzytkownik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `operacje`
--

INSERT INTO `operacje` (`id`, `pomieszczenie`, `operacja`, `iloscPrzed`, `iloscPo`, `przedmiot`, `uzytkownik`) VALUES
(1, 1, 'Dodanie', NULL, 32, 6, 1),
(2, 1, 'Usuniecie', NULL, NULL, 8, 1),
(3, 1, 'Dodanie', NULL, 32, 6, 1),
(4, 1, 'Usuniecie', NULL, NULL, 6, 1),
(5, 2, 'Dodanie', NULL, 32, 7, 1),
(6, 3, 'Dodanie', NULL, 32, 6, 4),
(7, 3, 'Usuniecie', NULL, NULL, 5, 4),
(8, 3, 'Usuniecie', NULL, NULL, 2, 4),
(9, 3, 'Usuniecie', NULL, NULL, 7, 4),
(10, 3, 'Dodanie', NULL, 32, 8, 4),
(11, 3, 'Usuniecie', NULL, NULL, 6, 4),
(12, 3, 'Usuniecie', NULL, NULL, 4, 4),
(13, 3, 'Usuniecie', NULL, NULL, 1, 4),
(14, 3, 'Dodanie', NULL, 33, 5, 4),
(15, 1, 'Usuniecie', NULL, NULL, 1, 4),
(16, 2, 'Usuniecie', NULL, NULL, 6, 4),
(17, 3, 'Usuniecie', NULL, NULL, 5, 4),
(18, 1, 'Dodanie', NULL, 32, 2, 1),
(19, 1, 'Dodanie', NULL, 32, 5, 1),
(20, 1, 'Dodanie', NULL, 523, 7, 1),
(21, 1, 'Usuniecie', NULL, NULL, 5, 1),
(22, 14, 'Dodanie', NULL, 32, 6, 1),
(23, 5, 'Dodanie', NULL, 32, 5, 1),
(24, 1, 'Dodanie', NULL, 32, 5, 1),
(25, 3, 'Dodanie', NULL, 32, 4, 1),
(26, 13, 'Dodanie', NULL, 53, 6, 1),
(27, 15, 'Dodanie', NULL, 24, 18, 1),
(28, 15, 'Dodanie', NULL, 24, 4, 1),
(29, 15, 'Dodanie', NULL, 24, 5, 1),
(30, 3, 'Dodanie', NULL, 32, 7, 1),
(31, 3, 'Usuniecie', NULL, NULL, 7, 1),
(32, 4, 'Dodanie', NULL, 2, 1, 4),
(33, 4, 'Usuniecie', NULL, NULL, 1, 4),
(34, 1, 'Zmiana', 7, 12, 2, 1),
(35, 11, 'Dodanie', NULL, 67, 4, 1),
(36, 11, 'Dodanie', NULL, 26, 7, 1),
(37, 11, 'Dodanie', NULL, 2, 16, 1),
(38, 16, 'Dodanie', NULL, 29, 22, 1),
(39, 17, 'Dodanie', NULL, 36, 18, 1),
(40, 11, 'Zmiana', 2, 1, 16, 1),
(41, 11, 'Zmiana', 67, 67, 4, 8),
(42, 11, 'Zmiana', 26, 26, 7, 8),
(43, 11, 'Zmiana', 1, 2, 16, 8),
(44, 1, 'Dodanie', NULL, 15, 18, 1),
(45, 17, 'Zmiana', 36, 24, 18, 1),
(46, 1, 'Usuniecie', NULL, NULL, 5, 1),
(47, 1, 'Dodanie', NULL, 666, 8, 1),
(48, 17, 'Dodanie', NULL, 64, 1, 1),
(49, 17, 'Dodanie', NULL, 34, 2, 1),
(50, 1, 'Usuniecie', NULL, NULL, 8, 1),
(51, 1, 'Zmiana', 15, 20, 18, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pomieszczenia`
--

CREATE TABLE `pomieszczenia` (
  `id` int(11) NOT NULL,
  `userzy_iduserzy` int(11) NOT NULL,
  `nazwa_sali` varchar(45) DEFAULT NULL,
  `nr_sali` varchar(4) DEFAULT NULL,
  `klima` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `pomieszczenia`
--

INSERT INTO `pomieszczenia` (`id`, `userzy_iduserzy`, `nazwa_sali`, `nr_sali`, `klima`) VALUES
(1, 5, 'kuchnia', 'B32', 1),
(11, 8, 'Informatyczna', 'B22', 1),
(16, 1, 'j.polskiego', 'A45', 0),
(17, 1, 'matematyki', 'c09', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pomieszczenia_has_inwentarz`
--

CREATE TABLE `pomieszczenia_has_inwentarz` (
  `id` int(11) NOT NULL,
  `pomieszczenia_id` int(11) NOT NULL,
  `inwentarz_idprzedmioty` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `utworzenie` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edycja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `pomieszczenia_has_inwentarz`
--

INSERT INTO `pomieszczenia_has_inwentarz` (`id`, `pomieszczenia_id`, `inwentarz_idprzedmioty`, `ilosc`, `utworzenie`) VALUES
(54, 1, 2, 12, '2019-12-05 21:41:40'),
(56, 1, 7, 320, '2019-12-05 21:41:47'),
(67, 11, 4, 67, '2019-12-06 10:35:45'),
(68, 11, 7, 26, '2019-12-06 10:35:52'),
(69, 11, 16, 2, '2019-12-06 10:36:01'),
(70, 16, 22, 29, '2019-12-06 10:36:12'),
(71, 17, 18, 24, '2019-12-06 10:36:22'),
(72, 1, 18, 20, '2019-12-06 10:40:31'),
(74, 17, 1, 64, '2019-12-06 10:51:31'),
(75, 17, 2, 34, '2019-12-06 10:51:41');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uprawnienia`
--

CREATE TABLE `uprawnienia` (
  `id` int(11) NOT NULL,
  `poziom_uprawnien` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `uprawnienia`
--

INSERT INTO `uprawnienia` (`id`, `poziom_uprawnien`) VALUES
(1, 'admin'),
(2, 'klient'),
(3, 'gosc');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `userzy`
--

CREATE TABLE `userzy` (
  `iduserzy` int(11) NOT NULL,
  `uprawnienia_id` int(11) DEFAULT NULL,
  `login` varchar(45) NOT NULL,
  `haslo` varchar(45) NOT NULL,
  `data_utworzenia` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_edycji` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `userzy`
--

INSERT INTO `userzy` (`iduserzy`, `uprawnienia_id`, `login`, `haslo`, `data_utworzenia`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2019-11-08 12:21:37'),
(2, 3, 'gosc', '35f314889e68e8719370937d0937e77b', '2019-12-04 21:59:42'),
(4, 2, 'test', '098f6bcd4621d373cade4e832627b4f6', '2019-12-05 19:39:21'),
(5, 2, 'jak', 'ddea8f3e14f60a9d025fc4f71a37997c', '2019-12-05 21:11:45'),
(6, 2, 'otto', 'e5645dd85deb100fd1d71d0e8d671091', '2019-12-05 23:58:10'),
(8, 2, 'klient', 'de3f7eb864993cb4b3a3187f3847810b', '2019-12-06 08:39:13'),
(9, NULL, 'testowy', 'f86bdb19deb2c5ab632734b8d884ce06', '2019-12-06 11:53:20');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `inwentarz`
--
ALTER TABLE `inwentarz`
  ADD PRIMARY KEY (`idprzedmioty`),
  ADD KEY `fk_inwentarz_kategoria1_idx` (`kategoria_idkategoria`);

--
-- Indeksy dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`idkategoria`);

--
-- Indeksy dla tabeli `operacje`
--
ALTER TABLE `operacje`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pomieszczenia`
--
ALTER TABLE `pomieszczenia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pomieszczenia_userzy1_idx` (`userzy_iduserzy`);

--
-- Indeksy dla tabeli `pomieszczenia_has_inwentarz`
--
ALTER TABLE `pomieszczenia_has_inwentarz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pomieszczenia_has_inwentarz_inwentarz1_idx` (`inwentarz_idprzedmioty`),
  ADD KEY `fk_pomieszczenia_has_inwentarz_pomieszczenia_idx` (`pomieszczenia_id`);

--
-- Indeksy dla tabeli `uprawnienia`
--
ALTER TABLE `uprawnienia`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `userzy`
--
ALTER TABLE `userzy`
  ADD PRIMARY KEY (`iduserzy`),
  ADD KEY `fk_userzy_uprawnienia1_idx` (`uprawnienia_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `inwentarz`
--
ALTER TABLE `inwentarz`
  MODIFY `idprzedmioty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `idkategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `operacje`
--
ALTER TABLE `operacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT dla tabeli `pomieszczenia`
--
ALTER TABLE `pomieszczenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `pomieszczenia_has_inwentarz`
--
ALTER TABLE `pomieszczenia_has_inwentarz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT dla tabeli `uprawnienia`
--
ALTER TABLE `uprawnienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `userzy`
--
ALTER TABLE `userzy`
  MODIFY `iduserzy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `inwentarz`
--
ALTER TABLE `inwentarz`
  ADD CONSTRAINT `fk_inwentarz_kategoria1` FOREIGN KEY (`kategoria_idkategoria`) REFERENCES `kategoria` (`idkategoria`);

--
-- Ograniczenia dla tabeli `pomieszczenia`
--
ALTER TABLE `pomieszczenia`
  ADD CONSTRAINT `fk_pomieszczenia_userzy1` FOREIGN KEY (`userzy_iduserzy`) REFERENCES `userzy` (`iduserzy`);

--
-- Ograniczenia dla tabeli `pomieszczenia_has_inwentarz`
--
ALTER TABLE `pomieszczenia_has_inwentarz`
  ADD CONSTRAINT `fk_pomieszczenia_has_inwentarz_inwentarz1` FOREIGN KEY (`inwentarz_idprzedmioty`) REFERENCES `inwentarz` (`idprzedmioty`),
  ADD CONSTRAINT `fk_pomieszczenia_has_inwentarz_pomieszczenia` FOREIGN KEY (`pomieszczenia_id`) REFERENCES `pomieszczenia` (`id`);

--
-- Ograniczenia dla tabeli `userzy`
--
ALTER TABLE `userzy`
  ADD CONSTRAINT `fk_userzy_uprawnienia1` FOREIGN KEY (`uprawnienia_id`) REFERENCES `uprawnienia` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
