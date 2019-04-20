-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 05 2019 г., 00:40
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

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
