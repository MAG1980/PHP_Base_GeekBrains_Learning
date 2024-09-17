-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Мар 31 2022 г., 16:01
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
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `goods_id` int NOT NULL,
  `number` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `session_id`, `goods_id`, `number`) VALUES
(27, '7p382id4ml595fgnoduhqjehsq3bgp4b', 6, 1),
(51, 'nvqtr2rscugj07qnedcohtefn17p78bp', 1, 1),
(52, 'nvqtr2rscugj07qnedcohtefn17p78bp', 1, 1),
(57, 'oc6l0n0236pq0a0vheogk547lr1cb1r7', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `text`) VALUES
(1, 'User1', 'Hi!'),
(6, 'Test_OD', '223'),
(16, 'test', 'text'),
(47, 'Тест', 'Тестовый отзыв отредактирован'),
(52, '11', '55');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `image`, `description`, `price`) VALUES
(1, 'Пицца', 'pizza.jpg', 'Вкусная домашняя пицца', '24'),
(2, 'Чай', 'tea.jpg', 'Крупнолистовой высокогорный чёрный', '1'),
(6, 'Яблоко', 'apple.jpg', 'Спелое сочное', '12');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `filename` varchar(255) NOT NULL,
  `likes` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `filename`, `likes`) VALUES
(10, '01.jpg', 4),
(11, '02.jpg', 12),
(12, '03.jpg', 0),
(13, '04.jpg', 1),
(14, '05.jpg', 1),
(15, '06.jpg', 21),
(16, '07.jpg', 1),
(17, '08.jpg', 6),
(18, '09.jpg', 1),
(19, '10.jpg', 0),
(20, '11.jpg', 2),
(21, '12.jpg', 1),
(22, '13.jpg', 2),
(23, '14.jpg', 3),
(24, '15.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`) VALUES
(1, 'Си Цзиньпин указал Байдену, что от санкций страдают простые люди', 'ПЕКИН, 18 мар – РИА Новости. От санкций страдают простые люди, заявил в пятницу председатель КНР Си Цзиньпин в разговоре с президентом США Джо Байденом.\r\nОн также призвал поддерживать диалог и переговоры России и Украины,.\r\n\"Все стороны должны совместно поддерживать диалог и переговоры России и Украины\", - заявил Си Цзиньпин, слова которого приводит МИД КНР.\r\nСи Цзиньпин также отметил, Китай всегда выступал за соблюдение международного права и общепризнанных норм международных отношений, необходимости придерживаться Устава ООН, а также за всеобщую, совместную и устойчивую концепцию безопасности.\r\n\"В настоящее время отношения Китая и США еще не вышли из тупика, созданного предыдущей американской администрацией, и, наоборот, сталкиваются с еще большими вызовами. В особенности опасно то, что некоторые люди в США направляют ложные сигналы силам, выступающим за независимость Тайваня\", -добавил он.'),
(2, 'В России могут скоро заблокировать YouTube, сообщил источник', 'МОСКВА, 18 мар — РИА Новости. Роскомнадзор может заблокировать YouTube в ближайшие дни, сообщил РИА Новости источник, близкий к Роскомнадзору.\r\n\"Скорее всего, до конца следующей недели YouTube уже заблокируют. <...> Я предполагаю это с высокой степенью вероятности. Мне известно, что его должны были заблокировать еще на той неделе, но случилась Meta (блокировка Instagram), и я уверен, что блокировку просто отложили, чтобы было не все сразу\", — заявил собеседник агентства.\r\nПри этом он предположил, что ограничения могут ввести уже сегодня.\r\nРИА Новости направило запрос в Роскомнадзор по данному вопросу.\r\nВедомство 11 марта ограничило доступ к Instagram на территории страны из-за разрешения пользователям сети призывать к насилию в отношении россиян. С 14 марта доступ был запрещен полностью. В начале марта Роскомнадзор в ответ на ограничение доступа к российским СМИ заблокировал Facebook.'),
(3, '1', 'new'),
(5, '213', '34');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `cart_session` varchar(255) NOT NULL,
  `customer_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `cart_session`, `customer_name`, `phone_number`) VALUES
(1, 'oc6l0n0236pq0a0vheogk547lr1cb1r7', 'name', '12-123-23'),
(2, 'nvqtr2rscugj07qnedcohtefn17p78bp', 'Alex', '55-555-55'),
(3, 'oc6l0n0236pq0a0vheogk547lr1cb1r7', 'qasdf', '123123'),
(4, 'oc6l0n0236pq0a0vheogk547lr1cb1r7', 'erweq', 'sadfsdf'),
(5, 'nvqtr2rscugj07qnedcohtefn17p78bp', 'Ivan', '11-22-33');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `goods_id` (`goods_id`) USING BTREE,
  ADD KEY `session_id` (`session_id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`) USING BTREE;

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_session` (`cart_session`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
