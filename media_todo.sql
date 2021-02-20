-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 21 Şub 2021, 00:18:17
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `media_todo`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gorevler`
--

DROP TABLE IF EXISTS `gorevler`;
CREATE TABLE IF NOT EXISTS `gorevler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gorev` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gorev_zorluk` int(11) NOT NULL,
  `gorev_sure` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `gorevler`
--

INSERT INTO `gorevler` (`id`, `gorev`, `gorev_zorluk`, `gorev_sure`) VALUES
(1, 'Business Task 0', 1, 7),
(2, 'Business Task 1', 3, 4),
(3, 'Business Task 2', 1, 6),
(4, 'Business Task 3', 5, 4),
(5, 'Business Task 4', 2, 7),
(6, 'Business Task 5', 5, 7),
(7, 'Business Task 6', 4, 5),
(8, 'Business Task 7', 2, 11),
(9, 'Business Task 8', 4, 12),
(10, 'Business Task 9', 1, 4),
(11, 'Business Task 10', 2, 7),
(12, 'Business Task 11', 4, 3),
(13, 'Business Task 12', 3, 10),
(14, 'Business Task 13', 1, 3),
(15, 'Business Task 14', 2, 10),
(16, 'Business Task 15', 2, 12),
(17, 'Business Task 16', 3, 9),
(18, 'Business Task 17', 4, 9),
(19, 'Business Task 18', 1, 7),
(20, 'Business Task 19', 4, 4),
(21, 'Business Task 20', 5, 4),
(22, 'Business Task 21', 4, 4),
(23, 'Business Task 22', 2, 5),
(24, 'Business Task 23', 5, 9),
(25, 'Business Task 24', 5, 12),
(26, 'Business Task 25', 3, 9),
(27, 'Business Task 26', 2, 12),
(28, 'Business Task 27', 3, 9),
(29, 'Business Task 28', 1, 7),
(30, 'Business Task 29', 4, 4),
(31, 'Business Task 30', 4, 4),
(32, 'Business Task 31', 1, 7),
(33, 'Business Task 32', 4, 7),
(34, 'Business Task 33', 3, 9),
(35, 'Business Task 34', 2, 9),
(36, 'Business Task 35', 1, 9),
(37, 'Business Task 36', 5, 3),
(38, 'Business Task 37', 4, 5),
(39, 'Business Task 38', 1, 9),
(40, 'Business Task 39', 5, 7),
(41, 'Business Task 40', 1, 6),
(42, 'Business Task 41', 1, 5),
(43, 'Business Task 42', 5, 9),
(44, 'Business Task 43', 1, 9),
(45, 'Business Task 44', 5, 8),
(46, 'Business Task 45', 5, 8),
(47, 'Business Task 46', 1, 9),
(48, 'Business Task 47', 1, 12),
(49, 'Business Task 48', 1, 3),
(50, 'Business Task 49', 5, 7),
(51, 'Business Task 50', 5, 12),
(52, 'Business Task 51', 1, 11),
(53, 'Business Task 52', 3, 7),
(54, 'Business Task 53', 1, 3),
(55, 'Business Task 54', 4, 10),
(56, 'Business Task 55', 2, 11),
(57, 'Business Task 56', 4, 9),
(58, 'Business Task 57', 3, 7),
(59, 'Business Task 58', 2, 4),
(60, 'Business Task 59', 4, 9),
(61, 'Business Task 60', 2, 10),
(62, 'Business Task 61', 3, 8),
(63, 'Business Task 62', 1, 10),
(64, 'Business Task 63', 4, 11),
(65, 'Business Task 64', 4, 5),
(66, 'Business Task 65', 3, 9),
(67, 'Business Task 66', 1, 3),
(68, 'IT Task 0', 3, 6),
(69, 'IT Task 1', 4, 6),
(70, 'IT Task 2', 3, 10),
(71, 'IT Task 3', 4, 4),
(72, 'IT Task 4', 3, 5),
(73, 'IT Task 5', 1, 12),
(74, 'IT Task 6', 1, 4),
(75, 'IT Task 7', 5, 6),
(76, 'IT Task 8', 3, 8),
(77, 'IT Task 9', 1, 6),
(78, 'IT Task 10', 2, 10),
(79, 'IT Task 11', 1, 6),
(80, 'IT Task 12', 4, 11),
(81, 'IT Task 13', 5, 3),
(82, 'IT Task 14', 1, 11),
(83, 'IT Task 15', 4, 6),
(84, 'IT Task 16', 5, 4),
(85, 'IT Task 17', 3, 11),
(86, 'IT Task 18', 2, 11),
(87, 'IT Task 19', 3, 8),
(88, 'IT Task 20', 3, 11),
(89, 'IT Task 21', 1, 5),
(90, 'IT Task 22', 4, 5),
(91, 'IT Task 23', 2, 7),
(92, 'IT Task 24', 2, 6),
(93, 'IT Task 25', 3, 9),
(94, 'IT Task 26', 4, 6),
(95, 'IT Task 27', 4, 7),
(96, 'IT Task 28', 1, 4),
(97, 'IT Task 29', 4, 5),
(98, 'IT Task 30', 5, 9),
(99, 'IT Task 31', 2, 5),
(100, 'IT Task 32', 2, 5),
(101, 'IT Task 33', 2, 6),
(102, 'IT Task 34', 5, 6),
(103, 'IT Task 35', 1, 10),
(104, 'IT Task 36', 1, 10),
(105, 'IT Task 37', 1, 10),
(106, 'IT Task 38', 5, 12),
(107, 'IT Task 39', 4, 12),
(108, 'IT Task 40', 2, 6),
(109, 'IT Task 41', 3, 8),
(110, 'IT Task 42', 5, 10),
(111, 'IT Task 43', 3, 10),
(112, 'IT Task 44', 5, 8),
(113, 'IT Task 45', 5, 9),
(114, 'IT Task 46', 3, 3),
(115, 'IT Task 47', 4, 4),
(116, 'IT Task 48', 1, 12),
(117, 'IT Task 49', 1, 7),
(118, 'IT Task 50', 1, 4),
(119, 'IT Task 51', 1, 10),
(120, 'IT Task 52', 4, 8),
(121, 'IT Task 53', 3, 3),
(122, 'IT Task 54', 4, 10),
(123, 'IT Task 55', 4, 12),
(124, 'IT Task 56', 3, 10),
(125, 'IT Task 57', 2, 11),
(126, 'IT Task 58', 1, 7),
(127, 'IT Task 59', 2, 4),
(128, 'IT Task 60', 3, 4),
(129, 'IT Task 61', 1, 3),
(130, 'IT Task 62', 1, 6),
(131, 'IT Task 63', 3, 3),
(132, 'IT Task 64', 4, 12),
(133, 'IT Task 65', 2, 11),
(134, 'IT Task 66', 3, 10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazilimcilar`
--

DROP TABLE IF EXISTS `yazilimcilar`;
CREATE TABLE IF NOT EXISTS `yazilimcilar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yazilimci_adi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sure` int(11) NOT NULL,
  `zorluk` int(11) NOT NULL,
  `calisan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `yazilimcilar`
--

INSERT INTO `yazilimcilar` (`id`, `yazilimci_adi`, `sure`, `zorluk`, `calisan`) VALUES
(1, 'Dev1', 1, 1, 1),
(2, 'Dev2', 1, 2, 1),
(3, 'Dev3', 1, 3, 1),
(4, 'Dev4', 1, 4, 1),
(5, 'Dev5', 1, 5, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
