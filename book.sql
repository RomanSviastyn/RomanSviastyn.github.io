-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Бер 05 2017 р., 02:19
-- Версія сервера: 5.5.48
-- Версія PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `book`
--

-- --------------------------------------------------------

--
-- Структура таблиці `moderators`
--

CREATE TABLE IF NOT EXISTS `moderators` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `moderators`
--

INSERT INTO `moderators` (`id`, `login`, `pass`) VALUES
(1, 'book_admin', 'e2e7917056abab0f7bb4e7b83f11e7ad');

-- --------------------------------------------------------

--
-- Структура таблиці `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  `text` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  `browser` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `notice`
--

INSERT INTO `notice` (`id`, `name`, `email`, `website`, `date`, `text`, `ip`, `browser`) VALUES
(1, '1', 'm@m', 'http://iphoneaccessories', '2017-03-04 14:10:00', '1324567890', '127.0.0.1', 'Yandex 15.0'),
(5, 'test', 'test@test2test', 'http://test', '2017-03-04 15:22:17', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit cum  corporis, exercitationem, dignissimos, ratione error ipsam numquam molestias expedita magnam voluptatibus commodi libero distinctio deserunt labore consequuntur maxime. Officia quasi, quo magnam nulla.', '127.0.0.1', 'Chrome 56.0.2924.87'),
(7, 'gfhfif', 'v@v', '', '2017-03-04 20:00:24', 'cwcwsdcwdc', '127.0.0.1', 'Firefox 51.0'),
(8, 'mariya', 'mariya@mail', '', '2017-03-04 22:07:14', 'ромашка- супер)))))))', '127.0.0.1', 'Firefox 51.0'),
(9, 'test', 'm@m', 'http://ssxsx', '2017-03-04 23:33:27', 'sccascascascascas', '127.0.0.1', 'Firefox 51.0');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `moderators`
--
ALTER TABLE `moderators`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `moderators`
--
ALTER TABLE `moderators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
