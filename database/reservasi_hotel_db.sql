-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 09:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasi_hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `EMAIL_ADMIN` varchar(100) NOT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `NAMA_ADMIN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`EMAIL_ADMIN`, `PASSWORD`, `NAMA_ADMIN`) VALUES
('shaktihotel22@gmail.com', '$2y$10$rVlAUJyj12KxJhr0qQ9aFun.dxK/ZHa6rwUWLsOwbh0L2u2LfsvnS', 'Shakti Hotel Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `ID_DETAIL` int(11) NOT NULL,
  `ID_KAMAR` varchar(4) DEFAULT NULL,
  `ID_PEMESANAN` varchar(5) DEFAULT NULL,
  `ID_HOTEL` varchar(4) DEFAULT NULL,
  `JUMLAH_KAMAR` decimal(10,0) DEFAULT NULL,
  `JUMLAH_TAMU` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `ID_FASILITAS` varchar(4) NOT NULL,
  `NAMA_FASILITAS` varchar(100) DEFAULT NULL,
  `GAMBAR_FASILITAS` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID_FEEDBACK` int(11) NOT NULL,
  `EMAIL_TAMU` varchar(100) DEFAULT NULL,
  `DESKRIPSI` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `ID_HOTEL` varchar(4) NOT NULL,
  `NAMA_HOTEL` varchar(100) DEFAULT NULL,
  `ALAMAT` varchar(90) DEFAULT NULL,
  `RATING` decimal(10,0) DEFAULT NULL,
  `ULASAN` varchar(100) DEFAULT NULL,
  `GAMBAR_HOTEL` longblob DEFAULT NULL,
  `PASSWORD_HOTEL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `ID_KAMAR` varchar(4) NOT NULL,
  `ID_HOTEL` varchar(4) DEFAULT NULL,
  `ID_TIPE_KAMAR` varchar(3) DEFAULT NULL,
  `HOT_ID_HOTEL` varchar(4) DEFAULT NULL,
  `HARGA_KAMAR` decimal(50,0) DEFAULT NULL,
  `STATUS_KAMAR` varchar(50) DEFAULT NULL,
  `GAMBAR_KAMAR` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `ID_METODE_PEMBAYARAN` varchar(3) NOT NULL,
  `NAMA_METODE_PEMBAYARAN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_PEMBAYARAN` varchar(3) NOT NULL,
  `ID_METODE_PEMBAYARAN` varchar(3) DEFAULT NULL,
  `ID_PEMESANAN` varchar(5) DEFAULT NULL,
  `TANGGAL_PEMBAYARAN` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `JUMLAH_PEMBAYARAN` decimal(60,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `ID_PEMESANAN` varchar(5) NOT NULL,
  `EMAIL_TAMU` varchar(100) DEFAULT NULL,
  `TGL_PEMESANAN` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TGL_CEKIN` datetime DEFAULT NULL,
  `TGL_CEKOUT` datetime DEFAULT NULL,
  `TOTAL_BIAYA` decimal(50,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relationship_3`
--

CREATE TABLE `relationship_3` (
  `ID_HOTEL` varchar(4) NOT NULL,
  `ID_FASILITAS` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `EMAIL_TAMU` varchar(100) NOT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `NAMA_TAMU` varchar(100) DEFAULT NULL,
  `ALAMAT` varchar(90) DEFAULT NULL,
  `NO_TELEPON_TAMU` varchar(13) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`EMAIL_TAMU`, `PASSWORD`, `NAMA_TAMU`, `ALAMAT`, `NO_TELEPON_TAMU`, `TANGGAL_LAHIR`) VALUES
('almaria77@gmail.com', '$2y$10$JPi7VAhMobhBVbJsytySBeWfFisay4vuooe42BGiLWgAoDWeI1iq.', 'Ranita Almaria', NULL, NULL, NULL),
('ranita3@gmail.com', '$2y$10$x0yGNVQQwD8dzeIXSnXFnerWkL2ihKqC4PCIYKWzINne6Te8rXe6C', 'Ranita Almaria', NULL, NULL, NULL),
('rudialam11@gmail.com', '$2y$10$Rd6HUaTSTsBARbMxQwn/eOIv7u1az1kGN/9Z4hUu4epQJIFgoALTC', 'Rudi Alamsyah', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `ID_TIPE_KAMAR` varchar(3) NOT NULL,
  `TIPE_KAMAR` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_favorit`
--

CREATE TABLE `wishlist_favorit` (
  `ID_WISHLIST` int(11) NOT NULL,
  `EMAIL_TAMU` varchar(100) DEFAULT NULL,
  `ID_HOTEL` varchar(4) DEFAULT NULL,
  `TAM_EMAIL_TAMU` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`EMAIL_ADMIN`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`ID_DETAIL`),
  ADD KEY `FK_RELATIONSHIP_13` (`ID_HOTEL`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_PEMESANAN`),
  ADD KEY `FK_RELATIONSHIP_6` (`ID_KAMAR`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`ID_FASILITAS`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID_FEEDBACK`),
  ADD KEY `FK_RELATIONSHIP_15` (`EMAIL_TAMU`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`ID_HOTEL`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`ID_KAMAR`),
  ADD KEY `FK_RELATIONSHIP_14` (`HOT_ID_HOTEL`),
  ADD KEY `FK_RELATIONSHIP_2` (`ID_HOTEL`),
  ADD KEY `FK_RELATIONSHIP_9` (`ID_TIPE_KAMAR`);

--
-- Indexes for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`ID_METODE_PEMBAYARAN`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID_PEMBAYARAN`),
  ADD KEY `FK_RELATIONSHIP_7` (`ID_PEMESANAN`),
  ADD KEY `FK_RELATIONSHIP_8` (`ID_METODE_PEMBAYARAN`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`ID_PEMESANAN`),
  ADD KEY `FK_RELATIONSHIP_1` (`EMAIL_TAMU`);

--
-- Indexes for table `relationship_3`
--
ALTER TABLE `relationship_3`
  ADD PRIMARY KEY (`ID_HOTEL`,`ID_FASILITAS`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_FASILITAS`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`EMAIL_TAMU`);

