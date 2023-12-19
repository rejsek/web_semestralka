-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 19. pro 2023, 20:50
-- Verze serveru: 10.4.24-MariaDB
-- Verze PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `web_semestralka`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `clanky`
--

CREATE TABLE `clanky` (
  `id_clanku` int(11) NOT NULL,
  `titulek` varchar(255) COLLATE utf8mb4_czech_ci DEFAULT NULL,
  `obrazek` varchar(255) COLLATE utf8mb4_czech_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_czech_ci DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL,
  `hodnoceni` int(11) DEFAULT NULL,
  `recenzent` varchar(255) COLLATE utf8mb4_czech_ci DEFAULT NULL,
  `publikovat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nazev` varchar(255) COLLATE utf8mb4_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `role`
--

INSERT INTO `role` (`id_role`, `nazev`) VALUES
(1, 'autor'),
(2, 'recenzent'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele`
--

CREATE TABLE `uzivatele` (
  `id_uzivatele` int(11) NOT NULL,
  `uz_jmeno` varchar(255) COLLATE utf8mb4_czech_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_czech_ci DEFAULT NULL,
  `heslo` varchar(255) COLLATE utf8mb4_czech_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `uzivatele`
--

INSERT INTO `uzivatele` (`id_uzivatele`, `uz_jmeno`, `email`, `heslo`, `role`) VALUES
(3, 'admin', 'admin@seznam.cz', '$2y$10$VGv3dbqmbbSvq/1EvP/KF.ZX.6PK6w.Kv7y7taVOzJj6nvHqcmye6', 3),
(4, 'recenzent', 'recenzent@seznam.cz', '$2y$10$cDTfQIEq8h8HdmQ1CJtJMedJFIF1P2TM7D0c24T7uw9YdqR0ijkHi', 2),
(5, 'autor', 'autor@seznam.cz', '$2y$10$wUEBIkcpVhB0X9NzOTuABOsDoTXdzmnSkVdSxhkZXjwslEzXK8rYi', 1);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `clanky`
--
ALTER TABLE `clanky`
  ADD PRIMARY KEY (`id_clanku`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indexy pro tabulku `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexy pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD PRIMARY KEY (`id_uzivatele`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `clanky`
--
ALTER TABLE `clanky`
  MODIFY `id_clanku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pro tabulku `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  MODIFY `id_uzivatele` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `clanky`
--
ALTER TABLE `clanky`
  ADD CONSTRAINT `clanky_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `uzivatele` (`id_uzivatele`);

--
-- Omezení pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD CONSTRAINT `uzivatele_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
