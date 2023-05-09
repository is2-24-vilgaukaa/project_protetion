-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 01 2023 г., 16:20
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int NOT NULL,
  `login_user` varchar(50) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `login_user`, `name_product`, `price`) VALUES
(4, 'lia', '\"Северное сияние\"', 1200),
(31, 'irina_morozova', '\"Город в тумане\"', 950),
(46, 'yakov', '\"Весеннее настроение\"', 1350),
(51, 'lia', 'Каффы \"Эльфийские уши\"', 1500),
(52, 'yakov', 'Каффы \"Эльфийские уши\"', 1500),
(56, 'irina_morozova', '\"Небесный кит\"', 1400),
(58, 'lia', '\"Город в тумане\"', 950),
(69, 'lia', '\"Стихия\" ассорт', 1400),
(75, 'lia', '\"Друиды\"', 2200),
(81, 'lia', '\"Непоколебимая\"', 1900),
(83, 'yakov', '\"Нежный изумруд\"', 2100),
(94, 'yakov', '\"Северное сияние\"', 1200),
(96, 'yakov', '\"Город в тумане\"', 950),
(136, 'irina_morozova', '\"Весеннее настроение\"', 1350),
(137, 'irina_morozova', '\"Небесный кит\"', 1400),
(140, 'irina_morozova', '\"Весеннее настроение\"', 1350),
(143, 'irina_morozova', '\"Северное сияние\"', 1200);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name_category`) VALUES
(1, 'Серьги'),
(2, 'Кулон'),
(3, 'Диадема'),
(4, 'Кольцо');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `id_category` int NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `materials` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `id_category`, `name_product`, `price`, `materials`, `img`) VALUES
(1, 1, '\"Северное сияние\"', 1200, 'Данное изделие изготовлено из эбенового дерева и эпоксидной смолы.', 'picture/синие_серьги.jpg'),
(2, 1, '\"Город в тумане\"', 950, 'Данное изделие изготовлено полностью из эпоксидной смолы. ', 'picture/кулон_серьги.jpg'),
(3, 1, '\"Весеннее настроение\"', 1350, 'Данное изделие изготовлено из золотой проволоки, бусин, сухоцветов и эпоксидной смолы.', 'picture/желтые_серьги.jpg'),
(4, 1, '\"Муза\"', 800, 'Данное изделие изготовлено из серебряной проволоки и синих бусин.', 'picture/серьги_бусины.jpg'),
(5, 1, 'Каффы \"Эльфийские уши\"', 1500, 'Данное изделие изготовлено из серебряной проволоки и небесно-голубых бисерин. ', 'picture/каффы.jpg'),
(6, 1, '\"Летом у моря\"', 1150, 'Данное изделие изготовлено полностью из эпоксидной смолы.', 'picture/голубые_серьги.jpg'),
(7, 2, '\"Мистика\"', 1150, 'Данное изделие изготовлено полностью из эпоксидной смолы. Основа для кулона - шнур из кожзаменителя.', 'picture/фиолетовый_кулон.jpg'),
(8, 2, '\"Небесный кит\"', 1400, 'Данное изделие изготовлено полностью из эпоксидной смолы. Основа для кулона - серебряная цепочка. ', 'picture/кулон_кит.jpg'),
(9, 2, '\"Камень истока\" ассорт', 1200, 'Данное изделие изготовлено из бижутерного сплава с использованием хрустальных страз. ', 'picture/кулоны.jpg'),
(10, 2, '\"Стихия\" ассорт', 1400, 'Данное изделие изготовлено из бижутерного сплава и страз.', 'picture/кулоны_genshin.jpg'),
(11, 2, '\"Под зеленым светом\" ассорт', 1150, 'Данное изделие изготовлено из эпоксидной смолы и эбенового дерева. Основа для кулона - кожаный шнур.', 'picture/кулоны_смола.jpg'),
(12, 2, '\"Неверленд\"', 1150, 'Данное изделие изготовлено из эпоксидной смолы и фигурки корабля. Основа для кулона - кожаный шнур.', 'picture/зеленый_кулон.jpg'),
(13, 3, '\"Лебединое озеро\"', 1800, 'Данное изделие изготовлено из медной проволоки, бусин и бисерин.', 'picture/белая_диадема.jpg'),
(14, 3, '\"Друиды\"', 2200, 'Данное изделие изготовлено из медной проволоки, бусин и бисерин.', 'picture/рыжая_диадема.jpg'),
(15, 3, '\"Снежная королева\"', 1800, 'Данное изделие изготовлено из медной проволоки, бусин и хрустальных страз.', 'picture/бело-голубая_диадема.jpg'),
(16, 4, '\"Непоколебимая\"', 1900, 'Данное изделие изготовлено из сплава платины и белого опала в качестве вставки.', 'picture/кольцо_с_камнем.jpg'),
(17, 4, '\"Нежный изумруд\"', 2100, 'Данное изделие изготовлено из сплава платины и стеклянных камней.', 'picture/зеленое_кольцо.jpg'),
(18, 4, '\"Одно целое\"', 3000, 'Данное изделие изготовлено из сплава платины с использованием стеклянных камней.', 'picture/парные_кольца.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `registration_for_course`
--

CREATE TABLE `registration_for_course` (
  `id` int NOT NULL,
  `name_reg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname_reg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic_reg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `registration_for_course`
