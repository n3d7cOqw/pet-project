-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Сер 08 2023 р., 00:47
-- Версія сервера: 8.0.30
-- Версія PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `project`
--

-- --------------------------------------------------------

--
-- Структура таблиці `comment`
--

CREATE TABLE `comment` (
  `authorID` int NOT NULL,
  `id` int NOT NULL,
  `comment` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `urlArticle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `comment`
--

INSERT INTO `comment` (`authorID`, `id`, `comment`, `photo`, `login`, `urlArticle`) VALUES
(6, 1, 'test comment', 'default_photo.png', 'n3d7c0qw', 'test-3'),
(6, 3, 'Great article', 'default_photo.png', 'n3d7c0qw', 'test-3'),
(6, 8, '423423423', 'default_photo.png', 'n3d7c0qw', 'test-3'),
(6, 9, '423423423', 'default_photo.png', 'n3d7c0qw', 'test-3'),
(6, 50, '123455', 'default_photo.png', 'n3d7c0qw', 'test-3'),
(6, 51, '123455', 'default_photo.png', 'n3d7c0qw', 'test-3'),
(6, 52, '123455', 'default_photo.png', 'n3d7c0qw', 'test-3'),
(6, 53, '123455', 'default_photo.png', 'n3d7c0qw', 'test-3'),
(3, 54, '423423', 'завантаження (7).jpg', 'AbobA', 'test-3'),
(3, 55, '23423423423', 'завантаження (7).jpg', 'AbobA', 'test-3');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
