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


INSERT INTO `comments` (`id`, `recipe_id`, `user_id`, `text`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Ich habe den Käsekuchen schon oft gebacken und bin begeistert von diesem Rezept!', '2020-08-07 21:52:23', '2020-08-07 21:52:23'),
(2, 2, 2, 'Super Rezept! Ich mache es oft für Geburtstagsfeiern.', '2020-08-07 21:54:24', '2020-08-07 21:54:24'),
(3, 7, 1, 'Tolles Rezept! Ich esse die Pancakes gerne mit Ahornsirup. :)', '2020-08-07 21:56:00', '2020-08-07 21:56:00');

