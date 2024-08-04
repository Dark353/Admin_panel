-- --------------------------------------------------------
-- Sunucu:                       127.0.0.1
-- Sunucu sürümü:                10.4.28-MariaDB - mariadb.org binary distribution
-- Sunucu İşletim Sistemi:       Win64
-- HeidiSQL Sürüm:               12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- deneme_db için veritabanı yapısı dökülüyor
CREATE DATABASE IF NOT EXISTS `deneme_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `deneme_db`;

-- tablo yapısı dökülüyor deneme_db.tbl_haber
CREATE TABLE IF NOT EXISTS `tbl_haber` (
  `sira` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(110) NOT NULL,
  `h_konu` varchar(110) NOT NULL,
  `h_icerik` longtext NOT NULL,
  `yazar` varchar(110) NOT NULL,
  `tarih` date NOT NULL DEFAULT current_timestamp(),
  `durum` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`sira`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- deneme_db.tbl_haber: ~2 rows (yaklaşık) tablosu için veriler indiriliyor
INSERT INTO `tbl_haber` (`sira`, `baslik`, `h_konu`, `h_icerik`, `yazar`, `tarih`, `durum`) VALUES
	(10, '1914 tarihli H. Rackham Çevirisi', 'Lorem Ipsum', '<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n', 'admin', '2024-01-18', 1),
	(11, '1914 tarihli H. Rackham Çevirisi', 'Lorem Ipsum 2', '<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>\r\n', 'admin', '2024-01-18', 1);

-- tablo yapısı dökülüyor deneme_db.tbl_kat
CREATE TABLE IF NOT EXISTS `tbl_kat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ust` int(11) NOT NULL,
  `kat_name` varchar(255) NOT NULL,
  `yer` int(11) NOT NULL,
  `durum` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- deneme_db.tbl_kat: ~2 rows (yaklaşık) tablosu için veriler indiriliyor
INSERT INTO `tbl_kat` (`id`, `ust`, `kat_name`, `yer`, `durum`) VALUES
	(22, 0, 'Kategori1', 1, 1),
	(23, 22, 'Kategori2', 2, 1);

-- tablo yapısı dökülüyor deneme_db.tbl_kullanici
CREATE TABLE IF NOT EXISTS `tbl_kullanici` (
  `sira` int(11) NOT NULL AUTO_INCREMENT,
  `isim` varchar(50) NOT NULL,
  `k_ad` varchar(50) NOT NULL,
  `k_sif` varchar(255) NOT NULL,
  `durum` tinyint(1) NOT NULL DEFAULT 1,
  `is_admin` varchar(50) NOT NULL,
  PRIMARY KEY (`sira`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- deneme_db.tbl_kullanici: ~3 rows (yaklaşık) tablosu için veriler indiriliyor
INSERT INTO `tbl_kullanici` (`sira`, `isim`, `k_ad`, `k_sif`, `durum`, `is_admin`) VALUES
	(14, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '1048575'),
	(23, 'deniz', 'deniz', '202cb962ac59075b964b07152d234b70', 1, '1023887');

-- tablo yapısı dökülüyor deneme_db.tbl_resim
CREATE TABLE IF NOT EXISTS `tbl_resim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urunID` int(11) NOT NULL,
  `resim` varchar(255) NOT NULL,
  `explanation` text NOT NULL,
  `yer` int(11) NOT NULL,
  `durum` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- deneme_db.tbl_resim: ~6 rows (yaklaşık) tablosu için veriler indiriliyor
INSERT INTO `tbl_resim` (`id`, `urunID`, `resim`, `explanation`, `yer`, `durum`) VALUES
	(21, 9, '20241801013818_Ozel-Yazilim-Sirketleri-2.png', 'resim 1\r\n', 1, 1),
	(22, 9, '20241801013836_Estonyada-Sirket-Kurmak-icin-En-Iyi-Sektorler (1).png', 'resim2\r\n', 2, 1),
	(23, 10, '20241801013845_indir.png', 'resim 1', 0, 1),
	(24, 10, '20241801013851_indir (1).png', 'resim 2', 0, 1),
	(25, 11, '20241801013904_temizlik-ikon-tis7vpk6dn0jawio.png', 'resim 1', 0, 1),
	(26, 11, '20241801013913_elektrik-elektronik-ikon-ptjitmctlpknmu7g.png', 'resim 2', 0, 1);

-- tablo yapısı dökülüyor deneme_db.tbl_urunler
CREATE TABLE IF NOT EXISTS `tbl_urunler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `explanation` text NOT NULL,
  `durum` tinyint(4) NOT NULL DEFAULT 1,
  `yer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- deneme_db.tbl_urunler: ~3 rows (yaklaşık) tablosu için veriler indiriliyor
INSERT INTO `tbl_urunler` (`id`, `name`, `price`, `stock`, `category`, `explanation`, `durum`, `yer`) VALUES
	(9, 'Ürün 1 ', 6784.00, 100, 0, '<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n', 1, 1),
	(10, 'Ürün 2', 10000.00, 35, 22, '<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n', 1, 2),
	(11, 'Ürün 3', 80000.00, 15, 23, '<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n', 1, 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