--
-- Indexes for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`ID_TIPE_KAMAR`);

--
-- Indexes for table `wishlist_favorit`
--
ALTER TABLE `wishlist_favorit`
  ADD PRIMARY KEY (`ID_WISHLIST`),
  ADD KEY `FK_RELATIONSHIP_10` (`ID_HOTEL`),
  ADD KEY `FK_RELATIONSHIP_11` (`TAM_EMAIL_TAMU`),
  ADD KEY `FK_RELATIONSHIP_12` (`EMAIL_TAMU`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_PEMESANAN`) REFERENCES `pemesanan` (`ID_PEMESANAN`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_KAMAR`) REFERENCES `kamar` (`ID_KAMAR`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`EMAIL_TAMU`) REFERENCES `tamu` (`EMAIL_TAMU`);

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`HOT_ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`),
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`),
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ID_TIPE_KAMAR`) REFERENCES `tipe_kamar` (`ID_TIPE_KAMAR`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_PEMESANAN`) REFERENCES `pemesanan` (`ID_PEMESANAN`),
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ID_METODE_PEMBAYARAN`) REFERENCES `metode_pembayaran` (`ID_METODE_PEMBAYARAN`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`EMAIL_TAMU`) REFERENCES `tamu` (`EMAIL_TAMU`);

--
-- Constraints for table `relationship_3`
--
ALTER TABLE `relationship_3`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_FASILITAS`) REFERENCES `fasilitas` (`ID_FASILITAS`);

--
-- Constraints for table `wishlist_favorit`
--
ALTER TABLE `wishlist_favorit`
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`),
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`TAM_EMAIL_TAMU`) REFERENCES `tamu` (`EMAIL_TAMU`),
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`EMAIL_TAMU`) REFERENCES `tamu` (`EMAIL_TAMU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
