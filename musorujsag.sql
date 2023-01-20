-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Nov 27. 19:18
-- Kiszolgáló verziója: 10.4.25-MariaDB
-- PHP verzió: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `musorujsag`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `csatorna`
--

CREATE TABLE `csatorna` (
  `csid` int(11) NOT NULL,
  `csnev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `tema` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `kep` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `csatorna`
--

INSERT INTO `csatorna` (`csid`, `csnev`, `tema`, `kep`) VALUES
(8, 'Duna TV', 'nemzeti főadó', '1200px-Dunatv_logo.png'),
(9, 'RTL', 'kereskedelmi televízióadó', 'image_8556008b4ec04a0bd0fa58277785.jfif'),
(24, 'TV2', 'kereskedelmi televízióadó', 'tv2hu.jpg'),
(28, 'FILM+', 'filmcsatorna', 'letöltés.png'),
(30, 'HBO', 'filmek/sorozatok', 'HBO_logo.svg.png');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `idopont`
--

CREATE TABLE `idopont` (
  `mid` int(11) NOT NULL,
  `csid` int(11) NOT NULL,
  `kezdesido` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `idopont`
--

INSERT INTO `idopont` (`mid`, `csid`, `kezdesido`) VALUES
(14, 8, '2022-11-09 14:00:00'),
(1, 8, '2022-11-09 16:00:00'),
(5, 8, '2022-11-09 18:20:00'),
(3, 9, '2022-11-15 04:00:00'),
(10, 9, '2022-11-15 07:10:00'),
(4, 8, '2022-11-15 09:10:00'),
(1, 9, '2022-11-15 09:10:00'),
(2, 9, '2022-11-15 11:30:00'),
(15, 24, '2022-08-01 08:00:00'),
(1, 24, '2022-08-01 11:00:00'),
(13, 24, '2022-08-01 13:20:00'),
(11, 28, '2022-08-06 10:00:00'),
(1, 8, '2022-11-15 11:40:00'),
(321, 8, '2022-11-15 14:10:00'),
(316, 28, '2022-10-10 10:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `musor`
--

CREATE TABLE `musor` (
  `mid` int(11) NOT NULL,
  `cim` varchar(150) COLLATE utf8_hungarian_ci NOT NULL,
  `idotartam` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `nyelv` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `keletkezes` year(4) NOT NULL,
  `korhataros` smallint(100) NOT NULL,
  `rendezo_szigszam` varchar(20) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `musor`
--

INSERT INTO `musor` (`mid`, `cim`, `idotartam`, `nyelv`, `keletkezes`, `korhataros`, `rendezo_szigszam`) VALUES
(1, 'A remény rabjai', '137', 'angol', 1994, 16, '12345IE'),
(2, 'Forrest Gump', '141', 'angol', 1994, 12, '87263HE'),
(3, 'Stephen King: Halálsoron', '188', 'angol', 1999, 18, '9287475FT'),
(4, 'Szerelmünk lapjai', '123', 'magyar', 2004, 12, '835976DF'),
(5, 'Életrevalók', '107', 'francia', 2011, 12, '12345IE'),
(6, 'Terminátor 2. - Az ítélet napja', '137', 'angol', 1991, 12, '89734KG'),
(7, 'A keresztapa', '175', 'angol', 1972, 12, '892347OP'),
(8, 'Vissza a jövőbe', '111', 'magyar', 1985, 12, '648237GZ'),
(9, 'Elrabolva', '93', 'angol', 2008, 16, '52341FG'),
(10, 'Gran Torino', '116', 'angol', 2008, 16, '87263HE'),
(11, 'Kapj el, ha tudsz!', '135', 'magyar/angol', 2002, 12, '9287475FT'),
(12, 'Hetedik', '122', 'angol', 1995, 18, '892347OP'),
(13, 'A tanú', '103', 'magyar', 1969, 12, '76234JF'),
(14, '...és megint dühbe jövünk', '109', 'olasz', 1978, 12, '76234JF'),
(15, 'A rettenthetetlen', '178', 'angol', 1995, 16, '87263HE'),
(16, 'Amerikai história X', '117', 'angol', 1998, 18, '52341FG'),
(313, 'Holt költők társasága', '124', 'angol', 1989, 12, '89734KG'),
(314, 'Blöff', '104', 'angol', 2000, 0, '76234JF'),
(315, 'Terminátor - A halálosztó', '108', 'angol', 1984, 16, '87263HE'),
(316, 'A Gyűrűk Ura - A király visszatér', '201', 'angol/német', 2003, 12, '3249432JF'),
(317, 'A tégla', '138', 'angol', 2006, 18, '3249432JF'),
(318, 'Ponyvaregény', '150', 'magyar', 1994, 18, '2983457FFD'),
(319, 'Szemtől szemben', '173', 'angol/magyar', 1995, 18, '648237GZ'),
(320, 'Lesz ez még így se!', '133', 'angol', 1997, 18, '847329HF'),
(321, 'Száll a kakukk fészkére', '130', 'angol', 1975, 16, '9287475FT'),
(322, 'Kelly hősei', '144', 'angol', 1970, 12, '12345IE');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendezo`
--

CREATE TABLE `rendezo` (
  `szigszam` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `rendezonev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `szuldatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `rendezo`
--

INSERT INTO `rendezo` (`szigszam`, `rendezonev`, `szuldatum`) VALUES
('12345IE', 'Jim Abrahams', '1944-05-10'),
('2983457FFD', 'Jean Gremillon', '1979-07-09'),
('3249432JF', 'John Gielgud', '1955-10-07'),
('52341FG', 'Abiola Abrams', '1976-06-15'),
('648237GZ', 'Allan Dwan', '1885-12-23'),
('7236478FH', 'Jim Sheridan', '1949-11-13'),
('76234JF', 'Roy Andersson', '1943-09-06'),
('835976DF', 'William Kennedy Dickson', '1860-10-01'),
('847329HF', 'William Garwood', '1981-10-24'),
('8723491JF', 'Ron Shelton', '1969-06-16'),
('87263HE', 'Silvano Agosti', '1900-03-23'),
('892347OP', 'Jörg Buttgereit', '1964-07-26'),
('89734KG', 'Michael Anderson', '1920-04-25'),
('9287475FT', 'George Pan Cosmatos', '1941-04-15'),
('9343487GR', 'Fernando Arrabal', '1933-08-14');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szereplo`
--

CREATE TABLE `szereplo` (
  `szid` int(11) NOT NULL,
  `sznev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `szuldatum` date NOT NULL,
  `nem` varchar(10) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szereplo`
--

INSERT INTO `szereplo` (`szid`, `sznev`, `szuldatum`, `nem`) VALUES
(1, 'Terence Hill', '1958-08-17', 'ferfi'),
(2, 'Bud Spencer', '1949-07-17', 'ferfi'),
(3, 'Woody Woodbury', '1967-07-16', 'ferfi'),
(4, 'Leonardo DiCaprio', '1970-10-08', 'ferfi'),
(5, 'Tom Hanks', '1972-07-14', 'ferfi'),
(6, 'Michael J. Fox', '1982-09-07', 'ferfi'),
(7, 'Lea Thompson', '1983-07-08', 'no'),
(8, 'Arnold Schwarzenegger', '1966-05-19', 'ferfi'),
(9, 'Bob Gunton', '1980-06-15', 'ferfi'),
(10, 'Morgan Freeman', '1958-08-18', 'ferfi'),
(11, 'Tim Robbins', '1963-04-18', 'ferfi'),
(12, 'William Sadler', '1982-06-15', 'ferfi'),
(31, 'Sigourney Weaver', '1961-05-19', 'no'),
(35, 'Bryan Singer', '1949-10-16', 'ferfi'),
(36, 'Sylvester Stallone', '1945-06-19', 'ferfi'),
(37, 'John Sturges', '1949-10-18', 'ferfi'),
(38, 'Elijah Wood', '1972-08-19', 'ferfi'),
(39, 'Viggo Mortensen', '1963-06-18', 'ferfi'),
(40, 'Sir Ian McKellen', '1940-08-20', 'ferfi'),
(41, 'Brad Pitt', '1970-07-23', 'ferfi'),
(42, 'Jason Statham', '1971-08-19', 'ferfi'),
(43, 'Donald Sutherland', '1924-07-21', 'ferfi'),
(44, 'Telly Savalas', '1961-07-26', 'ferfi'),
(45, 'Clint Eastwood', '1985-06-27', 'ferfi'),
(46, 'Danny DeVito', '1942-06-13', 'ferfi'),
(47, 'Christopher Lloyd', '1980-05-18', 'ferfi'),
(48, 'Jack Nicholson', '1965-05-12', 'ferfi'),
(49, 'Greg Kinnear', '1983-08-18', 'ferfi'),
(50, 'Helen Hunt', '1968-07-19', 'no'),
(51, 'Jack Nicholson', '1973-04-15', 'ferfi'),
(52, 'Uma Thurman', '1963-10-17', 'ferfi'),
(53, 'Samuel L. Jackson', '1974-06-08', 'ferfi'),
(54, 'John Travolta', '1984-08-15', 'ferfi');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szereplotomusor`
--

CREATE TABLE `szereplotomusor` (
  `mid` int(11) NOT NULL,
  `szid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szereplotomusor`
--

INSERT INTO `szereplotomusor` (`mid`, `szid`) VALUES
(2, 3),
(2, 6),
(11, 3),
(11, 5),
(11, 8),
(11, 11),
(3, 5),
(3, 6),
(3, 9),
(3, 12),
(14, 1),
(14, 2),
(14, 3),
(316, 4),
(316, 6),
(316, 12),
(316, 36),
(316, 37),
(316, 40),
(315, 3),
(315, 8),
(315, 31),
(315, 36),
(315, 40),
(317, 1),
(317, 3),
(317, 4),
(317, 9),
(317, 11),
(317, 37),
(317, 39),
(313, 4),
(313, 5),
(313, 6),
(313, 8),
(313, 9),
(313, 11),
(321, 49),
(321, 51),
(321, 52),
(321, 53),
(321, 54),
(9, 3),
(9, 5),
(9, 9),
(9, 31),
(9, 39),
(9, 43),
(9, 45);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `csatorna`
--
ALTER TABLE `csatorna`
  ADD PRIMARY KEY (`csid`);

--
-- A tábla indexei `idopont`
--
ALTER TABLE `idopont`
  ADD KEY `mid` (`mid`),
  ADD KEY `csid` (`csid`);

--
-- A tábla indexei `musor`
--
ALTER TABLE `musor`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `rendezte` (`rendezo_szigszam`);

--
-- A tábla indexei `rendezo`
--
ALTER TABLE `rendezo`
  ADD PRIMARY KEY (`szigszam`);

--
-- A tábla indexei `szereplo`
--
ALTER TABLE `szereplo`
  ADD PRIMARY KEY (`szid`);

--
-- A tábla indexei `szereplotomusor`
--
ALTER TABLE `szereplotomusor`
  ADD KEY `mid` (`mid`),
  ADD KEY `szid` (`szid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `csatorna`
--
ALTER TABLE `csatorna`
  MODIFY `csid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT a táblához `musor`
--
ALTER TABLE `musor`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT a táblához `szereplo`
--
ALTER TABLE `szereplo`
  MODIFY `szid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `idopont`
--
ALTER TABLE `idopont`
  ADD CONSTRAINT `idopont_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `musor` (`mid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idopont_ibfk_2` FOREIGN KEY (`csid`) REFERENCES `csatorna` (`csid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `musor`
--
ALTER TABLE `musor`
  ADD CONSTRAINT `musor_ibfk_1` FOREIGN KEY (`rendezo_szigszam`) REFERENCES `rendezo` (`szigszam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `szereplotomusor`
--
ALTER TABLE `szereplotomusor`
  ADD CONSTRAINT `szereplotomusor_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `musor` (`mid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `szereplotomusor_ibfk_2` FOREIGN KEY (`szid`) REFERENCES `szereplo` (`szid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
