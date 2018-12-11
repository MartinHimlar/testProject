-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 11. pro 2018, 08:37
-- Verze serveru: 10.1.36-MariaDB
-- Verze PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Databáze: `guestbook`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `articles`
--

CREATE TABLE `articles` (
  `id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `text` text COLLATE utf8mb4_czech_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title`, `text`, `created`) VALUES
(1, 1, 'SDFA DF', ' AS FS FSa sdfa sd', '0000-00-00 00:00:00'),
(2, 1, 'hujj  jgh f', 'hf dg hr th', '0000-00-00 00:00:00'),
(3, 1, 'vfd d df f d ', 'dfsa dfvfv ', '0000-00-00 00:00:00'),
(4, 1, 'dfsgn dfkgn sdů', ' důlfkg jsdklfůg \r\n', '0000-00-00 00:00:00'),
(5, 1, 'fas fasd faůlnk', ' asůdflnsda ', '0000-00-00 00:00:00'),
(6, 1, 'dsůlakfdms kaůlf', ' asdůlkfjasdkl ůf', '0000-00-00 00:00:00'),
(7, 1, 'fsdalůkfndsůakl fn', ' saůldkfnasdklů f', '0000-00-00 00:00:00'),
(8, 1, 'asůlkdfnasdůklf n', 'sddlůkfansdůklf ', '0000-00-00 00:00:00'),
(9, 1, 'dslakůfn dsklaů fn', 'asůldkfnsdaůkl fsd', '0000-00-00 00:00:00'),
(10, 1, 'asljkfnsdůlajkfn sda', 'sdaůlfk ndasůklfn s', '0000-00-00 00:00:00'),
(11, 1, 'aaaaaaaaa ', 'aaaaaaaaaa', '0000-00-00 00:00:00'),
(12, 1, 'vvvvvvvvvvvv', 'vvvvvvvvvvvvv', '0000-00-00 00:00:00'),
(13, 1, 'asdfas dfsda df', 'dsaf dsa fdsa ', '0000-00-00 00:00:00'),
(14, 1, 'trfegter', 'dfvgsdf ds', '0000-00-00 00:00:00'),
(15, 1, 'sdafg dfg a', 'asd  fasd fvsa', '0000-00-00 00:00:00'),
(16, 1, 'asdg as', 'sadf sadfa', '0000-00-00 00:00:00'),
(17, 1, 'asdg as', 'sadf sadfa', '0000-00-00 00:00:00'),
(18, 1, 'asdfg asd ', ' asdf asd f', '0000-00-00 00:00:00'),
(19, 1, 'asdfghjklkjhfdsa', 'dfghjklkjhgfd', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `last_logged` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `last_logged`) VALUES
(1, 'admin', '3da541559918a808c2402bba5012f6c60b27661c', '0000-00-00 00:00:00');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;
COMMIT;
