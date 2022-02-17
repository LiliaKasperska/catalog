-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Лют 17 2022 р., 19:56
-- Версія сервера: 10.4.21-MariaDB
-- Версія PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `catalog_animal`
--
CREATE DATABASE IF NOT EXISTS `catalog_animal` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `catalog_animal`;

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Товари для собак'),
(3, 'Товари для птахів');

-- --------------------------------------------------------

--
-- Структура таблиці `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `message`
--

INSERT INTO `message` (`id`, `email`, `text`) VALUES
(3, 'qwerty@gmail.com', 'rgtr rhy y jyjs y');

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(200) NOT NULL,
  `discription` varchar(1000) NOT NULL,
  `characteristic` varchar(1000) NOT NULL,
  `main_photo` varchar(1000) NOT NULL,
  `photos` varchar(1000) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_subcategory` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `exclusive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `discription`, `characteristic`, `main_photo`, `photos`, `id_category`, `id_subcategory`, `id_user`, `exclusive`) VALUES
(4, 'Корм Royal Canin CHIHUAHUA ADULT', 38, 'ROYAL CANIN впродовж уже понад 50 років створює здорове харчування для котів та собак, в основі якого лежить нутрієнтний підхід. Це означає, що формула кожного продукту ROYAL CANIN розроблена таким чином, щоб забезпечити організм кота та собаки точно розрахованою кількістю нутрієнтів (поживних речовин), в тому числі білків, жирів, натуральних антиоксидантів, вітамінів, клітковини, пребіотиків і мінеральних речовин, відповідно до унікальних особливостей здоров\'я домашньої тварини.', 'Бренд:  Royal Canin Порода:  Чихуахуа Клас:  суперпреміум Тип:  вологий корм Вік:  дорослі Серія:  повсякденний... ', 'images/11.jpeg', 'images/12.jpeg*images/13.jpeg*images/14.jpeg*', 1, 1, 1, 0),
(5, 'Вітаміни Gimpet GimCat Nutri Pockets Dental', 81, '', ' Бренд:  Gimpet Розмір та вага Вага:  60 г', 'images/244982_3.jpeg', 'images/*', 2, 2, 1, 1);

--
-- Тригери `product`
--
DELIMITER $$
CREATE TRIGGER `tr1` AFTER DELETE ON `product` FOR EACH ROW DELETE FROM `product` WHERE `id_category`=OLD.id_category
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблиці `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`) VALUES
(1, 'Корм'),
(2, 'Ласощі'),
(3, 'Повідці');

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `site` varchar(100) NOT NULL,
  `favourites` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `name`, `login`, `password`, `phone`, `site`, `favourites`) VALUES
(1, 'Qwerty111', 'qwerty', '1', '+380326595485', 'rg erger gr g', ' 2*5*'),
(2, 'Admin', 'admin', '1', '-', '-', '-');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
