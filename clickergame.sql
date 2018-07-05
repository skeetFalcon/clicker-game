-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 06. čen 2018, 23:16
-- Verze serveru: 10.1.32-MariaDB
-- Verze PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `clickergame`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `filetype` varchar(16) COLLATE utf16_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_czech_ci;

--
-- Vypisuji data pro tabulku `profileimg`
--

INSERT INTO `profileimg` (`id`, `userid`, `status`, `filetype`) VALUES
(1, 5, 0, ''),
(2, 6, 0, '');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(24) COLLATE utf16_czech_ci NOT NULL,
  `lastname` varchar(24) COLLATE utf16_czech_ci NOT NULL,
  `username` varchar(32) COLLATE utf16_czech_ci NOT NULL,
  `password` varchar(128) COLLATE utf16_czech_ci NOT NULL,
  `upgradesBought` varchar(128) COLLATE utf16_czech_ci NOT NULL DEFAULT '0,0,0,0,0,0',
  `umoney` int(11) NOT NULL DEFAULT '0',
  `uscore` int(11) NOT NULL DEFAULT '0',
  `ulevel` int(11) NOT NULL DEFAULT '1',
  `activityDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `upgradesBought`, `umoney`, `uscore`, `ulevel`, `activityDate`) VALUES
(1, 'Radim', 'BohÃ¡Ä', 'admin', '$2y$10$jy2S4oYCyuTeadfs5BSSGuBxfk/xpb70aCCDvciu51A79VObuGAWS', '', 0, 10000000, 527, '2018-06-07'),
(2, 'E', 'E', 'E', '$2y$10$JgPXLbUXAJ/b1DkjL6SiHucDm/r9o5kg5lltAEfEhYxTn6VSoufYC', '0,0,0,0,0,0', 0, 25420, 1, '2018-06-05'),
(3, 'fdasf', 'afdsf', 'fadsf', '$2y$10$iRE3YyAOlNwz4kmtbM86tuUfX0NJl6CQ7VxMipIqPv3g5Hy/kpQVK', '0,0,0,0,0,0', 0, 1427, 1, '2018-06-03'),
(4, 'radim', 'radim', 'skeet', '$2y$10$AK1eUHoqamwF32aWTyi1..BnFpsyTJ0nmRRaOPUXhdSWYpwECOvle', '0,0,0,0,0,0', 0, 0, 1, '2018-05-01'),
(5, 'ras', 'rase', 'aaaa', 'aaaa', '0,0,0,0,0,0', 0, 1110, 1, '2018-06-18'),
(6, 'fadsf', 'asdf', 'a', 'a', '0,0,0,0,0,0', 0, 20, 1, '2018-08-06'),
(7, 'fadfsa', 'dasffdas', 'dfasfdas', '$2y$10$aHW6J6uKc6ZqahNhfPqWn.tMBPx1E8.1O9Ste8O.5G6o27vDlhBB.', '0,0,0,0,0,0', 0, 2452, 1, '0000-00-00'),
(8, 'afdsdsa', 'adsfsda', 'fff', '$2y$10$7wPrzBydPuinUjcbuQaXVu7vkzmmi80JKao7I5/F8tYTc2S4oSZt.', '0,0,0,0,0,0', 0, 0, 1, '0000-00-00');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
