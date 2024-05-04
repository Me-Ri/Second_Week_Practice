-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 03 2024 г., 18:18
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `second_week`
--

-- --------------------------------------------------------

--
-- Структура таблицы `directions`
--

CREATE TABLE `directions` (
  `id` int NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `id_institute` int NOT NULL,
  `id_manager_opop` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `id_direction` int NOT NULL,
  `course` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `institutes`
--

CREATE TABLE `institutes` (
  `id` int NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `practice`
--

CREATE TABLE `practice` (
  `id` int NOT NULL,
  `year` int NOT NULL,
  `view` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `id_group` int NOT NULL,
  `address` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `id_ugu_pm` int NOT NULL,
  `id_ent_pm` int NOT NULL,
  `id_org_pm` int NOT NULL,
  `order_num` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `order_date` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `start_date` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `end_date` varchar(32) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `fnp` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `id_group` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `student_opop`
--

CREATE TABLE `student_opop` (
  `id_student` int NOT NULL,
  `id_opop` int NOT NULL,
  `state` varchar(32) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `student_practice`
--

CREATE TABLE `student_practice` (
  `id` int NOT NULL,
  `id_student` int NOT NULL,
  `difficults` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `volume` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `qualities` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `comment` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `mark` int NOT NULL,
  `badReason` varchar(64) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `fnp` varchar(64) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `id_direction` int DEFAULT NULL,
  `id_student` int DEFAULT NULL,
  `post` varchar(32) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `fnp`, `role`, `id_direction`, `id_student`, `post`) VALUES
(17, 'admin', '$2y$10$8.T/Jqj2LoHFYmbklMVYMOw2qzXWZe83GLWjWNLezDpxQGodFLNR6', NULL, 'ADMIN', NULL, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `directions`
--
ALTER TABLE `directions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `practice`
--
ALTER TABLE `practice`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `student_practice`
--
ALTER TABLE `student_practice`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `directions`
--
ALTER TABLE `directions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `institutes`
--
ALTER TABLE `institutes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `practice`
--
ALTER TABLE `practice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `student_practice`
--
ALTER TABLE `student_practice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
