-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3307
-- Létrehozás ideje: 2023. Máj 04. 17:02
-- Kiszolgáló verziója: 10.4.6-MariaDB
-- PHP verzió: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `enigma`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalo_vetel`
--

CREATE TABLE `felhasznalo_vetel` (
  `id` int(20) NOT NULL,
  `termek_nev` varchar(100) NOT NULL,
  `termek_ar` int(100) NOT NULL,
  `termenk_menny` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `megrendelo`
--

CREATE TABLE `megrendelo` (
  `id` int(10) NOT NULL,
  `teljesnev` varchar(100) NOT NULL,
  `telefon` int(100) NOT NULL,
  `lakcim` varchar(100) NOT NULL,
  `fizetes_mod` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `id` int(20) NOT NULL,
  `cimsor` varchar(255) NOT NULL,
  `ar` decimal(10,2) NOT NULL,
  `kep` varchar(255) NOT NULL,
  `leiras` text NOT NULL,
  `featured` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`id`, `cimsor`, `ar`, `kep`, `leiras`, `featured`) VALUES
(1, 'Állványok ', '89999.00', '/Enigma-Projekt-Repo/Képek/butor3.jpg', 'Nappali állványok, hogy könnyebben kedve szerint rendezze értékeit.', 1),
(3, 'Hálószobai bútorok', '233999.00', '/Enigma-Projekt-Repo/Képek/butor4.png', 'Kényelmes kétszemélyes ágy. Kétajtós nagy szekrény. kettő éjjeli szekrény.', 1),
(4, 'Kanapé', '104500.00', '/Enigma-Projekt-Repo/Képek/butor6.png', 'Nagy szürke kanapé, ahol a család kényelmesen élvezheti az esti közös filmeket.', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'Róbert Fazekas', '$2y$10$a8GFrNBeXWBp/joT5/I3rO2YyGUFNotMU9xe6DwTTiWRjV1UVxFX.', 'Adminemail@gmail.com'),
(2, 'Sajt', '$2y$10$XmYd8jwOoWHcqDt2fHX3DeApVtzO33IXiaS4gmV5lbbWV66I9OEl6', 'Admin1@email.com');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalo_vetel`
--
ALTER TABLE `felhasznalo_vetel`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalo_vetel`
--
ALTER TABLE `felhasznalo_vetel`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
