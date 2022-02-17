-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Лют 17 2022 р., 22:49
-- Версія сервера: 10.5.12-MariaDB-102+deb11u1
-- Версія PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `lilia_kasperska1`
--

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `discription`, `characteristic`, `main_photo`, `photos`, `id_category`, `id_subcategory`, `id_user`, `exclusive`) VALUES
(4, 'Корм Royal Canin CHIHUAHUA ADULT', 38, 'ROYAL CANIN впродовж уже понад 50 років створює здорове харчування для котів та собак, в основі якого лежить нутрієнтний підхід. Це означає, що формула кожного продукту ROYAL CANIN розроблена таким чином, щоб забезпечити організм кота та собаки точно розрахованою кількістю нутрієнтів (поживних речовин), в тому числі білків, жирів, натуральних антиоксидантів, вітамінів, клітковини, пребіотиків і мінеральних речовин, відповідно до унікальних особливостей здоров\'я домашньої тварини.', 'Бренд:  Royal Canin Порода:  Чихуахуа Клас:  суперпреміум Тип:  вологий корм Вік:  дорослі Серія:  повсякденний... ', 'images/11.jpeg', 'images/12.jpeg*images/13.jpeg*images/14.jpeg*', 1, 1, 1, 0),
(6, 'Насіння Семена Украины Гігант Трава', 10, 'Насіння Семена Украины Гігант Трава для котів 20 г', 'Основні характеристики Насіння Семена Украины Гігант Трава для котів 20 г Ціна:  10 ₴/шт. Бренд:  Семена Украины Розмір та вага Вага:  20 г...', 'images/421447_2.jpeg', 'images/421447_2.jpeg*', 6, 2, 1, 1),
(7, 'Снеки Dreamies з лососем', 34, 'Снеки Dreamies з лососем 60 г', 'Ціна:  34 ₴/шт. Бренд:  Dreamies Смак:  рибний...', 'images/1270083_1.jpeg', 'images/1270083_1.jpeg*', 6, 1, 1, 0);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
