-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Ara 2022, 13:02:34
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `crm`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteriler`
--

CREATE TABLE `musteriler` (
  `id` int(11) UNSIGNED NOT NULL,
  `AdSoyad` varchar(150) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Email` varchar(120) COLLATE utf8mb4_turkish_ci NOT NULL,
  `VergiDairesi` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `VergiNumarasi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `GelirDuzeyi` tinyint(4) NOT NULL,
  `Telefon` varchar(11) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Resim` varchar(150) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Cinsiyet` varchar(5) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Durum` tinyint(1) NOT NULL,
  `KayitTarihi` int(11) NOT NULL,
  `IpAdresi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `musteriler`
--

INSERT INTO `musteriler` (`id`, `AdSoyad`, `Email`, `VergiDairesi`, `VergiNumarasi`, `GelirDuzeyi`, `Telefon`, `Resim`, `Cinsiyet`, `Durum`, `KayitTarihi`, `IpAdresi`) VALUES
(1, 'Ali Paltacı', 'alipltc@hotmail.com', 'İstanbul Vergi Dairesi', '123456789123', 4, '05433841077', 'flo.png', 'Erkek', 1, 1669634120, '::1'),
(2, 'Ahmet Dereli', 'pltcali@hotmail.com', 'Ankara Vergi Dairesi', '123456789124', 2, '05422849889', 'flo.png', 'Erkek', 1, 1669634201, '::1'),
(3, 'Büşra Güncel', 'test@test.com', 'Bursa Vergi Dairesi', '1561561151', 1, '05436985421', 'dhl.png', 'Kadın', 0, 1669634836, '::1'),
(9, 'Willy Ericsson', 'wericsson0@state.gov', 'Adana Vergi Dairesi', '95564145', 5, '05433841222', 'asus.png', 'Erkek', 1, 1669667869, '::1'),
(10, 'Dulcy Grigor', 'dgrigor2@cisco.com', 'Bartın Vergi Dairesi', '95564147339', 4, '05433841078', 'DeFacto.png', 'Kadın', 1, 1669667975, '::1'),
(12, 'Duff Sandars', 'dsandars2@yellowbook.com', 'Düzce Vergi Dairesi', '95564149', 2, '05433841079', 'Ford.png', 'Erkek', 0, 1669668515, '::1'),
(13, 'Test User1', 'test1@mail.com', 'Bolu Vergi Dairesi', '9561126564', 1, '05433841083', 'toshiba.png', 'Erkek', 1, 1669668576, '::1'),
(14, 'Test User2', 'user2@mail.com', 'Muş Vergi Dairesi', '4235343466', 5, '05433841084', 'asus.png', 'Erkek', 0, 1669668675, '::1'),
(15, 'Test User3', 'user3@mail.com', 'İzmir Vergi Dairesi', '4534636346', 4, '05433841087', 'Ford.png', 'Kadın', 1, 1669668769, '::1'),
(16, 'Test User4', 'user4@mail.com', 'İstanbul Vergi Dairesi', '89897687556', 1, '05433841090', 'flo.png', 'Erkek', 1, 1669668861, '::1'),
(17, 'Alicea Fittis', 'afittise@blinklist.com', 'Ankara Vergi Dairesi', '9076657658', 2, '05433841096', 'flo.png', 'Kadın', 1, 1669668921, '::1'),
(18, 'Yasin Örer', 'yasin@mail.com', 'Nevşehir Vergi Dairesi', '45353589353', 3, '05433841100', 'toshiba.png', 'Erkek', 1, 1669669003, '::1'),
(19, 'Yasemin Güleç', 'yasemin@mail.com', 'Adana Vergi Dairesi', '543774757458', 5, '05433841103', 'Google.png', 'Kadın', 1, 1669669064, '::1'),
(20, 'Test User5', 'user5@mail.com', 'Test Vergi Dairesi', '234353675475', 4, '05433841105', 'Google.png', 'Erkek', 1, 1669669109, '::1'),
(21, 'Zeynep Deniz', 'zeynep@mail.com', 'Bursa Vergi Dairesi', '423435765654', 3, '05433841398', 'flo.png', 'Kadın', 0, 1669669186, '::1'),
(23, 'Fatma Beyoğlu', 'fatma@fatma.com', 'Bursa Vergi Dairesi', '43534535367', 3, '05395874589', 'toshiba.png', 'Kadın', 1, 1669768027, '::1'),
(24, 'Ali Can', 'test@mail.com', 'zzzz dairesi', '242342442', 2, '05369848454', 'flo.png', 'Erkek', 1, 1669803496, '::1'),
(26, 'Selçuk Aydemir', 'selcuk@mail.com', 'Adana Vergi Dairesi', '7567657856765', 2, '05426584535', 'toshiba.png', 'Erkek', 1, 1669807130, '::1'),
(35, 'Eyüp Kayaduman', 'eyup@mail.com', 'İzmir Vergi Dairesi', '342345345436', 2, '05435558914', 'flo.png', 'Erkek', 1, 1669915064, '::1'),
(36, 'Efe Onkar', 'onkar@mail.com', 'Bartın Vergi Dairesi', '98887776766', 2, '05354547863', 'Ford.png', 'Erkek', 1, 1669915126, '::1'),
(37, 'Caner Koskos', 'koskos@mail.com', 'Edirne Vergi Dairesi', '885661616147', 4, '05439999999', 'Dell.png', 'Erkek', 0, 1669915212, '::1'),
(38, 'Ahmet İhsan Bozacı', 'aibozaci@mail.com', 'İstanbul Vergi Dairesi', '998899887744', 3, '02222222222', 'flo.png', 'Erkek', 1, 1669915272, '::1'),
(40, 'Özcan Kara', 'kara@mail.com', 'Ankara Vergi Dairesi', '554411225577', 3, '01111111111', 'asus.png', 'Erkek', 1, 1669915904, '::1'),
(41, 'Alper Gülcü', 'alperglc01@outlook.com', 'Bursa Vergi Dairesi', '3213123313131', 3, '04222221144', 'toshiba.png', 'Erkek', 1, 1669916386, '::1'),
(42, 'Deneme User2', 'deneme2@mail2.com', 'Deneme Vergi Dairesi', '852147963', 1, '01254633688', 'toshiba.png', 'Erkek', 1, 1669917869, '::1'),
(44, 'Deneme User5', 'deneme5@mail5.com', 'Adana Vergi Dairesi', '965478632119', 3, '05433862055', 'asus.png', 'Kadın', 1, 1669918214, '::1'),
(48, 'Son Dem9', 'dem@meda9.com', 'Adana Vergi Dairesi', '96354546199', 1, '93052446299', 'Dell.png', 'Erkek', 1, 1669925529, '::1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetkililer`
--

