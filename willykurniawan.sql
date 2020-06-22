-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for willykurniawan
CREATE DATABASE IF NOT EXISTS `willykurniawan` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `willykurniawan`;

-- Dumping structure for table willykurniawan.informasi
CREATE TABLE IF NOT EXISTS `informasi` (
  `kode_informasi` varchar(50) NOT NULL,
  `informasi` text,
  `qrcode` varchar(50) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kode_informasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table willykurniawan.informasi: ~1 rows (approximately)
/*!40000 ALTER TABLE `informasi` DISABLE KEYS */;
INSERT INTO `informasi` (`kode_informasi`, `informasi`, `qrcode`, `id_kategori`) VALUES
	('INF-001', '<p>dsfdsfdr</p>\r\n', 'INF-001.png', 1);
/*!40000 ALTER TABLE `informasi` ENABLE KEYS */;

-- Dumping structure for table willykurniawan.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table willykurniawan.kategori: ~2 rows (approximately)
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
	(1, 'Kesehatan'),
	(2, 'Sosial');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table willykurniawan.pengguna
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `img` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table willykurniawan.pengguna: ~1 rows (approximately)
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` (`id`, `username`, `password`, `img`) VALUES
	(2, 'admin', '$2y$10$NZtThJ1DQ9ALESGi1wzne.Bg5Y1nKDnjbmlHrAZmK/qNmEURa.s9K', 0);
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
