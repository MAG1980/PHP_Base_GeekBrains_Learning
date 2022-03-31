-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 22 2022 г., 21:02
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`) VALUES
(1, 'Админ', 'Не флудить!'),
(2, 'Юзер', 'Как дела?'),
(4, 'Вася', 'Новое сообщение'),
(5, 'Петя', 'Привет'),
(9, 'Админ', 'Привет'),
(10, 'вв', 'аа'),
(11, 'Олег', 'Забаню!'),
(12, '11', 'ss'),
(13, 'Ежик', 'Лошааадка!'),
(14, 'Админ', 'Привет'),
(15, 'тест2', 'тестовое2'),
(16, '11', '11'),
(17, 'test', 'отзыв'),
(18, '23', '23'),
(19, '11', '22');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
