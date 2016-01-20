-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 20 2016 г., 14:25
-- Версия сервера: 5.5.38-log
-- Версия PHP: 5.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `ownfrw`
--

-- --------------------------------------------------------

--
-- Структура таблицы `router_pages`
--

CREATE TABLE IF NOT EXISTS `router_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` enum('active','passive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `router_pages`
--

INSERT INTO `router_pages` (`id`, `address`, `level`, `parent_id`, `status`) VALUES
(1, '', 0, 0, 'active'),
(2, 'cms', 1, 1, 'active'),
(3, 'orders', 2, 2, 'active'),
(4, 'new', 3, 3, 'active'),
(5, 'schedule', 2, 2, 'active'),
(6, 'planning', 2, 2, 'active'),
(7, 'pl_manufactory', 3, 6, 'active'),
(8, 'pl_technologist', 3, 6, 'active'),
(9, 'export', 3, 5, 'active'),
(10, 'sch_technologist', 3, 5, 'active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
