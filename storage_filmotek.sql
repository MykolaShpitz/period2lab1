SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `storage_filmotek` DEFAULT CHARACTER SET cp1251 COLLATE cp1251_general_ci;
USE `storage_filmotek`;

CREATE TABLE `actor` (
  `ID_Actor` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

INSERT INTO `actor` (`ID_Actor`, `name`) VALUES
(1, 'Charles Chaplin'),
(2, 'Marlon Brando'),
(3, 'Jack Nicholson'),
(4, 'Daniel Day-Lewis'),
(5, 'Meryl Streep'),
(6, 'Tom Hanks'),
(7, 'Mohanlal');

CREATE TABLE `film` (
  `ID_Film` int(11) NOT NULL,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `country` text NOT NULL,
  `quality` int(11) NOT NULL,
  `resolution` text NOT NULL,
  `codec` text NOT NULL,
  `producer` text NOT NULL,
  `director` text NOT NULL,
  `carrier` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

INSERT INTO `film` (`ID_Film`, `name`, `date`, `country`, `quality`, `resolution`, `codec`, `producer`, `director`, `carrier`) VALUES
(1, 'The Shawshank Redemption', '1994-09-24', 'USA', 5, '1080p', 'Codec1', 'Castle Rock', 'Frank Darabont', 'DVD'),
(2, 'The Godfather', '2020-02-20', 'USA', 4, '1080p', 'Codec2', ' Albert S. Ruddy.', 'Francis Ford Coppola', 'CD'),
(3, 'The Dark Knight', '2008-06-22', 'USA & UK', 5, '1080p', 'Codec3', 'Emma Thomas', 'Christopher Nolan', 'Floppy'),
(4, '12 Angry Men', '1957-07-28', 'USA', 4, '1080p', 'Codec2', 'Henry Jaynes Fonda', 'Sidney Lumet', 'DVD');

CREATE TABLE `film_actor` (
  `id` int(11) NOT NULL,
  `FID_Film` int(11) NOT NULL,
  `FID_Actor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

INSERT INTO `film_actor` (`id`, `FID_Film`, `FID_Actor`) VALUES
(1, 2, 7),
(2, 2, 6),
(3, 2, 2),
(4, 1, 1),
(5, 3, 1),
(6, 1, 3),
(7, 3, 4),
(8, 3, 5),
(9, 4, 5),
(10, 4, 2);

CREATE TABLE `film_genre` (
  `id` int(11) NOT NULL,
  `FID_Film` int(11) NOT NULL,
  `FID_Genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

INSERT INTO `film_genre` (`id`, `FID_Film`, `FID_Genre`) VALUES
(1, 1, 1),
(2, 5, 1),
(3, 3, 3),
(4, 4, 3),
(5, 2, 2);

CREATE TABLE `genre` (
  `ID_Genre` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

INSERT INTO `genre` (`ID_Genre`, `title`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(3, 'Fantasy');


ALTER TABLE `actor`
  ADD PRIMARY KEY (`ID_Actor`);

ALTER TABLE `film`
  ADD PRIMARY KEY (`ID_Film`);

ALTER TABLE `film_actor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FID_Film` (`FID_Film`),
  ADD KEY `FID_Actor` (`FID_Actor`);

ALTER TABLE `film_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FID_Film` (`FID_Film`),
  ADD KEY `FID_Film_2` (`FID_Film`),
  ADD KEY `FID_Genre` (`FID_Genre`);

ALTER TABLE `genre`
  ADD PRIMARY KEY (`ID_Genre`);


ALTER TABLE `actor`
  MODIFY `ID_Actor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `film`
  MODIFY `ID_Film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `film_actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `film_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `genre`
  MODIFY `ID_Genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `film_actor`
  ADD CONSTRAINT `film_actor_ibfk_1` FOREIGN KEY (`FID_Film`) REFERENCES `film` (`ID_Film`),
  ADD CONSTRAINT `film_actor_ibfk_2` FOREIGN KEY (`FID_Actor`) REFERENCES `actor` (`ID_Actor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