--

INSERT INTO `registration_for_course` (`id`, `name_reg`, `surname_reg`, `patronymic_reg`, `email`, `phone`, `name_course`) VALUES
(3, 'Алексей', 'Помонарев', 'Андреевич', 'alexSay@gmail.com', '+79520356183', 'Вышивка'),
(4, 'Людмила', 'Тычкина', 'Николаевна', 'luda2000@gmail.com', '+79566780932', 'Плетение из проволки'),
(5, 'Николай', 'Романов', 'Алексеевич', 'romanow1589@gmail.com', '+79518251259', 'Ювелирная работа'),
(10, 'Любовь', 'Харитонова', 'Алексеевна', 'love1980@gmail.com', '+79523090485', 'Эпоксидная смола'),
(13, 'Ирина', 'Морозова', 'Валентиновна', 'iriska123@gmail.com', '+79519204891', 'Вышивка'),
(18, 'Людмила', 'Васильева', 'Анатольевна', 'luda_1999@gmail.com', '+79511723456', 'Бисероплетение');

-- --------------------------------------------------------

--
-- Структура таблицы `stocks`
--

CREATE TABLE `stocks` (
  `id` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `old_price` int NOT NULL,
  `new_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `stocks`
--

INSERT INTO `stocks` (`id`, `title`, `old_price`, `new_price`) VALUES
(1, 'Чокер \"Нежность\"', 2200, 1900),
(2, 'Комплект \"Грация\"', 3100, 2900),
(3, 'Кулоны \"Ночной прибой\"', 1400, 1100),
(4, 'Диадема \"Сапфир\"', 4500, 4000),
(5, 'Кулон \"Лунная призма\"', 1500, 1100),
(6, 'Кулоны \"Сердца Купидона\"', 4900, 4500);

-- --------------------------------------------------------

--
-- Структура таблицы `user_registration`
--

CREATE TABLE `user_registration` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user_registration`
--

INSERT INTO `user_registration` (`id`, `name`, `surname`, `patronymic`, `login`, `password`, `email`) VALUES
(5, 'Ирина', 'Морозова', 'Валентиновна', 'irina_morozova', '123456', 'iriska123@gmail.com'),
(14, 'Евгения', 'Афинова', 'Анатольевна', 'zhenya', 'gfhjkm', 'zhenya228@gmail.com'),
(15, 'Лия', 'Жданова', 'Максимовна', 'lia', 'k.,jdm', 'lia_love@gmail.com'),
(20, 'Дарья', 'Яковлева', 'Владимировна', 'yakov', '123yakow456', 'dasha_yakov@gmail.com'),
(56, 'user', 'user', 'user', 'user', 'user', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `registration_for_course`
--
ALTER TABLE `registration_for_course`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT для таблицы `registration_for_course`
--
ALTER TABLE `registration_for_course`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