CREATE TABLE `yetkililer` (
  `id` int(11) NOT NULL,
  `AdSoyad` varchar(120) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Email` varchar(120) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Sifre` varchar(150) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Sirket` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `Unvan` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `Telefon` varchar(11) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Ulke` varchar(15) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Adres` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Cinsiyet` varchar(5) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Resim` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Github` varchar(150) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `Linkedin` varchar(150) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `Durum` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yetkililer`
--

INSERT INTO `yetkililer` (`id`, `AdSoyad`, `Email`, `Sifre`, `Sirket`, `Unvan`, `Telefon`, `Ulke`, `Adres`, `Cinsiyet`, `Resim`, `Github`, `Linkedin`, `Durum`) VALUES
(1, 'Ali Paltacı', 'alipltc@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'FLO TEKNOLOJİ', 'PHP Developer', '05433841077', 'Türkiye', 'Altınşehir Mahallesi Yalan Caddesi Çaktırma Sokak No:-1 D:99 Başakşehir/İSTANBUL', 'Erkek', 'profile.jpg', 'alipltc', 'alipaltacı', 1),
(2, 'Mehmet Selçuk Batal', 'msbatal@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'TEKİNDER', 'Yönetici - Eğitimci - Yazar', '05455555555', 'Türkiye', 'Hocam Mahallesi Hocam Sokak No:9 D:9 Çamlıca/İSTANBUL', 'Erkek', 'mehmethoca.jpg', 'msbatal', 'msbatal', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `musteriler`
--
ALTER TABLE `musteriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yetkililer`
--
ALTER TABLE `yetkililer`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `musteriler`
--
ALTER TABLE `musteriler`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Tablo için AUTO_INCREMENT değeri `yetkililer`
--
ALTER TABLE `yetkililer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
