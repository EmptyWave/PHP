-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 11 2019 г., 01:25
-- Версия сервера: 5.6.41
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gbphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `info` varchar(250) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `info`, `price`) VALUES
(1, 'Товар 1', 'Тут информация о товаре 1', 200),
(2, 'Товар 2', 'Тут информация о товаре 2', 300),
(3, 'Товар 3', 'Описание', 230),
(4, 'Товар 4', 'Описание этого товара', 4560),
(20, 'sdfsdf', 'myFirstGood', 1234),
(21, 'sdfsdf', 'myFirstGood', 1234),
(22, 'sdfsdf', 'myFirstGood', 1234),
(23, 'qwerwerwqrwqrwerwq', 'sdfsadf sf ds f df', 130),
(24, 'qwerwerwqrwqrwerwq', 'sdfsadf sf ds f df', 130),
(25, 'qwerwerwqrwqrwerwq', 'sdfsadf sf ds f df', 130),
(26, 'qwerwerwqrwqrwerwq', 'sdfsadf sf ds f df', 130),
(27, '123', '123', 123);

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `img-min` text NOT NULL,
  `img-max` text NOT NULL,
  `about` text NOT NULL,
  `price` double NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `img-min`, `img-max`, `about`, `price`, `type`) VALUES
(1, 'Mango People T-shirt 1', 'http://placehold.it/260x220', 'http://placehold.it/360x400', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At delectus, doloremque enim ex natus perferendis repellendus sequi voluptates! Consectetur consequatur fuga iste nostrum! Accusantium, impedit, veritatis! Accusantium quasi quisquam ullam.', 5.49, 6),
(2, 'Mango People T-shirt 2', 'http://placehold.it/260x220', 'http://placehold.it/360x400', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At delectus, doloremque enim ex natus perferendis repellendus sequi voluptates! Consectetur consequatur fuga iste nostrum! Accusantium, impedit, veritatis! Accusantium quasi quisquam ullam.', 3.99, 6),
(3, 'Mango People T-shirt 3', 'http://placehold.it/260x220', 'http://placehold.it/360x400', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At delectus, doloremque enim ex natus perferendis repellendus sequi voluptates! Consectetur consequatur fuga iste nostrum! Accusantium, impedit, veritatis! Accusantium quasi quisquam ullam.', 6.99, 6),
(4, 'Mango People T-shirt 4', 'http://placehold.it/260x220', 'http://placehold.it/360x400', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At delectus, doloremque enim ex natus perferendis repellendus sequi voluptates! Consectetur consequatur fuga iste nostrum! Accusantium, impedit, veritatis! Accusantium quasi quisquam ullam.', 4.49, 6),
(5, 'Mango People T-shirt 5', 'http://placehold.it/260x220', 'http://placehold.it/360x400', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At delectus, doloremque enim ex natus perferendis repellendus sequi voluptates! Consectetur consequatur fuga iste nostrum! Accusantium, impedit, veritatis! Accusantium quasi quisquam ullam.', 5.29, 6),
(6, 'Mango People T-shirt 6', 'http://placehold.it/260x220', 'http://placehold.it/360x400', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At delectus, doloremque enim ex natus perferendis repellendus sequi voluptates! Consectetur consequatur fuga iste nostrum! Accusantium, impedit, veritatis! Accusantium quasi quisquam ullam.', 4.99, 6),
(7, 'Mango People T-shirt 7', 'http://placehold.it/260x220', 'http://placehold.it/360x400', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At delectus, doloremque enim ex natus perferendis repellendus sequi voluptates! Consectetur consequatur fuga iste nostrum! Accusantium, impedit, veritatis! Accusantium quasi quisquam ullam.', 6.49, 6),
(8, 'Mango People T-shirt 8', 'http://placehold.it/260x220', 'http://placehold.it/360x400', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At delectus, doloremque enim ex natus perferendis repellendus sequi voluptates! Consectetur consequatur fuga iste nostrum! Accusantium, impedit, veritatis! Accusantium quasi quisquam ullam.', 5.99, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `userID` int(11) NOT NULL,
  `review` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `userID`, `review`, `date`) VALUES
(4, 'Admin', 123, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At delectus, doloremque enim ex natus perferendis repellendus sequi voluptates! Consectetur consequatur fuga iste nostrum! Accusantium, impedit, veritatis! Accusantium quasi quisquam ullam.', '2019-02-03 20:59:42'),
(6, 'Admin', 123, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At delectus, doloremque enim ex natus perferendis repellendus sequi voluptates! Consectetur consequatur fuga iste nostrum! Accusantium, impedit, veritatis! Accusantium quasi quisquam ullam.', '2019-02-03 20:59:54'),
(8, 'Admin', 123, '123qwerty', '2019-02-04 23:24:45');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `typeUser` int(1) DEFAULT '0' COMMENT '0 - user 1 - admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `typeUser`) VALUES
(1, 'admin', '21db9c15a75962a0865d5a39fe7fb9ff', 'demidielon', 1),
(2, 'notadmin', '21db9c15a75962a0865d5a39fe7fb9ff', 'realyNotAAdmin', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `zakaz`
--

CREATE TABLE `zakaz` (
  `id` int(11) NOT NULL,
  `fio` varchar(100) NOT NULL,
  `userid` int(10) DEFAULT NULL,
  `tel` varchar(20) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `info` text NOT NULL,
  `state` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zakaz`
--

INSERT INTO `zakaz` (`id`, `fio`, `userid`, `tel`, `adress`, `info`, `state`) VALUES
(1, 'Валерий Федорович Гусь', NULL, '+7913313133', 'г.Москва ул.123 д.1452', '[{\"price\":\"300\",\"name\":\"Товар 2\",\"count\":1}]', 1),
(2, 'Валерий Федорович НеГусь', NULL, '+8505656433', 'г.Москва ул.122 д.1452', '[{\"price\":\"300\",\"name\":\"Товар 2\",\"count\":2},{\"price\":\"230\",\"name\":\"Товар 3\",\"count\":3}]', 1),
(3, 'НеГусь Кто-то Петрович', 2, '+9999999999', 'Где-то в Москве', '[{\"price\":\"130\",\"name\":\"qwerwerwqrwqrwerwq\",\"count\":1},{\"price\":\"123\",\"name\":\"123\",\"count\":1}]', 2),
(4, 'Почти Нормальное ФИО', NULL, '+78993566265', 'г.Существующий', '[{\"price\":\"4560\",\"name\":\"Товар 4\",\"count\":2}]', 1),
(7, 'asd', 0, 'asd', 'asd', '[{\"price\":\"4560\",\"name\":\"Товар 4\",\"count\":1}]', 1),
(8, '34', 0, '42', '24', '[{\"price\":\"230\",\"name\":\"Товар 3\",\"count\":1}]', 1),
(9, '34', 0, '42', '24', '[{\"price\":\"230\",\"name\":\"Товар 3\",\"count\":1}]', 1),
(10, '432424', 0, '234234', '242', '[{\"price\":\"230\",\"name\":\"Товар 3\",\"count\":1}]', 1),
(11, '12345', 0, 'asfasfaf', 'afqwfqfaqf', '[{\"price\":\"230\",\"name\":\"Товар 3\",\"count\":1}]', 1),
(12, '12345', 0, 'asfasfaf', 'afqwfqfaqf', '[{\"price\":\"230\",\"name\":\"Товар 3\",\"count\":1}]', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zakaz`
--
ALTER TABLE `zakaz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `zakaz`
--
ALTER TABLE `zakaz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
