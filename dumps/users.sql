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
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` text NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hash` varchar(32) NOT NULL DEFAULT '',
  `ip` int UNSIGNED NOT NULL DEFAULT '0',
  `Photo` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'default_photo.png',
  `name` varchar(100) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `bio` varchar(1000) DEFAULT ' Отсутствует',
  `admin` varchar(5) NOT NULL DEFAULT 'false'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `password`, `hash`, `ip`, `Photo`, `name`, `country`, `bio`, `admin`) VALUES
(1, '', 'admin', '224cf2b695a5e8ecaecfb9015161fa4b', 'dhghdhdhdrthrdhdrgh', 2342323, 'default_photo.png', NULL, NULL, ' Отсутствует', 'false'),
(2, '', 'adasda', 'd013fb859e90ba983f1cb390f66a1c62', '', 0, 'default_photo.png', NULL, NULL, ' Отсутствует', 'false'),
(3, '', 'AbobA', '1f32aa4c9a1d2ea010adcf2348166a04', '37c91dcca19c24dcc66017af018cf2f5', 2130706433, 'завантаження (7).jpg', 'bohdan', 'Ukraine', '123121221', 'true'),
(4, '', '666x187', '897c8fde25c5cc5270cda61425eed3c8', 'b12dac75ad03dac15bb6864b2cfd4c0e', 0, 'default_photo.png', NULL, NULL, ' Отсутствует', 'false'),
(6, '', 'n3d7c0qw', '224cf2b695a5e8ecaecfb9015161fa4b', '9dcaddca0c79644760cc2c22470a9d35', 2130706433, 'default_photo.png', '', '', ' Отсутствует', 'false'),
(7, '', 'Slender67', 'b3ebeb6b548088fd250e6b1fce2f9aa1', '', 0, 'default_photo.png', NULL, NULL, ' Отсутствует', 'false'),
(8, '', 'test_user_1', '897c8fde25c5cc5270cda61425eed3c8', '57f64f46593753a48a0dd65ac569f45a', 0, 'default_photo.png', NULL, NULL, ' Отсутствует', 'false'),
(9, '', 'bohdan', '224cf2b695a5e8ecaecfb9015161fa4b', '014a65c8542e20cb8ce03e7c2f9ed3fe', 2130706433, 'amnyam.jpg', ')', 'Ukraine', 'оп эроина оп оп эроина', 'false'),
(10, 'bohdan43567@gmail.com', 'bohdan123', '224cf2b695a5e8ecaecfb9015161fa4b', 'a6318f1217820e7e22ae6fa2d022a634', 0, 'default_photo.png', NULL, NULL, ' Отсутствует', 'false');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
