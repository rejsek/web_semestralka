-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 08. říj 2023, 16:50
-- Verze serveru: 10.4.28-MariaDB
-- Verze PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `test`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `clanky`
--

CREATE TABLE `clanky` (
  `id_clanku` int(3) NOT NULL,
  `titulek` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `autor` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `hodnoceni` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Vypisuji data pro tabulku `clanky`
--

INSERT INTO `clanky` (`id_clanku`, `titulek`, `text`, `autor`, `hodnoceni`) VALUES
(1, 'Titulek 1', 'In dapibus augue non sapien. Pellentesque ipsum. Praesent id justo in neque elementum ultrices. Etiam egestas wisi a erat. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Nunc tincidunt ante vitae massa. Nunc auctor. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Integer pellentesque quam vel velit. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Integer imperdiet lectus quis justo.', 'Martin', 2),
(2, 'Titulek 2', 'In dapibus augue non sapien. Pellentesque ipsum. Praesent id justo in neque elementum ultrices. Etiam egestas wisi a erat. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Nunc tincidunt ante vitae massa. Nunc auctor. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Integer pellentesque quam vel velit. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Integer imperdiet lectus quis justo.', 'Pavel', 3),
(3, 'Titulek 3', 'In dapibus augue non sapien. Pellentesque ipsum. Praesent id justo in neque elementum ultrices. Etiam egestas wisi a erat. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Nunc tincidunt ante vitae massa. Nunc auctor. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Integer pellentesque quam vel velit. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Integer imperdiet lectus quis justo.', 'Karel', 1),
(4, 'Titulek 4', 'In dapibus augue non sapien. Pellentesque ipsum. Praesent id justo in neque elementum ultrices. Etiam egestas wisi a erat. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Nunc tincidunt ante vitae massa. Nunc auctor. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Integer pellentesque quam vel velit. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Integer imperdiet lectus quis justo.', 'Pepa', 4),
(5, 'Titulek 5', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Ut tempus purus at lorem. Nulla non lectus sed nisl molestie malesuada. Mauris dictum facilisis augue. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'Tonda', 5),
(6, 'Titulek 6', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Integer lacinia. Phasellus faucibus molestie nisl. Etiam posuere lacus quis dolor. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Aliquam erat volutpat. Aliquam erat volutpat. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Nullam at arcu a est sollicitudin euismod. Integer malesuada. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Nullam eget nisl. Maecenas libero.', 'Pepik', 3),
(7, 'Titulek 7', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Integer lacinia. Phasellus faucibus molestie nisl. Etiam posuere lacus quis dolor. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Aliquam erat volutpat. Aliquam erat volutpat. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Nullam at arcu a est sollicitudin euismod. Integer malesuada. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Nullam eget nisl. Maecenas libero.', 'Karel', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
