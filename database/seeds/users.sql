-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 09. Aug 2020 um 13:57
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sternekoch', 'sternekoch@mail.de', NULL, '$2y$10$sWMuoMmQqrmdw53uEczIaO2mFefOGzzVa89R8chG3ueXSnqaBCGpe', NULL, '2020-08-07 20:42:52', '2020-08-07 20:42:52'),
(2, 'Krümmelmonster', 'krummelmonster@mail.de', NULL, '$2y$10$l2vQ834poQmqml3XMd1TLe0A4q9AzyJZcM6HfueNmzOeZLm0LBYiq', NULL, '2020-08-07 21:42:59', '2020-08-07 21:42:59');
