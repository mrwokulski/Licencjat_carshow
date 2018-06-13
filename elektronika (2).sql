-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Cze 2018, 01:24
-- Wersja serwera: 10.1.32-MariaDB
-- Wersja PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `elektronika`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `icon_path` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `icon_path`) VALUES
(1, 'Telefony', 'Wielofunkcyjne urządzenia mobilne.', 'public/images/categories/phones.jpg'),
(2, 'Tablety', 'Tablety multimedialne', 'public/images/categories/tablets.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `favourite`
--

CREATE TABLE `favourite` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_offer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL,
  `message` varchar(500) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `id_offer` int(11) DEFAULT NULL,
  `unread` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `message`
--

INSERT INTO `message` (`id`, `id_user1`, `id_user2`, `message`, `date`, `id_offer`, `unread`) VALUES
(1, 1, 2, 'Jestem zainteresowany tym telefonem, czy w piątek mogę obejrzeć?', '2018-05-14 19:58:52', 2, 0),
(2, 2, 1, 'Owszem, zapraszam do obejrzenia', '2018-05-14 19:59:15', NULL, 0),
(3, 2, 1, 'W piątek po 15', '2018-05-14 20:01:12', NULL, 0),
(6, 1, 2, 'ok, w takim razie piątek ok 16:30 będę', '2018-05-14 20:28:08', NULL, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `maker` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `model` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `state` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `price` int(11) NOT NULL,
  `type2` int(11) NOT NULL,
  `title` varchar(80) COLLATE utf8_polish_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_polish_ci NOT NULL,
  `date_added` date NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `actual` int(11) NOT NULL DEFAULT '1',
  `city` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `offer`
--

INSERT INTO `offer` (`id`, `category`, `maker`, `model`, `state`, `price`, `type2`, `title`, `description`, `date_added`, `user`, `name`, `premium`, `type`, `actual`, `city`) VALUES
(1, 1, 'Nokia', '6233', '3', 25, 0, 'Sprzedam Nokie 6233 - lekko obtarta', 'Witam, mam do sprzedania lekko otarta nokie 6233.\r\nSprzet idealnie nadaje sie do pracy na budowie. Nie ma lepszego młotka na rynku poza legendarna nokią 3320.', '2018-06-13', 1, '', 0, 1, 1, 'Gdańsk'),
(2, 1, 'Samsung', 'X340', '2', 100, 0, 'SAMSUNG X340 Z KLAPKA ', 'Dzisiaj do zaoferowania mam najbardziej pożądany telefon początków XX wieku!', '2018-06-13', 1, '', 0, 1, 1, 'Warszawa'),
(3, 1, 'Nokia', '6010', '1', 500, 0, 'Nowa Nokia 6010 w leasing od ręki', 'Wiecej informacji podam prywatnie', '2018-06-13', 1, '', 0, 1, 1, 'Gdansk'),
(4, 2, 'Apple', 'XX', '1', 1000, 0, 'Kupię NOWY Tablet Apple XX', 'Interesuje mnie zakup wyżej wspomnianego Apple XX. Stan musi być nowy ewentualnie jakieś niewielkie ryski.', '2018-06-13', 1, '', 0, 2, 1, 'Gdansk'),
(5, 1, 'HTC', 'Piloten', '2', 20, 0, 'HTC PILOTEN 20 ZL OKAZJA', 'Stary HTC Piloten sluzyl dzielnie wiele lat. Nagle zastapil go mlodszy braciszek i musimy sie go pozbyc. Taka cena tylko u mnie !', '2018-06-13', 1, '', 0, 1, 1, 'Gdansk'),
(6, 1, 'Nokia', 'E71x', '2', 400, 0, 'Prawie jak nowa NOKIA E71X', 'Prawie jak nowa NOKIA E71X. Uzywana w celach biznesowych bo przeciez do jakich innych celow moze byc potrzebny komus telefon z klawiatura qwerty gdzie przyciski sa 1x1mm . Genialne rozwiazanie!', '2018-06-13', 1, '', 0, 1, 1, 'Warszawa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offer_has_picture`
--

CREATE TABLE `offer_has_picture` (
  `id_offer` int(11) NOT NULL,
  `id_picture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `offer_has_picture`
--

INSERT INTO `offer_has_picture` (`id_offer`, `id_picture`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 7),
(4, 8),
(5, 9),
(5, 10),
(6, 11),
(6, 12),
(7, 13),
(7, 14),
(8, 15),
(8, 16),
(9, 17),
(9, 18);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `description` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `link` varchar(200) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `picture`
--

INSERT INTO `picture` (`id`, `description`, `link`) VALUES
(1, '1', 'img1.jpg'),
(2, '1', 'img2.jpg'),
(3, '2', 'img1.jpg'),
(4, '2', 'img2.jpg'),
(5, '3', 'img1.jpg'),
(6, '3', 'img2.jpg'),
(7, '4', 'img1.jpg'),
(8, '4', 'img2.jpg'),
(9, '5', 'img1.jpg'),
(10, '5', 'img2.jpg'),
(11, '6', 'img1.jpg'),
(12, '6', 'img2.jpg'),
(13, '7', 'img1.jpg'),
(14, '7', 'img2.jpg'),
(15, '8', 'img1.jpg'),
(16, '8', 'img2.jpg'),
(17, '9', 'img1.jpg'),
(18, '9', 'img2.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `url` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `header` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `footer` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `settings`
--

INSERT INTO `settings` (`id`, `url`, `title`, `header`, `footer`) VALUES
(1, 'http://localhost/Licencjat/src/Elektronika/', 'Elektronika - Twoj portal z ogłoszeniami', 'Elektronika', 'Elektronika 2018');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `tel` int(10) NOT NULL,
  `banned` tinyint(1) NOT NULL,
  `date_register` date NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `name`, `surname`, `tel`, `banned`, `date_register`, `admin`) VALUES
(1, 'admin', '$2y$10$0R1sOkOMK/jrY2N1Klf48eIsYkK4pNRoQWKa9sZTnt/1wNRRrcG2q', 'blazej@wp.pl', 'Blazej', 'Bogdanowicz', 5506622, 0, '2018-04-13', 1),
(2, 'PHPmaster', '$2y$10$ItX7fWudRAFf1dKudIhs2eHro1.QifTnjZmorTof1.m2I5pB5cT1O', 'domino@phpRocks.com', 'Dominik', 'Rynnicki', 665874412, 0, '2018-05-14', 0),
(3, 'bombel', '$2y$10$tezowLtAxuZsCFHavZFTtOHf0LeNTNk.baR4/XX686IM/.yMP4QI2', 'bombel@bombino.com', 'Kacper', 'Nowakowski', 669874521, 0, '2018-05-14', 0),
(4, 'Kowale', '$2y$10$U/tROSno/j0n.bYU9u6zbuEOGAFDhLKpmTeLdtk8x6BEmG9TQlFyK', 'JanKowal@wp.pl', 'Jan', 'Kowalski', 550441125, 0, '2018-05-17', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_offer` (`id_offer`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeksy dla tabeli `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_offer` (`id_offer`),
  ADD KEY `id_user1` (`id_user1`),
  ADD KEY `id_user2` (`id_user2`);

--
-- Indeksy dla tabeli `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `category` (`category`);

--
-- Indeksy dla tabeli `offer_has_picture`
--
ALTER TABLE `offer_has_picture`
  ADD KEY `id_offer` (`id_offer`),
  ADD KEY `id_picture` (`id_picture`);

--
-- Indeksy dla tabeli `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_ibfk_1` FOREIGN KEY (`id_offer`) REFERENCES `offer` (`id`),
  ADD CONSTRAINT `favourite_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_offer`) REFERENCES `offer` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_user1`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`id_user2`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

--
-- Ograniczenia dla tabeli `offer_has_picture`
--
ALTER TABLE `offer_has_picture`
  ADD CONSTRAINT `offer_has_picture_ibfk_1` FOREIGN KEY (`id_offer`) REFERENCES `offer` (`id`),
  ADD CONSTRAINT `offer_has_picture_ibfk_2` FOREIGN KEY (`id_picture`) REFERENCES `picture` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
